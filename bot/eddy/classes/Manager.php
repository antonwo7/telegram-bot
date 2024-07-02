<?php


class Manager
{
    private $app;
    private $service;

    public function __construct($input)
    {
        $this->app = new App($input);
        $this->service = new Service($this->app);
    }

    public function run()
    {
        $command = $this->app->message->text();
        $data = $this->app->message->data();
        $comment = $this->app->message->comment();

//        if($comment != null){
//            return $this->service->sendNotification($comment);
//        }

        if($this->app->prevPage == 'UnknownUser' && $command == REGISTRATION_LABEL){
            return View::render(Registration::class, $this->app);
        }

        if($this->app->prevPage == 'UnknownUser' && !empty($command)){
            return View::render(UnknownUser::class, $this->app);
        }

        if($this->app->prevPage == 'Registration' && (empty($command) && (!empty($this->app->message->photo()) || !empty($this->app->message->document())))){
            return $this->service->showError(ENTER_TEXT_LABEL);
        }

        if($this->app->prevPage == 'Registration' && !empty($command) ){

            $this->service->regUser();
            return View::render(Home::class, $this->app);
        }

        if($command == '/start' || $command == HOME_LABEL){
            return View::render(Home::class, $this->app);
        }

        if(!$this->app->prevPage) {
            return View::render(Home::class, $this->app);
        }

        if(preg_match("/" . MY_REQUESTS_LABEL . ".*/", $command)){
            return View::render(RequestStatuses::class, $this->app);
        }

        if($this->app->prevPage == 'RequestHeader' && $command == BACK_LABEL){
            return View::render(Home::class, $this->app);
        }

        if($this->app->prevPage == 'RequestText' && $command == BACK_LABEL){
            return View::render(RequestHeader::class, $this->app);
        }

        if($data)
        {
            if(preg_match("/category:(\d+)/", $data, $matches)){

                return View::render(RequestHeader::class, $this->app, $matches[1]);

            } elseif(preg_match("/ticket:([\S]+)/", $data, $matches)){

                return View::render(RequestItem::class, $this->app, $matches[1]);

//            } elseif(preg_match("/closeTicket:(\d+)/", $data, $matches)){
//
//                $this->service->changeTicketStatus($matches[1], 'closed');
//                return View::render(Home::class, $this->app);

//            } elseif(preg_match("/openTicket:(\d+)/", $data, $matches)){
//
//                $this->service->changeTicketStatus($matches[1], 'open');
//                return View::render(Requests::class, $this->app, 'open');

            } elseif(preg_match("/requests:(.+)/", $data, $matches)){

                return View::render(Requests::class, $this->app, $matches[1]);

            }
        }

        if($command == CLOSE_REQUEST_LABEL && preg_match("/RequestItem:(\d+)/", $this->app->prevPage, $matches)){

            $this->service->changeTicketStatus($matches[1], 'closed');
            return View::render(Home::class, $this->app);
        }

        if($command == OPEN_REQUEST_LABEL && preg_match("/RequestItem:(\d+)/", $this->app->prevPage, $matches)){

            $this->service->changeTicketStatus($matches[1], 'open');
            return View::render(Home::class, $this->app);
        }

        if(preg_match("/RequestItem:(\d+)/", $this->app->prevPage, $matches)){
            return $this->service->addComment($matches[1]);
        }

        if(preg_match("/RequestResult:(\d+)/", $this->app->prevPage, $matches)){
            return $this->service->addComment($matches[1]);
        }

        if($this->app->prevPage == 'RequestHeader' && (empty($command) && (!empty($this->app->message->photo()) || !empty($this->app->message->document())))){
            return $this->service->showError(ENTER_TEXT_LABEL);
        }

        if($this->app->prevPage == 'RequestHeader' && !empty($command)){
            return View::render(RequestText::class, $this->app, $command);
        }

        if($this->app->prevPage == 'RequestText' && (!empty($this->app->message->photo()) || !empty($this->app->message->document()))){
            return $this->service->rememberTicketFile();
        }

        if($this->app->prevPage == 'RequestText' && !empty($command)){
            return View::render(RequestResult::class, $this->app, $command, $this->service);
        }

        return View::render(UnknownCommand::class, $this->app);
    }
}
