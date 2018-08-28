<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\User\User;

class RegistrationController extends Controller
{
    public function create(Request $request)
    {
        if($request->ajax()){
            return view('registration.create')->with('registration', true);

        } else {
            return redirect()->home()->with(['popin' => 'register', 'popinurl' => url()->full(), 'popinaction' => __('pages.register.button')] );
        }
    }

    public function store(RegistrationRequest $request)
    {
        $validated = $request->validated();
        $user = $request->registerUser();
        //dd($user);
        
    }

    public function confirm()
    {

    }
}
