<?php

namespace App\Console\Commands;

use App\Exchange\Bot;
use App\Models\Exchange;
use Illuminate\Console\Command;

class ExchangeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bot = new Bot('https://finans.mynet.com/doviz/');

        foreach ($bot->getAll() as $bot) {

            $exchange = Exchange::updateOrCreate([
                'name' => $bot['name'],
            ], [
                'buy' => $bot['data'][0],
                'sell' => $bot['data'][1],
                'differance' => $bot['data'][2],
                'time' => $bot['data'][3],
            ]);
        }
        return 0;
    }
}
