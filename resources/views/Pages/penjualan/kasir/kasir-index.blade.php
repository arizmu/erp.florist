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
                Kasir
            </li>
        </ol>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mt-2" x-data="kasirIndex">
        <div class="md:col-span-1 lg:col-span-3 order-last md:order-first">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-7 gap-3">
                    <div class="md:col-span-1 lg:col-span-2">
                        <div class="relative">
                            <input type="text" placeholder="masukkan pencarian..." class="input input-floating peer"
                                id="barcode-input" />
                            <label class="input-floating-label" for="barcode-input">
                                Barcode Scane
                            </label>
                        </div>
                    </div>
                    <div class="md:col-span-2 lg:col-span-4">
                        <div class="relative">
                            <input type="text" placeholder="masukkan pencarian..." class="input input-floating peer"
                                id="search-input" />
                            <label class="input-floating-label" for="search-input">
                                Search
                            </label>
                        </div>
                    </div>
                    <div class="md:col-span-3 lg:col-span-1">
                        <button class="btn btn-outline btn-primary w-full">
                            Filter
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2 p-2 py-6 max-h-screen overflow-y-scroll [&::-webkit-scrollbar]:w-2  [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300  dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                <template x-for="item in dataTable">
                    <div class="card shadow-md rounded-3xl">
                        <figure class="max-h-52">
                            <template x-if="item.img">
                                <img :src="item.img" class="object-cover h-40 md:h-52" alt="headphone" />
                            </template>
                            <span x-show="!item.img"
                                class="icon-[fxemoji--whiteflower] size-36 h-40 md:h-52 object-cover"></span>
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title text-orange-400 text-lg font-space" style="margin-top: -10pt"
                                x-text="shortText(item.product_name, 25) ?? '[404]'" :title="item.product_name">
                                Product Name
                            </h5>
                            <div class="py-3 flex flex-col gap-1">
                                <div class="flex gap-3 align-middle items-center">
                                    <span class="icon-[streamline--qr-code-solid]"></span>
                                    <span class="font-semibold text-sm">Rp. <span x-text="item.price"></span></span>
                                </div>
                                <div class="flex gap-3 align-middle items-center">
                                    <span class="icon-[mingcute--refund-dollar-line]"></span>
                                    <span class="font-semibold text-sm">Rp. <span x-text="item.price"></span></span>
                                </div>
                                <div class="flex gap-3 align-middle items-center">
                                    <span class="icon-[hugeicons--discount-01]"></span>
                                    <span class="font-semibold text-sm"><span x-text="item.qty"></span> PCS</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" x-on:click="addItem(item)"
                                class="btn btn-primary rounded-full btn-soft">
                                <span class="icon-[tabler--shopping-bag-plus] size-5"></span>
                                Add chart
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        <div class="md:col-span-1 lg:col-span-2 font-space">
            <div class="w-full bg-white shadow-lg relative ml-auto h-auto rounded-lg">
                <div class="p-6">
                    <div class="flex items-center gap-4 text-gray-800">
                        <h3 class="text-2xl font-bold flex-1">Shooping Chart</h3>
                    </div>
                </div>
                <hr class="border-gray-300" />
                <div class="overflow-auto p-6" style="max-height: 700px; height: 500px;">
                    <div class="space-y-4 mb-28">
                        <div x-show="!items || items.length === 0"
                            class="text-center text-md text-gray-300 font-medium font-space">
                            Empty data.
                        </div>
                        <template x-for="item in items">
                            <div class="grid grid-cols-3 items-start gap-4">
                                <div class="col-span-2 flex items-start gap-4">
                                    <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                        <template x-if="item.img_url">
                                            <img :src='item.img_url' class="w-full h-full object-cover" />
                                        </template>
                                        <span x-show="!item.img_url" class="icon-[fxemoji--whiteflower] size-24"></span>
                                    </div>

                                    <div class="flex flex-col">
                                        <h3 class="text-base max-sm:text-sm font-bold text-gray-800"
                                            x-text="shortText(item.product_name, 35)">Velvet Sneaker
                                        </h3>
                                        <p class="text-xs font-semibold text-gray-500 mt-0.5">Harga : <span
                                                x-text="formatRupiah(item.product_price)"></span></p>

                                        <button type="button" x-on:click="removeItem(item.product_id)"
                                            class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                    data-original="#000000"></path>
                                                <path
                                                    d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                    data-original="#000000"></path>
                                            </svg>
                                            REMOVE
                                        </button>
                                    </div>
                                </div>

                                <div class="ml-auto">
                                    <h4 class="text-lg max-sm:text-base max-sm:text-sm font-bold text-gray-800">
                                        Rp. <span x-text="formatRupiah(item.total_price)"></span>
                                    </h4>
                                    <div class="input-group max-w-32 mt-2" data-input-number>
                                        <span class="input-group-text gap-3">
                                            <button x-on:click="reduceQty(item.product_id)" type="button"
                                                class="btn btn-primary btn-soft size-[22px] rounded min-h-0 p-0"
                                                aria-label="Decrement button" data-input-number-decrement>
                                                <span class="icon-[tabler--minus] size-3.5 flex-shrink-0"></span>
                                            </button>
                                        </span>
                                        <input :value="item.product_qty" class="input text-center"
                                            id="number-input-mini" type="text" data-input-number-input readonly />
                                        <span class="input-group-text gap-3">
                                            <button x-on:click="addQty(item.product_id)" type="button"
                                                class="btn btn-primary btn-soft size-[22px] rounded min-h-0 p-0"
                                                aria-label="Increment button" data-input-number-increment>
                                                <span class="icon-[tabler--plus] size-3.5 flex-shrink-0"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="p-6 absolute bottom-0 w-full border-t bg-white rounded-b-md">
                    <ul class="text-gray-800 divide-y">
                        <li class="flex flex-wrap gap-4 text-lg font-bold">Subtotal <span class="ml-auto">
                                Rp. <span x-text="subtotal"></span>
                            </span>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-error btn-soft mt-3 w-full" :disabled="isLoadTrasaction"
                        x-text="isLoadTrasaction ? 'Processing...':'Proses Transaksi'" x-on:click="transaksiProsses">
                        Proses Pembayaran
                    </button>
                </div>
            </div>
        </div>


        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-static-proses-bayar" data-overlay="#modal-static-proses-bayar"
            id="open-modal-pembayaran">open-mdoal-proses-bayar</button>

        <div id="modal-static-proses-bayar"
            class="overlay modal overlay-open:opacity-100 hidden [--overlay-backdrop:static]" role="dialog"
            tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Dialog Title</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#modal-static-proses-bayar">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        This is some placeholder content to show the scrolling behavior for modals. Instead of repeating
                        the text in the
                        modal, we use an inline style to set a minimum height, thereby extending the length of the
                        overall modal and
                        demonstrating the overflow scrolling. When content becomes longer than the height of the
                        viewport, scrolling
                        will move the modal as needed.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft btn-secondary"
                            data-overlay="#modal-static-proses-bayar">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
                                try {
                                    const url = '/transaksi/on-proses';
                                    const data = {
                                        'items': this.items,
                                        'subtotal': this.subtotalGet
                                    }
                                    const response = await axios.post(url, data);
                                    const result = response.data.data;
                                    const key = result.transaction_id;

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
                                    console.log(error);
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
                            'total_price': index.qty * index.price,
                            'product_costume': false,
                            'product_costume_details': [],
                            'product_re_production': false,
                            'product_re_produdction_detail': [],
                            'img_url': index.img
                        }
                        const findItems = this.items.find(arraydata => arraydata.product_id === data.product_id);
                        console.log(findItems);

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
                        data['product_qty']++;
                        data['total_price'] = data['product_qty'] * data['product_price'];
                        this.funcSubtotal()
                    },
                    reduceQty(key) {
                        const data = this.items.find(index => index.product_id === key);
                        if (data['product_qty'] <= 1) {
                            notifier.alert('Jumlah item tidak boleh kurang dari 1.')
                            return;
                        }
                        data['product_qty']--;
                        data['total_price'] = data['product_qty'] * data['product_price'];
                        this.funcSubtotal()
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
                    getProduct() {
                        const url = "/transaksi/product-json";
                        axios.get(url).then(res => {
                            const data = res.data.data.data;
                            this.dataTable = data;
                        }).catch(err => {
                            console.log(err);
                        })
                    },

                    resetItems() {
                        this.items = [];
                        this.subtotal = '';
                    },

                    shortText(value, length) {
                        return `${value.substring(0, length)}  ...`;
                    },

                    init() {
                        this.getProduct()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
