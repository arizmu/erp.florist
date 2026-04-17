<x-base-layout>
    <div class="breadcrumbs">
        <ol>
            <li>
                <a href="#"> <span class="icon-[tabler--folder] size-5"></span>Home</a>
            </li>
            <li class="breadcrumbs-separator rtl:rotate-180"><span class="icon-[tabler--chevron-right]"></span></li>
            <li>
                <a href="#" aria-label="More Pages"><span class="icon-[tabler--dots]"></span></a>
            </li>
            <li class="breadcrumbs-separator rtl:rotate-180"><span class="icon-[tabler--chevron-right]"></span></li>
            <li aria-current="page">
                <span class="icon-[tabler--box] me-1 size-5"></span>
                Stok Barang
            </li>
        </ol>
    </div>

    <div x-data="stock">
        <!-- Main Content -->
        <!-- Page Header -->
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Stok Barang</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Kelola dan lihat informasi stok barang
                        secara real-time</p>
                </div>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 mb-6">
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                    <input x-model="search.keyword" @keyup.enter="dataLoad()" type="text"
                        class="w-full pl-11 pr-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                        placeholder="Cari barang berdasarkan nama...">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                        <span class="icon-[tabler--search] size-5"></span>
                    </span>
                </div>

                <button @click="dataLoad()"
                    class="inline-flex items-center justify-center gap-2 px-5 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-blue-500/40 hover:-translate-y-0.5">
                    <span class="icon-[mingcute--search-3-line] size-4"></span>
                    <span>Cari</span>
                </button>
            </div>
        </div>

        <!-- Stock Table Card -->
        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Stok Barang</h2>
                    <div class="flex items-center gap-2">
                        &nbsp;
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/50 dark:bg-gray-700/50">
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Nama Barang</th>
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Kategori</th>
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Satuan</th>
                            <th
                                class="px-6 py-3.5 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Stok Tersedia</th>
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Terakhir Update</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        <template x-if="stock.data && stock.data.length === 0">
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div
                                            class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="icon-[tabler--box] size-8 text-gray-400"></span>
                                        </div>
                                        <p class="text-gray-500 dark:text-gray-400 font-medium">Tidak ada data stok
                                            barang</p>
                                        <p class="text-sm text-gray-400 dark:text-gray-500">Data stok akan muncul di
                                            sini</p>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        <template x-for="(item, index) in stock.data" :key="index">
                            <tr>
                                <td x-text="item.nama_barang"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                </td>
                                <td x-text="item.category"
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                </td>
                                <td x-text="item.satuan"
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                </td>
                                <td x-text="item.stock"
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                                </td>
                                <td x-text="formatTanggal(item.updated_at)"
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Tampilkan</span>
                        <select x-model="per_page" @change="dataLoad()"
                            class="px-3 py-1.5 text-sm border border-gray-200 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="text-sm text-gray-500 dark:text-gray-400">data</span>
                    </div>
                    <nav>
                        <template x-if="stock.last_page > 1">
                            <ul class="flex items-center gap-1">
                                <li>
                                    <button @click="changePage(stock.first_page_url)" :disabled="!stock.prev_page_url"
                                        class="px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                        First
                                    </button>
                                </li>
                                <li>
                                    <button @click="changePage(stock.prev_page_url)" :disabled="!stock.prev_page_url"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                        <span class="icon-[tabler--chevron-left] size-4"></span>
                                        Prev
                                    </button>
                                </li>
                                <template x-for="page in getPages(stock.current_page, stock.last_page)"
                                    :key="page">
                                    <li>
                                        <button
                                            @click="changePage(stock.path + '?page=' + page + '&per_page=' + per_page + '&keyword=' + search.keyword)"
                                            class="px-3 py-1.5 text-sm font-medium rounded-lg transition-all duration-200"
                                            :class="page === stock.current_page ?
                                                'text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg shadow-blue-500/30' :
                                                'text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600'">
                                            <span x-text="page"></span>
                                        </button>
                                    </li>
                                </template>
                                <li>
                                    <button @click="changePage(stock.next_page_url)" :disabled="!stock.next_page_url"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                        Next
                                        <span class="icon-[tabler--chevron-right] size-4"></span>
                                    </button>
                                </li>
                                <li>
                                    <button @click="changePage(stock.last_page_url)"
                                        :disabled="stock.current_page === stock.last_page"
                                        class="px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                        Last
                                    </button>
                                </li>
                            </ul>
                        </template>
                    </nav>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <span
                            x-text="`Menampilkan ${stock.from || 0} - ${stock.to || 0} dari ${stock.total || 0} data`"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('stock', () => ({
                    init() {
                        this.dataLoad();
                    },

                    stock: {
                        data: [],
                        from: 0,
                        to: 0,
                        total: 0,
                        current_page: 1,
                        last_page: 1,
                        prev_page_url: null,
                        next_page_url: null,
                        first_page_url: null,
                        last_page_url: null,
                        path: ''
                    },
                    search: {
                        keyword: '',
                        category: '',
                        satuan: ''
                    },
                    per_page: 10,

                    async dataLoad(customUrl = null) {
                        let url;
                        const baseUrl = '/stock/api/stock-json';

                        if (customUrl) {
                            // Parse URL dengan base untuk handle relative URL
                            const oldUrl = new URL(customUrl, window.location.origin);
                            const oldParams = new URLSearchParams(oldUrl.search);

                            // Ambil page dari URL lama (default 1)
                            const page = oldParams.get('page') || '1';

                            // Build URL baru dengan parameter terkini + page dari URL lama
                            const queryParams = new URLSearchParams({
                                keyword: this.search.keyword,
                                category: this.search.category,
                                satuan: this.search.satuan,
                                per_page: this.per_page,
                                page: page
                            });

                            url = `${baseUrl}?${queryParams.toString()}`;

                        } else {
                            const queryParams = new URLSearchParams({
                                keyword: this.search.keyword,
                                category: this.search.category,
                                satuan: this.search.satuan,
                                per_page: this.per_page
                            });

                            url = `${baseUrl}?${queryParams.toString()}`;
                        }

                        const response = await fetch(url, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            }
                        });
                        const res = await response.json();
                        this.stock = res.data;
                        console.log(this.stock);
                    },

                    changePage(url) {
                        if (!url) return;
                        this.dataLoad(url);
                    },

                    getPages(current, last) {
                        let delta = 2;
                        let start = Math.max(1, current - delta);
                        let end = Math.min(last, current + delta);
                        if (end - start < 4) {
                            if (start === 1) end = Math.min(start + 4, last);
                            else start = Math.max(end - 4, 1);
                        }
                        const pages = [];
                        for (let i = start; i <= end; i++) {
                            pages.push(i);
                        }
                        return pages;
                    },

                    formatTanggal(date) {
                        if (!date) return '-';
                        const d = new Date(date);
                        return d.toLocaleDateString('id-ID', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric'
                        });
                    }
                }));
            })
        </script>
    @endpush
</x-base-layout>
