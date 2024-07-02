<?php


class Registration extends Page
{
    function __construct($app)
    {
        parent::__construct($app);

        $this->rememberPage();
    }

    protected function getData()
    {

    }

    public function render()
    {
        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                REGISTRATION_INPUT_LABEL,
                'HTML'
            )
        );
    }
}