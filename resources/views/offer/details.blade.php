@extends('layouts.app')
@section('content')
    {!! $room->DescriptionLong !!}
    {!! $room->RoomSpace !!}
    {!! $room->PricePerDay !!}
    @foreach($room->roomtags as $tag)
    <p>{!! $tag->Name !!}</p>
    @endforeach
@endsection