@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">
        <p style="text-align: center; font-size: 20px;"><b>Dodaj rocznik</b></p><br/>

        <form action="{{ route('codes.store') }}" method="post">
            @csrf
            <input class="form-control" type="number" name="digit" min="1" max="5" placeholder="Rok studiów" required><br/>

            <select class="form-select" name="mode" required>
                <option value="S">Stacjonarne</option>
                <option value="N">Niestacjonarne</option>
            </select><br/>
     
            <select class="form-select" name="degree" required>
                <option value="1">Pierwszego stopnia</option>
                <option value="2">Drugiego stopnia</option>
            </select><br/>
     
            <input class="form-control" type="number" name="year" min="2000" placeholder="Rok kalendarzowy" required><br/>

            <select class="form-select" name="specialization" required>
                @foreach ($specializations as $specialization)
                    <option value="{{ $specialization->id }}">{{ $specialization->letter }} - {{ $specialization->name }}</option>
                @endforeach
            </select><br/>
     
            <button class="btn btn-primary" type="submit">Dodaj rocznik</button>
        </form>
    </div>

@endsection