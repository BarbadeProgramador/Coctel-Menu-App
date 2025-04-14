<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CoctelService;
use App\Models\Coctel;
use App\Models\Ingredientes;

class RenderController extends Controller
{

    protected $coctelService;

    public function __construct(CoctelService $coctelService)
    {
        $this->coctelService = $coctelService;
    }

    // Function route index view cards coctels From DB 
    public function index(){
        // $cocteles = Coctel::with('ingredientes')->get();
        // dd($cocteles);
        return view('dashboard');
    }


    //RENDER SECTION OPTION 1 O 2 
    public function renderData(Request $request)
    {
        $section = $request->input('section');
    
        switch ($section) {
            case 'seccion1':
                $cocteles = Coctel::with('ingredientes')->get();
                $html = '';
            
                foreach ($cocteles as $coctel) {
                    // Concatenar la tarjeta del cóctel
                    $ingredientesHtml = '';
                    foreach ($coctel->ingredientes as $ingrediente) {
                        $ingredientesHtml .= $ingrediente->nombre . ', ';
                    }
            
                    $html .= view('components.card-content', [
                        'id' => $coctel->id,
                        'nombre' => $coctel->nombre,
                        'imagen' => $coctel->img,
                        'precio' => $coctel->precio,
                        'bebida' => $coctel->bebida,
                        'ingredientes' => $ingredientesHtml,
                        'tipo' => $coctel->tipo,
                    ])->render();
                }
            
                

                break;
    
            case 'seccion2':
                $cocteles = $this->coctelService->getAll();
                $html = '';
                foreach ($cocteles as $coctel) {
                    $ingredientes = []; 
    
                    
                    foreach ($coctel as $key => $ingredient) {
                        if (strpos($key, 'strIngredient') === 0 && $ingredient !== null && $ingredient !== '') {
                            $ingredientes[] = $ingredient;
                        }
                    }
    
                    $ingredientes_str = implode(', ', $ingredientes);
    
                    $html .= view('components.card-coctel', [
                        'nombre' => $coctel['strDrink'],
                        'imagen' => $coctel['strDrinkThumb'],
                        'base' => $coctel['strAlcoholic'],
                        'ingredientes' => $ingredientes_str,
                        'alcohol' => $coctel['strAlcoholic'],
                        'categoria' => $coctel['strCategory'],
                    ])->render();
                }
                break;
    
            default:
                $html = '<p>Sección no encontrada.</p>';
                break;
        }
    
        return response()->json(['html' => $html]);
    }
    
    

    // public function cleanData(){

    // }

    
}
