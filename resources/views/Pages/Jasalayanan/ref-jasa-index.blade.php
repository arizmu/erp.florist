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
                    Referensi Jasa
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-2.5 shadow-lg shadow-purple-500/30">
                        <span class="icon-[tabler--tools] size-6 text-white"></span>
                    </span>
                    Referensi Jasa
                </h1>
                <p class="text-gray-500 mt-2 ml-1">Manage service reference values</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6" x-data="referensiIndex()">
        <!-- Main Content - Data Table -->
        <div class="xl:col-span-8">
            <!-- Search & Filter Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="relative flex-1">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <span class="icon-[tabler--search] size-5"></span>
                        </span>
                        <input type="text" 
                            class="w-full pl-12 pr-4 py-3.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-200" 
                            x-model="search.keyword" 
                            @keyup.enter="searchFunc"
                            placeholder="Search by reference name..." />
                    </div>
                    <button 
                        class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 rounded-xl shadow-lg shadow-purple-500/30 transition-all duration-200 hover:shadow-purple-500/40 hover:-translate-y-0.5" 
                        type="button" 
                        @click="searchFunc">
                        <span class="icon-[teenyicons--search-circle-outline] size-5"></span>
                        Search
                    </button>
                </div>
            </div>

            <!-- Data Table Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-purple-500/20">
                                <span class="icon-[tabler--list-details] size-5 text-white"></span>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-gray-800">Daftar Referensi</h2>
                                <p class="text-xs text-gray-500">Service reference data</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-purple-50 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300">
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
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Referensi</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nilai Min</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nilai Max</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nilai Jasa</th>
                                <th class="px-6 py-3.5 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <template x-for="item in data">
                                <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-100 to-indigo-100 flex items-center justify-center">
                                                <span class="icon-[tabler--tag] size-5 text-purple-600"></span>
                                            </div>
                                            <span class="font-medium text-gray-800" x-text="item.title"></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-blue-50 text-blue-700">
                                            <span x-text="item.min_cost"></span>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-green-50 text-green-700">
                                            <span x-text="item.max_cost"></span>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-semibold text-gray-800">
                                            <span x-text="item.salary"></span>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button x-on:click="getEdit(item)"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/50 transition-all duration-200 hover:scale-105"
                                                aria-label="Edit reference">
                                                <span class="icon-[material-symbols--edit-square-outline] size-4"></span>
                                            </button>
                                            <button x-on:click="hapus(item.id)"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/50 transition-all duration-200 hover:scale-105"
                                                aria-label="Delete reference">
                                                <span class="icon-[tabler--trash-x] size-4"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            <!-- Empty State -->
                            <tr x-show="data.length === 0">
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="icon-[tabler--database-off] size-8 text-gray-400"></span>
                                        </div>
                                        <p class="text-gray-500 dark:text-gray-400 font-medium">Tidak ada data referensi</p>
                                        <p class="text-sm text-gray-400 dark:text-gray-500">Gunakan form di samping untuk menambah referensi baru</p>
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
                                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 rounded-xl shadow-lg shadow-purple-500/30 disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none transition-all duration-200" 
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

        <!-- Sidebar - Form -->
        <div class="xl:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 sticky top-6">
                <!-- Form Header -->
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-white dark:from-gray-700 dark:to-gray-800">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-purple-500/20">
                            <span class="icon-[oui--index-edit] size-5 text-white"></span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white" x-text="isUpdated ? 'Edit Referensi' : 'Tambah Referensi'">Tambah Referensi</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400" x-text="isUpdated ? 'Update data referensi' : 'Input data referensi baru'">Input data referensi baru</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form @submit.prevent="isUpdated ? update : store">
                    <div class="p-6 space-y-5">
                        <!-- Nama Referensi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--tag] size-4 text-gray-400"></span>
                                    Nama Referensi
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                    x-model="xform.referensi"
                                    placeholder="Masukkan nama referensi">
                            </div>
                        </div>

                        <!-- Nilai Min & Max -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--arrow-down] size-4 text-gray-400"></span>
                                        Nilai Min
                                    </span>
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                        x-model="xform.nilai_min"
                                        placeholder="0">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--arrow-up] size-4 text-gray-400"></span>
                                        Nilai Max
                                    </span>
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                        x-model="xform.nilai_max"
                                        placeholder="0">
                                </div>
                            </div>
                        </div>

                        <!-- Salary -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--money] size-4 text-gray-400"></span>
                                    Salary
                                </span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">Rp</span>
                                <input type="text" 
                                    class="w-full pl-12 pr-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                    x-model="xform.salary"
                                    placeholder="0">
                            </div>
                        </div>

                        <!-- Comment -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--message] size-4 text-gray-400"></span>
                                    Comment
                                </span>
                            </label>
                            <textarea 
                                class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none" 
                                rows="3"
                                placeholder="Masukkan komentar..."
                                x-model="xform.comment"></textarea>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="px-6 pb-6">
                        <div class="grid grid-cols-2 gap-3">
                            <button x-on:click="resetForm" type="button"
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                                <span class="icon-[ix--reset] size-4"></span>
                                Reset
                            </button>
                            <button type="submit" 
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 rounded-xl shadow-lg shadow-purple-500/30 transition-all duration-200 hover:shadow-purple-500/40 hover:-translate-y-0.5"
                                :disabled="isSubmit">
                                <span class="icon-[ant-design--save-outlined] size-4"></span>
                                <span x-text="isSubmit ? 'Loading...' : (isUpdated ? 'Update' : 'Simpan')">Simpan</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Quick Stats Card -->
            <div class="mt-6 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl shadow-lg shadow-purple-500/30 p-6">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <span class="icon-[tabler--database] size-7 text-white"></span>
                    </div>
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Total Referensi</p>
                        <p class="text-3xl font-bold text-white mt-1" x-text="data.length">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function referensiIndex() {
                return {
                    xdataTable: [],
                    xform: {
                        id: '',
                        referensi: '',
                        nilai_min: '',
                        nilai_max: '',
                        salary: '',
                        comment: ''
                    },
                    isSubmit: false,
                    isUpdated: false,
                    async store() {
                        this.isSubmit = true;
                        const url = `/ref-jasa/store-data`;
                        const response = await axios.post(url, this.xform);
                        this.getData();
                        this.resetForm();
                    },
                    getEdit(index) {
                        this.isUpdated = true;
                        this.xform = {
                            id: index.id,
                            referensi: index.title,
                            nilai_min: index.min_cost,
                            nilai_max: index.max_cost,
                            salary: index.salary,
                            comment: ''
                        }
                    },
                    async update() {
                        this.isSubmit = true;
                        const formData = this.xform;
                        const url = `/ref-jasa/update-data/${formData.id}`;
                        const response = await axios.post(url, formData);
                        this.isUpdated = false;
                        this.getData();
                        this.resetForm();
                    },
                    async hapus(key) {
                        const url = `/ref-jasa/delete-data/${key}`;
                        const response = await axios.post(url);
                        this.getData();
                    },

                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',
                    search: {
                        keyword: ''
                    },
                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                keywords: this.search.keyword ?? "",
                            });
                            url = `/ref-jasa/get-data-json?${params.toString()}`;
                        }

                        axios.get(url)
                            .then(res => {
                                // this.data = [];
                                const response = res.data.data;
                                this.data = response.data;
                                // Update link pagination dengan parameter pencarian terkini
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
                        searchParams.set('keywords', this.search.keyword);

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
                            keywords: this.search.keyword
                        });
                        url = `/ref-jasa/get-data-json?${params.toString()}`;
                        this.getData(url);
                    },
                    resetForm() {
                        this.xform = {
                            id: '',
                            referensi: '',
                            nilai_min: '',
                            nilai_max: '',
                            salary: '',
                            comment: ''
                        }

                        this.isUpdated = false;
                        this.isSubmit = false;
                    },
                    init() {
                        this.getData();
                        this.resetForm();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
