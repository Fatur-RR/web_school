<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Daftar Agenda</h1>
        <!-- Pesan sukses -->
        @if (session('success'))
            <div class="bg-green-500 text-white font-bold py-2 px-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol tambah agenda -->
        <div class="flex mb-4">
            <button onclick="toggleModal('modalTambah')" class="bg-blue-500 text-white font-bold px-4 py-2 rounded-full">
                Tambah Agenda
            </button>
        </div>

        <div class="mt-4 mb-4">
            <form class="mt-8" method="GET" action="{{ route('agenda.index') }}">
                <input class="w-full px-6 py-4 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:border-indigo-500 transition-all duration-300" type="text" name="search" value="{{ request('search') }}" placeholder="Cari agenda...">
            </form>
        </div>

        <!-- Tabel agenda -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($agendas as $key => $agenda)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500">#{{ $key + 1 }}</span>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $agenda->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($agenda->status) }}
                            </span>
                        </div>

                        <h3 class="text-xl font-semibold mb-2">{{ $agenda->judul }}</h3>

                        <div class="mb-4">
                            <p class="text-gray-600 mb-2">{{ $agenda->isi }}</p>
                            <p class="text-sm text-gray-500">
                                Kategori: {{ $agenda->kategori->judul ?? 'Tidak ada Kategori' }}
                            </p>
                        </div>

                        <div class="flex space-x-2">
                            <a href="#" onclick="openEditModal({{ json_encode($agenda) }})"
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

   <!-- Modal Tambah -->
<div id="modalTambah" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded shadow-md p-6 w-11/12 md:w-1/2">
        <h2 class="text-lg font-bold mb-4">Tambah Agenda</h2>
        <form action="{{ route('agenda.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="KategoriID" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="KategoriID" id="KategoriID" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->KategoriID }}">{{ $kategori->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
                <textarea name="isi" id="isi" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required></textarea>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="flex justify-end">
                <button type="button" onclick="toggleModal('modalTambah')" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>




<!-- Modal Edit -->
<!-- Modal Edit -->
<div id="modalEdit" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded shadow-md p-6 w-11/12 md:w-1/2">
        <h2 class="text-lg font-bold mb-4">Edit Agenda</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan PUT untuk pembaruan -->

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> <!-- Mengisi ID user yang sesuai -->

            <div class="mb-4">
                <label for="editKategoriID" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="KategoriID" id="editKategoriID" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->KategoriID }}">{{ $kategori->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="editJudul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="editJudul" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="editIsi" class="block text-sm font-medium text-gray-700">Isi</label>
                <textarea name="isi" id="editIsi" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required></textarea>
            </div>

            <div class="mb-4">
                <label for="editStatus" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="editStatus" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="button" onclick="toggleModal('modalEdit')" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Perbarui</button>
            </div>
        </form>
    </div>
</div>




<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }

    function openEditModal(agenda) {
    // Mengisi form edit dengan data agenda
    document.getElementById('editForm').action = '{{ route("agenda.update", "") }}' + '/' + agenda.id; // Pastikan ini sesuai dengan rute yang terdaftar
    document.getElementById('editKategoriID').value = agenda.KategoriID;
    document.getElementById('editJudul').value = agenda.judul;
    document.getElementById('editIsi').value = agenda.isi;
    document.getElementById('editStatus').value = agenda.status;

    toggleModal('modalEdit'); // Menampilkan modal edit
}
</script>

</x-app-layout>
