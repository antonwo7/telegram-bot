<?php

namespace MSP;


class Telegram
{
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function send($method, $data = [])
    {
        return Request::post(TELEGRAM_API_URL . $this->token . '/' . $method, $data);
    }

    public function file($method, $data)
    {
        $file = Request::get(TELEGRAM_API_URL . $this->token . '/' . $method, $data);

        if(!$file['result']['file_path']){
            return null;
        }

        $fileName = basename($file['result']['file_path']);

        $fileContent = Request::get(TELEGRAM_API_FILES_URL . $this->token . '/' . $file['result']['file_path']);

        if(!empty($fileContent['error_code'])){
            return null;
        }

        return [
            'name' => $fileName,
            'content' => $fileContent
        ];
    }

    public function getFileUrl($method, $data)
    {
        $file = Request::get(TELEGRAM_API_URL . $this->token . '/' . $method, $data);

        if(!$file['result']['file_path']){
            return null;
        }

        return TELEGRAM_API_FILES_URL . $this->token . '/' . $file['result']['file_path'];
    }
}