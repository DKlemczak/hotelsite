@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.roomtypes.roomtags_roomtypes.store', $roomtype_id) }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="text-center text-white rounded color">
            <h1 class="display-4">Panel zdjęć do typów pokojów</h1>
        </div>
    <div class="container" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="roomtypes_id" class="col-form-label">Typ pokoju: </label>
            <div class="color ml-auto">
                <input id="roomtype_name" type="text" class="form-control" name="roomtype_name" value="{{ $roomtypes->Name }}" readonly>
                @if ($errors->has('roomtype_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('roomtype_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-2">
            <label for="roomtags_id" class="col-form-label">Tag pokoju: </label>
            <div class="ml-auto mt-auto mb-auto">
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
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
        </div>
    </div>
    </div>
</form>
@endsection
