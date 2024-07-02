<?php

namespace MSP;


use DateTime;

class Comment
{
    private
        $id,
        $text,
        $dateCreated,
        $userId = null,
        $files = [];

    public function __construct($data)
    {
        $this->id = $data['id'];

        if(!empty($data['added_time']['value'])){
            $date = new DateTime();
            $date->setTimestamp(round(intval($data['added_time']['value']) / 1000));
            $this->dateCreated = $date;
        }

        $this->text = !empty($data['description']) ? $data['description'] : '';
        $this->userId = $data['added_by']['id'];

        if(is_array($data['files']) && !empty($data['files'])){
            foreach($data['files'] as $file){
                $this->files[] = new CommentFile($file);
            }
        }

    }

    public function files()
    {
        return $this->files;
    }

    public function text()
    {
        return $this->text;
    }

    public function userId()
    {
        return $this->userId;
    }

    public function getDateCreatedTimestamp()
    {
        return
            $this->dateCreated instanceof DateTime
                ? $this->dateCreated->getTimestamp()
                : 0;
    }

    public function getPrettyDateCreated()
    {
        return
            $this->dateCreated instanceof DateTime
                ? $this->dateCreated->format('H:i:s d-m-Y')
                : '';
    }

    public function getPrettyUserEmoji()
    {
        return $this->userId == 4 ? "\xF0\x9F\x98\x81" : "\xF0\x9F\x9A\xB9";
    }

    public function getUserName()
    {
        return $this->userId == 4 ? "Бот" : 'Клиент';
    }

    public function getPrettyUser()
    {
        return "{$this->getPrettyUserEmoji()} {$this->getUserName()}";
    }

    public function getPrettyText()
    {
        return strip_tags(str_replace('</p>', '</p>' . PHP_EOL, $this->text));
    }

    public function getContent()
    {
        return $this->getPrettyUser() . PHP_EOL .
            "\xF0\x9F\x95\x90 {$this->getPrettyDateCreated()}" . PHP_EOL .
            "\xF0\x9F\x92\xAC" . $this->getPrettyText();
    }

    public function id()
    {
        return $this->id;
    }
}