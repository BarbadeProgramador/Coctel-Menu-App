<div class="max-w-sm rounded-xl overflow-hidden shadow-lg border border-gray-200 bg-white">
    {{-- Imagen de la bebida --}}
    <img class="w-full h-48 object-cover" src="{{ $imagen }}" alt="{{ $nombre }}">

    {{-- Contenido de la tarjeta --}}
    <div class="p-4">
        <h2 class="text-lg font-bold text-gray-900">{{ $nombre }}</h2>

        <p class="flex items-center text-sm text-gray-600 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <span class="font-medium">Base:</span>&nbsp;{{ $base }}
        </p>

        <p class="text-sm mt-2 font-semibold text-gray-700">Ingredientes:</p>
        <p class="text-sm text-gray-400">{{ $ingredientes }}</p>

        <div class="flex justify-between items-center mt-4">
            <span class="text-sm font-semibold text-gray-700">Alcohol: {{ $alcohol }}%</span>
            <span class="text-xs border px-2 py-1 rounded-full text-gray-700 border-gray-300">{{ $categoria }}</span>
        </div>

        {{-- Botón Agregar --}}
        <button class="w-full flex justify-center items-center gap-2 mt-4 py-2 border rounded-lg text-gray-700 border-gray-300 hover:bg-gray-50 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Agregar
        </button>
    </div>
</div>
