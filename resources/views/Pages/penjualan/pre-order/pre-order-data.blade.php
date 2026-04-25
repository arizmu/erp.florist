<x-base-layout>

    <div x-data="preorderData" x-init="init()">

        {{-- Header --}}
        <div class="mb-6">
            <div class="breadcrumbs mb-4 text-sm">
                <ol>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-primary transition-colors">
                            <span class="icon-[tabler--home] size-4"></span> Home
                        </a>
                    </li>
                    <li class="breadcrumbs-separator rtl:rotate-180">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary transition-colors flex items-center gap-1">
                            <span class="icon-[tabler--shopping-cart] size-4"></span> Penjualan
                        </a>
                    </li>
                    <li class="breadcrumbs-separator rtl:rotate-180">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </li>
                    <li aria-current="page" class="font-medium text-primary flex items-center gap-1">
                        <span class="icon-[tabler--clipboard-list] size-4"></span> Data Pre-order
                    </li>
                </ol>
            </div>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-base-content flex items-center gap-3">
                        <span
                            class="bg-gradient-to-br from-violet-500 to-indigo-600 rounded-2xl p-2.5 shadow-lg shadow-violet-500/30">
                            <span class="icon-[tabler--clipboard-list] size-7 text-white"></span>
                        </span>
                        Data Pre-Order
                    </h1>
                    <p class="text-base-content/50 mt-1 ml-1 text-sm">Kelola dan pantau semua transaksi pre-order</p>
                </div>
                <a href="{{ route('preoder.form.layout') ?? '#' }}"
                    class="btn btn-primary gap-2 rounded-xl px-6 shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300">
                    <span class="icon-[tabler--plus] size-5"></span>
                    <span class="font-semibold">Buat Pre-Order</span>
                </a>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">

            {{-- Total Pre-Order --}}
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <span class="text-xs font-semibold text-base-content/50 uppercase tracking-wide">Total
                                Pre-Order</span>
                            <span class="text-2xl font-bold text-base-content" x-text="stats.total">0</span>
                        </div>
                        <div
                            class="bg-gradient-to-br from-violet-500 to-indigo-600 rounded-2xl p-3 shadow-lg shadow-violet-500/30">
                            <span class="icon-[tabler--clipboard-list] size-7 text-white"></span>
                        </div>
                    </div>
                </div>
                <div class="h-1 bg-gradient-to-r from-violet-500 to-indigo-600"></div>
            </div>

            {{-- Menunggu Bayar --}}
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <span class="text-xs font-semibold text-base-content/50 uppercase tracking-wide">Menunggu
                                Bayar</span>
                            <span class="text-2xl font-bold text-base-content" x-text="stats.unpaid">0</span>
                        </div>
                        <div
                            class="bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl p-3 shadow-lg shadow-amber-500/30">
                            <span class="icon-[tabler--clock] size-7 text-white"></span>
                        </div>
                    </div>
                </div>
                <div class="h-1 bg-gradient-to-r from-amber-400 to-orange-500"></div>
            </div>

            {{-- Sudah Lunas --}}
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-1">
                            <span class="text-xs font-semibold text-base-content/50 uppercase tracking-wide">Sudah
                                Lunas</span>
                            <span class="text-2xl font-bold text-base-content" x-text="stats.paid">0</span>
                        </div>
                        <div
                            class="bg-gradient-to-br from-emerald-400 to-teal-600 rounded-2xl p-3 shadow-lg shadow-emerald-500/30">
                            <span class="icon-[tabler--circle-check] size-7 text-white"></span>
                        </div>
                    </div>
                </div>
                <div class="h-1 bg-gradient-to-r from-emerald-400 to-teal-600"></div>
            </div>

            {{-- Total Pendapatan --}}
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-body p-5">
                    <div class="flex flex-col gap-1">
                        <span class="text-xs font-semibold text-base-content/50 uppercase tracking-wide">Total
                            Pendapatan</span>
                        <span class="text-lg font-bold text-base-content">Rp. <span
                                x-text="stats.revenue">0</span></span>
                    </div>
                    <div class="mt-2">
                        <div
                            class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-3 w-fit shadow-lg shadow-blue-500/30">
                            <span class="icon-[tabler--cash] size-7 text-white"></span>
                        </div>
                    </div>
                </div>
                <div class="h-1 bg-gradient-to-r from-blue-500 to-cyan-600"></div>
            </div>

        </div>

        {{-- Filter Card --}}
        <div class="card border-0 shadow-md mb-6 rounded-2xl overflow-hidden">
            <div class="card-header px-6 py-4 border-b border-base-200">
                <h3 class="font-bold text-base-content flex items-center gap-2">
                    <span class="icon-[tabler--adjustments-horizontal] size-5 text-primary"></span>
                    Filter & Pencarian
                </h3>
            </div>
            <div class="card-body p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                    {{-- Search --}}
                    <div class="flex flex-col gap-1.5">
                        <label
                            class="text-xs font-semibold text-base-content/60 uppercase tracking-wide">Pencarian</label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 text-base-content/30 pointer-events-none">
                                <span class="icon-[tabler--search] size-5"></span>
                            </span>
                            <input type="text" x-model="search.keyword" @keyup.enter="searchFunc"
                                class="input input-bordered pl-10 w-full" placeholder="No. Order / Nama Customer...">
                        </div>
                    </div>

                    {{-- Date Range --}}
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-base-content/60 uppercase tracking-wide">Periode
                            Tanggal</label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 text-base-content/30 pointer-events-none">
                                <span class="icon-[tabler--calendar-event] size-5"></span>
                            </span>
                            <input type="text" x-model="search.estimasi" id="flatpickr-range"
                                class="input input-bordered pl-10 w-full" placeholder="Pilih tanggal...">
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-base-content/60 uppercase tracking-wide">Status
                            Pembayaran</label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 text-base-content/30 pointer-events-none">
                                <span class="icon-[tabler--activity] size-5"></span>
                            </span>
                            <select x-model="search.status" class="select select-bordered pl-10 w-full">
                                <option value="">Semua Status</option>
                                <option value="d">Draft / Pending</option>
                                <option value="p">Unpaid</option>
                                <option value="s">Paid / Selesai</option>
                            </select>
                        </div>
                    </div>

                    {{-- Per Page --}}
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-base-content/60 uppercase tracking-wide">Data Per
                            Halaman</label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2 text-base-content/30 pointer-events-none">
                                <span class="icon-[tabler--list-numbers] size-5"></span>
                            </span>
                            <select x-model="search.range" class="select select-bordered pl-10 w-full">
                                <option value="10">10 Data</option>
                                <option value="15" selected>15 Data</option>
                                <option value="25">25 Data</option>
                                <option value="50">50 Data</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="flex justify-end gap-3 mt-5">
                    <button type="button" @click="resetSearch" class="btn btn-soft btn-secondary rounded-xl gap-2">
                        <span class="icon-[tabler--refresh] size-4"></span> Reset
                    </button>
                    <button type="button" @click="searchFunc"
                        class="btn btn-primary rounded-xl gap-2 shadow-md shadow-primary/20">
                        <span class="icon-[tabler--filter-check] size-4"></span> Terapkan Filter
                    </button>
                </div>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="card border-0 shadow-xl rounded-2xl overflow-hidden">
            <div
                class="card-header px-6 py-4 border-b border-base-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <h3 class="font-bold text-base-content flex items-center gap-2">
                    <span class="icon-[tabler--list-details] size-5 text-primary"></span>
                    Daftar Transaksi Pre-Order
                </h3>
                <div class="flex items-center gap-2 text-sm text-base-content/50">
                    <span class="icon-[tabler--info-circle] size-4"></span>
                    <span>Menampilkan data hari ini</span>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead class="bg-base-200/50">
                            <tr>
                                <th class="py-3 px-5 font-semibold text-base-content/70 text-sm">#</th>
                                <th class="py-3 px-5 font-semibold text-base-content/70 text-sm">No. Pre-Order</th>
                                <th class="py-3 px-5 font-semibold text-base-content/70 text-sm">Customer</th>
                                <th class="py-3 px-5 font-semibold text-base-content/70 text-sm">Tanggal Order</th>
                                <th class="py-3 px-5 font-semibold text-base-content/70 text-sm">Item</th>
                                <th class="py-3 px-5 font-semibold text-base-content/70 text-sm text-right">Total</th>
                                <th class="py-3 px-5 font-semibold text-base-content/70 text-sm text-center">Status
                                </th>
                                <th class="py-3 px-5 font-semibold text-base-content/70 text-sm text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-base-200">

                            {{-- Empty State --}}
                            <template x-if="dataTable.length === 0">
                                <tr>
                                    <td colspan="9" class="py-16 text-center">
                                        <div class="flex flex-col items-center gap-3 text-base-content/30">
                                            <span class="icon-[tabler--clipboard-x] size-16"></span>
                                            <p class="font-semibold text-lg">Tidak ada data pre-order</p>
                                            <p class="text-sm">Coba ubah filter atau buat pre-order baru</p>
                                        </div>
                                    </td>
                                </tr>
                            </template>

                            <template x-for="(item, index) in dataTable" :key="index">
                                <tr class="hover:bg-base-200/30 transition-colors duration-150">

                                    {{-- No --}}
                                    <td class="py-4 px-5">
                                        <span class="text-sm text-base-content/40 font-medium"
                                            x-text="index + 1"></span>
                                    </td>

                                    {{-- Code --}}
                                    <td class="py-4 px-5">
                                        <div class="flex flex-col gap-0.5">
                                            <span class="font-bold text-primary text-sm" x-text="item.code">-</span>
                                            <span class="text-xs text-base-content/40"
                                                x-text="'#' + item.factur_number">-</span>
                                        </div>
                                    </td>

                                    {{-- Customer --}}
                                    <td class="py-4 px-5">
                                        <div class="flex items-center gap-3">
                                            <div class="size-9 rounded-full bg-gradient-to-br from-violet-400 to-indigo-500 flex items-center justify-center text-white text-xs font-bold shrink-0"
                                                x-text="item.costumer ? item.costumer.name.charAt(0).toUpperCase() : '?'">
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-semibold text-sm text-base-content"
                                                    x-text="item.costumer ? item.costumer.name : '-'">-</span>
                                                <span class="text-xs text-base-content/40 flex items-center gap-1">
                                                    <span class="icon-[tabler--phone] size-3"></span>
                                                    <span x-text="item.costumer ? item.costumer.no_telp : '-'">-</span>
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Tanggal --}}
                                    <td class="py-4 px-5">
                                        <div class="flex items-center gap-2 text-sm text-base-content/70">
                                            <span class="icon-[tabler--calendar] size-4 text-base-content/30"></span>
                                            <span x-text="item.transaction_date">-</span>
                                        </div>
                                    </td>

                                    {{-- Item --}}
                                    <td class="py-4 px-5">
                                        <div class="flex items-center gap-1.5">
                                            <span class="icon-[tabler--box] size-4 text-base-content/30"></span>
                                            <span class="text-sm font-semibold"
                                                x-text="(item.details ? item.details.length : 0) + ' item'">-</span>
                                        </div>
                                    </td>

                                    {{-- Total --}}
                                    <td class="py-4 px-5 text-right">
                                        <span class="font-bold text-sm text-base-content">
                                            Rp. <span x-text="formatRupiah(parseInt(item.total_payment || 0))"></span>
                                        </span>
                                    </td>
                                    {{-- Status --}}
                                    <td class="py-4 px-5 text-center">
                                        <div class="flex flex-wrap justify-center gap-1">
                                            <span class="badge badge-sm badge-soft badge-neutral"
                                                x-show="item.status_transaction == 'd'">Draft</span>
                                            <span class="badge badge-sm badge-soft badge-success"
                                                x-show="item.is_status">Paid</span>
                                            <span class="badge badge-sm badge-soft badge-warning"
                                                x-show="!item.is_status && item.status_transaction != 'd'">Unpaid</span>
                                        </div>
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="py-4 px-5">
                                        <div class="flex items-center justify-center gap-1.5">
                                            <a @click="toDetails(item.id)"
                                                class="btn btn-circle btn-sm btn-soft btn-primary hover:scale-110 transition-transform"
                                                title="Lihat Detail">
                                                <span class="icon-[fluent--open-16-filled] size-4"></span>
                                            </a>
                                            <button
                                                class="btn btn-circle btn-sm btn-soft btn-error hover:scale-110 transition-transform"
                                                x-show="item.status_transaction == 'd'"
                                                x-on:click="archiveTransaction(item)" title="Arsipkan">
                                                <span class="icon-[tabler--trash] size-4"></span>
                                            </button>
                                            <template x-if="!item.is_status">
                                                <a class="btn btn-circle btn-sm btn-soft btn-warning hover:scale-110 transition-transform"
                                                    x-show="item.status_transaction == 'd' || item.status_transaction == 'p'"
                                                    @click="toPayment(item.payment_id)" title="Proses Pembayaran">
                                                    <span class="icon-[mingcute--wallet-line] size-4"></span>
                                                </a>
                                            </template>
                                        </div>
                                    </td>

                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Pagination --}}
            <div
                class="card-footer px-6 py-4 border-t border-base-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <p class="text-sm text-base-content/40">
                    Menampilkan <span class="font-semibold text-base-content" x-text="dataTable.length"></span> data
                </p>
                <nav class="flex items-center gap-2">
                    <button type="button" class="btn btn-outline btn-sm gap-2 rounded-xl" @click="prevPageFunc"
                        :disabled="!prevPage" :class="{ 'opacity-40 cursor-not-allowed': !prevPage }">
                        <span class="icon-[tabler--chevron-left] size-4"></span> Sebelumnya
                    </button>
                    <button type="button" class="btn btn-outline btn-sm gap-2 rounded-xl" @click="nextPageFunc"
                        :disabled="!nextPage" :class="{ 'opacity-40 cursor-not-allowed': !nextPage }">
                        Berikutnya <span class="icon-[tabler--chevron-right] size-4"></span>
                    </button>
                </nav>
            </div>
        </div>

    </div>

    @push('js')
        <script>
            window.addEventListener('load', function() {
                flatpickr('#flatpickr-range', {
                    mode: 'range',
                    dateFormat: 'Y-m-d',
                });
            });

            const today = new Date();
            const formattedDate = today.getFullYear() + '-' +
                String(today.getMonth() + 1).padStart(2, '0') + '-' +
                String(today.getDate()).padStart(2, '0');

            document.addEventListener("alpine:init", () => {
                Alpine.data("preorderData", () => ({
                    dataTable: [],
                    nextPage: '',
                    prevPage: '',
                    stats: {
                        total: 0,
                        unpaid: 0,
                        paid: 0,
                        revenue: '0',
                    },
                    search: {
                        keyword: '',
                        range: 15,
                        estimasi: '',
                        status: ''
                    },

                    init() {
                        this.getTransaction();
                    },

                    getTransaction(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                keywords: this.search.keyword ?? "",
                                range: this.search.range ?? "",
                                estimasi: this.search.estimasi ?? "",
                                status: this.search.status ?? ""
                            });
                            url = `/transaksi/pre-order-json?${params.toString()}`;
                        }
                        Swal.fire({
                            title: "Loading...",
                            text: "Memuat data...",
                            icon: "info",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        axios.get(url).then((res) => {
                            const response = res.data.data;
                            this.dataTable = response.data;
                            this.nextPage = response.next_page_url ? this.addParamsToUrl(response
                                .next_page_url) : null;
                            this.prevPage = response.prev_page_url ? this.addParamsToUrl(response
                                .prev_page_url) : null;
                            this.computeStats();
                        }).catch((err) => {
                            console.log(err);
                        }).finally(() => {
                            Swal.close();
                        });
                    },

                    computeStats() {
                        this.stats.total = this.dataTable.length;
                        this.stats.unpaid = this.dataTable.filter(i => !i.is_status).length;
                        this.stats.paid = this.dataTable.filter(i => i.is_status).length;
                        const total = this.dataTable.reduce((s, i) => s + parseInt(i.total_payment || 0),
                            0);
                        this.stats.revenue = formatRupiah(total);
                    },

                    searchFunc() {
                        const params = new URLSearchParams({
                            keywords: this.search.keyword,
                            range: this.search.range,
                            estimasi: this.search.estimasi,
                            status: this.search.status
                        });
                        let url = `/transaksi/pre-order-json?${params.toString()}`;
                        this.getTransaction(url);
                    },

                    resetSearch() {
                        this.search = {
                            keyword: '',
                            range: 15,
                            estimasi: `${formattedDate}`,
                            status: ''
                        };
                        const fp = document.querySelector("#flatpickr-range")?._flatpickr;
                        if (fp) fp.clear();
                        this.getTransaction();
                    },

                    addParamsToUrl(url) {
                        if (!url) return null;
                        const newUrl = new URL(url);
                        const sp = new URLSearchParams(newUrl.search);
                        sp.set('keywords', this.search.keyword);
                        sp.set('range', this.search.range);
                        sp.set('estimasi', this.search.estimasi);
                        sp.set('status', this.search.status);
                        newUrl.search = sp.toString();
                        return newUrl.toString();
                    },

                    nextPageFunc() {
                        if (this.nextPage) this.getTransaction(this.nextPage);
                    },
                    prevPageFunc() {
                        if (this.prevPage) this.getTransaction(this.prevPage);
                    },

                    toPayment(index) {
                        Swal.fire({
                            title: "Proses Pembayaran?",
                            text: "Anda akan memproses pembayaran transaksi ini.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#6d28d9",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Proses!",
                            cancelButtonText: "Batal"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'info',
                                    title: "Loading...",
                                    html: "Harap tunggu...",
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });
                                setTimeout(() => {
                                    window.location.href =
                                        `/transaksi/kasir-proses-bayar/${index}`;
                                }, 1500);
                            }
                        });
                    },

                    toDetails(index) {
                        window.location.href = `/transaksi/kasir-transaksi-detail/${index}`;
                    },

                    archiveTransaction(item) {
                        Swal.fire({
                            title: "Arsipkan Data?",
                            text: "Data tidak dapat dikembalikan setelah diarsipkan.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#dc2626",
                            cancelButtonColor: "#6b7280",
                            confirmButtonText: "Ya, Arsipkan!",
                            cancelButtonText: "Batal"
                        }).then(async (result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'info',
                                    title: "Loading...",
                                    html: "Harap tunggu...",
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });
                                try {
                                    await axios.post(`/transaksi/archive/${item.id}`, item);
                                    this.getTransaction();
                                    setTimeout(() => {
                                        Swal.fire("Berhasil!", "Data telah diarsipkan.",
                                            "success");
                                    }, 1000);
                                } catch (error) {
                                    Swal.fire({
                                        title: "Gagal!",
                                        text: "Gagal mengarsipkan data.",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    }
                }))
            });
        </script>
    @endpush
</x-base-layout>
