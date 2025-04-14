<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\CoctelController;
use App\Services\CoctelService;

class CoctelOperationsController extends Controller
{

    protected $coctelService;

    public function __construct(CoctelService $coctelService)
    {
        $this->coctelService = $coctelService;
    }

    // Function route index view cards coctels From DB 
    public function index(){
        return view('dashboard');
    }
 // public fuction update(){

    // }


    // public fuction delete(){

    // }
    public function renderData(Request $request)
    {
        $section = $request->input('section');
    
        switch ($section) {
            case 'seccion1':
                $html = '<p>Sección 1 personal</p>';
                break;
    
            case 'seccion2':
                $cocteles = $this->coctelService->getAll();
                $html = '';
                foreach ($cocteles as $coctel) {
                    $ingredientes = []; // Reiniciar ingredientes por cada cóctel
    
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
    
    

    public function cleanData(){

    }

    
}
