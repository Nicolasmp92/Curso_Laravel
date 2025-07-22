<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class MisdatosController extends Controller
{
    //! Actualizar foto de perfil 🔄
    public function actualizarImagen(Request $request){
        $request->validate([
            'image' => 'required|image',
        ]);
        $user = Auth::user();
        if ($request->hasFile('image')){
            // ? si la imagen existe la elimina
            if($user->image && Storage::disk('public')->exists($user->image)){
                Storage::disk('public')->delete($user->image);
            }
            // ?guardo la imagen, concatenando nombre la fecha y su extencion, en public/usuarios
            $filename = Str::slug($user->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->storeAs('usuarios', $filename, 'public');

            // ? actualiza la ruta en la base de datos tomando el la carpeta usuarios/ y el nombre del archivo
            $user->image = 'usuarios/'.$filename;
            $user->save();
        }
        return redirect()->back()->with('toast_success', 'imagen actualizada correctamente!😀.');
    }

    //! vista para los datos de perfil
    public function index(){
        return view('modulos.misdatos');
    }

    // ! Cambiar Actualizar datos de perfil 🙍
    public function update(Request $request){
        //*$user = auth()->user();  Usuario autenticado
        $user = Auth::user();
        // Validamos los campos
        $datos = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id, // permite que use su propio correo
            'telefono' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:5|confirmed', // se vuelve opcional
        ]);

            // Asignamos los nuevos valores
            $user->name     = $datos['name'];
            $user->email    = $datos['email'];
            $user->telefono = $datos['telefono'] ?? null; // por si viene vacío

            // Solo si viene un password nuevo lo actualizamos
            if (!empty($datos['password'])) {
                $user->password = Hash::make($datos['password']);
            }

            $user->save();

        return redirect()->route('misdatos.index')->with('toast_success', 'Datos actualizados correctamente.👌');
    }

    // ! vista para cambiar la contraseña 👀
    public function ChangePass(){
        return view('modulos.cambiar-password');
    }

    // !actualizamos la contraseña 🔐
    public function updatePass(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed', // Debe venir también 'password_confirmation'
        ]);

        $user = Auth::user();
        // Verificamos la contraseña actual
        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['La contraseña actual no es correcta.'],
            ]);
        }

        // Guardamos la nueva contraseña
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('misdatos.index')->with('toast_success', 'Contraseña actualizada correctamente. 🔑');
    }



}
