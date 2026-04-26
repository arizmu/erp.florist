<x-base-layout class="bg-gray-50">
    <div x-data="kasirIndex" x-init="init()">
        <!-- Header -->
        <div class="mb-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <div class="flex items-center gap-2.5">
                    <div
                        class="w-9 h-9 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-sm">
                        <span class="icon-[tabler--cash-register] size-5 text-white"></span>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800 leading-none">Point of Sale</h1>
                        <p class="text-xs text-gray-400 mt-0.5">Transaksi penjualan langsung</p>
                    </div>
                </div>
            </div>
            <button class="btn btn-sm btn-outline btn-primary gap-2 w-fit" @click="searchFunc">
                <span class="icon-[tabler--refresh] size-4"></span>
                Refresh
            </button>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-4 gap-5">
            <!-- Products Section -->
            <div class="xl:col-span-3">
                <!-- Search Bar -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-3 mb-4 sticky top-0 z-10">
                    <div class="flex justify-between items-center flex-wrap gap-2">
                        <div class="relative flex items-center gap-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300 pointer-events-none">
                                <span class="icon-[tabler--search] size-4"></span>
                            </span>
                            <input type="search" x-model="search.keyword" @keyup.enter="searchFunc"
                                class="min-w-96 pl-9 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-500/10 transition-all"
                                placeholder="Cari produk..." />
                        </div>
                        <div class="flex justify-between flex-wrap items-center gap-2">
                            <button type="button" @click="searchFunc"
                                class="btn btn-soft min-w-40 btn-primary gap-1.5 px-4">
                                <span class="icon-[tabler--search] size-4"></span>
                                Filter
                            </button>
                            <button class="btn btn-soft min-w-40 btn-info px-4 flex items-center gap-2"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-barcode-add-item"
                                data-overlay="#modal-barcode-add-item">
                                <span class="icon-[material-symbols--barcode-scanner-rounded] size-4"></span>
                                Scan Barcode
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 mb-4">
                    <template x-for="item in dataTable" :key="item.id">
                        <div
                            class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 overflow-hidden group">
                            <!-- Product Image -->
                            <div class="relative h-36 bg-gray-50">
                                <template x-if="item.img">
                                    <img :src="item.img"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        alt="Product" />
                                </template>
                                <span x-show="!item.img" class="absolute inset-0 flex items-center justify-center">
                                    <span class="icon-[fxemoji--whiteflower] size-16 text-gray-200"></span>
                                </span>
                                <div
                                    class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button x-on:click="addItem(item)"
                                        class="w-7 h-7 bg-emerald-500 hover:bg-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                                        <span class="icon-[tabler--plus] size-4 text-white"></span>
                                    </button>
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="p-3">
                                <p class="font-semibold text-gray-800 truncate text-xs capitalize"
                                    x-text="item.product_name ?? '[404]'"></p>
                                <div class="flex items-center justify-between mt-1.5">
                                    <span class="text-[10px] text-gray-400" x-text="item.qty + ' pcs'"></span>
                                    <span class="text-xs font-bold text-emerald-600"
                                        x-text="formatRupiah(item.price)"></span>
                                </div>
                                <div class="flex gap-1.5 mt-2">
                                    <button
                                        class="flex-1 py-1.5 text-[11px] font-semibold rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-colors"
                                        x-on:click="openCostumeModal(item)">Custom</button>
                                    <button
                                        class="flex-1 py-1.5 text-[11px] font-semibold rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 transition-colors"
                                        x-on:click="addItem(item)">+ Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Empty State -->
                    <div x-show="dataTable.length === 0" class="col-span-full py-16 text-center">
                        <span class="icon-[tabler--box-off] size-12 text-gray-200 mx-auto"></span>
                        <p class="text-gray-400 text-sm mt-3">Produk tidak ditemukan</p>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex gap-2 mt-4">
                    <button type="button" class="btn btn-sm btn-outline gap-1.5" @click="prevPageFunc"
                        :disabled="!prevPage" :class="{ 'opacity-40 cursor-not-allowed': !prevPage }">
                        <span class="icon-[tabler--chevron-left] size-4"></span> Prev
                    </button>
                    <button type="button" class="btn btn-sm btn-outline gap-1.5" @click="nextPageFunc"
                        :disabled="!nextPage" :class="{ 'opacity-40 cursor-not-allowed': !nextPage }">
                        Next <span class="icon-[tabler--chevron-right] size-4"></span>
                    </button>
                </div>
            </div>

            <!-- Shopping Cart Sidebar -->
            <div class="xl:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Cart Header -->
                    <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-2.5"
                        style="background: linear-gradient(135deg,#059669,#0d9488)">
                        <span class="icon-[tabler--shopping-cart] size-5 text-white"></span>
                        <h3 class="text-base font-bold text-white">Keranjang</h3>
                        <span class="ms-auto bg-white/20 text-white text-xs font-bold px-2 py-0.5 rounded-full"
                            x-text="items.length + ' item'"></span>
                    </div>

                    <!-- Cart Items -->
                    <div class="overflow-y-auto min-h-[550px]">
                        <!-- Empty State -->
                        <div x-show="!items || items.length === 0"
                            class="flex flex-col items-center justify-center h-full text-gray-300 py-10">
                            <span class="icon-[tabler--shopping-cart-off] size-12 mb-2"></span>
                            <p class="text-sm">Keranjang kosong</p>
                        </div>

                        <!-- Cart Items List -->
                        <div class="divide-y divide-gray-50">
                            <template x-for="item in items" :key="item.product_id">
                                <div class="p-3 hover:bg-gray-50 transition-colors">
                                    <div class="flex gap-2.5">
                                        <!-- Item Image -->
                                        <div class="w-14 h-14 bg-gray-100 rounded-xl flex-shrink-0 overflow-hidden">
                                            <template x-if="item.img_url">
                                                <img :src='item.img_url' class="w-full h-full object-cover" />
                                            </template>
                                            <span x-show="!item.img_url"
                                                class="w-full h-full flex items-center justify-center">
                                                <span class="icon-[fxemoji--whiteflower] size-8 text-gray-200"></span>
                                            </span>
                                        </div>

                                        <!-- Item Details -->
                                        <div class="flex-1 min-w-0">
                                            <p class="font-semibold text-xs text-gray-700 truncate capitalize"
                                                x-text="shortText(item.product_name, 22)"></p>

                                            <!-- Price -->
                                            <div class="flex gap-1 flex-wrap mt-1">
                                                <span class="text-[10px] text-gray-400"
                                                    x-text="formatRupiah(item.product_price)"></span>
                                                <span class="text-[10px] text-amber-500" x-show="item.product_costume"
                                                    x-text="'+ ' + formatRupiah(item.costume_total)"></span>
                                            </div>

                                            <button type="button" x-on:click="removeItem(item.product_id)"
                                                class="mt-1 text-[10px] font-semibold text-red-400 hover:text-red-600 flex items-center gap-0.5 transition-colors">
                                                <span class="icon-[tabler--trash] size-3"></span> Hapus
                                            </button>
                                        </div>

                                        <!-- Quantity & Total -->
                                        <div class="flex flex-col items-end gap-2">
                                            <h5 class="font-bold text-sm text-gray-800">
                                                Rp. <span x-text="formatRupiah(item.total_price)"></span>
                                            </h5>

                                            <!-- Quantity Controls -->
                                            <div class="flex items-center gap-1 bg-gray-100 rounded-lg p-1">
                                                <button x-on:click="reduceQty(item.product_id)" type="button"
                                                    class="btn btn-ghost btn-sm w-8 h-8 hover:bg-white rounded-md"
                                                    aria-label="Decrement">
                                                    <span class="icon-[tabler--minus] size-3.5"></span>
                                                </button>
                                                <input :value="item.product_qty"
                                                    class="input text-center w-12 h-8 bg-transparent border-0 text-sm font-semibold"
                                                    type="text" data-input-number-input readonly />
                                                <button x-on:click="addQty(item.product_id)" type="button"
                                                    class="btn btn-ghost btn-sm w-8 h-8 hover:bg-white rounded-md"
                                                    aria-label="Increment">
                                                    <span class="icon-[tabler--plus] size-3.5"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Cart Footer -->
                <div class="border-t border-gray-100 p-4 bg-gray-50/50 mt-4 shadow-md rounded-xl">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-medium text-gray-500">Total</span>
                        <span class="text-lg font-bold text-gray-800">
                            Rp <span x-text="subtotal">0</span>
                        </span>
                    </div>
                    <button type="button"
                        class="w-full py-3 rounded-xl text-white text-sm font-bold flex items-center justify-center gap-2 transition-all duration-200 hover:opacity-90 active:scale-[0.99] shadow-md disabled:opacity-50 disabled:cursor-not-allowed"
                        style="background: linear-gradient(135deg,#059669,#0d9488)" :disabled="isLoadTrasaction"
                        x-on:click="transaksiProsses">
                        <span class="icon-[tabler--cash-register] size-5"></span>
                        <span x-text="isLoadTrasaction ? 'Memproses...' : 'Proses Transaksi'"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal: Custom Product -->
    <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
        aria-controls="modal-costume-product" data-overlay="#modal-costume-product" id="open-modal-costume-product">
        Open modal
    </button>

    <div id="modal-costume-product" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-lg overlay-open:opacity-100 modal-dialog-centered">
            <div class="modal-content rounded-2xl shadow-2xl">
                <!-- Modal Header -->
                <div class="modal-header px-6 py-4 border-b border-gray-100">
                    <div class="w-full flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-2">
                                <span class="icon-[ant-design--product-outlined] size-6 text-white"></span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Custom Product</h3>
                                <p class="text-sm text-gray-500">Add custom materials or items</p>
                            </div>
                        </div>
                        <button type="button"
                            class="btn btn-ghost btn-circle btn-sm hover:bg-red-50 hover:text-red-600"
                            aria-label="Close" data-overlay="#modal-costume-product"
                            id="close-modal-costume-product">
                            <span class="icon-[tabler--x] size-5"></span>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-6">
                    <!-- Product Preview -->
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-4 mb-6 flex gap-6 items-start">
                        <div class="flex flex-col gap-3 flex-1">
                            <div class="flex flex-col gap-1">
                                <span class="text-xs text-gray-400 uppercase tracking-wide">Product</span>
                                <span class="font-semibold text-lg text-gray-800 capitalize"
                                    x-text="costumeForm.product_name">
                                    Product Name
                                </span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-xs text-gray-400 uppercase tracking-wide">Quantity</span>
                                <span class="font-semibold text-xl text-gray-800"
                                    x-text="costumeForm.product_qty + ' Pcs'">
                                    1 Pcs
                                </span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-xs text-gray-400 uppercase tracking-wide">Price</span>
                                <span class="font-bold text-2xl text-emerald-600">
                                    Rp. <span x-text="costumeForm.price_rupiah_view"></span>
                                </span>
                            </div>
                        </div>
                        <div class="w-48 h-48 bg-gray-300 rounded-xl overflow-hidden flex-shrink-0">
                            <img src="https://ik.imagekit.io/tvlk/blog/2024/08/shutterstock_2373316383.jpg"
                                alt="Product" class="w-full h-full object-cover" />
                        </div>
                    </div>

                    <!-- Tabs -->
                    <nav class="tabs overflow-x-auto space-x-1 rtl:space-x-reverse p-1 mb-4" aria-label="Tabs"
                        role="tablist" aria-orientation="horizontal">
                        <button type="button"
                            class="btn btn-text active-tab:bg-primary active-tab:text-white hover:text-primary active hover:bg-primary/20 px-4 py-2"
                            id="tabs-pill-icon-item-1" data-tab="#tabs-pill-icon-1" aria-controls="tabs-pill-icon-1"
                            role="tab" aria-selected="false">
                            <span class="icon-[carbon--product] size-5 shrink-0"></span>
                            <span class="hidden sm:inline ml-2">Materials</span>
                        </button>
                        <button type="button"
                            class="btn btn-text active-tab:bg-primary active-tab:text-white hover:text-primary active hover:bg-primary/20 px-4 py-2"
                            id="tabs-pill-icon-item-2" data-tab="#tabs-pill-icon-2" aria-controls="tabs-pill-icon-2"
                            role="tab" aria-selected="false">
                            <span class="icon-[ph--paper-plane-tilt-bold] size-5 shrink-0"></span>
                            <span class="hidden sm:inline ml-2">Others</span>
                        </button>
                    </nav>

                    <!-- Tab Content -->
                    <div class="mt-4">
                        <!-- Materials Tab -->
                        <div id="tabs-pill-icon-1" role="tabpanel" aria-labelledby="tabs-pill-icon-item-1">
                            <div
                                class="bg-gradient-to-br from-slate-50 to-gray-100 rounded-2xl p-6 shadow-sm border border-gray-200/50">
                                <div class="flex flex-col gap-2">
                                    <!-- Material Selection -->
                                    <div class="flex flex-col gap-3">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[carbon--product] size-4 text-primary"></span>
                                            Select Material
                                        </label>

                                        <!-- Modern Dropdown Select -->
                                        <div class="relative" x-data="{ isOpen: false }">
                                            <div @click="isOpen = !isOpen" @click.outside="isOpen = false"
                                                class="relative cursor-pointer group">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <span
                                                        class="icon-[tabler--search] size-5 text-gray-400 group-focus-within:text-primary transition-colors"></span>
                                                </div>
                                                <input x-model="filtersearch" @keyup="filterbarangcostumer"
                                                    @focus="isOpen = true" type="text"
                                                    class="w-full pl-12 pr-12 py-3.5 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm"
                                                    placeholder="Search or select a material..." />
                                                <div
                                                    class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                                    <span
                                                        class="icon-[tabler--chevron-down] size-5 text-gray-400 transition-transform duration-200"
                                                        :class="isOpen ? 'rotate-180' : ''"></span>
                                                </div>
                                            </div>

                                            <!-- Dropdown List -->
                                            <div x-show="isOpen && filterdata.length > 0"
                                                x-transition:enter="transition ease-out duration-200"
                                                x-transition:enter-start="opacity-0 -translate-y-2"
                                                x-transition:enter-end="opacity-100 translate-y-0"
                                                x-transition:leave="transition ease-in duration-150"
                                                x-transition:leave-start="opacity-100 translate-y-0"
                                                x-transition:leave-end="opacity-0 -translate-y-2"
                                                class="absolute z-20 w-full mt-2 bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden max-h-64 overflow-y-auto">
                                                <template x-for="item in filterdata">
                                                    <div @click="selectBarang(item); isOpen = false"
                                                        class="px-4 py-3 hover:bg-gradient-to-r hover:from-primary/5 hover:to-primary/10 cursor-pointer transition-all duration-200 border-b border-gray-100 last:border-0 group">
                                                        <div class="flex items-center justify-between">
                                                            <span
                                                                class="text-gray-800 font-medium group-hover:text-primary transition-colors"
                                                                x-text="item.nama_barang"></span>
                                                            <span
                                                                class="icon-[tabler--chevron-right] size-4 text-gray-300 group-hover:text-primary opacity-0 group-hover:opacity-100 transition-all"></span>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>

                                            <!-- Empty State -->
                                            <div x-show="isOpen && filterdata.length === 0 && filtersearch.length > 0"
                                                class="absolute z-20 w-full mt-2 bg-white border border-gray-200 rounded-xl shadow-xl p-6 text-center">
                                                <span
                                                    class="icon-[tabler--search-off] size-12 text-gray-300 mx-auto mb-2"></span>
                                                <p class="text-gray-500 text-sm">No materials found</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Price & Quantity -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <!-- Price -->
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                <span
                                                    class="icon-[hugeicons--money-bag-02] size-4 text-emerald-500"></span>
                                                Price
                                            </label>
                                            <div class="relative">
                                                <span
                                                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">Rp</span>
                                                <input type="text"
                                                    class="w-full pl-12 pr-4 py-3.5 bg-gray-100 border-0 rounded-xl text-gray-800 font-semibold cursor-not-allowed"
                                                    x-model="xbarangdata.price" readonly />
                                            </div>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                <span class="icon-[tabler--box] size-4 text-blue-500"></span>
                                                Quantity
                                            </label>
                                            <div class="flex items-center gap-2">
                                                <button
                                                    @click="xbarangdata.qty = Math.max(1, (parseInt(xbarangdata.qty) || 1) - 1)"
                                                    class="w-12 h-12 flex items-center justify-center bg-white border-2 border-gray-200 rounded-xl hover:border-primary hover:bg-primary/5 transition-all duration-200 text-gray-600 hover:text-primary">
                                                    <span class="icon-[tabler--minus] size-5"></span>
                                                </button>
                                                <input type="number" min="1"
                                                    class="flex-1 text-center py-3.5 bg-white border-2 border-gray-200 rounded-xl text-gray-800 font-semibold focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200"
                                                    x-model="xbarangdata.qty" />
                                                <button @click="xbarangdata.qty = (parseInt(xbarangdata.qty) || 0) + 1"
                                                    class="w-12 h-12 flex items-center justify-center bg-white border-2 border-gray-200 rounded-xl hover:border-primary hover:bg-primary/5 transition-all duration-200 text-gray-600 hover:text-primary">
                                                    <span class="icon-[tabler--plus] size-5"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Button -->
                                <div class="mt-6 pt-6 border-t border-gray-200">
                                    <button
                                        class="w-full btn btn-primary gap-3 text-base font-semibold shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300"
                                        x-on:click="addItemCostumeBarang">
                                        <span class="icon-[material-symbols--add-task-rounded] size-6"></span>
                                        Add Material to Product
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Others Tab -->
                        <div id="tabs-pill-icon-2" class="hidden" role="tabpanel"
                            aria-labelledby="tabs-pill-icon-item-2">
                            <div
                                class="bg-gradient-to-br from-slate-50 to-gray-100 rounded-2xl p-6 shadow-sm border border-gray-200/50">
                                <div class="flex flex-col gap-2">
                                    <!-- Item Name -->
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[tabler--tag] size-4 text-purple-500"></span>
                                            Item Name
                                        </label>
                                        <input type="text"
                                            class="w-full px-4 py-3.5 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm"
                                            x-model="xothercsdata.title" placeholder="Enter item name..." />
                                    </div>

                                    <div class="grid grid-cols-2 gap-2">
                                        <!-- Cost -->
                                        <div class="col-span-1 flex flex-col gap-2">
                                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                <span
                                                    class="icon-[hugeicons--money-bag-02] size-4 text-emerald-500"></span>
                                                Cost
                                            </label>
                                            <div class="relative">
                                                <span
                                                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">Rp</span>
                                                <input type="number" min="0"
                                                    class="w-full pl-12 pr-4 py-3.5 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm"
                                                    x-model="xothercsdata.price" placeholder="0" />
                                            </div>
                                        </div>
                                        <!-- Quantity -->
                                        <div class="col-span-1 flex flex-col gap-2">
                                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                <span class="icon-[tabler--box] size-4 text-blue-500"></span>
                                                Quantity
                                            </label>
                                            <div class="flex items-center gap-2">
                                                <button
                                                    @click="xothercsdata.qty = Math.max(1, (parseInt(xothercsdata.qty) || 1) - 1)"
                                                    class="w-12 h-12 flex items-center justify-center bg-white border-2 border-gray-200 rounded-xl hover:border-primary hover:bg-primary/5 transition-all duration-200 text-gray-600 hover:text-primary">
                                                    <span class="icon-[tabler--minus] size-5"></span>
                                                </button>
                                                <input type="number" min="1"
                                                    class="flex-1 text-center py-3.5 bg-white border-2 border-gray-200 rounded-xl text-gray-800 font-semibold focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200"
                                                    x-model="xothercsdata.qty" />
                                                <button
                                                    @click="xothercsdata.qty = (parseInt(xothercsdata.qty) || 0) + 1"
                                                    class="w-12 h-12 flex items-center justify-center bg-white border-2 border-gray-200 rounded-xl hover:border-primary hover:bg-primary/5 transition-all duration-200 text-gray-600 hover:text-primary">
                                                    <span class="icon-[tabler--plus] size-5"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Button -->
                                <div class="mt-6 pt-6 border-t border-gray-200">
                                    <button
                                        class="w-full btn btn-primary gap-3 text-base font-semibold shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300"
                                        x-on:click="addItemCostumeOther">
                                        <span class="icon-[material-symbols--add-task-rounded] size-6"></span>
                                        Add Custom Item
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Custom Items Table -->
                    <div class="mt-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <span class="icon-[tabler--list-details] size-4"></span>
                            Added Items
                        </h4>
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="table table-sm">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="font-semibold text-gray-600">Item</th>
                                            <th class="font-semibold text-gray-600">Price</th>
                                            <th class="font-semibold text-gray-600">Qty</th>
                                            <th class="font-semibold text-gray-600">Total</th>
                                            <th class="font-semibold text-gray-600 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in costumeItem">
                                            <tr class="hover:bg-gray-50">
                                                <td>
                                                    <div class="flex flex-col gap-1">
                                                        <span x-text="item.item_name"
                                                            class="text-wrap font-medium text-gray-800"></span>
                                                        <span x-show="!item.status"
                                                            class="badge badge-sm badge-soft badge-primary">Material</span>
                                                        <span x-show="item.status"
                                                            class="badge badge-sm badge-soft badge-error">Other</span>
                                                    </div>
                                                </td>
                                                <td class="text-gray-600">Rp. <span
                                                        x-text="formatRupiah(item.item_price)"></span></td>
                                                <td class="text-gray-600" x-text="item.item_qty"></td>
                                                <td class="text-gray-600">Rp. <span
                                                        x-text="formatRupiah(item.total)"></span></td>
                                                <td class="text-right">
                                                    <button @click="deleteItemCostumeBarang(item.item_id)"
                                                        class="btn btn-circle btn-sm btn-soft btn-error hover:scale-110 transition-transform">
                                                        <span class="icon-[uil--trash-alt] size-4"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
                    <div class="flex justify-end gap-3">
                        <button type="button" class="btn btn-ghost gap-2 hover:bg-gray-200"
                            data-overlay="#modal-costume-product">
                            <span class="icon-[tabler--x] size-5"></span>
                            Cancel
                        </button>
                        <button type="button" class="btn btn-primary gap-2 shadow-lg shadow-primary/30"
                            @click="addItemCostume">
                            <span class="icon-[tabler--check] size-5"></span>
                            Add Product
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Barcode Scanner -->
    <div id="modal-barcode-add-item"
        class="overlay modal overlay-open:opacity-100 modal-middle hidden [--overlay-backdrop:static]" role="dialog"
        tabindex="-1">
        <div class="modal-dialog overlay-open:opacity-100 max-w-md">
            <div class="modal-content rounded-2xl shadow-2xl">
                <!-- Modal Header -->
                <div class="modal-header px-6 py-4 border-b border-gray-100">
                    <div class="w-full flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2">
                                <span
                                    class="icon-[material-symbols--barcode-scanner-rounded] size-6 text-white"></span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Barcode Scanner</h3>
                                <p class="text-sm text-gray-500">Scan product barcode</p>
                            </div>
                        </div>
                        <button type="button"
                            class="btn btn-ghost btn-circle btn-sm hover:bg-red-50 hover:text-red-600"
                            aria-label="Close" data-overlay="#modal-barcode-add-item">
                            <span class="icon-[tabler--x] size-5"></span>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-6">
                    <div class="flex flex-col gap-4">
                        <input type="text"
                            class="input input-lg text-center text-gray-800 border-2 border-primary/20 focus:border-primary rounded-xl"
                            x-model="bInput" :disabled="bAction" @keyup="bInputAct" autofocus id="bInput"
                            placeholder="Scan or enter barcode..." />

                        <button type="button" x-on:click="addItemByBarcode"
                            class="btn btn-error btn-soft w-full py-3 font-semibold gap-2"
                            :class="{ 'opacity-50 cursor-not-allowed': bAction }">
                            <span class="icon-[tabler--barcode] size-5"></span>
                            <span x-text="bAction ? 'Loading...' : 'Add to Cart'"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('js')
        <script>
            window.addEventListener('load', function() {
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            })

            function kasirIndex() {
                return {
                    isLoadTrasaction: false,
                    transaksiProsses() {
                        if (this.items.length <= 0) {
                            notifier.warning('Item is empty.')
                            return;
                        }
                        if (this.subtotal === '') {
                            notifier.warning('Product title tidak boleh kosong.')
                            return;
                        }
                        Swal.fire({
                            title: "Informasi",
                            text: "Yakin, ingin proses transaksi ini ?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Proses Transaksi!",
                            cancelButtonText: "Tidak!",
                        }).then(async (result) => {
                            if (result.isConfirmed) {
                                this.isLoadTrasaction = true;
                                Swal.fire({
                                    title: "Is loading...",
                                    text: "Silakan tunggu, transaksi sedang diproses...",
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });

                                try {
                                    const url = '/transaksi/on-proses';
                                    const data = {
                                        'items': this.items,
                                        'subtotal': this.subtotalGet
                                    }
                                    const response = await axios.post(url, data);
                                    const result = response.data.data;
                                    const key = result.payment_id;

                                    this.isLoadTrasaction = false;
                                    this.resetItems();

                                    Swal.fire({
                                        title: "Payment",
                                        text: "Lanjutkan untuk proses pembayaran",
                                        icon: "info",
                                        showCancelButton: true,
                                        confirmButtonColor: "#3085d6",
                                        cancelButtonColor: "#d33",
                                        confirmButtonText: "Proses pembayaran!"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = `/transaksi/kasir-proses-bayar/${key}`;
                                        }
                                    });
                                } catch (error) {
                                    this.isLoadTrasaction = false;
                                    Swal.close()
                                    const response = error.response.data;
                                    console.log(error);

                                    if (error.status === 422) {
                                        Swal.fire({
                                            title: "Invalid!",
                                            html: `<span class="capitalize text-wrap max-w-42">${response.message}</span>`,
                                            icon: "warning"
                                        })
                                    } else {
                                        Swal.fire({
                                            title: "Error!",
                                            text: "Terjadi kesalahan dalam proses transaksi",
                                            icon: "error"
                                        })
                                    }

                                }


                            }
                        });

                    },

                    items: [],
                    subtotal: 0,
                    subtotalGet: 0,
                    addItem(index) {
                        const data = {
                            'product_id': index.id,
                            'product_name': index.product_name ?? '[404]',
                            'product_qty': 1,
                            'product_price': index.price,
                            'total_price': index.price * 1,
                            'product_costume': false,
                            'product_costume_details': [],
                            'costume_total': 0,
                            'img_url': index.img
                        }
                        const findItems = this.items.find(arraydata => arraydata.product_id === data.product_id);
                        if (findItems) {
                            notifier.alert(`Item product sudah ada`)
                            return
                        } else {
                            this.items.push(data);
                            notifier.success(`Item ${data.product_name} added.`)
                        }
                        this.funcSubtotal();
                    },

                    removeItem(indexKey) {
                        const arrayFilter = this.items.filter(item => item.product_id !== indexKey);
                        this.items = arrayFilter;
                        this.funcSubtotal()
                    },

                    addQty(key) {
                        const data = this.items.find(index => index.product_id === key);
                        let qty = data['product_qty'] += 1;
                        let price = data['product_price'];
                        let costumeCost = data['costume_total'];
                        let total = parseFloat(price) + parseFloat(costumeCost);
                        data['total_price'] = total * qty;
                        this.funcSubtotal();
                    },

                    reduceQty(key) {
                        const data = this.items.find(index => index.product_id === key);
                        if (data['product_qty'] <= 1) {
                            notifier.alert('Jumlah item tidak boleh kurang dari 1.')
                            return;
                        }
                        let qty = data['product_qty'] -= 1;
                        let price = data['product_price'];
                        let costumeCost = data['costume_total'];
                        let total = parseFloat(price) + parseFloat(costumeCost);
                        data['total_price'] = total * qty;
                        this.funcSubtotal();
                    },

                    funcSubtotal() {
                        let subtotalBelanja = 0;
                        this.items.forEach(element => {
                            subtotalBelanja += parseFloat(element.total_price);
                        });
                        this.subtotalGet = subtotalBelanja;
                        this.subtotal = formatRupiah(subtotalBelanja.toFixed(0)) ?? '0';
                    },

                    dataTable: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',
                    search: {
                        keyword: '',
                        range: 15,
                    },
                    getProduct(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                keywords: this.search.keyword ?? "",
                                range: this.search.range ?? ""
                            });
                            url = `/transaksi/product-json?${params.toString()}`;
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
                            .then((res) => {
                                const response = res.data.data;
                                this.dataTable = response.data;
                                this.links = this.processPaginationLinks(response.links);
                                this.nextPage = response.next_page_url ? this.addParamsToUrl(response.next_page_url) : null;
                                this.prevPage = response.prev_page_url ? this.addParamsToUrl(response.prev_page_url) : null;
                            })
                            .catch((err) => {
                                console.error(err);
                                Swal.fire({
                                    title: "Error!",
                                    text: "Failed to fetch product data.",
                                    icon: "error"
                                });
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
                        searchParams.set('keywords', this.search.keyword);
                        searchParams.set('range', this.search.range);

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
                            range: this.search.range
                        });
                        url = `/product/product-json?${params.toString()}`;
                        console.log('Final URL:', url);
                        this.getProduct(url);
                    },

                    resetItems() {
                        this.items = [];
                        this.subtotal = '';
                    },

                    shortText(value, length) {
                        return `${value.substring(0, length)}  ...`;
                    },

                    closeCostumeModal() {
                        const btn = document.getElementById("close-modal-costume-product")
                        btn.click()
                    },

                    costumeForm: {
                        product_id: "",
                        product_name: "",
                        product_qty: 1,
                        product_price: 0,
                        total_price: 0,
                        product_costume: true,
                        product_costume_details: this.costumeItem,
                        img_url: "",
                        price_rupiah_view: 0,
                    },
                    costumeItem: [],
                    openCostumeModal(indexResult) {
                        const btn = document.getElementById(`open-modal-costume-product`);
                        btn.click();
                        const data = indexResult;
                        this.costumeForm = {
                            product_id: data.id,
                            product_name: data.product_name,
                            product_qty: 1,
                            product_price: data.price,
                            total_price: data.price * 1,
                            product_costume: true,
                            product_costume_details: this.costumeItem,
                            img_url: data.img,
                            price_rupiah_view: formatRupiah(data.price)
                        };
                    },

                    filtersearch: '',
                    filterdata: [],
                    filterbarangcostumer() {
                        axios.get(`/transaksi/get-barang?search=${this.filtersearch}`)
                            .then((response) => {
                                const data = response.data.data;
                                this.filterdata = data;
                            })
                            .catch((error) => {
                                console.log(error);
                            })
                    },

                    selectBarang(data) {
                        this.filterdata = [];
                        this.filtersearch = data.nama_barang;
                        this.xbarangdata = {
                            id: data.id,
                            title: data.nama_barang,
                            qty: 1,
                            price: data.price,
                            total: data.price * 1,
                            comment: ''
                        };
                    },

                    xbarangdata: {
                        id: '',
                        title: '',
                        qty: 0,
                        price: 0,
                        total: 0,
                        comment: ''
                    },
                    addItemCostumeBarang() {
                        const errors = [];
                        if (!this.xbarangdata.title.trim()) errors.push('Nama barang tidak boleh kosong');
                        if (this.xbarangdata.qty <= 0) errors.push('Jumlah barang harus lebih dari 0');
                        if (this.xbarangdata.price <= 0) errors.push('Harga barang harus lebih dari 0');
                        if (errors.length) {
                            errors.forEach(error => notifier.warning(error)); // Menampilkan setiap error satu per satu
                            return;
                        }

                        const existingItemIndex = this.costumeItem.findIndex(item => item.item_id === this.xbarangdata.id);
                        if (existingItemIndex !== -1) {
                            // Update existing item
                            this.costumeItem[existingItemIndex].item_qty = this.xbarangdata.qty;
                            this.costumeItem[existingItemIndex].total = this.xbarangdata.qty * this.xbarangdata.price;
                            notifier.warning('barang costumer updated');
                        } else {
                            // Add new item
                            const newItem = {
                                status: false,
                                item_id: this.xbarangdata.id,
                                item_name: this.xbarangdata.title,
                                item_qty: this.xbarangdata.qty,
                                item_price: this.xbarangdata.price,
                                total: this.xbarangdata.qty * this.xbarangdata.price,
                                comment: ''
                            };
                            this.costumeItem.push(newItem);
                            notifier.success('Barang costumer added');
                        }

                        // Reset xbarangdata and any other necessary state
                        this.xbarangdata = {
                            id: '',
                            title: '',
                            qty: 0,
                            price: 0,
                            total: 0,
                            comment: ''
                        };
                        this.filtersearch = '';
                    },

                    xothercsdata: {
                        title: '',
                        qty: 0,
                        price: 0,
                        comment: ''
                    },
                    addItemCostumeOther() {
                        const errors = [];
                        if (!this.xothercsdata.title.trim()) errors.push('Nama barang tidak boleh kosong');
                        if (this.xothercsdata.qty <= 0) errors.push('Jumlah barang harus lebih dari 0');
                        if (this.xothercsdata.price <= 0) errors.push('Harga barang harus lebih dari 0');

                        if (errors.length) {
                            errors.forEach(error => notifier.warning(error)); // Menampilkan setiap error secara terpisah
                            return;
                        }
                        const data = {
                            status: true,
                            item_id: uuid(),
                            item_name: this.xothercsdata.title,
                            item_qty: this.xothercsdata.qty,
                            item_price: this.xothercsdata.price,
                            total: this.xothercsdata.qty * this.xothercsdata.price,
                            comment: ""
                        }
                        this.costumeItem.push(data);
                        notifier.success('Barang lain added');
                        this.xothercsdata = {
                            title: '',
                            qty: 0,
                            price: 0,
                            comment: ''
                        }
                    },

                    deleteItemCostumeBarang(itemId) {
                        this.costumeItem = this.costumeItem.filter(item => item.item_id !== itemId);
                    },

                    getTotalCostumePrice() {
                        let subtotalBelanja = 0;
                        this.costumeItem.forEach(element => {
                            subtotalBelanja += element.total;
                        });
                        return subtotalBelanja;
                    },

                    addItemCostume() {
                        let productPrice = parseInt(this.costumeForm.product_price);
                        let costumeTotal = parseInt(this.getTotalCostumePrice());
                        let total = productPrice + costumeTotal;
                        const data = {
                            'product_id': this.costumeForm.product_id,
                            'product_name': this.costumeForm.product_name,
                            'product_qty': this.costumeForm.product_qty,
                            'product_price': productPrice,
                            'total_price': total,
                            'product_costume': true,
                            'product_costume_details': this.costumeItem,
                            'costume_total': costumeTotal,
                            'img_url': this.costumeForm.img_url
                        }
                        const findItems = this.items.find(arraydata => arraydata.product_id === data.product_id);
                        if (findItems) {
                            notifier.alert(`Item product sudah ada`)
                            return
                        } else {
                            this.items.push(data);
                            notifier.success(`Item ${data.product_name} added.`)
                        }
                        this.funcSubtotal();
                        this.costumeItem = [];
                        this.closeCostumeModal();
                        this.costumeForm = {
                            product_id: "",
                            product_name: "",
                            product_qty: 1,
                            product_price: 0,
                            total_price: 0,
                            product_costume: true,
                            product_costume_details: this.costumeItem,
                            img_url: "",
                            price_rupiah_view: 0,
                        };
                    },

                    bInput: '',
                    bAction: false,
                    addItemByBarcode() {
                        this.bAction = true;
                        const findIndex = this.dataTable.find(findata => findata.code == this.bInput);
                        if (findIndex) {
                            const data = {
                                'product_id': findIndex.id,
                                'product_name': findIndex.product_name ?? '[404]',
                                'product_qty': 1,
                                'product_price': findIndex.price,
                                'total_price': findIndex.price * 1,
                                'product_costume': false,
                                'product_costume_details': [],
                                'costume_total': 0,
                                'img_url': findIndex.img
                            }
                            const findItems = this.items.find(arraydata => arraydata.product_id === data.product_id);
                            if (findItems) {
                                notifier.alert(`Item product sudah ada`)
                            } else {
                                this.items.push(data);
                                notifier.success(`Item ${data.product_name} added.`)
                            }
                        } else {
                            const url = '/transaksi/barcode-scan';
                            axios.post(url, {
                                    barcode: this.bInput
                                })
                                .then(response => {
                                    const data = response.data.data;
                                    const findItems = this.items.find(arraydata => arraydata.product_id === data.id);
                                    if (findItems) {
                                        notifier.warning(`Item product sudah ada`)
                                    } else {
                                        const product = {
                                            'product_id': data.id,
                                            'product_name': data.product_name,
                                            'product_qty': 1,
                                            'product_price': data.price,
                                            'total_price': data.price * 1,
                                            'product_costume': false,
                                            'product_costume_details': [],
                                            'costume_total': 0,
                                            'img_url': data.img
                                        }
                                        this.items.push(product);
                                        notifier.success(`Item ${data.product_name} added.`)
                                    }
                                })
                                .catch(error => {
                                    if (error.status === 404) {
                                        notifier.warning(error.response.data.message);
                                        return;
                                    }
                                    notifier.alert(error.message);
                                });
                        }
                        this.funcSubtotal();
                        this.bInput = '';
                        const textInput = document.getElementById('bInput');
                        textInput.focus();
                        this.bAction = false;
                    },
                    bInputAct() {
                        if (this.bInput.length === 8) {
                            this.addItemByBarcode();
                        }
                    },

                    init() {
                        this.getProduct()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
