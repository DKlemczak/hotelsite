@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row bg-white mb-4">
            <div class="col-12 shadow">
                <h1 class="text-center">Panel tagów pokojów</h1>
                <button><a href="{{ route('dashboard.roomtags.create') }}">Dodaj</a></button>
            </div>
        </div>
        @foreach ($roomtags as $roomtag)
            <div class="row mb-2">
                <div class="col-1">
                    <span class="text-center">{!! $roomtag->Name !!}</span>
                </div>
                <div class="col-2">
                    <button class="btn"><a href="{{ route('dashboard.roomtags.edit', $roomtag->id) }}">Edytuj</a></button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
