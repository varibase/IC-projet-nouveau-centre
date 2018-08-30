<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use View;

class MyCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        $user = Auth::user();
        return view('mycard', compact('user'));
    }


    public function bobby() {


        $user = Auth::user();
        Mail::send('email.testemail', [], 
            function($message) use ($user) {
                $message->to($user->email, $user->first_name." ".$user->last_name)
                    ->subject('Test layout');
        });

        return view('email.testemail');
    }
}
