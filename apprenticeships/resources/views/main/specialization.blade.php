@extends('layouts.app')

@section('content')

    <div class="table-container" style="width: 60%; margin: auto;">

        <p style="text-align: center; font-size: 30px;"><b>Lista Specjalizacji</b></p><br/>

        <form action="{{ route('specializations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Pełna nazwa</label>
                <br/>
                <input type="text" class="form-control" id="name" name="name">
                <br/>
                <label for="name">Litera</label>
                <br/>
                <input type="text" class="form-control" id="letter" name="letter" maxlength="1">
                <br/>
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </div>
        </form>

        <br/>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Lp.</th>
                    <th>Nazwa</th>
                    <th>Litera</th>
                    <th>Edytuj</th>
                    <th>Usuń</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specializations as $specialization)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $specialization->name }}</td>
                        <td>{{ $specialization->letter }}</td>
                        <td>
                            <a href="{{ route('specializations.edit', ['id' => $specialization->id]) }}">Edytuj</a>
                        </td>
                        <td>
                            <form action="{{ route('specializations.destroy', ['id' => $specialization->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

    </div>

@endsection