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
    <div x-data ="IndexInventory">
        {{-- <div class="w-auto px-6 py-8 bg-white rounded-lg shadow-md mb-2 mt-2">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 align-middle">
                <div class="max-h-80">
                    <img src="https://readymadeui.com/management-img.webp" alt="Image"
                        class="rounded-md object-cover w-full h-full" />
                </div>
                <div class="flex flex-col gap-4 md:gap-6 md:mt-8">
                    <h2 class="text-3xl font-extrabold text-purple-700 mb-4 font-space">
                        Managemen Inventaris
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div
                            class="bg-emerald-400 rounded-sm p-5  px-10 shadow-sm flex justify-between gap-8 align-middle items-center">
                            <div class="">
                                <div class="border-2 rounded-full bg-white p-2 border-green-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-15 text-green-300">
                                        <path fill-rule="evenodd"
                                            d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-col text-right">
                                <span class="font-bold font-muse text-orange-50" style="font-size: 32pt;">
                                    10
                                </span>
                                <span class="text-gray-50 font-semibold font-muse">
                                    Faktur Masuk
                                </span>
                            </div>
                        </div>
                        <div
                            class="bg-orange-300 rounded-sm p-5  px-10 shadow-sm flex justify-between gap-8 align-middle items-center">
                            <div class="">
                                <div class="border-2 rounded-full bg-white p-2 border-red-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-15 text-red-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                    </svg>

                                </div>
                            </div>
                            <div class="flex flex-col text-right">
                                <span class="font-bold font-muse text-orange-50" style="font-size: 32pt;">
                                    10
                                </span>
                                <span class="text-gray-50 font-semibold font-muse">
                                    Total Barang
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-9 py-3 gap-5">
            <div class="md:col-span-4 lg:col-span-6">
                <div class="card">
                    <div class="card-body">
                        <div class="w-full overflow-x-auto bg-white border rounded-lg">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Supplier</th>
                                        <th>Faktur</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <template x-for="val in data">
                                        <tr>
                                            <td class="text-nowrap" x-text="val.supplier">supplier</td>
                                            <td x-text="val.factur_number">-</td>
                                            <td x-text="val.comment">-</td>
                                            <td class="text-nowrap" x-text="val.tanggal"></td>
                                            <td>
                                                <button x-on:click="getDetailInventory(val)" type="button"
                                                    class="btn btn-circle btn-soft btn-info"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--eye] size-5"></span></button>
                                                {{-- <button class="btn btn-circle btn-soft btn-error"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--arrow-back-up-double] size-5"></span></button>
                                                <button class="btn btn-circle btn-soft btn-secondary"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button> --}}
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>

                        
                    
                    <div class="py-4">
                        <nav class="flex justify-end gap-x-1">
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
                </div>
            </div>
            <div class="md:col-span-2 lg:col-span-3 order-first md:order-last">
                <div class="card card-compact">
                    <div class="card-header">
                        <h5 class="card-title px-4 font-space">Manajemen Inventory</h5>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="p-4 pt-3 flex flex-col gap-5">
                            <div class="relative w-auto">
                                <input x-model="search.estimasi" type="text" class="input max-w-auto" placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                    id="flatpickr-range" />
                            </div>
                            <div class="relative w-auto">
                                <select x-model="search.status" class="select select-floating" aria-label="Select floating label"
                                    id="selectFloating">
                                    <option>Pilih ...</option>
                                    <option value="1">Invoetory Masuk</option>
                                    <option value="0">Invetory Keluar</option>
                                </select>
                                <label class="select-floating-label" for="selectFloating">
                                    Status
                                </label>
                            </div>
                            <div class="relative w-auto">
                                <select x-model="search.range" class="select select-floating" aria-label="Select floating label"
                                    id="selectFloating">
                                    <option value="15">15</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <label class="select-floating-label" for="selectFloating">
                                    Data Range
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="grid grid-cols-2 gap-4 p-4">
                            <button class="btn btn-outline btn-primary w-auto" x-on:click="searchFunc" >Filter</button>
                            <a href="{{ route("inventory.form") }}"
                                class="btn btn-outline btn-error w-auto">Penerimaan
                                Barang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="slide-up-animated-modal" data-overlay="#slide-up-animated-modal"
            id="btn-open-modal-detail">
            Open modal detail
        </button>

        <div id="slide-up-animated-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div
                class="overlay-animation-target modal-dialog overlay-open:mt-4 overlay-open:opacity-100 overlay-open:duration-500 mt-12 transition-all ease-out">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Preview</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#slide-up-animated-modal">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="border rounded-lg p-4 mb-2 px-6">
                            <div class="flex justify-between gap-2 mb-2">
                                <div class="flex flex-col gap-0 text-start">
                                    <span class="text-sm text-gray-400">Supplier</span>
                                    <span x-text="details.supplier"
                                        class="font-semibold text-md text-gray-600">-</span>
                                </div>
                                <div class="flex flex-col gap-0 text-end">
                                    <span class="text-sm text-gray-400">tanggal</span>
                                    <span x-text="details.tanggal"
                                        class="font-semibold text-md text-gray-600">-</span>
                                </div>
                            </div>
                            <div class="flex justify-between gap-2 mb-2">
                                <div class="flex flex-col gap-0 text-start">
                                    <span class="text-sm text-gray-400">Faktur</span>
                                    <span x-text="details.faktur" class="font-semibold text-md text-gray-600">-</span>
                                </div>
                                <div class="flex flex-col gap-0 text-end">
                                    <span class="text-sm text-gray-400">Comment</span>
                                    <span x-text="details.comment"
                                        class="font-semibold text-md text-gray-600">-</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full overflow-x-auto border rounded-lg">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Qty In</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="val in items">
                                        <tr>
                                            <td x-text="val.barang.nama_barang"></td>
                                            <td x-text="val.jumlah"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft btn-secondary"
                            data-overlay="#slide-up-animated-modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push("js")
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            });

            function IndexInventory() {
                return {
                    items: [],
                    details: {
                        supplier: '',
                        faktur: '',
                        tanggal: '',
                        comment: ''
                    },
                    getDetailInventory(key) {
                        this.items = [];

                        axios.get('/inventory/get-detail-inventory', {
                                params: {
                                    key: key.id
                                }
                            })
                            .then((response) => {
                                const data = response.data.data;
                                this.items = data;

                            }).catch((errorResponse) => {
                                console.log(errorResponse);
                            }).finally(() => {
                                this.details = {
                                    supplier: key.supplier,
                                    faktur: key.factur_number,
                                    tanggal: key.tanggal,
                                    comment: key.comment
                                }
                                console.log(this.details);

                                const btnModal = document.getElementById('btn-open-modal-detail');
                                btnModal.click()
                            });
                    },

                    // inventories: [],
                    // async getInventory() {
                    //     const url = '/inventory/get-inventory-data';
                    //     const response = await axios.get(url, {
                    //         params: {
                    //             'key': ''
                    //         }
                    //     });
                    //     this.inventories = response.data.data;
                    // },

                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',

                    search: {
                        range: 15,
                        estimasi: '',
                        status: ''
                    },

                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                range: this.search.range ?? "",
                                estimasi:this.search.estimasi ?? "",
                                status: this.search.status ?? "",
                            });
                            url = `/inventory/get-inventory-data?${params.toString()}`;
                        }

                        axios.get(url)
                            .then(res => {
                                const response = res.data.data;
                                console.log(response.data);
                                
                                this.data = response.data;
                                this.links = this.processPaginationLinks(response.links);
                                this.nextPage = response.next_page_url ? this.addParamsToUrl(response.next_page_url) : null;
                                this.prevPage = response.prev_page_url ? this.addParamsToUrl(response.prev_page_url) : null;
                            })
                            .catch(erres => {
                                console.log(erres);
                            });
                    },
                    processPaginationLinks(links) {
                        return links.map(link => {
                            if (link.url) {
                                return {
                                    ...link,
                                    url: this.addParamsToUrl(link.url)
                                };
                            }
                            return link;
                        });
                    },
                    addParamsToUrl(url) {
                        if (!url) return null;
                        const newUrl = new URL(url);
                        const searchParams = new URLSearchParams(newUrl.search);

                        searchParams.set('status', this.search.status);
                        searchParams.set('range', this.search.range);
                        searchParams.set('estimasi', this.search.estimasi);

                        newUrl.search = searchParams.toString();
                        return newUrl.toString();
                    },
                    nextPageFunc() {
                        if (this.nextPage) {
                            this.getData(this.nextPage);
                        }
                    },
                    prevPageFunc() {
                        if (this.prevPage) {
                            this.getData(this.prevPage);
                        }
                    },
                    searchFunc() {

                        console.log('Search params before send:', this.search);
                        const params = new URLSearchParams({
                            status: this.search.status,
                            range: this.search.range,
                            estimasi: this.search.estimasi
                        });
                        url = `/inventory/get-inventory-data?${params.toString()}`;
                        console.log('Final URL:', url);
                        this.getData(url);
                    },

                    init() {
                        this.getData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
