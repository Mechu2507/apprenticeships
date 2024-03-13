@extends('layouts.app')

@section('content')

    <div class="table-container" style="width: 90%; margin: auto;">

        <h4>Edytuj dane studenta lub statusy wygenerowanych porozumień</h4>
        
        <form action="{{ route('update.status', $active->id )}}" method="post">
            @csrf
            @method('PUT')
            <table class="table table-borderless" style="width: 500px">
                <tbody>
                    <tr>
                        <td><label for="student_name">Nazwisko i imię: </label></td>
                        <td><label for="student_name">{{ $active->student_name }}</label></td>
                    </tr>
                    <tr>
                        <td><label for="index">Indeks: </label></td>
                        <td><input type="text" class="form-control" id="index" name="index" value="{{ $active->index }}"></td>
                    </tr>
                    <tr>
                        <td><label for="address">Adres: </label></td>
                        <td><input type="text" class="form-control" id="address" name="address" value="{{ $active->address }}"></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Telefon: </label></td>
                        <td><input type="text" class="form-control" id="phone" name="phone" value="{{ $active->phone }}"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email: </label></td>
                        <td><input type="text" class="form-control" id="email" name="email" value="{{ $active->email }}"></td>
                    </tr>
                    <tr>
                        <td><label for="for_signature">Do podpisu: </label></td>
                        <td><input type="date" class="form-control" id="for_signature" name="for_signature" value="{{ $active->for_signature }}"></td>
                    </tr>
                    <tr>
                        <td><label for="mail_date">Data maila: </label></td>
                        <td><input type="date" class="form-control" id="mail_date" name="mail_date" value="{{ $active->mail_date }}"></td>
                    </tr>
                    <tr>
                        <td><label for="envelope_date">Data koperty: </label></td>
                        <td><input type="date" class="form-control" id="envelope_date" name="envelope_date" value="{{ $active->envelope_date }}"></td>
                    </tr>
                    <tr>
                        <td><label for="self_collection">Odbiór własny: </label></td>
                        <td><input type="date" class="form-control" id="self_collection" name="self_collection" value="{{ $active->self_collection }}"></td>
                    </tr>
                    <tr>
                        <td><label for="return">Zwrot: </label></td>
                        <td><input type="date" class="form-control" id="return" name="return" value="{{ $active->return }}"></td>
                    </tr>
                    <tr>
                        <td><label for="company">Firma: </label></td>
                        <td><input type="text" class="form-control" id="company" name="company" value="{{ $active->company }}"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
        
    </div>

@endsection