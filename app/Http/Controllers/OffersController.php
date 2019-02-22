<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\OfferInfo;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\Offer;
use Mapper;
use View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OfferRequest;

class OffersController extends Controller
{

    public function index()
    {
        if(Auth::guard('admin')->check())
        {
            $offers = Offer::where('group_id', Auth::guard('admin')->user()->location->group->group_id)->with(['info'])->get();
            $offers->load('partner', 'info');
            return view('admin.offers')->with(compact('offers'));
        }
        else
        {
            return redirect('/admin/login');
        }
    }

    public function edit(Offer $offer = null)
    {
        if(!$offer)
        {
            $offer = new Offer();
            $info_en = new OfferInfo();
            $info_fr = new OfferInfo();
        }
        else
        {
            $info_en = $offer->getLangInfo('en');
            $info_fr = $offer->getLangInfo('fr');
        }

        $partners = Partner::getFromGroupId(Auth::guard('admin')->user()->location->group->group_id);

        return view('admin.offer')->with(compact('offer', 'partners', 'info_en', 'info_fr'));
    }

    public function store(OfferRequest $request,Offer $offer = null)
    {
        if(!$offer)
        {
            $offer = Offer::create(['group_id' => Auth::guard('admin')->user()->location->group->group_id]);
        }
        $offer->fill($request->only(['partner_id', 'start_date', 'end_date']));

        $offerInfoFR = $offer->getLangInfo('fr');
        $offerInfoEN = $offer->getLangInfo('en');
        $offerInfoFR->fill($request->only('info_fr')['info_fr']);
        $offerInfoEN->fill($request->only('info_en')['info_en']);
        $offer->save();
        $offerInfoFR->save();
        $offerInfoEN->save();
        return redirect('/admin/offers');
    }

    public function show(Offer $offer)
    {

        View::share('javascript', true);
        Mapper::map($offer->partner->address->latitude, $offer->partner->address->longitude);
        return view('offer')->with(compact('offer'));
    }

}
