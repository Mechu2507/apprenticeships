@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">

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
    
    </div>

@endsection