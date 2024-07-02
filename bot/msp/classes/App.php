<?php

namespace MSP;

use MSP\Pages\UnknownUser;
use Exception;

class App
{
    public $bot;
    public $input;
    public $memory;
    public $chat;
    public $message;
    public $user;
    public $prevPage;
    public $greeting;
    private $lang;
    public $admin;
    public $helpDesk;
    public $serviceDesk;

    function __construct($input)
    {
        $this->input = $input;

        $this->chat = new Chat($this->input);

        $this->message = new Message($this->input);

        $this->memory = new Memory();

        $this->user = new User($this->message);

        $this->admin = new Admin($this->memory, $this->chat->id(), $this->input->BotName());

        $token = new Token($this->admin, $this->input->BotName());

        $this->bot = new Bot($token->token());

        $this->memory->rememberMessage($this->bot->id(), $this->chat->id(), $this->message->id());

        $this->prevPage = $this->memory->getPage($this->bot->id(), $this->chat->id());
        $this->helpDesk = new ServiceDesk();

        if($this->prevPage == 'UnknownUser' || $this->prevPage == 'Registration'){
            $this->setLang(LANG_DEFAULT);

        }else{
            $this->initWithUserExist();
        }
    }

    public function initWithUserExist()
    {
        $this->greeting = new Greeting($this->user, $this->bot, $this->admin);

        if($this->greeting->isFailed()) {
            $this->unknownUser();
        }

        $this->setLang($this->greeting->lang());

        $this->user->setHelpDeskUserId($this->helpDesk->getHelpDeskUserIdByTelegramId($this->user->id()));
        $this->user->setMspKey($this->greeting->mspKey());
    }

    public function unknownUser()
    {
        $this->setLang(LANG_DEFAULT);
        View::render(UnknownUser::class, $this);
    }

    private function setLang($lang)
    {
        try {
            $this->lang = $lang;
            include_once ROOT_PATH . "content_{$lang}.php";

        }catch(Exception $e){

        }
    }

    public function lang()
    {
        return $this->lang;
    }
}
