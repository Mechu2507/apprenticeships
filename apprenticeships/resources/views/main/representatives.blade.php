@extends('layouts.app')

@section('content')

    <div class="container" style="width: 70%">
        
       <p style="text-align: center; font-size: 30px;"><b>Lista Reprezentantów UR</b></p><br/>

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

        <br/>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Dodanie reprezentana
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">W celu dodania nowego reprezentanta uczelni, należy wpisać go w polu pełna nazwa, a następnie kliknąć przycisk "Dodaj".</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Edycja reprezentanta
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">W celu edycji reprezentanta uczelni, należy kliknąć przycisk "Edytuj" w odpowiednim wierszu tabeli.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Usunięcie reprezentanta
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">W celu usunięcia reprezentanta uczelni, należy kliknąć przycisk "Delete" w odpowiednim wierszu tabeli.</div>
              </div>
            </div>
        </div>

        <br/><br/>

    </div>

@endsection