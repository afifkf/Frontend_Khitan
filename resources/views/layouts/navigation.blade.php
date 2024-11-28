<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <style>
                .nav-link {
                    text-decoration: none; /* Menghapus garis bawah */
                    color: inherit; /* Mempertahankan warna teks bawaan */
                }

                .nav-link:hover {
                    text-decoration: none; /* Menghapus garis bawah saat hover */
                }
            </style>


            <!-- Navigation Links -->
            <!-- <div class="flex space-x-6">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Beranda') }}
                </x-nav-link>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Tentang') }}
                </x-nav-link>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Metode') }}
                </x-nav-link>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Kontak') }}
                </x-nav-link>
            </div> -->

            <style>
                .dropdown-link {
                    text-decoration: none; /* Menghapus garis bawah */
                    color: inherit; /* Mempertahankan warna teks bawaan */
                }

                .dropdown-link:hover {
                    text-decoration: none; /* Menghapus garis bawah saat hover */
                }
            </style>


            <!-- Settings Dropdown -->

            <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-3 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                <!-- Avatar Ikon -->
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" 
                    alt="Avatar" class="h-8 w-8 rounded-full">
                <!-- Nama Pengguna -->
                <span>{{ Auth::user()->name }}</span>
                <!-- Ikon Panah -->
                <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" 
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" 
                        clip-rule="evenodd" />
                </svg>
            </button>

    <!-- Dropdown Content -->
    <div x-show="open" 
         @click.away="open = false" 
         class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 ring-1 ring-black ring-opacity-5" 
         style="display: none;">
        <!-- Profil -->
        <a href="{{ route('profile.edit') }}" 
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 no-underline">
            {{ __('Profil') }}
        </a>
        <!-- Dashboard Admin -->
        @if (auth()->user()->usertype === 'Admin')
            <a href="{{ route('admin/dashboard') }}" 
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 no-underline">
                {{ __('Dashboard Admin') }}
            </a>
        @endif
        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 no-underline">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
