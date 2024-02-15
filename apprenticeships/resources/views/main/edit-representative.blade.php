@extends('layouts.app')

@section('content')

    <div class="container">
        
       <form action="{{ route('representatives.update', $representative->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Pełna nazwa</label>
                <br/>
                <input type="text" class="form-control" id="name" name="name" value="{{ $representative->name }}">
                <br/>
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>  
        </form>

    </div>

@endsection