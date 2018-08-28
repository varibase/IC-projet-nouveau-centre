<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Contracts\Auth\PasswordBroker;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request, PasswordBroker $passwords)
    {
        
        if( $request->ajax() )
        {
            $this->validate($request, ['email' => 'required|email']);

            $response = $passwords->sendResetLink($request->only('email'));

            switch ($response)
            {
                case PasswordBroker::RESET_LINK_SENT:
                   return response()->json([
                    'success'  => true,
                    'msg'      =>  __('pages.passwordreset.success'),
                    'refresh'  => true
                ]);

                case PasswordBroker::INVALID_USER:
                    return response()->json([
                        'success'  => false,
                        'msg'      =>  __('pages.passwordreset.invaliduser')
                    ]);
            }
        }
        return false;
    }

}
