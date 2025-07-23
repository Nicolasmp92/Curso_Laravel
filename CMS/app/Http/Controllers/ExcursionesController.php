<?php

namespace App\Http\Controllers;

use App\Models\Excursiones;
use App\Models\Categorias;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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

        return redirect()->route('excursiones.index')->with('toast_success', 'Excursión creada con éxito');
    }

    public function show(Excursiones $excursiones)
    {
        //
    }

    public function edit($id){
        $excu = Excursiones::findOrFail($id);
        $categorias = Categorias::all();
        return view('modulos.editar-excursion',compact('excu'))->with('categorias', $categorias);
    }

    public function update(Request $request, Excursiones $excu){

        // dd('¡Entró al update!', $request->all(), $excu);
        $request->validate([
            'titulo'        => 'required|max:20',
            'id_categoria'  => 'required',
            'descripcion'   => 'required|max:1000',
        ]);

        $excu->titulo           = $request->titulo;
        $excu->id_categoria     = $request->id_categoria;
        $excu->descripcion      = $request->descripcion;
        $excu->save();

        return redirect()->route('excursiones.edit', $excu->id)->with('toast_success','Datos Editados exitosamente!');
        // return redirect()->route('excursiones.index')->with('toast_success','Excursion editada exitosamente! 😄');
    }

    public function updateimg(Request $request, Excursiones $excu){
        $request->validate([
            'portada' => 'required|image'
        ]);
        if ($request->hasFile('portada')){
            if($excu->portada && Storage::disk('public')->exists($excu->portada)){
                Storage::disk('public')->delete($excu->portada);
            }
            $filename = Str::slug($excu->titulo).'-'.time().'.'. $request->portada->extension();
            $request->portada->storeAs('excursiones', $filename, 'public');
        $excu->portada = 'excursiones/'.$filename;
        $excu->save();
        }
        return redirect()->route('excursiones.edit', $excu->id)->with('toast_success','Portada cargada exitosamente!');


    }


    public function destroy( $id)
    {
        $excu = Excursiones::findOrFail($id);
        $excu -> delete();
        return redirect()->route('excursiones.index')->with('toast_success', 'Excursión eliminada!');
    }

}
