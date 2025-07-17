<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Categorias;

class FrontendController extends Controller
{
    public function inicio(){
        $slide = Slide::all();
        $categorias= Categorias::all();
        return view('frontend.inicio', compact('slide','categorias'));
    }
}
