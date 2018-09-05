<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Location;
use Mapper;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        if(Auth::guard('admin')->check())
        {
            $users = User::where('location_id', Auth::guard('admin')->user()->location_id)->with(['company', 'card'])->get();
            return view('admin.index')->with('users',$users);
        }
        else
        {
            return redirect('/admin/login');
        }

    }

    public function login()
    {
        return view('admin.login');
    }

    public function signin(Request $request)
    {
        if(Auth::guard('admin')->attempt($request->only('email', 'password')))
        {
            return redirect('/admin/');
        }
        else
        {
            return redirect('/admin/login');
        }
    }

    public function update(Request $request)
    {

        $user = User::find($request->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->lang = $request->lang;
        if($user->company->name != $request->company)
        {
            $company = Company::firstOrCreate(['name' => $request->company, 'location_id' => 1]);
            $user->company_id = $company->company_id;
        }

        if($user->card()->count())
        {
            if($user->card->card_number != $request->card_number)
            {
                $user->newCard('physical', $request->card_number);
            }
        }
        else
        {
            $user->newCard('physical', $request->card_number);
        }


        $user->save();
        $request->session()->flash('updated', $user->user_id);

        return redirect('/admin/');

    }

    public function create(Request $request)
    {
        $confirmation_code = str_random(30);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->lang = $request->lang;
        $company = Company::firstOrCreate(['name' => $request->company, 'location_id' => 1]);
        $user->company_id = $company->company_id;
        $user->confirmation_code = $confirmation_code;
        $user->location_id = 1;
        $user->save();
        $user->newCard('physical', $request->card_number);

        $request->session()->flash('updated', $user->user_id);

        return redirect('/admin/');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}
