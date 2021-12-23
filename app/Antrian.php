<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = [
        'id_poly', 'id_user', 'status'
    ];
    protected $table = "antrians";

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function poliy()
    {
        return $this->hasOne('App\Poly', 'id', 'id_poly');
    }
}
