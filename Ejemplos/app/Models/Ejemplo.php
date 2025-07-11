<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Ejemplo extends Model
{
    // use SoftDeletes;
    protected $table ='tinker';

    protected $fillable = [
        // 'usuario_id',
        // 'categoria',
        // 'titulo',
        // 'prueba',
        'nombre',
        'contenido',

    ];

    // protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
