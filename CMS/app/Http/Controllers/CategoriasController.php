<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function index()
    {
        // TODO Existen dos formas

        // $categorias =  DB::select('select * from categorias');
        // return view ('modulos.categorias')->with('slide',$categorias );


        $categorias = Categorias::all();
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
        Categorias::create(['nombre' => $request->nombre]);
        return redirect()->route('categorias.show');
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorias $categoria)
    {
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.show');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorias $categoria)
    {
        $categoria->id = $categoria->delete();
        return redirect()->route('categorias.show');
    }
}
