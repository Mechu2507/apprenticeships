<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>System praktyk</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid d-flex justify-content-between">
                @if (session('direction_name'))
                <button class="btn btn-primary" onclick="window.location.href='{{url('main')}}'">Strona główna</button>
                <span class="navbar-brand mb-0 h1">Panel - <b>{{session('direction_name')}}</b></span>
                <button class="btn btn-primary" onclick="window.location.href='{{route('logout')}}'">Wyloguj</button>
                @endif
            </div>
        </nav>

        <div align = "center">
            <br/>

        @yield('content')

        </div>

        <div class="container-fluid bg-light fixed-bottom">
            <p class="text-center text-black">Uniwersytet Rzeszowski</p>
        </div>
    </body>
</html>