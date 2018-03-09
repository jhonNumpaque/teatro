<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="{{ route("Inicio") }}">Teatro</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @if(session()->get('rol') == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("ListadoUsuario") }}">Listado Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("RegistrarUsuario") }}">Registrar Usuario</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("Inicio") }}">Reservaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("ListadoReservaciones") }}">Listado Reservaciones</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route("ActualizarUsuario", encrypt(session()->get('usuario'))) }}">Actualizar Datos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("CerrarSesion") }}">Salir</a>
            </li>
        </ul>
    </div>
</nav>
