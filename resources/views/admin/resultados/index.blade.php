@extends('adminlte::page')

@section('Torneos', 'torneo')

@section('content_header')
    <h1>Partidos para apostar</h1>
@stop

@section('content')
@if(Session::has('info'))
<div class="alert alert-success">
<strong>{{ Session::get('info') }}</strong>
</div>
@endif
    {{-- @livewire('admin.grado-index') --}}
    <div class="card">

        <div class="card-header">
            <a href="{{route('admin.resultados.create')}}" class="btn btn-primary btb-sm">Apostar Partidos Disponibles</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Partido Apostados</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultados as $resultado)
                        <tr>
                            <td>{{$resultado->id}}</td>
                            <td>{{$resultado->partidos->titulo}}</td>
                            <td><a  class="btn btn-primary btb-sm" href="{{route('admin.resultados.edit', $resultado)}}">Editar</a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" ></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js" ></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js" ></script>

<script>
    $(document).ready(function() {
    $('#datatable').DataTable({
        responsive:true,
        autoWidth:false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por p??gina",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la p??gina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay regristros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search': 'Buscar:',
            'paginate':{
                'next':'siguiente',
                'previous': 'anterior'
            }
        }
    });
} );
</script>
@stop
