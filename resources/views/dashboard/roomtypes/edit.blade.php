@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.roomtypes.update', $roomtype->id) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="container">
        <div class="row no-gutters mb-4">
            <label for="Name" class="col-form-label">Nazwa: </label>
            <div>
                <input id="Name" type="text" class="form-control" name="Name" value="{{$roomtype->Name}}" required>
                @if ($errors->has('Name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-4">
            <label for="Name" class="col-form-label">Krótki opis: </label>
            <div>
                <textarea class="form-control" name="DescriptionShort" style="max-width: 100%;" rows="15">{{!! $roomtype->DescriptionShort !!}}</textarea>
                @if ($errors->has('DescriptionShort'))
                    <span class="help-block">
                        <strong>{{ $errors->first('DescriptionShort') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters">
            <label for="Name" class="col-form-label">Długi opis: </label>
            <div>
                <textarea class="form-control" name="DescriptionLong" style="max-width: 100%;" rows="15">{{!! $roomtype->DescriptionLong !!}}</textarea>
                @if ($errors->has('DescriptionLong'))
                    <span class="help-block">
                        <strong>{{ $errors->first('DescriptionLong') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters">
            <label for="RoomSpace" class="col-form-label">Liczba osób: </label>
            <div>
                <input id="RoomSpace" type="number" class="form-control" name="RoomSpace" value="{{$roomtype->RoomSpace}}" required>
                @if ($errors->has('RoomSpace'))
                    <span class="help-block">
                        <strong>{{ $errors->first('RoomSpace') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters">
            <label for="PricePerDay" class="col-form-label">Koszt za noc: </label>
            <div>
                <input id="PricePerDay" type="number" class="form-control" name="PricePerDay" value="{{$roomtype->PricePerDay}}" required>
                @if ($errors->has('PricePerDay'))
                    <span class="help-block">
                        <strong>{{ $errors->first('PricePerDay') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group col-12 row mx-0">
            <div class="d-flex justify-content-center mr-1">
                <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
            </div>
            <div class="d-flex justify-content-center ml-1">
                <button type="button" onclick="location.href='{{ route('dashboard.roomtypes.index')}}'" class="btn btn-lg btn-secondary">Zamknij</button>
            </div>
        </div>
    </div>
</form>

@endsection
