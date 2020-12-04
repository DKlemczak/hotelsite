@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.rooms.update', $room->id) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="container">
    <div class="row no-gutters mb-4">
            <label for="Number" class="col-form-label">Numer: </label>
            <div>
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
            <div>
                <input id="roomtypes_id" type="number" class="form-control" name="roomtypes_id" min="1" value="{!! $room->roomtypes_id !!}" required>
                @if ($errors->has('roomtypes_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('roomtypes_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group col-12 row mx-0">
            <div class="d-flex justify-content-center mr-1">
                <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
            </div>
            <div class="d-flex justify-content-center ml-1">
                <button type="button" onclick="location.href='{{ route('dashboard.rooms.index')}}'" class="btn btn-lg btn-secondary">Zamknij</button>
            </div>
        </div>
    </div>
</form>

@endsection
