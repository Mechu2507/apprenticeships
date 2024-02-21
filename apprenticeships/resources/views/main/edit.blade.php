@extends('layouts.app')

@section('content')

        <form action="{{ route('actives.update', $active->id) }}" method="post">
            @csrf
            @method('PUT')
            <table class="table table-borderless" style="width: 500px">
                <tbody>
                    <tr>
                        <td><label for="student_name">Nazwisko i imię: </label></td>
                        <td><input type="text" class="form-control" id="student_name" name="student_name" value="{{ $active->student_name }}"></td>
                    </tr>
                    <tr>
                        <td><label for="MrMs">Pan/Pani: </label></td>
                        <td>
                            <select id="MrMs" class="form-control" name="MrMs">
                                <option value="Pan" {{ $active->MrMs == 'Pan' ? 'selected' : '' }}>Pan</option>
                                <option value="Pani" {{ $active->MrMs == 'Pani' ? 'selected' : '' }}>Pani</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="company_name">Nazwa firmy: </label></td>
                        <td><input type="text" class="form-control" id="company_name" name="company_name" value="{{ $active->company_name }}"></td>
                    </tr>
                    <tr>
                        <td><label for="company_address">Adres firmy: </label></td>
                        <td><input type="text" class="form-control" id="company_address" name="company_address" value="{{ $active->company_address }}"></td>
                    </tr>
                    <tr>
                        <td><label for="company_person">Osoba: </label></td>
                        <td><input type="text" class="form-control" id="company_person" name="company_person" value="{{ $active->company_person }}"></td>
                    </tr>
                    <tr>
                        <td><label for="position">Rola: </label></td>
                        <td><input type="text" class="form-control" id="position" name="position" value="{{ $active->position }}"></td>
                    </tr>
                    <tr>
                        <td><label for="start_date">Data rozpoczęcia: </label></td>
                        <td><input type="date" class="form-control" id="start_date" name="start_date" value="{{ $active->start_date }}"></td>
                    </tr>
                    <tr>
                        <td><label for="end_date">Data zakończenia: </label></td>
                        <td><input type="date" class="form-control" id="end_date" name="end_date" value="{{ $active->end_date }}"></td>
                    </tr>
                    <tr>
                        <td><label for="supervisor_name">Opiekun: </label></td>
                        <td><input type="text" class="form-control" id="supervisor_name" name="supervisor_name" value="{{ $active->supervisor_name }}"></td>
                    </tr>
                    <tr>
                        <td><label for="hours">Godziny: </label></td>
                        <td><input type="text" class="form-control" id="hours" name="hours" value="{{ $active->hours }}"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>

@endsection