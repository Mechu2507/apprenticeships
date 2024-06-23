@extends('layouts.app')

@section('content')

    <div class="table-container  justify-content-between" style="width: 70%; margin: auto; display: flex; ">

        <div style="50%"> 
        <h3>Kierunki</h3>
        <table class="table table-striped table-sm" >
            <tr>
                <th>Nazwa kierunku</th>
                <th>Kod kierunku</th>
            </tr>
            @foreach ($directions as $direction)
                <tr>
                    <td>{{ $direction->name }}</td>
                    <td>{{ $direction->code }}</td>
                </tr>
            @endforeach
        </table>
        </div>
        
        <div>
        <h4>Dodaj kierunek</h4>
        <form action="{{ route('directions.store') }}" method="post">
            @csrf
            <input type="text" class="form-control" name="name" placeholder="Nazwa kierunku" required>
            <br/>
            <input type="text" class="form-control" name="code" placeholder="Kod kierunku" required>
            @error('code')
                <div>{{ $message }}</div>
            @enderror
            <br/>
            <input type="password" class="form-control" name="password" placeholder="Hasło" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
            <br/>
            <button type="submit" class="btn btn-primary">Dodaj kierunek</button>
        </form>
        </div>
    </div>

    <br/>

    <div class="accordion accordion-flush" id="accordionFlushExample" style="width: 70%">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Tabela kierunków
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Tabela, która zawiera nazwy kierunków oraz kody</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Dodaj kierunek
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Formularz, który tworzy nowy kierunek</div>
          </div>
        </div>
    </div>

@endsection