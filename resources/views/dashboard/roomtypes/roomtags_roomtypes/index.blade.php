@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row bg-white mb-4">
            <div class="col-12 shadow">
                <h1 class="text-center">Panel tagów do typów pokojów</h1>
                <button><a href="{{ route('dashboard.roomtypes.roomtags_roomtypes.create', $roomtype_id) }}">Dodaj</a></button>
            </div>
        </div>
        @foreach ($roomtags_roomtypes as $roomtags_roomtype)
            <div class="row mb-2">
                <div class="col-1">
                    <span class="text-center">{!! $roomtags_roomtype->roomtags->Name !!}</span>
                </div>
                <div class="col-2">
                    <form action="{{ route('dashboard.roomtypes.roomtags_roomtypes.destroy', [$roomtags_roomtype->id, $roomtype_id]) }}" method="post" accept-charset="utf-8">
                        @csrf
                        @method("DELETE")
                        <button class="btn">Usuń</a></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
