@extends('layouts.app')

@section('content')

    @if (session('direction_name'))
        <h2> Panel - <b>{{session('direction_name')}}</b></h2>    
    @endif

    </br>

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