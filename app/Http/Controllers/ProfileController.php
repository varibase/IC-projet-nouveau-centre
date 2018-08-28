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
        $user = Auth::user();
        return view('registration.create', compact('user'))->with('registration', false);
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $request->updateUser($user);

        return response()->json([
            'success'   => true,
            'msg'       => __('pages.profile.success')
        ]);
    }

}
