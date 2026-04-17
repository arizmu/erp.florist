<x-base-layout>

    <div x-data="IndexInventory">
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
                        Produksi
                    </li>
                </ol>
            </div>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-xl md:text-1xl font-bold text-gray-700 flex items-center gap-3">
                        <span
                            class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2.5 shadow-lg shadow-blue-500/30">
                            <span class="icon-[tabler--file-invoice] size-5 text-white"></span>
                        </span>
                        Manajemen Inventory
                    </h1>
                    <p class="text-gray-500 mt-2 ml-1">Kelola data inventory masuk dan keluar</p>
                </div>
                <a href="{{ route('inventory.form') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-blue-500/40 hover:-translate-y-0.5">
                    <span class="icon-[tabler--plus] size-5"></span>
                    <span>Penerimaan Barang</span>
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
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Inventory</h2>
                            <div class="flex items-center gap-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300">
                                    <span class="icon-[tabler--database] size-3 mr-1"></span>
                                    <span x-text="data.length">0</span> Data
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
                                        Supplier</th>
                                    <th
                                        class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                        Faktur</th>
                                    <th
                                        class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                        Comment</th>
                                    <th
                                        class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                        Date</th>
                                    <th
                                        class="px-6 py-3.5 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                <template x-for="val in data" :key="val.id">
                                    <tr
                                        class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex-shrink-0 w-9 h-9 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                                                    <span
                                                        class="icon-[tabler--building-factory-2] size-4 text-white"></span>
                                                </div>
                                                <span class="font-medium text-gray-900 dark:text-white"
                                                    x-text="val.supplier">-</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-sm font-medium bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300"
                                                x-text="val.factur_number">-</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-gray-600 dark:text-gray-300 text-sm"
                                                x-text="val.comment">-</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="badge" :class="val.status ? 'badge-success' : 'badge-warning'"
                                                x-text="val.status ? 'barang masuk' : 'barang keluar' ">-</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center gap-2 text-gray-600 dark:text-gray-300 text-sm">
                                                <span class="icon-[tabler--calendar] size-4 text-gray-400"></span>
                                                <span x-text="val.tanggal">-</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-2">
                                                <button x-on:click="getDetailInventory(val)" type="button"
                                                    class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-all duration-200 hover:scale-105"
                                                    aria-label="View details">
                                                    <span class="icon-[tabler--eye] size-4"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="data.length === 0">
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div
                                                class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                                <span class="icon-[tabler--inbox] size-8 text-gray-400"></span>
                                            </div>
                                            <p class="text-gray-500 dark:text-gray-400 font-medium">Tidak ada data
                                                inventory</p>
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
                                <input x-model="search.estimasi" type="text"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                    placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" />
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--calendar] size-5"></span>
                                </span>
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--status-change] size-4 text-gray-400"></span>
                                    Status
                                </span>
                            </label>
                            <div class="relative">
                                <select x-model="search.status"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200"
                                    aria-label="Select status">
                                    <option value="">Pilih Status...</option>
                                    <option value="1">Inventory Masuk</option>
                                    <option value="0">Inventory Keluar</option>
                                </select>
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--chevron-down] size-5"></span>
                                </span>
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
                            <button x-on:click="search = { range: 15, estimasi: '', status: '' }; getData();"
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
            </div>
        </div>

        <!-- Modal Trigger Button (Hidden) -->
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="slide-up-animated-modal" data-overlay="#slide-up-animated-modal"
            id="btn-open-modal-detail">
            Open modal detail
        </button>

        <!-- Detail Modal -->
        <div id="slide-up-animated-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div
                class="overlay-animation-target modal-dialog overlay-open:mt-4 overlay-open:opacity-100 overlay-open:duration-500 mt-12 transition-all ease-out">
                <div class="modal-content bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden">
                    <!-- Modal Header -->
                    <div
                        class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-white dark:from-gray-700 dark:to-gray-800">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                    <span class="icon-[tabler--eye] size-5 text-white"></span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Detail Inventory</h3>
                            </div>
                            <button type="button"
                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200"
                                aria-label="Close" data-overlay="#slide-up-animated-modal">
                                <span class="icon-[tabler--x] size-5"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="p-6">
                        <!-- Info Cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                                <div class="flex items-center gap-3 mb-2">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                                        <span
                                            class="icon-[tabler--building-factory-2] size-4 text-purple-600 dark:text-purple-400"></span>
                                    </div>
                                    <span
                                        class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Supplier</span>
                                </div>
                                <p class="text-base font-semibold text-gray-900 dark:text-white"
                                    x-text="details.supplier">-</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                                <div class="flex items-center gap-3 mb-2">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center">
                                        <span
                                            class="icon-[tabler--calendar] size-4 text-emerald-600 dark:text-emerald-400"></span>
                                    </div>
                                    <span
                                        class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</span>
                                </div>
                                <p class="text-base font-semibold text-gray-900 dark:text-white"
                                    x-text="details.tanggal">-</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                                <div class="flex items-center gap-3 mb-2">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                                        <span
                                            class="icon-[tabler--receipt] size-4 text-blue-600 dark:text-blue-400"></span>
                                    </div>
                                    <span
                                        class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nomor
                                        Faktur</span>
                                </div>
                                <p class="text-base font-semibold text-gray-900 dark:text-white"
                                    x-text="details.faktur">-</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                                <div class="flex items-center gap-3 mb-2">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center">
                                        <span
                                            class="icon-[tabler--message] size-4 text-orange-600 dark:text-orange-400"></span>
                                    </div>
                                    <span
                                        class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Comment</span>
                                </div>
                                <p class="text-base font-semibold text-gray-900 dark:text-white"
                                    x-text="details.comment">-</p>
                            </div>
                        </div>

                        <!-- Items Table -->
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl overflow-hidden">
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-600">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Daftar Barang</h4>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-white dark:bg-gray-600">
                                            <th
                                                class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                                Nama Barang</th>
                                            <th
                                                class="px-4 py-3 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                                Qty In</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                        <template x-for="val in items" :key="val.barang_id">
                                            <tr
                                                class="hover:bg-white dark:hover:bg-gray-600 transition-colors duration-150">
                                                <td class="px-4 py-3">
                                                    <span class="text-sm font-medium text-gray-900 dark:text-white"
                                                        x-text="val.barang.nama_barang">-</span>
                                                </td>
                                                <td class="px-4 py-3 text-center">
                                                    <span
                                                        class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg text-sm font-medium bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300"
                                                        x-text="val.jumlah">-</span>
                                                </td>
                                            </tr>
                                        </template>
                                        <tr x-show="items.length === 0">
                                            <td colspan="2" class="px-4 py-8 text-center">
                                                <div class="flex flex-col items-center gap-2">
                                                    <span class="icon-[tabler--box] size-8 text-gray-400"></span>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tidak ada
                                                        barang</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div
                        class="px-6 py-4 border-t border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                        <button type="button"
                            class="inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200"
                            data-overlay="#slide-up-animated-modal">
                            <span class="icon-[tabler--x] size-4"></span>
                            Tutup
                        </button>
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

            function IndexInventory() {
                return {
                    items: [],
                    details: {
                        supplier: '',
                        faktur: '',
                        tanggal: '',
                        comment: ''
                    },
                    getDetailInventory(key) {
                        // Clear previous items
                        this.items = [];

                        axios.get('/inventory/get-detail-inventory', {
                                params: {
                                    key: key.id
                                }
                            })
                            .then((response) => {
                                const data = response.data.data;
                                this.items = data;
                            })
                            .catch((errorResponse) => {
                                console.error('Error loading inventory details:', errorResponse);
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Gagal mengambil detail inventory',
                                    icon: 'error'
                                });
                            })
                            .finally(() => {
                                this.details = {
                                    supplier: key.supplier,
                                    faktur: key.factur_number,
                                    tanggal: key.tanggal,
                                    comment: key.comment
                                };

                                const btnModal = document.getElementById('btn-open-modal-detail');
                                btnModal.click();
                            });
                    },

                    // inventories: [],
                    // async getInventory() {
                    //     const url = '/inventory/get-inventory-data';
                    //     const response = await axios.get(url, {
                    //         params: {
                    //             'key': ''
                    //         }
                    //     });
                    //     this.inventories = response.data.data;
                    // },

                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',

                    search: {
                        range: 15,
                        estimasi: '',
                        status: ''
                    },

                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                range: this.search.range ?? "",
                                estimasi: this.search.estimasi ?? "",
                                status: this.search.status ?? "",
                            });
                            url = `/inventory/get-inventory-data?${params.toString()}`;
                        }

                        axios.get(url)
                            .then(res => {
                                const response = res.data.data;

                                this.data = response.data;
                                this.links = this.processPaginationLinks(response.links);
                                this.nextPage = response.next_page_url ? this.addParamsToUrl(response.next_page_url) : null;
                                this.prevPage = response.prev_page_url ? this.addParamsToUrl(response.prev_page_url) : null;
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

                        searchParams.set('status', this.search.status);
                        searchParams.set('range', this.search.range);
                        searchParams.set('estimasi', this.search.estimasi);

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

                        console.log('Search params before send:', this.search);
                        const params = new URLSearchParams({
                            status: this.search.status,
                            range: this.search.range,
                            estimasi: this.search.estimasi
                        });
                        url = `/inventory/get-inventory-data?${params.toString()}`;
                        console.log('Final URL:', url);
                        this.getData(url);
                    },

                    init() {
                        this.getData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
