<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <style type="text/tailwindcss">
            @layer utilities {
                .content-auto {
                    content-visibility: auto;
                }
            }

            /* Atur lebar dan tinggi card */

        </style>


        <title>{{ $config['apk_name'] }}</title>
        <link rel="icon" href="{{ asset('storage/'.$config['logo'])}}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
                </div>
            </div>
        </header>

        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 text-center">
                <h1 class="text-4xl font-serif tracking-tight text-gray-900 sm:text-6xl">Kumpulan Foto</h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">{{ $config['gallery_teks'] }}</p>
                <form class="mt-8" method="GET" action="{{ route('gallery') }}">
                    <input class="w-full px-6 py-4 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:border-indigo-500 transition-all duration-300" type="text" name="search" value="{{ request('search') }}" placeholder="Cari foto...">
                </form>
            </div>

        </div>
        <div class="container mx-auto my-10 p-4">
            <div class="text-center">
                <h2 class="text-4xl font-serif tracking-tight text-gray-900 sm:text-4xl mb-8">Foto</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($fotos->sortByDesc('created_at') as $foto)
                    <div class="relative group w-full h-64 shadow-lg rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $foto->file) }}" alt="{{ $foto->judul }}"
                             class="w-full h-full object-cover object-top rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 rounded-lg p-4 transition-opacity duration-300">
                            <h2 class="text-xl font-bold text-white">{{ $foto->judul }}</h2>
                            <p class="text-white mt-2">{{ $foto->created_at }}</p>
                            <!-- Tombol Detail -->
                            <button onclick="openDetailModal('{{ $foto->judul }}', '{{ asset('storage/' . $foto->file) }}', '{{ $foto->deskripsi }}', '{{ $foto->created_at }}', '{{ $foto->album->Nama ?? 'Tidak ada album' }}')"
                                    class="mt-4 bg-indigo-600 text-white rounded-lg py-2 px-4 hover:bg-indigo-700 transition duration-200">
                                Detail
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Modal Detail Foto -->
            <div id="detail-modal" class="fixed inset-0 hidden bg-gray-900 bg-opacity-75 z-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg max-w-lg w-full">
                    <h2 id="modal-title" class="text-2xl font-bold mb-4"></h2>
                    <div class="flex justify-center">
                        <img id="modal-image" class="w-full h-auto max-h-96 object-contain rounded-lg mb-4" src="" alt="">
                    </div>
                    <p id="modal-description" class="text-gray-600 mb-4"></p>
                    <p id="modal-date" class="text-gray-500 text-sm mb-4"></p>
                    <p id="modal-album" class="text-gray-500 text-sm mb-4"></p>
                    <button onclick="closeDetailModal()"
                            class="mt-4 bg-indigo-600 text-white rounded-lg py-2 px-4 hover:bg-indigo-700 transition duration-200">
                        Tutup
                    </button>
                </div>
            </div>

        </div>
    </div>

</body>
<script>
function openDetailModal(judul, file, deskripsi, tanggal, albumNama) {
    const modal = document.getElementById('detail-modal');
    const modalTitle = document.getElementById('modal-title');
    const modalImage = document.getElementById('modal-image');
    const modalDescription = document.getElementById('modal-description');
    const modalDate = document.getElementById('modal-date');
    const modalAlbum = document.getElementById('modal-album');

    // Set konten modal
    modalTitle.textContent = judul;
    modalImage.src = file;
    modalDescription.textContent = deskripsi || 'Tidak ada deskripsi';
    modalDate.textContent = `Uploaded on: ${new Date(tanggal).toLocaleDateString()}`;
    modalAlbum.textContent = `Album: ${albumNama}`;

    // Tampilkan modal
    modal.classList.remove('hidden');
}

function closeDetailModal() {
    const modal = document.getElementById('detail-modal');
    modal.classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('detail-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDetailModal();
    }
});

// Mobile menu functionality
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});
</script>
</html>
