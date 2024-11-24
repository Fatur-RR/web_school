<div class="flex min-h-screen bg-gray-100" x-data="{ sidebarOpen: false }">
    <!-- Sidebar -->
    <aside class="bg-gray-800 text-white w-64 min-h-full fixed md:relative transition-all duration-300 ease-in-out flex flex-col"
           :class="{'translate-x-0': sidebarOpen, '-translate-x-full md:translate-x-0': !sidebarOpen}">

        <!-- Logo Section -->
        <div class="flex items-center justify-between h-16 px-4 bg-gray-900">
            <div class="flex items-center">
                <a href="{{ route('welcome') }}" class="flex items-center">
                    <img src="{{ asset('storage/'.$config['logo'])}}"
                         alt="Logo SMKN 4 Bogor"
                         class="w-10 h-10 transform hover:scale-110 transition-transform duration-200">
                    <span class="ml-2 text-lg font-semibold">SMKN 4 Bogor</span>
                </a>
            </div>
            <!-- Close button for mobile -->
            <button @click="sidebarOpen = false" class="md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto bg-gray-800">
            <ul class="flex flex-col space-y-2">
                <li>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center justify-start bg-gray-700 w-full p-3 rounded-lg hover:bg-gray-600 transition duration-150 ease-in-out shadow-md hover:shadow-lg h-14">
                        <svg class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h18M3 17h18m-9-6h9M3 7h18"></path>
                        </svg>
                        <span class="font-medium text-white">{{ __('Dashboard') }}</span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="flex items-center justify-start bg-gray-700 w-full p-3 rounded-lg hover:bg-gray-600 transition duration-150 ease-in-out shadow-md hover:shadow-lg h-14">
                        <svg class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"></path>
                        </svg>
                        <span class="font-medium text-white">{{ __('Profile') }}</span>
                    </x-nav-link>
                </li>

                <!-- Tambahkan setelah menu Profile -->

                <li>
                    <x-nav-link :href="route('kategori.index')" :active="request()->routeIs('kategori.*')" class="flex items-center justify-start bg-gray-700 w-full p-3 rounded-lg hover:bg-gray-600 transition duration-150 ease-in-out shadow-md hover:shadow-lg h-14">
                        <svg class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18a1 1 0 011 1v10a1 1 0 01-1 1H3a1 1 0 01-1-1V8a1 1 0 011-1zM3 7V4a1 1 0 011-1h5l2 3h8a1 1 0 011 1v3"/>
                        </svg>
                        <span class="font-medium text-white">{{ __('Kategori') }}</span>
                        <span class="ml-auto text-white font-bold"></span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('album.index')" :active="request()->routeIs('album.*')" class="flex items-center justify-start bg-gray-700 w-full p-3 rounded-lg hover:bg-gray-600 transition duration-150 ease-in-out shadow-md hover:shadow-lg h-14">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-3 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm1 2v14h18V5H4zm2 2h14v10H6V7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7v10m4-10v10m4-10v10" />
                        </svg>
                        <span class="font-medium text-white">{{ __('Album') }}</span>
                        <span class="ml-auto text-white font-bold"></span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('foto.index')" :active="request()->routeIs('foto.*')" class="flex items-center justify-start bg-gray-700 w-full p-3 rounded-lg hover:bg-gray-600 transition duration-150 ease-in-out shadow-md hover:shadow-lg h-14">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-3 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="font-medium text-white">{{ __('Foto') }}</span>
                        <span class="ml-auto text-white font-bold"></span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('informasi.index')" :active="request()->routeIs('informasi.*')" class="flex items-center justify-start bg-gray-700 w-full p-3 rounded-lg hover:bg-gray-600 transition duration-150 ease-in-out shadow-md hover:shadow-lg h-14">
                        <svg class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12v6m0-8h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                        </svg>
                        <span class="font-medium text-white">{{ __('Informasi') }}</span>
                        <span class="ml-auto text-white font-bold"></span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('agenda.index')" :active="request()->routeIs('agenda.*')" class="flex items-center justify-start bg-gray-700 w-full p-3 rounded-lg hover:bg-gray-600 transition duration-150 ease-in-out shadow-md hover:shadow-lg h-14">
                        <svg class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8h18M3 12h18m-6 8H9m6 0V8m-4 4h4m-4 0h4"/>
                            <rect x="3" y="4" width="18" height="16" rx="2" ry="2" stroke-width="2"/>
                            <path d="M7 2v2m10-2v2m-4 0h4m-10 0H7"/>
                        </svg>
                        <span class="font-medium text-white">{{ __('Agenda') }}</span>
                        <span class="ml-auto text-white font-bold"></span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('settings.index')" :active="request()->routeIs('settings')" class="flex items-center justify-start bg-gray-700 w-full p-3 rounded-lg hover:bg-gray-600 transition duration-150 ease-in-out shadow-md hover:shadow-lg h-14">
                        <svg class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m-2 4a2 2 0 110-4m2 4v2m0-6V4"></path>
                        </svg>
                        <span class="font-medium text-white">{{ __('Settings') }}</span>
                    </x-nav-link>
                </li>

            </ul>
        </nav>

        <!-- User Info - Now positioned at bottom -->
        <div class="px-4 py-2 border-t border-gray-700 mt-auto bg-gray-800">
            <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="text-red-400 hover:text-red-600 block w-full">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
    </aside>

    <!-- Mobile Menu Button -->
    <div class="fixed top-4 left-4 z-40 md:hidden"
    x-show="!sidebarOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90">
   <button @click="sidebarOpen = !sidebarOpen"
           class="p-2 text-gray-700 bg-white rounded-md shadow-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
           <path stroke-linecap="round"
                 stroke-linejoin="round"
                 stroke-width="2"
                 d="M4 6h16M4 12h16M4 18h16"/>
       </svg>
   </button>
</div>

    <!-- Add an overlay div for mobile -->


    <!-- Main Content -->

</div>
