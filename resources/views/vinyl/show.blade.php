<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-lg mt-6">

        <!-- Afbeelding vinyl -->
        <div class="flex justify-center mb-6">
            <img class="w-60 h-60 object-contain rounded-xl shadow-md" src="{{ asset('images/default-vinyl.png') }}" alt="{{ $vinyl->titel }}">
        </div>

        <!-- Titel -->
        <h1 class="text-3xl font-bold text-green-600 mb-4 text-center">{{ $vinyl->titel }}</h1>

        <!-- Basisinfo -->
        <div class="text-gray-700 space-y-1 mb-4 text-center">
            <p><strong>Artiest:</strong> {{ $vinyl->artiest }}</p>
            <p><strong>Genre:</strong> {{ $vinyl->genre }}</p>
            <p><strong>Prijs:</strong> <span class="text-green-600 font-semibold">€ {{ number_format($vinyl->prijs, 2) }}</span></p>
        </div>

        <!-- Beschrijving -->
        <p class="text-gray-600 mb-6 text-center">{{ $vinyl->beschrijving }}</p>

        <!-- Knoppen -->
        <div class="flex flex-col items-center space-y-3">

            <!-- Favorieten knop -->
            @auth
                <form method="POST" action="{{ route('favorites.store', $vinyl) }}" class="w-full max-w-xs">
                    @csrf
                    <button class="w-full mt-2 bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition font-semibold">
                        Toevoegen aan favorieten
                    </button>
                </form>
            @endauth

            <!-- Voeg toe aan mand knop -->
            <form method="POST" action="{{ route('cart.add', $vinyl) }}" class="w-full max-w-xs">
                @csrf
                <button class="w-full mt-2 bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition font-semibold">
                    Voeg toe aan mand
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
