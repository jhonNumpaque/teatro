@extends('layout')
@section('title', 'Listado de usuarios')
@section('content')
<div class="row content">
    <div class="col-xl-2 col-lg-2 col-md-2"></div>
    <div class="col-xl-8 col-lg-7 col-md-7 mt-xl-5 mt-lg-5 mt-md-5 mt-sm-5">
        <h3 class="text-center titulo">Listado de usuarios</h3>
        <div class="well bg-light col-12 text-right inferior borde-well">
            <a href="{{ route("RegistrarUsuario") }}" class="btn btn-success fa fa-plus sombra superior inferior" title="Registrar Nuevo"></a>
        </div>
        <table id="table" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 table table-hover table-bordered table-striped table-condensed" data-toggle="dataTable">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row->nombres }}</td>
                        <td>{{ $row->apellidos }}</td>
                        <td>{{ $row->usuario }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop