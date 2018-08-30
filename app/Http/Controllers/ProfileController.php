<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use View;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user   = Auth::user();

        $params = (object) [    "registration" => false,
                                "route" => route('profile.update'),
                                "fieldAttribute" => "disabled",
                                "language" => $user->lang ];

        return view('registration.create', compact('user', 'params'));
    }

    public function update(ProfileRequest $request)
    {
        $request->updateUser();

        return response()->json([
            'success'   => true,
            'msg'       => __('pages.profile.success')
        ]);
    }

}
