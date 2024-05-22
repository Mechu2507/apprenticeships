@extends('layouts.app')

@section('content')

    <div class="container" style="width: 70%;">

    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectclass')}}'" style="margin: 10px">Podgląd</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('import-active')}}'" style="margin: 10px">Import .xls</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('export-index')}}'" style="margin: 10px">Export .xls</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectarchive')}}'" style="margin: 10px">Archiwum</button>
    </br>
    <button class="btn btn-primary" onclick="window.location.href='{{route('representatives.index')}}'" style="margin: 10px">Reprezentant</button>  
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectstats')}}'" style="margin: 10px">Statystyka</button>
    <button class="btn btn-primary" onclick="window.location.href='{{route('selectstatus')}}'" style="margin: 10px">Status</button> 
    <button class="btn btn-primary" onclick="window.location.href='{{route('coordinators.index')}}'" style="margin: 10px">Koordynatorzy</button>  

    <br/><br/>
    
    <h4>Witaj w systemie obsługi praktyk studenckich</h4>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Podgląd
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Wybór rocznika do podglądu oraz generowania PDF, utworzenie nowego rocznika oraz przeniesienie aktualnego do archiwum.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Import .xls
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Import danych z pliku .xls</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Export .xls
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Eksport danych do pliku .xls</div>
          </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                  Archiwum
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Wybór rocznika z archiwum do podglądu</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                  Reprezentant
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Dodanie, edycja, usunięcie reprezentanta uczelni</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                  Statystyka
              </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Wybór rocznika do wyświetlenia statystyk</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSeven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                  Status
              </button>
            </h2>
            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Wybór rocznika do wyświetlenia oraz edycji statusu praktyk</div>
            </div> 
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingEight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                  Koordynatorzy
              </button>
            </h2>
            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Dodanie, edycja, usunięcie koordynatora praktyk</div>
            </div>
          </div>
      </div>

      <br/><br/>
    </div>

@endsection