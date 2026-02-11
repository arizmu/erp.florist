<x-base-layout>
    <div class="py-4" x-data="helloCrafter">
        <!-- Page Header -->
        <div class="mb-6">
            <!-- Breadcrumbs -->
            <div class="breadcrumbs mb-4 text-sm">
                <ol>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-primary transition-colors">
                            <span class="icon-[tabler--home] size-5"></span>
                            Home
                        </a>
                    </li>
                    <li class="breadcrumbs-separator rtl:rotate-180">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </li>
                    <li>
                        <a href="#" aria-label="Reports" class="hover:text-primary transition-colors">
                            <span class="icon-[tabler--chart-bar]"></span>
                            Laporan
                        </a>
                    </li>
                    <li class="breadcrumbs-separator rtl:rotate-180">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </li>
                    <li aria-current="page" class="font-medium text-primary">
                        <span class="icon-[tabler--file-invoice me-1 size-5"></span>
                        Detail Penjualan
                    </li>
                </ol>
            </div>

            <!-- Page Title -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-xl md:text-1xl font-bold text-gray-700 flex items-center gap-3">
                        <span class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl p-2.5 shadow-lg shadow-emerald-500/30">
                            <span class="icon-[tabler--file-invoice] size-5 text-white"></span>
                        </span>
                        Detailed Sales Report
                    </h1>
                    <p class="text-gray-500 mt-2 ml-1">View detailed breakdown of each transaction</p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
            <!-- Left Column - Data Table -->
            <div class="xl:col-span-9 order-2 xl:order-1">
                <div class="card shadow-xl border-0">
                    <!-- Card Header -->
                    <div class="card-header bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-4">
                        <div class="flex items-center gap-3 text-white">
                            <span class="icon-[tabler--table] size-6"></span>
                            <h3 class="text-xl font-bold">Transaction Details</h3>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-6">
                        <div class="border-2 border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="font-semibold text-gray-600">Date</th>
                                            <th class="font-semibold text-gray-600">Product Name</th>
                                            <th class="font-semibold text-gray-600">Code</th>
                                            <th class="font-semibold text-gray-600">Price</th>
                                            <th class="font-semibold text-gray-600">Qty</th>
                                            <th class="font-semibold text-gray-600">Customer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in data">
                                            <tr class="hover:bg-emerald-50/50 transition-colors">
                                                <td class="text-gray-600" x-text="item.transaction.transaction_date ?? ''"></td>
                                                <td class="font-medium text-gray-800" x-text="item.item_name"></td>
                                                <td>
                                                    <span class="badge badge-soft badge-primary font-mono text-xs" x-text="item.code_product"></span>
                                                </td>
                                                <td class="font-semibold text-green-600" x-text="formatRupiah(item.cost_item)"></td>
                                                <td>
                                                    <span class="badge badge-soft badge-info px-3 py-1" x-text="item.amount_item"></span>
                                                </td>
                                                <td class="text-gray-700" x-text="item.transaction.costumer.name ?? '-'"></td>
                                            </tr>
                                        </template>

                                        <!-- Empty State -->
                                        <tr x-show="data.length === 0">
                                            <td colspan="6">
                                                <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                                                    <div class="bg-emerald-50 rounded-full p-4 mb-4">
                                                        <span class="icon-[tabler--file-invoice-x] size-12 text-emerald-400"></span>
                                                    </div>
                                                    <p class="font-medium">No transaction details found</p>
                                                    <p class="text-sm">Try adjusting your filter criteria</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="pt-6 flex justify-end">
                            <nav class="flex gap-2">
                                <button type="button" class="btn btn-soft btn-secondary gap-2 px-4 hover:scale-105 transition-transform shadow-sm"
                                    @click="prevPageFunc" :disabled="!prevPage"
                                    :class="{'opacity-50 cursor-not-allowed': !prevPage}">
                                    <span class="icon-[heroicons-outline--arrow-circle-left] size-5"></span>
                                    <span class="hidden sm:inline">Previous</span>
                                </button>
                                <button type="button" class="btn btn-soft btn-secondary gap-2 px-4 hover:scale-105 transition-transform shadow-sm"
                                    :disabled="!nextPage" @click="nextPageFunc"
                                    :class="{'opacity-50 cursor-not-allowed': !nextPage}">
                                    <span class="hidden sm:inline">Next</span>
                                    <span class="icon-[heroicons-outline--arrow-circle-right] size-5"></span>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Filter Sidebar -->
            <div class="xl:col-span-3 order-1 xl:order-last">
                <div class="card shadow-xl border-0">
                    <!-- Card Header -->
                    <div class="card-header bg-gradient-to-r from-teal-500 to-cyan-600 px-6 py-4">
                        <div class="flex items-center gap-3 text-white">
                            <span class="icon-[tabler--filter] size-6"></span>
                            <h3 class="text-xl font-bold">Filter Report</h3>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-6">
                        <div class="space-y-5">
                            <!-- Date Range -->
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <span class="icon-[tabler--calendar] size-4 text-teal-500"></span>
                                    Period Range
                                </label>
                                <div class="relative">
                                    <input type="text" placeholder="Select date range..."
                                        class="w-full pl-12 pr-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all duration-200 shadow-sm"
                                        x-model="search.estimasi" id="flatpickr-range" />
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                        <span class="icon-[tabler--calendar] size-5"></span>
                                    </span>
                                </div>
                            </div>

                            <!-- Data Range -->
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <span class="icon-[tabler--list-numbers] size-4 text-cyan-500"></span>
                                    Data Range
                                </label>
                                <div class="relative">
                                    <select class="select h-12 w-full pl-12 pr-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-500/10 transition-all duration-200 shadow-sm"
                                        x-model="search.range">
                                        <option value="15">15 items</option>
                                        <option value="25">25 items</option>
                                        <option value="50">50 items</option>
                                        <option value="100">100 items</option>
                                    </select>
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <span class="icon-[tabler--list-numbers] size-5"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer border-t border-gray-200 px-6 py-4 bg-gray-50">
                        <div class="flex flex-col gap-3">
                            <button class="btn btn-primary w-full gap-2 font-semibold shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300 rounded-xl" @click="searchFunc">
                                <span class="icon-[tabler--filter] size-5"></span>
                                Apply Filter
                            </button>
                            <button class="btn btn-soft btn-error w-full gap-2 font-semibold hover:scale-105 transition-transform rounded-xl" @click="exportPDF">
                                <span class="icon-[tabler--file-pdf] size-5"></span>
                                Export PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            function helloCrafter() {
                return {
                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',

                    search: {
                        crafter: '',
                        range: 15,
                        estimasi: ''
                    },

                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                range: this.search.range ?? "",
                                estimasi: this.search.estimasi ?? ""
                            });
                            url = `/laporan/penjualan-detail-json?${params.toString()}`;
                        }
                        // notifier.info("loading data...");
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
                            range: this.search.range,
                            estimasi: this.search.estimasi
                        });
                        url = `/laporan/penjualan-detail-json?${params.toString()}`;
                        this.getData(url);
                    },

                    crafters: '',
                    getCrafter() {
                        axios.get('/transaksi/get-crafter')
                            .then(res => {
                                const crafters = res.data;
                                this.crafters = crafters.data;
                            })
                            .catch(err => {
                                console.log(err);
                            });
                    },

                    exportPDF() {
                        if (this.search.estimasi === '') {
                            alert('Harap pilih periode terlebih dahulu!');
                            return;
                        }
                        window.open(
                            `/laporan/export/penjualan-detail?crafter=${this.search.crafter}&estimasi=${this.search.estimasi}`,
                            '_blank', 'width=800, height=800');
                    },

                    init() {
                        this.getCrafter()
                        this.getData()
                    }
                }
            }
        </script>
        <script>
            window.addEventListener('load', function() {
                // Range Date Picker
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            })
        </script>
    @endpush
</x-base-layout>
