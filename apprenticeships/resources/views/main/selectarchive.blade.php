@extends('layouts.app')

@section('content')

    <div class="container" style="width: 70%">

        <p style="text-align: center; font-size: 30px;"><b>Archiwum</b></p><br/> 

    <h3>Wybierz rocznik</h3>
    <form action="/showarchive" method="post">
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

    <p>Menu rozwijane pozwala na wybranie rocznika z bazy archiwalnych roczników danego kierunku</p>

    </div>

@endsection