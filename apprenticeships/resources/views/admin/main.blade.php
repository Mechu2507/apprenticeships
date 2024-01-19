@extends('layouts.app')

@section('content')

    @if (session('direction_name'))
        <h1>Panel admina</h1>    
    @endif

    </br>
    <button class="btn btn-primary" >Kierunki</button>
    

@endsection