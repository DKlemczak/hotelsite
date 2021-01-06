@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row color mb-0 p-3" >
        <div class="text-white" style="border-bottom: 2px solid #fff; width: 100%">
        <h1>{!! $new->title !!}</h1>
        <p>{!!$new->user->name!!} - {!!$new->created_at!!}</p>
        </div>
    </div>
    <div class="row shadow-lg">
        <div class="col-12 pl-0 pt-3 pr-0 pb-3 text_justify" >
            <div class="p-2" style="height: 100%">
                {!! $new->content !!}
            </div>
        </div>
    </div>
    <div>
        <div class="h3 mt-5 mb-4" style="border-bottom: 1px solid #753c52; width: 100%">Komentarze</div>
        @auth
        <form enctype="multipart/form-data" action="{{ route('news.details.addcomment', $new->id) }}" method="post" accept-charset="utf-8">
        @csrf
        <div class="container">
            <div class="row no-gutters mb-4">
                <label for="comment" class="col-form-label">Dodaj komentarz: </label>
                <textarea class="form-control" name="comment" style="max-width: 100%; resize:none" rows="15"></textarea>
                @if ($errors->has('comment'))
                    <span class="help-block">
                        <strong>{{ $errors->first('comment') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-12 row mx-0">
                <div class="d-flex justify-content-center mr-1">
                    <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
                </div>
            </div>
        </div>
        </form>
        @endauth
        @foreach($new->comments as $comment)
        <div class=" mt-5 mb-2 ml-2">
            <strong>{!! $comment->user->name !!}</strong>
			@auth
				@if(Auth::user()->is_admin)
				<button class="btn"><a href="{{ route('news .details.deletecomment', $comment->id) }}">Usuń komentarz</a></button>
				@endif
			@endauth
        </div>
        <div class="shadow m-1 p-2">
            {!! $comment->comment !!}
        </div>
         @endforeach
    </div>
</section>
@endsection


