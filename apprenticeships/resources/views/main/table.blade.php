@extends('layouts.app')

@section('content')

<div align="center">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nazwisko i imię</th>
                <th>Nazwa firmy</th>
                <th>Adres firmy</th>
                <th>Osoba</th>
                <th>Rola</th>
                <th>Data zaczęcia</th>
                <th>Data zakończenia</th>
                <th>Opiekun</th>
                <th>Godziny</th>
                <th>Wygenerowany</th>
                <th>Akcja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actives as $active)
                <tr>
                    <td>{{ $active->student_name }}</td>
                    <td>{{ $active->company_name }}</td>
                    <td>{{ $active->company_address }}</td>
                    <td>{{ $active->company_person }}</td>
                    <td>{{ $active->position }}</td>
                    <td>{{ $active->start_date }}</td>
                    <td>{{ $active->end_date }}</td>
                    <td>{{ $active->supervisor_name }}</td>
                    <td>{{ $active->hours }}</td>
                    <td class="{{ $active->generated ? 'table-success' : 'table-primary' }}">{{ $active->generated }}</td>
                    <td>
                        <a href="{{ route('actives.edit', $active->id) }}">Edit</a>
                        <form action="a" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach

</div>

@endsection