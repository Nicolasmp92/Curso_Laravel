<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;//!importar el modelo de users para usar
use Illuminate\Support\Facades\Hash;// para el uso de hash 👇

class UsersController extends Controller
{
    // ! Logica de roles
    public function isAdmin():bool{
        return $this->checkrole === 'admin';
    }
    public function isEditor(): bool
    {
        return $this->checkrole === 'editor';
    }

    public function isVentas(): bool
    {
        return $this->checkrole === 'ventas';
    }



    //  public function isAdmin(): bool
    // {
    //     return auth()->user() && auth()->user()->rol === 'admin';
    // }

    // public function isEditor(): bool
    // {
    //     return auth()->user() && auth()->user()->rol === 'editor';
    // }

    // public function isVentas(): bool
    // {
    //     return auth()->user() && auth()->user()->rol === 'ventas';
    // }





    // !listando usuarios
    public function index(){

        $usuarios =  User::where('id','!=', auth()->id())
                                ->orderBy('id','desc')
                                ->paginate(5);
                                //!->get(); no es necesario utilizar get si se pagina

        return view('modulos.usuarios')->with('usuarios', $usuarios);
    }
    // !retornando vista para la creacion de usuarios
    public function create(){
        return view('modulos.crear-usuarios');
    }
    // ! Crear nuevo usuario
    public function store(Request $request){
        $request->validate([
        'name'      => 'required|string|max:255',
        'email'     => 'required|email|unique:users,email,',
        'telefono'  => 'nullable|string|max:20',
        'rol'       => 'required|string|max:30',
        'password'  => 'nullable|min:6',
        //* confirmed es un valor en la validacion, para comparar si la pass coincide
        ]);


        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->telefono = $request->telefono;
        $user->rol      = $request->rol;
        $user->password = Hash::make($request->password); // 🔐 importante
        $user->save();

        //! 👇 por esto, se utiliza esto 👆 ya que asi se esesifica el dato
        //! asignado al request

        //! User::create($request->all()); solo en caso de que los campos
        //! sean exactos a los del modelo, de no ser asi, no sabe donde asignarlo y se cae
        // *Tambien se puede
        //* User::create([
        //*     'name'      => $request->name,
        //*     'email'     => $request->email,
        //*     'telefono'  => $request->telefono,
        //*     'rol'       => $request->rol,
        //*     'password'  => Hash::make($request->password), // 🔐
        //* ]);
        return redirect()->route('usuarios.index')->with('toast_success','Usuario Creado con exito!😉');
    }

    public function show(string $id){
        //
    }
    // ! mostrar usuarios
    public function edit(string $id){
        $user = User::findOrFail($id);
        return view('modulos.editar-usuarios',compact('user'));
    }

    // !actualozar usuario seleccionado
    public function update(Request $request, string $id){
        $user = User::findOrFail($id);
        $request->validate([
        'name'      => 'required|string|max:255',
        'email'     => 'required|email|unique:users,email,'. $user->id,
        'telefono'  => 'nullable|string|max:20',
        'rol'       => 'required|string|max:30',
        'password'  => 'nullable|min:6',
        ]);

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->telefono = $request->telefono;
        $user->rol      = $request->rol;
        $user->password = Hash::make($request->password); // 🔐 importante
        $user->update();

        return redirect()->route('usuarios.index')->with('toast_success','Usuario Actualizado con exito!😉');
    }

    // ! Eliminar Usuarios
    public function destroy($id){
        //? Aca no es mucho lo que hay que desarrollar, se intersepta el boton de eliminar con JS
        //? para asi confirmar su eliminacion con sweeet alert y luego se envia el Id Aca 👇
        $user = User::findOrFail($id);
        $user -> delete();//?no es necesario volver a llamr al modelo (User::delete)
        return redirect()->route('usuarios.index')->with('toast_warning', 'Usuario eliminado correctamente. 🙊');
    }
}
