<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Builder\Function_;

class MisdatosController extends Controller
{

    public function index()
    {
        $usuarios =  DB::select('select * from users');
        return view('modulos.usuarios')
        ->with('usuarios',$usuarios);
    }

    public function create()
    {
        return view('modulos.crear-usuarios');
    }

    public function store(Request $request)
    {
        $datos = request()-> validate([
            'name'      => ['required ','string','max:255'],
            'email'     => ['required ','string','email', 'max:255','unique:users'],
            'password'  => ['required ','string','min:5'],
            'rol'       => ['required'],
        ]);
        DB::table('users')->insert([
            'name'      => $datos['name'],
            'email'     => $datos ['name'],
            'rol'       => $datos ['rol'],
            'password'  => Hash::make($datos['password'])
        ]);
        return redirect('usuarios');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request)
    {
        if
        (auth()->user()->email != request('email')){
        $datos = request()->validate([
            'name'  => ['required ','string','max:255'],
            'email' => ['required ','string','max:255','unique:users'],
            'password' => ['required ','string','min:5'],
        ]);
        }else{
        $datos = request()->validate([
            'name'  => ['required ','string','max:255'],
            'email' => ['required ','string','max:255'],
            'password' => ['required ','string','min:5'],
        ]);
        }
        DB::table('users')->where('id', auth()->user()->id)
        ->update([
            'name'  => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password'])]);
         return redirect('misdatos');
        }

    public function destroy($id)
    {
        DB::delete('delete from users where id =' .$id);
        return redirect('usuarios.destroy');

    }
}
