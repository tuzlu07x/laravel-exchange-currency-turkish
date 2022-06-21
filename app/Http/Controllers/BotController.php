<?php

namespace App\Http\Controllers;

use App\Exchange\Bot;
use App\Models\Exchange;

class BotController extends Controller
{
    public function index()
    {
        $exchanges = Exchange::all();
        return $exchanges;
    }
}
