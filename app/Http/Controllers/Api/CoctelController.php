<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coctel;
use App\Models\Ingredientes;
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

        $ingredientes = [];

        // Obtener los datos JSON de la respuesta
        $response = $uri->json();


        $drinks = array_map(function($drink) {
            return array_filter($drink, function($value) {
                return !is_null($value);
            });
        }, $response['drinks']);

        // $ingrediente = Ingredientes::create([
        //     'nombre' => 'Limón',
        // ]);

        // $coctel = Coctel::create([
        //     'nombre' => 'Margarita',
        //     'bebida' => 'Cóctel clásico con tequila',
        //     'tipo' => 'Alcoholico',
        //     'precio' => '63000',
        // ]);
        
        
        // $coctel->ingredientes()->attach($ingrediente->id);

    
        // $cocteles = Coctel::find(1);
        // $tablas = Ingredientes::find(1);

        // dd($cocteles);


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
