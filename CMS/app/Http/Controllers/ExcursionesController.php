<?php

namespace App\Http\Controllers;

use App\Models\Excursiones;
use Illuminate\Http\Request;

class ExcursionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modulos.crear-excursiones');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Excursiones $excursiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Excursiones $excursiones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Excursiones $excursiones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Excursiones $excursiones)
    {
        //
    }
}
