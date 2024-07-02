<?php


class Bot
{
    private $id;
    private $firstName;
    private $userName;
    private $telegram;

    public function __construct($token)
    {
        $this->telegram = new Telegram($token);

        $bot = $this->getBot();

        if(!$bot){
            return;
        }

        $this->id = $bot['id'];
        $this->firstName = $bot['first_name'];
        $this->userName = $bot['username'];
    }

    public function id()
    {
        return $this->id;
    }

    public function firstName()
    {
        return $this->firstName;
    }

    public function userName()
    {
        return $this->userName;
    }

    public function getBot()
    {
        $response = $this->telegram->send('getMe');

        return !empty($response['ok']) ? $response['result'] : null;
    }

    public function sendMessage($chatId, $text, $parseMode, $keyboardType = 'keyboard', $keyboard = null, $replyToMessageId = null)
    {
        $data = [
            'text' => $text,
            'chat_id' => $chatId,
            'parse_mode' => $parseMode,
            'reply_to_message_id' => $replyToMessageId
        ];

        if($keyboard){
            $data['reply_markup'] = [
                'resize_keyboard' => true,
                $keyboardType => $keyboard,
            ];
        }

        $message = $this->telegram->send('sendMessage', $data);

        return isset($message['result']['message_id'])
            ? $message['result']['message_id']
            : null;
    }

    public function sendSticker($chatId, $stickerUrl, $keyboardType = 'keyboard', $keyboard = null)
    {
        $data = [
            'sticker' => $stickerUrl,
            'chat_id' => $chatId
        ];

        if($keyboard){
            $data['reply_markup'] = [
                'resize_keyboard' => true,
                $keyboardType => $keyboard,
            ];
        }

        $message = $this->telegram->send('sendSticker', $data);

        return isset($message['result']['message_id'])
            ? $message['result']['message_id']
            : null;
    }

    public function deleteMessage($chatId, $messageId)
    {
        $this->telegram->send('deleteMessage', [
            'chat_id' => $chatId,
            'message_id' => $messageId
        ]);
    }

    public function changePermissions($chatId)
    {
        $this->telegram->send('setChatPermissions', [
            'chat_id' => $chatId,
            'can_send_messages' => false
        ]);
    }

    public function setLoading($chatId)
    {
        $loadingMessage = $this->telegram->send('sendMessage', [
            'text' => "\xF0\x9F\x95\x91",
            'chat_id' => $chatId,
            'parse_mode' => 'HTML',
        ]);

//        sleep(1);

        return isset($loadingMessage['result']['message_id'])
            ? $loadingMessage['result']['message_id']
            : null;
    }

    public function getFile($fileId)
    {
        return $this->telegram->file('getFile', [
            'file_id' => $fileId
        ]);
    }

    public function getFileUrl($fileId)
    {
        return $this->telegram->getFileUrl('getFile', [
            'file_id' => $fileId
        ]);
    }

    public function sendPhoto($chatId, $fileUrl, $keyboardType, $keyboard, $replyMessageId = null)
    {
        $data = [
            'chat_id' => $chatId,
            'photo' => $fileUrl,
            'reply_to_message_id' => $replyMessageId
        ];

        if($keyboardType && $keyboard){
            $data['reply_markup'] = [
                'resize_keyboard' => true,
                $keyboardType => $keyboard
            ];
        }

        return $this->telegram->send('sendPhoto', $data);
    }

    public function sendDocument($chatId, $fileUrl, $keyboardType, $keyboard, $replyMessageId = null)
    {
        $data = [
            'chat_id' => $chatId,
            'document' => $fileUrl,
            'reply_to_message_id' => $replyMessageId
        ];

        if($keyboardType && $keyboard){
            $data['reply_markup'] = [
                'resize_keyboard' => true,
                $keyboardType => $keyboard
            ];
        }

        $r = $this->telegram->send('sendDocument', $data);
        return $r;
    }
}