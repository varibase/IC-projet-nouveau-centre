<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use View;

class MyCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        return view('mycard');
    }

}
