<?php

namespace App\Http\Controllers\Log;

use App\Http\Controllers\Controller;
use App\Http\Requests\Log\StoreRequest;
use App\Models\Bot;
use App\Models\Client;
use App\Models\Log;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $client = Client::where('telegram_account_id', $data['client_id'])->first();

        if(!$client){
            return [ 'result' => false ];
        }

        $bot = Bot::where('name', $data['bot_name'])->first();

        if(!$bot){
            return [ 'result' => false ];
        }

        unset($data['client_id']);
        unset($data['bot_name']);

        $data['bot_id'] = $bot->id;
        $data['client_id'] = $client->id;

        $log = Log::create($data);

        return [ 'result' => $data ];
    }
}
