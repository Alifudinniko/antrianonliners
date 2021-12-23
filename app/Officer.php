<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $fillable = [
        'nama', 'email', 'password', 'nik', 'alamat', 'telp', 'jenis_kelamin', 'role_id', 'poli', 'image'
    ];
}
