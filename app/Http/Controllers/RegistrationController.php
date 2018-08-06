<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\User\User;

class RegistrationController extends Controller
{
    public function create(Request $request)
    {
        return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {

        $user = $request->registerUser();
        dd($user);
    }

    public function confirm()
    {

    }
}
