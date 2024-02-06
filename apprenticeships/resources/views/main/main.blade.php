@extends('layouts.app')

@section('content')

<div align="center">
    @if (session('direction_name'))
        <h2> Panel - <b>{{session('direction_name')}}</b></h2>    
    @endif

    </br>
    <button class="btn btn-primary" >Generowanie PDF</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectclass')}}'">Podgląd</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('import-active')}}'">Import .xls</button>
    <button class="btn btn-primary" >Export .xls</button>
    <button class="btn btn-primary" >Roczniki</button>
    </br>
    <button class="btn btn-primary" >Pan/Pani</button>
    <button class="btn btn-primary" >Archiwum</button>
    <button class="btn btn-primary" >Wyślij e-mail</button>  
    <button class="btn btn-primary" >Statystyka</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('logout')}}'">Wyloguj</button>    

</div>
@endsection