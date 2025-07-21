<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function index()
    {
        return view("modulos.inicio");
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Inicio $inicio)
    {
        //
    }


    public function edit(Inicio $inicio)
    {
        //
    }


    public function update(Request $request, Inicio $inicio)
    {
        //
    }


    public function destroy(Inicio $inicio)
    {
        //
    }
}
