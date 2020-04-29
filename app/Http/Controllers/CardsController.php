<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function create(Request $request)
    {
        $someArray = '';
        return view('cards.create', compact('someArray'));
    }

}
