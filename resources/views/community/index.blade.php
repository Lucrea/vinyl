<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <!-- Pagina titel -->
        <h1 class="text-3xl font-bold text-green-600 mb-6 text-center">Community</h1>

        <!-- Bericht plaatsen formulier -->
        @auth
            <form method="POST" action="{{ route('community.store') }}" class="mb-8 bg-white rounded-2xl shadow-lg p-6">
                @csrf
                <textarea name="bericht" placeholder="Plaats een bericht..." class="border border-gray-300 rounded-lg p-3 w-full mb-3 focus:outline-none focus:ring-2 focus:ring-green-600" required></textarea>
                <button class="mt-2 bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition font-semibold">Plaatsen</button>
            </form>

        @else
            <p class="text-center text-gray-500 mb-6">Je moet ingelogd zijn om een bericht te plaatsen.</p>
        @endauth

        <!-- Berichten lijst -->
        <div class="space-y-4">
            @foreach($posts as $post)
                <div class="bg-white rounded-2xl shadow p-4 flex justify-between items-start hover:shadow-2xl transition">
                    <div>
                        <!-- Auteur info -->
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-green-600 font-bold">
                                {{ $post->user?->name ?? $post->auteur ?? 'Onbekend' }}
                            </span>
                            <small class="text-gray-400">{{ $post->created_at->format('d-m-Y H:i') }}</small>
                        </div>

                        <!-- Bericht -->
                        <p class="text-gray-700">{{ $post->bericht }}</p>
                    </div>

                    @auth
                        @if(auth()->id() === $post->user_id)
                            <form method="POST" action="{{ route('community.destroy', $post) }}" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 text-sm hover:underline">Verwijderen</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
