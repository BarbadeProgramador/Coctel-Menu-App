<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CoctelService
{
    private $urlApi = 'https://www.thecocktaildb.com/api/json/v1/1/';

    public function getAll()
    {
        $uri = Http::get($this->urlApi . 'search.php?f=a');
        $response = $uri->json();

        return array_map(function ($drink) {
            return array_filter($drink, fn($value) => !is_null($value));
        }, $response['drinks']);

        return $drinks;
    }
}
