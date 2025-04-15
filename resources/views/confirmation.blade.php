<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmar Bebidas Seleccionadas') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form id="form-confirmar" method="POST" action="{{ route('confirmacion.create') }}">
                    @csrf
                    <input type="hidden" name="seleccionadas" id="seleccionadas">

                    <table class="min-w-full divide-y divide-gray-200" id="tabla-bebidas">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2">Imagen</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Tipo</th>
                                <th class="px-4 py-2">Ingredientes</th>
                                <th class="px-4 py-2">Categoría</th>
                                <th class="px-4 py-2">Precio</th>
                                <th class="px-4 py-2">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($seleccionadas as $index => $bebida)
                        <tr>
                            <td class="px-4 py-2">
                                <img src="{{ $bebida['imagen'] }}" alt="{{ $bebida['nombre'] }}" class="w-16 h-16 object-cover rounded">
                                <input type="hidden" name="bebidas[{{ $index }}][imagen]" value="{{ $bebida['imagen'] }}">
                            </td>
                            <td class="px-4 py-2">
                                {{ $bebida['nombre'] }}
                                <input type="hidden" name="bebidas[{{ $index }}][nombre]" value="{{ $bebida['nombre'] }}">
                            </td>
                            <td class="px-4 py-2">
                                {{ $bebida['base'] }}
                                <input type="hidden" name="bebidas[{{ $index }}][base]" value="{{ $bebida['base'] }}">
                            </td>
                            <td class="px-4 py-2">
                                {{ $bebida['ingredientes'] }}
                                <input type="hidden" name="bebidas[{{ $index }}][ingredientes]" value="{{ $bebida['ingredientes'] }}">
                            </td>

                            <td class="px-4 py-2">
                                {{ $bebida['categoria'] }}
                                <input type="hidden" name="bebidas[{{ $index }}][categoria]" value="{{ $bebida['categoria'] }}">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" step="0.01" min="0" class="precio-input border rounded px-2 py-1 w-24" placeholder="Precio"
                                    name="bebidas[{{ $index }}][precio]" required>
                            </td>
                            <td class="px-4 py-2">
                                <button type="button" class="text-red-600 hover:text-red-900 eliminar-fila">Eliminar</button>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Registrar Bebidas
                        </button>

                        
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
