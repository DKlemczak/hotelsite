@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row bg-white mb-4">
            <div class="col-12 shadow">
                <h1 class="text-center">Panel pokojów</h1>
                <button><a href="{{ route('dashboard.rooms.create') }}">Dodaj</a></button>
            </div>
        </div>
        @foreach ($rooms as $room)
            <div class="row mb-2">
                <div class="col-1">
                    <span class="text-center">{!! $room->Number !!}</span>
                </div>
                <div class="col-4">
                    <span class="text-center">{!! $room->roomtypes->Name !!}</span>
                </div>
                <div class="col-2">
                    <button class="btn"><a href="{{ route('dashboard.rooms.edit', $room->id) }}">Edytuj</a></button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
