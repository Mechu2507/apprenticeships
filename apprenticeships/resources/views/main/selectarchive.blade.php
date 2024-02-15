@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">

    <h3>Wybierz rocznik</h3>
    <form action="/showarchive" method="post">
        @csrf
        <select class="form-select" name="code_id">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}, {{ $code->year }}, {{ $code->degree }}, {{ $code->mode }}</option>
            @endforeach
        </select>
        <input class="btn btn-primary" type="submit" value="Wybierz">
    </form>

    </div>

@endsection