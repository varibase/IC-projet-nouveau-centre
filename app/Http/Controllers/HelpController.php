<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use View;

class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        $user = Auth::user();
        return view('help', compact('user'));
    }

    public function device($device, Request $request)
    {
        return view('help-devices', ['device' => $device]);
    }

    
    public function cardhelp(Request $request)
    {
        return view('help-card');
    }

}
