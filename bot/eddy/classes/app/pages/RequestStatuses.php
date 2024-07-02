<?php


class RequestStatuses extends Page
{
    private $unreadCommentsEmoji;

    function __construct($app)
    {
        parent::__construct($app);

        $this->rememberPage();
    }

    protected function getData()
    {
        $unreadCommentsCount = $this->app->helpDesk->getUnviewedTicketsCount($this->app->user->helpDeskUserId());
        $this->unreadCommentsEmoji = $unreadCommentsCount > 0 ? "\x3{$unreadCommentsCount}\xE2\x83\xA3" : '';
    }

    public function render()
    {
        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                MY_REQUESTS_HEADER,
                'HTML',
                'inline_keyboard',
                [
                    [[ 'text' => OPENED_REQUESTS_LABEL . " {$this->unreadCommentsEmoji}", 'callback_data' => 'requests:open' ]],
                    [[ 'text' => CLOSED_REQUESTS_LABEL, 'callback_data' => 'requests:closed' ]]
                ]
            )
        );
    }
}