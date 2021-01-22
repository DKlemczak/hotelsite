@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.rooms.store') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="text-center text-white rounded color">
            <h1 class="display-4">Panel pokojów</h1>
        </div>
        <div class="container" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="Number" class="col-form-label">Numer: </label>
            <div class="color ml-auto">
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
            <div class="ml-auto mt-auto mb-auto">
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
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
        </div>
    </div>
    </div>
</form>
@endsection
