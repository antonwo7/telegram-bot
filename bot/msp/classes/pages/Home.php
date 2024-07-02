<?php

namespace MSP\Pages;


class Home extends Page
{
    private $unreadCommentsEmoji;
    private $ticketTypes;


    function __construct($app, $id = null)
    {
        parent::__construct($app);

        $this->rememberPage();
    }

    protected function getData()
    {
        $this->ticketTypes = $this->app->helpDesk->getTicketTypes();

        $unreadCommentsCount = $this->app->helpDesk->getUnviewedTicketsCount($this->app->user->helpDeskUserId());
        $this->unreadCommentsEmoji = $unreadCommentsCount > 0 ? "\x3{$unreadCommentsCount}\xE2\x83\xA3" : '';
    }

    public function render()
    {
        $greetingImage = $this->app->greeting->image() ?? DEFAULT_GREETING_IMAGE;

        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendSticker(
                $this->app->chat->id(),
                $greetingImage,
                'keyboard',
                [ [ ['text' => MY_REQUESTS_LABEL . " {$this->unreadCommentsEmoji}"] ] ]
            )
        );

        if(!empty($this->app->greeting->text())){
            $keyboard = array_map(function($category){
                return [
                    [
                        'text' => $category['name'][$this->app->lang()],
                        'callback_data' => "category:{$category['id']}"
                    ]
                ];
            }, array_values($this->ticketTypes));


            $this->app->memory->rememberMessage(
                $this->app->bot->id(),
                $this->app->chat->id(),
                $this->app->bot->sendMessage(
                    $this->app->chat->id(),
                    $this->app->greeting->text(),
                    'HTML',
                    'inline_keyboard',
                    $keyboard
                )
            );
        }
    }
}