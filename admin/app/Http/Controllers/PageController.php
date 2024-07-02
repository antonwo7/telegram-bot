<?php

namespace App\Http\Controllers;

use App\Http\Filters\LogFilter;
use App\Http\Requests\Log\FilterRequest;
use App\Models\Bot;
use App\Models\Category;
use App\Models\Log;
use App\Models\LogType;

class PageController extends Controller
{
    public function home()
    {
        $bots = Bot::orderBy('id', 'desc')->paginate(10);

        return view('home')
            ->with('bots', $bots);
    }

    public function bot(Bot $bot)
    {
        $clients = $bot->clients()->paginate(10);

        return view('clients')
            ->with('currentBotId', $bot->id)
            ->with('clients', $clients);
    }

    public function categories()
    {
        $categories = Category::orderBy('id')->paginate(10);

        return view('categories')
            ->with('categories', $categories);
    }

    public function logs(FilterRequest $request, LogType $logType = null)
    {
        $data = $request->validated();

        $page = $request['page'] ?? 1;
        $per_page = $request['per_page'] ?? 10;

        $filter = app()->make(LogFilter::class, ['queryParams' => array_filter($data)]);

        $logs = Log::filter($filter)->orderBy('id', 'desc')->paginate($per_page, ['*'], 'page', $page);

        $logTypes = LogType::orderBy('id')->get();

//        $logs = !$logType
//            ? Log::orderBy('id', 'desc')->paginate(10)
//            : Log::where('log_type_id', $logType->id)->orderBy('id', 'desc')->paginate(10);

        return view('logs')
            ->with('activeLogTypeId', $logType ? $logType->id : null)
            ->with('logTypes', $logTypes)
            ->with('logs', $logs);
    }
}
