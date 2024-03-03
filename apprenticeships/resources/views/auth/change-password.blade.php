@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">

        <form action="{{ route('directions.changePassword') }}" method="post">
            @csrf
            <div>
                <label for="current_password">Aktualne hasło:</label>
                <input type="password" class="form-control" name="current_password" id="current_password" required>
                @error('current_password')
                    <div>{{ $message }}</div>
                @enderror
            </div>
        
            <div>
                <label for="new_password">Nowe hasło:</label>
                <input type="password" class="form-control" name="new_password" id="new_password" required>
                @error('new_password')
                    <div>{{ $message }}</div>
                @enderror
            </div>
        
            <div>
                <label for="new_password_confirmation">Potwierdź nowe hasło:</label>
                <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" required>
                @error('new_password_confirmation')
                    <div>{{ $message }}</div>
                @enderror
            </div>
        
            <br/>

            <button type="submit" class="btn btn-primary">Zmień hasło</button>
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