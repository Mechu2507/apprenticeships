@extends('layouts.app')

@section('content')

    <div class="container">
        
       <p style="text-align: center; font-size: 20px;"><b>Lista Reprezentantów UR</b></p><br/>

        <form action="{{ route('representatives.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Pełna nazwa</label>
                <br/>
                <input type="text" class="form-control" id="name" name="name">
                <br/>
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </div>
        </form>

        <br/>

        <table class="table table-striped"> 
            @foreach ($representatives as $representative)
                <tr>
                    <td>
                        <p>{{ $representative->name }}</p> 
                    </td>
                    <td>
                        <a href="{{ route('representatives.edit', $representative->id) }}">Edytuj</a>
                    </td> 
                    <td>
                        <form action="{{ route('representatives.destroy', $representative->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection