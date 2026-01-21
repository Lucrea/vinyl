<x-app-layout>
    <div>

        {{-- INLEIDING --}}
        <section class="py-12 px-4 max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-green-600 mb-4">Welkom bij Stegeman Vinyl</h1>
            <p class="text-gray-700">
                Ontdek de mooiste vinylcollectie, van klassiekers tot de nieuwste releases.
                Stegeman Vinyl brengt muziekliefhebbers samen en maakt het makkelijk om jouw favoriete platen te vinden.
            </p>
        </section>


        {{-- UITGELICHTE PLATEN --}}
        <section class="py-12 px-4 max-w-7xl mx-auto">
            <h2 class="text-2xl font-semibold text-green-600 mb-8 text-center">Uitgelichte platen</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($featuredVinyls as $vinyl)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden p-6 flex flex-col items-center text-center hover:shadow-2xl transition">
                        <img class="w-40 h-40 object-contain mb-4" src="{{ asset('images/default-vinyl.png') }}" alt="{{ $vinyl->titel }}">
                        <h3 class="text-lg font-bold mb-1">{{ $vinyl->titel }}</h3>
                        <p class="text-gray-600 mb-2">{{ $vinyl->artiest }}</p>
                        <p class="text-green-600 font-semibold mb-4">€ {{ number_format($vinyl->prijs, 2) }}</p>
                        <a href="{{ route('vinyl.show', $vinyl) }}" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition">
                            Bekijk
                        </a>
                    </div>
                @endforeach
            </div>
        </section>



        {{-- ALLE PLATEN --}}
        <section class="py-12 px-4 max-w-7xl mx-auto">
            <h2 class="text-2xl font-semibold text-green-600 mb-8 text-center">Onze collectie</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($vinyls as $vinyl)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden p-6 flex flex-col items-center text-center hover:shadow-2xl transition">

                        <!-- Afbeelding -->
                        <img class="w-40 h-40 object-contain mb-4" src="{{ asset('images/default-vinyl.png') }}" alt="{{ $vinyl->titel }}">

                        <!-- Info -->
                        <h3 class="text-lg font-bold mb-1">{{ $vinyl->titel }}</h3>
                        <p class="text-gray-600 mb-2">{{ $vinyl->artiest }}</p>
                        <p class="text-green-600 font-semibold mb-4">€ {{ number_format($vinyl->prijs, 2) }}</p>

                        <!-- Bekijk knop -->
                        <a href="{{ route('vinyl.show', $vinyl) }}" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition">
                            Bekijk
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Bekijk alle platen -->
            <div class="mt-8 text-center">
                <a href="{{ route('collectie') }}" class="bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 transition font-semibold">
                    Bekijk alle platen
                </a>
            </div>
        </section>


    </div>
</x-app-layout>
