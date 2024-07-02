<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use App\Services\BotService;

class BaseController extends Controller
{
    public $botService;

    public function __construct(BotService $botService)
    {
        $this->botService = $botService;
    }
}
