<?php


class RequestText extends Page
{
    private $category;
    private $ticketTitle;

    function __construct($app, $ticketTitle)
    {
        $this->ticketTitle = $ticketTitle;

        parent::__construct($app);

        $this->rememberPage();

        $ticketTitle = strlen($ticketTitle) > REQUEST_THEME_LIMIT ? substr($ticketTitle, 0, REQUEST_THEME_LIMIT) . '...' : $ticketTitle;

        $this->app->memory->cleanMemory($this->app->bot->id(), $this->app->chat->id());

        $this->app->memory->rememberValue($this->app->bot->id(), $this->app->chat->id(), 'requestCreationHeader', $ticketTitle);
    }

    protected function getData()
    {
        $categoryId = $this->app->memory->getValue($this->app->bot->id(), $this->app->chat->id(), 'requestCreationCategoryId');
        $this->category = $this->app->helpDesk->getTicketTypeById($categoryId);
    }

    private function getRequestContent()
    {
        return REQUEST_TYPE_LABEL . ": {$this->category['name'][$this->app->lang()]}" . PHP_EOL . REQUEST_THEME_LABEL . ": {$this->ticketTitle}";
    }

    public function render()
    {
        $messageText = $this->getRequestContent();

        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                $messageText,
                'HTML',
                'keyboard',
                [ [
                    ['text' => HOME_LABEL],
                    ['text' => BACK_LABEL]
                ] ]
            )
        );

        $this->app->memory->rememberMessage(
            $this->app->bot->id(),
            $this->app->chat->id(),
            $this->app->bot->sendMessage(
                $this->app->chat->id(),
                ENTER_REQUEST_TEXT_TEXT,
                'HTML'
            )
        );
    }
}