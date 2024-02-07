@extends('layouts.app')

@section('content')

    <form action="{{ route('upload-active') }}" method="post" enctype="multipart/form-data">
        @csrf
        <select name="code_id">
            @foreach($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}</option>
            @endforeach
        </select>
        <input type="file" name="file" required>
        <button type="submit">Importuj XLS</button>
    </form>
    
@endsection