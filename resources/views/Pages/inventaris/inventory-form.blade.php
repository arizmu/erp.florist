<x-base-layout>
    <div x-data="loadFormInventaris">
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
                        <a href="#" aria-label="Inventaris" class="hover:text-primary transition-colors">
                            <span class="icon-[tabler--package]"></span>
                            Inventaris
                        </a>
                    </li>
                    <li class="breadcrumbs-separator rtl:rotate-180">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </li>
                    <li aria-current="page" class="font-medium text-primary">
                        <span class="icon-[tabler--file-invoice] me-1 size-5"></span>
                        Inventaris Masuk
                    </li>
                </ol>
            </div>

            <!-- Page Title -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-xl md:text-1xl font-bold text-gray-700 flex items-center gap-3">
                        <span
                            class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2.5 shadow-lg shadow-blue-500/30">
                            <span class="icon-[tabler--file-invoice] size-5 text-white"></span>
                        </span>
                        Inventory Inbound
                    </h1>
                    <p class="text-gray-500 mt-2 ml-1">Record incoming inventory items and stock</p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
            <!-- Left Column - Product Selection -->
            <div class="xl:col-span-5">
                <div class="card shadow-xl border-0 h-full">
                    <!-- Card Header -->
                    <div class="card-header bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                        <div class="flex items-center gap-3 text-white">
                            <span class="icon-[tabler--package] size-6"></span>
                            <h3 class="text-xl font-bold">Product Inventory</h3>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-6">
                        <!-- Search Bar -->
                        <div class="mb-6">
                            <div class="relative w-full">
                                <span
                                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--search] size-5"></span>
                                </span>
                                <input x-model="barangSearch" @keyup.enter="getBarang()" type="search"
                                    class="input input-bordered pl-12 w-full py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200"
                                    placeholder="Search products..." />
                            </div>
                            <button x-on:click="getBarang()"
                                class="btn btn-primary w-full mt-3 gap-2 font-semibold shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300">
                                <span class="icon-[ci--note-search] size-5"></span>
                                Search Products
                            </button>
                        </div>

                        <!-- Product List -->
                        <div class="overflow-y-auto pr-2" style="max-height: 500px;">
                            <div class="flex flex-col gap-4">
                                <template x-for="val in barangData">
                                    <div
                                        class="bg-gradient-to-br from-slate-50 to-gray-100 p-5 rounded-2xl border border-gray-200/50 hover:border-primary/30 hover:shadow-lg hover:shadow-primary/10 transition-all duration-300 group">
                                        <div class="flex justify-between items-start gap-4">
                                            <!-- Product Info -->
                                            <div class="flex-1 min-w-0">
                                                <h4 class="font-semibold text-sm text-gray-700 mb-3 truncate "
                                                    x-text="val.nama_barang"></h4>

                                                <div class="flex flex-wrap gap-3">
                                                    <!-- Stock Badge -->
                                                    <span class="badge badge-soft badge-info gap-2 px-3 badge-sm">
                                                        <span class="icon-[hugeicons--discount-01] size-3"></span>
                                                        <span class="font-semibold text-xs"
                                                            x-text="val.stock + ' ' + (val.satuan?.nama_satuan || '')"></span>
                                                    </span>

                                                    <!-- Price Badge -->
                                                    <span class="badge badge-soft badge-success badge-sm  gap-2 px-3">
                                                        <span class="icon-[hugeicons--money-bag-02] size-3"></span>
                                                        <span class="font-semibold text-xs">Rp. <span
                                                                x-text="formatRupiah(val.price)"></span></span>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Quantity & Add Button -->
                                            <div class="flex items-center gap-3 items-end">
                                                <!-- Quantity Controls -->
                                                <div
                                                    class="flex items-center gap-2 bg-white rounded-xl p-1 border border-gray-200 shadow-sm">
                                                    <button type="button"
                                                        class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-primary/5 text-gray-600 hover:text-primary transition-all duration-200"
                                                        aria-label="Decrement button" @click="decrement(val.id)">
                                                        <span class="icon-[tabler--minus] size-4"></span>
                                                    </button>
                                                    <input x-model="jumlahItem[val.id]"
                                                        class="w-16 text-center bg-transparent border-0 text-lg font-bold text-gray-800 focus:outline-none"
                                                        type="text" value="0" @keyup.enter="addItem(val)" />
                                                    <button type="button"
                                                        class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-primary/5 text-gray-600 hover:text-primary transition-all duration-200"
                                                        aria-label="Increment button" @click="increment(val.id)">
                                                        <span class="icon-[tabler--plus] size-4"></span>
                                                    </button>
                                                </div>

                                                <!-- Add Button -->
                                                <button x-on:click="addItem(val)"
                                                    class="btn btn-circle btn-sm btn-primary shadow-lg shadow-primary/30 hover:scale-110 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300"
                                                    aria-label="Add to inventory">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Empty State -->
                                <div x-show="barangData.length === 0"
                                    class="flex flex-col items-center justify-center py-12 text-gray-400">
                                    <div class="bg-gray-100 rounded-full p-4 mb-4">
                                        <span class="icon-[tabler--box] size-12"></span>
                                    </div>
                                    <p class="font-medium">No products found</p>
                                    <p class="text-sm">Try searching for a different term</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Inventory Form -->
            <div class="xl:col-span-7">
                <div class="card shadow-xl border-0 h-full">
                    <!-- Card Header -->
                    <div class="card-header bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-4">
                        <div class="flex items-center gap-3 text-white">
                            <span class="icon-[tabler--file-invoice] size-6"></span>
                            <h3 class="text-xl font-bold">Inventory Receipt</h3>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Items Table -->
                            <div class="lg:col-span-2">
                                <div class="border-2 border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                                    <div
                                        class="bg-gradient-to-r from-gray-50 to-gray-100 px-4 py-3 border-b border-gray-200">
                                        <h4 class="font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[tabler--list-details] size-4"></span>
                                            Selected Items
                                        </h4>
                                    </div>
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th class="font-semibold text-gray-600">Product</th>
                                                    <th class="font-semibold text-gray-600">Quantity</th>
                                                    <th class="font-semibold text-gray-600 text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template x-for="val in items">
                                                    <tr class="hover:bg-primary/5 transition-colors">
                                                        <td>
                                                            <span class="text-gray-800 text-sm"
                                                                x-text="val.nama_barang"></span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-soft badge-info font-semibold px-3 py-1.5"
                                                                x-text="val.stock"></span>
                                                        </td>
                                                        <td class="text-right">
                                                            <button x-on:click="deleteItem(val.id)"
                                                                class="btn btn-circle btn-sm btn-soft btn-error hover:scale-110 transition-transform"
                                                                aria-label="Remove item">
                                                                <span class="icon-[tabler--trash] size-4"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Empty State -->
                                    <div x-show="items.length === 0"
                                        class="flex flex-col items-center justify-center py-12 text-gray-400">
                                        <span class="icon-[tabler--shopping-cart-off] size-16 mb-3"></span>
                                        <p class="font-medium">No items selected</p>
                                        <p class="text-sm">Add products from the list above</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Fields -->
                            <div class="lg:col-span-1">
                                <div class="flex flex-col gap-5">
                                    <h4
                                        class="font-semibold text-gray-700 flex items-center gap-2 pb-2 border-b border-gray-200">
                                        <span class="icon-[tabler--settings] size-4"></span>
                                        Receipt Details
                                    </h4>

                                    <!-- Supplier -->
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span
                                                class="icon-[tabler--building-warehouse] size-4 text-blue-500"></span>
                                            Supplier / Source
                                        </label>
                                        <input x-model="supplier" type="text" placeholder="Enter supplier name..."
                                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm" />
                                    </div>

                                    <!-- Date -->
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[tabler--calendar] size-4 text-emerald-500"></span>
                                            Receipt Date
                                        </label>
                                        <div class="relative">
                                            <input x-model="tanggal_penerimaan" type="text"
                                                placeholder="Select date..." id="flatpickr-date"
                                                class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm" />
                                            <span
                                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                                <span class="icon-[tabler--calendar] size-5"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Invoice Number -->
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[tabler--file-text] size-4 text-purple-500"></span>
                                            Invoice No.
                                        </label>
                                        <input x-model="nomor_faktur" type="text" placeholder="000.000.00"
                                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm" />
                                    </div>

                                    <!-- Comment -->
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[tabler--message] size-4 text-orange-500"></span>
                                            Comment
                                        </label>
                                        <textarea x-model="comment" placeholder="Add notes or comments..." rows="3"
                                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm resize-none"></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="pt-2">
                                        <button type="button"
                                            class="btn btn-primary w-full gap-3 text-base font-semibold shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300"
                                            :disabled="isSubmitting"
                                            :class="{ 'opacity-50 cursor-not-allowed': isSubmitting }"
                                            x-on:click="recordInvetory()">
                                            <span class="icon-[tabler--check] size-5"></span>
                                            <span x-text="isSubmitting ? 'Processing...' : 'Record Inventory'"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                // Basic
                flatpickr('#flatpickr-date', {
                    monthSelectorType: 'static'
                })
            })

            function loadFormInventaris() {
                return {
                    isSubmitting: false,
                    supplier: '',
                    tanggal_penerimaan: '',
                    nomor_faktur: '',
                    comment: '',

                    async recordInvetory() {
                        if (this.items.length === 0) {
                            notifier.warning('Empty data items.', {
                                labels: {
                                    warning: "Opps."
                                },
                                durations: {
                                    warning: 2000
                                },
                                icons: {
                                    prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />`,
                                    suffix: '</svg>'
                                }
                            })
                            return;
                        }
                        this.isSubmitting = true;
                        const data = {
                            'supplier': this.supplier,
                            'tanggal_penerimaan': this.tanggal_penerimaan,
                            'nomor_faktur': this.nomor_faktur,
                            'comment': this.comment,
                            'items': this.items
                        }
                        const url = `/inventory/inventory-store-data`;
                        try {
                            const response = await axios.post(url, data);
                            this.items = [];
                            this.supplier = '';
                            this.tanggal_penerimaan = '';
                            this.nomor_faktur = '';
                            this.comment = '';
                            this.isSubmitting = false;
                            notifier.success('Data has been saved.', {
                                labels: {
                                    success: "Success"
                                },
                                durations: {
                                    success: 2000
                                },
                                icons: {
                                    prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />`,
                                    suffix: '</svg>'
                                }
                            });
                        } catch (error) {
                            console.error(error);
                        }
                    },

                    items: [],
                    jumlahItem: [],
                    addItem(data) {
                        const objectData = {
                            'id': data.id,
                            'nama_barang': data.nama_barang,
                            'stock': this.jumlahItem[data.id],
                        }
                        if (objectData.stock <= 0 || objectData.stock == null) {
                            notifier.warning('Stock is empty.', {
                                labels: {
                                    warning: "Opps."
                                },
                                durations: {
                                    warning: 2000
                                },
                                icons: {
                                    prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />`,
                                    suffix: '</svg>'
                                }
                            })
                            return;
                        }
                        let findData = this.items.find(index => index.id === objectData.id);
                        if (!findData) {
                            this.items.unshift(objectData);
                        } else {
                            const oldIndex = this.items.find(index => index.id === objectData.id);
                            oldIndex.stock = objectData.stock
                        }
                        this.jumlahItem = []
                        notifier.success('item added success.', {
                            labels: {
                                success: "OK"
                            },
                            durations: {
                                success: 2000
                            },
                            icons: {
                                prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />`,
                                suffix: '</svg>'
                            }
                        })
                    },
                    deleteItem(key) {
                        this.items = this.items.filter(index => index.id !== key);
                    },

                    barangData: [],
                    barangSearch: '',
                    getBarang() {
                        this.barangData = [];
                        const url = "/inventory/get-barang-data";
                        axios.get(url, {
                            params: {
                                key: this.barangSearch ?? ""
                            }
                        }).then((response) => {
                            this.barangData = response.data.data;

                        }).catch((error) => {
                            console.log(error)
                        }).finally(() => {
                            console.log('finally')
                        })
                    },

                    increment(index) {
                        if (this.jumlahItem[index] === undefined) {
                            this.jumlahItem[index] = 0;
                        }
                        this.jumlahItem[index]++;
                    },

                    decrement(index) {
                        if (this.jumlahItem[index] === undefined || this.jumlahItem[index] === 0) {
                            this.jumlahItem[index] = 0;
                            return;
                        }
                        this.jumlahItem[index]--;
                    },

                    init() {
                        this.getBarang()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
