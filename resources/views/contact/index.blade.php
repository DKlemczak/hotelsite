@extends('layouts.app')

@section('content')
<section class="banner">
    <div class="bannerimg">
        <div class="bannertxt">Dane kontaktowe</div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-3">
            @if(isset($contact))
                <p>Miasto {!!$contact->city!!}</p>
                <p>Kod pocztowy {!!$contact->postcode!!}</p>
                <p>Poczta {!!$contact->post!!}</p>
                <p>Ulica {!!$contact->street!!}</p>
                <p>Numer domu {!!$contact->building_numer!!}</p>
                <p>Numer do recepcji {!!$contact->reception_number!!}</p>
                <p>Numer obsługi klienta {!!$contact->customer_service_number!!}</p>
                <p>Email {!!$contact->email!!}</p>
            @endif
        </div>
        <div class="col-9">
            <div class="row text-center justify-content-center">
                <form enctype="multipart/form-data" method="post" action="{{ route('contact.save') }}" accept-charset="utf-8">
                    @csrf
                    <div class="form-group">
                        <label>Nazwa</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tytuł</label>
                        <input type="text" class="form-control" name="subject" id="subject" required>
                        @if ($errors->has('subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Wiadomość</label>
                        <textarea class="form-control" name="message" id="message" rows="4" cols="50" required></textarea>
                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                    <input type="submit" name="send" value="Wyślij" class="btn btn-dark btn-block">
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
