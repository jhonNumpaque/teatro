<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Inicio</title>
    <link media="all" rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/custom.css">
    <link media="all" href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link media="all" rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/datatables.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link media="all" rel="stylesheet" type="text/css" href="css/jquery-ui.theme.css">
    <link media="all" rel="stylesheet" href="css/component-chosen.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row content">
            @include('flash::message')
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-xl-5 mt-lg-5 mt-md-3 mt-sm-2">
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3 titulo">
                    <h2 class="text-center">Inicio de Sesión</h2>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 superior3 font-medio">
                <form id="form-inline" method="post" accept-charset="utf-8" action="{{ route('ValidarInicio') }}">
                    {{ csrf_field() }}
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3" style="box-shadow: gray 1px 2px 3px 1px; padding-top: 15px; padding-bottom: 15px; border-radius: 5px">
                        <p class="parrafo-forma">
                            Los campos marcados con <strong class="requerido">*</strong> son obligatorios.
                        </p>
                        <div class="form-group row">
                            <label for="txtUsuario" class="col-form-label col-sm-4 col-md-3 col-lg-3 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                                <strong class="requerido">*</strong>Usuario:
                            </label>
                            <div class="col-sm-7 col-md-9 col-lg-8 col-xl-7">
                                <input type="text" name="txtUsuario" class="form-control" placeholder="Usuario" title="Ingrese usuario" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtContrasena" class="col-form-label col-sm-4 col-md-3 col-lg-3 col-xl-4 text-sm-left text-md-right text-lg-right text-xl-right">
                                <strong class="requerido">*</strong>Contraseña:
                            </label>
                            <div class="col-sm-7 col-md-9 col-lg-8 col-xl-7">
                                <input type="password" name="txtContrasena" class="form-control" placeholder="Contraseña" title="Ingrese contraseña" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sltAnno" class="col-form-label col-sm-8 col-md-8 col-lg-8 col-xl-2 text-sm-left text-md-right text-lg-right text-xl-right"></label>
                            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-3">
                                <a href="{{ route('RegistrarUsuario') }}" class="btn col-12" title="Registrar">Registrar</a>
                            </div>
                            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-3">
                                <button type="submit" class="btn btn-success sombra col-12" title="Iniciar sesión"><span class="fa fa-sign-in"></span> Ingresar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/txtValida.js"></script>
    <script src="js/chosen.jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>