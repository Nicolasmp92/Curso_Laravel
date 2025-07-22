<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{

    public function index()
    {
        // Verifica si el usuario está autenticado
        // $usuario = Auth::user();
        // // Si el usuario no tiene imagen de perfil
        // if (empty($usuario->image)) {
        //     return view("modulos.inicio")->with('toast_info', '¡Puedes subir tu imagen de perfil desde Mis Datos!');
        // }

        // Si tiene imagen, solo muestra la vista
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
