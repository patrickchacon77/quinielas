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
            {!! Form::model($invitaciones, ['route' => ['admin.invitaciones.update', $invitaciones], 'method' => 'put']) !!}
                
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

                    {!! Form::label('tiaceptadapo', 'Aceptado') !!}
                    {!! Form::select('aceptada', ['1' => 'No aceptado', '2' => 'Aceptado'],null, ['class'=>'form-control'])!!}                   
                    {{-- error de mensaje --}}
                    @error('aceptada')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                
                </div>

                {!! Form::submit('Cambair estado de invitación ', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

