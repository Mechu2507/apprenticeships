@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">

    <h3>Wybierz rocznik</h3>
    <form action="/stats" method="post">
        @csrf
        <select class="form-select" name="code_id">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}, {{ $code->year }}, {{ $code->degree }}, {{ $code->mode }}</option>
            @endforeach
        </select>
        <br/>
        <input class="btn btn-primary" type="submit" value="Wybierz">
    </form>

    <br/>

    <h3>Wybierz rocznik z archiwum</h3>
    <form action="/stats" method="post">
        @csrf
        <select class="form-select" name="code_id">
            @foreach ($codes1 as $code1)
                <option value="{{ $code1->id }}">{{ $code1->code }}, {{ $code1->year }}, {{ $code1->degree }}, {{ $code1->mode }}</option>
            @endforeach
        </select>
        <br/>
        <input class="btn btn-primary" type="submit" value="Wybierz">
    </form>

    </div>

@endsection