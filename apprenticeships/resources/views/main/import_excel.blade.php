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
        <input class="form-control" type="file" name="file" required>
        <br/>
        <button class="btn btn-primary" type="submit">Importuj XLS</button>
    </form>
    
    <br/>
    <p>Menu rozwijane pozwala na wybranie rocznika z bazy aktualnych roczników danego kierunku</p>
    <p>W polu "Wybierz plik" należy wybrać plik .xls z danymi do importu</p>
    <p>Przycisk "Importuj XLS" pozwala na zaimportowanie danych do bazy z pliku .xls</p>

    </div>
@endsection