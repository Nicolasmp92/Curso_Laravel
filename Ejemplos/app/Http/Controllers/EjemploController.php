<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class EjemploController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modulos.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rutaImg = $request[
            'image']->store('imagen-prueba','public');

        $datos= request()->validate([
            'nombre'=>'required|min:5',
            'image'=>'required|image']);

        DB::table('rols')->
        insert(['nombre'=>$datos["nombre"],
                'image'=>$rutaImg ]);


        return  Redirect::route('formulario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,$titulo,$categoria)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actualizar = DB::update('update ejemplo set titulo
        ="nuevo Titulo" where id = ?', [1] );
        return $actualizar;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
