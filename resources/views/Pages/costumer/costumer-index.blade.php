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
                <span class="icon-[tabler--file] me-1 size-5"></span>
                Referensi jasa
            </li>
        </ol>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6" x-data="referensiIndex()">
        <!-- Main Content - Customer List -->
        <div class="lg:col-span-8">
            <!-- Page Header -->
            <div class="mb-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Customer</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Kelola data customer dan member</p>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 mb-6">
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <input type="text" 
                            class="w-full pl-11 pr-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                            x-model="search.key"
                            placeholder="Cari customer berdasarkan nama, alamat, atau telepon..." 
                            @keyup.enter="searchFunc">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <span class="icon-[tabler--search] size-5"></span>
                        </span>
                    </div>
                    <button class="inline-flex items-center justify-center gap-2 px-5 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-blue-500/40 hover:-translate-y-0.5" 
                        type="button" 
                        @click="searchFunc">
                        <span class="icon-[tabler--user-search] size-4"></span>
                        <span>Cari</span>
                    </button>
                </div>
            </div>

            <!-- Customer Table Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Customer</h2>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300">
                                <span class="icon-[tabler--users] size-3 mr-1"></span>
                                <span x-text="xdataTable.length">0</span> Customer
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50/50 dark:bg-gray-700/50">
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Alamat</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Telepon</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Point Member</th>
                                <th class="px-6 py-3.5 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            <template x-for="item in xdataTable" :key="item.id">
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                                                <span class="icon-[tabler--user] size-5 text-white"></span>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900 dark:text-white" x-text="item.name">-</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400" x-text="item.jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan'">-</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300 text-sm">
                                            <span class="icon-[tabler--map-pin] size-4 text-gray-400"></span>
                                            <span class="max-w-[200px] truncate" x-text="item.alamat">-</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300 text-sm">
                                            <span class="icon-[tabler--phone] size-4 text-gray-400"></span>
                                            <span x-text="item.no_telp">-</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-medium bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300">
                                            <span class="icon-[tabler--star] size-4"></span>
                                            <span x-text="formatRupiah(item.point_member)">-</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button x-on:click="getEdit(item)"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/50 transition-all duration-200 hover:scale-105"
                                                aria-label="Edit customer">
                                                <span class="icon-[material-symbols--edit-square-outline] size-4"></span>
                                            </button>
                                            <button x-on:click="hapus(item)"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/50 transition-all duration-200 hover:scale-105"
                                                aria-label="Delete customer">
                                                <span class="icon-[mi--delete] size-4"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            <tr x-show="xdataTable.length === 0">
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="icon-[tabler--users] size-8 text-gray-400"></span>
                                        </div>
                                        <p class="text-gray-500 dark:text-gray-400 font-medium">Tidak ada data customer</p>
                                        <p class="text-sm text-gray-400 dark:text-gray-500">Gunakan form di samping untuk menambah customer baru</p>
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
                                @click="prevPageFunc"
                                :disabled="!prevPage">
                                <span class="icon-[tabler--chevron-left] size-4"></span>
                                Previous
                            </button>
                            <button type="button" 
                                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 disabled:opacity-50 disabled:cursor-not-allowed disabled:shadow-none transition-all duration-200" 
                                :disabled="!nextPage"
                                @click="nextPageFunc">
                                Next
                                <span class="icon-[tabler--chevron-right] size-4"></span>
                            </button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Sidebar - Form -->
        <div class="lg:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 sticky top-6">
                <!-- Form Header -->
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                            <span class="icon-[tabler--user-plus] size-5 text-white"></span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white" x-text="isUpdated ? 'Edit Customer' : 'Tambah Customer'">Tambah Customer</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400" x-text="isUpdated ? 'Update data customer' : 'Input data customer baru'">Input data customer baru</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form @submit.prevent="isUpdated ? update : store">
                    <div class="p-6 space-y-5">
                        <!-- Customer Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--user] size-4 text-gray-400"></span>
                                    Nama Customer
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                    x-model="xform.costumer"
                                    placeholder="Masukkan nama customer">
                            </div>
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--gender-male-female] size-4 text-gray-400"></span>
                                    Jenis Kelamin
                                </span>
                            </label>
                            <div class="relative">
                                <select class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200" 
                                    x-model="xform.gender">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--chevron-down] size-5"></span>
                                </span>
                            </div>
                        </div>

                        <!-- Address -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--map-pin] size-4 text-gray-400"></span>
                                    Alamat
                                </span>
                            </label>
                            <textarea 
                                class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none" 
                                rows="3"
                                placeholder="Masukkan alamat customer"
                                x-model="xform.address"></textarea>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--phone] size-4 text-gray-400"></span>
                                    Nomor Telepon
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                    x-model="xform.telpon"
                                    placeholder="Masukkan nomor telepon">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--mail] size-4 text-gray-400"></span>
                                    Email
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                    x-model="xform.email"
                                    placeholder="Masukkan email customer">
                            </div>
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
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-blue-500/40 hover:-translate-y-0.5"
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
                        <span class="icon-[tabler--users] size-7 text-white"></span>
                    </div>
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Total Customer</p>
                        <p class="text-3xl font-bold text-white mt-1" x-text="xdataTable.length">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        function referensiIndex() {
            return {
                xsearch: '',
                xdataTable: [],
                xform: {
                    id: '',
                    costumer: '',
                    gender: '',
                    address: '',
                    telpon: '',
                    email: '',
                    point: ''
                },
                isSubmit: false,
                isUpdated: false,
                async store() {
                    this.isSubmit = true;

                },
                getEdit(index) {
                    this.isUpdated = true;
                    this.xform.id = index.id
                    this.xform.costumer = index.name
                    this.xform.gender = index.jenis_kelamin
                    this.xform.address = index.alamat
                    this.xform.telpon = index.no_telp
                    this.xform.email = index.email
                    this.id = index.id
                    console.log(this.xform);

                },

                async update() {
                    this.isSubmit = true;
                    Swal.fire({
                        title: "Are you sure?",
                        text: "udpate this data !",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, update it!"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                                const url = `/costumers/update`;
                                const res = await axios.post(url, this.xform);
                                if (res.status === 200) {
                                    this.getData();
                                    Swal.fire({
                                        title: "Updated!",
                                        text: "Your file has been updated.",
                                        icon: "success"
                                    });
                                    this.isUpdated = false;
                                    this.resetForm();
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Something went wrong.",
                                        icon: "error"
                                    });
                                }
                                this.isSubmit = false;
                            } catch (error) {
                                console.error(error);
                                this.isSubmit = false;
                                Swal.fire({
                                    title: "Error!",
                                    text: "Something went wrong.",
                                    icon: "error"
                                });
                            }
                        }
                    });
                },

                resetForm() {
                    this.isUpdated = false;
                    this.xsearch = '';
                    this.xdataTable = [];
                    this.xform = {
                        id: '',
                        costumer: '',
                        gender: '',
                        address: '',
                        telpon: '',
                        email: '',
                        point: ''
                    };
                },

                hapus(key) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                                console.log(key);
                                const url = `/costumers/delete`;
                                const res = await axios.post(url, key);
                                if (res.status === 200) {
                                    this.getData();
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } else {
                                    console.log(res.status);
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Failed to delete your file.",
                                        icon: "error"
                                    });
                                }
                            } catch (error) {
                                console.log(error.message);
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Invalid deleted request.",
                                    icon: "error"
                                });
                            }
                        }
                    });
                },

                data: [],
                links: [],
                nextPage: '',
                prevPage: '',
                search: {
                    key: ''
                },
                getData(url = "") {
                    if (!url) {
                        const params = new URLSearchParams({
                            key: this.search.key ?? "",
                        });
                        url = `/costumer/data-json?${params.toString()}`;
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
                            this.xdataTable = response.data;
                            this.links = this.processPaginationLinks(response.links);
                            this.nextPage = response.next_page_url ? this.addParamsToUrl(response.next_page_url) : null;
                            this.prevPage = response.prev_page_url ? this.addParamsToUrl(response.prev_page_url) : null;

                        })
                        .catch(erres => {
                            console.log(erres);
                        })
                        .finally(() => {
                            Swal.close();
                        })
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
                        key: this.search.key,
                    });
                    url = `/costumer/data-json?${params.toString()}`;
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
