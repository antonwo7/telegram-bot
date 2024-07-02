<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreRequest;
use App\Models\Bot;
use App\Models\Client;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $bot = Bot::where('name', $data['telegram_bot'])->first();

        if(!$bot){
            return [
                'result' => false,
                'message' => 'Bot not found'
            ];
        }

        unset($data['telegram_bot']);

        $data['bot_id'] = $bot->id;

        $client = Client::create($data);

        if(!$client){
            return [
                'result' => false,
                'message' => 'Client creation error'
            ];
        }

        return [
            'result' => true,
            'client' => $client
        ];
    }
}
