@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.roomtypes.roomtags_roomtypes.store', $roomtype_id) }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="row no-gutters mb-4">
            <label for="roomtypes_id" class="col-form-label">Typ pokoju: </label>
            <div>
                <input id="roomtype_name" type="text" class="form-control" name="roomtype_name" value="{{ $roomtypes->Name }}" readonly>
                @if ($errors->has('roomtype_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('roomtype_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-4">
            <label for="roomtags_id" class="col-form-label">Tag pokoju: </label>
            <div>
                <select name="roomtags_id" required>
                    @foreach ($roomtags as $roomtag)
                        <option value="{!! $roomtag->id !!}">{!! $roomtag->Name !!}</option>
                    @endforeach
                </select>
                @if ($errors->has('roomtags_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('roomtags_id') }}</strong>
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
@endsection
