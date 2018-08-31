<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Models\Offer;
use Mapper;
use View;

class OfferController extends Controller
{

    public function show(Offer $offer)
    {

        View::share('javascript', true);
        Mapper::map($offer->partner->address->latitude, $offer->partner->address->longitude);
        return view('offer')->with(compact('offer'));
    }

}
