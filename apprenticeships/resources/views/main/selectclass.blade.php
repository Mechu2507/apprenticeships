@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">

    <h3>Wybierz rocznik</h3>

    <form action="/show" method="post">
        @csrf
        <select class="form-select" name="code_id">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}, {{ $code->year }}, {{ $code->degree }}, {{ $code->mode }}</option>
            @endforeach
        </select>
        <br/>
        <input class="btn btn-primary" type="submit" value="Wybierz">
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

    @if(session('error'))
    <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true" id="successToast" style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('error') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <br/>

    <h3>Stwórz nowy rocznik</h3>
    <form action="{{ route('codes.create') }}" method="get">
        <button type="submit" class="btn btn-primary">Dodaj nowy rocznik</button>
    </form>

    <br/>

    <h3>Przenieś do archiwum</h3>
    <form action="{{ url('/codes/' . $code->id) }}" method="post">
        @csrf
        @method('put')
        <select class="form-select" name="code_id">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}, {{ $code->year }}, {{ $code->degree }}, {{ $code->mode }}</option>
            @endforeach
        </select>
        <br/>
        <input class="btn btn-primary" type="submit" value="Wybierz">
    </form>

    </div>

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