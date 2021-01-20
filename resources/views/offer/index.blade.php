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
        <div class="indi_room shadow-lg m-auto">
            @foreach($room->attachments as $attachment)
                @if ($loop->first)
                    <img src="{!! $attachment->data_uri !!}"class="room_img p-2 img-fluid">
                @endif
            @endforeach
            <div class="room_info mb-4 pb-2">
                <h3 class="description ml-2">{!! $room->DescriptionShort !!}</h3>
                <h5 class="roomspace ml-2">Pokój dla {!! $room->RoomSpace !!} os. {!! $room->PricePerDay !!} zł</strong> za noc </h5>
                <div class="row px-4">
                    @auth
                    <div>
                        <button type="button" class="btn btn-default priceperday" data-toggle="modal" data-target="#myModal{!!$room->Name!!}"><strong style="padding-right:5px;">Zarezerwuj</strong></button>
                    </div>
                    @else
                    <p>Załóż konto przed złożeniem zamówienia</p>
                    @endauth
                    <div class="ml-auto">
                        <button type="button" class="btn btn-default priceperday"><a class="text-white" href="{{ route('offer.details', [$room->id]) }}">Szczegóły pokoju</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal{!!$room->Name!!}" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Rezerwowanie</h4>
                </div>
                <div class="modal-body">
                  <p>Wybierz początkową i końcową datę pobytu:</p>
                  <form enctype="multipart/form-data" action="{{ route('offer.addtocart') }}" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="container">
                        <div class="row no-gutters mb-4">
                            <input id="id" type="number" class="form-control" name="id" value="{!! $room->id !!}" hidden required>
                            <label for="datefrom" class="col-form-label">Data rozpoczęcia pobytu: </label>
                            <div>
                                <input id="datefrom" type="date" class="form-control" name="datefrom" value="" required>
                                @if ($errors->has('datefrom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datefrom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row no-gutters mb-4">
                            <label for="dateto" class="col-form-label">Data zakończenia pobytu: </label>
                            <div>
                                <input id="dateto" type="date" class="form-control" name="dateto" value="" required>
                                @if ($errors->has('dateto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dateto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-12 row mx-0">
                            <div class="d-flex justify-content-center mr-1">
                                <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
        @endforeach
    </div>
</section>
@endsection
