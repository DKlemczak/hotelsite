@extends('layouts.app')

@section('content')
<section class="banner">
    <div class="bannerimg">
        <div class="bannertxt">Wakacyjne pokoje</div>
    </div>
</section>
<section class="content">
<div class="h1 text-center">Pokoje Hotelowe</div>
<div class="h5 pb-5 text-center">Oferujemy szeroką gamę pokoi, aby spełnić wszystkie życzenia i potrzeby naszych gości. Dzięki różnym typom pokoi możemy zaoferować coś dla każdego podróżnika.</div>
    <div class="kapsle">
        @foreach($rooms as $room)
        <div class=indi_room>
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Finteriordesignexplained.com%2Fimages%2Ffull-size%2F10%2Fcommunal-spaces-in-hotel-rooms-1.jpeg&f=1&nofb=1" class="room_img img-fluid">
            <div class="room_info">
                <div class="description">{!! $room->Description !!}</div>
                <div class="roomspace">Pokój dla {!! $room->RoomSpace !!} os.</div>
                <div class="priceperday"><strong style="padding-right:5px;">{!! $room->PricePerDay !!} zł</strong>/noc</div>
                <a href="" class="room_details">Szczegóły pokoju</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection