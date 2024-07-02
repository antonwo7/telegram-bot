<?php

class User
{
    private $userId;
    private $userName;
    private $lang;
    private $helpDeskUserId = null;

    public function __construct(Message $message)
    {
        $this->userId = $message->fromUserId();
        $this->userName = $message->fromUserName();
        $this->lang = $message->lang() != 'en' && $message->lang() != 'ru' ? 'en' : $message->lang();
    }

    public function id()
    {
        return $this->userId;
    }

    public function lang()
    {
        return $this->lang;
    }

    public function userName()
    {
        return $this->userName;
    }

    public function setHelpDeskUserId($helpDeskUserId)
    {
        $this->helpDeskUserId = $helpDeskUserId;
    }

    public function helpDeskUserId()
    {
        return $this->helpDeskUserId;
    }
}
