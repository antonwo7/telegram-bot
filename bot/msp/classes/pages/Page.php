<?php

namespace MSP\Pages;


abstract class Page
{
    public $app;
    private $loadingWithoutDeleting;

    function __construct($app, $loadingWithoutDeleting = false)
    {
        $this->app = $app;
        $this->loadingWithoutDeleting = $loadingWithoutDeleting;

        $this->changePage();
    }

    public function rememberPage($id = null)
    {
        $pageSlug = str_replace("MSP\Pages\\", '', get_class($this));

        if($id !== null){
            $pageSlug .= ":{$id}";
        }

        $this->app->memory->rememberPage($this->app->bot->id(), $this->app->chat->id(), $pageSlug);
    }

    protected function getData(){}

    private function cleanHistory()
    {
        $messages = $this->app->memory->deleteMessages($this->app->bot->id(), $this->app->chat->id());

        foreach ($messages as $messageId){
            $this->app->bot->deleteMessage($this->app->chat->id(), $messageId);
        }
    }

    private function changePage()
    {
        if(!$this->loadingWithoutDeleting){
            $this->app->bot->deleteMessage($this->app->chat->id(), $this->app->message->id());

            $this->cleanHistory();

            $loadingMessageId = $this->app->bot->setLoading($this->app->chat->id());

            $this->getData();

        }else{
            $loadingMessageId = $this->app->bot->setLoading($this->app->chat->id());

            $this->getData();

            $this->app->bot->deleteMessage($this->app->chat->id(), $this->app->message->id());

            $this->cleanHistory();
        }

        $this->app->bot->deleteMessage($this->app->chat->id(), $loadingMessageId);
    }

    public static function analyzeEvent()
    {

    }

    public function render(){

    }
}