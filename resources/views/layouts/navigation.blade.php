<nav x-data="{ open: false }" class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="h-9 w-auto fill-current text-green-600" />
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex space-x-8 items-center">
                <x-nav-link :href="url('/')" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link :href="url('/collectie')" :active="request()->is('collectie')">Collectie</x-nav-link>
                <x-nav-link :href="url('/favorieten')" :active="request()->is('favorieten')">Favorieten</x-nav-link>
                <x-nav-link :href="url('/community')" :active="request()->is('community')">Community</x-nav-link>
                <x-nav-link :href="url('/over-ons')" :active="request()->is('over-ons')">Over ons</x-nav-link>
                <x-nav-link :href="url('/contact')" :active="request()->is('contact')">Contact</x-nav-link>
            </div>

            <!-- Login / Logout -->
            <div class="hidden sm:flex items-center space-x-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium text-green-600 hover:text-green-700 hover:bg-green-50 transition">
                                {{ Auth::user()->name }}
                                <svg class="ml-1 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-green-600 font-semibold hover:text-green-700 transition">Login</a>
                @endauth
            </div>

            <!-- Hamburger Menu -->
            <div class="-mr-2 flex sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-green-600 hover:text-green-700 hover:bg-green-50 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-white border-t border-gray-200">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">Home</x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/collectie')" :active="request()->is('collectie')">Collectie</x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/favorieten')" :active="request()->is('favorieten')">Favorieten</x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/community')" :active="request()->is('community')">Community</x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/over-ons')" :active="request()->is('over-ons')">Over ons</x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/contact')" :active="request()->is('contact')">Contact</x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4 mb-2">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log out
                    </x-responsive-nav-link>
                </form>
            @else
                <div class="px-4">
                    <x-responsive-nav-link :href="route('login')">Login</x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
