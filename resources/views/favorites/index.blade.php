<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">

        <!-- Titel -->
        <h1 class="text-3xl font-bold text-green-600 mb-8 text-center">Mijn favorieten</h1>

        @if($favorites->isEmpty())
            <p class="text-gray-500 text-center">Je hebt nog geen favorieten.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($favorites as $favorite)
                    <div class="group relative">
                        <!-- Klikbare kaart -->
                        <a href="{{ route('vinyl.show', $favorite->vinyl) }}">
                            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between hover:shadow-2xl transition">
                                <div class="mb-4 text-center">
                                    <h2 class="text-lg font-bold mb-1">{{ $favorite->vinyl->titel }}</h2>
                                    <p class="text-gray-600 mb-1">{{ $favorite->vinyl->artiest }}</p>
                                    <p class="text-green-600 font-semibold">€ {{ number_format($favorite->vinyl->prijs, 2) }}</p>
                                </div>
                            </div>
                        </a>

                        <!-- Verwijder knop -->
                        <form method="POST" action="{{ route('favorites.destroy', $favorite) }}" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-full px-6">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition font-semibold w-full">
                                Verwijderen
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-app-layout>
