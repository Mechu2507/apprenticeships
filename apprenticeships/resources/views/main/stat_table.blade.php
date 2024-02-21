@extends('layouts.app')

@section('content')

<div class="table-container  justify-content-between" style="width: 90%; margin: auto; display: flex; align-items: center;">

    <table class="table table-striped table-sm" style="width: 45%">
        <thead>
            <tr>
                <th>Wygenerowane porozumienie</th>
                <th>Liczba Wystąpień</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($generatedStats as $generated => $count)
                <tr>
                    <td>{{ $generated == 0 ? 'Nie' : 'Tak' }}</td>
                    <td>{{ $count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>  
    
    <table class="table table-striped table-sm" style="width: 45%">
        <thead>
            <tr>
                <th>Status porozumienia</th>
                <th>Liczba Wystąpień</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statusStats as $statusName => $count)
                <tr>
                    <td>{{ $statusName }}</td>
                    <td>{{ $count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> 
</div>

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
                        <td>{{ $position ?: 'Brak informacji o stanowisku' }}</td>
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
                        <td>{{ $companyPerson ?: 'Brak informacji o reprezentacie firmy' }}</td>
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
                        <td>{{ $supervisor ?: 'Brak informacji o opiekunie' }}</td>
                        <td>{{ $count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>

    <br/><br/>

@endsection