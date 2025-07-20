<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;//!importar el modelo de users para usar

class UsersController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('id', 'Desc')->get();
        return view('modulos.usuarios')->with('usuarios', $usuarios);

    }

    public function create()
    {
        return view('modulos.crear-usuarios');
    }


    public function store(Request $request)
    {
        $datos = request()->validate([
        'name'      => 'required|string|max:255',
        'email'     => 'required|email|unique:users,email,' . auth()->id(), //! . auth()->id(), esto es para que laravel no choque con el mismo correo si el correo ya existe
        'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'telefono'  => 'nullable|string|max:20',
        'estado'    => 'nullable|boolean',
        'password'  => 'nullable|min:6|confirmed',//! confirmed es para validar que esten bien escritos (password_confirmation) en el formulario para que funcione
        ]);

        // $users = new User(); esto es util pero si se esta creando un nuvo usuario desde cero
        $user           = new User(); // esto aplica mas al caso actual ya que se estand editando los datos del usuario actual (logeado)
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->rol      = $request->rol;
        $user->password = Hash::make($request->password);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/usuarios', $filename);
            $user->image = 'usuarios/' . $filename;
        }
        $user->save();
        return redirect()->route('users.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user = User::delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado');
    }
}
