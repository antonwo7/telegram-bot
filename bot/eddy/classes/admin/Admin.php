<?php

class Admin
{
    private $token;
    private $memory, $chatId, $botName, $client;
    private $log = null;

    public function __construct(Memory $memory, $chatId, $botName)
    {
        $this->memory = $memory;
        $this->chatId = $chatId;
        $this->botName = $botName;

        $this->client = new GuzzleHttp\Client();

        if(!$this->checkToken()){
            $this->login();
        }
    }

    public function setLog(Log $log)
    {
        $this->log = $log;
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
        try {
            $response = $this->client->post(API_URL . 'auth/login', [
                'form_params' => [
                    'email' => API_EMAIL,
                    'password' => API_PASSWORD,
                ]
            ])
                ->getBody()
                ->getContents();

            $response = json_decode($response, true);

            if($response && isset($response['access_token'])){
                $this->token = $response['access_token'];
                $this->memory->setToken($this->botName, $this->chatId, $response['access_token']);
            }else{
                $this->token = null;
            }

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
//            $this->log->sendError($e->getMessage());
        }
    }

    public function getGreeting(User $user, Bot $bot)
    {
        try {
            $response = $this->client->post(API_URL . 'greeting', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'form_params' => [
                    'telegram_account' => $user->userName(),
                    'telegram_account_id' => (string)$user->id(),
                    'telegram_bot' => $bot->userName(),
                ]
            ]);

            if($response->getStatusCode() == 401){

                $this->login();

                if(!$this->token){
                    return false;
                }

                return $this->getGreeting($user, $bot);
            }

            $response = $response->getBody()->getContents();

            $response = json_decode($response, true);

            if(isset($response['greeting'])){
                return [
                    'greeting' => $response['greeting'],
                    'categories' => $response['categories'],
                    'lang' => $response['lang']
                ];
            }

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return false;
    }

    public function createUser(User $user, $botName)
    {
        try {
            $response = $this->client->post(API_URL . 'client', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'form_params' => [
                    'telegram_account' => $user->userName(),
                    'telegram_account_id' => (string)$user->id(),
                    'telegram_bot' => $botName,
                    'lang' => $user->lang()
                ]
            ]);

            if($response->getStatusCode() == 401){

                $this->login();

                if(!$this->token){
                    return false;
                }

                return $this->createUser($user, $botName);
            }

            $response = $response->getBody()->getContents();

            $response = json_decode($response, true);

            if(!isset($response['result'])){
                return false;
            }

            return $response['result'];

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return false;
    }

    public function getBotToken($botName)
    {
        try {
            $response = $this->client->post(API_URL . 'bot_token', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'form_params' => [
                    'telegram_bot' => (string)$botName
                ]
            ]);

            if($response->getStatusCode() == 401){

                $this->login();

                if(!$this->token){
                    return false;
                }

                return $this->getBotToken($botName);
            }

            $response = $response->getBody()->getContents();

            $response = json_decode($response, true);

            if($response['result'] && !empty($response['bot_token'])){
                return $response['bot_token'];
            }

        } catch(\GuzzleHttp\Exception\GuzzleException $e){
            $this->log->sendError($e->getMessage());
        }

        return false;
    }

    public function sendLog(Bot $bot, User $user, $message, $data = [])
    {
        if(empty($data['page'])){
            $data['page'] = 'Главная';
        }

        if(empty($data['log_type'])){
            $data['log_type'] = '1';
        }


        try {
            $response = $this->client->post(API_URL . 'log', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token
                ],
                'form_params' => [
                    'bot_name' => $bot->userName(),
                    'client_id' => $user->id(),
                    'text' => $message,
                    'note' => '-',
                    'log_type_id' => $data['log_type']
                ]
            ])
                ->getBody()
                ->getContents();


        } catch(\GuzzleHttp\Exception\GuzzleException $e){
//            $this->log->sendError($e->getMessage());
        }
    }
}
