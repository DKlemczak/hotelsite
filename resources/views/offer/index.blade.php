@extends('layouts.app')

@section('content')
    @foreach($rooms as $room)
    <p>Opis {!! $room->Description !!}</p>
    <p>Ile osób {!! $room->RoomSpace !!}</p>
    <p>Cena {!! $room->PricePerDay !!}</p>
    @endforeach
@endsection