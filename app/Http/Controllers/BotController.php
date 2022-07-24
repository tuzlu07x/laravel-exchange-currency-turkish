<?php

namespace App\Http\Controllers;

use App\Exchange\Bot;
use App\Models\Exchange;
use Nette\Utils\Json;

class BotController extends Controller
{
    public function index()
    {
        $exchanges = Exchange::all();

        return view('index', $exchanges);
    }
}
