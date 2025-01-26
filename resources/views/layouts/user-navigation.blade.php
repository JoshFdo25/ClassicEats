<nav id="nav" x-data="{ open: false }" class="sticky top-0 z-20 bg-gradient-to-r from-[#002387] to-[#001147] shadow-lg p-1 transition-all duration-300">
    <!-- Primary Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-between items-center h-16">
            <!-- Logo Section -->
            <div class="flex-shrink-0">
                <a href="{{  route('home') }}" class="flex items-center gap-2 md:flex-none">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 48 48" class="w-10 h-10" style="fill:#FFFFFF;">
                        <path d="M 21.5 2 C 20.672 2 20 2.672 20 3.5 L 20 5.5625 L 20 8.6035156 L 20 12 L 20 15 L 20 15.5 C 20 16.328 20.672 17 21.5 17 C 22.328 17 23 16.328 23 15.5 L 23 15 L 23 12 L 23 8.1035156 L 23 5.0625 L 23 3.5 C 23 2.672 22.328 2 21.5 2 z M 41.556641 2.0019531 C 41.456885 1.9981699 41.354328 2.0047344 41.251953 2.0214844 L 26 4.5625 L 26 7.6035156 L 41.746094 4.9785156 C 42.562094 4.8435156 43.115516 4.0709063 42.978516 3.2539062 C 42.859516 2.5390312 42.254932 2.0284355 41.556641 2.0019531 z M 15.5 3 C 14.672 3 14 3.672 14 4.5 L 14 6.5625 L 14 9.6035156 L 14 12 L 14 26 L 11 26 L 11 5.5 C 11 4.672 10.328 4 9.5 4 C 8.672 4 8 4.672 8 5.5 L 8 7.5625 L 5.2539062 8.0214844 C 4.4379063 8.1564844 3.8844844 8.9290937 4.0214844 9.7460938 C 4.1434844 10.479094 4.7780469 11 5.4980469 11 C 5.5800469 11 5.6620938 10.992516 5.7460938 10.978516 L 8 10.603516 L 8 12 L 5.5 12 C 4.672 12 4 12.672 4 13.5 C 4 14.328 4.672 15 5.5 15 L 8 15 L 8 26 L 5.5 26 C 3.57 26 2 27.57 2 29.5 C 2 38.598 9.402 46 18.5 46 L 29.5 46 C 38.598 46 46 38.598 46 29.5 C 46 27.57 44.43 26 42.5 26 L 17 26 L 17 12 L 17 9.1035156 L 17 6.0625 L 17 4.5 C 17 3.672 16.328 3 15.5 3 z M 26 12 L 26 15 L 41.5 15 C 42.328 15 43 14.328 43 13.5 C 43 12.672 42.328 12 41.5 12 L 26 12 z"></path>
                    </svg>
                    <span class="text-lg md:text-2xl font-playwrite-cu font-extrabold text-white">ClassicEats</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="absolute left-1/2 transform -translate-x-1/2 hidden md:flex space-x-5 items-center bg-gray-500 rounded-full p-1">
                <a href="{{ route('home') }}"
                class="px-3 py-1 rounded-full transition-all duration-300 transform
                        {{ request()->routeIs('home') ? 'bg-[#001147] text-white font-semibold' : 'text-white hover:text-[#002147] hover:scale-105' }}">
                    Home
                </a>
                <a href="{{ route('products.index') }}"
                class="px-3 py-1 rounded-full transition-all duration-300 transform
                        {{ request()->routeIs('products.index') ? 'bg-[#001147] text-white font-semibold' : 'text-white hover:text-[#002147] hover:scale-105' }}">
                    Products
                </a>
                <a href="{{ route('contact-us') }}"
                class="px-3 py-1 rounded-full transition-all duration-300 transform
                        {{ request()->routeIs('contact-us') ? 'bg-[#001147] text-white font-semibold' : 'text-white hover:text-[#002147] hover:scale-105' }}">
                    Contact us
                </a>
            </div>

            <!-- Profile and Toggle -->
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex relative items-center space-x-4">
                    <!-- Profile -->
                    @if(Auth::check())
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <div class="relative group flex items-center">
                                    <button class="flex bg-gray-500 hover:bg-gray-700 p-1 rounded-full items-center transition-all duration-500">
                                        <div class="w-8 h-8 rounded-full overflow-hidden bg-transparent">
                                            @if (Auth::check() && Auth::user()->profile_picture)
                                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" class="object-cover w-full h-full" alt="Profile">
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4a4 4 0 110 8 4 4 0 010-8zm0 10c-5.333 0-8 2.667-8 4v2h16v-2c0-1.333-2.667-4-8-4z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <span
                                            class="hidden group-hover:inline-block text-white pr-4 transition-opacity opacity-0 group-hover:opacity-100 transform group-hover:translate-x-2"
                                            :class="{ 'inline-block': open }">
                                            {{ Auth::user()->name }}
                                        </span>
                                    </button>
                                </div>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')" class="flex items-center hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    Profile
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                    @csrf
                                    <x-dropdown-link 
                                        href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); this.closest('form').submit();" 
                                        class="flex items-center hover:bg-red-100 dark:hover:bg-red-800">
                                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" stroke="currentColor" class="size-6 mr-2">
                                            <path d="M17 16l4-4m0 0l-4-4 m4 4h-14m5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h3a3 3 0 013 3v1"></path>
                                        </svg>
                                        Sign Out
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                    </x-dropdown>
                    @else
                    <a href="{{ route('login') }}" class="flex bg-gray-500 hover:bg-gray-700 p-1 rounded-full items-center justify-center group transition-all duration-500">
                        <div class="w-8 h-8 rounded-full overflow-hidden bg-transparent flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                            </svg>
                        </div>
                        <span
                            class="hidden group-hover:inline-block text-white pr-4 transition-opacity duration-300 opacity-0 group-hover:opacity-100 transform group-hover:translate-x-2">
                            Login
                        </span>
                    </a>
                    @endif

                    <a href="{{ route('cart.index') }}" class="relative bg-gray-500 hover:bg-gray-700 p-2.5 rounded-full text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.263-12m16.356 0a1.125 1.125 0 0 0-1.119-1.007H5.119a1.125 1.125 0 0 0-1.119 1.007m3.75 4.493h10.5m-8.25 4.5h6m-8.25 4.5h6" />
                        </svg>
                        @if($totalCartItems > 0)
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">
                                {{ $totalCartItems }}
                            </span>
                        @endif
                    </a>

                    <!-- Dark/Light Mode Button -->
                    <button id="theme-toggle" type="button" class="text-white hover:bg-gray-700 bg-gray-500 p-2.5 rounded-full transition-all duration-200">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 transform hover:scale-125" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 transform hover:scale-125" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                </div>

                <!-- Hamburger Menu -->
                <button @click="open = !open" class="block md:hidden text-gray-200 focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path :class="{ 'hidden': open, 'block': !open }" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        <path :class="{ 'hidden': !open, 'block': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden bg-gray-100 dark:bg-gray-800">
        <a href="{{ route('home') }}"
           class="block px-4 py-2 rounded-md transition
                  {{ request()->routeIs('home') ? 'bg-[#001147] text-gray-100 font-semibold' : 'text-gray-800 dark:text-gray-200 hover:bg-indigo-300 dark:hover:bg-blue-800' }}">
            Home
        </a>
        <a href="{{ route('products.index') }}"
           class="block px-4 py-2 rounded-md transition
                  {{ request()->routeIs('products.index') ? 'bg-[#001147] text-gray-100 font-semibold' : 'text-gray-800 dark:text-gray-200 hover:bg-indigo-300 dark:hover:bg-blue-800' }}">
            Products
        </a>
        <a href="{#"
           class="block px-4 py-2 rounded-md transition
                  {{ request()->routeIs('admin.categories') ? 'bg-[#001147] text-gray-100 font-semibold' : 'text-gray-800 dark:text-gray-200 hover:bg-indigo-300 dark:hover:bg-blue-800' }}">
            Categories
        </a>
        <hr class="mr-2 ml-2 mt-0.5 mb-0.5 bg-gray-600 dark:bg-gray-900">
        <div class="flex items-center justify-between px-4 py-2">
            <label for="mobile-theme-toggle" class="flex items-center justify-between w-full text-gray-100 cursor-pointer">
                <span class="text-gray-800 dark:text-gray-200">Light/Dark Theme</span>
                <div class="relative flex items-center">
                    <input type="checkbox" id="mobile-theme-toggle" class="sr-only peer">
                    <!-- Toggle Background -->
                    <div class="w-11 h-6 bg-gray-700 items-center justify-center peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-gray-500 dark:peer-focus:ring-white rounded-full peer dark:bg-gray-400 peer-checked:bg-fray-600 relative">
                        <span class="absolute inset-y-0 right-0 flex items-center justify-center text-yellow-500 transition-all peer-checked:translate-x-full">
                            <svg id="theme-toggle-dark-icon" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </span>
                        <span class="absolute inset-y-0 left-0 flex items-center justify-center text-orange-700 transition-all peer-checked:translate-x-0">
                            <svg id="theme-toggle-light-icon" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-gray-800 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white dark:after:bg-gray-700 after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600">
                    </div>
                </div>
            </label>
        </div>
        @if(Auth::check())
        <a href="{{ route('profile.edit') }}"
           class="block px-4 py-2 rounded-md transition
                  {{ request()->routeIs('profile.edit') ? 'bg-[#001147] text-gray-100 font-semibold' : 'text-gray-800 dark:text-gray-200 hover:bg-indigo-300 dark:hover:bg-blue-800' }}">
            Profile
        </a>
        <a href="{{ route('cart.index') }}"
            class="block px-4 py-2 rounded-md transition
            {{ request()->routeIs('profile.edit') ? 'bg-[#001147] text-gray-100 font-semibold' : 'text-gray-800 dark:text-gray-200 hover:bg-indigo-300 dark:hover:bg-blue-800' }}">
            Cart
        </a>
        <form method="POST" action="{{ route('logout') }}" class="block">
            @csrf
            <button type="submit"
                    class="w-full text-left px-4 py-2 rounded-md transition
                           text-gray-800 dark:text-gray-200 hover:bg-red-100 dark:hover:bg-red-800">
                Log Out
            </button>
        </form>
        @else
        <a href="{{ route('login') }}"
           class="block px-4 py-2 rounded-md transition
                  {{ request()->routeIs('login') ? 'bg-[#001147] text-gray-100 font-semibold' : 'text-gray-800 dark:text-gray-200 hover:bg-indigo-300 dark:hover:bg-blue-800' }}">
            Login
        </a>
        @endif
    </div>
</nav>