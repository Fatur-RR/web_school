<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                        <!-- Menu Item 1: Agenda -->
                        <div class="bg-blue-100 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-2 bg-blue-500 text-white rounded-full">
                                        <i class="fas fa-calendar-alt"></i> <!-- Ganti dengan ikon agenda -->
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold">Agenda</h3>
                                    </div>
                                </div>
                                <div class="text-blue-500 font-bold text-xl">{{ $agendas->count() }}</div> <!-- Angka untuk jumlah agenda -->
                            </div>
                        </div>

                        <!-- Menu Item 2: Album -->
                        <div class="bg-green-100 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-2 bg-green-500 text-white rounded-full">
                                        <i class="fas fa-images"></i> <!-- Ganti dengan ikon album -->
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold">Album</h3>
                                    </div>
                                </div>
                                <div class="text-green-500 font-bold text-xl">{{ $albums->count() }}</div> <!-- Angka untuk jumlah album -->
                            </div>
                        </div>

                        <!-- Menu Item 3: Informasi -->
                        <div class="bg-yellow-100 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-2 bg-yellow-500 text-white rounded-full">
                                        <i class="fas fa-info-circle"></i> <!-- Ganti dengan ikon informasi -->
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold">Informasi</h3>
                                    </div>
                                </div>
                                <div class="text-yellow-500 font-bold text-xl">{{ $informasis->count() }}</div> <!-- Angka untuk jumlah informasi -->
                            </div>
                        </div>

                        <!-- Menu Item 4: Foto -->
                        <div class="bg-red-100 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-2 bg-red-500 text-white rounded-full">
                                        <i class="fas fa-camera"></i> <!-- Ganti dengan ikon foto -->
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold">Foto</h3>
                                    </div>
                                </div>
                                <div class="text-red-500 font-bold text-xl">{{ $fotos->count() }}</div> <!-- Angka untuk jumlah foto -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
