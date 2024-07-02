<?php

namespace MSP;


class Message
{
    private $id;
    private $text;
    private $data;
    private $photo;
    private $document;
    private $from;
    private $fromUserId;
    private $comment;
    private $fromUserName;
    private $isQuery;
    private $replyToMessageId;
    private $lang;

    public function __construct($input)
    {
        $inputValue = $input->getInput();

        $this->comment = isset($inputValue['comment']) ? $inputValue['comment'] : null;

        if(isset($inputValue['callback_query'])){
            $this->isQuery = true;
        }

        $message = !$this->isQuery ? $inputValue['message'] : $inputValue['callback_query']['message'];

        $this->id = $message['message_id'];

        $this->from = !$this->isQuery ? $message['from'] : $message['chat'];

        $this->fromUserId = $this->from['id'];
        $this->fromUserName = $this->from['username'];

        $this->lang = $this->from['language_code'];

        $this->text = isset($message['text']) ? $message['text'] : null;

        $this->data = $this->isQuery ? $inputValue['callback_query']['data'] : null;

        $this->photo = isset($message['photo']) ? $message['photo'] : null;
        $this->document = isset($message['document']) ? $message['document'] : null;

        $this->replyToMessageId = isset($message['reply_to_message']) ? $message['reply_to_message']['message_id'] : null;
    }

    public function id()
    {
        return $this->id;
    }

    public function text()
    {
        return $this->text;
    }

    public function data()
    {
        return $this->data;
    }

    public function photo()
    {
        return $this->photo;
    }

    public function document()
    {
        return $this->document;
    }

    public function fromUserId()
    {
        return $this->fromUserId;
    }

    public function fromUserName()
    {
        return $this->fromUserName;
    }

    public function comment()
    {
        return $this->comment;
    }

    public function from()
    {
        return $this->from;
    }

    public function lang()
    {
        return $this->lang;
    }

    public function replyToMessageId()
    {
        return $this->replyToMessageId;
    }
}
