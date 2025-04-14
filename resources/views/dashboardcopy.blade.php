<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-yellow-500">

        <div class="flex bg-pink-200 ">

        


            <div class="bg-slate-300 max-w-7xl overflow-hidden shadow-sm sm:rounded-lg">
            <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  bg-white overflow-hidden shadow-sm sm:rounded-lg "> -->
            
                <h2 class="">Opciones</h2>

                <div class="bg-lime-500  ">
                    <button>Tu seccion</button>
                    <button>Agregar Bebidas</button>
                </div>

            </div>

            <!-- Page list selection user  -->

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                        <x-card-coctel
                            nombre="hola"
                            imagen="hola"
                            base="hola"
                            ingredientes="hola"
                            alcohol="hola"
                            categoria="hola"
                        />  
                </div>
            </div>




            <!-- Page list Coctel -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($response['drinks'] as $data)
                        @php
                            $ingredientes = [];
                            foreach ($data as $key => $ingredient) {
                                if (strpos($key, 'strIngredient') === 0 && $ingredient !== null && $ingredient !== "") {
                                    $ingredientes[] = $ingredient; 
                                }
                            }

                            $ingredientes_str = implode(',', $ingredientes);

                           
                            
                        @endphp

                        <x-card-coctel
                        :nombre="$data['strDrink']"
                        :imagen="$data['strDrinkThumb']"
                        :base="$data['strAlcoholic']"
                        :ingredientes="$ingredientes_str"
                        :alcohol="$data['strAlcoholic']"
                        :categoria="$data['strCategory']"
                        />  
                    @endforeach
                </div>
            </div>


        </div>


   
    </div>
</x-app-layout>
