@props([
    'nombre',
    'imagen',
    'base',
    'ingredientes',
    'alcohol',
    'categoria'
])

<div class="max-w-sm bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden flex flex-col transition duration-300 hover:shadow-lg hover:scale-105">
    {{-- Imagen de la bebida --}}
    <img class="w-full h-48 object-cover" src="{{ $imagen }}" alt="{{ $nombre }}">

    {{-- Contenido de la tarjeta --}}
    <div class="p-4 flex-1">
        <h2 class="text-lg font-bold text-gray-900">{{ $nombre }}</h2>

        <p class="flex items-center text-sm text-gray-600 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <span class="font-medium text-pink-600">Bebida:</span>&nbsp;{{ $base }}
        </p>

        <p class="text-sm mt-2 font-semibold text-gray-700">Ingredientes:</p>
        <p class="text-sm text-gray-500">{{ $ingredientes }}</p>
    </div>

    {{-- Categoría y botón de agregar --}}
    <div class="flex justify-between items-center bg-slate-50 px-4 py-3 border-t border-gray-200">
        <span class="text-xs font-medium text-gray-700 bg-gray-100 px-3 py-1 rounded-full">{{ $categoria }}</span>

        <button
            class="btn-agregar seleccionar-btn text-xs font-semibold px-3 py-1 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100 transition"
            data-nombre="{{ $nombre }}"
            data-imagen="{{ $imagen }}"
            data-base="{{ $base }}"
            data-ingredientes="{{ $ingredientes }}"
            data-alcohol="{{ $alcohol }}"
            data-categoria="{{ $categoria }}"
        >
            ➕ Agregar
        </button>
    </div>
</div>
