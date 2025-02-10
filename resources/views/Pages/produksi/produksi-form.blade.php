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
                Produksi
            </li>
        </ol>
    </div>
    <div class="py-4" x-data="ProductionFrom">
        <div class="grid gap-4 grid-cols-1 md:grid-cols-3 lg:grid-cols-9">
            <div class="col-span-1 md:col-span-2 lg:col-span-6">
                <div class="card removing:translate-x-5 removing:opacity-0 w-full transition duration-300 ease-in-out shadow-lg h-screen "
                    id="card-dismiss">
                    <div class="card-header flex justify-between items-center">
                        <div class="flex gap-4 justify-start">
                            <span class="icon-[tabler--album] size-8 text-info"></span>
                            <span class="card-title font-semibold font-space text-gray-500" style="font-size: 17pt">
                                Product Item Details
                            </span>
                        </div>
                        <div>
                            <button class="btn btn-warning rounded-full btn-soft" aria-haspopup="dialog"
                                aria-expanded="false" aria-controls="add-item-modal" data-overlay="#add-item-modal">
                                <span class="icon-[hugeicons--money-add-01] size-5"></span>
                                Item Tambahan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="grid gap-4 grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-2 py-2">
                                <div class="mb-3">
                                    <div class="join w-full">
                                        <div class="input-group join-item">
                                            <span class="input-group-text">
                                                <span class="icon-[tabler--search] text-base-content/80 size-5"></span>
                                            </span>
                                            <label class="sr-only" for="groupInput">
                                                search...
                                            </label>
                                            <input type="text" class="input grow" placeholder="search..."
                                                id="" x-model="searchBarang" @keyup.enter="getBahanBaku" />
                                        </div>
                                        <button x-on:click="getBahanBaku"
                                            class="btn btn-outline btn-secondary join-item h-auto"
                                            :disabled="isSearch"
                                            x-text="isSearch ? 'Load...':'Search'">Search...</button>
                                    </div>
                                </div>

                                <div class="py-5 flex flex-col gap-3 max-h-96 overflow-y-auto">
                                    <div x-show="bahanBaku <= 0" class="p-6 text-center font-semibold text-gray-500 rounded-lg bg-gray-100">
                                        <i>Not Found ...</i>
                                    </div>
                                    <template x-for="(val, index) in bahanBaku" :key="index">
                                        <div class="card bg-green-200">
                                            <div class="card-body p-4">
                                                <div class="flex justify-between flex-warp gap-2 items-end">
                                                    <div class="flex flex-col gap-2 text-left">
                                                        <h5 class="font-semibold font-space" x-text="val.nama_barang">
                                                            Nama
                                                            Barang
                                                        </h5>
                                                        <div class="flex flex-col gap-1">
                                                            <div class="flex gap-5">
                                                                <span class="icon-[tabler--moneybag] size-5"></span>
                                                                <div>
                                                                    Rp.
                                                                    <span x-text="formatRupiah(val.price)"></span>
                                                                </div>
                                                            </div>
                                                            <div class="flex gap-5">
                                                                <span
                                                                    class="icon-[tabler--align-box-right-stretch] size-5"></span>
                                                                <div>
                                                                    <span x-text="val.stock">Stock</span>
                                                                    <i x-text="val.satuan.nama_satuan" class="capitalize"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-3 flex-wrap text-right">
                                                        <div class="input-group max-w-32" data-input-number>
                                                            <span class="input-group-text gap-3">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-soft size-[22px] rounded min-h-0 p-0"
                                                                    aria-label="Decrement button"
                                                                    @click="decrement(val.id)">
                                                                    <span
                                                                        class="icon-[tabler--minus] size-3.5 flex-shrink-0"></span>
                                                                </button>
                                                            </span>

                                                            <input class="input input-sm text-center" type="text"
                                                                x-model="qty[val.id]" data-input-number-input />

                                                            <span class="input-group-text gap-3">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-soft size-[22px] rounded min-h-0 p-0"
                                                                    aria-label="Increment button"
                                                                    @click="increment(val.id)">
                                                                    <span
                                                                        class="icon-[tabler--plus] size-3.5 flex-shrink-0"></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        <button @click="addItem(val)"
                                                            class="btn btn-circle btn-primary btn-soft btn-sm">
                                                            <span
                                                                class="icon-[tabler--arrow-right-to-arc] size-5"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <div class="md:col-span-3">
                                <div class="py-2">
                                    <div class="w-full overflow-x-auto border rounded-lg shadow-none">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template x-for="item in items">
                                                    <tr class="item-center">
                                                        <td class="flex flex-col gap-1">
                                                            <span x-text="item.item"
                                                                class="font-semibold text-wrap"></span>
                                                            <div class="flex gap-2 justify-start">
                                                                <span class="text-xs badge badge-warning badge-soft">Rp.
                                                                    <span x-text="formatRupiah(item.price)"></span>
                                                                </span>
                                                                <span>*</span>
                                                                <span x-text="item.qty"></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="">
                                                                Rp.
                                                                <span x-text="formatRupiah(item.total_price)">
                                                                    -
                                                                </span>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span x-show="!item.status"
                                                                class="badge badge-success badge-soft">Bahan Baku</span>

                                                            <span x-show="item.status"
                                                                class="badge badge-info badge-soft">Biaya
                                                                Lainnya</span>
                                                        </td>
                                                        <td>
                                                            {{-- <button class="btn btn-warning btn-soft btn-circle"><span
                                                            class="icon-[tabler--edit] size-5"></span></button> --}}
                                                            <button x-on:click="deleteItem(item.id)"
                                                                class="btn btn-error btn-soft btn-circle"><span
                                                                    class="icon-[tabler--trash] size-5"></span></button>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template x-if="items.length === 0">
                                                    <tr>
                                                        <td colspan="4" class="text-center">
                                                            Item is Empty.
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-end">
                                    <div
                                        class="flex flex-col gap-1 text-right p-5 px-8 border rounded-xl bg-blue-300 w-72">
                                        <span class="text-sm text-gray-50">Biaya bahan Baku</span>
                                        <span class="text-3xl font-bold text-white">
                                            Rp.
                                            <span x-text="totalPrice"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3 lg:col-span-3">
                <div class="card removing:translate-x-5 removing:opacity-0 w-full transition duration-300 ease-in-out shadow-lg"
                    id="card-dismiss">
                    <div class="card-body">
                        <div class="py-2">
                            <div class="flex gap-4 justify-start mb-2 mt-2">
                                <span class="icon-[tabler--chart-bubble] size-8 text-info"></span>
                                <span class="card-title font-semibold font-space text-gray-500"
                                    style="font-size: 17pt">
                                    Production Details
                                </span>
                            </div>
                            <div class="border rounded-lg p-4">
                                <div class="mb-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="relative">
                                        <input x-model="detail.title_product" type="text"
                                            placeholder="nama bucket" class="input input-floating peer"
                                            id="" />
                                        <label class="input-floating-label" for="">Product Name</label>
                                    </div>

                                    <div class="relative">
                                        <input x-model="detail.estimasi" type="text"
                                            class="input input-floating peer" placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                            id="flatpickr-range" />
                                        <label class="input-floating-label" for="floatingInput">Estimasi</label>
                                    </div>
                                </div>
                                <div class="relative mb-3">
                                    <textarea x-model="detail.comment" class="textarea textarea-floating peer" placeholder="" id="textareaFloating"></textarea>
                                    <label class="textarea-floating-label" for="textareaFloating">Deskrpisi
                                        Product</label>
                                </div>
                                <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                                    <div class="relative">
                                        <select x-model="detail.crafter" class="select select-floating"
                                            aria-label="Select floating label" id="">
                                            <option>Pilih...</option>
                                            <template x-for="val in pegawai">
                                                <option :value="val.id" x-text="val.pegawai_name"></option>
                                            </template>
                                        </select>
                                        <label class="select-floating-label" for="selectFloating">Crafter</label>
                                    </div>
                                    <div class="relative">
                                        <select x-model="detail.jasa" class="select select-floating"
                                            aria-label="Select floating label" id="">
                                            <option>Pilih...</option>
                                            <template x-for="val in jasa">
                                                <option :value="val.id">
                                                    Rp.
                                                    <i class="text-sm font-semibold"
                                                        x-text="formatRupiah(val.salary)"></i>
                                                    ||
                                                    <span x-text="val.title"></span>
                                                </option>
                                            </template>
                                        </select>
                                        <label class="select-floating-label" for="selectFloating">Ref Jasa</label>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded-lg p-4 mt-4">
                                <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                                    <div class="relative">
                                        <input x-model="totalPrice" type="text" placeholder="Harga Bahan" readonly
                                            class="input input-floating peer" id="" />
                                        <label class="input-floating-label" for="">Cost Item</label>
                                    </div>

                                    <div class="relative">
                                        <input x-model="cost_productions" type="text"
                                            class="input input-floating peer" placeholder="Rp. 0" id=""
                                            @keyup="changeCostProcuction" />
                                        <label class="input-floating-label" for="">Cost Production</label>
                                    </div>
                                </div>
                                <div class="p-4 rounded-lg bg-red-300 mt-2 flex flex-col gap-1">
                                    <label for="" class="font-semibold text-white">PRICE FOR SALE</label>
                                    <span class="text-xs text-gray-50">(cost item + cost prodcution)</span>
                                    <div class="font-semibold text-5xl font-space text-white">
                                        <span>Rp. </span>
                                        <span x-text="price">0.,</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-4 flex justify-between gap-4" style="margin-bottom: -20pt">
                                <button type="button" x-on:click="clearData"
                                    class="btn btn-lg btn-soft btn-warning rounded-full md:w-40">
                                    <span class="icon-[material-symbols--frame-reload-sharp] size-5"></span>
                                    Clear
                                </button>
                                <button x-on:click="storeProduction" type="submit"
                                    class="btn btn-lg btn-soft btn-primary rounded-full" :disable="isLoading">
                                    <span class="icon-[proicons--save] size-5"></span>
                                    <span x-text="isLoading ? 'is loading...':'Go Submit'"
                                        class="text-wrap">Go Submit</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- modal item add --}}
        <div id="add-item-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div
                class="modal-dialog overlay-open:mt-12 overlay-open:opacity-100 overlay-open:duration-500 transition-all ease-out">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Form item</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#add-item-modal">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <form @submit.prevent="addCostumeItem">
                        <div class="modal-body flex flex-col gap-2">
                            <div class="w-full">
                                <label class="label label-text" for="inte-name">
                                    Nama item
                                </label>
                                <input x-model="csForm.item" type="text" placeholder="item name" class="input"
                                    id="inte-name" />
                            </div>
                            <div class="grid grid-flow-row md:grid-cols-3 gap-2">
                                <div class="md:col-span-2 w-full">
                                    <label class="label label-text" for="biaya">
                                        Biaya
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input x-model="csForm.price" type="number" class="input grow"
                                            placeholder="00.00" id="biaya" />
                                        <label class="sr-only" for="biaya">Enter amount</label>
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="qty">
                                        Qty
                                    </label>
                                    <input x-model="csForm.qty" type="number" placeholder="qty" class="input"
                                        id="qty" />
                                </div>
                            </div>
                            <div class="relative mt-2">
                                <textarea x-model="csForm.comment" class="textarea textarea-floating peer" placeholder="comment..."
                                    id="comment-cs-form"></textarea>
                                <label class="textarea-floating-label" for="comment-cs-form">Comment</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-soft btn-secondary" data-overlay="#add-item-modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Add item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end modal --}}
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
                        if (!this.csForm.item || this.csForm.item.trim() === "" || this.csForm.price <= 0 || this.csForm.qty <=
                            0) {
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
                        notifier.success('Delated item success.')
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
