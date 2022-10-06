<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Pais;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos = Torneo::all();

        return view('admin.torneos.index', compact('torneos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.torneos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_torneo' => 'required',
            'sede_torneo' => 'required',
            'tipo' => 'required'
        ]);

        $torneo = Torneo::create($request->all());



        return redirect()->route('admin.torneos.edit', $torneo)->with('info', 'El Torneo se creo con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function show(Torneo $torneo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function edit(Torneo $torneo)
    {

        return view('admin.torneos.edit', compact('torneo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Torneo $torneo)
    {
        $request->validate([
            'nombre_torneo' => 'required',
            'sede_torneo' => 'required',
            'tipo' => 'required'
        ]);

        $torneo->update($request->all());

        return redirect()->route('admin.torneos.edit', $torneo)->with('info', 'El torneo se Actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Torneo $torneo)
    {
        //
    }


    public function addPais($id)
    {
        $torneo = Torneo::find($id);
        $paises = Pais::all();
        $paises = $paises->pluck('nombre_pais', 'id');

        return view('admin.torneos.addPais', compact('torneo' , 'paises', 'id'));

    }

    public function guardarPais(Request $request)
    {   


        $torneo = Torneo::find($request->id);

        $torneo->paises()->attach($request->pais_id);
        $paises = Pais::all();
        $paises = $paises->pluck('nombre_pais', 'id');
        $id =  $torneo->id;

        return view('admin.torneos.addPais', compact('torneo' , 'paises', 'id'))->with('info', 'El torneo se Actualizo con éxito');

    }

}
