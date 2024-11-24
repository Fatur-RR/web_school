<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Manajemen Informasi</h1>

        <!-- Pesan sukses -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah Informasi (Membuka Modal) -->
        <div class="mb-6">
            <button onclick="openModal('createModal')" class="bg-blue-500 text-white font-bold px-4 py-2 rounded-full">
                Tambah Informasi
            </button>
        </div>
        <div class="mt-4 mb-4">
            <form class="mt-8" method="GET" action="{{ route('informasi.index') }}">
                <input class="w-full px-6 py-4 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:border-indigo-500 transition-all duration-300" type="text" name="search" value="{{ request('search') }}" placeholder="Cari informasi...">
            </form>
        </div>

        <!-- Tabel Data Informasi -->
        <div class="overflow-x-auto">
           <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
    @foreach($informasi as $key => $item)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
            <!-- Card Image -->
            <div class="w-full h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $item->file) }}"
                     alt="{{ $item->judul }}"
                     class="w-full h-full object-cover">
            </div>

            <!-- Card Content -->
            <div class="p-4">
                <!-- Kategori & Status -->
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-600">
                        {{ $item->kategori->judul ?? 'Tidak ada kategori' }}
                    </span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full
                        {{ $item->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </div>

                <!-- Judul -->
                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->judul }}</h3>

                <!-- Ringkasan -->
                <p class="text-sm text-gray-600 mb-2 line-clamp-2">{{ $item->ringkasan }}</p>

                <!-- Isi -->
                <p class="text-sm text-gray-500 mb-4 line-clamp-3">{{ $item->isi }}</p>

                <!-- Action Buttons -->
                <div class="flex space-x-2 mt-auto">
                    <button
                        onclick="openEditModal({{ $item->id }}, {{ json_encode($item->judul) }}, {{ json_encode($item->ringkasan) }}, {{ $item->KategoriID }}, '{{ $item->status }}', '{{ $item->isi }}')"
                        class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                        Edit
                    </button>

                    <form action="{{ route('informasi.destroy', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi ini?');"
                          class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
        </div>






        <!-- Modal untuk Tambah Informasi -->
     <!-- Modal untuk Tambah Informasi -->
     <div id="createModal" class="fixed inset-0 flex items-center justify-center z-50 hidden px-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md md:max-w-lg lg:max-w-xl p-4 md:p-6 mx-auto">
            <h2 class="text-xl md:text-2xl font-bold mb-4">Tambah Informasi</h2>
            <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block text-sm md:text-base font-medium text-gray-700">Judul</label>
                    <input type="text" name="judul" id="judul" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 text-sm md:text-base p-2">
                </div>

                <div class="mb-4">
                    <label for="ringkasan" class="block text-sm md:text-base font-medium text-gray-700">Ringkasan</label>
                    <textarea name="ringkasan" id="ringkasan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 text-sm md:text-base p-2"></textarea>
                </div>

                <div class="mb-4">
                    <label for="isi" class="block text-sm md:text-base font-medium text-gray-700">Isi</label>
                    <textarea name="isi" id="isi" rows="8" required class="mt-1 block w-full h-32 md:h-48 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 text-sm md:text-base p-2"></textarea>
                </div>

                <div class="mb-4">
                    <label for="KategoriID" class="block text-sm md:text-base font-medium text-gray-700">Kategori</label>
                    <select name="KategoriID" id="KategoriID" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 text-sm md:text-base p-2">
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->KategoriID }}">{{ $kat->judul }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700">File (Gambar)</label>
                    <input type="file" name="file" id="file" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="button" onclick="closeModal('createModal')" class="mr-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>






<!-- Modal untuk Edit Informasi -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center z-50 hidden px-4">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Modal Content -->
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md md:max-w-lg lg:max-w-xl relative p-4 md:p-6 max-h-[90vh] overflow-y-auto">
        <h2 class="text-xl md:text-2xl font-bold mb-4">Edit Informasi</h2>

        <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="edit_id">

            <!-- Judul -->
            <div>
                <label for="edit_judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text"
                       name="judul"
                       id="edit_judul"
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Ringkasan -->
            <div>
                <label for="edit_ringkasan" class="block text-sm font-medium text-gray-700 mb-1">Ringkasan</label>
                <textarea name="ringkasan"
                          id="edit_ringkasan"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          rows="3"></textarea>
            </div>

            <!-- Isi -->
            <div>
                <label for="edit_isi" class="block text-sm font-medium text-gray-700 mb-1">Isi</label>
                <textarea name="isi"
                          id="edit_isi"
                          required
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          rows="6"></textarea>
            </div>

            <!-- Kategori -->
            <div>
                <label for="edit_KategoriID" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="KategoriID"
                        id="edit_KategoriID"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->KategoriID }}">{{ $kat->judul }}</option>
                    @endforeach
                </select>
            </div>

            <!-- File Upload -->
            <div>
                <label for="edit_file" class="block text-sm font-medium text-gray-700 mb-1">File (Gambar)</label>
                <input type="file"
                       name="file"
                       id="edit_file"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Status -->
            <div>
                <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status"
                        id="edit_status"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-2 pt-4">
                <button type="button"
                        onclick="closeModal('editModal')"
                        class="w-full sm:w-auto bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                    Batal
                </button>
                <button type="submit"
                        class="w-full sm:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    function openEditModal(id, judul, ringkasan, kategoriId, status, isi) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_judul').value = judul;
    document.getElementById('edit_ringkasan').value = ringkasan;
    document.getElementById('edit_isi').value = isi;
    document.getElementById('edit_KategoriID').value = kategoriId;
    document.getElementById('edit_status').value = status;

    // Set action untuk formulir edit
    document.getElementById('editForm').action = '{{ route("informasi.update", "") }}' + '/' + id;

    openModal('editModal');
}

</script>


</x-app-layout>
