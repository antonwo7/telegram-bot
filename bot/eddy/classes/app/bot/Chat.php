<?php


class Chat
{
    private $chatId;

    public function __construct($input)
    {
        $inputValue = $input->getInput();

        $message = isset($inputValue['message']) ? $inputValue['message'] : $inputValue['callback_query']['message'];

        $this->chatId = isset($message['chat']['id'])
            ? $message['chat']['id']
            : null;
    }

    public function id()
    {
        return $this->chatId;
    }
}