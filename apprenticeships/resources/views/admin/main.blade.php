@extends('layouts.app')

@section('content')

<div align="center">

    @if (session('direction_name'))
        <h1>Panel admina</h1>    
    @endif

    </br>
    <button class="btn btn-primary" >Kierunki</button>
    
</div>

@endsection