<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MisdatosController extends Controller
{
    public function mostrarFormulario()
    {
        return view('modulos.misdatos');
    }


    public function index()
    {

        $usuarios = User::orderBy('id', 'Desc')->get();


            return view('modulos.usuarios')
            ->with('usuarios', $usuarios);
    }

    public function create()
    {
        return view('modulos.crear-usuarios');
    }

    public function store(Request $request)
    {
        $datos = request()->validate([
            'name'      => ['required ', 'string', 'max:255'],
            'email'     => ['required ', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required ', 'string', 'min:5'],
            'rol'       => ['required'],
        ]);


        $users = new User();
        $users->name    = $request->name;
        $users->email   = $request->email;
        $users->rol     = $request->rol;
        $users->password = Hash::make($request->password);
        $users->save();

        // DB::table('users')->insert([
        //     'name'      => $datos['name'],
        //     'email'     => $datos['name'],
        //     'rol'       => $datos['rol'],
        //     'password'  => Hash::make($datos['password'])
        // ]);

        return redirect()->route('users.index');



    }

    public function show(string $id) {}

    public function edit(string $id) {}

    public function update(Request $request)
    {
        if (auth()->user()->email != request('email')) {
            $datos = request()->validate([
                'name'  => ['required ', 'string', 'max:255'],
                'email' => ['required ', 'string', 'max:255', 'unique:users'],
                'password' => ['required ', 'string', 'min:5'],
            ]);
        } else {
            $datos = request()->validate([
                'name'  => ['required ', 'string', 'max:255'],
                'email' => ['required ', 'string', 'max:255'],
                'password' => ['required ', 'string', 'min:5'],
            ]);
        }
        DB::table('users')->where('id', auth()->user()->id)
            ->update([
                'name'  => $datos['name'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['password'])
            ]);
        return redirect('misdatos');
    }

    public function destroy($id)
    {
        DB::delete('delete from users where id =' . $id);
        return redirect('usuarios.destroy');
    }
}
