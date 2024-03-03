@extends('layouts.app')

@section('content')

    <div class="table-container" style="width: 95%; margin: auto;">

    <form action="{{ route('generate.pdf') }}" method="post">    
    @csrf
    <button class="btn btn-primary" type="submit">Generowanie PDF</button>
    <button class="btn btn-primary" type="submit" formaction="{{ route('generate.single.pdf') }}">Generowanie 1 PDF</button>

    <br/><br/>

    <div class="container" style="width: 50%;">
        <label for="representative_id">Wybierz reprezentanta UR:</label>
        <select class="form-select" name="representative_id">
            @foreach ($representatives as $representative)
                <option value="{{ $representative->id }}">{{ $representative->name }}</option>
            @endforeach
        </select>
    </div>

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
                    <td class="{{ $active->generated ? 'table-success' : 'table-primary' }}" style="width: 10px">
                        {{ $active->generated ? 'Tak' : 'Nie' }} 
                        <input type="checkbox" class="form-check-input" name="selected_ids[]" value="{{ $active->id }}">
                    </td>
                </form>
                    <td style="max-width: 70px;">
                        <form action="{{ route('actives.edit', $active->id) }}" method="get">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-success  btn-sm">Edytuj</button>
                        </form>
                        <form action="{{ route('actives.destroy', $active->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

<br/><br/>

@endsection