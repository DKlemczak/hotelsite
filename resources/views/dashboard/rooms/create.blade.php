@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.rooms.store') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="row no-gutters mb-4">
            <label for="Number" class="col-form-label">Numer: </label>
            <div>
                <input id="Number" type="number" class="form-control" name="Number" value="" required>
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
                <select name="roomtypes_id" required>
                    @foreach ($roomtypes as $roomtype)
                        <option value="{!! $roomtype->id !!}">{!! $roomtype->Name !!}</option>
                    @endforeach
                </select>
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
        </div>
    </div>
</form>
@endsection
