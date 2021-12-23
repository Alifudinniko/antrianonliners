<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $guarded = [];

    public function officer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
