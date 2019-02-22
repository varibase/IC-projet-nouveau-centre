<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Group;
use App\Models\Location;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mapper;
use App\Http\Requests\PartnerRequest;

class PartnersController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->check())
        {
            $partners = Partner::getFromGroupId(Auth::guard('admin')->user()->location->group->group_id);
            $partners->load('address', 'location');
            return view('admin.partners')->with(compact('partners'));
        }
        else
        {
            return redirect('/admin/login');
        }
    }

    public function edit(Partner $partner = null)
    {
        $locations = Location::where('group_id', Auth::guard('admin')->user()->location->group->group_id)->get();
        if(!$partner)
        {
            $partner = new Partner();
            $address = new Address();
            Mapper::map('45.4972159', '-73.6103642', ['draggable' => true, 'eventDragEnd' => 'getCoordinates(maps)']);
        }
        else
        {
            $address = $partner->address;
            Mapper::map($partner->address->latitude, $partner->address->longitude, ['draggable' => true, 'eventDragEnd' => 'getCoordinates(maps)']);
        }

        return view('admin.partner')->with(compact('partner', 'address', 'locations'));
    }

    public function store(PartnerRequest $request, Partner $partner = null)
    {
        if(!$partner)
        {
            $partner = Partner::create();
        }

        $address = $partner->setAddress($request->only(['address'])['address']);
        $partner->address_id = $address->address_id;
        $partner->fill($request->only(['location_id', 'name_en', 'name_fr']));
        if($request->hasFile('logo')){
            $request->logo->storeAs('offers', $request->logo->getClientOriginalName(), 'img');
            $partner->img = $request->logo->getClientOriginalName();
        }

        $partner->save();

        return redirect('/admin/partners');

    }
}
