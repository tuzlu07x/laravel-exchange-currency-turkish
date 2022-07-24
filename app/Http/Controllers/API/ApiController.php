<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function bot()
    {
        $exchanges = Exchange::all();

        return json_decode($exchanges);
    }
}
