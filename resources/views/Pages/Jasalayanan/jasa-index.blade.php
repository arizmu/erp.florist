<x-base-layout>
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
                    <a href="#" aria-label="Jasa Layanan" class="hover:text-primary transition-colors">
                        <span class="icon-[tabler--tools]"></span>
                        Jasa Layanan
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li aria-current="page" class="font-medium text-primary">
                    <span class="icon-[tabler--file] me-1 size-5"></span>
                    Jasa Produksi
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span class="bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl p-2.5 shadow-lg shadow-teal-500/30">
                        <span class="icon-[tabler--tools] size-6 text-white"></span>
                    </span>
                    Jasa Produksi
                </h1>
                <p class="text-gray-500 mt-2 ml-1">Manage production service records</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6" x-data="helloCrafter">
        <!-- Main Content - Data Table -->
        <div class="xl:col-span-9">
            <!-- Data Table Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center shadow-lg shadow-teal-500/20">
                                <span class="icon-[tabler--list-details] size-5 text-white"></span>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-gray-800">Daftar Jasa</h2>
                                <p class="text-xs text-gray-500">Production service data</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-teal-50 dark:bg-teal-900/30 text-teal-700 dark:text-teal-300">
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
                            <tr class="bg-gray-50/50">
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Crafter</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kode Bucket</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tgl Produksi</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Biaya Produksi</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jasa</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <template x-for="(item, index) in data" :key="index">
                                <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-teal-100 to-cyan-100 flex items-center justify-center">
                                                <span class="icon-[tabler--user] size-5 text-teal-600"></span>
                                            </div>
                                            <span class="font-medium text-gray-800" x-text="item.crafter.pegawai_name"></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-purple-50 text-purple-700">
                                            <span x-text="item.code_production"></span>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-gray-600" x-text="item.production_date"></span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-semibold text-gray-800">
                                            <span x-text="formatRupiah(item.price_for_sale)"></span>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium"
                                            :class="item.production_status ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700'"
                                            x-text="item.production_status ? 'Done' : 'Undone'"></span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-semibold text-teal-600">
                                            Rp.
                                            <span x-text="formatRupiah(item.nilai_jasa_crafter)"></span>
                                        </span>
                                    </td>
                                </tr>
                            </template>
                            <!-- Empty State -->
                            <tr x-show="data.length === 0">
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="icon-[tabler--database-off] size-8 text-gray-400"></span>
                                        </div>
                                        <p class="text-gray-500 dark:text-gray-400 font-medium">Tidak ada data jasa</p>
                                        <p class="text-sm text-gray-400 dark:text-gray-500">Gunakan filter di samping untuk mencari data</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    <nav class="flex items-center justify-between gap-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Navigasi halaman data
                        </p>
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200" 
                                @click="prevPageFunc"
                                :disabled="!prevPage">
                                <span class="icon-[heroicons-outline--arrow-circle-left] size-4"></span>
                                Previous
                            </button>
                            <button type="button" 
                                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700 rounded-xl shadow-lg shadow-teal-500/30 disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none transition-all duration-200" 
                                :disabled="!nextPage"
                                @click="nextPageFunc">
                                Next
                                <span class="icon-[heroicons-outline--arrow-circle-right] size-4"></span>
                            </button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Sidebar - Filters -->
        <div class="xl:col-span-3">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 sticky top-6">
                <!-- Filter Header -->
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-white dark:from-gray-700 dark:to-gray-800">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center shadow-lg shadow-teal-500/20">
                            <span class="icon-[tabler--filter] size-5 text-white"></span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Filters</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Filter data jasa</p>
                        </div>
                    </div>
                </div>

                <!-- Filter Form -->
                <div class="p-6 space-y-5">
                    <!-- Periode -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center gap-2">
                                <span class="icon-[tabler--calendar] size-4 text-gray-400"></span>
                                Periode
                            </span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                placeholder="Pilih periode..."
                                x-model="search.estimasi"
                                id="flatpickr-range" />
                        </div>
                    </div>

                    <!-- Crafter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center gap-2">
                                <span class="icon-[tabler--user] size-4 text-gray-400"></span>
                                Crafter
                            </span>
                        </label>
                        <div class="relative">
                            <select 
                                class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200" 
                                aria-label="Select crafter"
                                x-model="search.crafter">
                                <option value="">All Crafters</option>
                                <template x-for="crafter in crafters">
                                    <option :value="crafter.id" x-text="crafter.pegawai_name"></option>
                                </template>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <span class="icon-[tabler--chevron-down] size-5"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Data Range -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center gap-2">
                                <span class="icon-[tabler--list] size-4 text-gray-400"></span>
                                Data Range
                            </span>
                        </label>
                        <div class="relative">
                            <select 
                                class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200" 
                                aria-label="Select data range"
                                x-model="search.range">
                                <option value="15">15 items per page</option>
                                <option value="25">25 items per page</option>
                                <option value="50">50 items per page</option>
                                <option value="100">100 items per page</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <span class="icon-[tabler--chevron-down] size-5"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Filter Actions -->
                <div class="px-6 pb-6 border-t border-gray-100 dark:border-gray-700">
                    <div class="grid grid-cols-1 gap-3">
                        <button 
                            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700 rounded-xl shadow-lg shadow-teal-500/30 transition-all duration-200 hover:shadow-teal-500/40 hover:-translate-y-0.5" 
                            type="button" 
                            @click="searchFunc">
                            <span class="icon-[stash--filter] size-4"></span>
                            Apply Filter
                        </button>
                        <button 
                            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 rounded-xl shadow-lg shadow-red-500/30 transition-all duration-200 hover:shadow-red-500/40 hover:-translate-y-0.5" 
                            type="button" 
                            @click="exportPDF">
                            <span class="icon-[foundation--page-export-pdf] size-4"></span>
                            Export PDF
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Stats Card -->
            <div class="mt-6 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl shadow-lg shadow-teal-500/30 p-6">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <span class="icon-[tabler--database] size-7 text-white"></span>
                    </div>
                    <div>
                        <p class="text-teal-100 text-sm font-medium">Total Data</p>
                        <p class="text-3xl font-bold text-white mt-1" x-text="data.length">0</p>
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
                            crafter: this.search.crafter ?? "",
                            range: this.search.range ?? "",
                            estimasi: this.search.estimasi ?? ""
                        });
                        url = `/ref-jasa/jasa-crafter?${params.toString()}`;
                    }
                    Swal.fire({
                        title: "Loading...",
                        text: "Fetching product data.",
                        icon: "info",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        willOpen: () => {
                            Swal.showLoading();
                        }
                    });
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
                        })
                        .finally(() => {
                            Swal.close();
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
                    searchParams.set('crafter', this.search.crafter);
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
                        crafter: this.search.crafter,
                        range: this.search.range,
                        estimasi: this.search.estimasi
                    });
                    url = `/ref-jasa/jasa-crafter?${params.toString()}`;
                    console.log('Final URL:', url);
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
                    window.open(`/ref-jasa/export-pdf?crafter=${this.search.crafter}&estimasi=${this.search.estimasi}`, '_blank', 'width=800, height=800');
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
