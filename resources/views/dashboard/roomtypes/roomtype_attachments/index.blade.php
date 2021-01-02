@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row bg-white mb-4">
            <div class="col-12 shadow">
                <h1 class="text-center">Panel zdjęć do typów pokojów</h1>
                <button><a href="{{ route('dashboard.roomtypes.roomtype_attachments.create', $roomtype_id) }}">Dodaj</a></button>
            </div>
        </div>
        @foreach ($roomtypeattachments as $roomtypeattachment)
            <div class="row mb-2">
                <div class="col-10">
                    <img class="img-fluid" src={!! $roomtypeattachment->data_uri !!}>
                </div>
                <div class="col-2">
                    <form action="{{ route('dashboard.roomtypes.roomtype_attachments.destroy', [$roomtypeattachment->id, $roomtype_id]) }}" method="post" accept-charset="utf-8">
                        @csrf
                        @method("DELETE")
                        <button class="btn">Usuń</a></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
