<?php

namespace MSP;


class ServiceDeskFormat
{
    public function ticketTypes($types)
    {
        if(!is_array($types)){
            return [];
        }

        $ticketTypes = [];

        foreach($types as $t){

            $ticketTypes[] = [
                'id' => $t['id'],
                'name' => $this->translations($t['description'], $t['name'])
            ];
        }

        return $ticketTypes;
    }

    public function ticketType($type)
    {
        if(!is_array($type)){
            return [];
        }

        return [
            'id' => $type['id'],
            'name' => $this->translations($type['description'], $type['name'])
        ];
    }

    private function translations($value, $default)
    {
        $value = explode("\n", $value);

        return [
            'ru' => $value[0],
            'en' => isset($value[1]) ? $value[1] : $default
        ];
    }

    public function getTicketsFromArray($ticketsArray)
    {
        if(!is_array($ticketsArray)){
            return [];
        }

        $tickets = [];

        foreach($ticketsArray as $ticketArray){
            $tickets[] = new Ticket($ticketArray);
        }

        return $tickets;
    }

    public function getTicketFromArray(array $ticketArray)
    {
        if(!is_array($ticketArray)){
            return null;
        }

        return new Ticket($ticketArray);
    }

    public function getCommentsFromArray(array $commentsArray)
    {
        if(!is_array($commentsArray)){
            return [];
        }

        $comments = [];

        foreach($commentsArray as $commentArray){
            $comments[] = new Comment($commentArray);
        }

        return $comments;
    }

}