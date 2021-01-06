@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row bg-white mb-4">
            <div class="col-12 shadow">
                <h1 class="text-center">Aktualności</h1>
                <button><a href="{{ route('dashboard.news.create') }}">Dodaj</a></button>
            </div>
        </div>
        @foreach ($news as $new)
            <div class="row mb-2">
                <div class="col-1">
                    <span class="text-center">{!! $new->title !!}</span>
                </div>
                <div class="col-4">
                    <span class="text-center">{!! $new->content !!}</span>
                </div>
                <div class="col-1">
                    <span class="text-center">{!! $new->created_at !!}</span>
                </div>
                <div class="col-2">
                    <span class="text-center">{!! $new->user->name !!}</span>
                </div>
                <div class="col-2">
                    <button class="btn"><a href="{{ route('dashboard.news.edit', $new->id) }}">Edytuj</a></button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
