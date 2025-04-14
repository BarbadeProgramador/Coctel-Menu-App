<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoctelController extends Controller
{
    public function index(Request $request){
        $seleccionadas = json_decode($request->input('seleccionadas'), true);
        return view('confirmation', compact('seleccionadas'));
    }
}
