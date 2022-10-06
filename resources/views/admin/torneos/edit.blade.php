@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Actualizar Torneo</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif


    <div class="card">
        <div class="card-body">
            {!! Form::model($torneo, ['route' => ['admin.torneos.update', $torneo], 'method' => 'put']) !!}
                
                <div class="form-group">
                    {!! Form::label('nombre_torneo', 'Nombre del torneo') !!}
                    {!! Form::text('nombre_torneo', null, ['class'=>'form-control', 'placeholder' => 'Ingrese el torneo nuevo.']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('nombre_torneo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('sede_torneo', 'Nombre de la sede') !!}
                    {!! Form::text('sede_torneo', null, ['class'=>'form-control', 'placeholder' => 'Ingrese la sede.']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('sede_torneo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('tipo', 'Tipo de torneo') !!}
                    {!! Form::select('tipo', ['1' => 'opcion1', '2' => 'opcion2'],null, ['class'=>'form-control'])!!}                   
                    {{-- error de mensaje --}}
                    @error('tipo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                {!! Form::submit('Actualizar Torneo', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

