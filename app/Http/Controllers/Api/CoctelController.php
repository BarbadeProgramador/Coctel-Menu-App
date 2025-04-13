<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CoctelController extends Controller
{

    private $urlApi= 'www.thecocktaildb.com/api/json/v1/1/'; 
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        $uri = Http::get($this->urlApi . 'search.php?f=a');

        // Obtener los datos JSON de la respuesta
        $response = $uri->json();  
        return view('dashboard', compact('response'));
    }


    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

}
