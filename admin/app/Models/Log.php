<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $guarded = [];

    public function logType()
    {
        return $this->belongsTo(LogType::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function bot()
    {
        return $this->belongsTo(Bot::class);
    }
}
