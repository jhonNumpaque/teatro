<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Registrar Usuario</title>
    <link media="all" rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/tether.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/custom.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/datatables.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/jquery-ui.theme.css">
    <link media="all" rel="stylesheet" href="css/component-chosen.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/jq-ui-bootstrap.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/datepicker.css">
    @yield('style')
</head>
<body>
    <div class="container-fluid">
        @if(!empty(session()->get('usuario')))
            @include('menu')
        @endif
        <div class="row content">
            <div class="col-xl-3 col-lg-3 col-md-3"></div>
            <div class="col-xl-6 col-lg-6 col-md-6 mt-xl-5 mt-lg-5 mt-md-5 mt-sm-5">
                <h3 class="text-center titulo">Registrar Usuario</h3>
                <div class="borde-forma">
                    <form id="form" method="post" accept-charset="utf-8" action="{{ 'GuardarUsuario' }}">
                        <p class="parrafo-forma">
                            Los campos marcados con <strong class="requerido">*</strong> son obligatorios.
                        </p>
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="txtNombres" class="col-sm-12 col-form-label col-md-4 col-lg-4 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                                <strong class="requerido">*</strong>Nombres:
                            </label>
                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 validar">
                                <input type="text" name="txtNombres" id="txtNombres" title="Ingrese nombres" class="form-control" placeholder="Nombres" onkeypress="return txtValida(event,'car')" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtApellidos" class="col-sm-12 col-form-label col-md-4 col-lg-4 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                                <strong class="requerido">*</strong>Apellidos:
                            </label>
                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 validar">
                                <input type="text" name="txtApellidos" id="txtApellidos" title="Ingrese apelldios" class="form-control" placeholder="Apellidos" onkeypress="return txtValida(event,'car')" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtUsuario" class="col-sm-12 col-form-label col-md-4 col-lg-4 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                                <strong class="requerido">*</strong>Usuario:
                            </label>
                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 validar">
                                <input type="text" name="txtUsuario" id="txtUsuario" title="Ingrese usuario" class="form-control" placeholder="Usuario" onkeypress="return txtValida(event,'car')" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtUsuario" class="col-sm-12 col-form-label col-md-4 col-lg-4 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                                <strong class="requerido">*</strong>Contraseña:
                            </label>
                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 validar">
                                <input type="password" name="txtPassword" id="txtPassword" title="Ingrese contraseña" class="form-control" placeholder="Contraseña" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="btnGuardar" class="col-form-label col-md-4 col-lg-4 col-xl-4"></label>
                            <div class="col-sm-2 col-md-1 col-lg-1 col-xl-1">
                                <button type="submit" class="btn btn-success fa fa-save sombra"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/tether.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/txtValida.js"></script>
    <script src="js/chosen.jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/script.js"></script>
    @yield('script')
</body>
</html>