<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = "sesis";
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function dokter()
    {
        return $this->hasOne('App\Dokter', 'id', 'dokter_id');
    }
}
