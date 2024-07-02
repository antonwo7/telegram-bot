<?php

namespace App\Http\Controllers;

use App\Http\Requests\GreetingRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Client;
use Illuminate\Http\Request;

class GreetingController extends Controller
{
    public function __invoke(GreetingRequest $request)
    {
        $data = $request->validated();

        $client = Client::where('telegram_account_id', $data['telegram_account_id'])
            ->whereHas('bot', function($query) use ($data){
                $query->where('name', $data['telegram_bot']);
            })->first();

        if(!$client){
            return [
                'result' => false,
                'message' => 'Client does not exist'
            ];
        }

        return [
            'result' => true,
            'bot_id' => $client->bot->id,
            'lang' => $client->lang,
            'msp_key' => $client->msp_key,
            'greeting' => [
                'text' => $client->bot->greeting,
                'image' => $client->bot->image
            ],
            'categories' => CategoryResource::collection(Category::all())
        ];
    }
}
