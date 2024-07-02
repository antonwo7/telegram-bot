<?php

namespace App\Http\Controllers\LogType;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogType\StoreRequest;
use App\Models\LogType;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        LogType::create($data);

        return redirect()->route('logs');
    }
}
