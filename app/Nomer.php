<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nomer extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function poliy()
    {
        return $this->hasOne('App\Poly', 'id', 'id_poly');
    }
    public function namepoli()
    {
        return $this->hasOne('App\User', 'id', 'poli_id');
    }
    public function dokter()
    {
        return $this->hasOne('App\Dokter', 'id', 'dokter_id');
    }
}
