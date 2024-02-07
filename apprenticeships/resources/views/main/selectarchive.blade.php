@extends('layouts.app')

@section('content')

    <h3>Wybierz rocznik</h3>

    <form action="/showarchive" method="post">
        @csrf
        <select name="code_id">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}</option>
            @endforeach
        </select>
        <input type="submit" value="Wybierz">
    </form>

@endsection