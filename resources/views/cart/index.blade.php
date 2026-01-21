<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">

        <h1 class="text-3xl font-bold text-green-600 mb-6">Winkelmand</h1>

        @if(empty($cart))
            <p class="text-gray-500">Je winkelmand is leeg.</p>
        @else
            <div class="space-y-4">
                @foreach($cart as $id => $item)
                    <div class="bg-white p-4 rounded-2xl shadow flex justify-between items-center">
                        <div>
                            <h2 class="font-bold text-lg">{{ $item['titel'] }}</h2>
                            <p class="text-gray-600">€ {{ number_format($item['prijs'], 2) }}</p>
                        </div>

                        <div class="flex items-center space-x-2">
                            <!-- Quantity form -->
                            <form method="POST" action="{{ route('cart.update', $id) }}">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 border rounded px-2 py-1 text-center">
                                <button type="submit" class="ml-2 bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">Toevoegen</button>
                            </form>

                            <!-- Remove form -->
                            <form method="POST" action="{{ route('cart.remove', $id) }}">
                                @csrf
                                <button type="submit" class="ml-2 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Verwijderen</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 text-right">
                @php
                    $total = collect($cart)->sum(fn($item) => $item['prijs'] * $item['quantity']);
                @endphp
                <p class="text-xl font-semibold">Totaal: € {{ number_format($total, 2) }}</p>
                <button class="mt-2 bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition">Afrekenen</button>
            </div>
        @endif

    </div>
</x-app-layout>
