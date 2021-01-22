@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="text-center text-white rounded color">
            <h1 class="display-4">Panel zdjęć do typów pokojów</h1>
            <a class="btn btn-lg btn-secondary mb-1" href="{{ route('dashboard.roomtypes.roomtype_attachments.create', $roomtype_id) }}">Dodaj</a>
        </div>
        <div class="row mt-2 border-bottom">
            <div class="col-10 text-center h5"> Zdjęcie</div>
        </div>
        @foreach ($roomtypeattachments as $roomtypeattachment)
            <div class="row mt-2 border-bottom">
                <div class="col-10 text-center">
                    <img class="img-fluid" src={!! $roomtypeattachment->data_uri !!}>
                </div>
                <div class="col-2 mt-auto mb-auto">
                    <form action="{{ route('dashboard.roomtypes.roomtype_attachments.destroy', [$roomtypeattachment->id, $roomtype_id]) }}" method="post" accept-charset="utf-8">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-secondary mb-2">Usuń</a></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
