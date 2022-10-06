<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resultado;
use App\Models\Partido;
use Illuminate\Support\Facades\Auth;

class ResultadoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultados = Resultado::select('resultados.*', 'partidos.completado')
                                        ->join('partidos', 'partidos.id', '=', 'resultados.partido_id')
                                        ->where('partidos.completado', 1)
                                        ->get();

        return view('admin.resultados.index', compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $partidos = Partido::all();
        $partidos = $partidos->pluck('titulo', 'id');

        return view('admin.resultados.create', compact('partidos'));
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
            'partido_id' => 'required',
            'goles_equipo1' => 'required',
            'goles_equipo2' => 'required',
            'puntos_apostados' => 'required'
        ]);

        $resultado;

        //if para asignar un estado.
        if ($request->goles_equipo1==$request->goles_equipo2) {
            $resultado = 'empate';
        }elseif($request->goles_equipo1>$request->goles_equipo2){
            $resultado = 'equipo1';
        }else{
            $resultado = 'equipo2';
        }



        $resultados = resultado::create([
            'partido_id' => $request->partido_id,
            'goles_equipo1' => $request->goles_equipo1,
            'goles_equipo2' => $request->goles_equipo2,
            'puntos_apostados' => $request->puntos_apostados,
            'user_torneo_id' => Auth::user()->user_torneo[0]->id,
            'updated_at' => $request->updated_at,
            'created_at' => $request->created_at,
            'resultado' => $resultado
        ]);

        



        return redirect()->route('admin.resultados.edit', $resultados)->with('info', 'El Torneo se creo con éxito');
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
    public function edit($id)
    {
        $resultados = Resultado::find($id);
        $partidos = Partido::all();
        $partidos = $partidos->pluck('titulo', 'id');


        return view('admin.resultados.edit', compact('partidos', 'resultados'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'partido_id' => 'required',
            'goles_equipo1' => 'required',
            'goles_equipo2' => 'required',
            'puntos_apostados' => 'required'
        ]);


        $resultados = Resultado::find($id);

        $resultado = resultado::create([
            'partido_id' => $request->partido_id,
            'goles_equipo1' => $request->goles_equipo1,
            'goles_equipo2' => $request->goles_equipo2,
            'puntos_apostados' => $request->puntos_apostados,
            'user_torneo_id' => Auth::user()->user_torneo[0]->id,
            'updated_at' => $request->updated_at,
            'created_at' => $request->created_at
        ]);

        $partidos = Partido::all();
        $partidos = $partidos->pluck('titulo', 'id');

        return redirect()->route('admin.resultados.edit', ['resultado'=>$resultado, 'partidos'=>$partidos])->with('info', 'El torneo se Actualizo con éxito');
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


}
