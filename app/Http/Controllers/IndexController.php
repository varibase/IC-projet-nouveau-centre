<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Models\Location;
use Mapper;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function maps()
    {
        //Mapper::map(45.50136894637001, -73.56836867591858, ['eventClick' => 'alert("Observatoire Place Ville Marie");']);
        //Mapper::marker(45.50136894637001, -73.56836867591858, ['eventClick' => 'alert("Observatoire Place Ville Marie");']);
        Mapper::marker(45.500401755372756, -73.56759164536902, ['eventClick' => 'alert("Marche des artisans - Fairmount");']);
        //Mapper::marker(45.50062547156453, -73.56779549325415, ['eventClick' => 'alert("Bar Nacarat - Fairmount");']);
        //Mapper::marker(45.50058223236988, -73.56785181964347, ['eventClick' => 'alert("Cafe Krema - Fairmount");']);
        Mapper::map(45.5026173, -73.5710181, ['eventClick' => 'alert("Musée Grevin - Centre Eaton");']);
        //Mapper::marker(45.5019469, -73.57338859999999, ['eventClick' => 'alert("Materia Prima - Maison Manuvie");']);
        return view('maps');
    }

    public function home(Request $request)
    {
        if(\Auth::check())
        {
            $location = \Auth::user()->location;
        }
        else
        {
            $location = Location::where('shortname', session('location'))->first();
        }
        $offers = $location->group->offers()->get();
        $i = 0;
        foreach($offers as $offer)
        {
            if($i == 0)
            {
                Mapper::map($offer->partner->address->latitude, $offer->partner->address->longitude, ['eventClick' => "ShowOffer($offer->offer_id)"]);
                $i++;
            }
            else
            {
                Mapper::marker($offer->partner->address->latitude, $offer->partner->address->longitude, ['eventClick' => "ShowOffer($offer->offer_id)"]);
            }

        }

        if($request->isMethod('post'))
        {
            if($request->has(['password', 'email']))
            {
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
                {
                    return response()->json([
                        'success'  => true,
                        'msg'      =>  __('pages.login2.success'),
                        'refresh'  => true
                    ]);
                }
                else
                {
                    return response()->json([
                        'success'  => false,
                        'msg'      =>  __('pages.login2.passerror')
                    ]);
                }
            }
            elseif($request->has('email'))
            {
                $user = User::where('email', $request->email)->first();

                if(!$user)
                {
                    return response()->json([
                        'success'  => false,
                        'msg'      =>  __('pages.login2.emailerror')
                    ]);

                } else {

                    if ($user->confirmed) {

                        return response()->json([
                            'success'  => true,
                            'view'     =>  view('member.login2', ['email' => $request->email])->render(),
                            "action"   => __('pages.login2.button')
                        ]);

                    } else {

                        Mail::send('email.confirm', ['confirmation_code' => $user->confirmation_code, 'prenom' => $user->first_name],
                            function($message) use ($user) {
                                $message->to($user->email, $user->first_name." ".$user->last_name)
                                    ->subject(__('emails.email-confirm.subject'));
                            });

                        return response()->json([
                            'success'  => false,
                            'msg'      =>  __('pages.login2.confirmerror')
                        ]);
                    }
                }
            }
        }
        return view('home');
    }

    public function cards()
    {
        for($i=0; $i<5001;$i++)
        {

            $cardnum = random_bytes(8);
            $cardnum = bin2hex($cardnum);
            $cardnum = substr($cardnum, 0, 6);
            $cardnum = "46".$cardnum;
            $card = new Card();
            $card->type_id = 1;
            $card->card_number = $cardnum;
            $card->save();

        }

        return $cardnum;
    }

    
}
