<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PushController extends Controller
{
    function saveSubscriptionId($subscription_id)
    {
        if(\Auth::check())
        {
            $user = \Auth::user();
            $user->subscription_id = $subscription_id;
            $user->save();
            Log::debug('Optin Push Success');
            return true;
        }
        else
        {
            Log::debug('Optin Push Failure');
            return false;
        }
    }

    function removeSubscriptionId($subscription_id)
    {
        $user = User::where('subscription_id', $subscription_id)->first();
        if($user)
        {
            $user->subscription_id = null;
            $user->save();
            return true;
        }

    }
}
