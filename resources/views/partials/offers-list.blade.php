<div class="container-fluid">
    <div class="row">
        @foreach($offers as $offer)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center cardcontainer{{$offer->offer_id}}" data-aos="flip-left" data-aos-duration="1500" data-aos-delay="{{$loop->index*100}}" data-aos-easing="ease-out-cubic">
            <img src="/img/offers/{{ $offer->partner->img }}" class="card-img-over" width="160" >
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        @if($detail = $offer->info()->where('lang', \App::getLocale())->first())
                        <h5 class="card-title">{{ $detail->title }}</h5>
                        <p class="card-text" >
                            @if(strlen($detail->description) < 120)
                                {{ $detail->description }}
                            @else
                                {{ substr($detail->description, 0, 120) }}...
                            @endif
                        </p>
                        @endif
                    </div>
                    <a id="offer-{{$offer->offer_id}}" href="/offer/{{$offer->offer_id}}" data-modaltype="offer" class="btn btn-dark btn-block btn-lg toggle-modal">@lang('pages.home.offer-cta')</a>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>