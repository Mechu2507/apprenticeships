@extends('layouts.app')

@section('content')

    <div class="table-container  justify-content-between" style="width: 70%; margin: auto; display: flex; ">

        <div style="50%">
        <form action="{{ route('actives.update', $active->id) }}" method="post">
            @csrf
            @method('PUT')
            <table class="table table-borderless" style="width: 500px">
                <tbody>
                    <tr>
                        <td><label for="student_last_name">Nazwisko: </label></td>
                        <td><input type="text" class="form-control" id="student_last_name" name="student_last_name" value="{{ $active->student_last_name }}"></td>
                    </tr>
                    <tr>
                        <td><label for="student_first_name">Imię: </label></td>
                        <td><input type="text" class="form-control" id="student_first_name" name="student_first_name" value="{{ $active->student_first_name }}"></td>
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
                        <td><label for="company_form">Forma: </label></td>
                        <td><input type="number" class="form-control" id="company_form" min="1" max="3" name="company_form" value="{{ $active->company_form }}"></td>
                    <tr>
                        <td><label for="company_address">Adres firmy: </label></td>
                        <td><input type="text" class="form-control" id="company_address" name="company_address" value="{{ $active->company_address }}"></td>
                    </tr>
                    <tr>
                        <td><label for="company_person">Osoba: </label></td>
                        <td><input type="text" class="form-control" id="company_person" name="company_person" value="{{ $active->company_person }}"></td>
                    </tr>
                    <tr>
                        <td><label for="MrMs_company_person">Pan/Pani: </label></td>
                        <td>
                            <select id="MrMs_company_person" class="form-control" name="MrMs_company_person">
                                <option value="Pan" {{ $active->MrMs_company_person == 'Pan' ? 'selected' : '' }}>Pan</option>
                                <option value="Pani" {{ $active->MrMs_company_person == 'Pani' ? 'selected' : '' }}>Pani</option>
                            </select>
                        </td>
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
                        <td><label for="MrMs_supervisor">Pan/Pani: </label></td>
                        <td>
                            <select id="MrMs_supervisor" class="form-control" name="MrMs_supervisor">
                                <option value="Pan" {{ $active->MrMs_supervisor == 'Pan' ? 'selected' : '' }}>Pan</option>
                                <option value="Pani" {{ $active->MrMs_supervisor == 'Pani' ? 'selected' : '' }}>Pani</option>
                            </select>
                        </td>
                    <tr>
                        <td><label for="hours">Godziny: </label></td>
                        <td><input type="text" class="form-control" id="hours" name="hours" value="{{ $active->hours }}"></td>
                    </tr>
                    <tr>
                        <td><label for="generated">Wygenerowamy: </label></td>
                        <td>
                            <select id="generated" class="form-control" name="generated">
                                <option value="1" {{ $active->generated == 'Tak' ? 'selected' : '' }}>Tak</option>
                                <option value="0" {{ $active->generated == 'Nie' ? 'selected' : '' }}>Nie</option>
                            </select>
                        </td>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
        </div>

        <div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Forma</th>
                        <th>Odmiana</th>
                    </tr>
                </thead>
                <tr>
                    <td> 1. </td>
                    <td> zwany dalej "instytucją" </td>
                </tr>
                <tr>
                    <td> 2. </td>
                    <td> zwana dalej "instytucją" </td>
                </tr>
                <tr>
                    <td> 3. </td>
                    <td> zwane dalej "instytucją" </td>
                </tr>
              </table>
        </div>
    </div>

@endsection