@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.roomtags.store') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="text-center text-white rounded color">
            <h1 class="display-4">Panel tagów pokojów</h1>
        </div>
        <div class="container" style="width:50%;">
        <div class="row no-gutters mb-2">
            <label for="Name" class="col-form-label">Nazwa: </label>
            <div class="color ml-auto">
                <input id="Name" type="text" class="form-control" name="Name" value="" required>
                @if ($errors->has('Name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
            </div>
        </div>
    </div>
    </div>
</form>
@endsection