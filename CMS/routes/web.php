<?php

// TODO controlladores

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ExcursionesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MisdatosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SlideController;
use Doctrine\DBAL\Driver\Middleware;
// TODO Facades
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// ! Aca se pasan todos los metodos para todas las rutas protegidas por auth esto no se borra
Auth::routes();
Route::view('/panel', '/auth.login')->middleware('auth')->name('panel.inicio');
// ?Cambio la ruta base a log in
Route::get('/', function () { return view('auth.login');});
// ? ruta para inicio del DASHBOARD
Route::get('/inicio', [InicioController::class, 'index'])->middleware('auth')->name('inicio.home');
// ? esto retorna welcome como pagina de inicio
// aca welcom esta cargando la pagina del front
// Route::get('/', function () {
//     return view('welcome');
// });



// TODO FONTEND (comentar para iniciar con login)
Route::get('/front',[FrontendController::class, 'inicio'])->name('front.view');
// TODO lOGIN (comentar para iniciar con el front)
Route::get('/excursiones-todas',[FrontendController::class, 'mostrarexcu'])->name('excursiones-index');


// TODO datos de PERFIL
//? Esto es para ir a la ruta (solo muestra una vista, nada mas)
Route::get('/misdatos', [MisdatosController::class, 'index'])->middleware('auth')->name('misdatos.index');
//? Para cargar los datos desde el controllador MisdatosController
Route::put('/misdatos',[MisdatosController::class, 'update'])->middleware('auth')->name('misdatos.editar.perfil');
// ?ruta pra la actualizacion de la imagen de perfil
Route::post('/misdatos/imagen', [MisdatosController::class, 'actualizarImagen'])->middleware('auth')->name('misdatos.imagen');
// ? para el cambio de la contraseña del perfil
Route::get('/misdatos-pass',[MisdatosController::class, 'ChangePass'])->middleware('auth')->name('misdatos.change.pass');
// ? ruta para cambiar la contraseña
Route::put('/misdatos-pass', [MisdatosController::class, 'updatePass'])->middleware('auth')->name('misdatos.update.pass');


// TODO para administrar USUARIOS
//? Esto es para ir a la ruta (si muestra datos, ver diferencia en controlador)
Route::get('/usuarios',[UsersController::class,'index'])->middleware('auth')->name('usuarios.index');
// ? mostrar formulario
Route::get('/crear-usuarios',[UsersController::class,'create'])->middleware('auth')->name('usuarios.create');
// ? guarda nuevos datos en DB
Route::post('/crear-usuarios',[UsersController::class,'store'])->middleware('auth')->name('usuarios.store');
//? muestro una vista con los datos necesarios para editar usuarios
Route::get('editar-usuarios/{id}/edit',[UsersController::class, 'edit'])->middleware('auth')->name('usuarios.edit');
// tomo los datos de esa vista y los paso para subirlos a la DB
Route::post('editar-usuarios/{id}/edit',[UsersController::class, 'update'])->middleware('auth')->name('usuarios.update');
// ? Eliminar usuarios
Route::delete('/eliminar_usuarios/{id}',[UsersController::class,'destroy'])->middleware('auth')->name('usuarios.destroy');


// TODO Slide
//? Mostrar lista de slides
Route::get('/mostrar-slide',[SlideController::class, 'index'])->name('index.slide');
//? crear
Route::post('/crear-slide',[SlideController::class,'store'])->name('store.slide');
//? eliminar
Route::delete('/eliminar-slide/{id}', [SlideController::class, 'destroy'])->name('eliminar.slide');


// TODO categorias
//? retornando vista
// Route::view('/categorias','modulos.categorias')->middleware('auth')->name('categorias.view')
//? retornando vista con datos
Route::get('/categorias-show',[CategoriasController::class, 'index'])->middleware('auth')->name('categorias.show');
// ?actualizando datos (iditando))
Route::put('/categorias/{categoria}',[CategoriasController::class, 'update'])->middleware('auth')->name('categorias.edit');
//?cargando los datos (creando)
Route::post('/categorias-store', [CategoriasController::class, 'store'])->middleware('auth')->name('categorias.store');
// ?eliminando categorias
Route::delete('/categorias-delete/{categoria}',[CategoriasController:: class, 'destroy'])->middleware('auth')->name('categorias.eliminar');


// TODO excursiones
// ? retornando vista con datos
Route::get('/excursiones-show',[ExcursionesController::class, 'index'])->middleware('auth')->name('excursiones.index');
// ? crear excursiones
Route::get('/excursiones-create',[ExcursionesController::class, 'create'])->middleware('auth')->name('excursiones.create');
// ? almacenar
Route::post('/excursiones-store',[ExcursionesController::class, 'store'])->middleware('auth')->name('excursiones.store');
// ? Eliminar
Route::delete('/excursiones-delete/{excu}',[ExcursionesController::class, 'destroy'])->middleware('auth')->name('excursiones.delete');
//? Buscar
Route::get('editar-excursiones/{id}/edit',[ExcursionesController::class, 'edit'])->middleware('auth')->name('excursiones.edit');
// ? Actualizar excursion
Route::put('editar-excursiones/{excu}', [ExcursionesController::class, 'update'])->name('excursiones.update');
// ? mosrtar todas las exurciones
Route::get('/excursion-showall',[ExcursionesController::class, 'showall'])->middleware('auth')->name('excrusriones.showall');
// ? mostrar excursion con show
Route::get('/excursion-showone/{excu}',[ExcursionesController::class, 'showone'])->middleware('auth')->name('excrusrion.showone');



