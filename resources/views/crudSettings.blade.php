<x-app-layout>
<form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto p-4 bg-white shadow rounded-lg">
    @csrf
    @method('PUT')

    <div class="form-group mb-4">
        <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
        <input type="file" name="logo" id="logo" class="mt-1 block w-full pl-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        @if ($settings['logo'])
            <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" width="150" class="mt-2">
        @endif
    </div>

    <div class="form-group mb-4">
        <label for="apk_name" class="block text-sm font-medium text-gray-700">Nama Aplikasi</label>
        <input type="text" name="apk_name" id="apk_name" value="{{ $settings['apk_name'] ?? '' }}" class="mt-1 block w-full pl-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="form-group mb-4">
        <label for="welcome_teks" class="block text-sm font-medium text-gray-700">Teks Selamat Datang</label>
        <input type="text" name="welcome_teks" id="welcome_teks" value="{{ $settings['welcome_teks'] ?? '' }}" class="mt-1 block w-full pl-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="form-group mb-4">
        <label for="informasi_teks" class="block text-sm font-medium text-gray-700">Teks Informasi</label>
        <input type="text" name="informasi_teks" id="informasi_teks" value="{{ $settings['informasi_teks'] ?? '' }}" class="mt-1 block w-full pl-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="form-group mb-4">
        <label for="agenda_teks" class="block text-sm font-medium text-gray-700">Teks Agenda</label>
        <input type="text" name="agenda_teks" id="agenda_teks" value="{{ $settings['agenda_teks'] ?? '' }}" class="mt-1 block w-full pl-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="form-group mb-4">
        <label for="album_teks" class="block text-sm font-medium text-gray-700">Teks Album</label>
        <input type="text" name="album_teks" id="album_teks" value="{{ $settings['album_teks'] ?? '' }}" class="mt-1 block w-full pl-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="form-group mb-4">
        <label for="gallery_teks" class="block text-sm font-medium text-gray-700">Teks Galeri</label>
        <input type="text" name="gallery_teks" id="gallery_teks" value="{{ $settings['gallery_teks'] ?? '' }}" class="mt-1 block w-full pl-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Simpan Pengaturan</button>
</form>

</x-app-layout>
