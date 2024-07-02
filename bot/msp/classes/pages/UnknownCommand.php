<?php

namespace MSP\Pages;


class UnknownCommand extends Page
{
    function __construct($app)
    {
        $this->app = $app;

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
                UNKNOWN_COMMAND_LABEL,
                'HTML',
                'keyboard',
                [ [
                    ['text' => HOME_LABEL],
                    ['text' => MY_REQUESTS_LABEL]
                ] ]
            )
        );
    }
}