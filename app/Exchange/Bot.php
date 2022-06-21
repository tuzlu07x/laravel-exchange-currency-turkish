<?php

namespace App\Exchange;

use Illuminate\Support\Arr;

class Bot
{
    protected $exchange;
    protected array $datas = [];
    protected array $names = [];
    protected $tables;

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

    public function getBot()
    {
        $exchange = $this->exchange();
        preg_match_all('@<strong class=\"mr-4\">\n<a href=\"(.*?)" title=\"(.*?)">(.*?)</a>\n</strong>@si', $exchange, $matches);
        $this->names = $matches[2];
        preg_match_all('@<table class="scrollable wfull table-data search-table ">(.*?)</table>@si', $exchange, $matches);
        $this->tables = $matches[1][0];
        preg_match_all('@<td class="text-center">(.*?)</td>@si', $this->tables, $matches);
        $this->datas = $matches[1];
    }

    public function getAll()
    {
        $this->getBot();

        $filterDatas = array_filter($this->datas, function ($value) {
            return strpos($value, '<') === false;
        });
        $mapDatas = array_map('trim', $filterDatas);
        $mapNames = array_map('trim', $this->names);

        $chunkDatas = array_chunk($mapDatas, 4);

        $array = array_map(function ($chunkDatas, $mapNames) {
            return [
                'name' => $mapNames,
                'data' => $chunkDatas,
            ];
        }, $chunkDatas, $mapNames);

        return $array;
    }

    public function getShowAll()
    {
        return $this->getAll();
    }
}
