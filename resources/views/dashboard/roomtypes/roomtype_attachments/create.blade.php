@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.roomtypes.roomtype_attachments.store', $roomtype_id) }}" method="post" accept-charset="utf-8">
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
            <label for="photo" class="col-form-label">Zdjęcie: </label>
            <div>
                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
                @if ($errors->has('photo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('photo') }}</strong>
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
