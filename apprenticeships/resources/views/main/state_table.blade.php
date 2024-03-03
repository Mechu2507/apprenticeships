@extends('layouts.app')

@section('content')

    <div class="table-container" style="width: 70%; margin: auto;">

        <h3 style="text-align: center; margin-bottom: 20px;">Statusy wygenerowanych porozumień</h3>

        <form action="{{ route('update.status') }}" method="POST">
            @csrf
            @method('PUT')

        <button type="submit" class="btn btn-primary btn-sm" style="font-size: 1em;">Zmień status</button>

        <table class="table table-striped table-sm" style="font-size: 0.8em;">
            <thead>
                <tr>
                    <th>Nazwisko i imię</th>
                    <th>Wygenerowany</th>
                    <th>Status porozumienia</th>
                    <th>Edycja statusu</th>
                </tr>
            <thead>
            <tbody>
                @foreach ($actives as $active)
                    <tr>
                        <td style="max-width: 25%; white-space: normal; overflow-wrap: break-word;">{{ $active->student_name }}</td>
                        <td class="{{ $active->generated ? 'table-success' : 'table-primary' }}" style="width: 15%">
                            {{ $active->generated ? 'Tak' : 'Nie' }} 
                        </td>
                        <td class="@switch($active->state->id)
                                        @case(1)
                                            table-secondary
                                        @break
                                        @case(2)
                                            table-primary
                                        @break
                                        @case(3)
                                            table-warning
                                        @break
                                        @case(4)
                                            table-success
                                        @break
                                        @default
                                            ''
                                        @endswitch" style="max-width: 20%; white-space: normal; overflow-wrap: break-word;">
                            {{ $active->state->name }}
                        </td>
                        <td style="max-width: 40%; white-space: normal; overflow-wrap: break-word;">
                            <select name="states[{{ $active->id }}]" class="form-control" style="font-size: 1em; width: 100%">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{ $active->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </form>


    </div>

@endsection