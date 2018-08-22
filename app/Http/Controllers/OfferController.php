<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Mapper;
use View;

class OfferController extends Controller
{

    public function show()
    {
        View::share('javascript', true);
        Mapper::map(45.5026173, -73.5710181);
        return view('offer');
    }

}
