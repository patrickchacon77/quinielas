@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Pais</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.paises.store']) !!}

                <div class="form-group">
                    {!! Form::label('nombre_pais', 'Nombre del país') !!}
                    {!! Form::text('nombre_pais', null, ['class'=>'form-control', 'placeholder' => 'Ingrese el país nuevo.']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('nombre_pais')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('continente', 'Nombre de cotinente') !!}
                    {!! Form::text('continente', null, ['class'=>'form-control', 'placeholder' => 'Ingrese el continente.']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('continente')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    
                    {!! Form::label('grupo', 'Grupo') !!}
                    {!! Form::text('grupo', null, ['class'=>'form-control', 'placeholder' => 'Ingrese el grupó.']) !!}
                    
                    {{-- error de mensaje --}}
                    @error('grupo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                
               
                </div>

                {!! Form::submit('Crear País', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

