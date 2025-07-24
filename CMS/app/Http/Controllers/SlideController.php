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
        $slide = Slide::orderBy('created_at', 'Desc')
                        ->paginate(5);
                        //!->get();despues de un paginate no colocar get


        return view ('modulos.slide')->with('slide',$slide );
    }

    // Muestra el formulario para crear un nuevo recurso.
    public function create()
    {
        //
    }

    // Creando
    public function store(Request $request){
        $nslide = $request->validate([
            'titulo'        => 'required|string|max:255',
            'descripcion'   => 'required|string|max:255',
            'imagen'        => 'required|image',
        ]);
        $rutaImg = $request->file('imagen')->store('imagen-prueba', 'public');
        $nslide =  new Slide();
        $nslide->titulo         =  $request->titulo;
        $nslide->descripcion    =  $request->descripcion;
        $nslide->imagen          =  $rutaImg;
        $nslide->save();
        return redirect()->route('index.slide')->with('toast_success','imagen creada con existo! 😃');
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
    return redirect()->route('index.slide')->with('toast_success','Slide Eliminado exitosamente! ✅');
    }
}
