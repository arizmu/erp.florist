<x-base-layout>
    @push('css')
        <style>
            .my-actions {
                margin: 2em 2em 0;
            }

            .order-1 {
                order: 1;
            }

            .order-2 {
                order: 2;
            }

            .order-3 {
                order: 3;
            }

            .right-gap {
                margin-right: auto;
            }
        </style>
    @endpush
    <div x-data="indexPreorder">
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
                        Pre-order
                    </li>
                </ol>
            </div>

            <!-- Page Title -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-xl md:text-1xl font-bold text-gray-700 flex items-center gap-3">
                        <span class="bg-gradient-to-br from-orange-500 to-red-600 rounded-xl p-2.5 shadow-lg shadow-orange-500/30">
                            <span class="icon-[solar--box-broken] size-5 text-white"></span>
                        </span>
                        Pre-order Management
                    </h1>
                    <p class="text-gray-500 mt-2 ml-1">Create and manage pre-order productions</p>
                </div>
            </div>
        </div>
        <!-- Main Content Card -->
        <div class="card shadow-xl border-0">
            <div class="card-body p-6 md:p-8">
                <div data-stepper=""
                    class="flex w-full items-start gap-6 md:gap-10 max-sm:flex-wrap max-sm:justify-center min-h-96"
                    id="wizard-validation">
                    <!-- Modern Stepper Navigation -->
                    <ul class="relative flex flex-col gap-y-6 shrink-0">
                        <li class="group flex flex-1 flex-col items-center" data-stepper-nav-item='{ "index": 1 }'>
                            <span class="min-h-7.5 group inline-flex flex-col items-center gap-2 align-middle text-sm">
                                <span
                                    class="stepper-active:bg-gradient-to-br stepper-active:from-orange-500 stepper-active:to-red-600 stepper-active:shadow-lg stepper-active:text-white stepper-success:bg-gradient-to-br stepper-success:from-green-500 stepper-success:to-emerald-600 stepper-success:shadow-lg stepper-success:text-white stepper-error:bg-gradient-to-br stepper-error:from-red-500 stepper-error:to-rose-600 stepper-error:text-white stepper-completed:bg-gradient-to-br stepper-completed:from-green-500 stepper-completed:to-emerald-600 stepper-completed:group-focus:from-emerald-600 stepper-completed:group-focus:to-green-700 bg-gray-100 text-gray-600 group-focus:bg-gray-200 size-10 flex shrink-0 items-center justify-center rounded-full font-bold transition-all duration-300">
                                    <span
                                        class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-lg">1</span>
                                    <span class="icon-[tabler--check] stepper-success:block hidden size-5 shrink-0"></span>
                                    <span class="icon-[tabler--x] stepper-error:block hidden size-5 shrink-0"></span>
                                </span>
                                <span class="text-gray-700 text-nowrap font-semibold text-sm">
                                    Material
                                </span>
                            </span>
                            <div
                                class="stepper-success:bg-gradient-to-b stepper-success:from-green-500 stepper-success:to-emerald-600 stepper-completed:bg-gradient-to-b stepper-completed:from-green-500 stepper-completed:to-emerald-600 bg-gray-200 mt-3 h-12 w-0.5 group-last:hidden transition-all duration-300">
                            </div>
                        </li>
                        <li class="group flex flex-1 flex-col items-center" data-stepper-nav-item='{ "index": 2 }'>
                            <span class="min-h-7.5 group inline-flex flex-col items-center gap-2 align-middle text-sm">
                                <span
                                    class="stepper-active:bg-gradient-to-br stepper-active:from-orange-500 stepper-active:to-red-600 stepper-active:shadow-lg stepper-active:text-white stepper-success:bg-gradient-to-br stepper-success:from-green-500 stepper-success:to-emerald-600 stepper-success:shadow-lg stepper-success:text-white stepper-error:bg-gradient-to-br stepper-error:from-red-500 stepper-error:to-rose-600 stepper-error:text-white stepper-completed:bg-gradient-to-br stepper-completed:from-green-500 stepper-completed:to-emerald-600 stepper-completed:group-focus:from-emerald-600 stepper-completed:group-focus:to-green-700 bg-gray-100 text-gray-600 group-focus:bg-gray-200 size-10 flex shrink-0 items-center justify-center rounded-full font-bold transition-all duration-300">
                                    <span
                                        class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-lg">2</span>
                                    <span class="icon-[tabler--check] stepper-success:block hidden size-5 shrink-0"></span>
                                    <span class="icon-[tabler--x] stepper-error:block hidden size-5 shrink-0"></span>
                                </span>
                                <span class="text-gray-700 text-nowrap font-semibold text-sm">
                                    Product List
                                </span>
                            </span>
                            <div
                                class="stepper-success:bg-gradient-to-b stepper-success:from-green-500 stepper-success:to-emerald-600 stepper-completed:bg-gradient-to-b stepper-completed:from-green-500 stepper-completed:to-emerald-600 bg-gray-200 mt-3 h-12 w-0.5 group-last:hidden transition-all duration-300">
                            </div>
                        </li>
                        <li class="group flex flex-1 flex-col items-center" data-stepper-nav-item='{ "index": 3 }'>
                            <span class="min-h-7.5 group inline-flex flex-col items-center gap-2 align-middle text-sm">
                                <span
                                    class="stepper-active:bg-gradient-to-br stepper-active:from-orange-500 stepper-active:to-red-600 stepper-active:shadow-lg stepper-active:text-white stepper-success:bg-gradient-to-br stepper-success:from-green-500 stepper-success:to-emerald-600 stepper-success:shadow-lg stepper-success:text-white stepper-error:bg-gradient-to-br stepper-error:from-red-500 stepper-error:to-rose-600 stepper-error:text-white stepper-completed:bg-gradient-to-br stepper-completed:from-green-500 stepper-completed:to-emerald-600 stepper-completed:group-focus:from-emerald-600 stepper-completed:group-focus:to-green-700 bg-gray-100 text-gray-600 group-focus:bg-gray-200 size-10 flex shrink-0 items-center justify-center rounded-full font-bold transition-all duration-300">
                                    <span
                                        class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-lg">3</span>
                                    <span class="icon-[tabler--check] stepper-success:block hidden size-5 shrink-0"></span>
                                    <span class="icon-[tabler--x] stepper-error:block hidden size-5 shrink-0"></span>
                                </span>
                                <span class="text-gray-700 text-nowrap font-semibold text-sm">Customer</span>
                            </span>
                        </li>
                    </ul>

                    <!-- Stepper Content -->
                    <div id="wizard-validation-form" class="form-validate w-full" novalidate>
                <!-- Step 1: Material Production -->
                <div id="account-details-validation" class="space-y-6" data-stepper-content-item='{ "index": 1 }'>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="bg-gradient-to-br from-orange-500 to-red-600 text-white rounded-xl p-2.5 shadow-lg shadow-orange-500/30">
                            <span class="icon-[solar--box-broken] size-5"></span>
                        </span>
                        <span class="text-gray-700 text-xl font-bold">
                            Material Produksi
                        </span>
                    </div>
                    <div class="grid gap-6 grid-cols-1 xl:grid-cols-5">
                        <!-- Material Search & List -->
                        <div class="xl:col-span-2 flex flex-col gap-4">
                            <div class="card shadow-md border-0">
                                <div class="card-body p-5">
                                    <!-- Search Bar -->
                                    <div class="relative w-full mb-4">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                            <span class="icon-[tabler--search] size-5"></span>
                                        </span>
                                        <input x-model="searchMaterial" @keyup.enter="getMaterialFunc" type="search"
                                            class="input input-bordered pl-12 w-full py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200"
                                            placeholder="Search materials..." />
                                    </div>
                                    <div class="flex gap-3">
                                        <button x-on:click="getMaterialFunc" type="button"
                                            class="btn btn-primary flex-1 gap-2 shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300">
                                            <span class="icon-[fluent--box-search-24-regular] size-5"></span>
                                            <span class="font-semibold">Search</span>
                                        </button>
                                        <button type="button" class="btn btn-warning gap-2 shadow-lg shadow-warning/30 hover:shadow-xl hover:shadow-warning/40 transition-all duration-300"
                                            aria-haspopup="dialog" aria-expanded="false" aria-controls="add-item-modal"
                                            data-overlay="#add-item-modal">
                                            <span class="icon-[gridicons--add-outline] size-5"></span>
                                            <span class="font-semibold hidden sm:inline">Add New</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Material List -->
                            <div class="flex-1 overflow-y-auto pr-1" style="max-height: 450px;">
                                <div class="flex flex-col gap-3">
                                    <template x-for="item in xmaterial">
                                        <div class="bg-gradient-to-br from-slate-50 to-gray-100 p-4 rounded-2xl border border-gray-200/50 hover:border-primary/30 hover:shadow-lg hover:shadow-primary/10 transition-all duration-300 group">
                                            <div class="flex gap-3 justify-between flex-wrap items-center">
                                                <div class="flex flex-col gap-1 flex-1 min-w-0">
                                                    <span class="font-bold text-gray-800 text-wrap truncate" x-text="item.nama_barang">Title</span>
                                                    <div class="flex items-center gap-3 flex-wrap">
                                                        <span class="badge badge-soft badge-success gap-2 px-3 badge-sm">
                                                            <span class="icon-[hugeicons--money-bag-02] size-3"></span>
                                                            <span class="font-semibold text-xs">Rp. <span x-text="formatRupiah(item.price)"></span></span>
                                                        </span>
                                                        <span class="badge badge-soft badge-info gap-2 px-3 badge-sm">
                                                            <span class="icon-[hugeicons--discount-01] size-3"></span>
                                                            <span class="font-semibold text-xs"><span x-text="item.stock"></span> Pcs</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-3 flex-shrink-0">
                                                    <div class="flex items-center gap-2 bg-white rounded-xl p-1 border border-gray-200 shadow-sm">
                                                        <button type="button" @click="decrement(item.id)"
                                                            class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-primary/5 text-gray-600 hover:text-primary transition-all duration-200"
                                                            aria-label="Decrement button">
                                                            <span class="icon-[tabler--minus] size-4"></span>
                                                        </button>
                                                        <input x-model="xitem_qty[item.id]" class="w-12 text-center bg-transparent border-0 text-base font-bold text-gray-800 focus:outline-none"
                                                            type="text" value="0" @keyup.enter="addItem(item)" />
                                                        <button type="button" @click="increment(item.id)"
                                                            class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-primary/5 text-gray-600 hover:text-primary transition-all duration-200"
                                                            aria-label="Increment button">
                                                            <span class="icon-[tabler--plus] size-4"></span>
                                                        </button>
                                                    </div>
                                                    <button x-on:click="addItem(item)" type="button"
                                                        class="btn btn-circle btn-sm btn-primary shadow-lg shadow-primary/30 hover:scale-110 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300">
                                                        <span class="icon-[typcn--arrow-right-outline] size-5"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Empty State -->
                                    <div x-show="xmaterial.length === 0" class="flex flex-col items-center justify-center py-12 text-gray-400">
                                        <div class="bg-gray-100 rounded-full p-4 mb-4">
                                            <span class="icon-[tabler--box] size-12"></span>
                                        </div>
                                        <p class="font-medium">No materials found</p>
                                        <p class="text-sm">Try searching for a different term</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Selected Materials & Product Form -->
                        <div class="xl:col-span-3 flex flex-col gap-4">
                            <!-- Selected Materials Card -->
                            <div class="card shadow-md border-0">
                                <div class="card-header bg-gradient-to-r from-orange-500 to-red-600 px-5 py-3">
                                    <div class="flex items-center gap-3 text-white">
                                        <span class="icon-[circum--box-list] size-5"></span>
                                        <h3 class="font-bold text-lg">Selected Materials</h3>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <div class="border-2 border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                                        <div class="overflow-x-auto">
                                            <table class="table">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="font-semibold text-gray-600">Item</th>
                                                        <th class="font-semibold text-gray-600 text-right">Total</th>
                                                        <th class="font-semibold text-gray-600 text-center w-16">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template x-for="item in xitems" :key="item.item_code">
                                                        <tr class="hover:bg-primary/5 transition-colors">
                                                            <td class="flex flex-col gap-1 py-3">
                                                                <span class="font-semibold text-gray-800" x-text="item.item_name">Product name</span>
                                                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                                                    <span class="text-orange-600 font-semibold" x-text="formatRupiah(item.item_price)">
                                                                        Rp. 3.000
                                                                    </span>
                                                                    <span>×</span>
                                                                    <span class="font-bold" x-text="item.item_qty">3</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-right">
                                                                <span class="font-bold text-gray-800" x-text="formatRupiah(item.item_total)">Rp. 9.000</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <button x-on:click="deleteItem(item.item_code)"
                                                                    type="button"
                                                                    class="btn btn-circle btn-sm btn-soft btn-error hover:scale-110 transition-transform">
                                                                    <span class="icon-[tabler--trash] size-4"></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Empty State -->
                                        <div x-show="xitems.length === 0" class="flex flex-col items-center justify-center py-10 text-gray-400">
                                            <span class="icon-[tabler--shopping-cart-off] size-12 mb-3"></span>
                                            <p class="font-medium">No materials selected</p>
                                            <p class="text-sm">Add materials from the list</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cost & Product Details -->
                            <div class="grid gap-4 grid-cols-1 lg:grid-cols-2">
                                <!-- Cost Section -->
                                <div class="col-span-1 lg:col-span-1">
                                    <div class="card shadow-md border-0 h-full">
                                        <div class="card-header bg-gradient-to-r from-blue-500 to-indigo-600 px-5 py-3">
                                            <div class="flex items-center gap-3 text-white">
                                                <span class="icon-[si--wallet-detailed-duotone] size-5"></span>
                                                <h3 class="font-bold">Biaya</h3>
                                            </div>
                                        </div>
                                        <div class="card-body p-4 flex flex-col gap-4">
                                            <div class="flex flex-col gap-2">
                                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                    <span class="icon-[hugeicons--money-bag-02] size-4 text-blue-500"></span>
                                                    Biaya Material
                                                </label>
                                                <input x-model="xproduction.cost" readonly
                                                    class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl text-gray-800 font-bold text-lg focus:outline-none" type="number" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                    <span class="icon-[carbon--production-queue] size-4 text-indigo-500"></span>
                                                    Biaya Produksi
                                                </label>
                                                <input @keyup="subtotal" x-model="xproduction.price"
                                                    class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 font-semibold placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200" type="number" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                    <span class="icon-[hugeicons--calculator] size-4 text-emerald-500"></span>
                                                    Subtotal
                                                </label>
                                                <input x-model="xproduction.subtotal"
                                                    class="w-full px-4 py-3 bg-gradient-to-r from-emerald-50 to-teal-50 border-2 border-emerald-300 rounded-xl text-emerald-700 font-bold text-lg focus:outline-none" type="text"
                                                    readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Section -->
                                <div class="col-span-1 lg:col-span-1">
                                    <div class="card shadow-md border-0 h-full">
                                        <div class="card-header bg-gradient-to-r from-purple-500 to-pink-600 px-5 py-3">
                                            <div class="flex items-center gap-3 text-white">
                                                <span class="icon-[carbon--ibm-data-product-exchange] size-5"></span>
                                                <h3 class="font-bold">Product</h3>
                                            </div>
                                        </div>
                                        <div class="card-body p-4 flex flex-col gap-4">
                                            <div class="flex flex-col gap-2">
                                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                    <span class="icon-[tabler--tag] size-4 text-purple-500"></span>
                                                    Title Product
                                                </label>
                                                <input class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200" type="text" x-model="xproduction.title" placeholder="Enter product title..." />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                    <span class="icon-[tabler--file-text] size-4 text-pink-500"></span>
                                                    Keterangan
                                                </label>
                                                <textarea x-model="xproduction.keterangan" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 resize-none" placeholder="Add description..."></textarea>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                <div class="w-full">
                                                    <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                                        <span class="icon-[tabler--user] size-4 text-blue-500"></span>
                                                        Crafter
                                                    </label>
                                                    <select x-model="xproduction.crafter" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200"
                                                        id="favorite-simpson">
                                                        <option value="">Pilih..</option>
                                                        <template x-for="val in xcrafter">
                                                            <option :value="val.id" x-text="val.pegawai_name">
                                                            </option>
                                                        </template>
                                                    </select>
                                                </div>
                                                <div class="w-full">
                                                    <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                                        <span class="icon-[tabler--tool] size-4 text-orange-500"></span>
                                                        Jasa Crafter
                                                    </label>
                                                    <select x-model="xproduction.jasa" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200"
                                                        id="favorite-simpson">
                                                        <option value="">Pilih...</option>
                                                        <template x-for="val in xjasalayanan">
                                                            <option :value="val.id">
                                                                <span x-text="val.title"></span> |
                                                                <span class="text-sm font-semibold" x-text="formatRupiah(val.salary)"></span>
                                                            </option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Product Button -->
                            <div class="mt-2 px-0">
                                <button class="btn btn-gradient-to-r btn-error w-full gap-3 text-base font-semibold shadow-lg shadow-error/30 hover:shadow-xl hover:shadow-error/40 transition-all duration-300" x-on:click="addProduct">
                                    <span class="icon-[hugeicons--file-add] size-6"></span>
                                    <span>Add to Pre-order List</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Pre-order List -->
                <div id="personal-info-validation" class="space-y-6" data-stepper-content-item='{ "index": 2 }'
                    style="display: none">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="bg-gradient-to-br from-orange-500 to-red-600 text-white rounded-xl p-2.5 shadow-lg shadow-orange-500/30">
                            <span class="icon-[gravity-ui--trolley] size-5"></span>
                        </span>
                        <span class="text-gray-700 text-xl font-bold">
                            Pre-order List
                        </span>
                    </div>
                    <div class="grid grid-cols-1 xl:grid-cols-6 gap-6">
                        <!-- Product Table -->
                        <div class="col-span-1 xl:col-span-4">
                            <div class="card shadow-md border-0">
                                <div class="card-header bg-gradient-to-r from-blue-500 to-indigo-600 px-5 py-3">
                                    <div class="flex items-center gap-3 text-white">
                                        <span class="icon-[tabler--shopping-cart] size-5"></span>
                                        <h3 class="font-bold">Products</h3>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <div class="border-2 border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                                        <div class="overflow-x-auto">
                                            <table class="table">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="font-semibold text-gray-600">Product</th>
                                                        <th class="font-semibold text-gray-600 text-right">Price</th>
                                                        <th class="font-semibold text-gray-600 text-center">Qty</th>
                                                        <th class="font-semibold text-gray-600 text-right">Total</th>
                                                        <th class="font-semibold text-gray-600 text-center w-16">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template x-if="xproduct.length === 0">
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                                                                    <span class="icon-[tabler--shopping-cart-off] size-12 mb-3"></span>
                                                                    <p class="font-medium">No products added</p>
                                                                    <p class="text-sm">Add products from step 1</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                    <template x-for="item in xproduct">
                                                        <tr class="hover:bg-primary/5 transition-colors">
                                                            <td class="font-semibold text-gray-800 py-3" x-text="item.title"></td>
                                                            <td class="text-right">
                                                                <span class="font-semibold text-gray-700" x-text="formatRupiah(item.total_cost)"></span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="badge badge-soft badge-info font-semibold px-3 py-1.5" x-text="item.qty"></span>
                                                            </td>
                                                            <td class="text-right">
                                                                <span class="font-bold text-orange-600" x-text="formatRupiah(item.qty * item.total_cost)"></span>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" x-on:click="delProduct(item._fake_id)"
                                                                    class="btn btn-circle btn-sm btn-soft btn-error hover:scale-110 transition-transform"
                                                                    aria-label="Action button">
                                                                    <span class="icon-[tabler--trash] size-4"></span>
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
                        </div>

                        <!-- Summary Section -->
                        <div class="col-span-1 xl:col-span-2 flex flex-col gap-4">
                            <!-- Total Card -->
                            <div class="bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl p-6 shadow-lg shadow-red-500/30 flex justify-between items-center">
                                <div class="text-white flex flex-col gap-2">
                                    <label class="font-semibold text-sm opacity-90">Subtotal Pembayaran</label>
                                    <div class="font-bold text-3xl">
                                        Rp.
                                        <span x-text="subtotalPreorderView">0</span>
                                    </div>
                                </div>
                                <div class="avatar placeholder">
                                    <div class="bg-white text-red-500 w-16 rounded-full flex items-center justify-center">
                                        <span class="icon-[solar--tag-price-linear] size-8"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Estimation & Notes -->
                            <div class="card shadow-md border-0 flex-1">
                                <div class="card-body p-5 flex flex-col gap-4">
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[tabler--calendar] size-4 text-blue-500"></span>
                                            Estimasi
                                        </label>
                                        <div class="relative">
                                            <input x-model="xproduction.estimasi" type="text" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 flatpickr-input"
                                                placeholder="Select date range..." id="flatpickr-range" readonly="readonly">
                                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                                <span class="icon-[tabler--calendar] size-5"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[tabler--message] size-4 text-orange-500"></span>
                                            Keterangan
                                        </label>
                                        <textarea x-model="xproduction.comment" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 resize-none" placeholder="Add notes..." rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Customer Profile -->
                <div id="social-links-validation" class="space-y-6" data-stepper-content-item='{ "index": 3}'
                    style="display: none">

                    <div class="flex items-center gap-3 mb-6">
                        <span class="bg-gradient-to-br from-orange-500 to-red-600 text-white rounded-xl p-2.5 shadow-lg shadow-orange-500/30">
                            <span class="icon-[solar--user-id-line-duotone] size-5"></span>
                        </span>
                        <span class="text-gray-700 text-xl font-bold">
                            Profile Costumer
                        </span>
                    </div>

                    <div class="grid gap-6 grid-cols-1 xl:grid-cols-6">
                        <!-- Customer Form -->
                        <div class="xl:col-span-4">
                            <div class="card shadow-md border-0">
                                <div class="card-header bg-gradient-to-r from-purple-500 to-pink-600 px-5 py-3">
                                    <div class="flex items-center gap-3 text-white">
                                        <span class="icon-[tabler--user] size-5"></span>
                                        <h3 class="font-bold">Customer Information</h3>
                                    </div>
                                </div>
                                <div class="card-body p-5 flex flex-col gap-5">
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[tabler--user-circle] size-4 text-purple-500"></span>
                                            Nama Costumer
                                        </label>
                                        <input x-model="xcostumer.name" type="text" placeholder="Enter customer name..."
                                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200" />
                                    </div>

                                    <!-- Gender Selection -->
                                    <div class="flex gap-4">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input x-model="xcostumer.gender" :value="1" type="radio"
                                                name="radio-3" class="radio radio-primary radio-bordered" id="radioType3" />
                                            <span class="text-sm font-medium text-gray-700"> Pria </span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input x-model="xcostumer.gender" :value="0" type="radio"
                                                name="radio-3" class="radio radio-primary radio-bordered" id="radioType4"
                                                checked />
                                            <span class="text-sm font-medium text-gray-700"> Wanita </span>
                                        </label>
                                    </div>

                                    <div class="hidden">
                                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                            <span class="icon-[tabler--map-pin] size-4 text-pink-500"></span>
                                            Alamat Costumer
                                        </label>
                                        <textarea x-model="xcostumer.address" type="text" placeholder="Alamat..."
                                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 resize-none"></textarea>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                <span class="icon-[tabler--phone] size-4 text-blue-500"></span>
                                                Telpon
                                            </label>
                                            <input x-model="xcostumer.phone" @keyup.enter="findCostumer" type="text"
                                                placeholder="08..."
                                                class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200" />
                                        </div>
                                        <div class="hidden">
                                            <div class="flex flex-col gap-2">
                                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                    <span class="icon-[tabler--mail] size-4 text-emerald-500"></span>
                                                    Email
                                                </label>
                                                <input x-model="xcostumer.email" type="text" placeholder="email@example.com"
                                                    class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                                <span class="icon-[tabler--brand-instagram] size-4 text-orange-500"></span>
                                                Sosial Media (FB/IG/Tiktok/Lainnya)
                                            </label>
                                            <input x-model="xcostumer.sosmed" type="text" placeholder="@username-sosmed"
                                                class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member Points Section -->
                        <div class="xl:col-span-2">
                            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 shadow-lg shadow-blue-500/30 flex flex-col gap-4">
                                <div class="flex gap-4">
                                    <span class="icon-[iconoir--coins] text-yellow-300 size-6"></span>
                                    <span class="font-semibold font-space text-white text-lg">Point Member</span>
                                </div>
                                <div class="flex justify-start">
                                    <span class="text-4xl font-bold font-space text-white">Rp.
                                        <span x-text="xcostumer.point_view"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="card shadow-md border-0 mt-4">
                                <div class="card-body p-5">
                                    <div class="flex items-center gap-3">
                                        <input x-model="xcostumer.point_use" type="checkbox"
                                            class="toggle toggle-lg toggle-primary" id="" />
                                        <label class="text-sm font-semibold font-space text-gray-700"
                                            for=""> Gunakan Point </label>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-amber-50 border-2 border-amber-200 rounded-2xl p-5 mt-4">
                                <div class="flex items-start gap-3">
                                    <span class="icon-[tabler--info-circle] text-amber-600 size-5 mt-0.5"></span>
                                    <div>
                                        <span class="font-bold text-amber-700">INFORMASI:</span>
                                        <br>
                                        <p class="text-sm text-amber-600 mt-1">
                                            Gunakan nomor telpon untuk pencarian data costumer member!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Final Step: Success -->
                <div data-stepper-content-item='{ "isFinal": true }' style="display: none">
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 flex h-64 items-center justify-center rounded-2xl p-6 border-2 border-emerald-200">
                        <div class="text-center">
                            <div class="bg-emerald-500 text-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-500/30">
                                <span class="icon-[tabler--check] size-10"></span>
                            </div>
                            <h3 class="text-emerald-700 text-2xl font-bold">Your Form has been Submitted</h3>
                            <p class="text-emerald-600 mt-2">Thank you for your submission</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="mt-8 flex flex-wrap items-center justify-start gap-3 font-space">
                    <button type="button" class="btn rounded-xl px-8 btn-primary gap-2 shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300 btn-prev max-sm:btn-square max-sm:px-4"
                        data-stepper-back-btn="">
                        <span class="icon-[tabler--chevron-left] text-primary-content size-5 rtl:rotate-180"></span>
                        <span class="max-sm:hidden font-semibold">Back</span>
                    </button>
                    <button type="button" class="btn rounded-xl px-8 btn-primary gap-2 shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300 btn-next max-sm:btn-square max-sm:px-4"
                        data-stepper-next-btn="">
                        <span class="max-sm:hidden font-semibold">Next</span>
                        <span class="icon-[tabler--chevron-right] text-primary-content size-5 rtl:rotate-180"></span>
                    </button>

                    <button x-on:click="storeFinish" type="button" class="btn rounded-xl px-8 btn-success gap-2 shadow-lg shadow-success/30 hover:shadow-xl hover:shadow-success/40 transition-all duration-300"
                        data-stepper-finish-btn="" style="display: none">
                        <span class="icon-[mynaui--store]" size-5"></span>
                        <span class="font-semibold" x-text="isStoring ? 'Processing...':'Finishing Store'"></span>
                    </button>

                    <button :disabled="isStoring" type="button" x-on:click="resetFrom"
                        class="btn rounded-xl px-8 btn-warning gap-2 shadow-lg shadow-warning/30 hover:shadow-xl hover:shadow-warning/40 transition-all duration-300" data-stepper-reset-btn="" style="display: none">
                        <span class="font-semibold" x-text="isStoring ? 'Is Loading...!':'Back'" x-show="!isSuccess"></span>
                        <span class="font-semibold" x-show="isSuccess">Back</span>
                    </button>
                    <button x-show="isPembayaran" type="button" x-on:click="prosesBayar"
                        class="btn rounded-xl px-8 btn-error gap-2 shadow-lg shadow-error/30 hover:shadow-xl hover:shadow-error/40 transition-all duration-300" data-stepper-reset-btn="">
                        <span class="icon-[tabler--credit-card]" size-5"></span>
                        <span class="font-semibold">Proses Pembayaran</span>
                    </button>
                </div>
            </div>
                </div>
            </div>
        </div>

        {{-- Modal Item Add --}}
        <div id="add-item-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div
                class="modal-dialog overlay-open:mt-12 overlay-open:opacity-100 overlay-open:duration-500 transition-all ease-out">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-to-r from-orange-500 to-red-600 px-6 py-4">
                        <h3 class="modal-title text-white font-bold text-lg flex items-center gap-2">
                            <span class="icon-[gridicons--add-outline] size-5"></span>
                            Form item
                        </h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3 text-white hover:bg-white/20"
                            aria-label="Close" data-overlay="#add-item-modal" id="close-modal">
                            <span class="icon-[tabler--x] size-5"></span>
                        </button>
                    </div>
                    <form @submit.prevent="addCostumeItem">
                        <div class="modal-body flex flex-col gap-4 p-6">
                            <div class="w-full">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                    <span class="icon-[tabler--tag] size-4 text-orange-500"></span>
                                    Nama item
                                </label>
                                <input x-model="csForm.item" type="text" placeholder="item name" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200"
                                    id="inte-name" />
                            </div>
                            <div class="grid grid-flow-row md:grid-cols-2 gap-4">
                                <div class="md:col-span-1 w-full">
                                    <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                        <span class="icon-[tabler--cash] size-4 text-emerald-500"></span>
                                        Biaya
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-gray-100 border-2 border-gray-200 rounded-l-xl text-gray-600 font-semibold">Rp</span>
                                        <input x-model="csForm.price" type="number" class="input grow rounded-r-xl border-2 border-gray-200 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200"
                                            placeholder="00.00" id="biaya" />
                                        <label class="sr-only" for="biaya">Enter amount</label>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                        <span class="icon-[tabler--shopping-bag] size-4 text-blue-500"></span>
                                        Qty
                                    </label>
                                    <input x-model="csForm.qty" type="number" placeholder="qty" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200"
                                        id="qty" />
                                </div>
                            </div>
                            <div class="relative mt-2">
                                <textarea x-model="csForm.comment" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 resize-none" placeholder="comment..."
                                    id="comment-cs-form" rows="3"></textarea>
                                <label class="absolute left-3 -top-2.5 bg-white px-1 text-xs font-semibold text-gray-500" for="comment-cs-form">Comment</label>
                            </div>
                        </div>
                        <div class="modal-footer px-6 py-4 bg-gray-50 border-t border-gray-200 flex gap-3 justify-end">
                            <button type="button" class="btn btn-soft btn-secondary px-6 gap-2" data-overlay="#add-item-modal">
                                <span class="icon-[tabler--x]" size-4"></span>
                                <span class="font-semibold">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary px-6 gap-2 shadow-lg shadow-primary/30">
                                <span class="icon-[tabler--check]" size-4"></span>
                                <span class="font-semibold">Add item</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End modal --}}
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
            function indexPreorder() {
                return {
                    searchMaterial: '',
                    xmaterial: [],
                    xcostumer: {
                        status: false, // false = non member (new cs) | true = member
                        point: 0,
                        point_use: false, // false = tidak menggunakan point | true = menggunakan point
                        id: '',
                        name: '',
                        gender: '',
                        address: '',
                        phone: '',
                        email: '',
                        sosmed: '',
                        point_view: ''
                    },
                    xproduction: {
                        crafter: '',
                        jasa: '',
                        title: '',
                        keterangan: '',
                        deskripsi: '',
                        estimasi: '',
                        comment: '',
                        cost: 0,
                        price: 25000,
                        subtotal: 0
                    },
                    xitems: [],
                    csForm: {
                        item: '',
                        price: '',
                        qty: '',
                        comment: ''
                    },
                    xitem_qty: [],
                    isPembayaran: false,
                    isStoring: false,
                    isSuccess: false,
                    transaksi_id: '',
                    paymentKey : '',
                    prosesBayar() {
                        try {
                            window.location.href = `/transaksi/kasir-proses-bayar/${this.paymentKey}`;
                        } catch (error) {
                        }
                    },
                    async storeFinish() {
                        const data = {
                            costumer: this.xcostumer,
                            product: this.xproduct,
                            estimasi: this.xproduction.estimasi,
                            subtotal: this.subtotalPreorder,
                            keterangan: this.xproduction.comment
                        }
                        this.isStoring = true;
                        try {
                            const url = "/transaksi/pre-order-action";
                            const store = await axios.post(url, data);
                            const res = store.data;
                            this.transaksi_id = res.data.transaction_id;
                            this.paymentKey = res.data.payment_id;

                            this.isPembayaran = true;
                            this.isSuccess = true;
                        } catch (err) {
                            this.isStoring = false;
                            const errResponse = err.response;
                            if (errResponse.status === 400) {
                                const resErrors = errResponse.data.errors;
                                let delay = 0;
                                resErrors.forEach(element => {
                                    setTimeout(() => {
                                        notifier.warning(element);
                                    }, delay);
                                    delay += 250;
                                });
                            } else {
                                notifier.error('System Error!');
                            }
                        }
                    },

                    resetFrom() {
                        this.isPembayaran = false;
                        this.isStoring = false;
                    },

                    getMaterialFunc() {
                        axios.get(`/transaksi/get-material?key=${this.searchMaterial}`)
                            .then((res) => {
                                const data = res.data.data;
                                this.xmaterial = data;
                            }).catch((err) => {
                                console.log(err);
                            })
                    },
                    
                    increment(index) {
                        if (this.xitem_qty[index] === undefined) {
                            this.xitem_qty[index] = 0;
                        }
                        this.xitem_qty[index]++;
                    },
                    decrement(index) {
                        if (this.xitem_qty[index] === undefined || this.xitem_qty[index] === 0) {
                            this.xitem_qty[index] = 0;
                            return;
                        }
                        this.xitem_qty[index]--;
                    },

                    addItem(index) {
                        const i = index;
                        const qty = parseInt(this.xitem_qty[i.id]);
                        if (qty <= 0 || !qty) {
                            notifier.warning("Qty is empty!");
                            return;
                        }
                        const item = {
                            item_code: i.id,
                            item_name: i.nama_barang,
                            item_price: parseInt(i.price),
                            item_qty: qty,
                            item_total: parseInt(i.price) * qty,
                            item_status: false,
                            comment: ''
                        }
                        let data = this.xitems.find(result => result.item_code === item.item_code);
                        if (data) {
                            data.item_qty = item.item_qty;
                            data.item_total = item.item_qty * parseInt(i.price);
                        } else {
                            this.xitems.push(item);
                        }
                        this.sumTotalCost();
                    },

                    deleteItem(index) {
                        this.xitems = this.xitems.filter(result => result.item_code !== index);
                        this.sumTotalCost();
                        this.subtotal();
                    },

                    xcrafter: [],
                    getCrafter() {
                        axios.get(`/transaksi/get-crafter`)
                            .then((res) => {
                                const data = res.data.data;
                                this.xcrafter = data;
                            }).catch((err) => {
                                console.log(err);
                            });
                    },

                    xjasalayanan: [],
                    getJasa() {
                        axios.get(`/transaksi/get-referensi-jasa`)
                            .then((res) => {
                                const data = res.data.data;
                                this.xjasalayanan = data;
                            }).catch((err) => {
                                console.log(err);
                            })
                    },

                    sumTotalCost() {
                        let cost = 0;
                        this.xitems.forEach(element => {
                            cost += parseInt(element.item_total);
                        });
                        this.xproduction.cost = cost;
                        this.subtotal();
                    },

                    subtotal() {
                        this.xproduction.subtotal = parseInt(this.xproduction.price) + parseInt(this.xproduction.cost);
                    },

                    addCostumeItem() {
                        try {
                            const item = {
                                item_code: uuid(),
                                item_name: this.csForm.item,
                                item_price: parseInt(this.csForm.price),
                                item_qty: parseInt(this.csForm.qty),
                                item_total: parseInt(this.csForm.price) * parseInt(this.csForm.qty),
                                item_status: true,
                                comment: this.csForm.comment
                            }
                            this.xitems.push(item);
                            this.sumTotalCost();

                            const btnClose = document.getElementById("close-modal");
                            btnClose.click();
                            this.csForm = {
                                item: "",
                                price: "",
                                qty: "",
                            };
                        } catch (error) {
                            console.log(error);

                        }
                    },

                    findCostumer() {
                        axios.get(`/transaksi/find-costumer/${this.xcostumer.phone}`)
                            .then((res) => {
                                const costumer = res.data.data;
                                let point = parseInt(costumer.point_member);
                                this.xcostumer = {
                                    status: true,
                                    point: point,
                                    id: costumer.id,
                                    name: costumer.name,
                                    gender: costumer.jenis_kelamin === "L" ? true : false,
                                    address: costumer.alamat,
                                    phone: costumer.no_telp,
                                    email: costumer.email,
                                    sosmed: costumer.sosmed,
                                    point_view: formatRupiah(point)

                                }
                                console.log(this.xcostumer);

                            }).catch((err) => {
                                console.log(err);

                            })
                    },

                    xproduct: [],
                    addProduct() {
                        if (this.xitems <= 0 || this.xproduction.title == '' || this.xproduction.jasa == '' || this.xproduction
                            .crafter == '') { // items is array [{object data}]
                            if (this.xitems <= 0 || this.xproduction.price == '' || this.xproduction.subtotal == '') {
                                notifier.warning("Please add items!");
                            }
                            if (this.xproduction.title == '') {
                                notifier.warning("Please add title!");
                            }
                            if (this.xproduction.jasa == '') {
                                notifier.warning("Please add jasa!");
                            }
                            if (this.xproduction.crafter == '') {
                                notifier.warning("Please add crafter!");
                            }
                            if (this.production.price == '') {
                                notifier.warning("Please add cost production!");
                            }
                            return;
                        }

                        Swal.fire({
                            title: "Konfirmasi ?",
                            text: "yakin ingin tambah product pre-order!",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, tambah!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                try {
                                    const materials = this.xitems
                                    let product_data = {
                                        _fake_id: uuid(),
                                        title: this.xproduction.title,
                                        metarials: materials,
                                        description: this.xproduction.keterangan,
                                        qty: 1,
                                        cost_material: this.xproduction.cost,
                                        cost_production: this.xproduction.price,
                                        total_cost: this.xproduction.subtotal,
                                        crafter: this.xproduction.crafter,
                                        jasa: this.xproduction.jasa,
                                    }
                                    this.xproduct.push(product_data);
                                    this.xitems = [];
                                    this.xproduction = {
                                        crafter: '',
                                        jasa: '',
                                        title: '',
                                        keterangan: '',
                                        deskripsi: '',
                                        estimasi: '',
                                        comment: '',
                                        cost: 0,
                                        price: 25000,
                                        subtotal: 0
                                    };
                                    this.hitungTotalPreorder();
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Product pre-order berhasil ditambahkan.",
                                        icon: "success"
                                    });
                                    console.log(this.xproduct);
                                } catch (error) {
                                    Swal.fire({
                                        title: "Opss!!!",
                                        text: "Product pre-order gagal ditambahkan!.",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    },

                    delProduct(fakeId) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Yakin ingin hapus product item ?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Yes, Hapus!',
                            denyButtonText: 'Tidak',
                            customClass: {
                                actions: 'my-actions',
                                cancelButton: 'order-1 right-gap',
                                confirmButton: 'order-2',
                                denyButton: 'order-3',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.xproduct = this.xproduct.filter(product => product._fake_id !== fakeId);
                                this.hitungTotalPreorder();
                                Swal.fire('Product Item berhasil dihapus!', '', 'success')
                            } else if (result.isDenied) {
                                Swal.fire('Proses dibatalkan!', '', 'info')
                            }
                        })
                    },

                    subtotalPreorder: 0,
                    subtotalPreorderView: 0,
                    hitungTotalPreorder() {
                        let total = 0;
                        this.xproduct.forEach(product => {
                            total += parseInt(product.total_cost);
                        });
                        this.subtotalPreorder = total;
                        this.subtotalPreorderView = formatRupiah(total);
                        return;
                    },

                    init() {
                        this.getMaterialFunc();
                        this.getJasa();
                        this.getCrafter()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
