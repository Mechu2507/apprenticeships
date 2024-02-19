@extends('layouts.app')

@section('content')

    <div class="table-container  justify-content-between" style="width: 90%; margin: auto; display: flex; ">

        <table class="table table-striped table-sm" style="width: 45%">
            <thead>
                <tr>
                    <th>Nazwa Firmy</th>
                    <th>Liczba Wystąpień</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companyNameStats as $companyName => $count)
                    <tr>
                        <td>{{ $companyName ?: 'Brak informacji o firmie' }}</td>
                        <td>{{ $count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>            

        <table class="table table-striped table-sm" style="width: 45%">
            <thead>
                <tr>
                    <th>Stanowisko reprezentanta</th>
                    <th>Liczba Wystąpień</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positionStats as $position => $count)
                    <tr>
                        <td>{{ $position ?: 'Brak informacji o firmie' }}</td>
                        <td>{{ $count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="table-container  justify-content-between" style="width: 90%; margin: auto; display: flex; align-items: center;">

        <table class="table table-striped table-sm" style="width: 45%">
            <thead>
                <tr>
                    <th>Imię reprezentanta firmy</th>
                    <th>Liczba Wystąpień</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companyPersonStats as $companyPerson => $count)
                    <tr>
                        <td>{{ $companyPerson ?: 'Brak informacji o firmie' }}</td>
                        <td>{{ $count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>            

        <table class="table table-striped table-sm" style="width: 45%">
            <thead>
                <tr>
                    <th>Opiekun</th>
                    <th>Liczba Wystąpień</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supervisorStats as $supervisor => $count)
                    <tr>
                        <td>{{ $supervisor ?: 'Brak informacji o firmie' }}</td>
                        <td>{{ $count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>

    <br/><br/>

@endsection