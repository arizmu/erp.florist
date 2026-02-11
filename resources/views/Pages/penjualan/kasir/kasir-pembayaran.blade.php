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
                    <a href="#" aria-label="Penjualan" class="hover:text-primary transition-colors">
                        <span class="icon-[tabler--shopping-cart]"></span>
                        Penjualan
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li aria-current="page" class="font-medium text-primary">
                    <span class="icon-[tabler--cash-register] me-1 size-5"></span>
                    Kasir Pembayaran
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span
                        class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl p-2.5 shadow-lg shadow-emerald-500/30">
                        <span class="icon-[tabler--cash-register] size-6 text-white"></span>
                    </span>
                    Payment Processing
                </h1>
                <p class="text-gray-500 mt-2 ml-1">Complete your transaction securely</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6" x-data="pembayaran({{ $data }})">
        <!-- Left Column - Product Details & Customer -->
        <div class="xl:col-span-8 space-y-6">
            <!-- Product Details Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/20">
                            <span class="icon-[carbon--product] size-5 text-white"></span>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Product Details</h2>
                            <p class="text-xs text-gray-500">Review your order items</p>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th class="px-6 py-3.5 text-left">
                                    <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                        aria-label="product" />
                                </th>
                                <th
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Product</th>
                                <th
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Price</th>
                                <th
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Qty</th>
                                <th
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <template x-for="item in indexData.details">
                                <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <label>
                                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                                aria-label="product" />
                                        </label>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center">
                                                <span class="icon-[tabler--package] size-5 text-purple-600"></span>
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-800 capitalize"
                                                    x-text="item.item_name">Item Name</div>
                                                <div class="text-sm text-gray-500" x-text="item.code_product">-</div>
                                                <span
                                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-700 mt-1"
                                                    x-show="item.costume_status">
                                                    <span class="icon-[tabler--star] size-3"></span>
                                                    CUSTOM
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1.5">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-50 text-blue-700">
                                                Rp.
                                                <span x-text="parseInt(item.cost_item).toLocaleString('id-ID')"></span>
                                            </span>
                                            <span x-show="item.costume_status"
                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-50 text-amber-700"
                                                x-text="parseInt(item.costume_total).toLocaleString('id-ID')"></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-semibold bg-gray-100 text-gray-700"
                                            x-text="item.amount_item"></span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-semibold text-gray-800">Rp.
                                            <span x-text="parseInt(item.total_cost).toLocaleString('id-ID')"></span>
                                        </span>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Customer Information Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-lg shadow-emerald-500/20">
                            <span class="icon-[tabler--users] size-5 text-white"></span>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Customer Information</h2>
                            <p class="text-xs text-gray-500">Enter customer details for member benefits</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Customer Form -->
                        <div class="lg:col-span-2 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="icon-[tabler--user] size-4 text-gray-400"></span>
                                        Customer Name
                                    </label>
                                    <div class="relative">
                                        <input x-model="xform.costumer.nama" type="text"
                                            placeholder="Enter customer name"
                                            class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200"
                                            id="nama_costumer" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="icon-[tabler--phone] size-4 text-gray-400"></span>
                                        Phone Number
                                    </label>
                                    <div class="relative">
                                        <input x-model="xform.costumer.telpon" type="text" @keyup.tab="findCostumer"
                                            @keyup.enter="findCostumer" placeholder="08***"
                                            class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200"
                                            id="telpon_costumer" />
                                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-gray-400">
                                            Press Tab/Enter to search
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="icon-[tabler--map-pin] size-4 text-gray-400"></span>
                                    Address
                                </label>
                                <textarea x-model='xform.costumer.alamat'
                                    class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 resize-none"
                                    rows="3" placeholder="Enter customer address..." id="alamat_costumer"></textarea>
                            </div>
                            <div class="bg-amber-50 border border-amber-200 rounded-xl p-4">
                                <div class="flex items-start gap-2">
                                    <span
                                        class="icon-[tabler--info-circle] size-5 text-amber-600 flex-shrink-0 mt-0.5"></span>
                                    <div class="text-sm text-amber-800">
                                        <strong class="font-semibold">INFORMASI MEMBER</strong>
                                        <ul class="mt-2 space-y-1 list-disc list-inside">
                                            <li>Masukkan no telpon untuk mencari Costumer yang terdaftar sebagai Member
                                                - "tab / Enter".</li>
                                            <li>Apabila terdapat discount product, pastikan memasukkan nilai Discount
                                                terlebih dahulu sebelum Point Member digunakan!</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member Points Card -->
                        <div class="lg:col-span-1">
                            <div
                                class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg shadow-blue-500/30 h-full">
                                <div class="flex flex-col h-full">
                                    <div class="flex items-center gap-2 mb-4">
                                        <span class="icon-[tabler--star] size-5"></span>
                                        <span class="font-semibold">Member Points</span>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-center">
                                        <span class="text-3xl font-bold mb-2">
                                            Rp. <span x-text="xform.costumer.point_view"></span>
                                        </span>
                                        <p class="text-blue-100 text-sm">Available points to use</p>
                                    </div>
                                    <div class="mt-4">
                                        <button type="button" @click="FuncPoint" x-show="!point.status"
                                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl transition-all duration-200 hover:scale-105">
                                            <span class="icon-[solar--bill-check-outline] size-4"></span>
                                            Use Points
                                        </button>
                                        <button type="button" @click="FuncPoint" x-show="point.status"
                                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-red-500/80 hover:bg-red-500/90 backdrop-blur-sm rounded-xl transition-all duration-200 hover:scale-105">
                                            <span class="icon-[ix--error] size-4"></span>
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Payment Details -->
        <div class="xl:col-span-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 sticky top-6">
                <!-- Card Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center shadow-lg shadow-orange-500/20">
                            <span class="icon-[carbon--order-details] size-5 text-white"></span>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Payment Details</h2>
                            <p class="text-xs text-gray-500">Complete your payment</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 space-y-5">
                    <!-- Total Payment Display -->
                    <div
                        class="bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl p-6 text-white shadow-lg shadow-orange-500/30">
                        <label class="text-orange-100 text-sm font-medium">Total Pembayaran</label>
                        <div class="text-4xl font-bold mt-2">
                            Rp.
                            <span x-text="unpaid"></span>
                        </div>
                    </div>

                    <!-- Payment Summary -->
                    <div class="border border-gray-200 rounded-xl p-4 space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Code Transaksi</span>
                            <span class="font-semibold text-gray-800" x-text="code_transaksi"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Subtotal</span>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-blue-50 text-blue-700">
                                Rp. <span x-text="subtotal"></span>
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Paid</span>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-green-50 text-green-700">
                                Rp. <span x-text="paid"></span>
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Unpaid</span>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-red-50 text-red-700">
                                Rp. <span x-text="unpaid"></span>
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Point Use</span>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-red-50 text-red-700">
                                Rp.
                                <span
                                    x-text="point.status ? parseInt(xform.costumer.point).toLocaleString('id-ID') : 0"></span>
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Discount <span
                                    x-text="discount.status ? discount.discount_percent : 0"></span>%</span>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-red-50 text-red-700">
                                Rp.
                                <span
                                    x-text="discount.status ? discount.discount_nilai.toLocaleString('id-ID') : 0"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="space-y-4">
                        <div class="flex items-end gap-4">
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="icon-[tabler--credit-card] size-4 text-gray-400"></span>
                                    Metode Bayar
                                </label>
                                <select x-model="xform.payment.method"
                                    class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 appearance-none cursor-pointer"
                                    id="payment-method">
                                    <option value="">Select Payment Method</option>
                                    <option value="q">QRIS</option>
                                    <option value="b">Transfer Bank</option>
                                    <option value="t">Tunai</option>
                                </select>
                            </div>
                            <button
                                class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-amber-50 text-amber-600 hover:bg-amber-100 transition-all duration-200 hover:scale-105"
                                type="button" aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="modal-discount" data-overlay="#modal-discount" title="Apply Discount">
                                <span class="icon-[iconamoon--discount-light] size-5"></span>
                            </button>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <span class="icon-[tabler--money] size-4 text-gray-400"></span>
                                Nominal Pembayaran
                            </label>
                            <div class="relative">
                                <span
                                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">Rp</span>
                                <input x-model="xform.payment.payment" type="text" placeholder="0"
                                    class="w-full pl-12 pr-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200"
                                    @keyup="hitungCashback()" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <span class="icon-[tabler--arrow-back-up] size-4 text-gray-400"></span>
                                <span x-text="labelCount">Kembali / Sisa Pembayaran</span>
                            </label>
                            <div class="relative">
                                <span
                                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">Rp</span>
                                <input x-model="kembali_sisabayar" type="text" readonly placeholder="0"
                                    class="w-full pl-12 pr-4 py-3 text-sm bg-gray-100 border-0 rounded-xl font-semibold text-gray-700 cursor-not-allowed" />
                            </div>
                        </div>
                    </div>

                    <!-- Process Payment Button -->
                    <button type="button" @click="store" :disabled="isStoring"
                        x-text="isStoring ? 'Processing...' : 'Proses Pembayaran'"
                        :class="isStoring ? 'opacity-50 cursor-not-allowed' :
                            'hover:shadow-lg hover:shadow-red-500/40 hover:-translate-y-0.5'"
                        class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 text-base font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 rounded-xl shadow-lg shadow-red-500/30 transition-all duration-200">
                        <span class="icon-[tabler--check] size-5"></span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Modal: Discount --}}
        <div id="modal-discount" class="overlay modal overlay-open:opacity-100 modal-middle hidden" role="dialog"
            tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100 max-w-md">
                <div class="modal-content rounded-2xl shadow-2xl">
                    <!-- Modal Header -->
                    <div class="modal-header px-6 py-4 border-b border-gray-100">
                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl p-2">
                                    <span class="icon-[streamline--discount-percent-coupon] size-6 text-white"></span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">Discount</h3>
                                    <p class="text-sm text-gray-500">Apply discount to transaction</p>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-ghost btn-circle btn-sm hover:bg-red-50 hover:text-red-600"
                                aria-label="Close" data-overlay="#modal-discount" id="btn-close-modal-discount">
                                <span class="icon-[tabler--x] size-5"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body p-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="icon-[hugeicons--percent-circle] size-4 text-gray-400"></span>
                                    Persentase Diskon (%)
                                </label>
                                <div class="relative">
                                    <input x-model="discount.discount_percent" type="text"
                                        @keyup="FuncDiscountCount"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200"
                                        placeholder="0" />
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">%</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="icon-[hugeicons--money-bag-02] size-4 text-gray-400"></span>
                                    Nilai Diskon (Rp)
                                </label>
                                <div class="relative">
                                    <span
                                        class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">Rp</span>
                                    <input x-model="discount.discount_nilai" type="text" @keyup="FuncDiscount"
                                        placeholder="0"
                                        class="w-full pl-12 pr-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
                        <button type="button" x-on:click="discount.status ? FuncDiscountFalse : FuncDiscountTrue"
                            x-show="!discount.status"
                            class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200">
                            <span class="icon-[tabler--check] size-5"></span>
                            <span x-text="discount.status ? 'Batal' : 'Gunakan Discount'"></span>
                        </button>
                        <button type="button" x-on:click="discount.status ? FuncDiscountFalse : FuncDiscountTrue"
                            x-show="discount.status"
                            class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 text-base font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 rounded-xl shadow-lg shadow-red-500/30 transition-all duration-200">
                            <span class="icon-[tabler--x] size-5"></span>
                            <span x-text="discount.status ? 'Batal' : 'Gunakan Discount'"></span>
                        </button>
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

            function pembayaran(index) {
                let subtotal = parseInt(index.total_payment);
                let totalPembayaran = parseInt(index.total_unpaid);
                let totalPaid = parseInt(index.total_paid);
                return {
                    isStoring: false,
                    indexData: index,
                    total_pembayaran: parseInt(index.total_unpaid),
                    paid: `${totalPaid.toLocaleString('id-ID')}`,
                    unpaid: totalPembayaran.toLocaleString('id-ID'),
                    subtotal: `${subtotal.toLocaleString('id-ID')}`,
                    kembali_sisabayar: 0,
                    code_transaksi: index.code,
                    xform: {
                        costumer: {
                            nama: '',
                            alamat: '',
                            telpon: '',
                            point: 0,
                            point_view: 0,
                            point_use: false
                        },
                        payment: {
                            cashback: 0,
                            payment: 0,
                            method: ''
                        }
                    },
                    labelCount: "Kembali / Sisa Bayar",
                    hitungCashback() {
                        let total = parseInt(totalPembayaran);
                        let pay = parseInt(this.xform.payment.payment);
                        if (pay >= total) {
                            this.labelCount = "Kembali";
                            let count = total - pay;
                            this.xform.payment.cashback = count >= 0 ? count : Math.abs(count);
                            this.kembali_sisabayar = parseInt(this.xform.payment.cashback).toLocaleString('id-ID')
                            return;
                        }
                        if (pay < total) {
                            this.labelCount = "Sisa Bayar";
                            let count = total - pay;
                            this.xform.payment.cashback = count > 0 ? count : 0;
                            this.kembali_sisabayar = parseInt(this.xform.payment.cashback).toLocaleString('id-ID')
                            return;
                        }

                    },

                    store() {
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
                                this.isStoring = true;
                                const data = {
                                    transaksi_id: this.code_transaksi,
                                    transaksi_details: this.indexData,
                                    metode_bayar: this.xform.payment.method,
                                    jumlah_bayar: this.xform.payment.payment,
                                    kembali: this.xform.payment.cashback,
                                    costumer: this.xform.costumer,
                                    pembayaran: {
                                        payment_id: this.indexData.payment_id,
                                        subtotal: subtotal,
                                        total_bayar: totalPembayaran,
                                        jumlah_bayar: parseInt(this.xform.payment.payment),
                                        discount: {
                                            persen: this.discount.discount_percent,
                                            nilai: this.discount.discount_nilai,
                                            status: this.discount.status,
                                        },
                                        point: {
                                            status: this.point.status,
                                            nilai: this.xform.costumer.point ?? 0,
                                        }
                                    }
                                };

                                try {
                                    const url = `/transaksi/kasir-proses-bayar-post/${this.indexData.id}`;
                                    const response = await axios.post(url, data);
                                    const result = response.data;
                                    if (result.code == 200) {
                                        Swal.fire({
                                            title: "Success!",
                                            text: result.message,
                                            icon: "success"
                                        });
                                        window.open(
                                            `/transaksi/cetak-invoice/${this.indexData.id}/${result.data.payment_id}`,
                                            '_blank');
                                        window.location.href = '/transaksi';
                                    }
                                } catch (error) {
                                    const err = error.response.data;
                                    if (error.status === 400) {
                                        const res = err.errors;
                                        const dataErr = Object.values(res);
                                        dataErr.forEach(element => {
                                            element.forEach(pesan => {
                                                notifier.warning(pesan)
                                            });
                                        });
                                    }
                                } finally {
                                    this.isStoring = false; // Reset status setelah selesai
                                }
                            }
                        });
                    },

                    getCostumer() {
                        if (this.indexData.costumer) {
                            this.xform.costumer.nama = this.indexData.costumer.name;
                            this.xform.costumer.alamat = this.indexData.costumer.alamat;
                            this.xform.costumer.telpon = this.indexData.costumer.no_telp;
                        }
                    },

                    findCostumer() {
                        if (this.xform.costumer.telpon.length <= 0) {
                            notifier.warning(`Do no match!`);
                            return;
                        }
                        Swal.fire({
                            icon: 'info',
                            title: 'Loading...',
                            text: 'Harap tunggu',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        axios.get(`/transaksi/find-costumer/${this.xform.costumer.telpon}`)
                            .then((res) => {
                                const costumer = res.data.data;
                                if (costumer) {
                                    this.xform.costumer.nama = costumer.name;
                                    this.xform.costumer.alamat = costumer.alamat;
                                    this.xform.costumer.telpon = costumer.no_telp;
                                    this.xform.costumer.point = costumer.point_member;
                                    this.xform.costumer.point_view = parseInt(this.xform.costumer.point).toLocaleString(
                                        'id-ID');

                                    // notifier.success(`Found!`);
                                    Swal.fire({
                                        icon: "success",
                                        title: "Informasi",
                                        text: 'Data member berhasil ditemukan!',
                                        showConfirmButton: true,
                                        // confirmButtonText: "Close",
                                        showCancelButton: true,
                                        timer: 5000
                                    });
                                } else {
                                    // notifier.warning(`Data tidak ditemukan!`);
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Data tidak ditemukan!',
                                        showConfirmButton: false,
                                        timer: 5000
                                    });
                                    this.xform.costumer.nama = '';
                                    this.xform.costumer.alamat = '';
                                    this.xform.costumer.telpon = '';
                                }

                            }).catch((err) => {
                                Swal.close(); // Menutup loading jika terjadi error
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi kesalahan!',
                                    text: 'Gagal mengambil data.',
                                    showConfirmButton: true
                                });
                            })
                    },

                    discount: {
                        status: false,
                        discount_nilai: 0,
                        discount_percent: 0,
                    },

                    FuncDiscount() {
                        let total_unpaid = parseInt(totalPembayaran);
                        let paid_after_discount = total_unpaid - parseInt(this.discount.discount_nilai);
                        let countPersent = (parseInt(this.discount.discount_nilai) / total_unpaid) * 100;
                        this.discount.discount_percent = parseFloat(countPersent.toFixed(1));
                    },

                    FuncDiscountCount() {
                        let total_unpaid = parseInt(totalPembayaran);
                        let hitungDiscount = (total_unpaid * parseInt(this.discount.discount_percent)) / 100;
                        let paid_after_discount = total_unpaid - hitungDiscount;
                        this.discount.discount_nilai = hitungDiscount;

                    },

                    FuncDiscountTrue() {
                        axios.get(`/transaksi/discount-check/${index.id}`)
                            .then((res) => {
                                const data = res.data.data;
                                if (data.status) {
                                    // sweetalert get discount tdidak dapat diproses, form data.info
                                    Swal.fire({
                                        title: 'Gagal menggunakan diskon!',
                                        text: data.info,
                                        icon: 'warning',
                                        showConfirmButton: true,
                                        confirmButtonText: 'Ok, Mengerti!',
                                        timer: 5000
                                    });
                                    return;
                                } else {
                                    this.discount.status = true;
                                    let hitungTotalBayar = totalPembayaran - parseFloat(this.discount.discount_nilai);
                                    totalPembayaran = hitungTotalBayar;
                                    this.unpaid = totalPembayaran.toLocaleString('id-ID');
                                    Swal.fire({
                                        title: 'Berhasil menggunakan diskon!',
                                        text: `Diskon yang digunakan: ${parseFloat(this.discount.discount_nilai).toLocaleString('id-ID')}`,
                                        icon: 'success',
                                        showConfirmButton: true,
                                        confirmButtonText: 'Ok, Mengerti!',
                                        timer: 5000
                                    })

                                    const closeModal = document.getElementById('btn-close-modal-discount');
                                    closeModal.click();
                                }

                            })
                            .catch((errors) => {
                                const err = errors.data.data;
                                //sweetalert error response form err.message
                                Swal.fire({
                                    title: 'Terjadi kesalahan!',
                                    text: err.message,
                                    icon: 'error',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Ok, Mengerti!',
                                    timer: 5000
                                });
                            });
                    },

                    FuncDiscountFalse() {
                        this.discount.status = false;
                        let hitungTotalBayar = totalPembayaran + parseFloat(this.discount.discount_nilai);
                        totalPembayaran = hitungTotalBayar;
                        this.unpaid = totalPembayaran.toLocaleString('id-ID');
                        // discount dibatalkan
                        Swal.fire({
                            title: 'Berhasil membatalkan diskon!',
                            text: `Diskon yang dibatalkan: ${parseFloat(this.discount.discount_nilai).toLocaleString('id-ID')}`,
                            icon: 'info',
                            showConfirmButton: true,
                            confirmButtonText: 'Ok, Mengerti!',
                            timer: 5000
                        })
                        const closeModal = document.getElementById('btn-close-modal-discount');
                        closeModal.click();
                    },

                    point: {
                        status: false,
                        point_use: 0,
                        point_view: 0
                    },

                    FuncPoint() {
                        if (this.point.status) {
                            this.point.status = false;
                            let point = this.xform.costumer.point;
                            let totalBayar = totalPembayaran;
                            let hitungBayar = parseInt(totalBayar) + parseInt(point);
                            totalPembayaran = hitungBayar;
                            this.unpaid = totalPembayaran.toLocaleString('id-ID');

                            // sweetalert point batal diguankan!
                            Swal.fire({
                                title: 'Penggunaan point batal!',
                                text: `Total Point Rp. ${parseInt(this.xform.costumer.point).toLocaleString('id-ID')}`,
                                icon: 'info',
                                showConfirmButton: true,
                                confirmButtonText: 'Ok, Mengerti!',
                                timer: 5000
                            })
                        } else {
                            // point check, wheen poin check 0 sweetalert point null
                            if (!this.xform.costumer || this.xform.costumer.point <= 0) {
                                Swal.fire({
                                    title: 'Point anda kosong!',
                                    text: 'Silahkan cek point anda.',
                                    icon: 'warning',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Ok, Mengerti!',
                                    timer: 5000
                                });
                                return
                            }
                            // sweetalert confirmation use point
                            Swal.fire({
                                title: 'Apakah ingin menggunakan point ?',
                                text: `Total nilai point Rp. ${parseInt(this.xform.costumer.point).toLocaleString('id-ID')}`,
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, Gunakan',
                                cancelButtonText: 'Batalkan'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Loading data...',
                                        text: 'Harap tunggu',
                                        allowOutsideClick: false,
                                        didOpen: () => {
                                            Swal.showLoading();
                                        }
                                    });

                                    axios.get(`/transaksi/point-use-validation`, {
                                        params: {
                                            key: this.indexData.id
                                        }
                                    }).then((response) => {
                                        this.point.status = true;
                                        let point = this.xform.costumer.point;
                                        let totalBayar = totalPembayaran;
                                        let sisa = totalBayar - point;
                                        totalPembayaran = sisa;
                                        this.unpaid = totalPembayaran.toLocaleString("id-ID")
                                        Swal.fire({
                                            title: 'Berhasil menggunakan point!',
                                            text: `Point yang digunakan Rp. ${parseInt(this.point.point_use).toLocaleString('id-ID')}`,
                                            icon: 'success',
                                            showConfirmButton: true,
                                            confirmButtonText: 'Ok, Mengerti!',
                                            timer: 5000
                                        })
                                    }).catch((errors) => {
                                        this.point.status = false;

                                        // use if to get response 403
                                        if (errors.response.status === 403) {
                                            Swal.fire({
                                                title: 'Invalid!',
                                                text: errors.response.data.message,
                                                icon: 'error',
                                                showConfirmButton: true,
                                                confirmButtonText: 'Ok, Mengerti!',
                                                timer: 5000
                                            });
                                            return
                                        }

                                        // sweetalert error internal server error 500
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Maaf, terjadi kesalahan internal server. Silahkan coba lagi nanti.',
                                            icon: 'error',
                                            showConfirmButton: true,
                                            confirmButtonText: 'Ok, Mengerti!',
                                            timer: 5000
                                        })
                                    })
                                }
                            }).catch((error) => {
                                // console.log(error)
                            });

                        }
                    },

                    init() {
                        this.getCostumer()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
