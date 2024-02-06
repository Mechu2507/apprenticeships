@extends('layouts.app')

@section('content')

    <div align="center">

        <form action="{{ route('actives.update', $active->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="student_name" value="{{ $active->student_name }}">
            <input type="text" name="company_name" value="{{ $active->company_name }}">
            <input type="text" name="company_address" value="{{ $active->company_address }}">
            <input type="text" name="company_person" value="{{ $active->company_person }}">
            <input type="text" name="position" value="{{ $active->position }}">
            <input type="date" name="start_date" value="{{ $active->start_date }}">
            <input type="date" name="end_date" value="{{ $active->end_date }}">
            <input type="text" name="supervisor_name" value="{{ $active->supervisor_name }}">
            <input type="text" name="hours" value="{{ $active->hours }}">
            <button type="submit">Zapisz zmiany</button>
        </form>

    </div>

@endsection