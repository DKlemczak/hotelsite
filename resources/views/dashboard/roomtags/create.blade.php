@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.roomtags.store') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="row no-gutters mb-4">
            <label for="Name" class="col-form-label">Nazwa: </label>
            <div>
                <input id="Name" type="text" class="form-control" name="Name" value="" required>
                @if ($errors->has('Name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Name') }}</strong>
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