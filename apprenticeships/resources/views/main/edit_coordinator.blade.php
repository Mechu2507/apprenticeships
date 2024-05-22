@extends('layouts.app')

@section('content')

    <div class="table-container" style="width: 90%; margin: auto;">

        <h4>Edytuj dane koordynatora</h4>
        
        <form action="{{ route('update-coordinator', $coordinator->id )}}" method="post">
            @csrf
            @method('PUT')
            <table class="table table-borderless" style="width: 500px">
                <tbody>
                    <tr>
                        <td><label for="direction">Kierunek: </label></td>
                        <td><input type="text" class="form-control" id="direction" name="direction" value="{{ $coordinator->direction }}"></td>
                    </tr>
                    <tr>
                        <td><label for="name">Nazwisko i imię: </label></td>
                        <td><input type="text" class="form-control" id="name" name="name" value="{{ $coordinator->name }}"></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Telefon: </label></td>
                        <td><input type="text" class="form-control" id="phone" name="phone" value="{{ $coordinator->phone }}"></td>
                    </tr>
                    <tr>
                        <td><label for="mail_ur">Mail UR: </label></td>
                        <td><input type="text" class="form-control" id="mail_ur" name="mail_ur" value="{{ $coordinator->mail_ur }}"></td>
                    </tr>
                    <tr>
                        <td><label for="mail_google">Mail Google: </label></td>
                        <td><input type="text" class="form-control" id="mail_google" name="mail_google" value="{{ $coordinator->mail_google }}"></td>
                    </tr>
                    <tr>
                        <td><label for="table_shared">Tabela udostępniona: </label></td>
                        <td><input type="text" class="form-control" id="table_shared" name="table_shared" value="{{ $coordinator->table_shared }}"></td>
                    </tr>
                    <tr>
                        <td><label for="form_link">Link Formularza: </label></td>
                        <td><input type="text" class="form-control" id="form_link" name="form_link" value="{{ $coordinator->form_link }}"></td>
                    </tr>
                    <tr>
                        <td><label for="login_method">Sposób logowania na dysk Google: </label></td>
                        <td><input type="text" class="form-control" id="login_method" name="login_method" value="{{ $coordinator->login_method }}"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
        
    </div>

@endsection