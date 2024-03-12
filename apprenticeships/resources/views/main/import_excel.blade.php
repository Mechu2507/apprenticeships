@extends('layouts.app')

@section('content')

    <div class="container" style="width: 70%">

        <p style="text-align: center; font-size: 30px;"><b>Import</b></p><br/> 

    <form action="{{ route('upload-active') }}" method="post" enctype="multipart/form-data">
        @csrf
        <select class="form-select" name="code_id">
            @foreach($codes as $code)
                <option value="{{ $code->id }}">{{ $code->code }}, {{ $code->year }}, {{ $code->degree }}, {{ $code->mode }}</option>
            @endforeach
        </select>
        <br/>
        <div style="width: 40%">
            <label for="import_option">Wybierz szablon importu:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="import_option" id="import_option1" value="ActivesImport1" checked>
            <label class="form-check-label" for="import_option1">
                Formularz z forms.office.com
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="import_option" id="import_option2" value="ActivesImport">
            <label class="form-check-label" for="import_option2">
                Formularz z pliku Excel na Teams
            </label>
        </div>
        </div>
        <br/>
        <input class="form-control" type="file" name="file" required>
        <br/>
        <button class="btn btn-primary" type="submit">Importuj XLS</button>
    </form>
    
    <br/>
    <p>Menu rozwijane pozwala na wybranie rocznika z bazy aktualnych roczników danego kierunku</p>
    <p>W polu "Wybierz szablon importu" należy wybrać szablon importu</p>
    <p>W polu "Wybierz plik" należy wybrać plik .xls z danymi do importu</p>
    <p>Przycisk "Importuj XLS" pozwala na zaimportowanie danych do bazy z pliku .xls</p>

    <br/><br/>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Formularz z forms.office.com
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Dane kolejno od 2. wiersza: <br>
            Lp. | Imię | Nazwisko | Nazwa | Adres | Reprezentant | Stanowisko | Data rozpoczęcia | Data zakończenia | Opiekun | Godziny
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Formularz z pliku Excel na Teams
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Dane kolejno od 7. wiersza: <br>
            Lp. | Nazwisko i imię | Nazwa | Adres | Reprezentant | Stanowisko | Data rozpoczęcia | Data zakończenia | Opiekun | <i>NNW<i> | Godziny
            </div>
          </div>
        </div>
      </div>

    </div>
@endsection