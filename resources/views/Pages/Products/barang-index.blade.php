<x-base-layout>
    <!-- Breadcrumbs -->
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
                Barang
            </li>
        </ol>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6" x-data="IndexBarang">
        <!-- Main Content -->
        <div class="lg:col-span-9">
            <!-- Page Header -->
            <div class="mb-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Barang | Bahan Baku</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Kelola data barang, Bahan baku product
                        </p>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 mb-6">
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <input type="text"
                            class="w-full pl-11 pr-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                            x-model="search.keyword" placeholder="Cari barang berdasarkan nama..."
                            @keyup.enter="searchFunc">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <span class="icon-[tabler--search] size-5"></span>
                        </span>
                    </div>
                    <button
                        class="inline-flex items-center justify-center gap-2 px-5 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-blue-500/40 hover:-translate-y-0.5"
                        type="button" x-on:click="searchFunc">
                        <span class="icon-[mingcute--search-3-line] size-4"></span>
                        <span>Cari</span>
                    </button>
                </div>
            </div>

            <!-- Product Table Card -->
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
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Harga</th>
                                <th
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Satuan</th>
                                <th
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Kategori</th>
                                <th
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Jenis
                                </th>
                                <th
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Tanggal</th>
                                <th
                                    class="px-6 py-3.5 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            <template x-for="barang in data" :key="barang.id">
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150"
                                    :class="barang.stock <= 0 ? 'bg-red-100 dark:bg-red-900/30' : ''">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
                                                <span class="icon-[tabler--package] size-5 text-white"></span>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900 dark:text-white"
                                                    x-text="barang.nama_barang">-</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400"
                                                    x-text="barang.comment">-</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div
                                            class="flex items-center gap-1.5 text-gray-900 dark:text-white font-semibold">
                                            <span class="text-gray-400">Rp</span>
                                            <span x-text="formatRupiah(barang.price)">-</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-purple-50 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300"
                                            x-text="barang.satuan.nama_satuan">-</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300"
                                            x-text="barang.category.category_name">-</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="badge badge-soft"
                                            :class="barang.is_bahan_baku ? 'badge-error' : 'badge-primary'"
                                            x-text="barang.is_bahan_baku ? 'Bahan Non Produksi' : 'Barang Produksi'">Produk</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300 text-sm">
                                            <span class="icon-[tabler--calendar] size-4 text-gray-400"></span>
                                            <span x-text="formatTanggalNoTime(barang.updated_at)">-</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button type="button" x-on:click="getEdit(barang)"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/50 transition-all duration-200 hover:scale-105"
                                                aria-label="Edit barang">
                                                <span class="icon-[mdi--circle-edit-outline] size-4"></span>
                                            </button>
                                            <button x-on:click="deleteBarang(barang.id)" type="button"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/50 transition-all duration-200 hover:scale-105"
                                                aria-label="Delete barang">
                                                <span class="icon-[tabler--trash] size-4"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            <tr x-show="data.length === 0">
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div
                                            class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="icon-[tabler--package] size-8 text-gray-400"></span>
                                        </div>
                                        <p class="text-gray-500 dark:text-gray-400 font-medium">Tidak ada data barang
                                        </p>
                                        <p class="text-sm text-gray-400 dark:text-gray-500">Gunakan form di samping
                                            untuk menambah barang baru</p>
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

        <!-- Sidebar - Form -->
        <div class="lg:col-span-3">
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 sticky top-6">
                <!-- Form Header -->
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
                            <span class="icon-[tabler--align-box-top-right] size-5 text-white"></span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white"
                                x-text="isUpdated ? 'Edit Barang' : 'Tambah Barang'">Tambah Barang</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400"
                                x-text="isUpdated ? 'Update data barang' : 'Input data barang baru'">Input data barang
                                baru</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form @submit.prevent="isUpdated ? postUpdate : storeBarang">
                    <div class="p-6 space-y-5">
                        <!-- Nama Barang -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--package] size-4 text-gray-400"></span>
                                    Nama Barang
                                </span>
                            </label>
                            <div class="relative">
                                <input x-model="sForm.nama_barang" x-bind:disabled="isUpdated ? true : false"
                                    type="text" placeholder="Masukkan nama barang"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                    :class="isUpdated ? 'bg-gray-100 dark:bg-gray-700' : ''" />
                            </div>
                        </div>

                        <!-- Satuan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--scale] size-4 text-gray-400"></span>
                                    Satuan
                                </span>
                            </label>
                            <div class="relative">
                                <select x-model="sForm.satuan_id"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200">
                                    <option value="">Pilih Satuan...</option>
                                    <template x-for="item in satuan">
                                        <option :value="item.id" x-text="item.nama_satuan"></option>
                                    </template>
                                </select>
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--chevron-down] size-5"></span>
                                </span>
                            </div>
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--category] size-4 text-gray-400"></span>
                                    Kategori
                                </span>
                            </label>
                            <div class="relative">
                                <select x-model="sForm.category_id"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200">
                                    <option value="">Pilih Kategori...</option>
                                    <template x-for="value in category" :key="value.id">
                                        <option :value="value.id" x-text="value.category_name"></option>
                                    </template>
                                </select>
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--chevron-down] size-5"></span>
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--category] size-4 text-gray-400"></span>
                                    Jenis
                                </span>
                            </label>
                            <div class="relative">
                                <select x-model="sForm.is_bahan_baku"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200">
                                    <option value="">Pilih Jenis...</option>
                                    <option :value="0" x-text="'Barang Produksi'"></option>
                                    <option :value="1" x-text="'Bahan Non Produksi'"></option>
                                </select>
                                <span
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--chevron-down] size-5"></span>
                                </span>
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
                            <textarea x-model="sForm.comment"
                                class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none"
                                rows="3" placeholder="Masukkan keterangan barang"></textarea>
                        </div>

                        <!-- Harga -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--currency-dollar] size-4 text-gray-400"></span>
                                    Harga Jual
                                </span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">Rp</span>
                                <input x-model="sForm.harga" type="text" placeholder="Masukkan harga jual"
                                    class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="px-6 pb-6">
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" x-on:click="resetForm"
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                                <span class="icon-[ic--twotone-reset-tv] size-4"></span>
                                Reset
                            </button>
                            <button type="submit" :disabled="isAction"
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-blue-500/40 hover:-translate-y-0.5">
                                <span class="icon-[proicons--save] size-4"></span>
                                <span
                                    x-text="isAction ? 'Loading...' : (isUpdated ? 'Update' : 'Simpan')">Simpan</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Quick Stats Card -->
            <div
                class="mt-6 bg-gradient-to-br from-orange-500 to-amber-600 rounded-2xl shadow-lg shadow-orange-500/30 p-6">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <span class="icon-[tabler--package] size-7 text-white"></span>
                    </div>
                    <div>
                        <p class="text-orange-100 text-sm font-medium">Total Barang</p>
                        <p class="text-3xl font-bold text-white mt-1" x-text="data.length">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function IndexBarang() {
                return {
                    dataBarang: [],
                    category: [],
                    satuan: [],
                    sForm: {
                        id: '',
                        harga: '',
                        nama_barang: '',
                        satuan_id: '',
                        category_id: '',
                        satuan_id: '',
                        comment: '',
                        is_bahan_baku: '',
                    },
                    isAction: false,
                    isUpdated: false,
                    getEdit(item) {
                        // console.log(item);
                        this.isUpdated = true;
                        this.sForm.nama_barang = item.nama_barang;
                        this.sForm.category_id = item.category_barang_id;
                        this.sForm.comment = item.comment;
                        this.sForm.id = item.id;
                        this.sForm.harga = item.price;
                        this.sForm.is_bahan_baku = item.is_bahan_baku;
                        this.sForm.satuan_id = item.satuan.id;
                    },

                    async postUpdate() {
                        this.isAction = true;

                        const sweeLoad = Swal.fire({
                            icon: 'info',
                            title: 'Loading',
                            html: 'Please wait...',
                            allowOutsideClick: false,
                            onBeforeOpen: () => {
                                sweeLoad.showLoading();
                            },
                        })

                        const item = this.sForm;
                        let url = `/master-barang/barang-update/${item.id}`;
                        let data = {
                            nama_barang: item.nama_barang,
                            harga: item.harga,
                            category_id: item.category_id,
                            satuan: item.satuan_id,
                            comment: item.comment,
                            is_bahan_baku: item.is_bahan_baku,
                        };
                        try {
                            const response = await axios.post(url, data);
                            this.getData();
                            this.resetForm();
                            Swal.fire({
                                title: "Updated!",
                                text: "Your file has been updated.",
                                icon: "success"
                            });
                        } catch (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Your file has not been updated.",
                                icon: "error"
                            });
                        }
                    },

                    deleteBarang(key) {
                        let url = `/master-barang/barang-destroy/${key}`;
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
                                    const response = await fetch(url);
                                    const res = await response.json();
                                    if (res.code === 400) {
                                        Swal.fire({
                                            title: "Error!",
                                            text: res.message,
                                            icon: "error"
                                        });
                                        return;
                                    }
                                    this.getData();
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } catch (error) {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Your file has been deleted.",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    },

                    async storeBarang() {
                        this.isAction = true;
                        try {
                            const url = "/master-barang/barang-store"
                            const response = await axios.post(url, this.sForm);
                            this.getData();
                            this.resetForm();
                            Swal.fire({
                                title: "success",
                                text: "store data is successuflly.",
                                icon: "success"
                            });

                        } catch (error) {
                            Swal.fire({
                                title: "Error",
                                text: "store data is failed.",
                                icon: "error"
                            });
                            this.isAction = false;
                        }

                    },

                    getCagetory() {
                        axios.get("/master-barang/category-json")
                            .then((response) => {
                                this.category = response.data.data.data;
                            })
                            .catch((error) => {
                                console.log(error);
                            })
                    },

                    getSatuan() {
                        const url = '/master-barang/barang-get-satuan';
                        response = axios.get(url)
                            .then((res) => {
                                const data = res.data.data;
                                this.satuan = data;
                            }).catch((err) => {
                                console.log(err);
                            });

                    },

                    resetForm() {
                        this.sForm = {
                            id: '',
                            nama_barang: '',
                            satuan_id: '',
                            category_id: '',
                            satuan_id: '',
                            comment: '',
                            is_bahan_aku: '',
                        }

                        this.isAction = false;
                        this.isUpdated = false;
                    },

                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',
                    search: {
                        keyword: '',
                    },
                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                keywords: this.search.keyword ?? "",
                            });
                            url = `/master-barang/barang-json?${params.toString()}`;
                        }

                        // swall loading
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
                        })

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
                            })
                            .finally(() => {
                                Swal.close();
                            });
                    },
                    // Fungsi untuk menambahkan parameter pencarian ke semua link pagination
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
                    // Fungsi untuk menambahkan parameter pencarian ke URL
                    addParamsToUrl(url) {
                        if (!url) return null;
                        const newUrl = new URL(url);
                        const searchParams = new URLSearchParams(newUrl.search);
                        // Tambahkan parameter pencarian terkini
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
                            keywords: this.search.keyword,
                        });
                        url = `/master-barang/barang-json?${params.toString()}`;
                        this.getData(url);
                    },

                    init() {
                        this.getCagetory()
                        this.getSatuan()
                        this.getData()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
