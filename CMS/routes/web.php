<?php

// TODO controlladores

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ExcursionesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MisdatosController;
use App\Http\Controllers\SlideController;
use Doctrine\DBAL\Driver\Middleware;
// TODO Facades
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });



// TODO FONTEND (comentar para iniciar con login)
// Route::get('/',[FrontendController::class, 'inicio']);

// TODO lOGIN (comentar para iniciar con el front)
Route::get('/', function () {return view('auth.login');});


Auth::routes();

Route::view('/panel', '/auth.login')->middleware('auth')->name('panel.inicio');

Route::get('/inicio', [InicioController::class, 'index'])
->middleware('auth');




// TODO datos de perfil
//? Esto es para ir a la ruta (solo muestra una vista, nada mas)
Route::get('/misdatos', [MisdatosController::class, 'mostrarFormulario'])->name('misdatos.index')->middleware('auth');
//? Para cargar los datos desde el controllador MisdatosController
Route::put('/misdatos',[MisdatosController::class, 'update'])->name('misdatos.editar.usuarios');




// TODO para administrar usuarios
Route::get('/usuarios',[MisdatosController::class,'index'])->name('users.index');

Route::post('/crear-usuarios',[MisdatosController::class,'store'])->name('crear-usuarios');

Route::get('/crear-usuarios',[MisdatosController::class,'create'])->name('crear-usuarios');

Route::delete('/eliminar_usuarios/{id}',[MisdatosController::class,'destroy'])->name('usuarios.destroy');




// TODO Slide
// Mostrar lista de slides
Route::get('/mostrar-slide',[SlideController::class, 'index'])->name('index.slide');
//crear
Route::post('/crear-slide',[SlideController::class,'store'])->name('store.slide');
// eliminar
Route::delete('/eliminar-slide/{id}', [SlideController::class, 'destroy'])->name('eliminar.slide');



// TODO categorias
//? retornando vista
// Route::view('/categorias','modulos.categorias')->middleware('auth')->name('categorias.view');

//? retornando vista con datos
Route::get('/categorias-show',[CategoriasController::class, 'index'])->middleware('auth')->name('categorias.show');

// ?actualizando datos (iditando))
Route::put('/categorias/{categoria}',[CategoriasController::class, 'update'])->middleware('auth')->name('categorias.edit');

//?cargando los datos (creando)
Route::post('/categorias-store', [CategoriasController::class, 'store'])->middleware('auth')->name('categorias.store');

Route::delete('/categorias-delete/{categoria}',[CategoriasController:: class, 'destroy'])->middleware('auth')->name('categorias.eliminar');


// TODO excursiones
// ? retornando visa
// Route::view('/excursiones','modulos.excursiones')
// ->middleware('auth')
// ->name('excursiones.view');

// ? retornando vista con datos
Route::get('/excursiones-show',[ExcursionesController::class, 'index'])->middleware('auth')->name('excursiones.show');

// ? crear excursiones
Route::get('/excursiones-create',[ExcursionesController::class, 'create'])->middleware('auth')->name('excursiones.create');

// ? almacenar
Route::post('/excursiones-store',[ExcursionesController::class, 'store'])->middleware('auth')->name('excursiones.store');

// ? Eliminar
Route::delete('/excursiones-delete/{excu}',[ExcursionesController::class, 'destroy'])->middleware('auth')->name('excursiones.delete');

// ?editar
Route::get('/excursion/{excu}/edit',[ExcursionesController::class, 'edit'])->middleware('auth')->name('excursion');


