@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.roomtypes.roomtype_attachments.store', $roomtype_id) }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="text-center text-white rounded color">
            <h1 class="display-4">Panel tagów do typów pokojów</h1>
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
            <label for="photo" class="col-form-label">Zdjęcie: </label>
            <div class="ml-auto mt-auto mb-auto">
                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
                @if ($errors->has('photo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('photo') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
        </div>
    </div>
</form>
@endsection
