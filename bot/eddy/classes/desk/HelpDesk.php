<?php


class HelpDesk
{
    private $authorizationHeader, $authorizationHeaderA, $api_key, $client, $log;

    public function __construct(Log $log)
    {
        $this->log = $log;

        $this->api_key = base64_encode(HELPDESK_API_KEY);
        $this->authorizationHeader = 'Authorization: Basic ' . $this->api_key;
        $this->authorizationHeaderA = ['Authorization' => 'Basic ' . $this->api_key];

        $this->client = new GuzzleHttp\Client();
    }

    private function checkResponse($response, $field, $defaultValue = [])
    {
        $response = json_decode($response, true);

        if(empty($response[$field])){
            return $defaultValue;
        }

        return $response[$field];
    }

    public function getTicketTypes()
    {
        $returnValue = [];

        try {
            $response = $this->client->get(HELPDESK_API_URL . 'types/', [
                'headers' => $this->authorizationHeaderA
            ])
                ->getBody()
                ->getContents();

            $returnValue = $this->checkResponse($response, 'data');

        }catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return $returnValue;
    }

    public function getTicketStatuses()
    {
        $returnValue = [];

        try {
            $response = $this->client->get(HELPDESK_API_URL . 'statuses/', [
                'headers' => $this->authorizationHeaderA
            ])
                ->getBody()
                ->getContents();

            $returnValue = $this->checkResponse($response, 'data');

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return $returnValue;
    }

    public function getTicketTypeById($id, $ticketTypes = null)
    {
        if(!$ticketTypes){
            $ticketTypes = $this->getTicketTypes();
        }

        foreach ($ticketTypes as $ticketType){
            if($ticketType['id'] == $id){
                return $ticketType;
            }
        }

        return null;
    }

    public function addTicket(array $ticket)
    {
        $returnValue = null;

        try {
            $response = $this->client->post(HELPDESK_API_URL . 'tickets/', [
                'headers' => $this->authorizationHeaderA,
                'form_params' => [
                    'pid' => 0,
                    'title' => $ticket['title'],
                    'description' => $ticket['title'],
                    'status_id' => 'open',
                    'type_id' => $ticket['type_id'],
                    'user_id' => isset($ticket['user_id']) ? $ticket['user_id'] : 1,
                    'custom_fields' => $ticket['custom_fields']
                ]
            ])
                ->getBody()
                ->getContents();

            $data = $this->checkResponse($response, 'data');

            if($data){
                $returnValue = $this->getTicketFromArray($data);
            }

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return $returnValue;
    }

    public function changeTicketStatus($ticketId, $status)
    {
        try {
            $response = $this->client->put(HELPDESK_API_URL . "tickets/{$ticketId}", [
                'headers' => array_merge($this->authorizationHeaderA, [ 'Content-Type' => 'application/json' ]),
                'body' => json_encode([
                    'status_id' => $status
                ])
            ])
                ->getBody()
                ->getContents();

        }catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }
    }

    public function addTicketComment($ticketId, array $comment)
    {
        $data = [
            [
                'name' => 'text',
                'contents' => !empty($comment['text']) ? $comment['text'] : ATTACHMENT_LABEL,
            ],
            [
                'name' => 'user_id',
                'contents' => isset($comment['user_id']) ? $comment['user_id'] : 1,
            ]
        ];


        if(!empty($comment['file'])){
            $data[] = [
                'name' => 'files[]',
                'contents' => fopen($comment['file'], 'r')
            ];
        }

        try {
            $response = $this->client->post(HELPDESK_API_URL . "tickets/{$ticketId}/posts/", [
                'headers' => $this->authorizationHeaderA,
                'multipart' => $data
            ])
                ->getBody()
                ->getContents();

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }
    }

    public function getTicketsByStatus($helpDeskUserId, $status)
    {
        $returnValue = [];

        try {
            $response = $this->client->get(HELPDESK_API_URL . 'tickets/', [
                'headers' => $this->authorizationHeaderA,
                'query' => [
                    'user_list' => $helpDeskUserId,
                    'status_list' => $status,
                    'order_by' => 'date_created{asc}'
                ]
            ])
                ->getBody()
                ->getContents();

            $data = $this->checkResponse($response, 'data');

            if($data){
                $returnValue = $this->getTicketsFromArray($data);
            }

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return $returnValue;
    }

    public function getTicketById($id, $withComments = false)
    {
        $ticket = null;

        try {
            $response = $this->client->get(HELPDESK_API_URL . "tickets/{$id}", [
                'headers' => $this->authorizationHeaderA,
                'query' => [
                    'id' => $id
                ]
            ])
                ->getBody()
                ->getContents();

            $data = $this->checkResponse($response, 'data');

            if($data){
                $ticket = new Ticket($data);

                if($withComments){
                    $ticket->setComments($this->getCommentsByTicketId($ticket->id()));
                }
            }

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return $ticket;
    }

    public function getCommentsByTicketId($id)
    {
        $comments = [];

        try {
            $response = $this->client->get(HELPDESK_API_URL . "tickets/{$id}/posts/", [
                'headers' => $this->authorizationHeaderA,
            ])
                ->getBody()
                ->getContents();

            $data = $this->checkResponse($response, 'data');

            if($data){
                $comments = $this->getCommentsFromArray($data);

                usort($comments, function($a, $b){
                    return $a->getDateCreatedTimestamp() - $b->getDateCreatedTimestamp();
                });
            }

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return $comments;
    }

    public function getTicketsFromArray(array $ticketsArray)
    {
        if(!is_array($ticketsArray)){
            return [];
        }

        $tickets = [];

        foreach($ticketsArray as $ticketArray){
            $tickets[] = new Ticket($ticketArray);
        }

        return $tickets;
    }

    public function getTicketFromArray(array $ticketArray)
    {
        if(!is_array($ticketArray)){
            return null;
        }

        return new Ticket($ticketArray);
    }

    public function getCommentsFromArray(array $commentsArray)
    {
        if(!is_array($commentsArray)){
            return [];
        }

        $comments = [];

        foreach($commentsArray as $commentArray){
            $comments[] = new Comment($commentArray);
        }

        return $comments;
    }

    public function getHelpDeskUserIdByTelegramId($id)
    {
        $helpDeskUserId = null;

        try {
            $response = $this->client->get(HELPDESK_API_URL . 'users/', [
                'headers' => $this->authorizationHeaderA,
                'query' => [
                    'search' => $id
                ]
            ])
                ->getBody()
                ->getContents();

            $data = $this->checkResponse($response, 'data');

            if($data && isset($data[0]['id'])){
                $helpDeskUserId = $data[0]['id'];
            }

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return $helpDeskUserId;
    }

    public function getUnreadTicketsCount($helpDeskUserId)
    {
        $tickets = $this->getTicketsByStatus($helpDeskUserId, 'open');
    }

    public function setTicketViewStatus($ticketId, $status)
    {
        try {
            $response = $this->client->put(HELPDESK_API_URL . "tickets/{$ticketId}", [
                'headers' => array_merge($this->authorizationHeaderA, [ 'Content-Type' => 'application/json' ]),
                'body' => json_encode([
                    'custom_fields' => [
                        13 => (string)$status
                    ]
                ])
            ])
                ->getBody()
                ->getContents();

        }catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }
    }

    public function setTicketChatId($ticketId, $chatId)
    {
        try {
            $response = $this->client->put(HELPDESK_API_URL . "tickets/{$ticketId}", [
                'headers' => array_merge($this->authorizationHeaderA, [ 'Content-Type' => 'application/json' ]),
                'body' => json_encode([
                    'custom_fields' => [
                        12 => $chatId
                    ]
                ])
            ])
                ->getBody()
                ->getContents();

        }catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }
    }

    public function getUnviewedTicketsCount($helpDeskUserId)
    {
        $tickets = $this->getTicketsByStatus($helpDeskUserId, 'open');

        $tickets = array_filter($tickets, function($ticket) {
            return $ticket->isUnviewed();
        });

        return count($tickets);
    }

    public function createUser($email, $userLang, $userId, $userName)
    {
        try {
            $response = $this->client->post(HELPDESK_API_URL . "users/", [
                'headers' => $this->authorizationHeaderA,
                'form_params' => [
                    'name' => $email,
                    'email' => $email,
                    'status' => 'active',
                    'language' => $userLang,
                    'password' => '3KnzU=#wm=E8hp',
                    'group_id' => 1,
                    'department' => [ 1 ],
                    'custom_fields' => [
                        1 => $userId,
                        2 => $userName
                    ]
                ]
            ])
                ->getBody()
                ->getContents();

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }
    }
}