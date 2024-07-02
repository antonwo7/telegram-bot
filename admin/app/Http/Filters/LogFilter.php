<?php

namespace App\Http\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class LogFilter extends AbstractFilter
{
    protected function getCallbacks(): array
    {
        return [
            'bot' => [$this, 'bot'],
            'client' => [$this, 'client'],
            'date_from' => [$this, 'dateFrom'],
            'date_to' => [$this, 'dateTo']
        ];
    }

    public function bot(Builder $builder, $value)
    {
        $builder->whereHas('bot', function($query) use ($value){
            $query->where('name', 'like', "%{$value}%");
        });
    }

    public function client(Builder $builder, $value)
    {
        $builder->whereHas('client', function($query) use ($value){
            $query->where('telegram_account', 'like', "%{$value}%");
        });
    }

    public function dateFrom(Builder $builder, $value)
    {
        $value = Carbon::parse($value);
        $builder->whereDate('created_at', '>=', $value);
    }

    public function dateTo(Builder $builder, $value)
    {
        $value = Carbon::parse($value);
        $builder->whereDate('created_at', '<=', $value);
    }
}
