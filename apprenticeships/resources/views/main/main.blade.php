@extends('layouts.app')

@section('content')

    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectclass')}}'">Podgląd</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('import-active')}}'">Import .xls</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('export-index')}}'">Export .xls</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectarchive')}}'">Archiwum</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('representatives.index')}}'">Reprezentant</button>  
    <button class="btn btn-primary" >Statystyka</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('logout')}}'">Wyloguj</button>    

@endsection