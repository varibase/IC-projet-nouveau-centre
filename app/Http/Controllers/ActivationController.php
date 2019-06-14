<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ActivationController extends Controller
{

    public function __construct()
    {
        App::setLocale('fr');
    }

    public function form()
    {
        App::setLocale('fr');
        return view('activation.form');
    }

    public function store(RegistrationRequest $request)
    {
        $location = Location::find(1);
        $user = $request->registerUser($location);

        Mail::send('email.confirm', ['confirmation_code' => $user->confirmation_code, 'prenom' => $user->first_name],
            function($message) use ($user) {
                $message->to($user->email, $user->first_name." ".$user->last_name)
                    ->subject(__('emails.email-confirm.subject'));
            });

        return response()->json([
            'success'   => true,
            'msg'       => __('pages.register.success'),
            'refresh'  => true
        ]);

    }
}
