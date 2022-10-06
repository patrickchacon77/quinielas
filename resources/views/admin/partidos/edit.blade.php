@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Actualizar Partido</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif


    <div class="card">
        <div class="card-body">
            {!! Form::model($partidos, ['route' => ['admin.partidos.update', $partidos], 'method' => 'put']) !!}
                
                <div class="form-group">

                    {!! Form::label('torneo_id', 'Seleccionar Torneo:* ') !!}
                    {!! Form::select('torneo_id', $torneos, null,  ['class'=>'form-control']) !!}
                                
                    {{-- error de mensaje --}}
                    @error('torneo_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('completado', 'Partido jugado') !!}
                    {!! Form::select('completado', ['1' => 'programado', '2' => 'curso', '3' => 'terminado'],null, ['class'=>'form-control'])!!}                   
                    {{-- error de mensaje --}}
                    @error('completado')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('pais1_id', 'Seleccionar Pais 1:* ') !!}
                    {!! Form::select('pais1_id', $paises, null,  ['class'=>'form-control']) !!}
                                
                    {{-- error de mensaje --}}
                    @error('pais1_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('goles_equipo1', 'Goles equipo 1') !!}
                    {!! Form::number('goles_equipo1', null, ['class'=>'form-control', 'placeholder' => 'Ingrese los goles del equipo 1.']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('goles_equipo1')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('pais2_id', 'Seleccionar Pais2:* ') !!}
                    {!! Form::select('pais2_id', $paises, null,  ['class'=>'form-control']) !!}
                                
                    {{-- error de mensaje --}}
                    @error('pais2_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('goles_equipo2', 'Goles equipo 2') !!}
                    {!! Form::number('goles_equipo2', null, ['class'=>'form-control', 'placeholder' => 'Ingrese los goles del equipo 2.']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('goles_equipo2')
                        <span class="text-danger">{{$message}}</span>
                    @enderror



                    {!! Form::label('fecha_partido', 'Fecha partido') !!}
                    {!! Form::date('fecha_partido', null, ['class'=>'form-control']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('fecha_partido')
                        <span class="text-danger">{{$message}}</span>
                    @enderror 
                
                </div>

                {!! Form::submit('Actualizar Partido', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

