@extends('layout')
@section('title', 'Inicio')
@section('content')
<div class="row content">
    <div class="col-xl-2 col-lg-2 col-md-2"></div>
    <div class="col-xl-8 col-lg-7 col-md-7 mt-xl-5 mt-lg-5 mt-md-5 mt-sm-5">
        <h3 class="text-center titulo">Registrar Reservaciones</h3>
        <div class="">
            <form id="form-inline" method="post" accept-charset="utf-8" action="{{ route('GuardarReseva') }}">
                <p class="parrafo-forma">
                    Los campos marcados con <strong class="requerido">*</strong> son obligatorios.
                </p>
                {{ csrf_field() }}
                <input type="hidden" name="txtUser" value="{{ encrypt(session()->get('usuario')) }}">
                <div class="form-group row">
                    <label for="txtFecha" class="col-sm-12 col-form-label col-md-4 col-lg-4 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                        <strong class="requerido">*</strong>Fecha:
                    </label>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 validar">
                        <input type="text" name="txtFecha" id="txtFecha" title="Ingrese fecha" class="form-control" placeholder="Fecha" required="" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtNombres" class="col-sm-12 col-form-label col-md-4 col-lg-4 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                        <strong class="requerido">*</strong>Número Personas:
                    </label>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 validar">
                        <input type="text" name="txtNumero" id="txtNumero" title="Ingrese numero de personas" class="form-control" placeholder="Número de personas" required="" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div id="sillas"></div>
                </div>
                <div class="form-group row">
                    <label for="btnGuardar" class="col-form-label col-md-4 col-lg-5 col-xl-4"></label>
                    <div class="col-sm-2 col-md-1 col-lg-1 col-xl-1">
                        <button type="submit" class="btn btn-success sombra">Guardar <span class="fa fa-save"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
    $("#txtNumero").change(function(e){
        var n = e.target.value;
        $(".disponibles").limitarCheckbox(n);
    });

    $("#txtFecha").change(function(e){
        var fecha = e.target.value;
        $.get(
            "/obtenerSillas",
            {
                fecha:fecha
            },function(data){
                $("#sillas").html(data);
            }
        );
    });
</script>
@stop