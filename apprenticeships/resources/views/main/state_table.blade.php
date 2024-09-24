@extends('layouts.app')

@section('content')

    <div class="table-container" style="width: 90%; margin: auto;">

        <h3 style="text-align: center; margin-bottom: 20px;">Statusy wygenerowanych porozumień</h3>

        <form action="{{ route('upload-students-data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="code_id" value="{{ $codeId }}">
            <input class="form-control" style="max-width: 500px" type="file" name="file" required>
            <br/>
            <button class="btn btn-primary" type="submit">Importuj XLS</button>
        </form>

        <br/>

        <table class="table table-striped table-sm" style="font-size: 0.8em;">
            <thead>
                <tr>
                    <th>Nazwisko i imię</th>
                    <th>Indeks</th>
                    <th>Adres</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>do Podpisu</th>
                    <th>data Maila</th>
                    <th>data Koperty</th>
                    <th>Odbiór Wł.</th>
                    <th>Zwrot</th>
                    <th>Firma</th>
                    <th>Edytuj</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($actives as $active)
                    <tr>
                        <td style="white-space: normal; overflow-wrap: break-word;">{{ $active->student_name }}</td>
                        <td style="white-space: normal; overflow-wrap: break-word;">{{ $active->index }}</td>
                        <td style="white-space: normal; overflow-wrap: break-word;">{{ $active->address }}</td>
                        <td style="white-space: normal; overflow-wrap: break-word;">{{ $active->phone }}</td>
                        <td style="white-space: normal; overflow-wrap: break-word;">{{ $active->email }}</td>
                        <td class="@if ($active->for_signature != NULL) table-danger @endif" style="max-width: 25%; white-space: normal; overflow-wrap: break-word;">
                            @if ($active->for_signature == NULL)
                                Brak danych
                            @else
                                {{ $active->for_signature }}
                            @endif
                        </td>
                        <td class="@if ($active->mail_date != NULL) table-warning @endif" style="max-width: 25%; white-space: normal; overflow-wrap: break-word;">
                            @if ($active->mail_date == NULL)
                                Brak danych
                            @else
                                {{ $active->mail_date }}
                            @endif
                        </td>
                        <td class="@if ($active->envelope_date != NULL) table-success @endif" style="max-width: 25%; white-space: normal; overflow-wrap: break-word;">
                            @if ($active->envelope_date == NULL)
                                Brak danych
                            @else
                                {{ $active->envelope_date }}
                            @endif
                        </td>
                        <td class="@if ($active->self_collection != NULL) table-info @endif" style="max-width: 25%; white-space: normal; overflow-wrap: break-word;">
                            @if ($active->self_collection == NULL)
                                Brak danych
                            @else
                                {{ $active->self_collection }}
                            @endif
                        </td>
                        <td class="@if ($active->return != NULL) table-primary @endif" style="max-width: 25%; white-space: normal; overflow-wrap: break-word;">
                            @if ($active->return == NULL)
                                Brak danych
                            @else
                                {{ $active->return }}
                            @endif
                        </td>
                        <td style="max-width: 25%; white-space: normal; overflow-wrap: break-word; @if ($active->company != '0') background-color: #a160d1; @endif">{{ $active->company }}</td>
                        <td style="max-width: 25%; white-space: normal; overflow-wrap: break-word;">
                            <a href="{{ route('edit.status', $active->id) }}" class="btn btn-primary btn-sm">Edytuj</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection