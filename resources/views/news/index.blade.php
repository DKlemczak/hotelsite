@extends('layouts.app')

@section('content')
<section class="banner">
    <div class="bannerimg">
        <div class="bannertxt">Aktualności</div>
    </div>
</section>
<section class="content">
    @foreach($news as $new)
    <div class="shadow-lg m-auto">
        <div class="m-2">
            <h1>{!!$new->title!!}</h1>
            <p>{!!$new->user->name!!} - {!!$new->created_at!!}</p>
            <hr>
            <p>{!!$new->content!!}</p>
            <button type="button" class="btn btn-default"><a href="{{ route('news.details', [$new->id]) }}">Szczegóły pokoju</a></button>
        </div>
    </div>
    @endforeach
</section>
@endsection
