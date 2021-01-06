@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<section class="content">
    <div class="row color h3 mb-0 p-3" >
        <div class="text-white" style="border-bottom: 2px solid #fff; width: 100%">
        {!! $room->DescriptionShort !!}
        </div>
    </div>
    <div class="row color pl-5 pr-5 pb-3">
    <div id="carouselExampleControls" class="carousel slide mx-auto" data-ride="carousel">
    <ol class="carousel-indicators">
    @foreach($room->attachments as $attachment)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
    @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
    @foreach($room->attachments as $attachment)
       <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
           <img class="d-block img-fluid" src="{!! $attachment->data_uri !!}">
       </div>
    @endforeach
    </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
    </div>
    <div class="row shadow-lg">
        <div class="col-9 pl-0 pt-3 pr-0 pb-3 text_justify" >
            <div class="p-2" style="border-right: 4px solid #753c52; height: 100%">
                {!! $room->DescriptionLong !!}
            </div>
        </div>
        <div class="col-3 text-right pt-3 mb-3">
            <div class="h5 mb-0">
                <strong>{!! $room->PricePerDay !!} zł</strong>
            </div>
            <div class="pt-0">
                za noc
            </div>
            <div class="pb-3 pt-3 d-flex">
                <div class="ml-auto d-flex">
                    <img src="/svg/people.svg" style="max-height: 20px;">
                    <div class="pl-1">{!! $room->RoomSpace !!} os.</div>
                </div>
            </div>
            <div class="text-left h5">Wyposarzenie pokoju</div>
            @foreach($room->roomtags as $tag)
            <div class="d-flex color shadow text-white m-1 pl-1"> 
                {!! $tag->Name !!}
            </div>    
            @endforeach    
        </div>
    </div>
    <div>
        <div class="h3 mt-5 mb-4" style="border-bottom: 1px solid #753c52; width: 100%">Komentarze</div>
        @auth
        <form enctype="multipart/form-data" action="{{ route('offer.details.addcomment', $room->id) }}" method="post" accept-charset="utf-8">
        @csrf
        <div class="container">
            <div class="row no-gutters mb-4">
                <label for="comment" class="col-form-label">Dodaj komentarz: </label>
                <textarea class="form-control" name="comment" style="max-width: 100%; resize:none" rows="15"></textarea>
                @if ($errors->has('comment'))
                    <span class="help-block">
                        <strong>{{ $errors->first('comment') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-12 row mx-0">
                <div class="d-flex justify-content-center mr-1">
                    <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
                </div>
            </div>
        </div>
        </form>
        @endauth
        @foreach($room->comments as $comment)
        <div class=" mt-5 mb-2 ml-2">
            <strong>{!! $comment->user->name !!}</strong>
            @if(Auth::user()->is_admin)
            <button class="btn"><a href="{{ route('offer.details.deletecomment', $comment->id) }}">Usuń komentarz</a></button>
            @endif
        </div>
        <div class="shadow m-1 p-2"> 
            {!! $comment->comment !!}
        </div>    
         @endforeach 
    </div>
</section>
@endsection