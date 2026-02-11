<x-base-layout>
    <div class="mb-6">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs text-sm">
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
                    <a href="#" aria-label="Produksi" class="hover:text-primary transition-colors">
                        <span class="icon-[tabler--factory]"></span>
                        Produksi
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li aria-current="page" class="font-medium text-primary">
                    <span class="icon-[tabler--file-invoice] me-1 size-5"></span>
                    Daftar Produksi
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span
                        class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl p-2.5 shadow-lg shadow-indigo-500/30">
                        <span class="icon-[tabler--factory] size-7 text-white"></span>
                    </span>
                    Manajemen Produksi
                </h1>
                <p class="text-gray-500 mt-2 ml-1">Overview of production orders</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6" x-data="productionIndex">
        <!-- Main Content (Table) -->
        <div class="lg:col-span-3">
            <!-- Production Table Card -->
            <div class="card shadow-lg border-0">
                <div class="card-header px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <span class="icon-[tabler--list-details] size-6 text-gray-600"></span>
                        <h3 class="text-lg font-bold text-gray-800">Daftar Produksi</h3>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="font-semibold text-gray-600">Kode</th>
                                    <th class="font-semibold text-gray-600">Bucket</th>
                                    <th class="font-semibold text-gray-600">Nilai BB</th>
                                    <th class="font-semibold text-gray-600">Biaya Produksi</th>
                                    <th class="font-semibold text-gray-600">Nilai Jual</th>
                                    <th class="font-semibold text-gray-600">Tanggal</th>
                                    <th class="font-semibold text-gray-600">Crafter</th>
                                    <th class="font-semibold text-gray-600">Status</th>
                                    <th class="font-semibold text-gray-600 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="item in data" :key="item.id">
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="font-medium text-gray-800">
                                            <span x-text="item.code_production" class="text-wrap"></span>
                                        </td>
                                        <td>
                                            <span x-text="item.production_title"
                                                class="font-semibold text-gray-800 text-wrap max-w-xs"></span>
                                        </td>
                                        <td class="text-gray-600">
                                            Rp. <span x-text="formatRupiah(item.cost_items)"></span>
                                        </td>
                                        <td class="text-gray-600">
                                            Rp. <span x-text="formatRupiah(item.production_cost) ?? '00'"></span>
                                        </td>
                                        <td class="text-gray-600">
                                            Rp. <span x-text="formatRupiah(item.price_for_sale)"
                                                class="font-semibold"></span>
                                        </td>
                                        <td class="text-gray-600 text-nowrap"
                                            x-text="formatTanggalNoTime(item.created_at)"></td>
                                        <td class="text-gray-600">
                                            <span x-text="item.crafter.pegawai_name"></span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1.5 flex-wrap">
                                                <span class="badge badge-sm badge-soft badge-warning"
                                                    x-show="!item.production_status">
                                                    Production
                                                </span>
                                                <span class="badge badge-sm badge-soft badge-success"
                                                    x-show="item.production_status">
                                                    Complete
                                                </span>
                                                <span class="badge badge-sm badge-soft badge-primary"
                                                    x-show="item.preorder">
                                                    Pre-order
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex gap-1 justify-end">
                                                <button title="Mutasi ke produk" type="button"
                                                    x-on:click="toDistribusi(item.id)"
                                                    class="btn btn-circle btn-sm btn-soft btn-info hover:scale-110 transition-transform"
                                                    aria-label="Distribusi" x-show="item.production_status">
                                                    <span class="icon-[tabler--arrow-back-up-double] size-4"></span>
                                                </button>
                                                <button type="button" x-on:click="toComplate(item.id)"
                                                    class="btn btn-circle btn-sm btn-soft btn-warning hover:scale-110 transition-transform"
                                                    aria-label="Selesai" x-show="!item.production_status"
                                                    title="Selesai">
                                                    <span class="icon-[tabler--checks] size-4"></span>
                                                </button>
                                                <button
                                                    class="btn btn-circle btn-sm btn-soft btn-primary hover:scale-110 transition-transform"
                                                    title="Lihat bahan baku" type="button" @click="detailFunc(item)">
                                                    <span class="icon-[solar--eye-broken] size-4"></span>
                                                </button>
                                                <button @click="deleteProduct(item.id)"
                                                    class="btn btn-circle btn-sm btn-soft btn-error hover:scale-110 transition-transform"
                                                    title="Hapus" type="button">
                                                    <span class="icon-[lucide--trash-2] size-4"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <nav class="flex justify-center gap-2">
                        <button type="button" class="btn btn-outline btn-sm gap-2" @click="prevPageFunc"
                            :disabled="!prevPage" :class="{ 'opacity-50 cursor-not-allowed': !prevPage }">
                            <span class="icon-[heroicons-outline--arrow-circle-left] size-4"></span>
                            Previous
                        </button>
                        <button type="button" class="btn btn-outline btn-sm gap-2" :disabled="!nextPage"
                            @click="nextPageFunc" :class="{ 'opacity-50 cursor-not-allowed': !nextPage }">
                            Next
                            <span class="icon-[heroicons-outline--arrow-circle-right] size-4"></span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Filter Sidebar -->
        <div class="lg:col-span-1">
            <div class="card shadow-lg border-0 sticky top-4">
                <div class="card-header px-6 py-4 bg-gradient-to-r from-indigo-500 to-purple-600">
                    <div class="flex items-center gap-3 text-white">
                        <span class="icon-[tabler--filter] size-6"></span>
                        <h3 class="text-lg font-bold">Filter Produksi</h3>
                    </div>
                </div>
                <div class="card-body p-6">
                    <div class="flex flex-col gap-4">
                        <!-- Keyword Search -->
                        <div class="relative">
                            <label class="label label-text font-medium mb-1">Keywords</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-3 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--search] size-4"></span>
                                </span>
                                <input type="text" placeholder="Cari produksi..."
                                    class="input input-bordered pl-10 w-full" id="seach_keyword"
                                    x-model="search.keyword" />
                            </div>
                        </div>

                        <!-- Date Range -->
                        <div class="relative">
                            <label class="label label-text font-medium mb-1">Tanggal</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-3 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--calendar] size-4"></span>
                                </span>
                                <input x-model="search.estimasi" type="text"
                                    class="input input-bordered pl-10 w-full flatpickr-input"
                                    placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range"
                                    readonly="readonly" />
                            </div>
                        </div>

                        <!-- Status Filter -->
                        <div class="relative">
                            <label class="label label-text font-medium mb-1">Status</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-3 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--status] size-4"></span>
                                </span>
                                <select x-model="search.status" class="select pl-10 w-full"
                                    aria-label="Filter by status" id="search_status">
                                    <option value="">Semua Status</option>
                                    <option value="n">Produksi</option>
                                    <option value="y">Selesai</option>
                                </select>
                            </div>
                        </div>

                        <!-- Crafter Filter -->
                        <div class="relative">
                            <label class="label label-text font-medium mb-1">Crafter</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-3 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--user] size-4"></span>
                                </span>
                                <select x-model="search.crafter" class="select pl-10 w-full"
                                    aria-label="Filter by crafter" id="search_crafter">
                                    <option value="">Semua Crafter</option>
                                </select>
                            </div>
                        </div>

                        <!-- Data Range -->
                        <div class="relative">
                            <label class="label label-text font-medium mb-1">Data Range</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-3 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--list-numbers] size-4"></span>
                                </span>
                                <select x-model="search.range" class="select pl-10 w-full"
                                    aria-label="Select data range" id="search_range">
                                    <option value="15">15</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-6 bg-gray-50 border-t border-gray-200">
                    <div class="flex flex-col gap-2">
                        <button class="btn btn-primary gap-2 w-full" type="button" @click="searchFunc">
                            <span class="icon-[ci--note-search] size-5"></span>
                            Filter
                        </button>
                        <a href="{{ route('produksi.baru.index') }}" class="btn btn-outline btn-error gap-2 w-full">
                            <span class="icon-[tabler--plus] size-5"></span>
                            Produksi Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal: Production Detail -->
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" id="open-modal-detail"
            aria-expanded="false" aria-controls="large-modal" data-overlay="#large-modal">
            Large
        </button>

        <div id="large-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog" tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100 modal-dialog-lg">
                <div class="modal-content rounded-2xl shadow-2xl">
                    <div class="modal-header px-6 py-4 border-b border-gray-100">
                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl p-2">
                                    <span class="icon-[tabler--file-description] size-6 text-white"></span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">Detail Produksi</h3>
                                    <p class="text-sm text-gray-500">Daftar bahan baku produksi</p>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-ghost btn-circle btn-sm hover:bg-red-50 hover:text-red-600"
                                aria-label="Close" data-overlay="#large-modal">
                                <span class="icon-[tabler--x] size-5"></span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body p-6">
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="table table-sm">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="font-semibold text-gray-600">Nama</th>
                                            <th class="font-semibold text-gray-600">Jumlah</th>
                                            <th class="font-semibold text-gray-600">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in details">
                                            <tr class="hover:bg-gray-50">
                                                <td class="text-gray-800" x-text="item.nama"></td>
                                                <td class="text-gray-600" x-text="item.jumlah"></td>
                                                <td>
                                                    <span class="badge badge-sm badge-soft badge-info"
                                                        x-show="!item.status">Lainnya</span>
                                                    <span class="badge badge-sm badge-soft badge-primary"
                                                        x-show="item.status">Bahan Baku</span>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-2xl">
                        <button type="button" class="btn btn-ghost gap-2 hover:bg-gray-200 w-full"
                            data-overlay="#large-modal">
                            <span class="icon-[tabler--x] size-5"></span>
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('js')
        <script>
            window.addEventListener('load', function() {
                flatpickr('.jsPickr', {
                    allowInput: true,
                    monthSelectorType: 'static'
                })

                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            })
        </script>
        <script>
            function productionIndex() {
                return {
                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',

                    search: {
                        keyword: '',
                        crafter: '',
                        status: "",
                        range: 15,
                        estimasi: ''
                    },
                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                keywords: this.search.keyword ?? "",
                                crafter: this.search.crafter ?? "",
                                status: this.search.status ?? "",
                                range: this.search.range ?? "",
                                estimasi: this.search.estimasi ?? ""
                            });
                            url = `/produksi/get-data-produksi?${params.toString()}`;
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
                                //modal close
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
                        searchParams.set('crafter', this.search.crafter);
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
                            keywords: this.search.keyword,
                            crafter: this.search.crafter,
                            status: this.search.status,
                            range: this.search.range,
                            estimasi: this.search.estimasi
                        });
                        url = `/produksi/get-data-produksi?${params.toString()}`;
                        console.log('Final URL:', url);
                        this.getData(url);
                    },

                    toComplate(index) {
                        Swal.fire({
                            title: "Konfirmasi",
                            text: "Apakah bucket selesai produksi ?",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Selesai",
                            cancelButtonText: "Batal"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Processing...',
                                    html: 'Mohon tunggu sebentar',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    }
                                });

                                axios.get(`/produksi/to-complate/${index}`)
                                    .then(response => {
                                        Swal.fire({
                                            title: "Berhasil!",
                                            text: "Data produksi berhasil diupdated.",
                                            icon: "success"
                                        });
                                    })
                                    .catch(error => {
                                        Swal.fire({
                                            title: "Error!",
                                            text: "Terjadi kesalahan saat update data.",
                                            icon: "error"
                                        });
                                    })
                                    .finally(() => {
                                        this.getData()
                                    });
                            }
                        });
                    },
                    toDistribusi(index) {
                        Swal.fire({
                            title: "Konfirmasi",
                            text: "Yakin ingin distribusi produk kedaftar penjualan ?",
                            icon: "info",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Proses",
                            cancelButtonText: "Batal"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Processing...',
                                    html: 'Mohon tunggu sebentar',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    }
                                });

                                axios.get(`/produksi/distribution-to-product/${index}`)
                                    .then(response => {
                                        Swal.fire({
                                            title: "Berhasil!",
                                            text: "Distribusi product successfully..",
                                            icon: "success"
                                        });
                                    })
                                    .catch(error => {
                                        const res = error.response.data
                                        console.log(res);
                                        if (error.status === 405) {
                                            Swal.fire({
                                                title: res.status,
                                                text: res.message,
                                                icon: "info"
                                            });
                                            return;
                                        }

                                        Swal.fire({
                                            title: "Error!",
                                            text: "Distribusi gagal diproses.",
                                            icon: "error"
                                        });
                                    });
                            }
                        });
                    },
                    details: [],
                    detailFunc(item) {
                        // Show loading
                        Swal.fire({
                            title: 'Loading...',
                            text: 'Mengambil detail produksi',
                            icon: 'info',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        axios.get(`/produksi/get-production-detail/${item.id}`)
                            .then((res) => {
                                const data = res.data.data;
                                this.details = [];
                                this.details = data;
                                Swal.close();
                                const openModal = document.getElementById("open-modal-detail");
                                openModal.click();
                            })
                            .catch((err) => {
                                console.error('Error loading details:', err);
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Gagal mengambil detail produksi',
                                    icon: 'error'
                                });
                            });
                    },
                    deleteProduct(key) {
                        Swal.fire({
                            title: "Konfirmasi",
                            text: "Apakah anda yakin ingin menghapus produk ini?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Hapus",
                            cancelButtonText: "Batal"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Processing...',
                                    html: 'Mohon tunggu sebentar',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    }
                                });
                                axios.post(`/produksi/delete/${key}`, {
                                        id: key
                                    })
                                    .then(response => {
                                        Swal.fire({
                                            title: "Berhasil!",
                                            text: "Data produk berhasil dihapus.",
                                            icon: "success"
                                        });
                                        this.getData()
                                    })
                                    .catch(error => {
                                        const message = error.response.data.message;
                                        if (error.status === 400) {
                                            Swal.fire({
                                                title: "Invalid",
                                                text: message,
                                                icon: "warning"
                                            });
                                            return;
                                        }

                                        Swal.fire({
                                            title: "Error!",
                                            text: "Terjadi kesalahan saat menghapus data.",
                                            icon: "error"
                                        });
                                    });
                            }
                        });
                    },
                    init() {
                        this.getData()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
