<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>@yield('title')</title>
    <link media="all" rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/tether.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/custom.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/font-awesome.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/datatables.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/dataTables.bootstrap4.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/jquery-ui.theme.css">
    <link media="all" rel="stylesheet" href="css/component-chosen.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/jq-ui-bootstrap.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/jquery-ui-1.10.3.custom.css">
    <link media="all" rel="stylesheet" type="text/css" href="/css/datepicker.css">
    @yield('style')
</head>
<body>
    <div class="container-fluid">
        <div class="row content">
            @if(!empty(session()->get('usuario')))
                <div class="container-fluid">
                    @include('menu')
                    @include('flash::message')
                    @yield('content')
                </div>
            @endif
        </div>
    </div>
    <script src="/js/jquery-3.2.1.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/tether.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/datatables.js"></script>
    <script src="/js/dataTables.bootstrap4.js"></script>
    <script src="/js/jquery.validate.js"></script>
    <script src="/js/txtValida.js"></script>
    <script src="/js/chosen.jquery.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/js/script.js"></script>
    @yield('script')
</body>
</html>