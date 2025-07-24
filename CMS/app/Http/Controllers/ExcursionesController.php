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

    public function edit($id)
    {
        $excu = Excursiones::findOrFail($id);
        $categorias = Categorias::all();
        return view('modulos.editar-excursion', compact('excu'))->with('categorias', $categorias);
        //! cambiar a solo with
    }
public function update(Request $request, Excursiones $excu){
    // Validar todo lo que podría venir
    $request->validate([
        'titulo'        => 'required|max:20',
        'id_categoria'  => 'required',
        'descripcion'   => 'required|max:1000',
        'portada'       => 'nullable|image', // Solo si se envía imagen, que sea válida
    ]);
    // Actualizar los campos de texto
    $excu->titulo           = $request->titulo;
    $excu->id_categoria     = $request->id_categoria;
    $excu->descripcion      = $request->descripcion;
    // Si viene una imagen en el formulario
    if ($request->hasFile('portada')) {
        // Elimina la imagen anterior si existe
        if ($excu->portada && Storage::disk('public')->exists($excu->portada)) {
            Storage::disk('public')->delete($excu->portada);
        }
        // Genera nuevo nombre único y guarda la imagen
        $filename = Str::slug($excu->titulo) . '-' . time() . '.' . $request->portada->extension();
        $request->portada->storeAs('excursiones', $filename, 'public');
        // Guarda la nueva ruta en la base de datos
        $excu->portada = 'excursiones/' . $filename;
    }
    // Guardar todos los cambios
    $excu->save();
    return redirect()
        ->route('excursiones.edit', $excu->id)
        ->with('toast_success', 'Excursión actualizada exitosamente!');
    }
    public function destroy($id)
    {
        $excu = Excursiones::findOrFail($id);
        if ($excu->portada && Storage::disk('public')->exists($excu->portada)) {
            Storage::disk('public')->delete($excu->portada);
        }
        $excu->delete();
        return redirect()->route('excursiones.index')->with('toast_success', 'Excursión eliminada!');
    }


// TODO FRONT
  //! mostraremos la excursion seleccionada en todas-excursiones
    public function showall(Excursiones $excursiones){
        $excursiones =  Excursiones::findOrFail($excursiones);
        return view('frontend.todas-excursiones', compact('excursiones'));
    }

    public function showone(Excursiones $excu){
            $excu =  Excursiones::findOrFail($excu);
            return view('frontend.mostrar-excursion', compact('excursion'));
        }











}
