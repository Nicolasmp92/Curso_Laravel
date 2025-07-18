<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SlideController extends Controller
{
    // Muestra una lista del recurso.
    public function index()
    {
        // $slide =  DB::select('select * from slide');
        $slide = Slide::orderBy('id', 'Desc')
        ->get();


        return view ('modulos.slide')->with('slide',$slide );
    }

    // Muestra el formulario para crear un nuevo recurso.
    public function create()
    {
        //
    }

    // Almacena un nuevo recurso en el almacenamiento.
   public function store(Request $request)
{
    $datos = $request->validate([
        'titulo'        => ['required', 'string', 'max:255'],
        'descripcion'   => ['required', 'string', 'max:255'],
        'imagen'        => ['required', 'image'],
    ]);

    $rutaImg = $request->file('imagen')->store('imagen-prueba', 'public');

    DB::table('slide')->insert([
        'titulo'        => $datos['titulo'],
        'descripcion'   => $datos['descripcion'],
        'imagen'        => $rutaImg,
    ]);
    // dd($datos, $rutaImg);

    // return view ('slide');
    return  Redirect::route('index.slide');
    // return redirect()->route('index.slide');
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
    public function destroy($id)
    {
        $slide = Slide::find($id);
        // se elimina el registro del almacenamiento esto funciona tanto en local como en produccion todo dependiendo de la configuracion utilizada en config/filesystems.php
        if ($slide && Storage::disk('public')->delete($slide->imagen)) {
            //aca se esta eliminando el dato de la BD con elocuent
        $slide->delete();
        }
    return redirect()->route('index.slide');
    }
}
