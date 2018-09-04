<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Models\ImportContacts;
use App\Models\Company;
use App\Models\Card;

class RegistrationController extends Controller
{
    public function create(Request $request)
    {
        if($request->ajax()){

            $params = (object) ["registration" => true,
                                "route" => "/register/".session('location'),
                                "fieldAttribute" => "" ,
                                "language" => App::getLocale() ];
         
            return view('registration.create', compact('params'));

        } else {
            return redirect()->home()->with(['popin' => 'register', 'popinurl' => url()->full(), 'popinaction' => __('pages.register.button')] );
        }
    }

    public function store(RegistrationRequest $request)
    {
        $validated = $request->validated();
        $user = $request->registerUser();
        //dd($user);
        
    }

    public function confirm()
    {

    }

    public function import()
    {
        $contacts = ImportContacts::all();
        foreach($contacts as $contact)
        {
            $confirmation_code = str_random(30);
            $user = User::create([
                'first_name' => $contact->first_name,
                'last_name' => $contact->last_name,
                'email' => $contact->mail,
                'lang' => 'fr',
                'location_id' => 1,
                'confirmation_code' => $confirmation_code
            ]);
            $company = Company::firstOrCreate(['name' => $contact->company, 'location_id' => 1]);
            $user->company_id = $company->company_id;
            $user->save();
            $card = Card::where('type_id', 2)->whereNull('user_id')->orderBy('card_id', 'asc')->first();
            $card->user_id = $user->user_id;
            $card->save();
        }
    }

}
