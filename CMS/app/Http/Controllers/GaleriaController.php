<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\Excursiones as ModelsExcursiones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Galeria $galeria)
    {
        //
    }

    public function edit($id)
    {
        $excu = ModelsExcursiones::findOrFail($id);
        $galeria = Galeria::all()->where('id_excursion',$id);
        return view('modulos.galerias')
                ->with('galeria',$galeria)
                ->with('excursion', $excu);


    // $excursion = ModelsExcursiones::findOrFail($galeria->excursion_id); // 👈 relaciona con la excursión correcta
    // return view('modulos.galerias', compact('excursion', 'galeria'));

    }

    public function update(Request $request,  $id)
    {
        $excu = ModelsExcursiones::findOrFail($id);
        // Valida que se hayan subido imágenes
        // dd($request->all());

        $request->validate([
            'imagenes' => 'required|array|min:1|max:5',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'excursion_id' => 'required|exists:excursiones,id',
        ], [
            // ! Aca se editan los mensajes de laraver que estan por defecto
            'imagenes.max' => 'ojo! No puedes subir más de 5 imágenes.',
            'imagenes.min' => 'Debes subir al menos una imagen.',
            'imagenes.required' => 'Por favor, selecciona al menos una imagen antes de Cargar.',
            'imagenes.*.image' => 'Cada archivo debe ser una imagen válida.',
            'imagenes.*.mimes' => 'Solo se permiten imágenes JPEG, PNG, JPG, GIF o SVG.',

        ]);

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                //*str_replace recibe deos parametros en este caso lo que busco es
                //* reeemplazar los espacioes en el titulo por lo tanto el 1 es el espacio
                //*  y el seguno por lo que lo reemplazare luego termina con el dato al que quiero aplicarle dicho cambio
                $nombreImagen =
                str_replace(' ', '_', $excu->titulo) . time() . '_' . $imagen->getClientOriginalName();
                $ruta = $imagen->storeAs('galeria', $nombreImagen, 'public');

                Galeria::create([
                    'excursion_id' => $request->excursion_id,
                    'imagen' => $ruta,
                ]);
            }
        }
        return redirect()->back()->with('toast_success', 'Imágenes subidas correctamente.');
    }

    public function destroy(Galeria $galeria)
    {
        // dd($galeria);
        // Verifica que sí exista una ruta válida
        if ($galeria->imagen && Storage::disk('public')->exists($galeria->imagen)) {
            Storage::disk('public')->delete($galeria->imagen);
        }

        $galeria->delete();

        return redirect()->back()->with('toast_success', 'Imagen eliminada exitosamente ✅');
    }



}
