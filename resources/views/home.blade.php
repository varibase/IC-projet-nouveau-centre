@extends('layout.master')

@section('content')

    @include('partials.banner2')

    <div class="container-fluid">
        <div class="row bg-white justify-content-md-center">
            <div class="col col-md-9 col-lg-5 py-5 px-4 text-center txt-punch" data-aos="zoom-out-up" data-aos-delay="100" data-aos-duration="800">
                <h5>@lang('pages.home.sous-titre')</h5>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="bloc-privileges col-12 justify-content-center" align="center">
                <h3 class="d-inline">@lang('pages.home.privileges')</h3>
                <div id="icons-list" class="d-inline float-right mr-3">
                    <a class="icon" id="icon-list" style="display: none">
                        <i class="ilist"></i>
                    </a>
                    <a class="icons" id="icon-map">
                        <i class="imap"></i>
                    </a>
                    {{--
                    <a class="icon" id="icon-filter">
                        <i class="ifilter"></i>
                    </a>
                    --}}
                </div>

            </div>
        </div>
    </div>

    <div class="offers-list">
        <div id="regular-list" class="mb-5">
            @include('partials.offers-list')
        </div>
        <div id="maps-list" style="display: none;" >
            @include('partials.google-map')
        </div>
    </div>

    @include('partials.modals')

    @if (session('popin'))
        <input id="showpopin" type="hidden" value="{{ session('popin') }}" >
        <input id="popinurl" type="hidden" value="{{ session('popinurl') }}" >
        <input id="popinaction" type="hidden" value="{{ session('popinaction') }}" >
    @endif

@endsection