<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Pais;
use App\Models\Torneo;
use Illuminate\Http\Request;
use App\Models\Resultado;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::all();

        $paises = Pais::all();
        

        return view('admin.partidos.index', compact('partidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::all();
        $paises = $paises->pluck('nombre_pais', 'id');

        $torneos = Torneo::all();
        $torneos = $torneos->pluck('nombre_torneo', 'id');



        return view('admin.partidos.create', compact('paises', 'torneos'));
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
            // 'resultado' => 'required',
            'fecha_partido' => 'required',
            'pais1_id' => 'required',
            'pais2_id' => 'required',
            'torneo_id' => 'required',

        ]);

        $partidos = Partido::create($request->all());

        $partidos->update([
            'titulo' => $partidos->pais1->nombre_pais." vs ".$partidos->pais2->nombre_pais
        ]);

        return redirect()->route('admin.partidos.edit', $partidos)->with('info', 'El Torneo se creo con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function show(Partido $partido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $partidos = Partido::find($id);
        $paises = Pais::all();
        $paises = $paises->pluck('nombre_pais', 'id');

        $torneos = Torneo::all();
        $torneos = $torneos->pluck('nombre_torneo', 'id');
        return view('admin.partidos.edit', compact('partidos', 'paises', 'torneos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partido $partido)
    {
        $request->validate([
            'completado' => 'required',
            // 'resultado' => 'required',
            'fecha_partido' => 'required',
            'pais1_id' => 'required',
            'pais2_id' => 'required',
            'torneo_id' => 'required',

        ]);

        $paises = Pais::all();
        $paises = $paises->pluck('nombre_pais', 'id');

        $torneos = Torneo::all();
        $torneos = $torneos->pluck('nombre_torneo', 'id');

        $partido->update($request->all());

        //dar puntos a todos.




        return redirect()->route('admin.partidos.edit', ['partido'=>$partido,'paises'=>$paises,'torneos'=>$torneos])->with('info', 'El torneo se Actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partido $partido)
    {
        //
    }

    public function actualizarPuntos(Partido $partido, $id){
        $resultados = Resultado::select('resultados.*', 'partidos.completado')
        ->join('partidos', 'partidos.id', '=', 'resultados.partido_id')
        ->where('partidos.completado', 1)
        ->where('id', $id)
        ->get();

        foreach ($resultados as $resultado) {
            if ($resultado->goles_equipo1==$partido->goles_equipo1&&$resultado->goles_equipo2==$partido->goles_equipo2) {
                # code...
            } else {
                # code...
            }
        }
        


    }
}
