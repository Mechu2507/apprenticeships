@extends('layouts.app')

@section('content')

    <form action="{{ route('export-active') }}" method="post" enctype="multipart/form-data">
        @csrf
        <select name="code_id">
            @foreach($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}</option>
            @endforeach
        </select>
        <button type="submit">Exportuj XLS</button>
    </form>
    
@endsection