<?php

namespace App\Exchange;

class Bot
{
    protected $exchange;

    public function __construct($exchange)
    {
        $this->exchange = $exchange;
    }

    public function getExchange()
    {
        return $this->exchange;
    }

    public function exchange()
    {
        return file_get_contents($this->exchange);
    }

    public function getAll()
    {
        $exchange = $this->exchange();
        preg_match_all('@<table class="scrollable wfull table-data search-table ">(.*?)</table>@si', $exchange, $matches);
        $table = $matches[1][0];
        preg_match_all('@<td>(.*?)</td>@si', $table, $matches);
        $data = $matches[1];
        preg_match_all('@<td class="text-center">(.*?)</td>@si', $table, $matches);
        $data2 = $matches[1];
        $array_map = array_map(function ($data1, $data2) {
            return [
                'name' => $data1,
                'value' => [
                    'buy' => $data2[0],
                    'sell' => $data2[1],
                ]
            ];
        }, $data, $data2);
        return $array_map;
    }
}
