<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold">Daftar Album</h1>

        <!-- Search Bar -->
        <div class="mt-4 mb-4">
            <form class="mt-8" method="GET" action="{{ route('album.index') }}">
                <input class="w-full px-6 py-4 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:border-indigo-500 transition-all duration-300" type="text" name="search" value="{{ request('search') }}" placeholder="Cari album...">
            </form>
        </div>


        <div class="mt-4">
            <button onclick="openModal('create')" class="bg-blue-500 text-white font-bold px-4 py-2 rounded-full">Tambah Album</button>
        </div>

        @if (session('success'))
        <div class="mt-4 p-4 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div id="albumList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
        @foreach ($album as $key => $alb)
            <div class="album-item bg-white border border-gray-300 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                @if ($alb->coverImage)
                    <img src="{{ asset('storage/' . $alb->coverImage->file) }}" alt="{{ $alb->Nama }}" class="h-48 w-full object-cover">
                @else
                    <div class="h-48 w-full bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image Available</span>
                    </div>
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $alb->Nama }}</h2>
                    <p class="text-gray-700 mb-2">{{ $alb->Deskripsi }}</p>
                    <p class="text-gray-600 mb-4">Kategori: {{ $alb->kategori->judul }}</p>
                    <div class="flex justify-end space-x-2">
                        <button onclick="openModal('edit', {{ $alb }})" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded transition duration-200">Edit</button>
                        <form action="{{ route('album.destroy', $alb->AlbumID) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition duration-200">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



        <!-- Modal untuk Tambah Album -->
        <div id="create-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Tambah Album</h2>
                <form id="create-album-form" action="{{ route('album.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="Nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="Nama" id="Nama" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="Deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <input type="text" name="Deskripsi" id="Deskripsi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="KategoriID" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="KategoriID" id="KategoriID" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->KategoriID }}">{{ $kat->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" onclick="closeCreateModal()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2 hover:bg-gray-400 transition duration-200">Batal</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition duration-200">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal untuk Edit Album -->
        <div id="edit-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
                <h2 id="edit-modal-title" class="text-xl font-semibold mb-4">Edit Album</h2>
                <form id="edit-album-form" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="AlbumID" id="edit-album-id" value="">

                    <div class="mb-4">
                        <label for="edit-Nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="Nama" id="edit-Nama" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="edit-Deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <input type="text" name="Deskripsi" id="edit-Deskripsi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="edit-KategoriID" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="KategoriID" id="edit-KategoriID" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->KategoriID }}">{{ $kat->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" onclick="closeEditModal()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2 hover:bg-gray-400 transition duration-200">Batal</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition duration-200">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function openModal(action, album = null) {
            if (action === 'create') {
                document.getElementById('create-modal').classList.remove('hidden');
                document.getElementById('create-album-form').reset();
            } else if (action === 'edit') {
                document.getElementById('edit-modal').classList.remove('hidden');
                document.getElementById('edit-album-form').action = '{{ route("album.update", "") }}' + '/' + album.AlbumID;
                document.getElementById('edit-album-id').value = album.AlbumID;
                document.getElementById('edit-Nama').value = album.Nama;
                document.getElementById('edit-Deskripsi').value = album.Deskripsi;
                document.getElementById('edit-KategoriID').value = album.KategoriID;
            }
        }

        function closeCreateModal() {
            document.getElementById('create-modal').classList.add('hidden');
        }

        function closeEditModal() {
            document.getElementById('edit-modal').classList.add('hidden');
        }



        // Function to search albums
        // function searchAlbums() {
        //     const input = document.getElementById('searchBar');
        //     const filter = input.value.toLowerCase();
        //     const albumList = document.getElementById('albumList');
        //     const albumItems = albumList.getElementsByClassName('album-item');

        //     for (let i = 0; i < albumItems.length; i++) {
        //         const albumName = albumItems[i].getElementsByTagName("h2")[0];
        //         if (albumName) {
        //             const txtValue = albumName.textContent || albumName.innerText;
        //             if (txtValue.toLowerCase().indexOf(filter) > -1) {
        //                 albumItems[i].style.display = "";
        //             } else {
        //                 albumItems[i].style.display = "none";
        //             }
        //         }
        //     }
        // }
    </script>
</x-app-layout>
