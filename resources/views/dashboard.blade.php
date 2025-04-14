<x-app-layout>
    <div class="py-8">
      <!-- Contenedor principal: vertical en móviles, horizontal a partir de md -->
      <div class="flex flex-col md:flex-row gap-6 max-w-7xl mx-auto px-4">
        
        <!-- Menú: ocupa ancho completo en móviles y ancho fijo en desktop -->
        <div class="w-full md:w-96">
          <div class="bg-stone-50 shadow-md  p-6 flex flex-col justify-between sticky top-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 border-b pb-2">
              Menú de Opciones
            </h2>
            <p class="text-sm text-gray-500">
              Bienvenido al sistema de gestión inteligente para cartas y menús.
            </p>
            
            <div class="grid gap-4 mt-4">
              <button class="border-b-2 border-gray-300 text-gray-700 font-medium py-2 hover:bg-green-400 hover:text-black-600 transition duration-300 menu-btn"
                      data-section="seccion1">
                Tu Sección
              </button>
              <button class="border-b-2 border-gray-300  text-gray-700 font-medium py-2 hover:bg-red-400 hover:text-black-600 transition duration-300 menu-btn"
                      data-section="seccion2">
                Buscar Bebidas
              </button>
            </div>
            
            <form action="{{ route('download.pdf') }}" class="form-excel text-center space-x-4 my-4">
              <button type="submit" class="bg-teal-300 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Descargar tu plantilla
              </button>
            </form>
  
             <!-- Mensaje de éxito -->
                @if (session('success'))
                <div class="bg-green-200 text-green-800 border border-green-300 rounded-md p-4 mb-4">
                {{ session('success') }}
                </div>
            @endif

            <!-- Mensaje de error -->
            @if (session('error'))
                <div class="bg-red-200 text-red-800 border border-red-300 rounded-md p-4 mb-4">
                {{ session('error') }}
                </div>
            @endif
            
            <div id="count-bebidas" class="section-count hidden">
              <div class="text-center space-x-4 my-4">
                <form id="formulario-registro" method="POST" action="{{ route('confirmacion.index') }}">
                  @csrf
                  <input type="hidden" name="seleccionadas" id="seleccionadas">
                  <span class="font-semibold">
                    Bebidas Seleccionadas: 
                    <span id="contador" class="text-pink-600">0</span>
                  </span>
                  <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition"
                          id="registrar">
                    Registrar bebidas
                  </button>
                </form>    
              </div>
            </div>
          </div>
        </div>
        
        <!-- Contenido principal -->
        <div class="w-full flex-1 bg-slate-50 overflow-hidden shadow-sm sm:rounded-lg">
          <div id="section-content" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 relative">
            <!-- JQUERY ADD SECTION  -->
            <div id="spinner" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-50 hidden z-50">
              <div class="w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </x-app-layout>
  