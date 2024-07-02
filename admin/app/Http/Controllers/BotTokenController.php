<?php

namespace App\Http\Controllers;

use App\Http\Requests\BotTokenRequest;
use App\Models\Bot;
use Illuminate\Http\Request;

class BotTokenController extends Controller
{
    public function __invoke(BotTokenRequest $request)
    {
        $data = $request->validated();

//        $bot = Bot::whereHas('clients', function($query) use ($data){
//                $query->where('telegram_account_id', $data['telegram_account_id']);
//            })->first();

        $bot = Bot::where('name', $data['telegram_bot'])->first();

//        if(!$bot){
//            return [
//                'result' => false,
//                'message' => 'Bot does not exist'
//            ];
//        }

        return [
            'result' => true,
            'bot_token' => $bot->token,
        ];
    }
}
