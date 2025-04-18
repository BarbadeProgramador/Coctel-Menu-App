@props([
    'id',
    'nombre',
    'imagen',
    'precio',
    'bebida',
    'ingredientes',
    'tipo'
])


<div id="coctel-{{ $id }}" class="relative max-w-sm  flex flex-col rounded-xl overflow-hidden shadow-lg border border-gray-200 bg-white transition-transform duration-300 hover:scale-105">
    {{-- Botón de eliminar --}}
    <button 
        class="absolute top-2 right-2 text-red-500 hover:text-red-700"
        onclick="eliminarCoctel({{ $id }})"
        title="Eliminar"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 8.586l4.95-4.95a1 1 0 111.414 1.414L11.414 10l4.95 4.95a1 1 0 01-1.414 1.414L10 11.414l-4.95 4.95a1 1 0 01-1.414-1.414L8.586 10l-4.95-4.95a1 1 0 011.414-1.414L10 8.586z" clip-rule="evenodd" />
        </svg>
    </button>

    {{-- Imagen de la bebida --}}
    <img class="w-full h-48 object-cover" src="{{ $imagen }}" alt="{{ $nombre }}">

    {{-- Contenido de la tarjeta --}}
    <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-900 text-lg">{{ $nombre }}</h2>
                <span class="text-green-600 font-semibold text-sm">${{ number_format($precio, 2, ',', '.') }}</span>
            </div>

            <p class="flex items-center text-sm text-gray-600 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
                <span class="font-medium text-justify text-pink-600">Bebida:</span> &nbsp;{{ $bebida }}
            </p>

            <p class="text-sm mt-2 font-semibold text-gray-700">Ingredientes:</p>
            <p class="text-sm text-gray-400">{{ $ingredientes }}</p>
        </div>
    </div>

    {{-- Tipo y botón de actualizar --}}
    <div class="flex justify-between items-center h-[80px] bg-slate-50 px-4 py-2 border-t border-gray-200">
        <span class="text-xs font-medium w-20 text-gray-700 px-3 py-1 rounded-full"><strong>{{ $tipo }}</strong></span>

        <form action="{{ route('confirmacion.edit', $id) }}" method="GET">
            <button 
                type="submit"
                class="text-sm text-blue-600 hover:underline font-medium"
            >
                Actualizar
            </button>
        </form>
    </div>
</div>
