<x-base-layout>
    <div class="breadcrumbs mt-2">
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
                Referensi jasa
            </li>
        </ol>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-7 lg:grid-cols-9 py-4 gap-8" x-data="referensiIndex()">
        <div class="md:col-span-4 lg:col-span-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div for="filter" class="border p-4 rounded-md flex justify-between flex-wrap gap-4">
                        <input type="text" class="input input-lg max-w-4xl" x-model="search.keyword" @keyup.enter="searchFunc">
                        <button class="btn btn-lg btn-soft btn-primary px-6" @click="searchFunc">
                            <span class="icon-[teenyicons--search-circle-outline]"></span>
                            Filter
                        </button>
                    </div>

                    <div class="border-base-content/25 w-full rounded-lg border mt-6">
                        <div class="overflow-x-auto">
                            <table class="table rounded-sm">
                                <thead>
                                    <tr class="bg-green-200 dark:bg-black dark:text-white">
                                        <th>Nama Referensi</th>
                                        <th>Nilai Min</th>
                                        <th>Nilai Max</th>
                                        <th>Nilai jasa</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="item in data">
                                        <tr>
                                            <td x-text="item.title"></td>
                                            <td x-text="item.min_cost"></td>
                                            <td x-text="item.max_cost"></td>
                                            <td x-text="item.salary"></td>
                                            <td>
                                                <button x-on:click="getEdit(item)"
                                                    class="btn btn-soft btn-warning btn-circle">
                                                    <span class="icon-[material-symbols--edit-square-outline]"
                                                        style="width: 24px; height: 24px;"></span>
                                                </button>
                                                <button x-on:click="hapus(item.id)">
                                                    <span class="icon-[tabler--trash-x]"
                                                        style="width: 24px; height: 24px;"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="py-4">
                        <nav class="flex justify-end gap-x-1">
                            <button type="button" class="btn btn-secondary btn-outline min-w-28" @click="prevPageFunc"
                                :disabled="!prevPage">
                                <span class="icon-[heroicons-outline--arrow-circle-left] size-5"></span>
                                Previous
                            </button>
                            <div class="flex items-center gap-x-1">

                                {{-- <button type="button"
                                    class="btn btn-outline btn-square aria-[current='page']:text-border-primary aria-[current='page']:bg-primary/10">1</button>
                                <button type="button"
                                    class="btn btn-outline btn-square aria-[current='page']:text-border-primary aria-[current='page']:bg-primary/10"
                                    aria-current="page">2</button>
                                <button type="button"
                                    class="btn btn-outline btn-square aria-[current='page']:text-border-primary aria-[current='page']:bg-primary/10">3</button> --}}

                            </div>
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
        <div class="md:col-span-3 lg:col-span-3 order-first md:order-last">
            <div class="card shadow-lg">
                <form @submit.prevent="isUpdated ? update : store">
                    <div class="card-header border-b flex gap-4 items-center">
                        <span class="icon-[oui--index-edit] size-6"></span>
                        <h4 class="text-xl font-semibold font-space" x-text="isUpdated ? 'Update Form':'Form Input'">
                            Form Input</h4>
                    </div>
                    <div class="card-body">
                        <div class="py-4 grid grid-cols-1 gap-2">
                            <div class="flex flex-col gap-2">
                                <label for="">Nama Referensi</label>
                                <input x-model="xform.referensi" type="text" class="input">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-col gap-2">
                                        <label for="">Nilai Min</label>
                                        <input x-model="xform.nilai_min" type="text" class="input">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-col gap-2">
                                        <label for="">Nilai Max</label>
                                        <input x-model="xform.nilai_max" type="text" class="input">
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="">Salary</label>
                                <input x-model="xform.salary" type="text" class="input">
                            </div>
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-col gap-2">
                                    <label for="">Comment</label>
                                    <textarea x-model="xform.comment" class="textarea" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="flex justify-between">
                            <button x-on:click="resetForm" type="button"
                                class="btn btn-warning btn-soft rounded-full px-8 flex gap-4">
                                <span class="icon-[ix--reset]" style="width: 16px; height: 16px;"></span>
                                Reset
                            </button>
                            <button type="submit" class="btn btn-primary btn-soft rounded-full px-8 flex gap-4"
                                :disabled="isSubmit">
                                <span class="icon-[ant-design--save-outlined] "></span>
                                <span x-text="isSubmit ? 'Load...':'Submit'">Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            function referensiIndex() {
                return {
                    xdataTable: [],
                    xform: {
                        id: '',
                        referensi: '',
                        nilai_min: '',
                        nilai_max: '',
                        salary: '',
                        comment: ''
                    },
                    isSubmit: false,
                    isUpdated: false,
                    async store() {
                        this.isSubmit = true;
                        const url = `/ref-jasa/store-data`;
                        const response = await axios.post(url, this.xform);
                        this.getData();
                        this.resetForm();
                    },
                    getEdit(index) {
                        this.isUpdated = true;
                        this.xform = {
                            id: index.id,
                            referensi: index.title,
                            nilai_min: index.min_cost,
                            nilai_max: index.max_cost,
                            salary: index.salary,
                            comment: ''
                        }
                    },
                    async update() {
                        this.isSubmit = true;
                        const formData = this.xform;
                        const url = `/ref-jasa/update-data/${formData.id}`;
                        const response = await axios.post(url, formData);
                        this.isUpdated = false;
                        this.getData();
                        this.resetForm();
                    },
                    async hapus(key) {
                        const url = `/ref-jasa/delete-data/${key}`;
                        const response = await axios.post(url);
                        this.getData();
                    },

                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',
                    search: {
                        keyword: ''
                    },
                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                keywords: this.search.keyword ?? "",
                            });
                            url = `/ref-jasa/get-data-json?${params.toString()}`;
                        }

                        axios.get(url)
                            .then(res => {
                                // this.data = [];
                                const response = res.data.data;
                                this.data = response.data;
                                // Update link pagination dengan parameter pencarian terkini
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
                        searchParams.set('keywords', this.search.keyword);

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
                        const params = new URLSearchParams({
                            keywords: this.search.keyword
                        });
                        url = `/ref-jasa/get-data-json?${params.toString()}`;
                        this.getData(url);
                    },
                    resetForm() {
                        this.xform = {
                            id: '',
                            referensi: '',
                            nilai_min: '',
                            nilai_max: '',
                            salary: '',
                            comment: ''
                        }

                        this.isUpdated = false;
                        this.isSubmit = false;
                    },
                    init() {
                        this.getData();
                        this.resetForm();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
