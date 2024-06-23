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
            <div class="container-fluid d-flex justify-content-center">
                @if (session('direction_name'))
                <span class="navbar-brand mb-0 h1">Panel - <b>{{session('direction_name')}}</b></span>
                @endif
            </div>
        </nav>
        
        <div class="d-flex">
            @if (session('direction_name'))
            <div id="sidebar" class="bg-light border" style="width: 200px; background-color: #0d6efd !important; height: 100vh; z-index: 1050; position: fixed;">
                <ul class="nav flex-column">
                    @if (session('direction_name') == 'Admin')
                        @include('admin.sidebaradmin')
                    @else
                        @include('main.sidebarmain')
                    @endif
                </ul>
            </div>

            <button id="sidebarToggle" class="btn btn-primary" style="position: fixed; top: 5px; left: 5px;  z-index: 1000; height: 40px; width: 40px;">☰</button>
            @endif

            <div class="flex-grow-1" style="padding: 10px;">
                <div align="center">
                    <br/>
                    @yield('content')
                </div>
    
            </div>
        </div>

        <script>
            document.getElementById('sidebarToggle').addEventListener('click', function() {
                var sidebar = document.getElementById('sidebar');
                var content = document.querySelector('.flex-grow-1');
        
                if (sidebar.style.display === 'none') {
                    sidebar.style.display = '';
                    content.style.paddingLeft = '200px';  
                } else {
                    sidebar.style.display = 'none';
                    content.style.paddingLeft = '0';      
                }
            });
        
            
            window.onload = function() {
                var sidebar = document.getElementById('sidebar');
                var content = document.querySelector('.flex-grow-1');
        
                if (sidebar.style.display !== 'none') {
                    content.style.paddingLeft = '200px';
                }
            };
        </script>
    </body>
</html>