<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function logs(){
        return $this->hasMany(Log::class, 'id', 'id');
    }

    public function bot()
    {
        return $this->belongsTo(Bot::class);
    }
}
