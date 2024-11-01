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

        <!-- Tabel Data Informasi -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border-collapse border border-gray-300 shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">No</th>
                        <th class="border border-gray-300 py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Kategori</th>
                        <th class="border border-gray-300 py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Judul</th>
                        <th class="border border-gray-300 py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Isi</th>
                        <th class="border border-gray-300 py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">File</th>
                        <th class="border border-gray-300 py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider hidden md:table-cell">Ringkasan</th>
                        <th class="border border-gray-300 py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider hidden md:table-cell">Status</th>
                        <th class="border border-gray-300 py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($informasi as $key => $item)
                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                            <td class="border border-gray-300 py-4 px-6 text-sm text-gray-600">{{ $key + 1 }}</td>
                            <td class="border border-gray-300 py-4 px-6 text-sm text-gray-600">{{ $item->kategori->judul ?? 'Tidak ada kategori' }}</td>
                            <td class="border border-gray-300 py-4 px-6 text-sm text-gray-600">{{ $item->judul }}</td>
                            <td class="border border-gray-300 py-4 px-6 text-sm text-gray-600 truncate" style="max-width: 200px;">{{ $item->isi }}</td>
                            <td class="border border-gray-300 py-4 px-6">
                                <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}" class="w-20 h-auto object-cover rounded shadow-sm">
                            </td>
                            <td class="border border-gray-300 py-4 px-6 text-sm text-gray-600 hidden md:table-cell">{{ $item->ringkasan }}</td>
                            <td class="border border-gray-300 py-4 px-6 hidden md:table-cell">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="border border-gray-300 py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <!-- Tombol Edit -->
                                    <button onclick="openEditModal({{ $item->id }}, {{ json_encode($item->judul) }}, {{ json_encode($item->ringkasan) }}, {{ $item->KategoriID }}, '{{ $item->status }}', '{{ $item->isi }}')"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded transition duration-150 ease-in-out">
                                        Edit
                                    </button>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('informasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded transition duration-150 ease-in-out">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>






        <!-- Modal untuk Tambah Informasi -->
     <!-- Modal untuk Tambah Informasi -->
     <div id="createModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
            <h2 class="text-2xl font-bold mb-4">Tambah Informasi</h2>
            <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="judul" id="judul" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="ringkasan" class="block text-sm font-medium text-gray-700">Ringkasan</label>
                    <textarea name="ringkasan" id="ringkasan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"></textarea>
                </div>

                <div class="mb-4">
                    <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
                    <textarea name="isi" id="isi" rows="8" required class="mt-1 block w-full h-48 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"></textarea>
                </div>

                <div class="mb-4">
                    <label for="KategoriID" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="KategoriID" id="KategoriID" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
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
<div id="editModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Informasi</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="edit_id">

            <div class="mb-4">
                <label for="edit_judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="edit_judul" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="edit_ringkasan" class="block text-sm font-medium text-gray-700">Ringkasan</label>
                <textarea name="ringkasan" id="edit_ringkasan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"></textarea>
            </div>

            <div class="mb-4">
                <label for="edit_isi" class="block text-sm font-medium text-gray-700">Isi</label>
                <textarea name="isi" id="edit_isi" rows="8" required class="mt-1 block w-full h-48 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"></textarea>
            </div>

            <div class="mb-4">
                <label for="edit_KategoriID" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="KategoriID" id="edit_KategoriID" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->KategoriID }}">{{ $kat->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="edit_file" class="block text-sm font-medium text-gray-700">File (Gambar)</label>
                <input type="file" name="file" id="edit_file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="edit_status" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="button" onclick="closeModal('editModal')" class="mr-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Perbarui</button>
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
    document.getElementById('editForm').action = `/informasi/${id}`;

    openModal('editModal');
}

</script>


</x-app-layout>
