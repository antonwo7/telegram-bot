<?php

namespace App\Http\Controllers\LogType;

use App\Http\Controllers\Controller;
use App\Models\LogType;

class DestroyController extends Controller
{
    public function __invoke(LogType $logType)
    {
        $logType->delete();
        return redirect()->route('logs');
    }
}
