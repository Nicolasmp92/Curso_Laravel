<?php

use App\Http\Controllers\Empleados;
use Illuminate\Support\Facades\Route;

//! Esta sera mi vista principal
// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [Empleados::class, 'index'])
->name('inicio');

Route::get('crear-empleado', [Empleados::class, 'create'])
->name('empleados.create');

Route::post('crear-empleado', [Empleados::class, 'store'])
->name('empleados.store');

Route::get('show/{id}', [Empleados::class, 'show'])
->name('empleados.show');

Route::get('edit/{id}', [Empleados::class, 'edit'])
->name('empleados.edit');

Route::put('edit/{id}', [Empleados::class, 'update'])
->name('empleados.update');

Route::delete('delete/{id}', [Empleados::class, 'destroy'])
->name('empleados.delete');


