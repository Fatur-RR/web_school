<x-app-layout>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Daftar Foto</h1>

        <div class="mt-4 mb-4">
            <form class="mt-8" method="GET" action="{{ route('foto.index') }}">
                <input class="w-full px-6 py-4 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:border-indigo-500 transition-all duration-300" type="text" name="search" value="{{ request('search') }}" placeholder="Cari album...">
            </form>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif


        <!-- Modal untuk edit foto -->
        <div id="editPhotoModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md max-h-screen overflow-auto">
                <h2 class="text-xl font-semibold mb-4">Edit Foto</h2>
                <form id="editPhotoForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Menggunakan method PUT untuk update -->

                    <!-- Gambar saat ini -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Foto Saat Ini</label>
                        <img id="currentPhoto" src="" alt="Foto Saat Ini" class="w-full h-auto object-cover rounded shadow-md mb-4">
                    </div>

                    <div class="mb-4">
                        <label for="edit_judul" class="block text-gray-700">Judul</label>
                        <input type="text" name="judul" id="edit_judul" class="w-full p-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="edit_deskripsi" class="block text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="edit_deskripsi" class="w-full p-2 border rounded-lg" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="edit_AlbumID" class="block text-gray-700">Album</label>
                        <select name="AlbumID" id="edit_AlbumID" class="w-full p-2 border rounded-lg" required>
                            <option value="" disabled selected>Pilih Album</option>
                            @foreach ($albums as $album)
                                <option value="{{ $album->AlbumID }}">{{ $album->AlbumID }} - {{ $album->Nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="edit_file" class="block text-gray-700">Pilih File (opsional)</label>
                        <input type="file" name="file" id="edit_file" class="w-full p-2 border rounded-lg">
                        <p class="text-sm text-gray-600 mt-2">File saat ini: <span id="currentFile"></span></p> <!-- Menampilkan file saat ini -->
                    </div>

                    <div class="flex justify-end">
                        <button type="button" id="closeEditModal" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>




        <!-- Tombol untuk membuka modal tambah foto -->
        <button id="openModal" class="bg-blue-500 text-white font-bold px-4 py-2 rounded-full">Tambah Foto</button>

        <!-- Modal untuk tambah foto -->
        <div id="addPhotoModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Tambah Foto</h2>
                <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul" class="w-full p-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="w-full p-2 border rounded-lg" required></textarea>
                    </div>

                    <div class="mb-4">
    <label for="AlbumID" class="block text-gray-700">Album</label>
    <select name="AlbumID" id="AlbumID" class="w-full p-2 border rounded-lg" required>
        <option value="" disabled selected>Pilih Album</option>
        @foreach ($albums as $album)
            <option value="{{ $album->AlbumID }}">{{ $album->AlbumID }} - {{ $album->Nama }}</option>
        @endforeach
    </select>
</div>

                    <div class="mb-4">
                        <label for="file" class="block text-gray-700">Pilih File</label>
                        <input type="file" name="file" id="file" class="w-full p-2 border rounded-lg" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel daftar foto -->
        <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($fotos as $foto)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $foto->file) }}" alt="{{ $foto->judul }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-bold mb-2">{{ $foto->judul }}</h2>
                        <p class="text-gray-600 mb-2">{{ $foto->deskripsi }}</p>
                        <p class="text-gray-700 mb-2">Album: {{ $foto->album->Nama ?? 'Tidak ada Album' }}</p>

                        <div class="flex justify-end space-x-2">
                            <a href="javascript:void(0);" onclick='openEditModal({{ json_encode($foto) }})' class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition duration-150 ease-in-out">Edit</a>
                            <form action="{{ route('foto.destroy', $foto->FotoID) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-150 ease-in-out" onclick="return confirm('Anda yakin ingin menghapus foto ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    </div>

    <script>

         // Mengelola modal
    document.getElementById('openModal').addEventListener('click', function () {
        document.getElementById('addPhotoModal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function () {
        document.getElementById('addPhotoModal').classList.add('hidden');
    });

    // Mengelola modal edit
    function openEditModal(foto) {
    document.getElementById('editPhotoForm').action = `/foto/${foto.FotoID}`; // Sesuaikan dengan URL rute edit
    document.getElementById('edit_judul').value = foto.judul;
    document.getElementById('edit_deskripsi').value = foto.deskripsi;
    document.getElementById('edit_AlbumID').value = foto.AlbumID;

    // Menampilkan file saat ini
    const currentPhotoElement = document.getElementById('currentPhoto');
    currentPhotoElement.src = foto.file ? `/storage/${foto.file}` : ''; // Sesuaikan path jika diperlukan

    // Menampilkan nama file saat ini
    const currentFileElement = document.getElementById('currentFile');
    currentFileElement.innerText = foto.file ? foto.file.split('/').pop() : "Tidak ada file";



    document.getElementById('editPhotoModal').classList.remove('hidden');
}
    document.getElementById('closeEditModal').addEventListener('click', function () {
        document.getElementById('editPhotoModal').classList.add('hidden');
    });

        // Mengelola modal
        document.getElementById('openModal').addEventListener('click', function () {
            document.getElementById('addPhotoModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('addPhotoModal').classList.add('hidden');
        });
    </script>

</x-app-layout>
