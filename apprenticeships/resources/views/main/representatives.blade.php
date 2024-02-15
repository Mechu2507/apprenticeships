@extends('layouts.app')

@section('content')

    <div class="container">
        
       <p style="text-align: center; font-size: 20px;"><b>Lista Reprezentantów UR</b></p><br/>

        <table> 
            @foreach ($representatives as $representative)
                <tr>
                    <td>
                        <p>{{ $representative->name }}</p> 
                    </td>
                    <td>
                        <a href="{{ route('representatives.edit', $representative->id) }}">Edytuj</a>
                        <a href="{{ route('representatives.destroy', $representative->id) }}">Usuń</a>  
                    </td> 
                </tr>
            @endforeach
        </table>
    </div>

@endsection