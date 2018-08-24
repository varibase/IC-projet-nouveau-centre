<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Validator;

class UsersController extends Controller
{
    public function confirm($confirmationCode, Request $request)
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

        if($request->ajax()){
            return view('confirm', compact('user'));
        } else {
            return redirect()->home()->with(['popin' => 'confirm', 'popinurl' => url()->full(), 'popinaction' => __('pages.confirm.button')] );
        }
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

    public function loginstep1()
    {
        return view('member.login1');
    }

    public function loginstep2(Request $request)
    {
        $user = User::where('email', $request->email)->where('confirmed', 1)->first();

        if(!$user)
        {
            return response()->json([
                'success'  => false,
                'msg'      =>  __('pages.login2.emailerror')
            ]);

        } else {
            return response()->json([
                'success'  => true,
                'view'     =>  view('member.login2', ['email' => $request->email])->render(),
                "action"   => __('pages.login2.button')
            ]);
        }
    }

    public function login(Request $request) {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            //dd("User Authenticated");
            // reload menu etc.
            return redirect()->home();
        }
        else
        {
            return response()->json([
                'success'  => false,
                'msg'      =>  __('pages.login2.passerror')
            ]);
        }
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

        return response()->json([
            'success'   => true,
            'msg'       => __('pages.register.success')
        ]);
    }

    public function update()
    {

    }


}
