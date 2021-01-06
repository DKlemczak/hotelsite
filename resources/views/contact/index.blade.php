@extends('layouts.app')

@section('content')
<section class="banner">
    <div class="bannerimg">
        <div class="bannertxt">Dane kontaktowe</div>
    </div>
</section>
<section class="content">
    <p>Miasto {!!$contact->city!!}</p>
    <p>Kod pocztowy {!!$contact->postcode!!}</p>
    <p>Poczta {!!$contact->post!!}</p>
    <p>Ulica {!!$contact->street!!}</p>
    <p>Numer domu {!!$contact->building_numer!!}</p>
    <p>Numer do recepcji {!!$contact->reception_number!!}</p>
    <p>Numer obsługi klienta {!!$contact->customer_service_number!!}</p>
    <p>Email {!!$contact->email!!}</p>
</section>
@endsection
