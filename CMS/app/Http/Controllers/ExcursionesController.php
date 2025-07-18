<?php

namespace App\Http\Controllers;

use App\Models\Excursiones;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ExcursionesController extends Controller
{
    public function index()
    {
        $excursiones = Excursiones::all();
        return view('modulos.excursiones')->with('excursiones', $excursiones);
    }

    public function create()
    {
        $categorias = Categorias::all();
        return view('modulos.crear-excursiones')->with('categorias', $categorias);
    }

    public function store(Request $request)
    {
        $rutaImg = $request->file('portada')->store('excursiones', 'public');
        $datos = request();

        Excursiones::create([
            'titulo'        => $datos['titulo'],
            'id_categoria'  => $datos['id_categoria'],
            'descripcion'   => $datos['descripcion'],
            'portada'       => $rutaImg,
        ]);

        return redirect()->route('excursiones.create');
        // ->with('success', 'Excursión creada con éxito') este es un mensaje de alaerta que se le puede agregar
    }

    public function show(Excursiones $excursiones)
    {
        //
    }

    public function edit(Excursiones $excu)
    {
        // return view('modulos.editar-excursion',compact('excu'));
    }

    public function update(Request $request, Excursiones $excursiones)
    {
        //
    }

    public function destroy(Excursiones $excu)
    {
        $excu->id = $excu->delete();
        return redirect()->route('excursiones.show');
        // ->with('warning', 'Excursión eliminada')
    }
}
