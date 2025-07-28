<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galeria';

    protected $fillable = [
        'excursion_id',
        'imagen'
        ];

        public function excursion()
        {
            return $this->belongsTo(Excursiones::class);
    }

}
