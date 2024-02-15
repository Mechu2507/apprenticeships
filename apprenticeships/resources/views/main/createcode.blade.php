@extends('layouts.app')

@section('content')

    <form action="{{ route('codes.store') }}" method="post">
         @csrf
         <input type="number" name="digit" min="1" max="5" placeholder="Rok" required><br/>

         <select name="mode" required>
             <option value="S">Stacjonarne</option>
             <option value="N">Niestacjonarne</option>
         </select><br/>
     
         <select name="degree" required>
             <option value="1">Pierwszego stopnia</option>
             <option value="2">Drugiego stopnia</option>
         </select><br/>
     
         <input type="number" name="year" min="2000" placeholder="Rok" required><br/>
     
         <button type="submit">Dodaj rocznik</button>
    </form>

@endsection