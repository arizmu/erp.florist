<x-base-layout>
    <div class="space-y-6 animate-fade-in-up" x-data="dashboardData()">
        <!-- Header & Breadcrumbs -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <span class="icon-[tabler--dashboard] text-primary size-7"></span>
                    Dashboard
                </h1>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-500 bg-white px-3 py-1.5 rounded-lg shadow-sm border border-gray-100">
                    <span class="icon-[tabler--calendar] me-1 relative top-0.5"></span>
                    {{ now()->format('l, d F Y') }}
                </span>
            </div>
        </div>

        <!-- Welcome Banner -->
        <div
            class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
            <div
                class="absolute top-0 right-0 -mr-8 -mt-8 w-64 h-64 bg-white/10 rounded-full blur-3xl pointer-events-none">
            </div>
            <div
                class="absolute bottom-0 left-0 -ml-8 -mb-8 w-48 h-48 bg-black/10 rounded-full blur-3xl pointer-events-none">
            </div>

            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-5">
                    <div class="avatar online">
                        <div
                            class="w-16 h-16 rounded-full border-2 border-white/30 shadow-lg bg-white/20 backdrop-blur-sm flex items-center justify-center text-xl font-bold">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
                        <p class="text-blue-100 mt-1 opacity-90">Senang melihat Anda kembali. Berikut ringkasan
                            aktivitas hari ini.</p>
                        <div class="flex gap-2 mt-3">
                            <span class="badge badge-soft bg-white/20 text-white border-none">
                                <span class="icon-[tabler--shield] me-1"></span>
                                {{ auth()->user()->roles->first()->name ?? 'User' }}
                            </span>
                            <span class="badge badge-soft bg-white/20 text-white border-none">
                                <span class="icon-[tabler--mail] me-1"></span>
                                {{ auth()->user()->email }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Stat Card 1 - Daily Transactions -->
            <div class="card bg-white shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                            <span class="icon-[tabler--shopping-cart] size-6"></span>
                        </div>
                        <span class="badge badge-soft badge-success text-xs"
                            x-show="stats.transactions > 0">Active</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800" x-text="stats.transactions">0</h3>
                    <p class="text-gray-500 text-sm mt-1">Transaksi Hari Ini</p>
                </div>
            </div>

            <!-- Stat Card 2 - Daily Revenue -->
            <div class="card bg-white shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                            <span class="icon-[tabler--currency-dollar] size-6"></span>
                        </div>
                        <span class="badge badge-soft badge-success text-xs">Today</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800" x-text="formatCurrency(stats.revenue)">Rp 0</h3>
                    <p class="text-gray-500 text-sm mt-1">Pendapatan Harian</p>
                </div>
            </div>

            <!-- Stat Card 3 - Daily Production -->
            <div class="card bg-white shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                            <span class="icon-[tabler--box] size-6"></span>
                        </div>
                        <span class="badge badge-soft badge-warning text-xs">Today</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800" x-text="stats.production">0</h3>
                    <p class="text-gray-500 text-sm mt-1">Produksi Harian</p>
                </div>
            </div>

            <!-- Stat Card 4 - Total Customers -->
            <div class="card bg-white shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-50 text-purple-600 rounded-xl">
                            <span class="icon-[tabler--users] size-6"></span>
                        </div>
                        <span class="badge badge-soft badge-info text-xs">Total</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800" x-text="stats.customers">0</h3>
                    <p class="text-gray-500 text-sm mt-1">Pelanggan</p>
                </div>
            </div>
        </div>

        <!-- Layout Grid: Quick Actions & Chart -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Quick Actions -->
            <div class="card bg-white shadow-lg border border-gray-100 lg:col-span-1 h-fit">
                <div class="card-header bg-white border-b border-gray-100 px-6 py-4">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="icon-[tabler--lightning] text-amber-500"></span>
                        Aksi Cepat
                    </h3>
                </div>
                <div class="card-body p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('transaksi.index') }}"
                            class="flex flex-col items-center justify-center p-4 rounded-xl bg-gray-50 hover:bg-blue-50 text-gray-600 hover:text-blue-600 border border-transparent hover:border-blue-100 transition-all duration-300 group">
                            <div
                                class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <span class="icon-[tabler--cash] size-6"></span>
                            </div>
                            <span class="text-xs font-semibold">Kasir</span>
                        </a>

                        <a href="{{ route('inventory.index') }}"
                            class="flex flex-col items-center justify-center p-4 rounded-xl bg-gray-50 hover:bg-emerald-50 text-gray-600 hover:text-emerald-600 border border-transparent hover:border-emerald-100 transition-all duration-300 group">
                            <div
                                class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <span class="icon-[tabler--building-warehouse] size-6"></span>
                            </div>
                            <span class="text-xs font-semibold">Stok</span>
                        </a>

                        <a href="{{ route('laporanPenjualanLayout') }}"
                            class="flex flex-col items-center justify-center p-4 rounded-xl bg-gray-50 hover:bg-purple-50 text-gray-600 hover:text-purple-600 border border-transparent hover:border-purple-100 transition-all duration-300 group">
                            <div
                                class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <span class="icon-[tabler--report-analytics] size-6"></span>
                            </div>
                            <span class="text-xs font-semibold">Laporan</span>
                        </a>

                        <a href="{{ route('pegawai.index') }}"
                            class="flex flex-col items-center justify-center p-4 rounded-xl bg-gray-50 hover:bg-orange-50 text-gray-600 hover:text-orange-600 border border-transparent hover:border-orange-100 transition-all duration-300 group">
                            <div
                                class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <span class="icon-[tabler--users-group] size-6"></span>
                            </div>
                            <span class="text-xs font-semibold">Pegawai</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Chart / Recent Activity Placeholder -->
            <div class="card bg-white shadow-lg border border-gray-100 lg:col-span-2">
                <div class="card-header bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="icon-[tabler--chart-bar] text-blue-500"></span>
                        Statistik Penjualan
                    </h3>
                    <select class="select select-sm select-bordered w-32" x-model="chartPeriod"
                        @change="loadChartData()">
                        <option value="week">Minggu Ini</option>
                        <option value="month">Bulan Ini</option>
                        <option value="year">Tahun Ini</option>
                    </select>
                </div>
                <div class="card-body p-6">
                    <canvas id="salesChart" class="w-full h-80 max-h-80"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function dashboardData() {
                return {
                    stats: {
                        transactions: 0,
                        revenue: 0,
                        production: 0,
                        customers: 0
                    },
                    chartPeriod: 'week',
                    chart: null,

                    init() {
                        this.loadStats();
                        this.loadChartData();
                    },

                    async loadStats() {
                        try {
                            const [transactions, revenue, production, customers] = await Promise.all([
                                fetch('/api/dashboard/daily-transaksi').then(r => r.json()),
                                fetch('/api/dashboard/daily-revenue').then(r => r.json()),
                                fetch('/api/dashboard/count-produksi').then(r => r.json()),
                                fetch('/api/dashboard/count-customers').then(r => r.json())
                            ]);

                            this.stats.transactions = transactions.data || 0;
                            this.stats.revenue = revenue.data || 0;
                            this.stats.production = production.data || 0;
                            this.stats.customers = customers.data || 0;
                        } catch (error) {
                            console.error('Error loading stats:', error);
                        }
                    },

                    async loadChartData() {
                        try {
                            const response = await fetch(`/api/dashboard/statistics?period=${this.chartPeriod}`);
                            const result = await response.json();

                            if (result.status === 'success') {
                                this.updateChart(result.data.labels, result.data.values);
                            }
                        } catch (error) {
                            console.error('Error loading chart data:', error);
                        }
                    },

                    updateChart(labels, data) {
                        const ctx = document.getElementById('salesChart');

                        if (this.chart) {
                            this.chart.destroy();
                        }

                        if (ctx) {
                            this.chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Penjualan (Juta)',
                                        data: data,
                                        borderColor: '#4f46e5',
                                        backgroundColor: 'rgba(79, 70, 229, 0.1)',
                                        tension: 0.4,
                                        fill: true,
                                        pointBackgroundColor: '#ffffff',
                                        pointBorderColor: '#4f46e5',
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
                                            display: false
                                        },
                                        tooltip: {
                                            mode: 'index',
                                            intersect: false,
                                            backgroundColor: 'rgba(255, 255, 255, 0.9)',
                                            titleColor: '#1f2937',
                                            bodyColor: '#4b5563',
                                            borderColor: '#e5e7eb',
                                            borderWidth: 1,
                                            padding: 10,
                                            displayColors: false,
                                            callbacks: {
                                                label: function(context) {
                                                    return 'Rp ' + context.parsed.y.toFixed(2) + ' Juta';
                                                }
                                            }
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            grid: {
                                                color: '#f3f4f6',
                                                drawBorder: false,
                                            },
                                            ticks: {
                                                callback: function(value) {
                                                    return 'Rp ' + value + 'jt';
                                                },
                                                font: {
                                                    family: "'Inter', sans-serif",
                                                    size: 11
                                                },
                                                color: '#9ca3af'
                                            }
                                        },
                                        x: {
                                            grid: {
                                                display: false
                                            },
                                            ticks: {
                                                font: {
                                                    family: "'Inter', sans-serif",
                                                    size: 11
                                                },
                                                color: '#9ca3af'
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    },

                    formatCurrency(value) {
                        if (value >= 1000000) {
                            return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                        } else if (value >= 1000) {
                            return 'Rp ' + (value / 1000).toFixed(0) + 'rb';
                        }
                        return 'Rp ' + value;
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
