@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">
        <p style="text-align: center; font-size: 20px;"><b>Dodaj rocznik</b></p><br/>
{{-- wykonać dodanie kierunku --}}
        <form action="{{ route('admin.codes.store') }}" method="post">
            @csrf
            <select class="form-select" name="direction" required>
                @foreach($directions as $direction)
                    <option value="{{ $direction->id }}">{{ $direction->name }}</option>
                @endforeach
            </select><br/>

            <input class="form-control" type="number" name="digit" min="1" max="5" placeholder="Rok" required><br/>

            <select class="form-select" name="mode" required>
                <option value="S">Stacjonarne</option>
                <option value="N">Niestacjonarne</option>
            </select><br/>
     
            <select class="form-select" name="degree" required>
                <option value="1">Pierwszego stopnia</option>
                <option value="2">Drugiego stopnia</option>
            </select><br/>
     
            <input class="form-control" type="number" name="year" min="2000" placeholder="Rok" required><br/>
     
            <button class="btn btn-primary" type="submit">Dodaj rocznik</button>
        </form>
    </div>

@endsection