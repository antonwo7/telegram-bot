<?php


class Memory
{
    private $redis;
    private $localhost = 'localhost';
    private $port = 6379;

    public function __construct()
    {
        $this->redis = new Redis();
        $this->redis->connect($this->localhost, $this->port);
    }

    public function rememberMessage($botId, $chatId, $messageId)
    {
        $this->redis->sAdd("{$botId}@{$chatId}@messages", $messageId);
    }

    public function deleteMessages($botId, $chatId)
    {
        $messages = $this->redis->sMembers("{$botId}@{$chatId}@messages");
        $this->redis->del("{$botId}@{$chatId}@messages");

        return $messages;
    }

    public function rememberPage($botId, $chatId, $value)
    {
        $this->rememberValue($botId, $chatId, 'page', $value);
    }

    public function deletePage($botId, $chatId)
    {
        $this->deleteValue($botId, $chatId, 'page');
    }

    public function getPage($botId, $chatId)
    {
        return $this->getValue($botId, $chatId, 'page');
    }

    public function rememberArray($botId, $chatId, $field, $array)
    {
        $this->redis->set("{$botId}@{$chatId}@{$field}", json_encode($array));
    }

    public function getArray($botId, $chatId, $field)
    {
        return json_decode($this->redis->get("{$botId}@{$chatId}@{$field}"), true);
    }

    public function rememberValue($botId, $chatId, $field, $value)
    {
        $this->redis->set("{$botId}@{$chatId}@{$field}", $value);
    }

    public function deleteValue($botId, $chatId, $field)
    {
        $this->redis->del("{$botId}@{$chatId}@{$field}");
    }

    public function getValue($botId, $chatId, $field)
    {
        return $this->redis->get("{$botId}@{$chatId}@{$field}");
    }

    public function getToken($botName, $chatId)
    {
        return $this->redis->get("{$botName}@{$chatId}@api_token");
    }

    public function setToken($botName, $chatId, $token)
    {
        return $this->redis->set("{$botName}@{$chatId}@api_token", $token);
    }

    public function cleanMemory($botId, $chatId)
    {
        $this->deleteValue($botId, $chatId, 'requestCreationCategoryId');
        $this->deleteValue($botId, $chatId, 'requestCreationHeader');
        $this->deleteValue($botId, $chatId, 'requestCreationText');
        $this->deleteValue($botId, $chatId, 'requestCreationFileType');
        $this->deleteValue($botId, $chatId, 'requestCreationFileName');
        $this->deleteValue($botId, $chatId, 'requestCreationFiles');
    }
}