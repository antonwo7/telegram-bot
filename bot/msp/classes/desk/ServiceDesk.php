<?php

namespace MSP;


use GuzzleHttp;
use Mockery\Exception;

class ServiceDesk
{
    private $authorizationHeader, $client, $serviceDeskFormat;

    public function __construct()
    {
        $this->authorizationHeader = [
            'technician_key' => SERVICEDESK_API_KEY
        ];

        $this->client = new GuzzleHttp\Client();
        $this->serviceDeskFormat = new ServiceDeskFormat();
    }

    public function getTicketTypes()
    {
        $response = $this->client
            ->get(SERVICEDESK_API_URL . 'request_types', [ 'headers' => $this->authorizationHeader ])
            ->getBody()
            ->getContents();

        $response = json_decode($response, true);

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['request_types'])){
            return [];
        }

        return $this->serviceDeskFormat->ticketTypes($response['request_types']);
    }

    public function getTicketStatuses()
    {
        return TICKET_STATUSES;
    }

    public function getTicketTypeById($id)
    {
        $response = $this->client
            ->get(SERVICEDESK_API_URL . "request_types/{$id}", [ 'headers' => $this->authorizationHeader ])
            ->getBody()
            ->getContents();

        $response = json_decode($response, true);

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['request_type'])){
            return null;
        }

        return $this->serviceDeskFormat->ticketType($response['request_type']);
    }

    public function addTicket(array $ticket)
    {
        $data = ['input_data' => json_encode([
                'request' => [
                    'subject' => $ticket['title'],
                    'description' => $ticket['description'],
                    'requester' => [
                        'id' => $ticket['user_id']
                    ],
                    'status' => [
                        'id' => 2
                    ],
                    'category' => [
                        'id' => 301
                    ],
                    'request_type' => [
                        'id' => $ticket['type_id']
                    ],
                    'udf_fields' => [
                        'udf_sline_309' => $ticket['chat_id'],
                        'udf_sline_310' => $ticket['bot_id']
                    ]
                ]
            ])
        ];

        try {
            $response = $this->client->post(SERVICEDESK_API_URL . 'requests', ['headers' => $this->authorizationHeader, 'form_params' => $data])
                ->getBody()
                ->getContents();

            $response = json_decode($response, true);

        }catch(Exception $e){
            f($e->getMessage());
        }

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['request'])){
            return null;
        }

        return $this->serviceDeskFormat->getTicketFromArray($response['request']);
    }


    public function createUser($email, $userLang, $userId, $userName)
    {
        try {
            $data = ['input_data' => json_encode([
                'user' => [
                    'name' => $email,
                    'login_name' => $email,
                    'email_id' => $email,
                    'password' => '3KnzU=#wm=E8hp',
                    'department' => [
                        'id' => 7,
                        'name' => 'General'
                    ],
                    'user_udf_fields' => [
                        'udf_sline_302' => $userName,
                        'udf_sline_301' => $userId
                    ]
                ]
            ], 0, 512)
            ];

            $response = $this->client->post(SERVICEDESK_API_URL . 'users', ['headers' => $this->authorizationHeader, 'form_params' => $data])
                ->getBody()
                ->getContents();

        }catch(\Exception $e){

        }
    }

    public function getHelpDeskUserIdByTelegramId($id)
    {
        $data = ['input_data' => json_encode([
                'list_info' => [
                    'search_fields' => [
                        'user_udf_fields.udf_sline_301' => $id,
                    ]
                ]
            ], 0)
        ];

        $response = $this->client->get(SERVICEDESK_API_URL . 'users', ['headers' => $this->authorizationHeader, 'query' => $data])
            ->getBody()
            ->getContents();

        $response = json_decode($response, true);

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['users'])){
            return null;
        }

        return $response['users'][0]['id'];
    }

    public function getUnviewedTicketsCount($helpDeskUserId)
    {
        $data = ['input_data' => json_encode([
                'list_info' => [
                    'search_fields' => [
                        'category.name' => 'Не прочитано',
                        'requester.id' => $helpDeskUserId
                    ]
                ]
            ], 0)
        ];

        $response = $this->client->get(SERVICEDESK_API_URL . 'requests', ['headers' => $this->authorizationHeader, 'query' => $data])
            ->getBody()
            ->getContents();

        $response = json_decode($response, true);

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['requests'])){
            return 0;
        }

        return count($response['requests']);
    }

    public function getTicketsByStatus($helpDeskUserId, $status)
    {
        $data = ['input_data' => json_encode([
                'list_info' => [
                    'sort_field' => 'id',
                    'sort_order' => 'asc',
                    'search_fields' => [
                        'status.id' => $status == 'open' ? 2 : 1,
                        'requester.id' => $helpDeskUserId
                    ]
                ],
                'fields_required' => [
                    'category', 'requester', 'short_description', 'created_time', 'subject', 'created_by', 'status', 'request_type'
                ]
            ])
        ];

        $response = $this->client->get(SERVICEDESK_API_URL . 'requests', [
            'headers' => ['technician_key' => SERVICEDESK_API_KEY],
            'query' => $data
        ])
            ->getBody()
            ->getContents();

        $response = json_decode($response, true);

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['requests'])){
            return [];
        }

        return $this->serviceDeskFormat->getTicketsFromArray($response['requests']);
    }

    public function changeTicketStatus($ticketId, $status)
    {
        $data = ['input_data' => json_encode([
                'request' => [
                    'status' => [
                        'id' => $status == 'open' ? 2 : 1
                    ]
                ]
            ])
        ];

        $response = $this->client->put(SERVICEDESK_API_URL . "requests/{$ticketId}", [
            'headers' => ['technician_key' => SERVICEDESK_API_KEY],
            'query' => $data
        ])
            ->getBody()
            ->getContents();
    }

    public function setTicketViewStatus($ticketId, $status)
    {
        $data = ['input_data' => json_encode([
            'request' => [
                'category' => [
                    'id' => $status == 1 ? 301 : 302
                ]
            ]
        ])
        ];

        $response = $this->client->put(SERVICEDESK_API_URL . "requests/{$ticketId}", [
            'headers' => ['technician_key' => SERVICEDESK_API_KEY],
            'query' => $data
        ])
            ->getBody()
            ->getContents();
    }

    public function getTicketById($id, $withComments = false)
    {
        $data = ['input_data' => json_encode([
                'fields_required' => [
                    'category', 'requester', 'short_description', 'created_time', 'subject', 'created_by', 'status', 'request_type', 'request_notes'
                ]
            ])
        ];

        $response = $this->client->get(SERVICEDESK_API_URL . "requests/{$id}", [
            'headers' => ['technician_key' => SERVICEDESK_API_KEY],
        ])
            ->getBody()
            ->getContents();

        $response = json_decode($response, true);

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['request'])){
            return [];
        }

        $ticket = new Ticket($response['request']);

        if($withComments){
            $ticket->setComments($this->getCommentsByTicketId($ticket->id()));
        }

        return $ticket;
    }

    public function getCommentsByTicketId($id)
    {
        $data = ['input_data' => json_encode([
                'list_info' => [
                    'sort_field' => 'added_time',
                    'sort_order' => 'asc'
                ],
                'fields_required' => [
                    'description', 'added_time', 'attachments', 'added_by'
                ]
            ])
        ];

        $response = $this->client->get(SERVICEDESK_API_URL . "requests/{$id}/notes", [
            'headers' => ['technician_key' => SERVICEDESK_API_KEY],
            'query' => $data
        ])
            ->getBody()
            ->getContents();

        $response = json_decode($response, true);

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['notes'])){
            return [];
        }

        foreach ($response['notes'] as $i => $note){
            $files = $this->getAttachmentsByTicketAndNoteId($id, $note['id']);


            foreach($files as $j => $file){
                if(!empty($file['content_url'])){
                    $files[$j]['content_url'] = $this->getAttachmentTempUrl($file);
                }
            }

            $response['notes'][$i]['files'] = $files;
        }

        return $this->serviceDeskFormat->getCommentsFromArray($response['notes']);
    }

    public function getAttachmentsByTicketAndNoteId($ticketId, $noteId)
    {
        $response = $this->client->get(SERVICEDESK_API_URL . "requests/{$ticketId}/notes/{$noteId}", [
            'headers' => ['technician_key' => SERVICEDESK_API_KEY],
        ])
            ->getBody()
            ->getContents();

        $response = json_decode($response, true);

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['note']['attachments'])){
            return [];
        }

        return $response['note']['attachments'];
    }

    public function addTicketComment($ticketId, array $comment, $userMspKey = null)
    {
        $data = ['input_data' => json_encode([
                'note' => [
                    'description' => $comment['text']
                ]
            ])
        ];

        $serviceDeskAPIKey = $userMspKey ? $userMspKey : SERVICEDESK_API_KEY;

        $response = $this->client->post(SERVICEDESK_API_URL . "requests/{$ticketId}/notes", [
            'headers' => ['technician_key' => $serviceDeskAPIKey],
            'form_params' => $data
        ])
            ->getBody()
            ->getContents();

        $response = json_decode($response, true);

        if(!$response && $response['response_status'][0]['status_code'] != 2000 || empty($response['note'])){
            return [];
        }

        return $this->serviceDeskFormat->getTicketFromArray($response['note']);
    }

    public function getAttachmentTempUrl($file)
    {
        $response = $this->client->get(SERVICEDESK_API_URL . "attachments/{$file['id']}", [
            'headers' => ['technician_key' => SERVICEDESK_API_KEY],
        ])
            ->getBody()
            ->getContents();

        $fileName = time() . '-' . $file['name'];

        file_put_contents(TMP_PATH . $fileName, $response);

        return LOCAL_URL . 'tmp/' . $fileName;
    }

}