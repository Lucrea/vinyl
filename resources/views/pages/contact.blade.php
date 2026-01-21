<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <!-- Pagina titel -->
        <h1 class="text-3xl font-bold text-green-600 mb-6 text-center">Contact</h1>

        <!-- Formulier card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
            <form method="POST" action="/">
                @csrf
                <input
                    type="text"
                    name="naam"
                    placeholder="Naam"
                    class="border border-gray-300 rounded-lg p-3 w-full mb-4 focus:outline-none focus:ring-2 focus:ring-green-600"
                    required
                >
                <input
                    type="email"
                    name="email"
                    placeholder="E-mail"
                    class="border border-gray-300 rounded-lg p-3 w-full mb-4 focus:outline-none focus:ring-2 focus:ring-green-600"
                    required
                >
                <textarea
                    name="bericht"
                    placeholder="Bericht"
                    class="border border-gray-300 rounded-lg p-3 w-full mb-4 focus:outline-none focus:ring-2 focus:ring-green-600"
                    required
                ></textarea>
                <button class="mt-2 bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition font-semibold">
                    Verstuur
                </button>
            </form>
        </div>

        <!-- Contact info -->
        <div class="bg-white rounded-2xl shadow-lg p-6 space-y-2">
            <p class="text-gray-700"><strong>E-mail:</strong> info@stegemann-vinyl.nl</p>
            <p class="text-gray-700"><strong>Telefoon:</strong> 0123-456789</p>
        </div>

    </div>
</x-app-layout>
