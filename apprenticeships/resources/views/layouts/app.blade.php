<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>System praktyk</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    {{-- <body>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid d-flex justify-content-between">
                @if (session('direction_name'))
                  @if (session('direction_name') == 'Admin')
                    <button class="btn btn-primary" onclick="window.location.href='{{route('admin')}}'">Strona główna</button>
                  @else
                    <button class="btn btn-primary" onclick="window.location.href='{{route('main')}}'">Strona główna</button>
                  @endif
                <span class="navbar-brand mb-0 h1">Panel - <b>{{session('direction_name')}}</b></span>
                <div>
                    <a href="{{ route('directions.change-password-form') }}">Zmień hasło</a>
                    <button class="btn btn-primary" onclick="window.location.href='{{route('logout')}}'">Wyloguj</button>
                </div>
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
    </body> --}}
    <body>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid d-flex justify-content-center">
                @if (session('direction_name'))
                <span class="navbar-brand mb-0 h1">Panel - <b>{{session('direction_name')}}</b></span>
                @endif
            </div>
        </nav>
        
        <div class="d-flex">
            @if (session('direction_name'))
            <div id="sidebar" class="bg-light border" style="width: 200px;">
                <ul class="nav flex-column" style="background-color: #0d6efd;">
                    @if (session('direction_name') == 'Admin')
                        @include('admin.sidebaradmin')
                    @else
                        @include('main.sidebarmain')
                    @endif
                </ul>
            </div>

            <button id="sidebarToggle" class="btn btn-primary" style=" top: 10px; left: 10px;  z-index: 1000; height: 40px; width: 40px;">☰</button>
            @endif

            <div class="flex-grow-1" style="padding: 10px;">
                <div align="center">
                    <br/>
                    @yield('content')
                </div>
    
                <div class="container-fluid bg-light fixed-bottom">
                    <p class="text-center text-black">Uniwersytet Rzeszowski</p>
                </div>
            </div>
        </div>
    
        <script>
            document.getElementById('sidebarToggle').addEventListener('click', function() {
                var sidebar = document.getElementById('sidebar');
                sidebar.style.display = sidebar.style.display === 'none' ? '' : 'none';
            });
        </script>
    </body>
</html>