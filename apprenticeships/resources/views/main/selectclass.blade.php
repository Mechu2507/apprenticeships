@extends('layouts.app')

@section('content')

    <h3>Wybierz rocznik</h3>

    <form action="/show" method="post">
        @csrf
        <select name="code_id">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}</option>
            @endforeach
        </select>
        <input type="submit" value="Wybierz">
    </form>

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

    <br/>

    <h3>Stwórz nowy</h3>
    <form action="{{ route('codes.create') }}" method="get">
        <button type="submit" class="btn btn-primary">Dodaj nowy rocznik</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var successToastEl = document.getElementById('successToast');
            if (successToastEl) {
                var successToast = new bootstrap.Toast(successToastEl, {
                    autohide: true,
                    delay: 5000 
                });
                successToast.show();
            }
        });
    </script>

@endsection