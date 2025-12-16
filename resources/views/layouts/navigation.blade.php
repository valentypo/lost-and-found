<nav x-data="{ open: false }" class="bg-white shadow-md border-b-2 border-blue-200 sticky top-0 z-50 backdrop-blur-sm bg-white/95">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">

                <!-- Brand Name with Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                    <!-- Logo Image -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-blue-400 rounded-xl blur-lg opacity-0 group-hover:opacity-30 transition-all duration-500"></div>
                        <img src="{{ asset('images/logo.png') }}" 
                             alt="LoaF Logo" 
                             class="w-12 h-12 object-contain relative z-10 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-extrabold bg-gradient-to-r from-[#1E40AF] to-[#2d51c9] bg-clip-text text-transparent group-hover:from-[#1E40AF] group-hover:to-[#2d51c9] transition-all duration-300">LoaF</span>
                        <span class="text-[10px] text-[#0d4296] uppercase font-medium -mt-1">Lost & Found</span>
                    </div>
                </a>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                class="relative group px-4 py-2 rounded-lg transition-all duration-300 hover:scale-105">
                        <span class="relative z-10">{{ __('Dashboard') }}</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                    </x-nav-link>

                    <x-nav-link :href="route('lost-items.index')"
                                :active="request()->routeIs('lost-items.*')"
                                class="relative group px-4 py-2 rounded-lg transition-all duration-300 hover:scale-105">
                        <span class="relative z-10 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span>{{ __('Lost Items') }}</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                    </x-nav-link>

                    <x-nav-link :href="route('found-items.index')"
                                :active="request()->routeIs('found-items.*')"
                                class="relative group px-4 py-2 rounded-lg transition-all duration-300 hover:scale-105">
                        <span class="relative z-10 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>{{ __('Found Items') }}</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                    </x-nav-link>

                    <!-- Claims -->
                    <x-nav-link :href="route('claims.index')" :active="request()->routeIs('claims.*')"
                                class="relative group px-4 py-2 rounded-lg transition-all duration-300 hover:scale-105">
                        <span class="relative z-10 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <span>{{ __('Claims') }}</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2.5 border-2
                            {{ request()->routeIs('profile.*')
                                ? 'border-blue-500 bg-blue-50 text-blue-700 shadow-md'
                                : 'border-gray-200 bg-white text-gray-700' }}
                            text-sm leading-4 font-semibold rounded-xl
                            hover:bg-blue-50 hover:text-blue-600 hover:border-blue-400 hover:shadow-lg
                            transition-all duration-300 transform hover:scale-105 active:scale-95">

                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-bold text-sm shadow-md transform transition-transform duration-300 hover:rotate-12">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="max-w-32 truncate">{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="py-2">
                            <x-dropdown-link
                                :href="route('profile.edit')"
                                class="flex items-center space-x-2 {{ request()->routeIs('profile.*')
                                    ? 'bg-blue-100 text-blue-700 font-semibold'
                                    : 'hover:bg-blue-50' }} transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>{{ __('Profile') }}</span>
                            </x-dropdown-link>

                            <div class="border-t border-gray-100 my-1"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="flex items-center space-x-2 hover:bg-red-50 hover:text-red-600 transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span>{{ __('Log Out') }}</span>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2.5 rounded-xl text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 border-2 border-transparent hover:border-blue-200 active:scale-95">
                    <svg class="h-6 w-6 transition-transform duration-300" :class="{'rotate-90': open}" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t-2 border-blue-100 bg-gradient-to-b from-blue-50 to-white shadow-inner">
        <div class="pt-3 pb-3 space-y-2 px-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                   class="rounded-xl hover:bg-blue-100 transition-all duration-200 hover:translate-x-2 hover:shadow-md">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium">{{ __('Dashboard') }}</span>
                </div>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('lost-items.index')" :active="request()->routeIs('lost-items.*')"
                                   class="rounded-xl hover:bg-blue-100 transition-all duration-200 hover:translate-x-2 hover:shadow-md">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="font-medium">{{ __('Lost Items') }}</span>
                </div>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('found-items.index')" :active="request()->routeIs('found-items.*')"
                                   class="rounded-xl hover:bg-blue-100 transition-all duration-200 hover:translate-x-2 hover:shadow-md">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium">{{ __('Found Items') }}</span>
                </div>
            </x-responsive-nav-link>

            <!-- Claims -->
            <x-responsive-nav-link :href="route('claims.index')" :active="request()->routeIs('claims.*')"
                                   class="rounded-xl hover:bg-blue-100 transition-all duration-200 hover:translate-x-2 hover:shadow-md">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span class="font-medium">{{ __('Claims') }}</span>
                </div>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t-2 border-blue-200 bg-white">
            <div class="px-4 py-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl mx-3 mb-3 shadow-sm border border-blue-200">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-bold text-lg shadow-lg transform transition-transform duration-300 hover:rotate-12">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-bold text-base text-gray-900 truncate">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-600 truncate">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="space-y-2 px-3">
                <x-responsive-nav-link :href="route('profile.edit')"
                                       class="rounded-xl hover:bg-blue-100 transition-all duration-200 hover:translate-x-2 hover:shadow-md">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-medium">{{ __('Profile') }}</span>
                    </div>
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="rounded-xl hover:bg-red-50 hover:text-red-600 transition-all duration-200 hover:translate-x-2 hover:shadow-md">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span class="font-medium">{{ __('Log Out') }}</span>
                        </div>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Smooth scrolling for sticky navbar */
    html {
        scroll-behavior: smooth;
        scroll-padding-top: 5rem;
    }

    /* Active nav link styling */
    .active-nav-link {
        background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
        color: white !important;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    /* Navbar backdrop blur support */
    @supports (backdrop-filter: blur(10px)) {
        nav {
            backdrop-filter: blur(10px);
        }
    }
</style>