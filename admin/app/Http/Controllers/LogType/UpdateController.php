<?php

namespace App\Http\Controllers\LogType;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogType\StoreRequest;
use App\Models\LogType;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, LogType $logType)
    {
        $data = $request->validated();

        $logType->update($data);

        return redirect()->route('logs');
    }
}
