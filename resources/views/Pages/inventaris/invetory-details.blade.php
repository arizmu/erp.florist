<x-base-layout>

    <div x-data="InventoryDetails">
        <!-- Page Header -->
        <div class="mb-6">
            <div class="breadcrumbs mb-4 text-sm">
                <ol>
                    <li>
                        <a href="#"> <span class="icon-[tabler--folder] size-5"></span>Home</a>
                    </li>
                    <li class="breadcrumbs-separator rtl:rotate-180"><span class="icon-[tabler--chevron-right]"></span>
                    </li>
                    <li>
                        <a href="#" aria-label="More Pages"><span class="icon-[tabler--dots]"></span></a>
                    </li>
                    <li class="breadcrumbs-separator rtl:rotate-180"><span class="icon-[tabler--chevron-right]"></span>
                    </li>
                    <li aria-current="page">
                        <span class="icon-[tabler--file] me-1 size-5"></span>
                        Detail Inventory
                    </li>
                </ol>
            </div>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-xl md:text-2xl font-bold text-gray-700 flex items-center gap-3">
                        <span
                            class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2.5 shadow-lg shadow-blue-500/30">
                            <span class="icon-[tabler--file-invoice] size-5 text-white"></span>
                        </span>
                        Detail Inventory
                    </h1>
                    <p class="text-gray-500 mt-2 ml-1">Lihat detail barang dalam inventory</p>
                </div>
                <a href="{{ route('inventory.index') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white font-medium rounded-xl shadow-lg shadow-gray-500/30 transition-all duration-200 hover:shadow-gray-500/40 hover:-translate-y-0.5">
                    <span class="icon-[tabler--arrow-left] size-5"></span>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Main Content - Table -->
            <div class="lg:col-span-9">
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <!-- Table Header -->
                    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Barang</h2>
                            <div class="flex items-center gap-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300">
                                    <span class="icon-[tabler--package] size-3 mr-1"></span>
                                    <span x-text="data.length">0</span> Barang
                                </span>
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
                                        class="px-6 py-3.5 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                        Jumlah</th>
                                    <th
                                        class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                        Satuan</th>
                                    <th
                                        class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                        Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                <template x-for="item in data">
                                    <tr
                                        class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex-shrink-0 w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
                                                    <span class="icon-[tabler--package] size-5 text-white"></span>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-gray-900 dark:text-white"
                                                        x-text="item.barang ? item.barang.nama_barang : '-'">-</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400"
                                                        x-text="item.barang ? item.barang.comment : ''"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span
                                                class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg text-sm font-medium bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300"
                                                x-text="item.jumlah">-</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-purple-50 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300"
                                                x-text="item.barang && item.barang.satuan ? item.barang.satuan.nama_satuan : '-'">-</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center gap-2 text-gray-600 dark:text-gray-300 text-sm">
                                                <span class="icon-[tabler--calendar] size-4 text-gray-400"></span>
                                                <span x-text="formatTanggal(item.tanggal)">-</span>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="data.length === 0">
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div
                                                class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                                <span class="icon-[tabler--inbox] size-8 text-gray-400"></span>
                                            </div>
                                            <p class="text-gray-500 dark:text-gray-400 font-medium">Tidak ada data
                                                barang</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700">
                        <nav class="flex items-center justify-between gap-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Navigasi halaman data
                            </p>
                            <div class="flex items-center gap-2">
                                <button type="button"
                                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200"
                                    @click="prevPageFunc" :disabled="!prevPage">
                                    <span class="icon-[tabler--chevron-left] size-4"></span>
                                    Previous
                                </button>
                                <button type="button"
                                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none transition-all duration-200"
                                    :disabled="!nextPage" @click="nextPageFunc">
                                    Next
                                    <span class="icon-[tabler--chevron-right] size-4"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Filters -->
            <div class="lg:col-span-3">
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 sticky top-6">
                    <!-- Sidebar Header -->
                    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                                <span class="icon-[tabler--filter] size-5 text-white"></span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Filter Data</h3>
                        </div>
                    </div>

                    <!-- Filter Form -->
                    <div class="p-6 space-y-5">
                        <!-- Date Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--calendar-event] size-4 text-gray-400"></span>
                                    Rentang Tanggal
                                </span>
                            </label>
                            <div class="relative">
                                <input x-model="search.date_range" type="text"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                    placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" />
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--calendar] size-5"></span>
                                </span>
                            </div>
                        </div>

                        <!-- Product Selection -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--package] size-4 text-gray-400"></span>
                                    Pilih Barang
                                </span>
                            </label>
                            <div class="relative" x-data="{ isOpen: false }">
                                <input
                                    x-model="search.barang_search"
                                    @focus="isOpen = true"
                                    @blur="setTimeout(() => isOpen = false, 200)"
                                    @input="searchProducts"
                                    @keyup.enter="selectFirstProduct"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                    placeholder="Cari barang..."
                                    aria-label="Search product" />
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--search] size-5"></span>
                                </span>

                                <!-- Dropdown Results -->
                                <div x-show="isOpen && filteredProducts.length > 0"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-2"
                                    class="absolute z-50 w-full mt-1 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-xl shadow-lg max-h-60 overflow-y-auto">
                                    <template x-for="product in filteredProducts" :key="product.id">
                                        <button
                                            @click="selectProduct(product)"
                                            class="w-full px-4 py-3 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150 border-b border-gray-100 dark:border-gray-700 last:border-0">
                                            <div class="flex items-center justify-between">
                                                <span x-text="product.nama_barang"></span>
                                                <span class="text-xs text-gray-400" x-text="product.satuan ? product.satuan.nama_satuan : ''"></span>
                                            </div>
                                        </button>
                                    </template>
                                </div>

                                <!-- Selected Product Display -->
                                <div x-show="search.selected_product && !isOpen" class="mt-2">
                                    <div class="flex items-center justify-between px-3 py-2 bg-blue-50 dark:bg-blue-900/30 rounded-lg">
                                        <span class="text-sm font-medium text-blue-700 dark:text-blue-300" x-text="search.selected_product"></span>
                                        <button @click="clearProduct" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-200">
                                            <span class="icon-[tabler--x] size-4"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--list-details] size-4 text-gray-400"></span>
                                    Jumlah Data
                                </span>
                            </label>
                            <div class="relative">
                                <select x-model="search.range"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200"
                                    aria-label="Select data range">
                                    <option value="15">15 data per halaman</option>
                                    <option value="25">25 data per halaman</option>
                                    <option value="50">50 data per halaman</option>
                                    <option value="100">100 data per halaman</option>
                                </select>
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--chevron-down] size-5"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="px-6 pb-6">
                        <div class="grid grid-cols-2 gap-3">
                            <button
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-blue-500/40 hover:-translate-y-0.5"
                                x-on:click="searchFunc">
                                <span class="icon-[tabler--search] size-4"></span>
                                Filter
                            </button>
                            <button x-on:click="resetFilter"
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                                <span class="icon-[tabler--refresh] size-4"></span>
                                Reset
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Card -->
                <div
                    class="mt-6 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-lg shadow-indigo-500/30 p-6">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                            <span class="icon-[tabler--chart-bar] size-7 text-white"></span>
                        </div>
                        <div>
                            <p class="text-indigo-100 text-sm font-medium">Total Data</p>
                            <p class="text-3xl font-bold text-white mt-1" x-text="data.length">0</p>
                        </div>
                    </div>
                </div>

                <!-- Summary Card -->
                <div
                    class="mt-6 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-lg shadow-emerald-500/30 p-6">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                            <span class="icon-[tabler--coins] size-7 text-white"></span>
                        </div>
                        <div>
                            <p class="text-emerald-100 text-sm font-medium">Total Nilai</p>
                            <p class="text-2xl font-bold text-white mt-1" x-text="formatRupiah(totalValue)">Rp 0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            });

            function InventoryDetails() {
                return {
                    data: [],
                    products: [],
                    filteredProducts: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',
                    totalValue: 0,
                    searchDebounce: null,

                    search: {
                        range: 15,
                        date_range: '',
                        barang_id: '',
                        barang_search: '',
                        selected_product: ''
                    },

                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                range: this.search.range ?? "",
                                estimasi: this.search.date_range ?? "",
                                barang_id: this.search.barang_id ?? "",
                            });
                            url = `/inventory/get-detail-json?${params.toString()}`;
                        }

                        axios.get(url)
                            .then(res => {
                                const response = res.data.data;
                                this.data = response.data;
                                this.links = this.processPaginationLinks(response.links);
                                this.nextPage = response.next_page_url ? this.addParamsToUrl(response.next_page_url) : null;
                                this.prevPage = response.prev_page_url ? this.addParamsToUrl(response.prev_page_url) : null;
                                this.calculateTotalValue();
                            })
                            .catch(erres => {
                                console.log(erres);
                            });
                    },

                    processPaginationLinks(links) {
                        return links.map(link => {
                            if (link.url) {
                                return {
                                    ...link,
                                    url: this.addParamsToUrl(link.url)
                                };
                            }
                            return link;
                        });
                    },

                    addParamsToUrl(url) {
                        if (!url) return null;
                        const newUrl = new URL(url);
                        const searchParams = new URLSearchParams(newUrl.search);

                        searchParams.set('range', this.search.range);
                        searchParams.set('estimasi', this.search.date_range);
                        searchParams.set('barang_id', this.search.barang_id);

                        newUrl.search = searchParams.toString();
                        return newUrl.toString();
                    },

                    nextPageFunc() {
                        if (this.nextPage) {
                            this.getData(this.nextPage);
                        }
                    },

                    prevPageFunc() {
                        if (this.prevPage) {
                            this.getData(this.prevPage);
                        }
                    },

                    searchFunc() {
                        const params = new URLSearchParams({
                            range: this.search.range,
                            estimasi: this.search.date_range,
                            barang_id: this.search.barang_id
                        });
                        url = `/inventory/get-detail-json?${params.toString()}`;
                        this.getData(url);
                    },

                    resetFilter() {
                        this.search = {
                            range: 15,
                            date_range: '',
                            barang_id: '',
                            barang_search: '',
                            selected_product: ''
                        };
                        this.filteredProducts = this.products;
                        this.getData();
                    },

                    calculateTotalValue() {
                        this.totalValue = this.data.reduce((sum, item) => {
                            const price = item.barang && item.barang.price ? parseFloat(item.barang.price) : 0;
                            return sum + (price * parseInt(item.jumlah));
                        }, 0);
                    },

                    formatRupiah(value) {
                        return new Intl.NumberFormat('id-ID').format(value);
                    },

                    formatTanggal(date) {
                        if (!date) return '-';
                        const d = new Date(date);
                        return d.toLocaleDateString('id-ID', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric'
                        });
                    },

                    getProducts() {
                        axios.get('/inventory/get-referensi-barang')
                            .then(res => {
                                this.products = res.data.data;
                                this.filteredProducts = res.data.data;
                            })
                            .catch(err => {
                                console.log(err);
                            });
                    },

                    searchProducts() {
                        // Clear previous debounce timer
                        if (this.searchDebounce) {
                            clearTimeout(this.searchDebounce);
                        }

                        // Set new debounce timer
                        this.searchDebounce = setTimeout(() => {
                            const searchTerm = this.search.barang_search.toLowerCase();

                            if (searchTerm === '') {
                                // If search is empty, show all products
                                this.filteredProducts = this.products;
                            } else {
                                // Filter products locally first for better UX
                                this.filteredProducts = this.products.filter(product =>
                                    product.nama_barang.toLowerCase().includes(searchTerm)
                                );

                                // Also call API for additional results
                                axios.get('/inventory/get-referensi-barang', {
                                    params: {
                                        search: searchTerm
                                    }
                                })
                                .then(res => {
                                    const apiProducts = res.data.data;
                                    // Merge API results with local results, removing duplicates
                                    const combined = [...this.filteredProducts];
                                    apiProducts.forEach(apiProduct => {
                                        if (!combined.find(p => p.id === apiProduct.id)) {
                                            combined.push(apiProduct);
                                        }
                                    });
                                    this.filteredProducts = combined;
                                })
                                .catch(err => {
                                    console.log(err);
                                });
                            }
                        }, 300); // 300ms debounce delay
                    },

                    selectProduct(product) {
                        this.search.barang_id = product.id;
                        this.search.selected_product = product.nama_barang;
                        this.search.barang_search = '';
                        this.filteredProducts = [];
                    },

                    clearProduct() {
                        this.search.barang_id = '';
                        this.search.selected_product = '';
                        this.search.barang_search = '';
                        this.filteredProducts = this.products;
                    },

                    selectFirstProduct() {
                        if (this.filteredProducts.length > 0) {
                            this.selectProduct(this.filteredProducts[0]);
                        }
                    },

                    init() {
                        this.getProducts();
                        this.getData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
