@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="text-center text-white rounded color">
            <h1 class="display-4">Panel pokojów</h1>
            <a class="btn btn-lg btn-secondary mb-1" href="{{ route('dashboard.rooms.create') }}">Dodaj</a>
        </div>
        <div class="row mb-2 mt-2 border-bottom">
                <div class="col-3"></div>
                <div class="col-2">
                    <span class="text-center h5">Numer</span>
                </div>
                <div class="col-3">
                    <span class="text-center h5">Nazwa</span>
                </div>

            </div>
        @foreach ($rooms as $room)
            <div class="row mb-2 mt-2 border-bottom">
                <div class="col-3"></div>
                <div class="col-2">
                    <span class="text-center">{!! $room->Number !!}</span>
                </div>
                <div class="col-3">
                    <span class="text-center">{!! $room->roomtypes->Name !!}</span>
                </div>
                <div class="col-1 text-right">
                    <a class="btn btn-secondary mb-2" href="{{ route('dashboard.rooms.edit', $room->id) }}">Edytuj</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
