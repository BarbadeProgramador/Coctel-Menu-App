@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Resumen de Bebidas Seleccionadas</h1>
    <div class="grid grid-cols-1 gap-4">
        @foreach ($carrito as $id => $bebida)
            <div class="flex items-center space-x-4 p-4 border rounded">
                <img src="{{ $bebida['imagen'] }}" alt="{{ $bebida['nombre'] }}" class="w-16 h-16 object-cover">
                <div>
                    <h2 class="text-lg font-semibold">{{ $bebida['nombre'] }}</h2>
                    <p class="text-sm text-gray-600">Base: {{ $bebida['base'] }}</p>
                    <p class="text-sm text-gray-600">Ingredientes: {{ $bebida['ingredientes'] }}</p>
                    <p class="text-sm text-gray-600">Categoría: {{ $bebida['categoria'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
