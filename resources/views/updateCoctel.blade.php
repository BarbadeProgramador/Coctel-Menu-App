<x-app-layout>


<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Actualizar Cóctel</h2>

    <form action="{{ route('confirmacion.update', $coctel->id) }}" method="POST" class="space-y-4">
      @csrf
      @method('PUT')

      <!-- Nombre -->
      <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $coctel->nombre) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Precio -->
      <div>
        <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
        <input type="number" id="precio" name="precio" value="{{ old('precio', $coctel->precio) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Bebida Base -->
      <div>
        <label for="bebida" class="block text-sm font-medium text-gray-700">Bebida</label>
        <input type="text" id="bebida" name="bebida" value="{{ old('bebida', $coctel->bebida) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Ingredientes -->
      <div>
        <label for="ingredientes" class="block text-sm font-medium text-gray-700">Ingredientes</label>
        <div class="mt-1 space-y-2">
          @foreach($coctel->ingredientes as $ingrediente)
            <input type="text" name="ingredientes[]" value="{{ old('ingredientes.' . $loop->index, $ingrediente->nombre) }}" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
          @endforeach
        </div>
      </div>

      <!-- Tipo -->
      <div>
        <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
        <input type="text" id="tipo" name="tipo" value="{{ old('tipo', $coctel->tipo) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Botón de Actualizar -->
      <div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">Actualizar</button>
      </div>
    </form>
  </div>
</div>
</x-app-layout>
