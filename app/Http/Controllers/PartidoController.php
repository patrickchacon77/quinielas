<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Pais;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        $resultado;

        //if para asignar un estado.
        if ($partido->goles_equipo1==$partido->goles_equipo2) {
            $resultado = 'empate';
        }elseif($partido->goles_equipo1>$partido->goles_equipo2){
            $resultado = 'equipo1';
        }else{
            $resultado = 'equipo2';
        }
        $partido->update([
            'resultado' => $resultado
        ]);

    
        $this->actualizarPuntos($partido); //Actualiza puntos de todos los usuarios

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

    public function vistaResultado()
    {
        $users = User::all();

        return 'prueba';

        return view('admin.partidos.tabla', compact('users'));
    }

    public function actualizarPuntos(Partido $partido){
        $resultados = Resultado::select('resultados.*', 'partidos.completado')
        ->join('partidos', 'partidos.id', '=', 'resultados.partido_id')
        ->where('partidos.completado', 3)
        ->where('partido_id', $partido->id)
        ->get();
        $user = User::find(Auth::user()->id);
        foreach($resultados as $resultado) {

            if ($resultado->resultado==$partido->resultado) {
                if ($resultado->goles_equipo1==$partido->goles_equipo1&&$resultado->goles_equipo2==$partido->goles_equipo2) {
                    $puntos = $user->puntos+3;
                    return $puntos;
                    $user->update([
                        'puntos'=>$puntos
                    ]);

                } else {
                    $puntos = $user->puntos+1;
                    $user->update([
                        'puntos'=>$puntos
                    ]);
                }

            }

        }

    }
}
