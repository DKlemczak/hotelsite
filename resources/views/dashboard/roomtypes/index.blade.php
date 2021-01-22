@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="text-center text-white rounded color">
            <h1 class="display-4">Panel typów pokojów</h1>
            <a class="btn btn-lg btn-secondary mb-1" href="{{ route('dashboard.roomtypes.create') }}">Dodaj</a>
        </div>
        <div class="row mt-2 border-bottom">
                <div class="col-2">
                    <span class="text-center h5">Nazwa</span>
                </div>
                <div class="col-3">
                    <span class="text-center h5">Opis</span>
                </div>
                <div class="col-2">
                    <span class="text-center h5">Liczba osób</span>
                </div>
                <div class="col-2">
                    <span class="text-center h5">Kwota</span>
                </div>
            </div>
        @foreach ($roomtypes as $roomtype)
            <div class="row mt-2 border-bottom">
                <div class="col-2">
                    <span class="text-center">{!! $roomtype->Name !!}</span>
                </div>
                <div class="col-3">
                    <span class="text-center">{!! $roomtype->DescriptionShort !!}</span>
                </div>
                <div class="col-2">
                    <span class="text-center">{!! $roomtype->RoomSpace !!} os.</span>
                </div>
                <div class="col-2">
                    <span class="text-center">{!! $roomtype->PricePerDay !!} zł</span>
                </div>
                <div class="col-1 pl-1">
                    <a class="btn btn-secondary mb-2" href="{{ route('dashboard.roomtypes.roomtags_roomtypes.index', $roomtype->id) }}">Tagi</a>
                </div>
                <div class="col-1 p-0">
                    <a class="btn btn-secondary mb-2" href="{{ route('dashboard.roomtypes.roomtype_attachments.index', $roomtype->id) }}">Zdjęcia</a>
                </div>
                <div class="col-1">
                    <a class="btn btn-secondary mb-2" href="{{ route('dashboard.roomtypes.edit', $roomtype->id) }}">Edytuj</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
