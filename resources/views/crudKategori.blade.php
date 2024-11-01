<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Daftar Kategori</h1>
        <!-- Pesan sukses -->
        @if (session('success'))
            <div class="bg-green-500 text-white font-bold py-2 px-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol tambah kategori -->
        <div class="flex mb-4">
            <button onclick="openModal('addModal')" class="bg-blue-500 text-white font-bold px-4 py-2 rounded-full">
                Tambah Kategori
            </button>
        </div>

        <!-- Tabel kategori -->
        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-6 bg-gray-200 text-left text-xs font-bold uppercase text-gray-600">No</th>
                        <th class="py-2 px-6 bg-gray-200 text-left text-xs font-bold uppercase text-gray-600">Judul Kategori</th>
                        <th class="py-2 px-6 bg-gray-200 text-left text-xs font-bold uppercase text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $key => $item)
                        <tr>
                            <td class="py-2 px-6 border-b border-gray-200">{{ $key + 1 }}</td>
                            <td class="py-2 px-6 border-b border-gray-200">{{ $item->judul }}</td>
                            <td class="py-2 px-6 border-b border-gray-200">
                                <button onclick="openModal('editModal', '{{ $item->KategoriID }}', '{{ $item->judul }}')" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                    Edit
                                </button>
                                <form action="{{ route('kategori.destroy', $item->KategoriID) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Kategori -->
    <div id="addModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Tambah Kategori</h2>
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul Kategori</label>
                    <input type="text" id="judul" name="judul" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal('addModal')" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Kategori -->
    <div id="editModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Edit Kategori</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="editJudul" class="block text-sm font-medium text-gray-700">Judul Kategori</label>
                    <input type="text" id="editJudul" name="judul" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal('editModal')" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId, KategoriID = null, judul = null) {
            document.getElementById(modalId).classList.remove('hidden');

            if (modalId === 'editModal' && KategoriID && judul) {
                // Update form action URL and populate the input field
                document.getElementById('editForm').action = `/kategori/${KategoriID}`;
                document.getElementById('editJudul').value = judul;
            }
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</x-app-layout>
