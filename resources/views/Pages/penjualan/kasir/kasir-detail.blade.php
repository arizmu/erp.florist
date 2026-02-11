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
                <li>
                    <a href="#" aria-label="Kasir" class="hover:text-primary transition-colors">
                        <span class="icon-[tabler--cash-register]"></span>
                        Kasir
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li aria-current="page" class="font-medium text-primary">
                    <span class="icon-[tabler--file] me-1 size-5"></span>
                    Detail Transaksi
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl p-2.5 shadow-lg shadow-emerald-500/30">
                        <span class="icon-[tabler--file-description] size-6 text-white"></span>
                    </span>
                    Detail Transaksi
                </h1>
                <p class="text-gray-500 mt-2 ml-1">View transaction details and payment history</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6" x-data="pembayaran()">
        <!-- Left Column - Product Details & Customer -->
        <div class="xl:col-span-8 space-y-6">
            <!-- Product Details Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/20">
                            <span class="icon-[carbon--product] size-5 text-white"></span>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Detail Product</h2>
                            <p class="text-xs text-gray-500">Items in this transaction</p>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($transaksi->details as $item)
                        <div class="bg-gradient-to-br from-gray-50 to-white border border-gray-200 rounded-xl p-4 hover:shadow-md hover:border-blue-200 transition-all duration-200">
                            <!-- Product Image -->
                            <div class="flex items-center justify-center mb-4">
                                @if ($item->img)
                                <img class="max-h-32 w-auto object-cover rounded-lg"
                                    src="{{ $item->img }}"
                                    alt="{{ $item->item_name }}">
                                @else
                                <div class="w-20 h-20 rounded-lg bg-gradient-to-br from-purple-100 to-indigo-100 flex items-center justify-center">
                                    <span class="icon-[fxemoji--whiteflower] size-12 text-purple-400"></span>
                                </div>
                                @endif
                            </div>

                            <!-- Product Info -->
                            <div class="space-y-2">
                                <div>
                                    <label class="text-xs text-gray-400 uppercase tracking-wide">Product Name</label>
                                    <h4 class="font-semibold text-gray-800 text-sm">
                                        {{ $item->item_name ?? $item->code_product ?? "[null]" }}
                                    </h4>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-orange-50 text-orange-700">
                                        Rp. {{ formatRupiah($item->cost_item) }} × {{ $item->amount_item }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-gray-200">
                                    <label class="text-xs text-gray-400 uppercase tracking-wide">Total</label>
                                    <span class="font-bold text-gray-800 text-sm">
                                        Rp. {{ formatRupiah($item->total_cost) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Customer Information Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-lg shadow-emerald-500/20">
                            <span class="icon-[tabler--users] size-5 text-white"></span>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Customer Information</h2>
                            <p class="text-xs text-gray-500">Customer details for this transaction</p>
                        </div>
                    </div>
                </div>

                <!-- Customer Form -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--user] size-4 text-gray-400"></span>
                                    Customer Name
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                    class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200" 
                                    placeholder="Enter customer name"
                                    value="{{ $transaksi->costumer->name ?? "" }}" 
                                    id="nama_costumer" 
                                    readonly />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--phone] size-4 text-gray-400"></span>
                                    Phone Number
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                    class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200" 
                                    placeholder="08***"
                                    value="{{ $transaksi->costumer->no_telp ?? "" }}" 
                                    id="telpon_costumer"
                                    readonly />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span class="flex items-center gap-2">
                                <span class="icon-[tabler--map-pin] size-4 text-gray-400"></span>
                                Address
                            </span>
                        </label>
                        <textarea 
                            class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 resize-none" 
                            rows="3"
                            placeholder="Enter customer address..."
                            id="alamat_costumer"
                            readonly>{{ $transaksi->costumer->alamat ?? "" }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Transaction Details -->
        <div class="xl:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 sticky top-6">
                <!-- Card Header -->
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-white dark:from-gray-700 dark:to-gray-800">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-lg shadow-emerald-500/20">
                            <span class="icon-[tabler--receipt] size-5 text-white"></span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Transaction Details</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Payment summary & history</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 space-y-5">
                    <!-- Total Payment Display -->
                    <div class="bg-gradient-to-r from-emerald-500 to-yellow-600 rounded-2xl p-6 text-white shadow-lg shadow-emerald-500/30">
                        <label class="text-emerald-100 text-sm font-medium">Subtotal</label>
                        <div class="text-4xl font-bold mt-2">
                            Rp.
                            {{ formatRupiah($transaksi->total_payment) }}
                        </div>
                    </div>

                    <!-- Transaction Info -->
                    <div class="border border-gray-200 rounded-xl p-4 space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Code Transaksi</span>
                            <span class="font-semibold text-gray-800">{{ $transaksi->code }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Status</span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-green-50 text-green-700">
                                <span class="icon-[tabler--check] size-3 mr-1"></span>
                                Paid
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Total Paid</span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-green-50 text-green-700">
                                Rp. {{ formatRupiah($transaksi->total_paid) }}
                            </span>
                        </div>
                    </div>

                    <!-- Payment History -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <span class="icon-[tabler--history] size-4 text-gray-400"></span>
                            Payment History
                        </h4>
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-gray-50/50">
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Faktur</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Payment</th>
                                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach ($transaksi->payment as $item)
                                        <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                            <td class="px-4 py-3">
                                                <a href="/transaksi/cetak-invoice/{{ $transaksi->id }}/{{$item->id}}"
                                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-all duration-200 hover:scale-105"
                                                    onclick="window.open(this.href, '_blank', 'width=800,height=600'); return false;"
                                                    aria-label="Print invoice">
                                                    <span class="icon-[hugeicons--invoice-04] size-4"></span>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span class="font-medium text-gray-800 text-sm">{{ $item->factur_number }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span class="text-gray-600 text-sm">{{ $item->created_at }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                               @if ($item->is_status)
                                                    <span class="font-semibold text-emerald-600 text-sm">Rp. {{ formatRupiah($item->payment_amount) }}</span>
                                               @else
                                                    <span class="font-semibold text-red-600 text-sm">Rp. {{ formatRupiah($item->total_unpaid) }}</span>
                                               @endif
                                            </td>
                                            <td class="px-4 py-3 text-center">
                                               @if ($item->is_status)
                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-green-50 text-green-700">
                                                    <span class="icon-[tabler--check] size-3 mr-1"></span>
                                                    Paid
                                                </span>
                                               @else
                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-red-50 text-red-700">
                                                    <span class="icon-[tabler--check] size-3 mr-1"></span>
                                                    Unpaid
                                                </span>
                                               @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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

        function pembayaran() {
            return {
                "status": "success",
            }
        }
    </script>
    @endpush
</x-base-layout>
