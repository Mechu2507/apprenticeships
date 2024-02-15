@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%;">

    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectclass')}}'" style="margin: 10px">Podgląd</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('import-active')}}'" style="margin: 10px">Import .xls</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('export-index')}}'" style="margin: 10px">Export .xls</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectarchive')}}'" style="margin: 10px">Archiwum</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('representatives.index')}}'" style="margin: 10px">Reprezentant</button>  
    <button class="btn btn-primary" style="margin: 10px">Statystyka</button>
    <button class="btn btn-primary" style="margin: 10px">Status</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('logout')}}'" style="margin: 10px">Wyloguj</button>    

    </div>

@endsection