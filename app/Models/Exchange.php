<?php

namespace App\Models;

use App\Exchange\Bot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'buy', 'sell', 'differance', 'time'];

    public function callExchange()
    {
        $bots = new Bot('https://finans.mynet.com/doviz/');

        return $bots->getShowAll();
    }
}
