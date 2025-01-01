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
                    {{-- <div class="md:col-span-1 lg:col-span-2">
                        <div class="relative w-full">
                            <select class="select select-floating" aria-label="Select floating label"
                                id="selectFloating">
                                <option>Pilih ...</option>
                                <option>The Shawshank Redemption</option>
                                <option>Pulp Fiction</option>
                                <option>The Dark Knight</option>
                                <option>Schindler's List</option>
                            </select>
                            <label class="select-floating-label" for="selectFloating">Kategory</label>
                        </div>
                    </div> --}}
                    <div class="md:col-span-2 lg:col-span-4">
                        <div class="relative">
                            <input type="text" placeholder="masukkan pencarian..." class="input input-floating peer"
                                id="floatingInput" />
                            <label class="input-floating-label" for="floatingInput">
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
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 py-4">
                <template x-for="item in dataTable">
                    <div class="card shadow-lg">
                        <figure>
                            <img src="https://cdn.flyonui.com/fy-assets/components/card/image-7.png" alt="headphone" />
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title text-orange-400 text-lg font-space" style="margin-top: -10pt"
                                x-text="item.product_name ?? '[404]'">
                                Product Name
                            </h5>
                            <div class="py-3 flex flex-col gap-1 mb-2">
                                <div class="flex gap-3 align-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span class="font-semibold text-sm">Rp. <span x-text="item.price"></span></span>
                                </div>
                                <div class="flex gap-3 align-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.098 19.902a3.75 3.75 0 0 0 5.304 0l6.401-6.402M6.75 21A3.75 3.75 0 0 1 3 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 0 0 3.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008Z" />
                                    </svg>
                                    <span class="font-semibold text-sm"><span x-text="item.qty"></span> PCS</span>
                                </div>
                            </div>
                            <div class="flex gap-2 justify-center md:justify-between flex-wrap">
                                <button class="btn btn-error rounded-full btn-soft btn-sm">
                                    <span class="icon-[tabler--brand-stackoverflow] size-5"></span>
                                    Costume
                                </button>
                                <button type="button" x-on:click="addItem(item)"
                                    class="btn btn-primary rounded-full btn-soft btn-sm">
                                    <span class="icon-[tabler--shopping-bag-plus] size-5"></span>
                                    Add chart
                                </button>
                            </div>
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
                        <div x-show="!items || items.length === 0" class="text-center text-md text-gray-300 font-medium font-space">
                            Empty data.
                        </div>
                        <template x-for="item in items">
                            <div class="grid grid-cols-3 items-start gap-4">
                                <div class="col-span-2 flex items-start gap-4">
                                    <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                        <img src='https://readymadeui.com/images/product14.webp'
                                            class="w-full h-full object-contain" />
                                    </div>

                                    <div class="flex flex-col">
                                        <h3 class="text-base max-sm:text-sm font-bold text-gray-800"
                                            x-text="item.product_name">Velvet Sneaker
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
                    <button type="button" class="btn btn-error btn-soft mt-3 w-full" :disabled="isLoadTrasaction" x-text="isLoadTrasaction ? 'Processing...':'Proses Pembayaran'" x-on:click="transaksiProsses">
                        Proses Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push("js")
        <script>
            window.addEventListener('load', function() {
                // Range Date Picker
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            })

            function kasirIndex() {
                return {
                    isLoadTrasaction : false,
                    transaksiProsses() {
                        if (this.items.length <= 0) {
                            notifier.warning('Item is empty.')
                            return;
                        }
                        if (this.subtotal === '') {
                            notifier.warning('Product title tidak boleh kosong.')
                            return;
                        }

                        this.isLoadTrasaction = true;
                        console.log('hello');

                    },

                    items: [],
                    subtotal: '',
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
                            'product_re_produdction_detail': []
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
                        if (data['product_qty'] <=1) {
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
                        this.subtotal = formatRupiah(subtotalBelanja.toFixed(0)) ?? '--';
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
                    init() {
                        this.getProduct()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
