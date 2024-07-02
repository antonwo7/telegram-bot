<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bot extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }


    public function bot()
    {
        return $this->hasOne(Client::class);
    }
}
