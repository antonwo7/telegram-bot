<?php


class UnknownUser extends Page
{
    function __construct($app)
    {
        parent::__construct($app);

        $this->rememberPage();
    }

    public function render()
    {
        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                UNKNOWN_USER_TEXT, 'HTML',
                'keyboard',
                [ [ ['text' => REGISTRATION_LABEL] ] ]
            )
        );
    }
}