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
                    <div for="filter"
                        class="flex justify-start md:justify-end flex-wrap gap-4 items-center align-middle">
                        <input type="text" class="input max-w-96 rounded-full" x-model="xsearch"
                            placeholder="ketik untuk mencari ..." @keyup.enter="getData">
                        <button class="btn btn-circle btn-soft btn-info" type="button" @click="getData">
                            <span class="icon-[tabler--user-search]" style="width: 24px; height: 24px;"></span>
                        </button>
                    </div>

                    <div class="border-base-content/25 w-full rounded-lg border mt-6">
                        <div class="overflow-x-auto">
                            <table class="table rounded">
                                <thead>
                                    <tr class="bg-green-200 dark:bg-black dark:text-white">
                                        <th>Costumer</th>
                                        <th>Alamat</th>
                                        <th>Telpon</th>
                                        <th>Point Member</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="item in xdataTable">
                                        <tr>
                                            <td x-text="item.name"></td>
                                            <td x-text="item.alamat"></td>
                                            <td x-text="item.no_telp"></td>
                                            <td> Rp. <span x-text="formatRupiah(item.point_member)"></span></td>
                                            <td>
                                                <button x-on:click="getEdit(item)"
                                                    class="btn btn-soft btn-warning btn-circle btn-sm">
                                                    <span class="icon-[material-symbols--edit-square-outline]"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <nav class="flex items-center gap-x-1 mt-4">
                        <button type="button" class="btn btn-soft">Previous</button>
                        <div class="flex items-center gap-x-1">
                            <button type="button"
                                class="btn btn-soft btn-square aria-[current='page']:text-bg-soft-primary">1</button>
                            <button type="button"
                                class="btn btn-soft btn-square aria-[current='page']:text-bg-soft-primary"
                                aria-current="page">2</button>
                            <button type="button"
                                class="btn btn-soft btn-square aria-[current='page']:text-bg-soft-primary">3</button>
                        </div>
                        <button type="button" class="btn btn-soft">Next</button>
                    </nav>

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
                        <div class="py-4 grid grid-cols-1 gap-2 font-space">
                            <div class="flex flex-col gap-2">
                                <label for="">Costumer</label>
                                <input type="text" class="input">
                            </div>
                            <div class="flex  gap-2 py-1">
                                <div class="flex items-center gap-1">
                                    <input type="radio" name="radio-4"
                                        class="radio checked:border-yellow-500 checked:bg-yellow-500"
                                        id="radioCustomColor1" />
                                    <label class="label label-text text-base" for="radioCustomColor1"> Laki-laki
                                    </label>
                                </div>
                                <div class="flex items-center gap-1">
                                    <input type="radio" name="radio-4"
                                        class="radio checked:border-purple-500 checked:bg-purple-500"
                                        id="radioCustomColor2" checked />
                                    <label class="label label-text text-base" for="radioCustomColor2"> Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-col gap-2">
                                    <label for="">Address</label>
                                    <textarea class="textarea" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="">Telpon</label>
                                <input type="text" class="input">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="">Email</label>
                                <input type="text" class="input">
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
                    xsearch: '',
                    xdataTable: [],
                    xform: {
                        id: '',
                        costumer: '',
                        gender: '',
                        address: '',
                        telpon: '',
                        email: '',
                        point: ''
                    },
                    isSubmit: false,
                    isUpdated: false,
                    async store() {
                        this.isSubmit = true;

                    },
                    getEdit(index) {
                        this.isUpdated = true;

                    },
                    async update() {
                        this.isSubmit = true;

                    },
                    async hapus(key) {

                    },
                    async getData() {
                        try {
                            console.log(this.xsearch);

                            const url = '/costumer/data-json?key=' + this.xsearch;
                            const response = await axios.get(url);
                            const data = response.data.data;
                            this.xdataTable = data.data;
                        } catch (error) {
                            console.log(error);
                        }
                    },
                    resetForm() {

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
