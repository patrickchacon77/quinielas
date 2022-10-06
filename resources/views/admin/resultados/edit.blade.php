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
            {!! Form::model($resultados, ['route' => ['admin.resultados.update', $resultados], 'method' => 'put']) !!}
                
                <div class="form-group">

                    {!! Form::label('partido_id', 'Seleccionar el partido apostar ') !!}
                    {!! Form::select('partido_id', $partidos, null,  ['class'=>'form-control']) !!}
                                
                    {{-- error de mensaje --}}
                    @error('partido_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('goles_equipo1', 'Goles equipo 1') !!}
                    {!! Form::number('goles_equipo1', null, ['class'=>'form-control', 'placeholder' => 'Ingrese los goles del equipo 1.']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('goles_equipo1')
                        <span class="text-danger">{{$message}}</span>
                    @enderror


                    {!! Form::label('goles_equipo2', 'Goles equipo 2') !!}
                    {!! Form::number('goles_equipo2', null, ['class'=>'form-control', 'placeholder' => 'Ingrese los goles del equipo 2.']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('goles_equipo2')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('puntos_apostados', 'Puntos apostar') !!}
                    {!! Form::number('puntos_apostados', null, ['class'=>'form-control', 'placeholder' => 'Ingrese la cantidad de puntos a apostar']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('puntos_apostados')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                {!! Form::submit('Actualizar apuesta', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

