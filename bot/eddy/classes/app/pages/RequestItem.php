<?php


class RequestItem extends Page
{
    private $ticket;
    private $ticketId;
    private $unreadCommentsCount;

    private $ticketType;
    private $ticketStatuses;

    function __construct($app, $ticketId)
    {
        $this->ticketId = $ticketId;

        parent::__construct($app);

        $this->rememberPage($ticketId);
    }

    protected function getData()
    {
        $this->ticketStatuses = $this->app->helpDesk->getTicketStatuses();

        $this->app->helpDesk->setTicketViewStatus($this->ticketId, 1);
        $this->ticket = $this->app->helpDesk->getTicketById($this->ticketId, true);

        $this->ticketType = $this->app->helpDesk->getTicketTypeById($this->ticket->typeId());
    }

    public function getTicketStatusById($id)
    {
        foreach ($this->ticketStatuses as $ticketStatus){
            if($ticketStatus['id'] == $id){
                return $ticketStatus;
            }
        }

        return null;
    }

    public function render()
    {
        $ticketStatus = $this->getTicketStatusById($this->ticket->statusId());

        $ticketTypeTitle = $this->ticketType ? $this->ticketType['name'][$this->app->lang()] : '';
        $ticketStatusTitle = $ticketStatus ? $ticketStatus['name'][$this->app->lang()] : '';

        $ticketContent = $this->ticket->getPrettyId() . PHP_EOL .
            $this->ticket->getPrettyDateCreated() . PHP_EOL .
            $ticketStatusTitle . PHP_EOL .
            $ticketTypeTitle . PHP_EOL .
            $this->ticket->getPrettyTitle();

        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                $ticketContent,
                'HTML',
                'keyboard',
                [ [
                    ['text' => $this->ticket->isOpen() ? CLOSE_REQUEST_LABEL : OPEN_REQUEST_LABEL],
                    ['text' => HOME_LABEL],
                    ['text' => MY_REQUESTS_LABEL]
                ] ]
            )
        );


        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                $this->ticket->getText(),
                'HTML'
            )
        );

        $outputCommentsIds = [];

        foreach ($this->ticket->comments() as $i => $comment){
            if($i < 1) continue;

            $isLastComment = $i === ( count($this->ticket->comments()) - 1 );

            if(count($comment->files()) == 0){
                $messageId = $this->app->bot->sendMessage(
                    $this->app->chat->id(),
                    $comment->getContent(),
                    'HTML'
//                    'inline_keyboard',
//                    $isLastComment ? $keyboard : null
//                    isset($outputCommentsIds[$comment['reply_to_id']]) ? $outputCommentsIds[$comment['reply_to_id']] : null
                );

//            $outputCommentsIds[$comment->id()] = $messageId;
//            $this->app->memory->rememberArray($this->app->bot->id(), $this->app->chat->id(), 'sent_messages_ids', $outputCommentsIds);

                $this->app->memory->rememberMessage(
                    $this->app->bot->id(),
                    $this->app->chat->id(),
                    $messageId
                );
            }

            $fileMessageId = null;

            foreach($comment->files() as $file)
            {
                if($file->isPhoto()){
                    $fileMessageId = $this->app->bot->sendPhoto(
                        $this->app->chat->id(),
                        $file->url(),
                        'inline_keyboard',
                        null
                    );

                }else{
                    $fileMessageId = $this->app->bot->sendDocument(
                        $this->app->chat->id(),
                        $file->url(),
                        'inline_keyboard',
                        null
                    );
                }

                if(isset($fileMessageId['result']['message_id'])){
                    if($fileMessageId || $fileMessageId === 0){
                        $this->app->memory->rememberMessage(
                            $this->app->bot->id(),
                            $this->app->chat->id(),
                            $fileMessageId['result']['message_id']
                        );
                    }
                }
            }

        }
    }
}