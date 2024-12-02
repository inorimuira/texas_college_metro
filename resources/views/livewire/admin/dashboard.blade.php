
<!-- Main Content -->
<div class="flex-1 p-10">
    <!-- Topbar -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
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
