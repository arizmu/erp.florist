<x-base-layout>
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
                Kasir Pembayaran
            </li>
        </ol>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mt-2 py-2" x-data="pembayaran()">
        <div class="md:col-span-1 lg:col-span-3 order-last md:order-first">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold font-space flex items-center gap-4 text-gray-500">
                    <span class="icon-[carbon--product] size-7 text-blue-500"></span>
                    Detail Product
                </h2>

                <div class="mt-6 flex flex-col gap-4">
                    @foreach ($transaksi->details as $item)
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4 px-6 items-center font-space border rounded-xl hover:bg-gray-100">
                            @if ($item->img)
                                  <img class="max-h-40 w-auto"
                                 src="https://png.pngtree.com/png-clipart/20230312/ourmid/pngtree-transparent-watercolor-flowers-png-image_6646331.png"
                                alt="">
                            @else
                                <span class="icon-[fxemoji--whiteflower] size-20"></span>
                            @endif
                            <div class="flex flex-col gap-2">
                                <div for="product_name" class="flex flex-col gap-0">
                                    <label for="" class="text-xs text-gray-400 ">Product name</label>
                                    <h4 class="text-md font-semibold text-gray-500">{{ $item->item_name }} || {{ $item->code_product ?? "[null]" }}</h4>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span for="for-harga" class="text-orange-400 text-sm font-semibold">Rp.
                                        {{ formatRupiah($item->cost_item) }} * {{ $item->amount_item }}</span>

                                </div>
                            </div>
                            <div class="flex flex-col gap-2 md:text-right">
                                <div class="flex flex-col gap-0" for="total">
                                    <label for="" class="text-xs text-gray-400">Total</label>
                                    <span class="text-md font-bold text-gray-500">Rp.
                                        {{ formatRupiah($item->total_cost) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="md:col-span-1 lg:col-span-2 font-space">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h5 class="card-title">Transaction Details</h5>
                </div>
                <div class="card-body">
                    <div class="p-8 bg-green-300 rounded-lg flex flex-col gap-1 ">
                        <label for="" class="text-slate-50">Subtotal</label>
                        <span class="text-white text-4xl font-semibold">Rp.
                            {{ formatRupiah($transaksi->total_payment) }}</span>
                    </div>
                    <div class="flex flex-col gap-2 mt-4 p-2">
                        <div class="flex justify-between gap-2">
                            <label for="" class="text-gray-500">Code Transaksi</label>
                            <span class="font-semibold">{{ $transaksi->code }}</span>
                        </div>

                        <div>
                            <label for="" class="">Custumer</label>
                            <div class="p-5 border rounded-lg mt-3 flex flex-col gap-2">
                                <div class="relative">
                                    <input type="text" placeholder="Nama Costumer" class="input input-filled peer"
                                        value="{{ $transaksi->costumer->name ?? "" }}" id="nama_costumer" />
                                    <label class="input-filled-label" for="nama_costumer">Costumer Name</label>
                                    <span class="input-filled-focused"></span>
                                </div>

                                <div class="relative">
                                    <textarea class="textarea textarea-filled peer" placeholder="Alamat...">{{ $transaksi->costumer->alamat ?? "" }}</textarea>
                                    <label class="textarea-filled-label" for="alamat_costumer">Alamat Costumers</label>
                                    <span class="textarea-filled-focused"></span>
                                </div>

                                <div class="relative">
                                    <input type="text" placeholder="08***" class="input input-filled peer"
                                        value="{{ $transaksi->costumer->no_telp ?? "" }}" />
                                    <label class="input-filled-label" for="nama_costumer">Telpon</label>
                                    <span class="input-filled-focused"></span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4 mt-4">
                            <div class="flex justify-between px-1">
                                <label for="" class="">Payment</label>
                                <span class="badge badge-soft badge-success">Paid</span>
                            </div>
                            <div class="flex justify-between px-1">
                                <label for="" class=""></label>
                                <span class="badge badge-soft badge-success">Rp.
                                    {{ formatRupiah($transaksi->total_payment) }}
                                </span>
                            </div>
                            {{-- <div class="p-5 border rounded-lg">
                                <div class="w-full overflow-x-auto">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Payment</th>
                                                <th>Method</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2021-10-10</td>
                                                <td>Rp. 500.000</td>
                                                <td>Qris</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                        </div>

                    </div>


                </div>
                <div class="card-footer text-center">
                    <button class="w-full btn btn-success btn-soft btn-circle">Paid</button>
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
