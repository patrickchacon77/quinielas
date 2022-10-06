@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Invitación </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.invitaciones.store']) !!}

                <div class="form-group">

                    {!! Form::label('user_id', 'Usuario :* ') !!}
                    {!! Form::select('user_id', $users, null,  ['class'=>'form-control']) !!}
                                
                    {{-- error de mensaje --}}
                    @error('user_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {!! Form::label('torneo_id', 'Torneo :* ') !!}
                    {!! Form::select('torneo_id', $torneos, null,  ['class'=>'form-control']) !!}
                                
                    {{-- error de mensaje --}}
                    @error('torneo_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    {!! Form::hidden('aceptada', '1') !!}


  
                </div>

                {!! Form::submit('Crear Invitación', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

