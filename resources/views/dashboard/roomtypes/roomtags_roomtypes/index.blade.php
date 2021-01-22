@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="text-center text-white rounded color">
            <h1 class="display-4">Panel tagów do typów pokojów</h1>
            <a class="btn btn-lg btn-secondary mb-1" href="{{ route('dashboard.roomtypes.roomtags_roomtypes.create', $roomtype_id) }}">Dodaj</a>
        </div>
        <div class="row mt-2 border-bottom">
            <div class="col-4"></div>
            <div class="col-2 h5">Tag</div>
        </div>
        @foreach ($roomtags_roomtypes as $roomtags_roomtype)
            <div class="row mt-2 border-bottom">
            <div class="col-4"></div>
                <div class="col-2">
                    <span class="text-center">{!! $roomtags_roomtype->roomtags->Name !!}</span>
                </div>
                <div class="col-1"></div>
                <div class="col-2 p-0">
                    <form action="{{ route('dashboard.roomtypes.roomtags_roomtypes.destroy', [$roomtags_roomtype->id, $roomtype_id]) }}" method="post" accept-charset="utf-8">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-secondary mb-2">Usuń</a></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
