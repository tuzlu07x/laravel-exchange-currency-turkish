<?php

namespace App\Http\Controllers;

use App\Exchange\Bot;

class BotController extends Controller
{
    public function index()
    {
        $exchange = new Bot('https://finans.mynet.com/doviz/');
        return $exchange->getShowAll();
        return view('index');
    }
}
