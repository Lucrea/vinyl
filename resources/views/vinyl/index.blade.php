<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">

        <!-- Pagina titel -->
        <h1 class="text-3xl font-bold text-green-600 mb-8 text-center">Onze Collectie</h1>

        <!-- Vinyl Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($vinyls as $vinyl)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden p-6 flex flex-col items-center text-center hover:shadow-2xl transition">

                    <!-- Afbeelding -->
                    <img class="w-40 h-40 object-contain mb-4" src="{{ asset('images/default-vinyl.png') }}" alt="{{ $vinyl->titel }}">

                    <!-- Info -->
                    <h2 class="text-lg font-bold mb-1">{{ $vinyl->titel }}</h2>
                    <p class="text-gray-600 mb-2">{{ $vinyl->artiest }}</p>
                    <p class="text-green-600 font-semibold mb-4">€ {{ number_format($vinyl->prijs, 2) }}</p>

                    <!-- Bekijk knop -->
                    <a href="{{ route('vinyl.show', $vinyl) }}" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition">
                        Bekijk details
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Geen vinyls -->
        @if($vinyls->isEmpty())
            <p class="mt-6 text-gray-500 text-center">Geen vinyls gevonden.</p>
        @endif

        <!-- Paginatie -->
        <div class="mt-8 flex justify-center">
            {{ $vinyls->links() }}
        </div>

    </div>
</x-app-layout>
