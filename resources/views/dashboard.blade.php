<x-app-layout>
    <div class="py-8">
        <!-- Contenedor principal: vertical en móviles, horizontal a partir de md -->
        <div class="flex flex-col md:flex-row gap-6 max-w-7xl mx-auto px-4">

            <!-- Menú: ocupa ancho completo en móviles y ancho fijo en desktop -->
            <div class="w-full md:w-96">
                <div class="bg-white shadow-md  p-6 flex flex-col justify-between sticky top-4">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 border-b pb-2">
                        Menú de Opciones
                    </h2>
                    <p class="text-sm text-gray-500">
                        Bienvenido al sistema de gestión inteligente para cartas y menús.
                    </p>

                    <div class="grid gap-4 mt-4">
                        <button id="button-section1"
                            class="menu-btn w-full bg-white border border-gray-300 text-gray-800 font-semibold py-2 rounded-lg shadow focus:bg-green-500 focus:text-white transition duration-300 ease-in-out"
                            data-section="seccion1">
                            Tu Sección
                        </button>

                        <!-- Botón de la segunda sección -->
                        <button id="button-section2"
                            class="menu-btn w-full bg-white border border-gray-300 text-gray-800 font-semibold py-2 rounded-lg shadow focus:bg-red-500 focus:text-white transition duration-300 ease-in-out"
                            data-section="seccion2">
                            Buscar Bebidas
                        </button>
                        <hr>
                    </div>


                    <form action="{{ route('download.pdf') }}" class="form-excel text-center space-x-4 my-4">
                        <button type="submit"
                            class="bg-teal-300 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                            Descargar tu plantilla
                        </button>
                    </form>

                    <div id="count-bebidas" class="section-count hidden">
                        <div class="text-center space-x-4 my-4">
                            <form id="formulario-registro" method="POST" action="{{ route('confirmacion.index') }}">
                                @csrf
                                <input type="hidden" name="seleccionadas" id="seleccionadas">
                                <span class="font-semibold">
                                    Bebidas Seleccionadas:
                                    <span id="contador" class="text-pink-600">0</span>
                                </span>
                                <button type="submit"
                                    class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition"
                                    id="registrar">
                                    Registrar bebidas
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('success'))
            <div id="flash-success" data-message="{{ session('success') }}"></div>
            @endif

            <!-- Contenido principal -->
            <div class="w-full flex-1 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <p id="mensaje-vacio" class="col-span-full text-center text-gray-500 text-lg mt-10 ">
                    Agrega nuevas bebidas a tu espacio 🍹
                </p>
                <div id="section-content"
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 relative m-3">

                    <!-- JQUERY ADD SECTION  -->


                    <!-- MENSAJE CUANDO NO HAY TARJETAS -->



                </div>
            </div>

        </div>
        <div id="spinner" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-50 hidden ">
            <div class="w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin">
            </div>
        </div>
    </div>
    </div>
</x-app-layout>