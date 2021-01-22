@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="text-center text-white rounded color">
        <h1 class="display-4">Panel tagów pokojów</h1>
    </div>
<form enctype="multipart/form-data" action="{{ route('dashboard.roomtags.update', $roomtag->id) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="container" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="Name" class="col-form-label">Nazwa: </label>
            <div class="color ml-auto">
                <input id="Name" type="text" class="form-control" name="Name" value="{{$roomtag->Name}}" required>
                @if ($errors->has('Name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-secondary mr-1">Zapisz</button>
            <button type="button" onclick="location.href='{{ route('dashboard.roomtags.index')}}'" class="btn btn-lg btn-secondary ml-1">Zamknij</button>
        </div>
    </div>
</form>
</div>
@endsection
