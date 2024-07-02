<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\DestroyRequest;
use App\Models\Client;

class DestroyController extends Controller
{
    public function __invoke(DestroyRequest $request, Client $client)
    {
        $data = $request->validated();

        $client->delete();

        if(isset($data['bot_id'])){
            return redirect()->route('bot', [$data['bot_id']]);
        }
        return redirect()->route('home');
    }
}
