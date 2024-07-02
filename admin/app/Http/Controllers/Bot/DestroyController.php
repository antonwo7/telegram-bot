<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller
{
    public function __invoke(Bot $bot)
    {
        try{
            DB::beginTransaction();

            $clients = $bot->clients;

            if(!empty($clients)){
                foreach ($clients as $client){
                    $client->delete();
                }
            }

            $bot->delete();

        }catch(\Exception $exception){
            DB::rollBack();

        }finally{
            return redirect()->route('home');

        }
    }
}
