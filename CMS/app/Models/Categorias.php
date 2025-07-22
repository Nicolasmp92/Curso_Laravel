<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = "categorias";

    protected $fillable = [
        'id',
        'nombre',
    ];

        public $timestamps = false;
}
