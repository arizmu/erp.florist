<x-base-layout>
    <div class="breadcrumbs mb-2">
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
                Pre-order
            </li>
        </ol>
    </div>
    <div class="mt-4" x-data="indexPreorder">
        <div data-stepper=""
            class="bg-base-100 flex w-full items-start gap-10 rounded-lg p-8 md:px-24 shadow-lg max-sm:flex-wrap max-sm:justify-center min-h-96 md:gap-24 md:py-24"
            id="wizard-validation">
            <ul class="relative flex flex-col gap-y-4">
                <li class="group flex flex-1 flex-col items-center" data-stepper-nav-item='{ "index": 1 }'>
                    <span class="min-h-7.5 group inline-flex flex-col items-center gap-2 align-middle text-sm">
                        <span
                            class="stepper-active:bg-primary stepper-active:shadow stepper-active:text-primary-content stepper-success:bg-primary stepper-success:shadow stepper-success:text-primary-content stepper-error:bg-error stepper-error:text-error-content stepper-completed:bg-success stepper-completed:group-focus:bg-success bg-base-200/50 text-base-content group-focus:bg-base-content/20 size-7.5 flex flex-shrink-0 items-center justify-center rounded-full font-medium">
                            <span
                                class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-sm">1</span>
                            <span class="icon-[tabler--check] stepper-success:block hidden size-4 flex-shrink-0"></span>
                            <span class="icon-[tabler--x] stepper-error:block hidden size-4 flex-shrink-0"></span>
                        </span>
                        <span class="text-base-content text-nowrap font-medium">
                            Material Produksi
                        </span>
                    </span>
                    <div
                        class="stepper-success:bg-primary stepper-completed:bg-success bg-base-content/20 mt-2 h-8 w-px group-last:hidden">
                    </div>
                </li>
                <li class="group flex flex-1 flex-col items-center" data-stepper-nav-item='{ "index": 2 }'>
                    <span class="min-h-7.5 group inline-flex flex-col items-center gap-2 align-middle text-sm">
                        <span
                            class="stepper-active:bg-primary stepper-active:shadow stepper-active:text-primary-content stepper-success:bg-primary stepper-success:shadow stepper-success:text-primary-content stepper-error:bg-error stepper-error:text-error-content stepper-completed:bg-success stepper-completed:group-focus:bg-success bg-base-200/50 text-base-content group-focus:bg-base-content/20 size-7.5 flex flex-shrink-0 items-center justify-center rounded-full font-medium">
                            <span
                                class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-sm">2</span>
                            <span class="icon-[tabler--check] stepper-success:block hidden size-4 flex-shrink-0"></span>
                            <span class="icon-[tabler--x] stepper-error:block hidden size-4 flex-shrink-0"></span>
                        </span>
                        <span class="text-base-content text-nowrap font-medium">
                            Profile Costumer
                        </span>
                    </span>
                    <div
                        class="stepper-success:bg-primary stepper-completed:bg-success bg-base-content/20 mt-2 h-8 w-px group-last:hidden">
                    </div>
                </li>
                <li class="group flex flex-1 flex-col items-center" data-stepper-nav-item='{ "index": 3 }'>
                    <span class="min-h-7.5 group inline-flex flex-col items-center gap-2 align-middle text-sm">
                        <span
                            class="stepper-active:bg-primary stepper-active:shadow stepper-active:text-primary-content stepper-success:bg-primary stepper-success:shadow stepper-success:text-primary-content stepper-error:bg-error stepper-error:text-error-content stepper-completed:bg-success stepper-completed:group-focus:bg-success bg-base-200/50 text-base-content group-focus:bg-base-content/20 size-7.5 flex flex-shrink-0 items-center justify-center rounded-full font-medium">
                            <span
                                class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-sm">3</span>
                            <span class="icon-[tabler--check] stepper-success:block hidden size-4 flex-shrink-0"></span>
                            <span class="icon-[tabler--x] stepper-error:block hidden size-4 flex-shrink-0"></span>
                        </span>
                        <span class="text-base-content text-nowrap font-medium">Crafter</span>
                    </span>
                    <div
                        class="stepper-success:bg-primary stepper-completed:bg-success bg-base-content/20 mt-2 h-8 w-px group-last:hidden">
                    </div>
                </li>
            </ul>
            <div id="wizard-validation-form" class="form-validate w-full p-3 md:p-8 border rounded-lg" novalidate>
                <div id="account-details-validation" class="space-y-5" data-stepper-content-item='{ "index": 1 }'>
                    <div class="flex gap-4 mb-8">
                        <span class="icon-[solar--box-broken] text-red-400" style="width: 24px; height: 24px;"></span>
                        <span class="text-gray-400 text-lg font-semibold">
                            Material Produksi
                        </span>
                    </div>
                    <div class="grid gap-6 grid-cols-1 lg:grid-cols-5">
                        <div class="lg:col-span-2 flex flex-col gap-4">
                            <div class="border rounded-lg p-4 flex justify-between gap-4">
                                <input x-model="searchMaterial" @keyup.enter="getMaterialFunc" type="text"
                                    class="input rounded-full">
                                <div class="flex gap-2">
                                    <button x-on:click="getMaterialFunc" type="button"
                                        class="btn btn-circle btn-soft btn-info">
                                        <span class="icon-[fluent--box-search-24-regular]"
                                            style="width: 24px; height: 24px;"></span>
                                    </button>
                                    <button type="button" class="btn btn-circle btn-soft btn-warning">
                                        <span class="icon-[gridicons--add-outline]"
                                            style="width: 24px; height: 24px;"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <template x-for="item in xmaterial">
                                    <div class="border rounded-lg p-4">
                                        <div class="flex gap-2 justify-between flex-wrap items-center">
                                            <div class="flex flex-col gap-0">
                                                <span class="font-semibold font-space text-wrap"
                                                    x-text="item.nama_barang">Title</span>
                                                <i class="text-sm text-gray-400 flex justify-start gap-2">
                                                    <span>Rp. <span x-text="formatRupiah(item.price)"></span></span>
                                                    <span>|</span>
                                                    <span><span x-text="item.stock"></span> Pcs</span>
                                                </i>
                                            </div>
                                            <div class="flex gap-2">
                                                <div class="input-group min-w-32 max-w-32" data-input-number>
                                                    <span class="input-group-text gap-3">
                                                        <button type="button"
                                                            class="btn btn-primary btn-soft size-[22px] rounded min-h-0 p-0"
                                                            aria-label="Decrement button" data-input-number-decrement>
                                                            <span
                                                                class="icon-[tabler--minus] size-3.5 flex-shrink-0"></span>
                                                        </button>
                                                    </span>
                                                    <input x-model="xitem_qty[item.id]" class="input text-center"
                                                        id="number-input-mini" type="number" value="0"
                                                        data-input-number-input />
                                                    <span class="input-group-text gap-3">
                                                        <button type="button"
                                                            class="btn btn-primary btn-soft size-[22px] rounded min-h-0 p-0"
                                                            aria-label="Increment button" data-input-number-increment>
                                                            <span
                                                                class="icon-[tabler--plus] size-3.5 flex-shrink-0"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <button x-on:click="addItem(item)" type="button"
                                                    class="btn btn-soft btn-error btn-circle">
                                                    <span class="icon-[typcn--arrow-right-outline]"
                                                        style="width: 24px; height: 24px;"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div class="lg:col-span-3">
                            <div class="border rounded-lg p-4 flex flex-col gap-4">
                                <h5 class="text-md font-semibold flex gap-4 items-center mb-2">
                                    <span class="icon-[circum--box-list]" style="width: 24px; height: 24px;"></span>
                                    Material Produksi
                                </h5>
                                <div class="border-base-content/25 w-full rounded-lg border">
                                    <div class="overflow-x-auto">
                                        <table class="table rounded">
                                            <thead>
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Total</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template x-for="item in xitems" :key="item.item_code">
                                                    <tr class="hover:bg-slate-100">
                                                        <td class="flex flex-col gap-1 font-space">
                                                            <span x-text="item.item_name">Product name</span>
                                                            <div
                                                                class="flex gap-2 text-xs text-red-400 dark:text-white">
                                                                <span x-text="formatRupiah(item.item_price)">
                                                                    Rp. 3.000
                                                                </span>
                                                                *
                                                                <span x-text="item.item_qty">3</span>
                                                            </div>
                                                        </td>
                                                        <td x-text="formatRupiah(item.item_total)">Rp. 9.000</td>
                                                        <td>
                                                            <button x-on:click="deleteItem(item.item_code)"
                                                                type="button"
                                                                class="btn btn-circle btn-error btn-soft">
                                                                <span class="icon-[tabler--trash]"
                                                                    style="width: 24px; height: 24px;">
                                                                </span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="border rounded-lg p-4 mt-4 max-w-96">
                                <h5 class=" text-md font-semibold flex gap-4 items-center mb-3">
                                    <span class="icon-[si--wallet-detailed-duotone]"
                                        style="width: 24px; height: 24px;"></span>
                                    Biaya
                                </h5>
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-col gap-2">
                                        <label>Biaya Material</label>
                                        <input x-model="xproduction.cost" readonly class="input w-full bg-gray-300"
                                            type="number" />
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label>Biaya Produksi</label>
                                        <input @keyup.enter="subtotal" x-model="xproduction.price"
                                            class="input w-full" type="number" />
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label>Subtotal</label>
                                        <input x-model="xproduction.subtotal"
                                            class="input input-lg w-full bg-gray-300" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="personal-info-validation" class="space-y-5" data-stepper-content-item='{ "index": 2 }'
                    style="display: none">
                    <div class="flex gap-4 mb-8">
                        <span class="icon-[solar--user-id-line-duotone] text-red-400"
                            style="width: 24px; height: 24px;"></span>
                        <span class="text-gray-400 text-lg font-semibold">
                            Profile Costumer
                        </span>
                    </div>

                    <div class="grid gap-6 grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-4 flex flex-col">
                            <div class="border rounded-xl p-8 flex flex-col gap-4">
                                <div class="w-full">
                                    <label class="label label-text" for=""> Nama Costumer </label>
                                    <input x-model="xcostumer.name" type="text" placeholder="nama costumer"
                                        class="input" id="" />
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex items-center gap-1">
                                        <input x-model="xcostumer.gender" :value="1" type="radio"
                                            name="radio-3" class="radio-inset radio-inset-primary" id="radioType3" />
                                        <label class="label label-text text-base" for="radioType3"> Pria </label>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <input x-model="xcostumer.gender" :value="0" type="radio"
                                            name="radio-3" class="radio-inset radio-inset-primary" id="radioType4"
                                            checked />
                                        <label class="label label-text text-base" for="radioType4"> Wanita </label>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for=""> Alamat Costumer</label>
                                    <textarea x-model="xcostumer.address" type="text" placeholder="Alamat..." class="textarea" id=""></textarea>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="w-full">
                                        <label class="label label-text" for="">Telpon </label>
                                        <input x-model="xcostumer.phone" type="text" placeholder="08..."
                                            class="input" id="" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text" for="">Email</label>
                                        <input x-model="xcostumer.email" type="text" placeholder=".....@mail.com"
                                            class="input" id="" />
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="">Sosial Media
                                        (FB/IG/Tiktok/Lainnya)</label>
                                    <input x-model="xcostumer.sosmed" type="text" placeholder="@username-sosmed"
                                        class="input" id="" />
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="bg-blue-300 p-5 rounded-lg flex flex-col gap-4">
                                <div class="flex gap-4">
                                    <span class="icon-[iconoir--coins] text-yellow-200"
                                        style="width: 24px; height: 24px;"></span>
                                    <span class="font-space font-semibold text-white">Point Member</span>
                                </div>
                                <div class="flex justify-start mb-4">
                                    <span class="text-4xl font-semibold font-space text-white">Rp. 0</span>
                                </div>
                            </div>
                            <div class="py-4">
                                <div class="flex items-center gap-1.5">
                                    <input type="checkbox" class="switch switch-outline switch-lg switch-primary"
                                        id="" />
                                    <label class="label label-text text-lg font-semibold font-space text-gray-700"
                                        for=""> Gunakan Point </label>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span>INFORMASI :</span>
                                <br>
                                <i class="text-sm text-warning">
                                    Gunakan nomor telpon untuk pencarian data costumer member!
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="social-links-validation" class="space-y-5" data-stepper-content-item='{ "index": 3}'
                    style="display: none">

                    <div class="flex gap-4 mb-8">
                        <span class="icon-[solar--user-id-line-duotone] text-red-400"
                            style="width: 24px; height: 24px;"></span>
                        <span class="text-gray-400 text-lg font-semibold">
                            Crafter
                        </span>
                    </div>
                    <div class="border rounded-xl p-8 flex gap-4 flex-col max-w-4xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="w-full">
                                <label class="label label-text" for="favorite-simpson">Crafter</label>
                                <select x-model="xproduction.crafter" class="select" id="favorite-simpson">
                                    <option>Pilih..</option>
                                    <template x-for="val in xcrafter">
                                        <option :value="val.id" x-text="val.pegawai_name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="w-full">
                                <label class="label label-text" for="favorite-simpson">
                                    Jasa Crafter
                                </label>
                                <select x-model="xproduction.jasa" class="select" id="favorite-simpson">
                                    <option value="">Pilih...</option>
                                    <template x-for="val in xjasalayanan">
                                        <option :value="val.id">
                                            <span x-text="val.title"></span> |
                                            <i class="text-sm font-semibold" x-text="formatRupiah(val.salary)"></i>
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="flex flex-col gap-2">
                                <label class="" for="">Produk Title</label>
                                <input x-model="xproduction.title" type="text" placeholder="nama bucket"
                                    class="input" id="">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="" for="floatingInput">Estimasi</label>
                                <input x-model="xproduction.estimasi" type="text" class="input flatpickr-input"
                                    placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" readonly="readonly">
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 mb-3">
                            <label class="" for="textareaFloating">Comment</label>
                            <textarea x-model="xproduction.comment" class="textarea" placeholder="" id=""></textarea>
                        </div>
                    </div>
                </div>
                <div data-stepper-content-item='{ "isFinal": true }' style="display: none">
                    <div class="bg-base-200/50 flex h-48 items-center justify-center rounded-xl p-4">
                        <h3 class="text-base-content/50 text-3xl">Your Form has been Submitted</h3>
                    </div>
                </div>
                <div class="mt-16 flex items-center justify-start gap-x-2 font-space">
                    <button type="button" class="btn rounded-full px-8 btn-primary btn-prev max-sm:btn-square"
                        data-stepper-back-btn="">
                        <span class="icon-[tabler--chevron-left] text-primary-content size-5 rtl:rotate-180"></span>
                        <span class="max-sm:hidden">Back</span>
                    </button>
                    <button type="button" class="btn rounded-full px-8 btn-primary btn-next max-sm:btn-square"
                        data-stepper-next-btn="">
                        <span class="max-sm:hidden">Next</span>
                        <span class="icon-[tabler--chevron-right] text-primary-content size-5 rtl:rotate-180"></span>
                    </button>

                    <button x-on:click="storeFinish" type="button" class="btn rounded-full px-8 btn-primary"
                        data-stepper-finish-btn="" style="display: none">
                        <span class="icon-[mynaui--store]" style="width: 24px; height: 24px;"></span>
                        <span x-text="isStoring ? 'Processing...':'Finishing Store'"></span>
                    </button>

                    <button :disabled="isStoring" type="button" x-on:click="resetFrom"
                        class="btn rounded-full px-8 btn-primary" data-stepper-reset-btn="" style="display: none">
                        <span x-text="isStoring ? 'Is Loading...!':'Back'"></span>
                    </button>
                    <button x-show="isPembayaran" type="button" class="btn rounded-full px-8 btn-error"
                        data-stepper-reset-btn="">Proses Pembayaran</button>
                </div>
            </div>
        </div>
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
                        point: '',
                        point_use: false, // false = tidak menggunakan point | true = menggunakan point
                        id: '',
                        name: '',
                        gender: '',
                        address: '',
                        phone: '',
                        email: '',
                        sosmed: ''
                    },
                    xproduction: {
                        crafter: '',
                        jasa: '',
                        title: '',
                        estimasi: '',
                        comment: '',
                        cost: 0,
                        price: 25000,
                        subtotal: 0
                    },
                    xitems: [],
                    xitem_qty: [],
                    isPembayaran: false,
                    isStoring: false,
                    isSuccess: true,
                    async storeFinish() {
                        const data = {
                            items: this.xitems,
                            costumer: this.xcostumer,
                            production: this.xproduction
                        }

                        this.isStoring = true;
                        // this.isPembayaran = true;
                        try {
                            const url = "/transaksi/pre-order-action";
                            const store = await axios.post(url, data);
                            const res = store.data.data;

                        } catch (err) {
                            this.isStoring = false;
                            this.isPembayaran = false;
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
                            item_status: false
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
