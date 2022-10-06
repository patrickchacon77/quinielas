@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Pais</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.torneos.guardarPais']) !!}

                <div class="form-group">
                    {!! Form::hidden('id', $id) !!}

                    {!! Form::label('pais_id', 'Seleccionar Pais:* ') !!}
                    {!! Form::select('pais_id', $paises, null,  ['class'=>'form-control']) !!}
                                
                    {{-- error de mensaje --}}
                    @error('pais_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

              
                
                </div>

                {!! Form::submit('Agregar Torneo', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

