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
                Jasa produksi
            </li>
        </ol>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-9 py-3 gap-5" x-data="helloCrafter">
        <div class="md:col-span-4 lg:col-span-6">
            <div class="card">
                <div class="card-body">
                    <div class="w-full overflow-x-auto bg-white border rounded-lg">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Transaction Code</th>
                                    <th>Transaction Date</th>
                                    <th>Qty</th>
                                    <th>Total Payment</th>
                                    <th>Paid</th>
                                    <th>Unpaid</th>
                                    <th>Costumer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(item, index) in data" :key="index">
                                    <tr>
                                        <td x-text="item.code"></td>
                                        <td x-text="item.transaction_date"></td>
                                        <td x-text="item.details.length"></td>
                                        <td x-text="formatRupiah(item.total_payment)"></td>
                                        <td x-text="formatRupiah(item.total_paid)"></td>
                                        <td x-text="formatRupiah(item.total_unpaid)"></td>
                                        <td x-text="item.costumer ? item.costumer.name : '-'"></td>
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
                    <h5 class="px-4 font-muse text-lg flex gap-2 items-center">
                        <span class="icon-[stash--filter] size-7"></span>
                        Filter Laporan
                    </h5>
                </div>
                <hr>
                <div class="card-body">
                    <div class="p-4 pt-3 flex flex-col gap-5">
                        <div class="relative w-auto">
                            <input type="text" placeholder="" class="input input-floating peer"
                                x-model="search.estimasi" id="flatpickr-range" />

                            <label class="input-floating-label" for="floatingInput">
                                Periode
                            </label>
                        </div>
                        <div class="relative w-auto">
                            <select class="select select-floating" aria-label="Select floating label"
                                id="selectFloating" x-model="search.range">
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
                <div class="card-footer border-t py-2">
                    <div class="p-4">
                        <button class="btn btn-outline btn-primary " @click="searchFunc">
                            <span class="icon-[stash--filter] size-5"></span>
                            Filter
                        </button>
                        <button class="btn btn-outline btn-error ml-2" @click="exportPDF">
                            <span class="icon-[foundation--page-export-pdf]"></span>
                            PDF Export
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            function helloCrafter() {
                return {
                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',

                    search: {
                        crafter: '',
                        range: 15,
                        estimasi: ''
                    },

                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                range: this.search.range ?? "",
                                estimasi: this.search.estimasi ?? ""
                            });
                            url = `/laporan/json-data?${params.toString()}`;
                        }
                        // notifier.info("loading data...");
                        axios.get(url)
                            .then(res => {
                                const response = res.data.data;
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
                            range: this.search.range,
                            estimasi: this.search.estimasi
                        });
                        url = `/laporan/json-data?${params.toString()}`;
                        this.getData(url);
                    },

                    crafters: '',
                    getCrafter() {
                        axios.get('/transaksi/get-crafter')
                            .then(res => {
                                const crafters = res.data;
                                this.crafters = crafters.data;
                            })
                            .catch(err => {
                                console.log(err);
                            });
                    },

                    exportPDF() {
                        if (this.search.estimasi === '') {
                            alert('Harap pilih periode terlebih dahulu!');
                            return;
                        }
                        window.open(
                            `/laporan/penjualan/export-pdf?crafter=${this.search.crafter}&estimasi=${this.search.estimasi}`,
                            '_blank', 'width=800, height=800');
                    },

                    init() {
                        this.getCrafter()
                        this.getData()
                    }
                }
            }
        </script>
        <script>
            window.addEventListener('load', function() {
                // Range Date Picker
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            })
        </script>
    @endpush
</x-base-layout>
