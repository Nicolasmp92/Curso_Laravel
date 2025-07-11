<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\store;
use App\Models\Empleado;

class Empleados extends Controller
{

    public function index()
    {
        $empleados=DB::select('select * from empleados');
        return view('inicio')->with('empleados',$empleados);
    }
    public function create()
    {
        return view('crear-empleado');
    }
    public function store(Request $request)
    {
    $datos = request()->validate([
        'nombre'    => ['required', 'string', 'max:20'],
        'apellido'  => ['required', 'string', 'max:20'],
        'telefono'  => ['required', 'string', 'max:15'],
        'salario'   => ['required', 'string', 'max:15'],
    ]);
    DB::table('empleados')->insert([
        'nombre'    => $datos["nombre"],
        'apellido'  => $datos["apellido"],
        'telefono'  => $datos["telefono"],
        'salario'   => $datos["salario"]
    ]);
    return redirect('crear-empleado');
    }
    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view ('empleado')->with('empleado',$empleado);
    }


    public function edit(string $id)
    {
        // recuerda que edit solo disponibiliza los datos para cargarlos
        $empleado = Empleado::find($id);
        return view ('editar-empleado')->with('empleado',$empleado);
    }


    public function update(Request $request, $id)
    {
        $datos = request()->validate([
        'nombre'    => ['required', 'string', 'max:20'],
        'apellido'  => ['required', 'string', 'max:20'],
        'telefono'  => ['required', 'string', 'max:15'],
        'salario'   => ['required', 'string', 'max:15'],
    ]);
    DB::table('empleados')->where('id', $id)->update([
        'nombre'    => $datos["nombre"],
        'apellido'  => $datos["apellido"],
        'telefono'  => $datos["telefono"],
        'salario'   => $datos["salario"]
    ]);
    return redirect('/');

    }


    public function destroy(string $id)
    {
        DB::table('empleados' )->where('id',$id)->delete();
        return redirect('/');
    }
}
