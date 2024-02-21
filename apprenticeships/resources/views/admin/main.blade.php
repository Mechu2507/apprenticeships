@extends('layouts.app')

@section('content')

<div align="center">

    <div class="container" style="width: 50%;">

    <button class="btn btn-primary" onclick="window.location.href='{{route('directions.index')}}'" style="margin: 10px">Kierunki</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('aselectclass')}}'" style="margin: 10px">Podgląd</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('import-active')}}'" style="margin: 10px">Import .xls</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('export-index')}}'" style="margin: 10px">Export .xls</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectarchive')}}'" style="margin: 10px">Archiwum</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('representatives.index')}}'" style="margin: 10px">Reprezentant</button>  
    <button class="btn btn-primary" style="margin: 10px">Statystyka</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('logout')}}'" style="margin: 10px">Wyloguj</button>    

    </div>
    
</div>

@endsection