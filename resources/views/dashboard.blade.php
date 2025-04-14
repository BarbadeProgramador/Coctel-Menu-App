<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-yellow-500">

        <div class="flex bg-pink-200 ">

        

            <div class="bg-white max-w-7xl shadow-md rounded-xl h-96 w-96 ml-5 p-6 flex flex-col justify-between sticky top-0">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4 border-b pb-2">Menú de Opciones</h2>
              
                <p class="text-sm text-gray-500">
                    Bienvenido al sistema de gestión inteligente para cartas y menús.
                </p>
            
                <div class="grid gap-4">
                  <button class="border-b-2 border-gray-300 text-gray-700 font-medium py-2 hover:border-blue-600 hover:text-blue-600 transition duration-300 menu-btn"  data-section="seccion1">
                    Tu Sección
                  </button>
                  <button class="border-b-2 border-gray-300 text-gray-700 font-medium py-2 hover:border-green-600 hover:text-green-600 transition duration-300 menu-btn"  data-section="seccion2">
                    Agregar Bebidas
                  </button>
                </div>
            </div>
            


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="section-content">

                </div>
            </div>        

        </div>


   
    </div>
</x-app-layout>
