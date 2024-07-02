<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\WebStoreRequest;
use App\Models\Bot;
use App\Models\Client;

class WebStoreController extends Controller
{
    public function __invoke(WebStoreRequest $request)
    {
        $data = $request->validated();

        $bot = Bot::find($data['bot_id']);

        if(!$bot){
            return redirect()->route('home');
        }

        unset($data['telegram_bot']);

        $data['bot_id'] = $bot->id;

        $client = Client::create($data);

        if(isset($data['bot_id'])){
            return redirect()->route('bot', [$data['bot_id']]);
        }

        return redirect()->route('home');
    }
}
