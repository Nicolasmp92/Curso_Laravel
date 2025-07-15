<?php

// TODO controlladores

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MisdatosController;
use App\Http\Controllers\SlideController;
// TODO Facades
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::view('/panel', '/auth.login')
->name('panel.inicio');

Route::get('/inicio', [InicioController::class, 'index']);




// TODO perfil
//! Esto es para ir a la ruta (solo muestra una vista, nada mas)
Route::get('/misdatos', [MisdatosController::class, 'mostrarFormulario'])
    ->name('misdatos.index')
    ->middleware('auth');//aca se proteje la ruta, esto quiere decir que si el usuario no esta logeado lo redirige al login



//! Para cargar los datos desde el controllador MisdatosController
Route::put('/misdatos',[MisdatosController::class, 'update'])
->name('misdatos.editar.usuarios');




// TODO usuarios
Route::get('/usuarios',[MisdatosController::class,'index'])
->name('users.index');

Route::get('/crear-usuarios',[MisdatosController::class,'create'])
->name('crear-usuarios');

Route::post('/crear-usuarios',[MisdatosController::class,'store'])
->name('crear-usuarios');

Route::delete('/eliminar_usuarios/{id}',[MisdatosController::class,'destroy'])
->name('usuarios.destroy');




// TODO Slide
// Mostrar lista de slides
Route::get('/mostrar-slide',[SlideController::class, 'index'])
->name('index.slide');
//crear
Route::post('/crear-slide',[SlideController::class,'store'])
->name('store.slide');
// eliminar
Route::delete('/eliminar-slide/{id}', [SlideController::class, 'destroy'])->name('eliminar.slide');




Route::get('/categorias', [CategoriasController::class, 'index'])
->name('index.cotegoria');

Route::get('/categorias', [CategoriasController::class, 'store'])
->name('store.cotegoria');




// TODO FONTEND
Route::get('/',[FrontendController::class, 'inicio']);
