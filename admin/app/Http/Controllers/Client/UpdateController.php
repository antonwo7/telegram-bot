<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\WebStoreRequest;
use App\Models\Bot;
use App\Models\Client;

class UpdateController extends Controller
{
    public function __invoke(WebStoreRequest $request, Client $client)
    {
        $data = $request->validated();

        $bot = Bot::find($data['bot_id']);

        if(!$bot){
            return redirect()->route('home');
        }

        $client->update($data);

        return redirect()->route('bot', [$bot->id]);
    }
}
