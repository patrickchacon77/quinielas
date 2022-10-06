@extends('adminlte::page')

@section('Paises', 'Paises')

@section('content_header')
    <h1>Lista de Paises</h1>
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
            <a href="{{route('admin.paises.create')}}" class="btn btn-primary btb-sm">Agregar País</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre paises</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paises as $pais)
                        <tr>
                            <td>{{$pais->id}}</td>
                            <td>{{$pais->nombre_pais}}</td>
                            <td><a  class="btn btn-primary btb-sm" href="{{route('admin.paises.edit', $pais)}}">Editar</a></td>
                            <td>
                                <form action="{{route('admin.paises.destroy', $pais->id)}}" method="POST" onclick="return confirm('¿Seguro que desea eliminar el registro? Nota Se eliminara todo registro relacionado')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btb-sm">Eliminar</button>
                                </form>
                            </td>
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
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
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
