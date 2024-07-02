<?php


class Ticket
{
    private
        $id,
        $uniqueId,
        $dateCreated,
        $dateUpdated,
        $title,
        $statusId,
        $isViewed,
        $typeId,
        $tags,
        $comments;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->uniqueId = $data['unique_id'];
        $this->dateCreated = DateTime::createFromFormat('Y-m-d H:i:s', $data['date_created']);
        $this->dateUpdated = DateTime::createFromFormat('Y-m-d H:i:s', $data['date_updated']);
        $this->title = $data['title'];
        $this->statusId = $data['status_id'];

        $customFields = $data['custom_fields'];

        $isViewed = false;

        if(count($customFields) > 0){
            foreach($customFields as $customField){
                if($customField['id'] == 13){
                    $isViewed = (bool) $customField['field_value'];
                    break;
                }
            }
        }

        $this->isViewed = $isViewed;

        $this->typeId = $data['type_id'];
        $this->tags = $data['tags'];
    }

    public function getPrettyDateCreated()
    {
        return $this->dateCreated->format('H:i:s d-m-Y');
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

        return null;
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