<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    // Muestra una lista del recurso.
    public function index()
    {
        return view ('modulos.slide');
    }

    // Muestra el formulario para crear un nuevo recurso.
    public function create()
    {
        //
    }

    // Almacena un nuevo recurso en el almacenamiento.
    public function store(Request $request)
    {
        $rutaImg = $request['imagen']->store('slide','public')
    }

    // Muestra el recurso especificado.
    public function show(Slide $slide)
    {
        //
    }

    // Muestra el formulario para editar el recurso especificado.
    public function edit(Slide $slide)
    {
        //
    }

    // Actualiza el recurso especificado en el almacenamiento.
    public function update(Request $request, Slide $slide)
    {
        //
    }

    // Elimina el recurso especificado del almacenamiento.
    public function destroy(Slide $slide)
    {
        //
    }
}
