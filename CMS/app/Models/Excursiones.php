<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Excursiones extends Model
{
    protected $table    =  'excursiones';
    protected $fillable = [
        'titulo','portada','id_categoria','descripcion'
    ];

    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }
}
