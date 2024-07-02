<?php


class Input
{
    private $input;
    private $botName;

    public function __construct()
    {
        $this->input = file_get_contents('php://input');
        $this->botName = !empty($_GET['bot']) ? $_GET['bot'] : null;
    }

    public function getInput()
    {
        return json_decode($this->input, true);
    }

    public function BotName()
    {
        return $this->botName;
    }
}