@extends('layouts.dashboard')

@section('content')
<form enctype="multipart/form-data" action="{{ route('dashboard.news.store') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="container">
        <div class="row no-gutters mb-4">
            <label for="title" class="col-form-label">Tytuł: </label>
            <div>
                <input id="title" type="text" class="form-control" name="title" value="" required>
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row no-gutters mb-4">
            <label for="content" class="col-form-label">Zawartość: </label>
            <div>
                <textarea class="form-control" name="content" style="max-width: 100%;" rows="15"></textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
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
