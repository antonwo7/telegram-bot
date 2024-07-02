<?php


class Log
{
    private $admin, $bot, $user;

    public function __construct(Admin $admin, Bot $bot, User $user)
    {
        $this->admin = $admin;
        $this->bot = $bot;
        $this->user = $user;
    }

    public function sendError($message)
    {
        $data['log_type'] = '2';
        $this->admin->sendLog($this->bot, $this->user, $message);
    }

    public function sendAction($messageType, $data)
    {
        $message = isset(LOG_MESSAGES[$messageType]) ? LOG_MESSAGES[$messageType] : LOG_MESSAGES['page'];
        $message = str_replace(['%telegram_account%', '%page%'], [$this->user->userName(), $data['page']], $message);

        $data['log_type'] = '1';
        $this->admin->sendLog($this->bot, $this->user, $message, $data);
    }
}