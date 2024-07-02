<?php

namespace App\Http\Controllers\Bot;

use App\Http\Requests\Bot\StoreRequest;
use App\Models\Bot;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->botService->fileUpload($request, $data);

        if(!isset($data['active']))
            $data['active'] = false;

        Bot::create($data);

        return redirect()->route('home');
    }
}
