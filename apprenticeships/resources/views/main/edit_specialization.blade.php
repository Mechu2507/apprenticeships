@extends('layouts.app')

@section('content')

    <div class="container" style="width: 60%">
        
       <form action="{{ route('specializations.update', $specialization->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Pełna nazwa</label>
                <br/>
                <input type="text" class="form-control" id="name" name="name" value="{{ $specialization->name }}">
                <br/>
                <label for="name">Litera</label>
                <br/>
                <input type="text" class="form-control" id="letter" name="letter" value="{{ $specialization->letter }}" maxlength="1">
                <br/>
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>  
        </form>

    </div>

@endsection