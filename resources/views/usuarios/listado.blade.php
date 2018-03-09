@extends('layout')
@section('title', 'Reservaciones')
@section('content')
<div class="row content">
    <div class="col-xl-2 col-lg-2 col-md-2"></div>
    <div class="col-xl-8 col-lg-7 col-md-7 mt-xl-5 mt-lg-5 mt-md-5 mt-sm-5">
        <h3 class="text-center titulo">Reservaciones Usuario</h3>
        <div class="well bg-light col-12 text-right inferior borde-well">
            <a href="{{ route("Inicio") }}" class="btn btn-success fa fa-plus sombra superior inferior" title="Registrar Nuevo"></a>
        </div>
        <table id="table" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 table table-hover table-bordered table-striped table-condensed" data-toggle="dataTable">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Silla (Fila - Columna)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row->fecha }}</td>
                        <td>{{ $row->silla }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop