<x-base-layout>
    <div class="space-y-6 animate-fade-in-up" x-data="dashboardData()">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl font-bold text-gray-800 tracking-tight">Dashboard</h1>
                <p class="text-sm text-gray-400 mt-0.5">Ringkasan aktivitas bisnis Anda hari ini</p>
            </div>
            <div class="flex items-center gap-2 text-xs text-gray-400 bg-white border border-gray-100 shadow-sm px-3 py-2 rounded-xl w-fit">
                <span class="icon-[tabler--calendar-event] size-4 text-indigo-400"></span>
                {{ now()->format('l, d F Y') }}
            </div>
        </div>

        <!-- Welcome Banner -->
        <div class="relative rounded-2xl overflow-hidden shadow-lg"
            style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 40%, #3730a3 100%);">

            <!-- Decorative shapes -->
            <div class="absolute -top-10 -right-10 w-52 h-52 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-indigo-400/20 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute top-1/2 right-24 -translate-y-1/2 w-24 h-24 bg-white/5 rounded-full pointer-events-none"></div>

            <div class="relative z-10 flex flex-col sm:flex-row items-center sm:items-center gap-5 px-7 py-6">
                <!-- Avatar -->
                <div class="shrink-0 w-14 h-14 rounded-2xl bg-white/15 backdrop-blur-sm border border-white/20 shadow-inner flex items-center justify-center text-2xl font-bold text-white">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <!-- Text -->
                <div class="text-center sm:text-left">
                    <p class="text-indigo-200 text-xs font-medium tracking-widest uppercase mb-0.5">Selamat Datang</p>
                    <h2 class="text-xl sm:text-2xl font-bold text-white leading-tight">
                        {{ auth()->user()->name }} 👋
                    </h2>
                    <p class="text-indigo-200/80 text-sm mt-1">
                        <span class="icon-[tabler--mail] size-3.5 relative top-px me-1"></span>
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <!-- Right side indicator -->
                <div class="sm:ms-auto flex items-center gap-2 bg-white/10 border border-white/20 rounded-xl px-4 py-2.5 text-white text-sm backdrop-blur-sm">
                    <span class="relative flex size-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full size-2 bg-emerald-400"></span>
                    </span>
                    Sistem Aktif
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

            <!-- Stat Card 1 - Daily Transactions -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 overflow-hidden">
                <div class="flex items-stretch">
                    <!-- Left accent bar -->
                    <div class="w-1.5 bg-gradient-to-b from-blue-400 to-blue-600 rounded-l-2xl shrink-0"></div>
                    <div class="flex-1 p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="p-2.5 bg-blue-50 rounded-xl">
                                <span class="icon-[tabler--shopping-cart] size-5 text-blue-500"></span>
                            </div>
                            <span class="text-xs font-medium text-blue-500 bg-blue-50 px-2 py-0.5 rounded-full"
                                x-show="stats.transactions > 0">Aktif</span>
                        </div>
                        <p class="text-2xl font-bold text-gray-800" x-text="stats.transactions">0</p>
                        <p class="text-xs text-gray-400 mt-1 font-medium">Transaksi Hari Ini</p>
                    </div>
                </div>
            </div>

            <!-- Stat Card 2 - Daily Revenue -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 overflow-hidden">
                <div class="flex items-stretch">
                    <div class="w-1.5 bg-gradient-to-b from-emerald-400 to-emerald-600 rounded-l-2xl shrink-0"></div>
                    <div class="flex-1 p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="p-2.5 bg-emerald-50 rounded-xl">
                                <span class="icon-[tabler--currency-dollar] size-5 text-emerald-500"></span>
                            </div>
                            <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">Hari Ini</span>
                        </div>
                        <p class="text-2xl font-bold text-gray-800">
                            Rp <span x-text="formatRupiah(stats.revenue)">0</span>
                        </p>
                        <p class="text-xs text-gray-400 mt-1 font-medium">Pendapatan Harian</p>
                    </div>
                </div>
            </div>

            <!-- Stat Card 3 - Daily Production -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 overflow-hidden">
                <div class="flex items-stretch">
                    <div class="w-1.5 bg-gradient-to-b from-amber-400 to-orange-500 rounded-l-2xl shrink-0"></div>
                    <div class="flex-1 p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="p-2.5 bg-amber-50 rounded-xl">
                                <span class="icon-[tabler--box] size-5 text-amber-500"></span>
                            </div>
                            <span class="text-xs font-medium text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full">Hari Ini</span>
                        </div>
                        <p class="text-2xl font-bold text-gray-800" x-text="stats.production">0</p>
                        <p class="text-xs text-gray-400 mt-1 font-medium">Produksi Bucket Harian</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Layout Grid: Quick Actions & Chart -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 lg:col-span-1 h-fit">
                <div class="px-5 py-4 border-b border-gray-50 flex items-center gap-2">
                    <span class="icon-[tabler--zap] size-4 text-amber-500"></span>
                    <h3 class="font-semibold text-gray-700 text-sm">Aksi Cepat</h3>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-2 gap-3">

                        <a href="{{ route('transaksi.index') }}"
                            class="group flex flex-col items-center gap-2.5 p-4 rounded-xl bg-blue-50 hover:bg-blue-100 transition-all duration-200">
                            <div class="w-10 h-10 rounded-xl bg-blue-500 group-hover:bg-blue-600 shadow flex items-center justify-center transition-colors">
                                <span class="icon-[tabler--cash] size-5 text-white"></span>
                            </div>
                            <span class="text-xs font-semibold text-blue-700">Kasir</span>
                        </a>

                        <a href="{{ route('stock.view') }}"
                            class="group flex flex-col items-center gap-2.5 p-4 rounded-xl bg-emerald-50 hover:bg-emerald-100 transition-all duration-200">
                            <div class="w-10 h-10 rounded-xl bg-emerald-500 group-hover:bg-emerald-600 shadow flex items-center justify-center transition-colors">
                                <span class="icon-[tabler--building-warehouse] size-5 text-white"></span>
                            </div>
                            <span class="text-xs font-semibold text-emerald-700">Stok</span>
                        </a>

                        <a href="{{ route('laporanPenjualanLayout') }}"
                            class="group flex flex-col items-center gap-2.5 p-4 rounded-xl bg-violet-50 hover:bg-violet-100 transition-all duration-200">
                            <div class="w-10 h-10 rounded-xl bg-violet-500 group-hover:bg-violet-600 shadow flex items-center justify-center transition-colors">
                                <span class="icon-[tabler--report-analytics] size-5 text-white"></span>
                            </div>
                            <span class="text-xs font-semibold text-violet-700">Laporan</span>
                        </a>

                        <a href="{{ route('pegawai.index') }}"
                            class="group flex flex-col items-center gap-2.5 p-4 rounded-xl bg-orange-50 hover:bg-orange-100 transition-all duration-200">
                            <div class="w-10 h-10 rounded-xl bg-orange-500 group-hover:bg-orange-600 shadow flex items-center justify-center transition-colors">
                                <span class="icon-[tabler--users-group] size-5 text-white"></span>
                            </div>
                            <span class="text-xs font-semibold text-orange-700">Pegawai</span>
                        </a>

                    </div>
                </div>
            </div>

            <!-- Chart: Statistik Penjualan -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 lg:col-span-2">
                <div class="px-5 py-4 border-b border-gray-50 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                        <h3 class="font-semibold text-gray-700 text-sm">Statistik Penjualan</h3>
                    </div>
                    <select class="text-xs text-gray-500 bg-gray-50 border border-gray-200 rounded-lg px-2.5 py-1.5 outline-none cursor-pointer focus:ring-2 focus:ring-indigo-100 focus:border-indigo-300 transition"
                        x-model="chartPeriod" @change="loadChartData()">
                        <option value="week">Minggu Ini</option>
                        <option value="month">Bulan Ini</option>
                        <option value="year">Tahun Ini</option>
                    </select>
                </div>
                <div class="p-5">
                    <canvas id="salesChart" class="w-full h-72 max-h-72"></canvas>
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
                        production: 0
                    },
                    chartPeriod: 'week',
                    chart: null,

                    init() {
                        this.loadStats();
                        this.loadChartData();
                    },

                    async loadStats() {
                        try {
                            const [transactions, revenue, production] = await Promise.all([
                                fetch('/api/dashboard/daily-transaksi').then(r => r.json()),
                                fetch('/api/dashboard/daily-revenue').then(r => r.json()),
                                fetch('/api/dashboard/count-produksi').then(r => r.json())
                            ]);

                            this.stats.transactions = transactions.data || 0;
                            this.stats.revenue = revenue.data || 0;
                            this.stats.production = production.data || 0;
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

                    /**
                     * Render atau update chart Chart.js.
                     * Nilai `data` yang diterima sudah dalam satuan JUTA
                     * (dikonversi di backend: sum / 1_000_000).
                     */
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
                                        label: 'Pendapatan',
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
                                                /**
                                                 * context.parsed.y sudah dalam satuan juta.
                                                 * Tampilkan dengan 2 desimal, misal: Rp 1.25 jt
                                                 */
                                                label: function(context) {
                                                    const val = context.parsed.y;
                                                    if (val >= 1) {
                                                        return 'Rp ' + val.toFixed(2) + ' jt';
                                                    }
                                                    // Jika nilai < 1 juta, tampilkan dalam ribuan
                                                    return 'Rp ' + (val * 1000).toFixed(0) + ' rb';
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
                                                /**
                                                 * Nilai y sudah dalam satuan juta dari backend.
                                                 * Tampilkan sebagai: 0 jt, 1 jt, 2.5 jt, dst.
                                                 */
                                                callback: function(value) {
                                                    if (value >= 1) {
                                                        return value + ' jt';
                                                    }
                                                    return (value * 1000).toFixed(0) + ' rb';
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
                            return 'Rp ' + (value / 1000000).toFixed(1) + ' jt';
                        } else if (value >= 1000) {
                            return 'Rp ' + (value / 1000).toFixed(0) + ' rb';
                        }
                        return 'Rp ' + value;
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
