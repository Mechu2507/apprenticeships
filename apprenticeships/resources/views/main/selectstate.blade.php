@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">

    <p style="text-align: center; font-size: 30px;"><b>Status</b></p><br/>    

    <h4>Wybierz rocznik</h4>
    <form action="/status" method="post">
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
    <p>Po wyborze rocznika możemy przejrzeć oraz zmienić statusy porozumień, które zostały wygenerowane</p>

    </div>

@endsection