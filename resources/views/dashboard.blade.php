<x-app-layout>
    <div class="container mx-auto p-4 sm:p-6 mt-20"> <!-- Increased mt-16 to mt-20 to give more space for nav -->
        <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4">Statistik Penggunaan</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Total Pengunjung -->
            <div class="bg-white p-6 rounded-xl shadow-md ">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-600 text-sm font-medium">Total Pengunjung</h3>
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <p class="text-4xl font-bold text-blue-600 mt-4">{{ $stats['total_visitors'] }}</p>
            </div>

            <!-- Pengunjung Unik -->
            <div class="bg-white p-6 rounded-xl shadow-md ">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-600 text-sm font-medium">Pengunjung Unik</h3>
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <p class="text-4xl font-bold text-green-600 mt-4">{{ $stats['unique_visitors'] }}</p>
            </div>

            <!-- Total Foto -->
            <div class="bg-white p-6 rounded-xl shadow-md ">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-600 text-sm font-medium">Total Foto</h3>
                    <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-4xl font-bold text-purple-600 mt-4">{{ $stats['total_photos'] }}</p>
            </div>

            <!-- Total Pengguna -->
            <div class="bg-white p-6 rounded-xl shadow-md ">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-600 text-sm font-medium">Total Admin</h3>
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <p class="text-4xl font-bold text-red-600 mt-4">{{ $stats['total_users'] }}</p>
            </div>

            <!-- Total Album -->
            <div class="bg-white p-6 rounded-xl shadow-md ">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-600 text-sm font-medium">Total Album</h3>
                    <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <p class="text-4xl font-bold text-yellow-600 mt-4">{{ $stats['total_albums'] }}</p>
            </div>

            <!-- Total Agenda -->
            <div class="bg-white p-6 rounded-xl shadow-md ">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-600 text-sm font-medium">Total Agenda</h3>
                    <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-4xl font-bold text-indigo-600 mt-4">{{ $stats['total_agendas'] }}</p>
            </div>

            <!-- Total Informasi -->
            <div class="bg-white p-6 rounded-xl shadow-md ">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-600 text-sm font-medium">Total Informasi</h3>
                    <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-4xl font-bold text-pink-600 mt-4">{{ $stats['total_informasi'] }}</p>
            </div>

            <!-- Total Kategori -->
            <div class="bg-white p-6 rounded-xl shadow-md ">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-600 text-sm font-medium">Total Kategori</h3>
                    <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <p class="text-4xl font-bold text-teal-600 mt-4">{{ $stats['total_categories'] }}</p>
            </div>
        </div>

        <!-- Halaman Populer -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-10">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
                Halaman Populer
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="text-left py-3 px-4 font-semibold text-gray-600">Halaman</th>
                            <th class="text-right py-3 px-4 font-semibold text-gray-600">Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['popular_pages'] as $page)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="py-3 px-4 text-gray-700">{{ $page->page_visited }}</td>
                            <td class="text-right py-3 px-4 font-medium text-blue-600">{{ $page->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Grafik Pengunjung Harian -->
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center">
                <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Pengunjung 7 Hari Terakhir
            </h2>
            <div class="h-80">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('visitorChart').getContext('2d');
            const data = @json($stats['daily_visitors']);
            
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map(item => item.date),
                    datasets: [{
                        label: 'Pengunjung',
                        data: data.map(item => item.total),
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: 'rgb(59, 130, 246)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    size: 12,
                                    weight: 'bold'
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            });
        });
    </script>
</x-app-layout>
