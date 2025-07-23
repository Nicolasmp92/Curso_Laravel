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
        $usuario = Auth::user();
        $mostrarBloquePerfil = empty($usuario->image);

        if ($mostrarBloquePerfil) {
            session()->flash('toast_info', '¡Puedes subir tu imagen de perfil desde "Mis Datos"!');
        }

        return view('modulos.inicio', compact('mostrarBloquePerfil'));
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
