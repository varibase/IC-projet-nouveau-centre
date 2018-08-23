<div class="container-fluid">
    <div class="row">
        @for($i=0; $i<10;$i++)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center cardcontainer{{$i}}" data-aos="flip-left" data-aos-duration="1500" data-aos-delay="{{$i*100}}" data-aos-easing="ease-out-cubic">
            <img src="/img/logo-a.png" class="card-img-over" width="160" >
            <div class="card">
                <div class="card-body">
                    <div class="card-text" >
                        <h5 class="card-title">10% de rabais au Marché Artisans</h5>
                        <p class="card-text">Un marché urbain unique au centre-ville de Montréal, qui rassemble des producteurs et artisans locaux, favorisant un...</p>
                    </div>
                    <a id="offer-{{$i}}" href="/offer/{{$i}}" data-toggle="modal" data-target="#actionModal" data-footer="0" data-class="offerModal" class="btn btn-dark btn-block btn-lg">EN SAVOIR PLUS</a>
                </div>
            </div>

        </div>
        @endfor
    </div>
</div>