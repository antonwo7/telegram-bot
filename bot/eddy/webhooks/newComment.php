<?php

include_once './../config.php';
include_once './../vendor/autoload.php';

$data = file_get_contents('php://input');
$data = json_decode($data, true);


if(!isset($data['ticket_id']) || !isset($data['user_id']) || empty($data['ticket_created_time']) || empty($data['bot'])  || empty($data['chat_id'])){
    return;
}

if(time() - intval($data['ticket_created_time']) > 20 && $data['user_id'] == 1){

    $memory = new Memory();

    $admin = new Admin($memory, $data['chat_id'], $data['bot']);

    $token = new Token($admin, $data['bot']);

    if(!$token->token()){
        return;
    }

    $bot = new Bot($token->token());

    $prevPage = $memory->getPage($bot->id(), $data['chat_id']);

    if($prevPage == "RequestItem:{$data['ticket_id']}"){

        $commentID = isset($data['ticket_created_time']) ? $data['ticket_created_time'] : 0;
        $commentText = isset($data['text']) ? $data['text'] : '';

        $comment = new Comment([
            'id' => $commentID,
            'date_created' => (new DateTime())->format("H:i:s d.m.Y"),
            'text' => $commentText,
            'files' => !empty($data['comment_files']) ? $data['comment_files'] : []
        ]);

        $messageId = $bot->sendMessage(
            $data['chat_id'],
            $comment->getContent(),
            'HTML'
        );

        $memory->rememberMessage(
            $bot->id(),
            $data['chat_id'],
            $messageId
        );

        $fileMessageId = null;

        foreach($comment->files() as $file)
        {
            if($file->isPhoto()){
                $fileMessageId = $bot->sendPhoto(
                    $data['chat_id'],
                    $file->url(),
                    'inline_keyboard',
                    null
                );

            }else{
                $fileMessageId = $bot->sendDocument(
                    $data['chat_id'],
                    $file->url(),
                    'inline_keyboard',
                    null
                );
            }

            if(isset($fileMessageId['result']['message_id'])){
                if($fileMessageId || $fileMessageId === 0){
                    $this->app->memory->rememberMessage(
                        $bot->id(),
                        $data['chat_id'],
                        $fileMessageId['result']['message_id']
                    );
                }
            }
        }

//        $messageId = $bot->sendMessage(
//            $data['chat_id'],
//            $comment->getContent(),
//            'HTML',
//            'inline_keyboard'
//        );
//
//        $memory->rememberMessage(
//            $bot->id(),
//            $data['chat_id'],
//            $messageId
//        );

        return;
    }

    $helpDesk = new HelpDesk();
    $helpDesk->setTicketViewStatus($data['ticket_id'], 0);

    $memory = new Memory();

    $lang = isset($data['lang']) ? $data['lang'] : LANG_DEFAULT;
    include_once ROOT_PATH . "content_{$lang}.php";

    $memory->rememberMessage(
        $bot->id(),
        $data['chat_id'],
        $bot->sendMessage(
            $data['chat_id'],
            NEW_NOTIFICATION_LABEL . " (ID: {$data['ticket_id']})",
            'HTML',
            'inline_keyboard',
            [ [
                ['text' => VIEW_LABEL, 'callback_data' => "ticket:{$data['ticket_id']}"]
            ] ]
        )
    );
}
