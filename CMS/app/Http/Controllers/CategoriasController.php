<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::orderBy('id','Desc')
                                ->limit(20)
                                ->get();


        return view('modulos.categorias')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ? para esto necesito tener filleable definido en el modelo
        // Categorias::create(['nombre' => $request->nombre]);
        // ? para esto no es necesario usar el filleble y es mas flexible frente a cambios
        $categoria = $request;
        $categoria =  new Categorias();
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.show')->with('toast_success','Categoria Creada Exitosamente! 🆗');
    }


    /**
     * Display the specified resource.
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorias $categorias)
    {
        //
    }
    //! Actualzar categorias
    public function update(Request $request, Categorias $categoria)
    {
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.show')->with('toast_success','Categoria Editada! 😊');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorias $categoria)
    {
        $categoria->id = $categoria->delete();
        return redirect()->route('categorias.show')->with('toast_success', 'Categoria eliminada con exito! 🗺️');
    }
}
