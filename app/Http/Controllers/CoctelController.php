<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Coctel;
use  App\Models\Ingredientes;


class CoctelController extends Controller
{
        public function index(Request $request){
            $seleccionadas = json_decode($request->input('seleccionadas'), true);
            return view('confirmation', compact('seleccionadas'));
        }

        public function create(Request $request){
            
            
            // Iterar sobre las bebidas seleccionadas y almacenarlas
            foreach ($request->input('bebidas') as $bebidaData) {
                // Crear un nuevo coctel
                $coctel = Coctel::create([
                     'img' => $bebidaData['imagen'],
                    'nombre' => $bebidaData['nombre'],
                    'bebida' => $bebidaData['base'],
                    'tipo' => $bebidaData['categoria'],
                    'precio' => $bebidaData['precio'],
                ]);

                // Dividir la cadena de ingredientes en un array
                $ingredientes = explode(',', $bebidaData['ingredientes']);

                // Buscar o crear los ingredientes
                $ingredienteIds = [];
                foreach ($ingredientes as $ingrediente) {
                    $ingrediente = trim($ingrediente); // Eliminar espacios extra

                    // Verificar si el ingrediente ya existe en la base de datos, de lo contrario, crearlo
                    $ingredienteExistente = Ingredientes::firstOrCreate(['nombre' => $ingrediente]);

                    // Agregar el ID del ingrediente al array
                    $ingredienteIds[] = $ingredienteExistente->id;
                }

                // Asociar los ingredientes al cóctel
                $coctel->ingredientes()->sync($ingredienteIds);
            }


            return redirect()->route('dashboard')->with('success', 'Cócteles registrados correctamente');
        }



        public function destroy($id){
            $coctel = Coctel::find($id);

            if (!$coctel) {
                return response()->json(['error' => 'Cóctel no encontrado'], 404);
            }
        
            $coctel->delete();
        
            return response()->json(['mensaje' => 'Cóctel eliminado con éxito']);
        }


        public function edit($id){
            $coctel = Coctel::findOrFail($id);
            return view('updateCoctel', compact('coctel'));
        }


        public function update(Request $request, $id){

            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
                'precio' => 'required|numeric',
                'bebida' => 'required|string|max:255',
                'tipo' => 'required|string|max:255',
                'ingredientes' => 'required|array',
                'ingredientes.*' => 'required|string|max:255',
            ]);

            $coctel = Coctel::findOrFail($id);
            $coctel->update([
                'nombre' => $validatedData['nombre'],
                'precio' => $validatedData['precio'],
                'bebida' => $validatedData['bebida'],
                'tipo' => $validatedData['tipo'],
            ]);

            // PROCESO DE INGREDIENTES 
            foreach ($validatedData['ingredientes'] as $nombreIngrediente) {
                $ingrediente = Ingredientes::firstOrCreate(['nombre' => $nombreIngrediente]);
                if (!$coctel->ingredientes->contains($ingrediente->id)) {
                    $coctel->ingredientes()->attach($ingrediente->id);
                }
            }


            return redirect()->route('dashboard')->with('success', 'Cóctel actualizado exitosamente.');
        }
    }
