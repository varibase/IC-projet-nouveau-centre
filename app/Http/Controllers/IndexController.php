<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Mapper;

class IndexController extends Controller
{
    public function maps()
    {
        //Mapper::map(45.50136894637001, -73.56836867591858, ['eventClick' => 'alert("Observatoire Place Ville Marie");']);
        //Mapper::marker(45.50136894637001, -73.56836867591858, ['eventClick' => 'alert("Observatoire Place Ville Marie");']);
        //Mapper::marker(45.500401755372756, -73.56759164536902, ['eventClick' => 'alert("Marche des artisans - Fairmount");']);
        //Mapper::marker(45.50062547156453, -73.56779549325415, ['eventClick' => 'alert("Bar Nacarat - Fairmount");']);
        //Mapper::marker(45.50058223236988, -73.56785181964347, ['eventClick' => 'alert("Cafe Krema - Fairmount");']);
        Mapper::map(45.5026173, -73.5710181, ['eventClick' => 'alert("Musée Grevin - Centre Eaton");']);
        //Mapper::marker(45.5019469, -73.57338859999999, ['eventClick' => 'alert("Materia Prima - Maison Manuvie");']);
        return view('maps');
    }

    public function home()
    {
        Mapper::map(45.5026173, -73.5710181, ['eventClick' => 'alert("Musée Grevin - Centre Eaton");']);
        return view('home');
    }

    public function cards()
    {
        for($i=0; $i<92;$i++)
        {

            $cardnum = random_bytes(8);
            $cardnum = bin2hex($cardnum);
            $cardnum = substr($cardnum, 0, 6);
            $cardnum = "46".$cardnum;
            $card = new Card();
            $card->type_id = 2;
            $card->card_number = $cardnum;
            $card->save();

        }

        return $cardnum;
    }

}
