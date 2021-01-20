@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-1">
                <p>Rezerwacja</p>
            </div>
            <div class="col-2">
                <p>Zaliczka</p>
            </div>
            <div class="col-2">
                <p>Wartość</p>
            </div>
            <div class="col-2">
                <p>Status</p>
            </div>
        </div>
        @foreach($reservations as $reservation)
            <div class="row bg-white mb-3 shadow-sm">
                <div class="col-1">
                    <p class="my-auto">{!!$reservation->id!!}.</p>
                </div>
                <div class="col-2">
                    <p class="my-auto">{!!$reservation->advance!!} zł</p>
                </div>
                <div class="col-2">
                    <p class="my-auto">{!!$reservation->full_price!!} zł</p>
                </div>
                <div class="col-2">
                    @if($reservation->status == 1)
                        <p class="my-auto">Nie opłacono</p>
                    @endif
                    @if($reservation->status == 2)
                        <p class="my-auto">Opłacone</p>
                    @endif
                    @if($reservation->status == 3)
                        <p class="my-auto">Odbyta</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
