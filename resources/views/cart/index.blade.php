@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2">
            <p>Nazwa</p>
        </div>
        <div class="col-1">
            <p>Za dzień</p>
        </div>
        <div class="col-3">
            <p>Data rozpoczęcia pobytu</p>
        </div>
        <div class="col-3">
            <p>Data zakończenia pobytu</p>
        </div>
        <div class="col-2">
            <p>Wartość</p>
        </div>
        <div class="col-1">
            <p>Usuń</p>
        </div>
    </div>
    @foreach($cart as $product)
        <div class="row">
            <div class="col-2">
                <p>{!!$product['name']!!}</p>
            </div>
            <div class="col-1">
                <p>{!!$product['price']!!}</p>
            </div>
            <div class="col-3">
                <p>{!!$product['datefrom']!!}</p>
            </div>
            <div class="col-3">
                <p>{!!$product['dateto']!!}</p>
            </div>
            <div class="col-2">
                <p>{!!$product['value']!!}</p>
            </div>
            <div class="col-1">
                <a href="{{ route('cart.remove', [$product['room'], $product['id']]) }}"><button class="btn btn-danger">X</button></a>
            </div>
        </div>
    @endforeach
    <div class="row mt-4">
        <div class="col-6">
            <p><b>Wysokość zaliczki: {!!$value/10!!}</b>&nbsp; <b>Wartość pobytu: {!!$value!!}</b></p>
        </div>
        <div class="justify-content-end d-flex col-6">
            <a href="{{ route('cart.store') }}"><button class="btn btn-primary">Akceptuje</button></a>
        </div>
    </div>
</div>
@endsection
