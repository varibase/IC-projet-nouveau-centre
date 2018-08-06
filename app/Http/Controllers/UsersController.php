<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function confirm($confirmationCode)
    {
        if(!$confirmationCode)
        {
            return redirect()->home();
        }

        $user = User::where('confirmation_code', $confirmationCode)->first();

        if(!$user)
        {
            return redirect()->home();
        }



        return view('confirm', compact('user'));
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|between:4,12',
            'user_id' => 'required|exists:users'
        ]);

        //Set the user password
        $user = User::find($request->user_id);

        $user->confirmAndSetPassword($request->password);

        $user->newCard('digital');

        if(Auth::attempt(['email' => $user->email, 'password' => $request->password]))
        {
            dd("User Authenticated");
        }
        else
        {
            dd("Authentication Failed");
        }

        //Login the user
    }

    public function login()
    {

    }

    public function logout()
    {

    }

    public function register(RegistrationRequest $request, Location $location)
    {
        $user = $request->registerUser($location);

        Mail::send('email.confirm',['confirmation_code' => $user->confirmation_code], function($message) {
            $message->to(request()->email, request()->first_name." ".request()->last_name)
                ->subject('Verify your email address');
        });

        //Flash a message to the session "Check your emails..."

        return redirect()->home();

    }

    public function update()
    {

    }


}
