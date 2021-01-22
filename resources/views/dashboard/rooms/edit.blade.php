@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="text-center text-white rounded color">
        <h1 class="display-4">Panel pokojów</h1>
    </div>
<form enctype="multipart/form-data" action="{{ route('dashboard.rooms.update', $room->id) }}" method="post" accept-charset="utf-8">
    
    @csrf
    @method('PATCH')
    <div class="container" style="width:50%;">
    <div class="row no-gutters mb-2">
            <label for="Number" class="col-form-label">Numer: </label>
            <div class="color ml-auto">
                <input id="Number" type="number" class="form-control" name="Number" value="{!! $room->Number !!}" required>
                @if ($errors->has('Number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Number') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-4">
            <label for="roomtypes_id" class="col-form-label">Typ pokoju: </label>
            <div class=" ml-auto mt-auto mb-auto">
                <select name="roomtypes_id" value="" required>
                    @foreach ($roomtypes as $roomtype)
                        @if($roomtype->id == $room->roomtypes_id)
                            <option value="{!! $roomtype->id !!}" selected>{!! $roomtype->Name !!}</option>
                        @else
                            <option value="{!! $roomtype->id !!}">{!! $roomtype->Name !!}</option>
                        @endif
                    @endforeach
                </select>
                @if ($errors->has('roomtypes_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('roomtypes_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-secondary mr-1">Zapisz</button>
            <button type="button" onclick="location.href='{{ route('dashboard.rooms.index')}}'" class="btn btn-lg btn-secondary ml-1">Zamknij</button>
        </div>
    </div>
</form>
</div>

@endsection
