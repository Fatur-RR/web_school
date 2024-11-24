<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>{{ $config['apk_name'] }}</title>
    <link rel="icon" href="{{ asset('storage/'.$config['logo'])}}">

</head>
<body>

<div class="bg-white">
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <!-- Menu Links for large screens only -->
            <div class="hidden lg:flex lg:flex-1">
                <div class="flex gap-x-11">
                    <a href="{{ route('welcome') }}" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
                    <a href="{{ route('informasi') }}" class="text-sm font-semibold leading-6 text-gray-900">Informasi</a>
                    <a href="{{ route('agenda') }}" class="text-sm font-semibold leading-6 text-gray-900">Agenda</a>
                    <a href="{{ route('album') }}" class="text-sm font-semibold leading-6 text-gray-900">Album</a>
                    <a href="{{ route('gallery') }}" class="text-sm font-semibold leading-6 text-gray-900">Gallery</a>
                </div>
            </div>

            <!-- Hamburger menu button for mobile -->
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" id="mobile-menu-button">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Logo in center for all screen sizes -->
            <div class="flex justify-center items-center flex-1">
                <a href="{{ route('welcome') }}" class="-m-1.5 p-1.5 flex items-center">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="{{ asset('storage/'.$config['logo'])}}" alt="Logo">
                    <span class="ml-3 text-lg font-bold">{{ $config['apk_name'] }}</span>
                </a>
            </div>

            <!-- Login/Register and Search for large screens -->
            <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900">Dashboard<span aria-hidden="true">&rarr;</span></a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Log in<span aria-hidden="true">&rarr;</span></a>
                    @endauth
                @endif
            </div>
        </nav>

        <!-- Mobile menu -->
        <div class="lg:hidden hidden" id="mobile-menu">
            <div class="space-y-2 px-6 py-3 bg-gray-50">
                <a href="{{ route('welcome') }}" class="block text-base font-semibold text-gray-900">Home</a>
                <a href="{{ route('informasi') }}" class="block text-base font-semibold text-gray-900">Informasi</a>
                <a href="{{ route('agenda') }}" class="block text-base font-semibold text-gray-900">Agenda</a>
                <a href="{{ route('album') }}" class="block text-base font-semibold text-gray-900">Album</a>
                <a href="{{ route('gallery') }}" class="block text-base font-semibold text-gray-900">Gallery</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block text-base font-semibold text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block text-base font-semibold text-gray-900">Log in</a>
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 text-center">
            <h1 class="text-4xl font-serif tracking-tight text-gray-900 sm:text-6xl">Kumpulan Informasi</h1>
            <p class="mt-6 text-lg leading-8 text-gray-600">{{ $config['informasi_teks'] }}</p>

            <form class="mt-8 space-y-4" id="searchForm">
                <input class="w-full px-6 py-4 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:border-indigo-500 transition-all duration-300" 
                       type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Cari informasi..."
                       oninput="submitForm()">
                
                <select name="kategori" 
                        class="w-full px-6 py-4 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:border-indigo-500 transition-all duration-300"
                        onchange="submitForm()">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->KategoriID }}" {{ $selectedKategori == $kategori->KategoriID ? 'selected' : '' }}>
                            {{ $kategori->judul }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($informasis as $post)
            <div class="bg-white shadow-lg rounded-lg p-4 mb-6 max-w-md mx-auto transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-gray-100 hover:border hover:border-indigo-500 cursor-pointer" onclick="openModal('detailModal{{ $post->id }}')">
                <h2 class="text-xl font-bold mb-2 break-words">{{ $post->judul }}</h2>
                <img class="w-full h-auto rounded-lg mb-4" src="{{ asset('storage/' . $post->file) }}" alt="Gambar untuk {{ $post->judul }}">
                <p class="text-gray-700 mb-2 break-words line-clamp-3">{{ $post->isi }}</p>
                <p class="text-gray-700 mb-2">Status: {{ $post->status }}</p>
                <p class="text-gray-700 mb-2">Dibuat pada: {{ $post->created_at->format('d-m-Y H:i') }}</p>
            </div>

            <!-- Modal Detail Informasi -->
            <div id="detailModal{{ $post->id }}" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 p-4 z-50">
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-lg w-full max-w-4xl mx-auto overflow-y-auto max-h-[90vh]">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl md:text-3xl font-bold">{{ $post->judul }}</h2>
                        <button onclick="closeModal('detailModal{{ $post->id }}')" class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <img class="w-full h-auto rounded-lg mb-4" src="{{ asset('storage/' . $post->file) }}" alt="Gambar untuk {{ $post->judul }}">
                    <div class="space-y-4">
                        <p class="text-gray-700 text-lg">{{ $post->isi }}</p>
                        <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                            <p>Status: {{ $post->status }}</p>
                            <p>Dibuat pada: {{ $post->created_at->format('d-m-Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

</body>
<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.getElementById(modalId).classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.getElementById(modalId).classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    let timeout = null;
    function submitForm() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const form = document.getElementById('searchForm');
            const formData = new FormData(form);
            const params = new URLSearchParams(formData);
            window.location.href = "{{ route('informasi') }}?" + params.toString();
        }, 500);
    }
</script>
</html>
