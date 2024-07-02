<?php

class RequestResult extends Page
{
    private $ticket = null;
    private $ticketTypes;
    private $ticketStatuses;
    private $command;
    private $service;

    function __construct($app, $command, $service)
    {
        $this->command = $command;
        $this->service = $service;

        parent::__construct($app, true);
    }

    protected function getData()
    {
        $ticket = $this->service->createRequestFromMemory($this->command);

        $this->rememberPage($ticket->id());

        $this->ticketTypes = $this->app->helpDesk->getTicketTypes();
        $this->ticketStatuses = $this->app->helpDesk->getTicketStatuses();
        $this->ticket = $this->app->helpDesk->getTicketById($ticket->id(), true);
    }

    public function getTicketTypeById($id)
    {
        foreach ($this->ticketTypes as $ticketType){
            if($ticketType['id'] == $id){
                return $ticketType;
            }
        }

        return null;
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
        $ticketType = $this->getTicketTypeById($this->ticket->typeId());
        $ticketStatus = $this->getTicketStatusById($this->ticket->statusId());

        $ticketTypeTitle = $ticketType ? $ticketType['name'][$this->app->lang()] : '';
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

        $ticketComments = $this->ticket->comments();

        foreach ($ticketComments as $i => $comment){
            if($i < 1) continue;

            $isLastComment = $i === ( count($ticketComments) - 1 );

            if($isLastComment){
                sleep(3);
            }

            if(count($comment->files()) == 0){
                $messageId = $this->app->bot->sendMessage(
                    $this->app->chat->id(),
                    $comment->getContent(),
                    'HTML'
                );

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

//            $outputCommentsIds[$comment->id()] = $messageId;

//            $this->app->memory->rememberArray($this->app->bot->id(), $this->app->chat->id(), 'sent_messages_ids', $outputCommentsIds);

        }
    }
}