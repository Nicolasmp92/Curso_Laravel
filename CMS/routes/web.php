<?php

// TODO controlladores
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


Route::get('/',[FrontendController::class, 'inicio']);

// TODO perfil
//! Esto es para ir a la ruta (solo muestra una vista, nada mas)
Route::view('/misdatos', 'modulos.misdatos')
->name('misdatos.index');

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
// // muestra el formulario para crear
// Route::get('/fomr-slide',[SlideController::class,'create'])
// ->name('create.slide');
// Guardar slide
Route::post('/crear-slide',[SlideController::class,'store'])
->name('store.slide');
// eliminar
Route::delete('/eliminar_slide/{slide}',[SlideController::class ,'destroy'])
->name('eliminar.slide');


