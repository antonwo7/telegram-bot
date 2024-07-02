<?php

namespace MSP;

class Service
{
    private $app;

    function __construct($app)
    {
        $this->app = $app;
    }


    public function changeTicketStatus($ticketId, $status)
    {
        $text = $status == 'open' ? REQUEST_OPENED_TEXT : REQUEST_CLOSED_TEXT;

        $this->app->helpDesk->addTicketComment($ticketId, [ 'text' => $text ], $this->app->user->mspKey());

        $this->app->helpDesk->changeTicketStatus($ticketId, $status);
    }

    public function addComment($ticketId)
    {
        $ticket = $this->app->helpDesk->getTicketById($ticketId);

        if($ticket->isClosed()){
            $this->showError('Запрос закрыт');

        }else{

            $commentData = [
                'text' => $this->app->message->text(),
                'user_id' => $this->app->user->helpDeskUserId()
            ];


            $fileId = null;

            if(!empty($this->app->message->photo())){
                $messagePhoto = $this->app->message->photo();
                $fileId = $messagePhoto[count($messagePhoto) - 1]['file_id'];
            }

            if(!empty($this->app->message->document())){
                $messageDocument = $this->app->message->document();
                $fileId = $messageDocument['file_id'];
            }

            if($fileId || $fileId === 0){
                $fileUrl = $this->app->bot->getFileUrl($fileId);
            }

            if(!empty($fileUrl)){
                $commentData['files[]'] = curl_file_create($fileUrl);
            }

            $this->app->helpDesk->addTicketComment($ticket->id(), $commentData, $this->app->user->mspKey());

            $this->app->memory->rememberMessage($this->app->bot->id(), $this->app->chat->id(), $this->app->message->id());
        }

        return true;
    }

//    public function processRequestFile($fileId, $fileType)
//    {
//        $this->app->memory->rememberMessage(
//            $this->app->chat->id(),
//            $this->app->message->id()
//        );
//
//        if(!$fileId && $fileId !== 0){
//            return null;
//        }
//
//        $fileUrl = $this->app->bot->getFileUrl($fileId);
//
//        $this->app->memory->rememberValue($this->app->chat->id(), 'requestCreationFileName', $fileUrl);
//        $this->app->memory->rememberValue($this->app->chat->id(), 'requestCreationFileType', $fileType);
//
//        return $fileUrl;

//        $file = $this->app->bot->getFile($fileId);
//
//        if(!$file){
//            return null;
//        }
//
//        $fileName = $this->app->chat->id() . '@' . $file['name'];
//
//        $this->app->memory->rememberValue($this->app->chat->id(), 'requestCreationFileName', $fileName);
//        $this->app->memory->rememberValue($this->app->chat->id(), 'requestCreationFileType', $fileType);
//
//        $filePath = FILES_PATH . $fileName;
//
//        file_put_contents($filePath, $file['content']);
//
//        return $fileName;
//    }

    public function rememberTicketFile()
    {
        $fileId = null;
        $fileType = '';

        if(!empty($this->app->message->photo())){
            $fileType = 'photo';
            $messagePhoto = $this->app->message->photo();
            $fileId = $messagePhoto[count($messagePhoto) - 1]['file_id'];
        }

        if(!empty($this->app->message->document())){
            $fileType = 'document';
            $messageDocument = $this->app->message->document();
            $fileId = $messageDocument['file_id'];
        }

        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->message->id()
        );

        if(!$fileId && $fileId !== 0){
            return null;
        }

        $fileUrl = $this->app->bot->getFileUrl($fileId);

        $rememberedTicketFiles = $this->app->memory->getValue($this->app->bot->id(), $this->app->chat->id(), 'requestCreationFiles');

        if($rememberedTicketFiles){
            $rememberedTicketFiles = json_decode($rememberedTicketFiles, true);
        }else{
            $rememberedTicketFiles = [];
        }

        $rememberedTicketFiles[] = [
            'url' => $fileUrl,
            'type' => $fileType
        ];

        $this->app->memory->rememberValue($this->app->bot->id(), $this->app->chat->id(), 'requestCreationFiles', json_encode($rememberedTicketFiles));

        return true;
    }

    public function showError($errorMessageText)
    {
        $errorMessageId = $this->app->bot->sendMessage($this->app->chat->id(), "\xE2\x9D\x97 {$errorMessageText} \xE2\x9D\x97", 'HTML');
        $this->app->bot->deleteMessage($this->app->chat->id(), $this->app->message->id());
        sleep(4);
        $this->app->bot->deleteMessage($this->app->chat->id(), $errorMessageId);

        return true;
    }

    public function createRequestFromMemory($ticketText)
    {
        $ticketText = strlen($ticketText) > REQUEST_TEXT_LIMIT ? substr($ticketText, 0, REQUEST_TEXT_LIMIT) . '...' : $ticketText;

        $typeId = $this->app->memory->getValue($this->app->bot->id(), $this->app->chat->id(), 'requestCreationCategoryId');

        $ticketTitle = $this->app->memory->getValue($this->app->bot->id(), $this->app->chat->id(), 'requestCreationHeader');

        $rememberedTicketFiles = $this->app->memory->getValue($this->app->bot->id(), $this->app->chat->id(), 'requestCreationFiles');

//        if($rememberedTicketFiles){
//            $rememberedTicketFiles = json_decode($rememberedTicketFiles, true);
//        }

        $helpDeskUserId = $this->app->user->helpDeskUserId();

        $ticket = [
            'title' => $ticketTitle,
            'description' => $ticketText,
            'type_id' => $typeId,
            'status' => 'open',
            'user_id' => $helpDeskUserId,
            'chat_id' => $this->app->chat->id(),
            'bot_id' => $this->app->bot->id()
        ];

        $ticket = $this->app->helpDesk->addTicket($ticket);

        if(!$ticket){
            return null;
        }

        $this->app->helpDesk->addTicketComment($ticket->id(), [ 'text' => $ticketText ], $this->app->user->mspKey());

//        if(is_array($rememberedTicketFiles) && count($rememberedTicketFiles) > 0){
//            foreach($rememberedTicketFiles as $file){
//                $this->app->helpDesk->addTicketCommentArray($ticket->id(), [
//                    'text' => 'Приложение',
//                    'user_id' => $helpDeskUserId,
//                    'files[]' => curl_file_create($file['url'])
//                ]);
//            }
//        }
//
        $ticketFirstComment = ENTER_REQUEST_RESULT_TEXT . PHP_EOL . "<b>ID запроса:</b> {$ticket->id()}";
        $ticketSecondComment = ENTER_REQUEST_RESULT_WAIT;

        $this->app->helpDesk->addTicketComment($ticket->id(), [ 'text' => $ticketFirstComment ]);
        $this->app->helpDesk->addTicketComment($ticket->id(), [ 'text' => $ticketSecondComment ]);

        $this->app->memory->cleanMemory($this->app->bot->id(), $this->app->chat->id());

        return $ticket;
    }

    public function regUser()
    {
        $this->app->admin->createUser($this->app->user, $this->app->input->botName());

        $this->app->helpDesk->createUser(
            $this->app->message->text(),
            $this->app->user->lang(),
            $this->app->user->id(),
            $this->app->user->userName()
        );

        $this->app->initWithUserExist();
    }
}
