@extends('layouts.app')

@section('content')

    <div class="table-container  justify-content-between" style="width: 60%; margin: auto; display: flex; ">

        <table class="table table-striped table-sm" style="width: 50%">
            <tr>
                <th>Nazwa kierunku</th>
                <th>Kod kierunku</th>
            </tr>
            @foreach ($directions as $direction)
                <tr>
                    <td>{{ $direction->name }}</td>
                    <td>{{ $direction->code }}</td>
                </tr>
            @endforeach
        </table>
        

        <div>
        <h4>Dodaj kierunek</h4>
        <form action="{{ route('directions.store') }}" method="post">
            @csrf
            <input type="text" class="form-control" name="name" placeholder="Nazwa kierunku" required>
            <br/>
            <input type="text" class="form-control" name="code" placeholder="Kod kierunku" required>
            @error('code')
                <div>{{ $message }}</div>
            @enderror
            <br/>
            <input type="password" class="form-control" name="password" placeholder="Hasło" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
            <br/>
            <button type="submit" class="btn btn-primary">Dodaj kierunek</button>
        </form>
        </div>
    </div>

@endsection