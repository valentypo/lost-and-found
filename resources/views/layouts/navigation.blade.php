<nav x-data="{ open: false }" class="bg-white shadow-sm border-b border-blue-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">

                <!-- Brand Name with Placeholder Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 text-xl font-bold text-blue-600 hover:text-blue-700 transition-all duration-300 hover:scale-105">
                    <!-- Placeholder for Logo - Replace with your actual logo -->
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <span>LoaF</span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                class="transition-all duration-300 hover:scale-105">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('lost-items.index')"
                                :active="request()->routeIs('lost-items.*')"
                                class="transition-all duration-300 hover:scale-105">
                        {{ __('Lost Items') }}
                    </x-nav-link>

                    <x-nav-link :href="route('found-items.index')"
                                :active="request()->routeIs('found-items.*')"
                                class="transition-all duration-300 hover:scale-105">
                        {{ __('Found Items') }}
                    </x-nav-link>

                    <!-- Claims (NEW) -->
                    <x-nav-link :href="route('claims.index')" :active="request()->routeIs('claims.*')">
                        {{ __('Claims') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border
                            {{ request()->routeIs('profile.*')
                                ? 'border-blue-400 bg-blue-50 text-blue-700'
                                : 'border-blue-200 bg-white text-gray-700' }}
                            text-sm leading-4 font-medium rounded-lg
                            hover:bg-blue-50 hover:text-blue-600 hover:border-blue-300
                            transition-all duration-300 hover:shadow-sm">

                            <div class="flex items-center space-x-2">
                                <div class="w-7 h-7 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold text-xs">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link
                            :href="route('profile.edit')"
                            class="{{ request()->routeIs('profile.*')
                                ? 'bg-blue-100 text-blue-700 font-semibold'
                                : 'hover:bg-blue-50' }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="hover:bg-red-50 hover:text-red-600 transition-colors duration-200">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-lg text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-blue-100 bg-blue-50">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                   class="hover:bg-blue-100 transition-colors duration-200">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('lost-items.index')" :active="request()->routeIs('lost-items.*')"
                                   class="hover:bg-blue-100 transition-colors duration-200">
                {{ __('Lost Items') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('found-items.index')" :active="request()->routeIs('found-items.*')"
                                   class="hover:bg-blue-100 transition-colors duration-200">
                {{ __('Found Items') }}
            </x-responsive-nav-link>

            <!-- Claims (NEW) -->
            <x-responsive-nav-link :href="route('claims.index')" :active="request()->routeIs('claims.*')">
                {{ __('Claims') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-blue-200">
            <div class="px-4 py-3 bg-white rounded-lg mx-2 mb-3">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="font-semibold text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')"
                                       class="hover:bg-blue-100 transition-colors duration-200">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="hover:bg-red-50 hover:text-red-600 transition-colors duration-200">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>