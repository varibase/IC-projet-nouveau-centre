<div class="container">
    @if($detail = $offer->info()->where('lang', \App::getLocale())->first())
    <div class="row">
        <div class="col-md-3 order-1 col-sm-12 offset-md-2 order-md-2">
            <img src="/img/offers/{{ $offer->partner->img }}" width="160" >
        </div>

        <div class="col col-md-7 order-2 col-sm-12 order-md-1">
            <h5 class="card-title">{{ $detail->title }}</h5>
            <p>{{ $detail->description }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12 col-sm-12">
                <p><strong>@lang('pages.offers.how-to')</strong><br>
                    {{ $detail->howto }}</p>
                @isset($offer->end_date)
                <p>@lang('pages.offers.date-fin') {{ $offer->end_date }}<br>
                @endisset
                @lang('pages.offers.addresse') {{ $offer->partner->address->address_1 }}<br>
                    @isset($offer->parner->address->address_2)
                        {{ $offer->partner->address->address_2 }}<br>
                    @endisset
                    {{ $offer->partner->address->city }}, {{ $offer->partner->address->province }}  {{ $offer->partner->address->postal_code }}
                    @isset($offer->partner->address->detail)
                        <br>{{ $offer->partner->address->detail }}
                    @endisset
                <a href="https://www.google.com/maps/dir/?api=1&destination={{ $offer->partner->address->address_1 }},{{ $offer->partner->address->address_2 }},{{ $offer->partner->address->city }},+{{ $offer->partner->address->province }}+{{ $offer->partner->address->postal_code }}" target="_blank">@lang('pages.offers.itineraire')</a>
                </p>
                <p class="mentions">{{ $detail->legal_terms }}</p>
            </div>
        </div>
    </div>
    @endif
    <div id="map-offer" style="width:100%; height: 425px;">
    {!! Mapper::render() !!}
    </div>
  
</div>