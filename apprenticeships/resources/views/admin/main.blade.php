@extends('layouts.app')

@section('content')

<div align="center">

    <div class="container" style="width: 70%;">

      <h4>Witaj w systemie obsługi praktyk studenckich</h4>

    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('directions.index')}}'" style="margin: 10px">Kierunki</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('aselectclass')}}'" style="margin: 10px">Podgląd</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('admin.import-active')}}'" style="margin: 10px">Import .xls</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('admin.export-index')}}'" style="margin: 10px">Export .xls</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('admin.selectarchive')}}'" style="margin: 10px">Archiwum</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('representatives.index')}}'" style="margin: 10px">Reprezentant</button>  
    <button class="btn btn-primary" onclick="window.location.href='{{route('admin.selectstats')}}'" style="margin: 10px">Statystyka</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('admin.selectstatus')}}'" style="margin: 10px">Status</button> 
    <button class="btn btn-primary" onclick="window.location.href='{{route('coordinators.index')}}'" style="margin: 10px">Koordynatorzy</button> 
    <button class="btn btn-primary" onclick="window.location.href='{{route('specializations.index')}}'" style="margin: 10px">Specjalności</button> 
    </br>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Kierunki
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Podgląd wszystkich kierunków w bazie danych oraz utworzenie nowego</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Podgląd
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Wybór rocznika do podglądu oraz generowania PDF, utworzenie nowego rocznika oraz przeniesienie aktualnego do archiwum.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Import .xls
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Import danych z pliku .xls</div>
          </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                 Export .xls 
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Eksport danych do pliku .xls</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                Archiwum
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Wybór rocznika z archiwum do podglądu</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                Reprezentant
              </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Dodanie, edycja, usunięcie reprezentanta uczelni</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSeven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                Statystyka
              </button>
            </h2>
            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Wybór rocznika do wyświetlenia statystyk</div>
            </div> 
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingEight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                Status
              </button>
            </h2>
            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Wybór rocznika do wyświetlenia oraz edycji statusu praktyk</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingNine">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
                Koordynatorzy
              </button>
            </h2>
            <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Dodanie, edycja, usunięcie koordynatora praktyk</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTen">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
                Specjalności
              </button>
            </h2>
            <div id="flush-collapseTen" class="accordion-collapse collapse" aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Dodanie, edycja, usunięcie specjalności</div>
            </div>
      </div>

    </div>
</div>

@endsection