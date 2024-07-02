<?php


class Token
{
    private $token = null;

    public function __construct($admin, $botId)
    {
        $this->token = $admin->getBotToken($botId) ?? null;
    }

    public function token()
    {
        return $this->token;
    }
}