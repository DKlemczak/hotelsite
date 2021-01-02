@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row color h3 mb-0 p-3" >
        <div class="text-white" style="border-bottom: 2px solid #fff; width: 100%">
        {!! $room->DescriptionShort !!}
        </div>
    </div>
    <div class="row color">
        <div class="col-6 p-1 m-auto">
            <img src="https://images.trvl-media.com/hotels/7000000/6370000/6361700/6361648/3b46cbf0.jpg?impolicy=fcrop&w=1200&h=800&p=1&q=medium" class="img-fluid">
        </div>
        <div class="col-3">
            <div class="row pt-1 pr-1 pb-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Finteriordesignexplained.com%2Fimages%2Ffull-size%2F10%2Fcommunal-spaces-in-hotel-rooms-1.jpeg&f=1&nofb=1" class="img-fluid">
            </div>
            <div class="row pr-1 pb-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Finteriordesignexplained.com%2Fimages%2Ffull-size%2F10%2Fcommunal-spaces-in-hotel-rooms-1.jpeg&f=1&nofb=1" class="img-fluid">
            </div>
        </div>
        <div class="col-3">
            <div class="row pt-1 pr-1 pb-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Finteriordesignexplained.com%2Fimages%2Ffull-size%2F10%2Fcommunal-spaces-in-hotel-rooms-1.jpeg&f=1&nofb=1" class="img-fluid">
            </div>
            <div class="row pr-1 pb-1">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Finteriordesignexplained.com%2Fimages%2Ffull-size%2F10%2Fcommunal-spaces-in-hotel-rooms-1.jpeg&f=1&nofb=1" class="img-fluid">
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
        <div id="comment-form">

        </div>
        @foreach($room->comments as $comment)
        <div class=" mt-5 mb-2 ml-2">
            <strong>{!! $comment->user->name !!}</strong>
        </div>
        <div class="shadow m-1 p-2"> 
            {!! $comment->comment !!}
        </div>    
         @endforeach 
    </div>
</section>
@endsection