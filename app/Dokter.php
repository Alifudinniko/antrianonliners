<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = "dokters";
    protected $guarded = [];
    public function poliy()
    {
        return $this->belongsTo(Poly::class);
    }
    public function polii()
    {
        return $this->hasOne('App\Poly', 'id', 'poli');
    }
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    // public function nomer()
    // {
    //     return $this->hasMany('App\Nomer', 'dokter_id', 'id');
    // }
}
