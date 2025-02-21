<x-base-layout style="bg-gray-200">
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
            <div class=" p-6 rounded-lg shadow-lg">
                <div class="flex justify-start flex-wrap gap-3">
                    <div>
                        <div class="input-group w-full">
                            <span class="input-group-text">
                                <span class="icon-[tabler--search] text-base-content/80 size-6"></span>
                            </span>
                            <input type="search" x-model="search.keyword" @keyup.enter="searchFunc"
                                class="input input-lg grow" placeholder="Search" id="kbdInput" />
                            <label class="sr-only" for="kbdInput">Search</label>
                            <span class="input-group-text gap-2">
                                <kbd class="kbd kbd-sm">⌘</kbd>
                                <kbd class="kbd kbd-sm">K</kbd>
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-start gap-2">
                        <button type="button" @click="searchFunc" class="btn btn-soft btn-lg btn-warning btn-circle">
                            <span class="icon-[ci--note-search] size-6"></span>
                        </button>
                        <button class="btn btn-soft btn-lg btn-error btn-circle" aria-haspopup="dialog"
                            aria-expanded="false" aria-controls="modal-barcode-add-item"
                            data-overlay="#modal-barcode-add-item">
                            <span class="icon-[material-symbols--barcode-scanner-rounded] size-6"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2 p-2 py-6 max-h-screen overflow-y-scroll [&::-webkit-scrollbar]:w-2  [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300  dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                <template x-for="item in dataTable">
                    <div class="card shadow-md rounded-3xl bg-slate-50">
                        <figure class="max-h-52">
                            <template x-if="item.img">
                                <img :src="item.img" class="object-cover h-40 md:h-52" alt="headphone" />
                            </template>
                            <span x-show="!item.img"
                                class="icon-[fxemoji--whiteflower] size-36 h-40 md:h-52 object-cover"></span>
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title text-lg font-space" style="margin-top: -10pt"
                                :title="item.product_name">
                                <span x-text="shortText(item.product_name, 25) ?? '[404]'" class="capitalize">Nama
                                    Product</span>
                            </h5>
                            <div class="p-2 border rounded-lg -mb-2 mt-2 shadow">
                                <div class="flex justify-between flex-wrap  gap-2 mb-2">
                                    <div
                                        class="flex gap-2 align-middle items-center badge badge-warning badge-soft badge-md">
                                        <span class="icon-[hugeicons--money-bag-02] size-3"></span>
                                        <span class="font-semibold">
                                            Rp.
                                            <span x-text="formatRupiah(item.price)"></span>
                                        </span>
                                    </div>
                                    <div
                                        class="flex gap-3 align-middle items-center badge badge-soft badge-info badge-md">
                                        <span class="icon-[hugeicons--discount-01]"></span>
                                        <span class="font-semibold capitalize">
                                            <span x-text="item.qty"></span>
                                            pcs
                                        </span>
                                    </div>
                                </div>

                                <div
                                    class="flex gap-2 align-middle items-center badge badge-soft badge-secondray badge-sm">
                                    <span class="icon-[streamline--qr-code-solid] size-3"></span>
                                    <span class="font-semibold text-xs" x-text="item.code">
                                        Code Product
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="flex justify-between flex-wrap gap-2">
                                <button class="btn btn-soft btn-sm rounded-full shadow btn-primary min-w-28"
                                    x-on:click="addItem(item)">Add Item</button>
                                <button class="btn btn-soft btn-sm rounded-full shadow btn-error min-w-28"
                                    x-on:click="openCostumeModal(item)">Costume</button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="py-4 pl-4">
                <nav class="flex justify-start gap-x-1">
                    <button type="button" class="btn btn-secondary btn-outline min-w-28" @click="prevPageFunc"
                        :disabled="!prevPage">
                        <span class="icon-[heroicons-outline--arrow-circle-left] size-5"></span>
                        Previous
                    </button>
                    <button type="button" class="btn btn-secondary btn-outline min-w-28" :disabled="!nextPage"
                        @click="nextPageFunc">
                        Next
                        <span class="icon-[heroicons-outline--arrow-circle-right] size-5"></span>
                    </button>
                </nav>
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
                                        <span x-show="!item.img_url"
                                            class="icon-[fxemoji--whiteflower] size-24"></span>
                                    </div>

                                    <div class="flex flex-col">
                                        <h3 class="text-base max-sm:text-sm font-semibold text-gray-800">
                                            <span class="capitalize" x-text="shortText(item.product_name, 35)">Nama
                                                Product</span>
                                        </h3>
                                        <div class="flex gap-2 flex-wrap">
                                            <div class="badge badge-sm badge-soft badge-info">
                                                HARGA :
                                                <span x-text="formatRupiah(item.product_price)"></span>
                                            </div>
                                            <div class="badge badge-sm badge-soft badge-warning"
                                                x-show="item.product_costume">
                                                COSTUME :
                                                <span x-text="formatRupiah(item.costume_total)"></span>
                                            </div>
                                        </div>

                                        <button type="button" x-on:click="removeItem(item.product_id)"
                                            class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                            <span class="icon-[uil--trash-alt] size-5"></span>
                                            REMOVE
                                        </button>
                                    </div>
                                </div>

                                <div class="ml-auto">
                                    <h4 class="text-lg max-sm:text-sm font-bold text-gray-800">
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

        <div for="modal costumer">
            <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
                aria-controls="modal-costume-product" data-overlay="#modal-costume-product"
                id="open-modal-costume-product">
                Btn open modal costume product
            </button>
            <div id="modal-costume-product" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
                tabindex="-1">
                <div class="modal-dialog overlay-open:opacity-100 modal-dialog-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="flex gap-3 items-center">
                                <span class="icon-[ant-design--product-outlined] size-6"></span>
                                <span class="font-semibold text-lg">Costume Proudct</span>
                            </h3>
                            <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                                aria-label="Close" data-overlay="#modal-costume-product"
                                id="close-modal-costume-product">
                                <span class="icon-[tabler--x] size-4"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="flex gap-8 justify-between items-start border rounded-lg mb-4 p-4">
                                <div class="flex flex-col gap-3 w-96">
                                    <div class="flex gap-1 flex-col">
                                        <span class="text-xs text-gray-400">Product</span>
                                        <span class="font-semibold capitalize" x-text="costumeForm.product_name">
                                            Nama Product
                                        </span>
                                    </div>
                                    <div class="flex gap-1 flex-col">
                                        <span class="text-xs text-gray-400">QTY</span>
                                        <span class="text-semibold" x-text="costumeForm.product_qty">
                                            1 Pcs
                                        </span>
                                    </div>
                                    <div class="flex gap-1 flex-col">
                                        <span class="text-xs text-gray-400">price</span>
                                        <span class="font-bold text-xl">
                                            <span class="text-orange-500 font-space">
                                                Rp. <i x-text="costumeForm.price_rupiah_view"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="bg-gray-500 max-w-52 rounded-xl">
                                    <img src="https://ik.imagekit.io/tvlk/blog/2024/08/shutterstock_2373316383.jpg"
                                        alt="" class="object-cover rounded-lg">
                                </div>
                            </div>
                            <div class="h-72 max-h-96">
                                <div class="py-2">
                                    <nav class="tabs overflow-x-auto space-x-1 rtl:space-x-reverse p-1"
                                        aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                                        <button type="button"
                                            class="btn btn-text active-tab:bg-primary active-tab:text-white hover:text-primary active hover:bg-primary/20"
                                            id="tabs-pill-icon-item-1" data-tab="#tabs-pill-icon-1"
                                            aria-controls="tabs-pill-icon-1" role="tab" aria-selected="false">
                                            <span class="icon-[carbon--product] size-5 flex-shrink-0"></span>
                                            <span class="hidden sm:inline">Material</span>
                                        </button>
                                        <button type="button"
                                            class="btn btn-text active-tab:bg-primary active-tab:text-white hover:text-primary hover:bg-primary/20"
                                            id="tabs-pill-icon-item-2" data-tab="#tabs-pill-icon-2"
                                            aria-controls="tabs-pill-icon-2" role="tab" aria-selected="false">
                                            <span class="icon-[ph--paper-plane-tilt-bold] size-5 flex-shrink-0"></span>
                                            <span class="hidden sm:inline">Lainnya</span>
                                        </button>
                                    </nav>

                                    <div class="mt-3">
                                        <div id="tabs-pill-icon-1" role="tabpanel"
                                            aria-labelledby="tabs-pill-icon-item-1">
                                            <div class="p-4 rounded-lg border  flex gap-4 flex-wrap items-start">
                                                <div class="flex flex-col gap-3">
                                                    <label for="">Bahan baku</label>
                                                    <div class="w-72 max-w-72">
                                                        <input x-model="filtersearch" @keyup="filterbarangcostumer"
                                                            type="text" class="input"
                                                            placeholder="select barang...">
                                                    </div>
                                                    <ul class="-mt-2 rounded">
                                                        <template x-for="item in filterdata">
                                                            <li class="p-2 border hover:bg-slate-50 px-4">
                                                                <span x-text="item.nama_barang"
                                                                    @click="selectBarang(item)"></span>
                                                            </li>
                                                        </template>
                                                    </ul>
                                                </div>

                                                <div class="flex gap-3 flex-col">
                                                    <label for="">Harga</label>
                                                    <div class="max-w-48">
                                                        <input type="text" class="input"
                                                            x-model="xbarangdata.price" readonly>
                                                    </div>
                                                </div>
                                                <div class="flex gap-3 flex-col">
                                                    <label for="">Qty</label>
                                                    <div class="max-w-32">
                                                        <input type="text" class="input"
                                                            x-model="xbarangdata.qty">
                                                    </div>
                                                </div>
                                                <div class="flex gap-3 flex-col">
                                                    <label for="">&nbsp;</label>
                                                    <button class="btn btn-circle btn-soft btn-error"
                                                        x-on:click="addItemCostumeBarang">
                                                        <span class="icon-[material-symbols--add-task-rounded]"
                                                            style="width: 24px; height: 24px;"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tabs-pill-icon-2" class="hidden" role="tabpanel"
                                            aria-labelledby="tabs-pill-icon-item-2">
                                            <div class="p-4 rounded-lg border  flex gap-4 flex-wrap items-end">
                                                <div class="min-w-72 flex flex-col gap-2">
                                                    <label for="">Item name</label>
                                                    <input type="text" class="input"
                                                        x-model="xothercsdata.title">
                                                </div>
                                                <div class="max-w-52 flex flex-col gap-2">
                                                    <label for="">Cost</label>
                                                    <input type="text" class="input"
                                                        x-model="xothercsdata.price">
                                                </div>
                                                <div class="max-w-24 flex flex-col gap-2">
                                                    <label for="">Qty</label>
                                                    <input type="text" class="input" x-model="xothercsdata.qty">
                                                </div>
                                                <div class="w-auto flex flex-col gap-2">
                                                    <button class="btn btn-circle btn-soft btn-error"
                                                        x-on:click="addItemCostumeOther">
                                                        <span class="icon-[material-symbols--add-task-rounded]"
                                                            style="width: 24px; height: 24px;"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <div class="border-base-content/25 w-full rounded-lg border">
                                        <div class="overflow-x-auto">
                                            <table class="table table-sm rounded">
                                                <thead>
                                                    <tr>
                                                        <th>Bahan baku</th>
                                                        <th>Harga</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                        <th>#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template x-for="item in costumeItem">
                                                        <tr>
                                                            <td class="flex flex-col gap-1">
                                                                <span x-text="item.item_name"
                                                                    class="text-wrap"></span>
                                                                <span x-show="!item.status"
                                                                    class="badge badge-sm badge-soft badge-primary">Bahan
                                                                    Baku</span>
                                                                <span x-show="item.status"
                                                                    class="badge badge-sm badge-soft badge-error">Akomodasi</span>
                                                            </td>
                                                            <td>Rp.
                                                                <span x-text="formatRupiah(item.item_price)"></span>
                                                            </td>
                                                            <td>
                                                                <span x-text="item.item_qty"></span>
                                                            </td>
                                                            <td>
                                                                Rp.
                                                                <span x-text="formatRupiah(item.total)"></span>
                                                            </td>
                                                            <td>
                                                                <button @click="deleteItemCostumeBarang(item.item_id)"
                                                                    class="btn btn-circle btn-sm btn-soft btn-error">
                                                                    <span class="icon-[uil--trash-alt] siz"></span>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-soft btn-secondary"
                                data-overlay="#modal-costume-product">Close</button>
                            <button type="button" class="btn btn-primary" @click="addItemCostume">Add
                                Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div for="modal barcode">
            <div id="modal-barcode-add-item"
                class="overlay modal overlay-open:opacity-100 modal-middle hidden [--overlay-backdrop:static] rounded-3xl"
                role="dialog" tabindex="-1">
                <div class="modal-dialog overlay-open:opacity-100">
                    <div class="modal-content">
                        {{-- <form @submit.prevernt="addItemByBarcode" event.stopPropagation()> --}}
                        <div class="modal-header">
                            <h3 class="font-semibold font-space text-gray-400">Barcode Scan</h3>
                            <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                                aria-label="Close" data-overlay="#modal-barcode-add-item">
                                <span class="icon-[tabler--x] size-4"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="input input-lg text-center text-black rounded-full"
                                x-model="bInput" :disabled="bAction" @keyup="bInputAct" autofocus id="bInput">
                        </div>
                        <div class="modal-footer flex justify-center">
                            <button type="button" x-on:click="addItemByBarcode"
                                class="btn btn-error btn-soft rounded-full w-full font-space font-semibold">
                                <span x-text="bAction ? 'Load...':'Enter'"></span>
                            </button>
                        </div>
                        {{-- </form> --}}
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
                        axios.get(url).then((res) => {
                            const response = res.data.data;
                            this.dataTable = response.data;
                            this.links = this.processPaginationLinks(response.links);
                            this.nextPage = response.next_page_url ? this.addParamsToUrl(response.next_page_url) : null;
                            this.prevPage = response.prev_page_url ? this.addParamsToUrl(response.prev_page_url) : null;
                        }).catch((err) => {
                            console.log(err);
                        })
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
                        nilaiRupiah: 0,
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

                            }).catch((error) => {
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
                        }
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
