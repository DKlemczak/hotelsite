@extends('layouts.app')

@section('content')
<section class="banner">
    <div class="bannerimg">
        <div class="bannertxt">Wakacyjne pokoje</div>
    </div>
</section>
<section class="content">
<div class="jumbotron p-3 p-md-5 text-white rounded color">
    <div class="col-md-6 px-0">
      <h1 class="display-4">Pokoje Hotelowe</h1>
      <p class="lead my-3">Oferujemy szeroką gamę pokoi, aby spełnić wszystkie życzenia i potrzeby naszych gości. Dzięki różnym typom pokoi możemy zaoferować coś dla każdego podróżnika.</p>
    </div>
</div>
    <div class="kapsle">
        @foreach($rooms as $room)
        <div class="indi_room shadow m-auto">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Finteriordesignexplained.com%2Fimages%2Ffull-size%2F10%2Fcommunal-spaces-in-hotel-rooms-1.jpeg&f=1&nofb=1" class="room_img p-2 img-fluid">
            <div class="room_info mb-4 pb-2">
                <h3 class="description ml-2">{!! $room->DescriptionShort !!}</h3>
                <h5 class="roomspace ml-2">Pokój dla {!! $room->RoomSpace !!} os.</h5>
                <div class="row px-4">
                    <div>
                        <button type="button" class="btn btn-default priceperday"><strong style="padding-right:5px;">{!! $room->PricePerDay !!} zł</strong>/noc</button>
                    </div>
                    <div class="ml-auto">
                        <button type="button" class="btn btn-default priceperday"><a class="text-white" href="{{ route('offer.details', [$room->id]) }}">Szczegóły pokoju</a></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection