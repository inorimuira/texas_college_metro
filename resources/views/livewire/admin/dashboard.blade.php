<div class="bg-gray-100 font-sans antialiased">
    <!-- Sidebar -->
    <div class="flex h-screen">
        <div class="w-64 bg-white shadow-lg">
            <div class="flex gap-2 items-center justify-center mt-3">
                <img alt="Logo" class="w-10" height="40" src="{{ asset('assets/image/logo.png') }}" />
                <span class="text-black font-medium text-lg">Texas College Metro</span>
            </div>
            <nav class="mt-6">
                <a href="#" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 8h18M3 13h18M3 18h18" />
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V3H8v8H3v8h18v-8h-5z" />
                    </svg>
                    Pendaftaran
                </a>
                <a href="#" class="flex items-center py-3 px-4 text-gray-700 font-medium hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8" />
                    </svg>
                    Input Soal
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <!-- Topbar -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0018 15h-3v2zM9 7H7V5h2v2zM9 15H7v-2h2v2zm4 4h-4V3h4v16z" />
                        </svg>
                    </button>
                    <button>
                        <span class="text-gray-700 font-medium">Admin</span>
                    </button>
                </div>
            </div>

            <!-- Dashboard Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <div class="text-4xl font-bold text-gray-800">300</div>
                        <div class="ml-auto text-green-500 text-sm font-semibold">12% ↑</div>
                    </div>
                    <p class="text-gray-600">Jumlah Murid</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <div class="text-4xl font-bold text-gray-800">300</div>
                        <div class="ml-auto text-green-500 text-sm font-semibold">12% ↑</div>
                    </div>
                    <p class="text-gray-600">Jumlah Pendaftar</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <div class="text-4xl font-bold text-gray-800">300</div>
                        <div class="ml-auto text-green-500 text-sm font-semibold">12% ↑</div>
                    </div>
                    <p class="text-gray-600">Jumlah Murid yang Lulus</p>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Line Chart -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <canvas id="lineChart"></canvas>
                </div>
                <!-- Pie Chart -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Line Chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: Array.from({length: 12}, (_, i) => i + 1),
                datasets: [
                    {
                        label: 'Pendaftar',
                        data: [750, 400, 500, 300, 600, 750, 700, 800, 650, 500, 450, 700],
                        backgroundColor: 'rgba(59, 130, 246, 0.3)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Murid Lulus',
                        data: [500, 350, 450, 250, 500, 600, 550, 650, 600, 400, 350, 600],
                        backgroundColor: 'rgba(16, 185, 129, 0.3)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Jumlah Murid',
                        data: [300, 200, 250, 150, 300, 400, 350, 450, 400, 250, 200, 400],
                        backgroundColor: 'rgba(234, 179, 8, 0.3)',
                        borderColor: 'rgba(234, 179, 8, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Pendaftar', 'Murid Lulus', 'Jumlah Murid'],
                datasets: [{
                    data: [189, 218, 96],
                    backgroundColor: ['#3b82f6', '#10b981', '#eab308']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</div>
