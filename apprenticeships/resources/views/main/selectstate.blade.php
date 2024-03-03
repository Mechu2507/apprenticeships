@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">

    <p style="text-align: center; font-size: 30px;"><b>Status</b></p><br/>    

    <h4>Wybierz rocznik</h4>
    <form action="/status" method="post">
        @csrf
        <select class="form-select" name="code_id">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}, {{ $code->year }}, {{ $code->degree }}, {{ $code->mode }}</option>
            @endforeach
        </select>
        <br/>
        <input class="btn btn-primary" type="submit" value="Wybierz">
    </form>

    <br/>
    <p>Po wyborze rocznika możemy przejrzeć oraz zmienić statusy porozumień, które zostały wygenerowane</p>

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