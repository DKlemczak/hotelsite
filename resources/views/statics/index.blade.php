@extends('layouts.app')

@section('content')
<body>

<div class="container">
<header class="py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 text-center">
            <div class="text-dark mx-auto h1 font-weight-bold">Hotelsite</a>
        </div>
    </div>
</header>
<div class="jumbotron p-3 p-md-5 text-white rounded color">
    <div class="col-md-6 px-0">
        <h1 class="display-4">Big text - jakiś nagłówek</h1>
        <p class="lead my-3">Smol text - jakiś paragra czy coś</p>
    </div>
</div>

<div class="row mb-2">
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 shadow">
        <img class="flex-auto img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.myhappyenglish.com%2Fx9walos9f%2Fuploads%2F2013%2F05%2Fplaceholder1.png&f=1&nofb=1">
        </div>
    </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow">
            <img class="flex-auto img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.myhappyenglish.com%2Fx9walos9f%2Fuploads%2F2013%2F05%2Fplaceholder1.png&f=1&nofb=1">
            </div>
        </div>
    </div>
</div>

<section class="container">
    <div class="row">
        <div class="col-md-8">
        <h3 class="pb-3 mb-4 border-bottom">
            Kolejny nagłówek
        </h3>

        <div class="border-bottom">
            <h2>Jakieś info lub inne</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Różne info itp.:</p>
                <ul>
                    <li>jeden</li>
                    <li>dwa</li>
                    <li>trzy</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div>
            <h3 class="pb-3 mb-4 border-bottom">
                Te aktywności czy coś mogą tu iść
            </h3>
        </div>

    </div>


    <aside class="col-md-4 blog-sidebar">
        <div class="p-3 mb-3 bg-light rounded">
            <h4> Miejsce na jakiś text </h4>
            <p class="mb-0">text in question - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        
        <div class="p-3">
            <h4> Miejsce na np. reklame </h4>
            <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.myhappyenglish.com%2Fx9walos9f%2Fuploads%2F2013%2F05%2Fplaceholder1.png&f=1&nofb=1">
        </div>
    </aside>
</div>
</section>
</body>
@endsection
