@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row bg-white mb-4">
            <div class="col-12 shadow">
                <h1 class="text-center">Panel typów pokojów</h1>
                <button><a href="{{ route('dashboard.roomtypes.create') }}">Dodaj</a></button>
            </div>
        </div>
        @foreach ($roomtypes as $roomtype)
            <div class="row mb-2">
                <div class="col-1">
                    <span class="text-center">{!! $roomtype->Name !!}</span>
                </div>
                <div class="col-4">
                    <span class="text-center">{!! $roomtype->DescriptionShort !!}</span>
                </div>
                <div class="col-1">
                    <span class="text-center">{!! $roomtype->RoomSpace !!} os.</span>
                </div>
                <div class="col-2">
                    <span class="text-center">{!! $roomtype->PricePerDay !!} zł</span>
                </div>
                <div class="col-2">
                    <button class="btn"><a href="{{ route('dashboard.roomtypes.edit', $roomtype->id) }}">Edytuj</a></button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
