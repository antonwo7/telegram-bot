<?php

namespace MSP;


use DateTime;

class Ticket
{
    private
        $id,
        $uniqueId,
        $dateCreated = null,
        $dateUpdated,
        $title,
        $statusId,
        $isViewed = true,
        $typeId = null,
        $tags,
        $comments;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->uniqueId = $data['id'];

        if(!empty($data['created_time']['value'])){
            $date = new DateTime();
            $date->setTimestamp(round(intval($data['created_time']['value']) / 1000));
            $this->dateCreated = $date;
        }

        $this->title = $data['subject'];
        $this->statusId = $data['status']['id'] == '2' ? 'open' : 'closed';

        if(!empty($data['category']['id'])){
            $this->isViewed = $data['category']['id'] == 302 ? false : true;
        }

        if(!empty($data['request_type']['id'])){
            $this->typeId = $data['request_type']['id'];
        }
    }

    public function getPrettyDateCreated()
    {
        return $this->dateCreated ? $this->dateCreated->format('H:i:s d-m-Y') : '';
    }

    public function getDateCreated()
    {
        return $this->dateCreated->format('Y-m-d H:i:s');
    }

    public function getPrettyDateUpdated()
    {
        return $this->dateUpdated->format('H:i:s d-m-Y');
    }

    public function setComments(Array $comments)
    {
        $this->comments = $comments;
    }

    public function typeId()
    {
        return $this->typeId;
    }

    public function statusId()
    {
        return $this->statusId;
    }

    public function id()
    {
        return $this->id;
    }

    public function comments()
    {
        return $this->comments;
    }

    public function getPrettyTitle()
    {
        return "\xE2\x9C\xB3\xE2\x9C\xB3 <b>" . mb_strtoupper($this->title) . "</b> \xE2\x9C\xB3\xE2\x9C\xB3";
    }

    public function getPrettyId()
    {
        return "ID: <code>{$this->id}</code>";
    }

    public function getText()
    {
        if(count($this->comments) > 0){
            return $this->comments[0]->text();
        }

        return '';
    }

    public function isClosed()
    {
        return $this->statusId == 'closed';
    }

    public function isUnviewed()
    {
        return !$this->isViewed;
    }

    public function isOpen()
    {
        return $this->statusId == 'open';
    }

//    public function getListItemContent()
//    {
//        return
//            $this->getPrettyId() . PHP_EOL .
//            $this->getPrettyDateCreated() . PHP_EOL .
//            $this->getStatusLabel() . PHP_EOL .
//            $this->getCategoryTitle() . PHP_EOL .
//            $this->getPrettyTitle();
//    }
}