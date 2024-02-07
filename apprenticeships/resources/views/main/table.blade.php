@extends('layouts.app')

@section('content')

    <div class="table-container" style="width: 95%; margin: auto;">
    <table class="table table-striped table-sm" style="font-size: 0.8em;">
        <thead>
            <tr>
                <th>Nazwisko i imię</th>
                <th>Pan/Pani</th>
                <th>Nazwa firmy</th>
                <th>Adres firmy</th>
                <th>Osoba</th>
                <th>Rola</th>
                <th>Data rozpoczęcia</th>
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
                    <td style="max-width: 120px; white-space: normal; overflow-wrap: break-word;">{{ $active->student_name }}</td>
                    <td style="max-width: 50px; white-space: normal; overflow-wrap: break-word;">{{ $active->MrMs }}</td>
                    <td style="max-width: 120px; white-space: normal; overflow-wrap: break-word;">{{ $active->company_name }}</td>
                    <td style="max-width: 200px; white-space: normal; overflow-wrap: break-word;">{{ $active->company_address }}</td>
                    <td style="max-width: 100px; white-space: normal; overflow-wrap: break-word;">{{ $active->company_person }}</td>
                    <td style="max-width: 100px; white-space: normal; overflow-wrap: break-word;">{{ $active->position }}</td>
                    <td style="max-width: 80px; white-space: normal; overflow-wrap: break-word;">{{ $active->start_date }}</td>
                    <td style="max-width: 80px; white-space: normal; overflow-wrap: break-word;">{{ $active->end_date }}</td>
                    <td style="max-width: 120px; white-space: normal; overflow-wrap: break-word;">{{ $active->supervisor_name }}</td>
                    <td style="max-width: 50px; white-space: normal; overflow-wrap: break-word;">{{ $active->hours }}</td>
                    <td class="{{ $active->generated ? 'table-success' : 'table-primary' }}" style="width: 10px">{{ $active->generated ? 'Tak' : 'Nie' }}</td>
                    <td style="max-width: 50px;">
                        <a href="{{ route('actives.edit', $active->id) }}">Edit</a>
                        <form action="a" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

<br/><br/>

@endsection