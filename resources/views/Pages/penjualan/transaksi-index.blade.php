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
                    <a href="#" aria-label="Penjualan" class="hover:text-primary transition-colors">
                        <span class="icon-[tabler--shopping-cart]"></span>
                        Penjualan
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li aria-current="page" class="font-medium text-primary">
                    <span class="icon-[tabler--file-invoice] me-1 size-5"></span>
                    Transaksi
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span
                        class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-2.5 shadow-lg shadow-purple-500/30">
                        <span class="icon-[tabler--file-invoice] size-7 text-white"></span>
                    </span>
                    Transaksi Penjualan
                </h1>
                <p class="text-gray-500 mt-2 ml-1">Overview of sales transactions</p>
            </div>
        </div>
    </div>

    <div x-data="transaction" x-init="init()">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Total Revenue Card -->
            <div class="card shadow-lg border-0 overflow-hidden">
                <div class="card-body p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-2">
                            <span class="text-sm text-gray-500 font-medium">Total Revenue</span>
                            <span class="text-3xl font-bold text-gray-800">
                                Rp. <span x-text="totalRevenue"></span>
                            </span>
                        </div>
                        <div
                            class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-4 shadow-lg shadow-blue-500/30">
                            <span class="icon-[hugeicons--money-bag-02] size-8 text-white"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer px-6 py-3 bg-blue-50 border-t border-blue-100">
                    <div class="flex items-center gap-2 text-blue-600">
                        <span class="icon-[tabler--trending-up] size-4"></span>
                        <span class="text-sm font-medium">Total penjualan</span>
                    </div>
                </div>
            </div>

            <!-- Total Unpaid Card -->
            <div class="card shadow-lg border-0 overflow-hidden">
                <div class="card-body p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-2">
                            <span class="text-sm text-gray-500 font-medium">Total Unpaid</span>
                            <span class="text-3xl font-bold text-gray-800">
                                Rp. <span x-text="totalUnpaid"></span>
                            </span>
                        </div>
                        <div
                            class="bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl p-4 shadow-lg shadow-orange-500/30">
                            <span class="icon-[hugeicons--alert-circle] size-8 text-white"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer px-6 py-3 bg-orange-50 border-t border-orange-100">
                    <div class="flex items-center gap-2 text-orange-600">
                        <span class="icon-[tabler--clock] size-4"></span>
                        <span class="text-sm font-medium">Menunggu pembayaran</span>
                    </div>
                </div>
            </div>

            <!-- Total Paid Card -->
            <div class="card shadow-lg border-0 overflow-hidden">
                <div class="card-body p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-2">
                            <span class="text-sm text-gray-500 font-medium">Total Paid</span>
                            <span class="text-3xl font-bold text-gray-800">
                                Rp. <span x-text="totalPaid"></span>
                            </span>
                        </div>
                        <div
                            class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-4 shadow-lg shadow-emerald-500/30">
                            <span class="icon-[hugeicons--check-circle-02] size-8 text-white"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer px-6 py-3 bg-emerald-50 border-t border-emerald-100">
                    <div class="flex items-center gap-2 text-emerald-600">
                        <span class="icon-[tabler--check] size-4"></span>
                        <span class="text-sm font-medium">Sudah dibayar</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="card shadow-lg border-0 mb-6">
            <div class="card-body p-6">
                <div class="flex flex-col lg:flex-row gap-4">
                    <!-- Search Input -->
                    <div class="flex-1">
                        <div class="relative flex items-center">
                            <span class="absolute left-3 text-gray-400 pointer-events-none">
                                <span class="icon-[tabler--search] size-5"></span>
                            </span>
                            <input x-model="search.keyword" type="text" placeholder="Cari transaksi..."
                                @keyup.enter="searchFunc" class="input input-bordered pl-10 w-full" />
                        </div>
                    </div>

                    <!-- Date Range -->
                    <div class="lg:w-72">
                        <div class="relative flex items-center">
                            <span class="absolute left-3 text-gray-400 pointer-events-none">
                                <span class="icon-[tabler--calendar] size-5"></span>
                            </span>
                            <input x-model="search.estimasi" type="text" class="input input-bordered pl-10 w-full"
                                placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" />
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div class="lg:w-48">
                        <div class="relative flex items-center">
                            <span class="absolute left-3 text-gray-400 pointer-events-none">
                                <span class="icon-[tabler--filter] size-5"></span>
                            </span>
                            <select x-model="search.status" class="select pl-10 w-full" aria-label="Filter by status">
                                <option value="">All Status</option>
                                <option value="d">Draft</option>
                                <option value="s">Paid</option>
                                <option value="p">Unpaid</option>
                            </select>
                        </div>
                    </div>

                    <!-- Search Button -->
                    <div>
                        <button class="btn btn-primary gap-2 px-6" type="button" @click="searchFunc">
                            <span class="icon-[ci--note-search] size-5"></span>
                            Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="card shadow-lg border-0">
            <div class="card-header px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <span class="icon-[tabler--list-details] size-6 text-gray-600"></span>
                    <h3 class="text-lg font-bold text-gray-800">Daftar Transaksi</h3>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="font-semibold text-gray-600">Code</th>
                                <th class="font-semibold text-gray-600">Costumer</th>
                                <th class="font-semibold text-gray-600">Telp</th>
                                <th class="font-semibold text-gray-600">Qty</th>
                                <th class="font-semibold text-gray-600">Subtotal</th>
                                <th class="font-semibold text-gray-600">Disc <span
                                        class="text-xs text-gray-400">(DC)</span></th>
                                <th class="font-semibold text-gray-600">Point <span
                                        class="text-xs text-gray-400">(PT)</span></th>
                                <th class="font-semibold text-gray-600">
                                    Jumlah Bayar
                                     <span class="text-xs text-gray-400">(PD)</span>
                                    </th>
                                <th class="font-semibold text-gray-600">Status</th>
                                <th class="font-semibold text-gray-600 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(item, index) in dataTable" :key="index">
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="font-medium text-gray-800">
                                        <span x-text="item.code"></span>
                                    </td>
                                    <td x-text="item.costumer ? item.costumer.name: ''"></td>
                                    <td x-text="item.costumer ? item.costumer.no_telp : ''"></td>
                                    <td class="text-center" x-text="item.details.length"></td>
                                    <td class="text-gray-600">
                                        Rp. <span x-text="formatRupiah(parseInt(item.total_payment))"></span>
                                    </td>
                                    <td class="text-gray-600">
                                        Rp. <span x-text="formatRupiah(parseInt(item.discount))"></span>
                                    </td>

                                    <td class="text-gray-600" x-text="formatRupiah(parseInt(item.point))"></td>

                                    <td class="text-gray-600">
                                        Rp. <span
                                            x-text="formatRupiah(parseInt(item.payment_amount))"></span>
                                    </td>
                                    <td>
                                        <div class="flex flex-wrap gap-1.5">
                                            <span class="badge badge-sm badge-soft badge-secondary"
                                                x-show="item.status_transaction == 'd'">
                                                Draft
                                            </span>
                                            <span class="badge badge-sm badge-soft badge-success"
                                                x-show="item.is_status">
                                                Paid
                                            </span>
                                            <span class="badge badge-sm badge-soft badge-warning"
                                                x-show="!item.is_status">
                                                Unpaid
                                            </span>
                                            <span class="badge badge-sm badge-soft badge-primary"
                                                x-show="item.preorder_status">
                                                Pre-order
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex gap-1 justify-end">
                                            <a @click="toDetails(item.id)"
                                                class="btn btn-circle btn-sm btn-soft btn-primary hover:scale-110 transition-transform"
                                                title="Preview Transaction">
                                                <span class="icon-[fluent--open-16-filled] size-4"></span>
                                            </a>
                                            <button
                                                class="btn btn-circle btn-sm btn-soft btn-error hover:scale-110 transition-transform"
                                                x-show="item.status_transaction == 'd'"
                                                x-on:click="archiveTransaction(item)" title="Archive Transaction">
                                                <span class="icon-[tabler--trash] size-4"></span>
                                            </button>
                                            <template x-if="!item.is_status">
                                                <a class="btn btn-circle btn-sm btn-soft btn-warning hover:scale-110 transition-transform"
                                                x-show="item.status_transaction == 'd' || item.status_transaction == 'p'"
                                                @click="toPayment(item.payment_id)" title="Process Payment">
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

    @push('js')
        <script>
            window.addEventListener('load', function() {
                flatpickr('#flatpickr-range', {
                    mode: 'range',
                    // defaultDate: [formattedDate, formattedDate] // Set default sebagai range tanggal hari ini
                });
            })

            const today = new Date();
            const formattedDate = today.getFullYear() + '-' +
                String(today.getMonth() + 1).padStart(2, '0') + '-' +
                String(today.getDate()).padStart(2, '0');

            function transaction() {
                return {
                    archiveTransaction(index) {
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
                                    const url = `/transaksi/archive/${index.id}`;
                                    const response = await axios.post(url, index);
                                    const result = response.data;
                                    this.getProduct();
                                    setTimeout(() => {
                                        Swal.fire(
                                            "Berhasil!",
                                            "Data telah dimuat.",
                                            "success"
                                        );
                                    }, 1500);
                                } catch (error) {
                                    Swal.fire({
                                        title: "Invalid!",
                                        text: "Invalid deleted data.!",
                                        icon: "error"
                                    });
                                }

                            }
                        });
                    },

                    dataTable: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',
                    search: {
                        keyword: '',
                        range: 15,
                        estimasi: `${formattedDate}`,
                        status: ''
                    },
                    getProduct(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                keywords: this.search.keyword ?? "",
                                range: this.search.range ?? "",
                                estimasi: this.search.estimasi ?? "",
                                status: this.search.status ?? ""
                            });
                            url = `/transaksi/index-transaksi-json?${params.toString()}`;
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
                        axios.get(url).then((res) => {
                            const response = res.data.data;
                            this.dataTable = response.data;
                            this.nextPage = response.next_page_url ? this.addParamsToUrl(response.next_page_url) : null;
                            this.prevPage = response.prev_page_url ? this.addParamsToUrl(response.prev_page_url) : null;

                        }).catch((err) => {
                            console.log(err);
                        }).finally(() => {
                            //modal close
                            Swal.close();
                        })
                    },

                    addParamsToUrl(url) {
                        if (!url) return null;
                        const newUrl = new URL(url);
                        const searchParams = new URLSearchParams(newUrl.search);
                        searchParams.set('keywords', this.search.keyword);
                        searchParams.set('range', this.search.range);
                        searchParams.set('estimasi', this.search.estimasi);
                        searchParams.set('status', this.search.status);

                        newUrl.search = searchParams.toString();
                        return newUrl.toString();
                    },

                    nextPageFunc() {
                        if (this.nextPage) {
                            this.getProduct(this.nextPage);
                        }
                    },

                    prevPageFunc() {
                        if (this.prevPage) {
                            this.getProduct(this.prevPage);
                        }
                    },

                    searchFunc() {
                        const params = new URLSearchParams({
                            keywords: this.search.keyword,
                            range: this.search.range,
                            estimasi: this.search.estimasi,
                            status: this.search.status
                        });
                        url = `/transaksi/index-transaksi-json?${params.toString()}`;
                        console.log('Final URL:', url);
                        this.dashInfo();
                        this.getProduct(url);
                    },

                    toPayment(index) {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "to proccess payment transaction!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, Procces it!"
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
                                    window.location.href = `/transaksi/kasir-proses-bayar/${index}`;
                                }, 1500);
                            }
                        });
                    },

                    toDetails(index) {
                        window.location.href = `/transaksi/kasir-transaksi-detail/${index}`;
                    },

                    totalRevenue: 0,
                    totalPaid: 0,
                    totalUnpaid: 0,
                    dashInfo() {
                        const url = `/transaksi/dash-transaksi-json?estimasi=${this.search.estimasi}`;
                        axios.get(url).then((res) => {
                            const response = res.data;
                            this.totalRevenue = formatRupiah(response.total_penjualan);
                            this.totalPaid = formatRupiah(response.total_paid);
                            this.totalUnpaid = formatRupiah(response.total_unpaid);

                        });
                    },

                    hitungPaid(disc, point, total_paid) {
                        let result = parseInt(total_paid) - parseInt(disc) + parseInt(point);
                        return formatRupiah(result);
                    },
                    init() {
                        this.getProduct();
                        this.dashInfo();

                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
