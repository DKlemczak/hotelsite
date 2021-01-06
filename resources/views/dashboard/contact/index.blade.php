@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row bg-white mb-4">
            <div class="col-12 shadow">
                <h1 class="text-center">Panel kontaktu</h1>
            </div>
        </div>
        <form enctype="multipart/form-data" action="{{ route('dashboard.contact.update', $contact->id) }}" method="post" accept-charset="utf-8">
            @csrf
            @method('PATCH')
            <div class="container">
                <div class="row no-gutters mb-4">
                    <label for="city" class="col-form-label">Miasto: </label>
                    <div>
                        <input id="city" type="text" class="form-control" name="city" value="{{$contact->city}}" required>
                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters mb-4">
                    <label for="postcode" class="col-form-label">Kod pocztowy: </label>
                    <div>
                        <input id="postcode" type="text" class="form-control" name="postcode" value="{{!! $contact->postcode !!}}" required>
                        @if ($errors->has('postcode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('postcode') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters">
                    <label for="post" class="col-form-label">Poczta: </label>
                    <div>
                        <input id="post" type="text" class="form-control" name="post" value="{{!! $contact->post !!}}" required>
                        @if ($errors->has('post'))
                            <span class="help-block">
                                <strong>{{ $errors->first('post') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters">
                    <label for="street" class="col-form-label">Ulica: </label>
                    <div>
                        <input id="street" type="text" class="form-control" name="street" value="{{$contact->street}}" required>
                        @if ($errors->has('street'))
                            <span class="help-block">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters">
                    <label for="building_number" class="col-form-label">Numer budynku: </label>
                    <div>
                        <input id="building_number" type="number" class="form-control" name="building_number" value="{{$contact->building_number}}" required>
                        @if ($errors->has('building_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('building_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters">
                    <label for="reception_number" class="col-form-label">Numer telefonu na recepcje: </label>
                    <div>
                        <input id="reception_number" type="text" class="form-control" name="reception_number" value="{{$contact->reception_number}}" required>
                        @if ($errors->has('reception_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('reception_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters">
                    <label for="customer_service_number" class="col-form-label">Numer telefonu do obsługi klienta: </label>
                    <div>
                        <input id="customer_service_number" type="text" class="form-control" name="customer_service_number" value="{{$contact->customer_service_number}}" required>
                        @if ($errors->has('customer_service_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('customer_service_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters">
                    <label for="email" class="col-form-label">Email: </label>
                    <div>
                        <input id="email" type="text" class="form-control" name="email" value="{{$contact->email}}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
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
    </div>
@endsection
