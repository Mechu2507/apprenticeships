@extends('layouts.app')

@section('content')

    <div class="container" style="width: 70%">

    <p style="text-align: center; font-size: 30px;"><b>Export</b></p><br/> 

    <h3>Wybierz rocznik</h3>
    <form action="{{ route('export-active') }}" method="post" enctype="multipart/form-data">
        @csrf
        <select class="form-select" name="code_id">
            @foreach($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}, {{ $code->year }}, {{ $code->degree }}, {{ $code->mode }}</option>
            @endforeach
        </select>
        <br/>
        <button class="btn btn-primary" type="submit">Exportuj XLS</button>
    </form>

    <br/>

    <h3>Wybierz rocznik z archiwum</h3>
    <form action="{{ route('export-active') }}" method="post" enctype="multipart/form-data">
        @csrf
        <select class="form-select" name="code_id">
            @foreach($codes1 as $code)
                <option value="{{ $code->id }}">{{ $code->code }}, {{ $code->year }}, {{ $code->degree }}, {{ $code->mode }}</option>
            @endforeach
        </select>
        <br/>
        <button class="btn btn-primary" type="submit">Exportuj XLS</button>
    </form>
    
    <br/>

    <p>Menu rozwijane pozwala na wybranie rocznika z bazy aktualnych lub archiwalnych roczników danego kierunku</p>
    <p>Przycisk "Exportuj XLS" pozwala na wyeksportowanie danych do pliku .xls</p>
    
    </div>

@endsection