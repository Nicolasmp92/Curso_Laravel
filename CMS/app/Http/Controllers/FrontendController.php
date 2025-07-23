<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Categorias;
use App\Models\Excursiones;

class FrontendController extends Controller
{
    public function inicio(){
        $slide = Slide::all();
        $categorias= Categorias::orderBy('id','desc')->limit(8)->paginate(4);

        $excursiones = Excursiones::all()->sortByDesc('id')->take(4);
        //! mira muy importante
        //? tambien se puede usar sortByDesc pero solo con consultas ya cargadas osea all()
        // * para entender un poco sort trabaja sobre un select * from user y ordena con PHP
        //? por lo que se lee, es mas eficiente orderBy ya que viene ordenado desde la consulta
        // * orderBy ejecuta select *  from user oder by id desc (y claro mas parametros)
        // ? a.. el take te trae registros en este caso 4



        return view('frontend.inicio', compact('slide','categorias','excursiones'));

        // ? otra alternativa apra usar whit es
        // return view('frontend.inicio')
        //         ->with('slide',$slide)
        //         ->with('categorias',$categorias)
        //         ->with('excursiones',$excursiones);
    }

    public function mostrarexcu(){

        $excursiones = Excursiones::all();
        return view('frontend.todas-excursiones' ,compact('excursiones'));
    }
}
