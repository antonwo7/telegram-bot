<?php


class Requests extends Page
{
    private $tickets;
    private $ticketTypes;
    private $ticketStatuses;
    private $status;

    function __construct($app, $status)
    {
        $this->status = $status;

        parent::__construct($app);

        $this->rememberPage();
    }

    protected function getData()
    {
        $this->tickets = $this->app->helpDesk->getTicketsByStatus($this->app->user->helpDeskUserId(), $this->status);
        $this->ticketTypes = $this->app->helpDesk->getTicketTypes();
        $this->ticketStatuses = $this->app->helpDesk->getTicketStatuses();
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
        $header_label = $this->status == 'open' ? MY_OPENED_REQUESTS_HEADER : MY_CLOSED_REQUESTS_HEADER;

        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                $header_label,
                'HTML', 'keyboard',
                [ [
                    ['text' => HOME_LABEL]
                ] ]
            )
        );

        if(!empty($this->tickets)){
            foreach ($this->tickets as $i => $ticket)
            {
                $unreadCommentsEmoji = $ticket->isUnviewed() ? "\xF0\x9F\x92\xAC" : '';

                $ticketType = $this->getTicketTypeById($ticket->typeId());
                $ticketStatus = $this->getTicketStatusById($ticket->statusId());

                $ticketTypeTitle = $ticketType ? $ticketType['name'][$this->app->lang()] : '';
                $ticketStatusTitle = $ticketStatus ? $ticketStatus['name'][$this->app->lang()] : '';

                $ticketContent = $ticket->getPrettyId() . PHP_EOL .
                    $ticket->getPrettyDateCreated() . PHP_EOL .
                    $ticketStatusTitle . PHP_EOL .
                    $ticketTypeTitle . PHP_EOL .
                    $ticket->getPrettyTitle();

                $this->app->memory->rememberMessage(
                    $this->app->bot->id(),
                    $this->app->chat->id(),
                    $this->app->bot->sendMessage(
                        $this->app->chat->id(),
                        $ticketContent,
                        'HTML',
                        'inline_keyboard',
                        [
                            [
                                [
                                    'text' => VIEW_LABEL . "  {$unreadCommentsEmoji}",
                                    'callback_data' => "ticket:{$ticket->id()}"
                                ]
                            ]
                        ]
                    )
                );
            }
        }else{
            $this->app->memory->rememberMessage(
                $this->app->bot->id(),
                $this->app->chat->id(),
                $this->app->bot->sendMessage($this->app->chat->id(), EMPTY_REQUESTS_TEXT, 'HTML')
            );
        }
    }
}