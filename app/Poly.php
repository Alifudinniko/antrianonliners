<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poly extends Model
{
    protected $table = "polys";
    protected $fillable = [
        'id', 'name', 'status'
    ];
}
