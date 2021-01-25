@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="text-center text-white rounded color">
        <h1 class="display-4">Panel typów pokojów</h1>
    </div>
<form enctype="multipart/form-data" action="{{ route('dashboard.roomtypes.update', $roomtype->id) }}" method="post" accept-charset="utf-8">
   
    @csrf
    @method('PATCH')
    <div class="container" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="Name" class="col-form-label">Nazwa: </label>
            <div class="color ml-auto">
                <input id="Name" type="text" class="form-control" name="Name" value="{!! $roomtype->Name !!}" required>
                @if ($errors->has('Name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="Name" class="col-form-label">Krótki opis: </label>
            <div class="color ml-auto">
                <textarea class="form-control" name="DescriptionShort" style="max-width: 100%;" rows="15">{!! $roomtype->DescriptionShort !!}</textarea>
                @if ($errors->has('DescriptionShort'))
                    <span class="help-block">
                        <strong>{{ $errors->first('DescriptionShort') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="Name" class="col-form-label">Długi opis: </label>
            <div class="color ml-auto">
                <textarea class="form-control" name="DescriptionLong" style="max-width: 100%;" rows="15">{!! $roomtype->DescriptionLong !!}</textarea>
                @if ($errors->has('DescriptionLong'))
                    <span class="help-block">
                        <strong>{{ $errors->first('DescriptionLong') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="RoomSpace" class="col-form-label">Liczba osób: </label>
            <div class="color ml-auto">
                <input id="RoomSpace" type="number" class="form-control" name="RoomSpace" value="{!! $roomtype->RoomSpace !!}" required>
                @if ($errors->has('RoomSpace'))
                    <span class="help-block">
                        <strong>{{ $errors->first('RoomSpace') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="PricePerDay" class="col-form-label">Koszt za noc: </label>
            <div class="color ml-auto">
                <input id="PricePerDay" type="number" class="form-control" name="PricePerDay" value="{!! $roomtype->PricePerDay !!}" required>
                @if ($errors->has('PricePerDay'))
                    <span class="help-block">
                        <strong>{{ $errors->first('PricePerDay') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-lg btn-secondary mr-1">Zapisz</button>
                <button type="button" onclick="location.href='{{ route('dashboard.roomtypes.index')}}'" class="btn btn-lg btn-secondary ml-1">Zamknij</button>
            </div>
    </div>
</form>
</div>
@endsection
