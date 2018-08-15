@extends('layout.master')

@section('content')

    @include('partials.banner-fifty')

    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-12 col-md-6 offset-md-3 py-5 text-center" >
                <p>En tant que résidents ou professionnels occupants de la tour Place Ville Marie, vous êtes au cœur de notre initiative de revitalisation du centre-ville de Montréal, c’est pourquoi nous avons crée la carte électronique Projet Nouveau Centre Privilèges qui vous permettra de bénéficier en tout temps de rabais et offres chez nos partenaires.</p>
            </div>
        </div>
        <div class="row py-4 px-2 align-items-center">
            <div class="col-12 justify-content-center" align="center">
                <h3>Vos Privil&egrave;ges</h3>
                <div id="icons-list">
                    <a class="icon" id="icon-list" >
                        <i class="fas fa-list-ul"></i>
                    </a>
                    <a class="icons" id="icon-map" style="display: none">
                        <i class="fas fa-map-marked"></i>
                    </a>
                    <a class="icon" id="icon-filter">
                        <i class="fas fa-filter"></i>
                    </a>

                </div>

            </div>
        </div>
    </div>

    <div class="offers-list">
        <div id="regular-list" style="display: none;">
            @include('partials.offers-list')
        </div>
        <div id="maps-list" >
            @include('partials.google-map')
        </div>
    </div>







@endsection