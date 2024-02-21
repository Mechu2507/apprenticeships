@extends('layouts.app')

@section('content')

    <div class="container" style="width: 50%">

    <p style="text-align: center; font-size: 30px;"><b>Statystyka</b></p><br/>

    <h4>Wybierz rocznik</h4>
    <form action="/stats" method="post">
        @csrf
        <select class="form-select" name="code_id">
            @foreach ($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}, {{ $code->year }}, {{ $code->degree }}, {{ $code->mode }}</option>
            @endforeach
        </select>
        <br/>
        <input class="btn btn-primary" type="submit" value="Wybierz">
    </form>

    <br/>

    <h4>Wybierz rocznik z archiwum</h4>
    <form action="/stats" method="post">
        @csrf
        <select class="form-select" name="code_id">
            @foreach ($codes1 as $code1)
                <option value="{{ $code1->id }}">{{ $code1->code }}, {{ $code1->year }}, {{ $code1->degree }}, {{ $code1->mode }}</option>
            @endforeach
        </select>
        <br/>
        <input class="btn btn-primary" type="submit" value="Wybierz">
    </form>

    <br/>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Wybierz rocznik
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Podgląd statystyk dla aktualnych roczników.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Wybierz rocznik z archiwum
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Podgląd statystyk dla roczników z archiwum.</div>
          </div>
        </div>
    </div>

    </div>

@endsection