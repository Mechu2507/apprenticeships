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
    </div>


@endsection