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
                Inventaris Masuk
            </li>
        </ol>
    </div>

    <div class="mt-2" x-data="loadFormInventaris">
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-5 gap-4">
            <div class="col-span-1 lg:col-span-2">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h5 class="card-title px-2">Barang Inventaris</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-6 px-2">
                            <div class="join w-full">
                                <input x-model="barangSearch" class="input join-item border border-gray-200"
                                    placeholder="Search" />
                                <button x-on:click="getBarang()"
                                    class="btn btn-outline btn-primary btn-soft join-item px-10">Search</button>
                            </div>
                        </div>
                        <div class="overflow-y-auto pb-2 border-b px-2" style="height: 400px; max-height: 600px">
                            <div class="flex flex-col gap-4">
                                <template x-for="val in barangData">
                                    <div
                                        class="bg-slate-50 p-4 px-6 flex justify-between rounded-xl border border-gray-100 hover:bg-blue-50 shadow-sm items-center">
                                        <div class="flex flex-col gap-2">
                                            <span class="text-md font-semibold mb-2" x-text="val.nama_barang">Nama
                                                Product</span>
                                            <div class="flex gap-4">
                                                <span class="icon-[hugeicons--discount-01] size-5"></span>
                                                <span class="text-sm font-semibold">
                                                    <span x-text="val.stock">stock</span>
                                                    <span x-text="val.satuan.nama_satuan"
                                                        class="capitalize">satuan</span>
                                                </span>
                                            </div>
                                            <div class="flex gap-4">
                                                <span class="icon-[solar--tag-price-linear] size-5"></span>
                                                <span class="text-sm font-semibold">
                                                    <span>Rp.</span>
                                                    <span x-text="formatRupiah(val.price)">Price</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap gap-2 items-end">

                                            <div>
                                                <div class="input-group max-w-32" data-input-number>
                                                    <span class="input-group-text gap-3">
                                                        <button type="button"
                                                            class="btn btn-primary btn-soft size-[22px] rounded-sm min-h-0 p-0"
                                                            aria-label="Decrement button" data-input-number-decrement @click="decrement(val.id)">
                                                            <span
                                                                class="icon-[tabler--minus] size-3.5 shrink-0"></span>
                                                        </button>
                                                    </span>
                                                    <input x-model="jumlahItem[val.id]" class="input text-center"
                                                        id="number-input-mini" type="text" value="0"
                                                        data-input-number-input />
                                                    <span class="input-group-text gap-3">
                                                        <button type="button"
                                                            class="btn btn-primary btn-soft size-[22px] rounded-sm min-h-0 p-0"
                                                            aria-label="Increment button" data-input-number-increment @click="increment(val.id)">
                                                            <span
                                                                class="icon-[tabler--plus] size-3.5 shrink-0"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>

                                            <button x-on:click="addItem(val)" class="btn btn-circle btn-soft btn-error"
                                                aria-label="Circle Outline Icon Button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <p class="text-base-content/50">Learn more about our features.</p>
                    </div>
                </div>
            </div>
            <div class="cols-span-1 lg:col-span-3">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h5 class="card-title">Penerimaan Barang Inventaris</h5>
                    </div>
                    <div class="card-body max-h-screen grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <div class="w-full overflow-x-auto border rounded-md shadow-sm">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Barang</th>
                                            <th>Qty Masuk</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="val in items">
                                            <tr class="hover:bg-blue-50">
                                                <td class="text-nowrap" x-text="val.nama_barang">
                                                    barang
                                                </td>
                                                <td>
                                                    <span class="badge badge-info font-semibold" x-text="val.stock">
                                                        0
                                                    </span>
                                                </td>
                                                <td>
                                                    <button x-on:click="deleteItem(val.id)"
                                                        class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--trash] size-5"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="md:col-span-1">
                            <div class="flex flex-col gap-4">
                                <div class="relative">
                                    <input x-model="supplier" type="text" placeholder="..."
                                        class="input input-floating peer" id="" />
                                    <label class="input-floating-label" for="">
                                        Supplier / Sumber
                                    </label>
                                </div>
                                <div class="relative">
                                    <input x-model="tanggal_penerimaan" type="text"
                                        class="input input-floating peer" placeholder="YYYY-MM-DD"
                                        id="flatpickr-floating" />
                                    <label class="input-floating-label" for="">Tanggal
                                        Penerimaan</label>
                                </div>
                                <div class="relative">
                                    <input x-model="nomor_faktur" type="text" placeholder="000.000.00"
                                        class="input input-floating peer" id="" />
                                    <label class="input-floating-label" for="">
                                        No. Faktur
                                    </label>
                                </div>

                                <div class="relative">
                                    <textarea x-model="comment" class="textarea textarea-floating peer" placeholder="...." id=""></textarea>
                                    <label class="textarea-floating-label" for="">Comment</label>
                                </div>

                                <div>
                                    <button type="button" class="btn btn-soft btn-primary rounded-full w-full"
                                        :disabled="isSubmitting" x-on:click="recordInvetory()"
                                        x-text="isSubmitting ? 'Loading...':'Record Invontory'">
                                        Record Invontory
                                    </button>
                                </div>
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
                flatpickr('#flatpickr-floating', {
                    monthSelectorType: 'static'
                })
            });

            function loadFormInventaris() {
                return {
                    isSubmitting: false,
                    supplier: '',
                    tanggal_penerimaan: '',
                    nomor_faktur: '',
                    comment: '',
                    async recordInvetory() {
                        if (this.items.length === 0) {
                            notifier.warning('Empty data items.', {
                                labels: {
                                    warning: "Opps."
                                },
                                durations: {
                                    warning: 2000
                                },
                                icons: {
                                    prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />`,
                                    suffix: '</svg>'
                                }
                            })
                            return;
                        }
                        this.isSubmitting = true;
                        const data = {
                            'supplier': this.supplier,
                            'tanggal_penerimaan': this.tanggal_penerimaan,
                            'nomor_faktur': this.nomor_faktur,
                            'comment': this.comment,
                            'items': this.items
                        }
                        const url = `/inventory/inventory-store-data`;
                        try {
                            const response = await axios.post(url, data);
                            this.items = [];
                            this.supplier = '';
                            this.tanggal_penerimaan = '';
                            this.nomor_faktur = '';
                            this.comment = '';
                            this.isSubmitting = false;
                            notifier.success('Data has been saved.', {
                                labels: {
                                    success: "Success"
                                },
                                durations: {
                                    success: 2000
                                },
                                icons: {
                                    prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />`,
                                    suffix: '</svg>'
                                }
                            });
                        } catch (error) {
                            console.error(error);
                        }
                    },

                    items: [],
                    jumlahItem: [],
                    addItem(data) {
                        const objectData = {
                            'id': data.id,
                            'nama_barang': data.nama_barang,
                            'stock': this.jumlahItem[data.id],
                        }
                        if (objectData.stock <= 0 || objectData.stock == null) {
                            notifier.warning('Stock is empty.', {
                                labels: {
                                    warning: "Opps."
                                },
                                durations: {
                                    warning: 2000
                                },
                                icons: {
                                    prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />`,
                                    suffix: '</svg>'
                                }
                            })
                            return;
                        }
                        let findData = this.items.find(index => index.id === objectData.id);
                        if (!findData) {
                            this.items.unshift(objectData);
                        } else {
                            const oldIndex = this.items.find(index => index.id === objectData.id);
                            oldIndex.stock = objectData.stock
                        }
                        this.jumlahItem = []
                        notifier.success('item added success.', {
                            labels: {
                                success: "OK"
                            },
                            durations: {
                                success: 2000
                            },
                            icons: {
                                prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />`,
                                suffix: '</svg>'
                            }
                        })
                    },
                    deleteItem(key) {
                        this.items = this.items.filter(index => index.id !== key);
                    },

                    barangData: [],
                    barangSearch: '',
                    getBarang() {
                        this.barangData = [];
                        const url = "/inventory/get-barang-data";
                        axios.get(url, {
                            params: {
                                key: this.barangSearch ?? ""
                            }
                        }).then((response) => {
                            this.barangData = response.data.data;

                        }).catch((error) => {
                            console.log(error)
                        }).finally(() => {
                            console.log('finally')
                        })
                    },

                    increment(index) {
                        if (this.jumlahItem[index] === undefined) {
                            this.jumlahItem[index] = 0;
                        }
                        this.jumlahItem[index]++;
                    },

                    decrement(index) {
                        if (this.jumlahItem[index] === undefined || this.jumlahItem[index] === 0) {
                            this.jumlahItem[index] = 0;
                            return;
                        }
                        this.jumlahItem[index]--;
                    },

                    init() {
                        this.getBarang()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
