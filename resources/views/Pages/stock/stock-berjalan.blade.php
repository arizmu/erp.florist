<x-base-layout>
    <div x-data="stockBerjalan">
        <div class="breadcrumbs mb-6">
            <ol>
                <li>
                    <a href="#"> <span class="icon-[tabler--folder] size-4"></span>Home</a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180"><span class="icon-[tabler--chevron-right]"></span></li>
                <li>
                    <a href="#" aria-label="More Pages"><span class="icon-[tabler--dots]"></span></a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180"><span class="icon-[tabler--chevron-right]"></span></li>
                <li aria-current="page">
                    Stok Berjalan
                </li>
            </ol>
        </div>

        <!-- Header & Summary Stats -->
        <div class="mb-6 flex flex-col lg:flex-row lg:items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white tracking-tight">Stok Berjalan</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Catatan perubahan stok barang masuk maupun
                    keluar.
                </p>
            </div>

            <!-- Minimalist Stats -->
            <div
                class="flex flex-wrap items-center gap-4 text-sm bg-white dark:bg-gray-800 px-4 py-2.5 rounded-lg border border-gray-100 dark:border-gray-700/50 shadow-sm">
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    <span class="text-gray-600 dark:text-gray-300">Masuk: <span
                            class="font-semibold text-gray-900 dark:text-white">+0</span></span>
                </div>
                <div class="w-px h-4 bg-gray-200 dark:bg-gray-700"></div>
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                    <span class="text-gray-600 dark:text-gray-300">Keluar: <span
                            class="font-semibold text-gray-900 dark:text-white">-0</span></span>
                </div>
                <div class="w-px h-4 bg-gray-200 dark:bg-gray-700"></div>
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                    <span class="text-gray-600 dark:text-gray-300">Total: <span
                            class="font-semibold text-gray-900 dark:text-white">0</span></span>
                </div>
            </div>
        </div>

        <!-- Main Content Card -->
        <div
            class="bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700/50 shadow-sm overflow-hidden">

            <!-- Filter toolbar -->
            <div
                class="p-4 border-b border-gray-100 dark:border-gray-700/50 flex flex-col lg:flex-row gap-3 items-center justify-between bg-gray-50/30 dark:bg-gray-800/30">
                <div class="flex-1 w-full lg:w-auto relative">
                    <input type="text" x-model="filter.keyword"
                        class="w-full lg:max-w-xs pl-9 pr-4 py-2 text-sm border border-gray-200 dark:border-gray-600 rounded-lg focus:ring-1 focus:ring-gray-900 dark:focus:ring-gray-100 focus:border-gray-900 dark:focus:border-gray-100 dark:bg-gray-700 dark:text-white bg-white outline-none transition-all"
                        placeholder="Cari barang atau user...">
                    <span
                        class="icon-[tabler--search] absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 size-4"></span>
                </div>

                <div class="flex flex-col sm:flex-row w-full lg:w-auto gap-3">
                    <select x-model="filter.tipe"
                        class="py-2 pl-3 pr-9 text-sm border border-gray-200 dark:border-gray-600 rounded-lg focus:ring-1 focus:ring-gray-900 dark:focus:ring-gray-100 focus:border-gray-900 dark:focus:border-gray-100 dark:bg-gray-700 dark:text-white bg-white outline-none">
                        <option value="">Semua Tipe</option>
                        <option value="1">Barang Masuk</option>
                        <option value="0">Barang Keluar</option>
                    </select>

                    <div class="flex items-center gap-2">
                        <input type="text" x-model="filter.range_tanggal"
                            class="min-w-72 lg:max-w-xs px-4 py-2 text-sm border border-gray-200 dark:border-gray-600 rounded-lg focus:ring-1 focus:ring-gray-900 dark:focus:ring-gray-100 focus:border-gray-900 dark:focus:border-gray-100 dark:bg-gray-700 dark:text-white bg-white outline-none transition-all"
                            placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" />
                    </div>

                    <button @click="dataLoad()"
                        class="px-4 py-2 text-sm font-medium text-white bg-gray-900 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-white rounded-lg transition-colors flex items-center justify-center gap-2">
                        <span class="icon-[tabler--filter] size-4"></span>
                        Filter
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left whitespace-nowrap">
                    <thead
                        class="text-xs text-gray-500 uppercase bg-gray-50/50 dark:bg-gray-800/50 dark:text-gray-400 border-b border-gray-100 dark:border-gray-700/50">
                        <tr>
                            <th class="px-6 py-3.5 font-medium tracking-wider">Nama Barang</th>
                            <th class="px-6 py-3.5 font-medium tracking-wider ">Type</th>
                            <th class="px-6 py-3.5 font-medium tracking-wider ">Qty Awal</th>
                            <th class="px-6 py-3.5 font-medium tracking-wider ">Qty</th>
                            <th class="px-6 py-3.5 font-medium tracking-wider ">Qty Akhir</th>
                            <th class="px-6 py-3.5 font-medium tracking-wider">Keterangan</th>
                            <th class="px-6 py-3.5 font-medium tracking-wider">Petugas</th>
                            <th class="px-6 py-3.5 font-medium tracking-wider text-right">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700/50">
                        <template x-if="stock.data && stock.data.length === 0">
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <div
                                        class="flex flex-col items-center justify-center gap-2 text-gray-500 dark:text-gray-400">
                                        <span class="icon-[tabler--database-off] size-6 text-gray-400"></span>
                                        <p class="text-sm">Tidak ada riwayat perubahan stok</p>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        <template x-for="(item, index) in stock.data" :key="index">
                            <tr>
                                <td x-text="item.nama_barang"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                    <span x-text="item.type == 1 ? 'Barang Masuk' : 'Barang Keluar'"
                                        :class="item.type == 1 ? 'badge-success' : 'badge-error'"
                                        class="badge badge-soft"></span>
                                </td>
                                <td x-text="item.qty_awal"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                </td>
                                <td x-text="item.qty"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                </td>
                                <td x-text="item.qty_akhir"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                </td>
                                <td x-text="item.keterangan"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white text-wrap">
                                </td>
                                <td x-text="item.pegawai"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                </td>
                                <td x-text="formatTanggal(item.updated_at)"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
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
                                            @click="changePage(stock.path + '?page=' + page + '&per_page=' + per_page + '&keyword=' + filter.keyword)"
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
            document.addEventListener('alpine:init', function() {
                Alpine.data('stockBerjalan', () => ({
                    filter: {
                        range_tanggal: '',
                        tipe: '',
                        keyword: '',
                    },
                    per_page: 10,

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

                    async dataLoad(customUrl = null) {
                        let url;
                        const baseUrl =
                        '/stock/api/stock-berjalan-json'; // konsisten dengan leading slash

                        if (customUrl) {
                            // Parse URL dengan base untuk handle relative URL
                            const oldUrl = new URL(customUrl, window.location.origin);
                            const params = new URLSearchParams(oldUrl.search);

                            // Ambil page dari URL lama (default 1)
                            const page = params.get('page') || '1';

                            // Build URL baru dengan parameter yang benar
                            const queryParams = new URLSearchParams({
                                keyword: this.filter.keyword,
                                range_tanggal: this.filter.range_tanggal,
                                tipe: this.filter.tipe,
                                page: page, // ✅ page, bukan per_page
                                per_page: this.per_page // ✅ per_page dari config
                            });

                            url = `${baseUrl}?${queryParams.toString()}`;

                        } else {
                            const queryParams = new URLSearchParams({
                                keyword: this.filter.keyword,
                                range_tanggal: this.filter.range_tanggal,
                                tipe: this.filter.tipe,
                                per_page: this.per_page
                            });

                            url = `${baseUrl}?${queryParams.toString()}`;
                        }


                        const response = await fetch(url, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            }
                        });
                        const ress = await response.json();
                        const data = ress.data;
                        this.stock = data;
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

                    init() {
                        flatpickr('#flatpickr-range', {
                            mode: 'range'
                        })

                        this.dataLoad();
                    }
                }))
            });
        </script>
    @endpush
</x-base-layout>
