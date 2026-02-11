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
                    <a href="#" aria-label="Produksi" class="hover:text-primary transition-colors">
                        <span class="icon-[tabler--factory]"></span>
                        Produksi
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li aria-current="page" class="font-medium text-primary">
                    <span class="icon-[tabler--file] me-1 size-5"></span>
                    Form Produksi
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span class="bg-gradient-to-br from-orange-500 to-red-600 rounded-xl p-2.5 shadow-lg shadow-orange-500/30">
                        <span class="icon-[tabler--factory] size-6 text-white"></span>
                    </span>
                    Form Produksi
                </h1>
                <p class="text-gray-500 mt-2 ml-1">Create new production record</p>
            </div>
        </div>
    </div>

    <div class="py-4" x-data="ProductionFrom">
        <div class="grid gap-6 grid-cols-1 xl:grid-cols-12">
            <!-- Left Column - Product Items -->
            <div class="xl:col-span-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/20">
                                    <span class="icon-[tabler--album] size-5 text-white"></span>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-gray-800">Product Item Details</h2>
                                    <p class="text-xs text-gray-500">Search and select materials</p>
                                </div>
                            </div>
                            <button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 rounded-xl shadow-lg shadow-amber-500/30 transition-all duration-200 hover:shadow-amber-500/40 hover:-translate-y-0.5"
                                type="button" aria-haspopup="dialog"
                                aria-expanded="false" aria-controls="add-item-modal" data-overlay="#add-item-modal">
                                <span class="icon-[hugeicons--money-add-01] size-4"></span>
                                Item Tambahan
                            </button>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid gap-6 grid-cols-1 lg:grid-cols-5">
                            <!-- Search Section -->
                            <div class="lg:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--search] size-4 text-gray-400"></span>
                                        Search Materials
                                    </span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <span class="icon-[tabler--search] size-5"></span>
                                    </span>
                                    <input type="text" 
                                        class="w-full pl-12 pr-4 py-3.5 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200" 
                                        placeholder="Search materials..."
                                        id="" 
                                        x-model="searchBarang" 
                                        @keyup.enter="getBahanBaku" />
                                </div>
                                <button x-on:click="getBahanBaku"
                                    class="w-full mt-3 inline-flex items-center justify-center gap-2 px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 rounded-xl shadow-lg shadow-blue-500/30 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200" 
                                    :disabled="isSearch"
                                    x-text="isSearch ? 'Loading...' : 'Search Materials'">
                                    <span class="icon-[tabler--search] size-4"></span>
                                </button>
                            </div>

                            <!-- Materials List -->
                            <div class="lg:col-span-3">
                                <div class="max-h-96 overflow-y-auto space-y-3 pr-2">
                                    <!-- Empty State -->
                                    <div x-show="bahanBaku <= 0" class="p-8 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center">
                                                <span class="icon-[tabler--database-off] size-8 text-gray-400"></span>
                                            </div>
                                            <p class="text-gray-500 font-medium">No materials found</p>
                                            <p class="text-sm text-gray-400">Try adjusting your search criteria</p>
                                        </div>
                                    </div>

                                    <!-- Material Cards -->
                                    <template x-for="(val, index) in bahanBaku" :key="index">
                                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4 hover:shadow-md hover:border-green-300 transition-all duration-200">
                                            <div class="flex items-start justify-between gap-4">
                                                <!-- Material Info -->
                                                <div class="flex-1">
                                                    <h5 class="font-semibold text-gray-800 text-sm flex items-center gap-2 mb-3">
                                                        <span class="icon-[tabler--package] size-4 text-green-600"></span>
                                                        <span x-text="val.nama_barang">Nama Barang</span>
                                                    </h5>
                                                    <div class="space-y-2">
                                                        <div class="flex items-center gap-3">
                                                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-green-100">
                                                                <span class="icon-[tabler--moneybag] size-4 text-green-600"></span>
                                                                <span class="font-semibold text-green-700">Rp.</span>
                                                                <span x-text="formatRupiah(val.price)"></span>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center gap-3">
                                                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-100">
                                                                <span class="icon-[tabler--align-box-right-stretch] size-4 text-blue-600"></span>
                                                                <span class="font-semibold text-blue-700">Stock:</span>
                                                                <span x-text="val.stock"></span>
                                                                <span class="text-blue-500 capitalize" x-text="val.satuan.nama_satuan"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Quantity Controls & Add Button -->
                                                <div class="flex flex-col items-end gap-3">
                                                    <div class="flex items-center gap-2">
                                                        <button type="button"
                                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-all duration-200 hover:scale-105"
                                                            aria-label="Decrement button"
                                                            @click="decrement(val.id)">
                                                            <span class="icon-[tabler--minus] size-4"></span>
                                                        </button>
                                                        <input class="w-20 text-center px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200" type="text"
                                                            x-model="qty[val.id]" data-input-number-input />
                                                        <button type="button"
                                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-all duration-200 hover:scale-105"
                                                            aria-label="Increment button"
                                                            @click="increment(val.id)">
                                                            <span class="icon-[tabler--plus] size-4"></span>
                                                        </button>
                                                    </div>
                                                    <button @click="addItem(val)"
                                                        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 rounded-xl shadow-lg shadow-green-500/30 transition-all duration-200 hover:shadow-green-500/40 hover:-translate-y-0.5">
                                                        <span class="icon-[tabler--arrow-right-to-arc] size-4"></span>
                                                        Add
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Selected Items Table -->
                            <div class="lg:col-span-5">
                                <div class="border border-gray-200 rounded-xl overflow-hidden">
                                    <div class="overflow-x-auto">
                                        <table class="w-full">
                                            <thead>
                                                <tr class="bg-gray-50/50">
                                                    <th class="px-4 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Item</th>
                                                    <th class="px-4 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total</th>
                                                    <th class="px-4 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                                    <th class="px-4 py-3.5 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-100">
                                                <template x-for="item in items">
                                                    <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                                        <td class="px-4 py-3">
                                                            <div class="flex flex-col gap-1">
                                                                <span x-text="item.item"
                                                                    class="font-medium text-gray-800 text-sm"></span>
                                                                <div class="flex gap-2 justify-start">
                                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-amber-50 text-amber-700">
                                                                        Rp.
                                                                        <span x-text="formatRupiah(item.price)"></span>
                                                                    </span>
                                                                    <span class="text-gray-400">×</span>
                                                                    <span x-text="item.qty" class="font-semibold text-gray-700"></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            <span class="font-semibold text-gray-800 text-sm">
                                                                Rp.
                                                                <span x-text="formatRupiah(item.total_price)"></span>
                                                            </span>
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            <span x-show="!item.status"
                                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-green-50 text-green-700">
                                                                <span class="icon-[tabler--box] size-3 mr-1"></span>
                                                                Bahan Baku
                                                            </span>
                                                            <span x-show="item.status"
                                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-50 text-blue-700">
                                                                <span class="icon-[tabler--money] size-3 mr-1"></span>
                                                                Biaya Lainnya
                                                            </span>
                                                        </td>
                                                        <td class="px-4 py-3 text-center">
                                                            <button x-on:click="deleteItem(item.id)"
                                                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-all duration-200 hover:scale-105"
                                                                aria-label="Delete item">
                                                                <span class="icon-[tabler--trash] size-4"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <!-- Empty State -->
                                                <template x-if="items.length === 0">
                                                    <tr>
                                                        <td colspan="4" class="px-4 py-12 text-center">
                                                            <div class="flex flex-col items-center gap-3">
                                                                <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center">
                                                                    <span class="icon-[tabler--shopping-cart-off] size-8 text-gray-400"></span>
                                                                </div>
                                                                <p class="text-gray-500 font-medium">No items selected</p>
                                                                <p class="text-sm text-gray-400">Search and add materials from the left panel</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Total Cost Display -->
                                <div class="mt-6 flex justify-end">
                                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg shadow-blue-500/30 w-72">
                                        <label class="text-blue-100 text-sm font-medium">Biaya Bahan Baku</label>
                                        <div class="text-3xl font-bold mt-2">
                                            Rp.
                                            <span x-text="totalPrice"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Production Details -->
            <div class="xl:col-span-4">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 sticky top-6">
                    <!-- Card Header -->
                    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-white dark:from-gray-700 dark:to-gray-800">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center shadow-lg shadow-orange-500/20">
                                <span class="icon-[tabler--chart-bubble] size-5 text-white"></span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Production Details</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Fill in production information</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 space-y-5">
                        <!-- Product Name & Estimation -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--tag] size-4 text-gray-400"></span>
                                        Product Name
                                    </span>
                                </label>
                                <div class="relative">
                                    <input x-model="detail.title_product" type="text"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                        placeholder="Enter product name..."
                                        id="" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--calendar] size-4 text-gray-400"></span>
                                        Estimation
                                    </span>
                                </label>
                                <div class="relative">
                                    <input x-model="detail.estimasi" type="text"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                        placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                        id="flatpickr-range" />
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <span class="icon-[tabler--calendar] size-5"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--file-description] size-4 text-gray-400"></span>
                                    Description
                                </span>
                            </label>
                            <textarea x-model="detail.comment" 
                                class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none" 
                                rows="3"
                                placeholder="Enter product description..."
                                id="textareaFloating"></textarea>
                        </div>

                        <!-- Crafter & Reference Jasa -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--user] size-4 text-gray-400"></span>
                                        Crafter
                                    </span>
                                </label>
                                <div class="relative">
                                    <select x-model="detail.crafter" 
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200" 
                                        aria-label="Select crafter"
                                        id="">
                                        <option value="">Select Crafter...</option>
                                        <template x-for="val in pegawai">
                                            <option :value="val.id" x-text="val.pegawai_name"></option>
                                        </template>
                                    </select>
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <span class="icon-[tabler--chevron-down] size-5"></span>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--tools] size-4 text-gray-400"></span>
                                        Reference Jasa
                                    </span>
                                </label>
                                <div class="relative">
                                    <select x-model="detail.jasa" 
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200" 
                                        aria-label="Select reference jasa"
                                        id="">
                                        <option value="">Select Service...</option>
                                        <template x-for="val in jasa">
                                            <option :value="val.id">
                                                <span class="font-semibold text-sm">Rp.</span>
                                                <i class="text-sm font-semibold" x-text="formatRupiah(val.salary)"></i>
                                                <span class="text-gray-500"> || </span>
                                                <span x-text="val.title"></span>
                                            </option>
                                        </template>
                                    </select>
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <span class="icon-[tabler--chevron-down] size-5"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Cost Item & Cost Production -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--moneybag] size-4 text-gray-400"></span>
                                        Cost Item
                                    </span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">Rp</span>
                                    <input x-model="totalPrice" type="text" placeholder="0" readonly
                                        class="w-full pl-12 pr-4 py-3 text-sm bg-gray-100 border-0 rounded-xl font-semibold text-gray-700 cursor-not-allowed" id="" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--factory] size-4 text-gray-400"></span>
                                        Cost Production
                                    </span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">Rp</span>
                                    <input x-model="cost_productions" type="text"
                                        class="w-full pl-12 pr-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all duration-200" 
                                        placeholder="0"
                                        id=""
                                        @keyup="changeCostProcuction" />
                                </div>
                            </div>
                        </div>

                        <!-- Price For Sale Display -->
                        <div class="bg-gradient-to-r from-red-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg shadow-red-500/30">
                            <label class="text-red-100 text-sm font-medium">PRICE FOR SALE</label>
                            <p class="text-red-200 text-xs mb-2">(cost item + cost production)</p>
                            <div class="text-4xl font-bold">
                                <span>Rp. </span>
                                <span x-text="price">0</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" x-on:click="clearData"
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                                <span class="icon-[material-symbols--frame-reload-sharp] size-4"></span>
                                Clear Form
                            </button>
                            <button x-on:click="storeProduction" type="submit"
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 rounded-xl shadow-lg shadow-orange-500/30 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200" 
                                :disable="isLoading">
                                <span class="icon-[proicons--save] size-4"></span>
                                <span x-text="isLoading ? 'Processing...' : 'Submit Production'">Submit Production</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal: Add Custom Item --}}
        <div id="add-item-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100 transition-all duration-300">
                <div class="modal-content rounded-2xl shadow-2xl">
                    <!-- Modal Header -->
                    <div class="modal-header px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center shadow-lg shadow-amber-500/20">
                                    <span class="icon-[tabler--plus] size-5 text-white"></span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">Add Custom Item</h3>
                                    <p class="text-xs text-gray-500">Add additional cost item</p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-ghost btn-circle btn-sm hover:bg-red-50 hover:text-red-600"
                                aria-label="Close" data-overlay="#add-item-modal">
                                <span class="icon-[tabler--x] size-5"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Form -->
                    <form @submit.prevent="addCostumeItem">
                        <div class="modal-body p-6 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--tag] size-4 text-gray-400"></span>
                                        Item Name
                                    </span>
                                </label>
                                <input x-model="csForm.item" type="text" 
                                    class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200" 
                                    placeholder="Enter item name..."
                                    id="inte-name" />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--moneybag] size-4 text-gray-400"></span>
                                            Cost
                                        </span>
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">$</span>
                                        <input x-model="csForm.price" type="number" 
                                            class="w-full pl-8 pr-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200" 
                                            placeholder="00.00" 
                                            id="biaya" />
                                        <label class="sr-only" for="biaya">Enter amount</label>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--box] size-4 text-gray-400"></span>
                                            Quantity
                                        </span>
                                    </label>
                                    <input x-model="csForm.qty" type="number" 
                                        class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200" 
                                        placeholder="1"
                                        id="qty" />
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <span class="icon-[tabler--message] size-4 text-gray-400"></span>
                                        Comment
                                    </span>
                                </label>
                                <textarea x-model="csForm.comment" 
                                    class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200 resize-none" 
                                    rows="3"
                                    placeholder="Enter comment..."
                                    id="comment-cs-form"></textarea>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
                            <div class="flex justify-end gap-3">
                                <button type="button" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all duration-200" data-overlay="#add-item-modal">
                                    <span class="icon-[tabler--x] size-4"></span>
                                    Cancel
                                </button>
                                <button type="submit" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 rounded-xl shadow-lg shadow-amber-500/30 transition-all duration-200">
                                    <span class="icon-[tabler--plus] size-4"></span>
                                    Add Item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            flatpickr('#flatpickr-range', {
                mode: 'range'
            })
        });

        function ProductionFrom() {
            return {
                items: [],
                totalPrice: 0,
                cost_productions: 25000,
                price: 0,
                qty: [],
                csForm: {
                    id: '',
                    item: '',
                    price: '',
                    qty: '',
                    total_price: '',
                    status: true,
                    status_name: "Lainnya",
                    comment: ''
                },
                addCostumeItem() {
                    if (!this.csForm.item || this.csForm.item.trim() === "" || this.csForm.price <= 0 || this.csForm.qty <= 0) {
                        if (!this.csForm.item || this.csForm.item.trim() === "") {
                            notifier.warning("Nama Item cannot be empty");
                        }
                        if (this.csForm.price <= 0) {
                            notifier.warning("Price cannot be zero or less");
                        }
                        if (this.csForm.qty <= 0) {
                            notifier.warning("Quantity cannot be zero or less");
                        }
                        return;
                    }

                    try {
                        this.csForm.id = uuid();
                        let harga = parseInt(this.csForm.price);
                        let qty = parseInt(this.csForm.qty);
                        let totalPrice = parseInt(harga * qty);
                        this.csForm.total_price = totalPrice;
                        this.csForm.price = harga;
                        this.csForm.qty = qty;
                        this.items.push(this.csForm);
                        notifier.success(`Item ${this.item} added.`)

                        // reset form fields
                        this.csForm = {
                            id: '',
                            item: '',
                            stock: '',
                            price: '',
                            qty: '',
                            total_price: '',
                            status: true,
                            status_name: "Lainnya",
                            comment: ''
                        }

                        // re counting total price
                        this.sumTotalPrice();
                    } catch (error) {
                        console.log(error);

                    }
                },
                addItem(index) {
                    const data = {
                        'id': index.id,
                        'item': index.nama_barang,
                        'stock': index.stock,
                        'price': index.price,
                        'qty': this.qty[index.id],
                        'total_price': parseInt(index.price * this.qty[index.id]),
                        'status': false,
                        'status_name': "Bahan baku",
                        'comment': '-'
                    }
                    if (parseInt(data.stock) < parseInt(data.qty)) {
                        notifier.warning(`Qty of stock decrease`);
                        return;
                    }

                    if (data.qty <= 0 || data.qty === undefined) {
                        notifier.warning(`Qty of ${data.item} empty.`)
                        return
                    }
                    const findIndex = this.items.find(index => index.id === data.id);
                    if (findIndex) {
                        findIndex.qty = data.qty;
                        findIndex.total_price = data.total_price;
                        notifier.info(`Qty of ${findIndex.intem} updated.`)
                    } else {
                        this.items.push(data);
                        notifier.success(`Item ${data.item} added.`)
                    }
                    this.qty[data.id] = '0';
                    this.sumTotalPrice();
                },

                increment(index) {
                    if (this.qty[index] === undefined) {
                        this.qty[index] = 0;
                    }
                    this.qty[index]++;
                },
                decrement(index) {
                    if (this.qty[index] === undefined || this.qty[index] === 0) {
                        this.qty[index] = 0;
                        return;
                    }
                    this.qty[index]--;
                },

                deleteItem(key) {
                    const deleteIndex = this.items.filter(index => index.id !== key);
                    this.items = deleteIndex;
                    this.sumTotalPrice();
                    notifier.success('Deleted item success.')
                },
                changeCostProcuction() {
                    if (isNaN(this.cost_productions)) {
                        notifier.alert("Cost productions are not available")
                        return
                    }

                    if (!this.items.length > 0) {
                        notifier.warning('Item is empty.')
                        return;
                    }
                    this.sumTotalPrice();
                },

                sumTotalPrice() {
                    let total = 0;
                    this.items.forEach(element => {
                        total += parseInt(element.total_price);
                    });
                    this.totalPrice = formatRupiah(total);
                    const price = total + parseInt(this.cost_productions);
                    this.price = formatRupiah(price);

                    this.detail.amount_items = parseInt(total);
                    this.detail.production_cost = parseInt(this.cost_productions);
                    this.detail.price_to_sale = parseInt(price);
                },

                isLoading: false,
                detail: {
                    title_product: '',
                    estimasi: '',
                    comment: '',
                    crafter: '',
                    jasa: '',
                    amount_items: '',
                    production_cost: '',
                    price_to_sale: '',
                    costs_items: '',
                },
                storeProduction() {
                    const fields = [{
                            value: this.items.length,
                            message: "Item is empty.",
                            condition: this.items.length <= 0
                        },
                        {
                            value: this.detail.title_product,
                            message: "Product title tidak boleh kosong."
                        },
                        {
                            value: this.detail.crafter,
                            message: "Crafter tidak boleh kosong."
                        },
                        {
                            value: this.detail.estimasi,
                            message: "Estimasi produksi tidak boleh kosong."
                        },
                        {
                            value: this.detail.jasa,
                            message: "Jasa produksi tidak boleh kosong."
                        },
                        {
                            value: this.cost_productions,
                            message: "Biaya produksi tidak boleh kosong."
                        },
                        {
                            value: this.price,
                            message: "Total harga produksi tidak boleh kosong."
                        }
                    ];
                    for (const field of fields) {
                        if (!field.value || (field.condition !== undefined && field.condition)) {
                            notifier.warning(field.message);
                            return;
                        }
                    }

                    this.isLoading = true;
                    Swal.fire({
                        title: "Konfirmasi",
                        text: "Apakah anda yakin ingin menyimpan data produksi ini?",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, Simpan!",
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

                            // Prepare data
                            const data = {
                                items: this.items,
                                detail: this.detail,
                                amount_items: this.totalPrice,
                                biaya_produksi: this.cost_productions,
                                price: this.price,
                                jasa: this.detail.jasa,
                            };

                            // Make API call
                            axios.post('/produksi/store-produksi', data)
                                .then(response => {
                                    Swal.fire({
                                            title: "Berhasil!",
                                            text: "Data produksi berhasil disimpan.",
                                            icon: "success"
                                        });
                                    this.isLoading = false;
                                    this.clearData();
                                })
                                .catch(error => {
                                    Swal.fire({
                                            title: "Error!",
                                            text: "Terjadi kesalahan saat menyimpan data.",
                                            icon: "error"
                                        });
                                    this.isLoading = false;
                                });
                        }
                    });
                },

                bahanBaku: [],
                searchBarang: '',
                isSearch: false,
                getBahanBaku() {
                    this.isSearch = true;
                    const url = `/produksi/get-bahan-baku`;
                    axios.get(url, {
                            params: {
                                key: this.searchBarang
                            }
                        })
                        .then((res) => {
                            const data = res.data.data;
                            this.bahanBaku = data;
                        }).catch((err) => {
                            console.log(err);
                        }).finally(() => {
                            this.isSearch = false;
                        });
                },

                pegawai: [],
                getPegawai() {
                    const url = "/produksi/produksi-get-user";
                    axios.get(url).then((res) => {
                        const data = res.data.data;
                        this.pegawai = data;
                    }).catch((error) => {
                        console.log(error)
                    });
                },
                clearData() {
                    this.totalPrice = 0;
                    this.items = [];
                    this.detail = {
                        title_product: '',
                        estimasi: '',
                        comment: '',
                        crafter: '',
                        jasa: '',
                        amount_items: '',
                        production_cost: '',
                        price_to_sale: '',
                        cost_items: '',
                    }
                    this.searchBarang = '';
                    this.cost_productions = 0;
                    this.price = 0;
                    this.isLoading = false;
                },

                jasa: [],
                refJasa() {
                    axios.get("/transaksi/get-referensi-jasa").then((res) => {
                        const data = res.data.data;
                        // data.forEach(element => {
                        //     console.log(element);
                        // });
                        this.jasa = data;

                    }).catch((error) => {
                        console.log(error)
                    });
                },

                init() {
                    this.getPegawai();
                    this.refJasa();
                }
            }
        }
    </script>
    @endpush
</x-base-layout>
