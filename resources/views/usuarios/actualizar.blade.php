@extends('layoutX')
@section('title', 'Actualizar Datos')
@section('content')
<div class="row content">
    <div class="col-xl-2 col-lg-2 col-md-2"></div>
    <div class="col-xl-8 col-lg-7 col-md-7 mt-xl-5 mt-lg-5 mt-md-5 mt-sm-5">
        <h3 class="text-center titulo">Actualizar Datos Usuario</h3>
        <div class="">
            <form id="form-inline" method="post" accept-charset="utf-8" action="{{ route('GuardarActualizacion') }}">
                <p class="parrafo-forma">
                    Los campos marcados con <strong class="requerido">*</strong> son obligatorios.
                </p>
                {{ csrf_field() }}
                <input type="hidden" name="txtId" value="{{ encrypt($user->id_unico) }}">
                <div class="form-group row">
                    <label for="txtNombres" class="col-sm-12 col-form-label col-md-4 col-lg-4 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                        <strong class="requerido">*</strong>Nombres:
                    </label>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 validar">
                        <input type="text" name="txtNombres" id="txtNombres" title="Ingrese fecha" class="form-control" placeholder="Nombres" required="" autocomplete="off" value="{{ $user->nombres }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtApellidos" class="col-sm-12 col-form-label col-md-4 col-lg-4 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                        <strong class="requerido">*</strong>Apellidos:
                    </label>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 validar">
                        <input type="text" name="txtApellidos" id="txtApellidos" title="Ingrese apellidos" class="form-control" placeholder="Apelldios" required="" autocomplete="off" value="{{ $user->apellidos }}">
                    </div>
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