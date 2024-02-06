@extends('layouts.app')

@section('content')

    @if (session('direction_name'))
        <h2> Panel - <b>{{session('direction_name')}}</b></h2>    
    @endif

    </br>

    <form action="/show" method="post">
        @csrf
        <select name="code_id">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}</option>
            @endforeach
        </select>
        <input type="submit" value="Wybierz">
    </form>

    {{-- @if(session('success'))
    <div id="toast" style="position: absolute; top: 20px; background-color: #0d6efd; color: white; padding: 10px; border-radius: 5px;">
        {{ session('success') }}
    </div>
    @endif

    <script>
        window.onload = function() {
            setTimeout(function() {
                var toast = document.getElementById("toast");
                if (toast) {
                    toast.style.display = 'none';
                }
            }, 5000); 
        };
    </script> --}}

    @if(session('success'))
    <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true" id="successToast" style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var successToastEl = document.getElementById('successToast');
            if (successToastEl) {
                var successToast = new bootstrap.Toast(successToastEl, {
                    autohide: true,
                    delay: 5000 // Toast zniknie po 5 sekundach
                });
                successToast.show();
            }
        });
    </script>

@endsection