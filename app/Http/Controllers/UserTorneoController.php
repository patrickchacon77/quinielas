<?php

namespace App\Http\Controllers;

use App\Models\User_torneo;
use App\Models\User;
use App\Models\Torneo;
use Illuminate\Http\Request;

class UserTorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitaciones = User_torneo::all();
        

        return view('admin.invitaciones.index', compact('invitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::all();
        $users = $users->pluck('name', 'id');

        $torneos = Torneo::all();
        $torneos = $torneos->pluck('nombre_torneo', 'id');

        return view('admin.invitaciones.create', compact('users', 'torneos'));
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

            // 'completado' => 'required',
            // // 'resultado' => 'required',
            // 'torneo_id' => 'required',
            // 'aceptada' => 'required',

        ]);

        $invitaciones = User_torneo::create($request->all());

        return redirect()->route('admin.invitaciones.index')->with('info', 'Invitación Enviada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_torneo  $user_torneo
     * @return \Illuminate\Http\Response
     */
    public function show(User_torneo $user_torneo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_torneo  $user_torneo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invitaciones = user_torneo::find($id);

        $users = User::all();
        $users = $users->pluck('name', 'id');

        $torneos = Torneo::all();
        $torneos = $torneos->pluck('nombre_torneo', 'id');

        return view('admin.invitaciones.edit', compact('invitaciones', 'users', 'torneos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_torneo  $user_torneo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'completado' => 'required',
        //     // 'resultado' => 'required',
        //     'fecha_partido' => 'required',
        //     'pais1_id' => 'required',
        //     'pais2_id' => 'required',
        //     'torneo_id' => 'required',

        // ]);

        $invitaciones = user_torneo::find($id);

        $users = User::all();
        $users = $users->pluck('name', 'id');

        $torneos = Torneo::all();
        $torneos = $torneos->pluck('nombre_torneo', 'id');

        $invitaciones->update($request->all());

        return redirect()->route('admin.invitaciones.edit', ['invitacione'=>$invitaciones,'users'=>$users,'torneos'=>$torneos])->with('info', 'El torneo se Actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_torneo  $user_torneo
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_torneo $user_torneo)
    {
        //
    }
}
