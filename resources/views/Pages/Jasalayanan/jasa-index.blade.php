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
                                    <th>Crafter</th>
                                    <th>Kode Bucket</th>
                                    <th>Tgl Produksi</th>
                                    <th>Biaya Produksi</th>
                                    <th>Status</th>
                                    <th>Jasa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(item, index) in data" :key="index">
                                    <tr>
                                        <td x-text="item.crafter.pegawai_name"></td>
                                        <td x-text="item.code_production"></td>
                                        <td x-text="item.production_date"></td>
                                        <td x-text="formatRupiah(item.price_for_sale)"></td>
                                        <td>
                                            <span class="badge badge-soft badge-success rounded-full" x-show="item.production_status">Done</span>
                                            <span class="badge badge-soft badge-error rounded-full" x-show="!item.production_status">Undone</span>
                                        </td>
                                        <td>
                                            Rp.
                                            <span x-text="formatRupiah(item.nilai_jasa_crafter)"></span>
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
                    <h5 class="card-title px-4 font-muse">Crafters</h5>
                </div>
                <hr>
                <div class="card-body">
                    <div class="p-4 pt-3 flex flex-col gap-5">
                        <div class="relative w-auto">
                            <input type="text" placeholder="" class="input input-floating peer" x-model="search.estimasi"
                                id="flatpickr-range" />

                            <label class="input-floating-label" for="floatingInput">
                                Periode
                            </label>
                        </div>
                        <div class="relative w-auto">
                            <select class="select select-floating" aria-label="Select floating label"
                                id="selectFloating" x-model="search.crafter">
                            </select>
                            <label class="select-floating-label" for="selectFloating">
                                Crafter
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
                <div class="card-footer text-center border-t py-2">
                    <div class="p-4">
                        <button class="btn btn-outline btn-primary w-full" @click="searchFunc">Filter</button>
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
                                crafter: this.search.crafter ?? "",
                                range: this.search.range ?? "",
                                estimasi:this.search.estimasi ?? ""
                            });
                            url = `/ref-jasa/jasa-crafter?${params.toString()}`;
                        }

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
                        searchParams.set('crafter', this.search.crafter);
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
                            crafter: this.search.crafter,
                            range: this.search.range,
                            estimasi: this.search.estimasi
                        });
                        url = `/ref-jasa/jasa-crafter?${params.toString()}`;
                        console.log('Final URL:', url);
                        this.getData(url);
                    },

                    init() {
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
