<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\EjemploController;
use App\Models\Ejemplo;
use App\Models\User;
use Illuminate\Queue\Attributes\DeleteWhenMissingModels;

//? enlace que dirije a la ruta por defecto al crear un proyecto Laravel
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/crear',function(){
//     Ejemplo::create([
//         'titulo'=>'prueba',
//         'categoria'=>'pruebas',
//         'usuario_id'=>'175224750',
//         'prueba'=>'prueba Noticias2']);
// });

// Route::get('/actualizar',function(){
//     Ejemplo::where('id',3)
//     ->where('prueba', 'prueba Noticias')
//     ->update(['titulo'=>'Titulo actualozado']);
// });

// Route::get('/eliminar',function(){
//     $eliminar = Ejemplo::find(3);
//     $eliminar -> delete();
// });

// Route::get('/insertar',function(){
//     Ejemplo::create(['titulo'=>'titulo 3', 'prueba'=>'prueba 3']);

// });
// //?eliminar de manera suave
// Route::get('/papelera',function(){
//     Ejemplo::find(6)->delete();

// });
// Route::get('/leer',function(){
//     $leer = Ejemplo::withTrashed()->where ('id',6)->get();
//     return $leer;

// });
// // ?restaura un dato que fue enviado a papelera
// Route::get('/recuperar',function (){
//     Ejemplo::withTrashed()->where('id',6)->restore();
// });

// // ?eliminar datos permanentemente de la papelera
// Route::get('/eliminarpapelera',function (){
//     Ejemplo::withTrashed()->where('id',6)->forceDelete();
// });

// Route::get('/usuario/{id}/post',function($id){
//     return User::find($id)->ejemplo;
// });

// Route::get('/post/{id}/usuario',function($id){
//     return User::find($id)->ejemplo;
// });

// Route::get('/ejemplo2',function(){
//     $usuario = User::find(1);
//     foreach ($usuario->ejemplo2 as $post);
//         echo $post->titulo."<br>";
// });

// Route::get('/usuario/{id}/rol',function($id){
//     $usuario = User::find($id);
//     foreach ($usuario->rols as $rol);
//         return $rol->nombre."<br>";
// });


// Muestra el formulario
Route::get('/formulario', [EjemploController::class, 'index'])->name('formulario.index');

// Procesa el formulario
Route::post('/formulario', [EjemploController::class, 'store'])->name('formulario.store');

// Procesa el formulario
Route::post('/formulario', [EjemploController::class, 'store'])->name('formulario.store');
