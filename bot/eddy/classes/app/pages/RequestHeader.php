<?php


class RequestHeader extends Page
{
    private $ticketTypeId, $ticketType = null;

    function __construct($app, $ticketTypeId = null)
    {
        $this->ticketTypeId = $ticketTypeId;
        parent::__construct($app);

        $this->rememberPage();
    }

    protected function getData()
    {
        if($this->ticketTypeId == null){
            $this->ticketTypeId = $this->app->memory->getValue($this->app->chat->id(), 'requestCreationCategoryId');
        }else{
            $this->app->memory->rememberValue($this->app->bot->id(), $this->app->chat->id(), 'requestCreationCategoryId',  $this->ticketTypeId);
        }

        if($this->ticketTypeId || $this->ticketTypeId === 0){
            $this->ticketType = $this->app->helpDesk->getTicketTypeById($this->ticketTypeId);
        }
    }

    public function render()
    {
        $messageText = REQUEST_TYPE_LABEL .": {$this->ticketType['name'][$this->app->lang()]}";

        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                $messageText,
                'HTML',
                'keyboard',
                [ [ ['text' => BACK_LABEL] ] ]
            )
        );

        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                ENTER_REQUEST_TITLE_TEXT,
                'HTML'
            )
        );
    }
}