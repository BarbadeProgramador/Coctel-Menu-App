<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coctel;
use App\Models\Ingredientes;
use Exception;
use Illuminate\Support\Facades\Log;

class CoctelController extends Controller
{
    public function index(Request $request)
    {
        // Validar que exista el input 'seleccionadas'
        $inputSeleccionadas = $request->input('seleccionadas');
        $seleccionadas = [];

        if ($inputSeleccionadas) {
            $seleccionadas = json_decode($inputSeleccionadas, true);
            // En caso de error en el decode, se mantiene un array vacío
            if (json_last_error() !== JSON_ERROR_NONE) {
                $seleccionadas = [];
            }
        }
        
        return view('confirmation', compact('seleccionadas'));
    }

    public function create(Request $request)
    {
        // Validar que exista el input "bebidas" y que sea un array
        $bebidasInput = $request->input('bebidas');
        if (!$bebidasInput || !is_array($bebidasInput)) {
            return redirect()->back()->with('error', 'No se enviaron las bebidas a registrar.');
        }

        try {
            // Iterar sobre las bebidas seleccionadas y almacenarlas
            foreach ($bebidasInput as $bebidaData) {

                // Validamos que existan los datos necesarios en ca     da bebida
                if (
                    !isset($bebidaData['imagen']) ||
                    !isset($bebidaData['nombre']) ||
                    !isset($bebidaData['base']) ||
                    !isset($bebidaData['categoria']) ||
                    !isset($bebidaData['precio']) ||
                    !isset($bebidaData['ingredientes'])
                ) {
                    // Puedes optar por omitir esta bebida o lanzar una excepción
                    continue;
                }

                // Crear un nuevo cóctel
                $coctel = Coctel::create([
                    'img'     => $bebidaData['imagen'],
                    'nombre'  => $bebidaData['nombre'],
                    'bebida'  => $bebidaData['base'],
                    'tipo'    => $bebidaData['categoria'],
                    'precio'  => $bebidaData['precio'],
                ]);

                // Dividir la cadena de ingredientes en un array si es string o validar si es array
                if (is_string($bebidaData['ingredientes'])) {
                    $ingredientes = explode(',', $bebidaData['ingredientes']);
                } elseif (is_array($bebidaData['ingredientes'])) {
                    $ingredientes = $bebidaData['ingredientes'];
                } else {
                    // Si no es válida, se omite el procesamiento de ingredientes
                    $ingredientes = [];
                }

                // Buscar o crear los ingredientes
                $ingredienteIds = [];
                foreach ($ingredientes as $ingrediente) {
                    $ingrediente = trim($ingrediente); // Eliminar espacios extra
                    if ($ingrediente == '') {
                        continue;
                    }
                    // Verificar si el ingrediente ya existe en la base de datos, de lo contrario, crearlo
                    $ingredienteExistente = Ingredientes::firstOrCreate(['nombre' => $ingrediente]);
                    $ingredienteIds[] = $ingredienteExistente->id;
                }

                // Asociar los ingredientes al cóctel
                $coctel->ingredientes()->sync($ingredienteIds);
            }
        } catch (Exception $e) {
            // Registrar el error para depuración
            Log::error('Error al crear cócteles: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al registrar los cócteles.');
        }

        return redirect()->route('dashboard')->with('success', 'Cócteles registrados correctamente');
    }

    public function destroy($id)
    {
        try {
            $coctel = Coctel::find($id);

            if (!$coctel) {
                return response()->json(['error' => 'Cóctel no encontrado'], 404);
            }

            $coctel->delete();
            return response()->json(['mensaje' => 'Cóctel eliminado con éxito']);
        } catch (Exception $e) {
            Log::error('Error eliminando cóctel: ' . $e->getMessage());
            return response()->json(['error' => 'Error al eliminar el cóctel'], 500);
        }
    }

    public function edit($id)
    {
        try {
            $coctel = Coctel::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Cóctel no encontrado');
        }
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
