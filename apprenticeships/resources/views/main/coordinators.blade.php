@extends('layouts.app')

@section('content')

    <div class="table-container" style="width: 90%; margin: auto;">

        <h3 style="text-align: center; margin-bottom: 20px;">Tabela koordynatorów</h3>

        <form action="{{ route('upload-coordinator') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="form-control" style="max-width: 500px" type="file" name="file" required>
            <br/>
            <button class="btn btn-primary" type="submit">Importuj XLS</button>
        </form>

        <br/>

        <a href="{{ route('create-coordinator') }}" class="btn btn-primary">Dodaj koordynatora</a>

        <br/><br/>

        <table class="table table-striped table-sm" style="font-size: 0.8em;">
            <thead>
                <tr>
                    <th>Lp.</th>
                    <th>Kierunek</th>
                    <th>Nazwisko i imie</th>
                    <th>Telefon</th>
                    <th>Mail UR</th>
                    <th>Mail Google</th>
                    <th>Tabela udostępniona</th>
                    <th>Link Formularza</th>
                    <th>Edycja</th>
                    <th>Usuń</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coordinators as $coordinator)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $coordinator->direction }}</td>
                        <td>{{ $coordinator->name }}</td>
                        <td>{{ $coordinator->phone }}</td>
                        <td>{{ $coordinator->mail_ur }}</td>
                        <td>{{ $coordinator->mail_google }}</td>
                        <td>{{ $coordinator->table_shared }}</td>
                        <td>{{ $coordinator->form_link }}</td>
                        <td><a href="{{ route('edit-coordinator', ['id' => $coordinator->id]) }}">Edytuj</a></td>
                        <td>
                            <form action="{{ route('delete-coordinator', ['id' => $coordinator->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

    </div>

@endsection