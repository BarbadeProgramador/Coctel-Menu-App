<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($response['drinks'] as $data)
                <x-card-coctel
                    nombre="{{ $data['strDrink'] }}"
                    imagen="{{ $data['strDrinkThumb'] }}"
                    base="Tequila"
                    ingredientes="Tequila, Triple Sec, Jugo de limón"
                    alcohol="30"
                    categoria="Clásico"
                />  
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
