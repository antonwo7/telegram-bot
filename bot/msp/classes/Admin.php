<?php

namespace MSP;

class Admin
{
    private $token;
    private $memory, $chatId, $botName;

    public function __construct(Memory $memory, $chatId, $botName)
    {
        $this->memory = $memory;
        $this->chatId = $chatId;
        $this->botName = $botName;

        if(!$this->checkToken()){
            $this->login();
        }
    }

    public function checkToken()
    {
        $token = $this->memory->getToken($this->botName, $this->chatId);

        if($token){
            $this->token = $token;
            return true;
        }

        return false;
    }

    public function login()
    {
        $response = Request::post(API_URL . 'auth/login', [
            'email' => API_EMAIL,
            'password' => API_PASSWORD,
        ]);

        if(!empty($response['access_token'])){
            $this->token = $response['access_token'];
            $this->memory->setToken($this->botName, $this->chatId, $response['access_token']);
        }else{
            $this->token = null;
        }
    }

    public function getGreeting(User $user, Bot $bot)
    {
        $response = Request::post(API_URL . 'greeting',
            [
                'telegram_account' => $user->userName(),
                'telegram_account_id' => (string)$user->id(),
                'telegram_bot' => $bot->userName(),
            ],
            [
                'Authorization: Bearer ' . $this->token
            ]
        );

        if($response['code'] == 401){

            $this->login();

            if(!$this->token){
                return false;
            }

            return $this->getGreeting($user, $bot);
        }

        if($response['result']){
            return [
                'greeting' => $response['greeting'],
                'categories' => $response['categories'],
                'lang' => $response['lang'],
                'msp_key' => $response['msp_key']
            ];
        }

        return false;
    }

    public function createUser(User $user, $botName)
    {
        $response = Request::post(API_URL . 'client',
            [
                'telegram_account' => $user->userName(),
                'telegram_account_id' => (string)$user->id(),
                'telegram_bot' => $botName,
                'lang' => $user->lang()
            ],
            [
                'Authorization: Bearer ' . $this->token
            ]
        );

        if($response['code'] == 401){

            $this->login();

            if(!$this->token){
                return false;
            }

            return $this->createUser($user, $bot);
        }

        if(!isset($response['result'])){
            return false;
        }

        return $response['result'];
    }

    public function getBotToken($botName)
    {
        $response = Request::post(API_URL . 'bot_token',
            [
                'telegram_bot' => (string)$botName
            ],
            [
                'Authorization: Bearer ' . $this->token
            ]
        );

        if($response['code'] == 401){
            $this->login();

            if(!$this->token){
                return false;
            }

            return $this->getBotToken($botName);
        }

        if($response['result'] && !empty($response['bot_token'])){
            return $response['bot_token'];
        }

        return false;
    }
}
