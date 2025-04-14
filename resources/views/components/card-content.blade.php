@props([
    'id',
    'nombre',
    'imagen',
    'precio',
    'bebida',
    'ingredientes',
    'tipo'
])

<div class="relative max-w-sm rounded-xl overflow-hidden shadow-lg border border-gray-200 bg-white" id="coctel-{{ $id }}">

    {{-- Botón de eliminar (ícono X ampliado) --}}
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
    <div class="p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-bold text-gray-900">{{ $nombre }}</h2>
            <span class="text-green-600 font-semibold">${{ number_format($precio, 2, ',', '.') }}</span>
        </div>

        <p class="text-sm text-gray-600 mt-1">
            <span class="font-medium text-pink-600">Bebida base:</span> {{ $bebida }}
        </p>

        <p class="text-sm mt-2 font-semibold text-gray-700">Ingredientes:</p>
        <p class="text-sm text-gray-400">{{ $ingredientes }}</p>
    </div>

    {{-- Tipo y botón de actualizar --}}
    <div class="flex justify-between items-center mt-auto bg-slate-50 px-4 py-2">
        <span class="text-xs border px-2 py-1 rounded-full text-gray-700 border-gray-300">{{ $tipo }}</span>

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
