<?php

namespace MSP;


class Greeting
{
    private $lang, $image, $text, $token, $mspKey;
    private $failed = false;

    public function __construct(User $user, Bot $bot, Admin $admin)
    {
        $response = $admin->getGreeting($user, $bot);

        if(!$response){
            $this->failed = true;
            return;
        }

        $this->lang = $response['lang'];
        $this->mspKey = $response['msp_key'];
        $this->image = $response['greeting']['image'];
        $this->text = $response['greeting']['text'];
    }

    public function isFailed()
    {
        return $this->failed;
    }

    public function lang()
    {
        return $this->lang;
    }

    public function image()
    {
        return $this->image;
    }

    public function text()
    {
        return $this->text;
    }

    public function token()
    {
        return $this->token;
    }

    public function mspKey()
    {
        return $this->mspKey;
    }
}
