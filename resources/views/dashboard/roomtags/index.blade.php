@extends('layouts.dashboard')

@section('content')
    <div class="container">
            <div class="text-center text-white rounded color">
                <h1 class="display-4">Panel tagów pokojów</h1>
                <a class="btn btn-lg btn-secondary mb-1" href="{{ route('dashboard.roomtags.create') }}">Dodaj</a>
            </div>
            <div class="row mt-2 border-bottom">
                <div class="col-4"></div>
                <div class="col-1">
                    <span class="text-center h5">Nazwa</span>
                </div>
            </div>
        @foreach ($roomtags as $roomtag)
            <div class="row mt-2 border-bottom">
                <div class="col-4"></div>
                <div class="col-2">
                    <span class="text-center">{!! $roomtag->Name !!}</span>
                </div>
                <div class="col-1"></div>
                <div class="col-2 p-0">
                    <a class="btn btn-secondary mb-2" href="{{ route('dashboard.roomtags.edit', $roomtag->id) }}">Edytuj</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
