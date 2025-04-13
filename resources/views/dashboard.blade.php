<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-yellow-500">
        <div class="flex bg-pink-200">
            <div class="bg-slate-300 max-w-7xl overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="">Opciones</h2>
                <div class="bg-lime-500">
                    <button onclick="cargarVista('tuseccion')">Tu sección</button>
                    <button onclick="cargarVista('bebidas')">Agregar Bebidas</button>
                </div>
            </div>

            <div id="contenido-principal" class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Aquí se cargará el contenido dinámicamente -->
            </div>
        </div>
    </div>
