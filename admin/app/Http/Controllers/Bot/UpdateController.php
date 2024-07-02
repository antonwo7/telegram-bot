<?php

namespace App\Http\Controllers\Bot;

use App\Http\Requests\Bot\StoreRequest;
use App\Models\Bot;

class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, Bot $bot)
    {
        $data = $request->validated();

        $this->botService->fileUpload($request, $data);

        if(!isset($data['active']))
            $data['active'] = false;

        $bot->update($data);

        return redirect()->route('home');
    }
}
