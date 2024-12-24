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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-8 gap-5">
            <div class="md:col-span-1 lg:col-span-3 order-first md:order-last">
                <div class="card removing:translate-x-5 removing:opacity-0 w-full transition duration-300 ease-in-out shadow-lg"
                    id="card-dismiss">
                    <div class="card-header flex justify-between items-center">
                        <div class="flex gap-4 justify-start">
                            <span class="icon-[tabler--album] size-8 text-info"></span>
                            <span class="card-title font-semibold font-space text-gray-500"
                                style="font-size: 17pt">Bahan
                                Baku</span>
                        </div>
                        <div class="card-actions flex gap-0.5 sm:gap-3 flex-nowrap">
                            <div class="tooltip">
                                <button class="tooltip-toggle btn btn-text btn-sm btn-circle"
                                    aria-label="Refresh Button">
                                    <span class="icon-[tabler--refresh] size-5"></span>
                                </button>
                                <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="tooltip">
                                    <span class="tooltip-body">Refresh</span>
                                </span>
                            </div>
                            <div class="tooltip">
                                <button class="tooltip-toggle btn btn-text btn-sm btn-circle" aria-label="Close Button"
                                    data-remove-element="#card-dismiss">
                                    <span class="icon-[tabler--x] size-5"></span>
                                </button>
                                <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="tooltip">
                                    <span class="tooltip-body">Close</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="join w-full">
                                <div class="input-group join-item">
                                    <span class="input-group-text">
                                        <span class="icon-[tabler--search] text-base-content/80 size-5"></span>
                                    </span>
                                    <label class="sr-only" for="groupInput">
                                        search...
                                    </label>
                                    <input type="text" class="input grow" placeholder="search..." id=""
                                        x-model="searchBarang" />
                                </div>
                                <button x-on:click="getBahanBaku" class="btn btn-outline btn-secondary join-item h-auto"
                                    :disabled="isSearch" x-text="isSearch ? 'Load...':'Search'">Search...</button>
                            </div>
                        </div>
                        <div class="py-5 flex flex-col gap-3">
                            <template x-for="(val, index) in bahanBaku" :key="index">
                                <div class="card sm:card-side">
                                    <div class="card-body">
                                        <div class="flex justify-between flex-warp gap-3 items-center">
                                            <div class="flex flex-col gap-3 text-left">
                                                <h5 class="font-semibold text-lg" x-text="val.nama_barang">Nama Barang
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
                                                            <span x-text="val.stock"></span>
                                                            Pcs
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex gap-3 flex-wrap text-right">
                                                <div class="input-group max-w-32" data-input-number>
                                                    <span class="input-group-text gap-3">
                                                        <button type="button"
                                                            class="btn btn-primary btn-soft size-[22px] rounded min-h-0 p-0"
                                                            aria-label="Decrement button" @click="decrement(val.id)">
                                                            <span
                                                                class="icon-[tabler--minus] size-3.5 flex-shrink-0"></span>
                                                        </button>
                                                    </span>
                                                    <input class="input text-center" type="text"
                                                        x-model="qty[val.id]" data-input-number-input />
                                                    <span class="input-group-text gap-3">
                                                        <button type="button"
                                                            class="btn btn-primary btn-soft size-[22px] rounded min-h-0 p-0"
                                                            aria-label="Increment button" @click="increment(val.id)">
                                                            <span
                                                                class="icon-[tabler--plus] size-3.5 flex-shrink-0"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <button @click="addItem(val)"
                                                    class="btn btn-circle btn-primary btn-soft">
                                                    <span class="icon-[tabler--arrow-right-to-arc] size-5"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-1 lg:col-span-5">
                <div class="card removing:translate-x-5 removing:opacity-0 w-full transition duration-300 ease-in-out shadow-lg"
                    id="card-dismiss">
                    <div class="card-header flex justify-between items-center">
                        <div class="flex gap-4 justify-start">
                            <span class="icon-[tabler--album] size-8 text-info"></span>
                            <span class="card-title font-semibold font-space text-gray-500" style="font-size: 17pt">
                                Item List
                            </span>
                        </div>
                        <div>
                            <button class="btn btn-secondary rounded-full btn-soft" aria-haspopup="dialog"
                                aria-expanded="false" aria-controls="add-item-modal" data-overlay="#add-item-modal">
                                Item Tambahan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="py-2">
                            <div class="w-full overflow-x-auto border rounded-lg shadow-none">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Comment</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Jenis</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in items">
                                            <tr class="item-center">
                                                <td class="flex flex-col gap-1">
                                                    <span x-text="item.item" class="font-semibold text-md">Item
                                                        Name</span>
                                                    <span class="text-xs badge badge-warning badge-soft">Rp.
                                                        <span x-text="formatRupiah(item.price)"></span>
                                                    </span>
                                                </td>
                                                <td x-text="item.comment">comment</td>
                                                <td x-text="item.qty">000</td>
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
                                                        class="badge badge-info badge-soft">Biaya Lainnya</span>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-end">
                            <div class="flex flex-col gap-1 text-right p-5 px-8 border rounded-xl bg-blue-300 w-72">
                                <span class="text-sm text-gray-50">Total biaya Produksi</span>
                                <span class="text-3xl font-bold text-white">
                                    Rp.
                                    <span x-text="totalPrice"></span>
                                </span>
                            </div>
                        </div>

                        <div class="py-2">
                            <div class="flex gap-4 justify-start mb-2 mt-2">
                                <span class="icon-[tabler--chart-bubble] size-8 text-info"></span>
                                <span class="card-title font-semibold font-space text-gray-500"
                                    style="font-size: 17pt">
                                    Produk Details
                                </span>
                            </div>
                            <div class="border rounded-lg p-4">
                                <div class="mb-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="relative">
                                        <input type="text" placeholder="John Doe"
                                            class="input input-floating peer" id="floatingInput" />
                                        <label class="input-floating-label" for="floatingInput">Produk Title</label>
                                    </div>
                                    {{-- <div class="relative">
                                        <select class="select select-floating" aria-label="Select floating label"
                                            id="selectFloating">
                                            <option>The Godfather</option>
                                            <option>The Shawshank Redemption</option>
                                            <option>Pulp Fiction</option>
                                            <option>The Dark Knight</option>
                                            <option>Schindler's List</option>
                                        </select>
                                        <label class="select-floating-label" for="selectFloating">Kategory</label>
                                    </div> --}}

                                    <div class="relative">
                                        <input type="text" class="input input-floating peer"
                                            placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" />
                                        <label class="input-floating-label" for="floatingInput">Estimasi</label>
                                    </div>
                                </div>
                                <div class="relative mb-3">
                                    <textarea class="textarea textarea-floating peer" placeholder="" id="textareaFloating"></textarea>
                                    <label class="textarea-floating-label" for="textareaFloating">Comment</label>
                                </div>
                                <div class="relative">
                                    <select class="select select-floating" aria-label="Select floating label"
                                        id="selectFloating">
                                        <option>The Godfather</option>
                                        <option>The Shawshank Redemption</option>
                                        <option>Pulp Fiction</option>
                                        <option>The Dark Knight</option>
                                        <option>Schindler's List</option>
                                    </select>
                                    <label class="select-floating-label" for="selectFloating">Crafter</label>
                                </div>
                            </div>


                            <div class="py-4 flex justify-end gap-4" style="margin-bottom: -20pt">
                                <button class="btn btn-soft btn-error rounded-full md:w-40">Simapn produksi</button>
                                <button type="button" x-on:click="clearData" class="btn btn-soft btn-warning rounded-full md:w-40">Clear
                                    data</button>
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
    @push("js")
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            });

            function ProductionFrom() {
                return {
                    detail: {
                        title_product:'',
                        estimasi:'',
                        comment:'',
                        crafter:''
                    },
                    items: [],
                    totalPrice: 0,
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
                            this.csForm = {
                                id: '',
                                item: '',
                                price: '',
                                qty: '',
                                total_price: '',
                                status: true,
                                status_name: "Lainnya",
                                comment: ''
                            }
                            this.sumTotalPrice();
                        } catch (error) {
                            console.log(error);

                        }
                    },
                    addItem(index) {
                        const data = {
                            'id': index.id,
                            'item': index.nama_barang,
                            'price': index.price,
                            'qty': this.qty[index.id],
                            'total_price': parseInt(index.price * this.qty[index.id]),
                            'status': false,
                            'status_name': "Bahan baku",
                            'comment': '-'
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
                    sumTotalPrice() {
                        let total = 0;
                        this.items.forEach(element => {
                            total += parseInt(element.total_price);
                        });
                        this.totalPrice = formatRupiah(total);
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
                    clearData() {
                        this.totalPrice = 0;
                        this.items = [];
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
