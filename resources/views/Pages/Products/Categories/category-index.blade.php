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
                Kategory Barang
            </li>
        </ol>
    </div>

    <div class="grid md:grid-cols-5 lg:grid-cols-8 gap-5" x-data="KategoriBarang">
        <div class="md:col-span-3 lg:col-span-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2.5">Category Product</h5>
                    <div class="grid grid-cols-1 lg:grid-cols-9 gap-5 py-4">
                        <div class="md:col-span-2 lg:col-span-3 ">
                            <div class="card">
                                <div class="card-header flex justify-start gap-4">
                                    <span class="icon-[tabler--align-box-top-right]"
                                        style="width: 24px; height: 24px;"></span>
                                    <span x-text="isUpdated ? 'Form Updated':'Form Input'"
                                        class="text-lg font-semibold"></span>
                                </div>
                                <div class="card-body">
                                    <form @submit.prevent="isUpdated ? updateCategory:categoryStore">
                                        <div class="flex flex-col gap-4">
                                            <div class="relative w-auto">
                                                <input type="text" placeholder="John Doe"
                                                    class="input input-floating peer" id=""
                                                    x-model="xform.category" required />
                                                <label class="input-floating-label" for="floatingInput">Category</label>
                                            </div>
                                            <div class="relative w-auto">
                                                <textarea class="textarea textarea-floating peer" placeholder="Hello!!!" id="" x-model="xform.comment"></textarea>
                                                <label class="textarea-floating-label" for="textareaFloating">
                                                    Comment
                                                </label>
                                            </div>
                                            <div class="flex justify-start flex-wrap gap-2 w-full">
                                                <button type="submit" :disabled="isSubmitting"
                                                    class="btn btn-primary rounded-full px-5 btn-soft">
                                                    <span class="icon-[proicons--save] size-6"></span></span>
                                                    <span
                                                        x-text="isSubmitting ? 'Loading...'
                                                    :'Simpan'">Simpan</span>
                                                </button>
                                                <button type="button" @click="resetForm"
                                                    class="btn rounded-full px-5 btn-warning btn-soft">
                                                    <span class="icon-[fluent--arrow-reset-20-filled] size-6"></span>
                                                    <span>Reset</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="lg:col-span-6">
                            <div class="border rounded-lg mb-5 p-4">
                                <div class="flex flex-start flex-wrap gap-4">
                                    <select x-model="range" class="select max-w-20 appearance-none rounded-full" aria-label="select">
                                        <option value="15">15</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <input type="text" class="input rounded-full max-w-72" x-model="search">
                                    <button x-on:click="searchAct" type="button"
                                        class="btn btn-soft btn-primary btn-circle">
                                        <span class="icon-[mingcute--search-ai-line] size-5"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="w-full overflow-x-auto border rounded-lg">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Comment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="value in datatable">
                                            <tr>
                                                <td class="text-nowrap" x-text="value.category_name">category name</td>
                                                <td x-text="value.comment">comment...</td>
                                                <td>
                                                    <button type="button" @click="getEdit(value)"
                                                        class="btn btn-circle btn-warning btn-sm btn-soft"
                                                        aria-label="Action button"><span
                                                            class="icon-[mdi--circle-edit-outline] size-5"></span>
                                                    </button>
                                                    <button x-on:click="deleteCategory(value.id)"
                                                        class="btn btn-circle btn-error btn-sm btn-soft"
                                                        aria-label="Action button"><span
                                                            class="icon-[tabler--trash] size-5"></span>
                                                    </button>

                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <nav class="flex justify-between items-center gap-x-1 mt-4">
                                    <button type="button" class="btn btn-soft rounded-full">Previous</button>

                                    <button type="button" class="btn btn-soft rounded-full">Next</button>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-2 lg:col-span-2 order-first md:order-last">
            <x-panel.panel-product />
        </div>
    </div>
    @push('js')
        <script>
            function KategoriBarang() {
                return {
                    datatable: [],
                    xform: {
                        code: '',
                        category: '',
                        comment: ''
                    },
                    range: 15,
                    isSubmitting: false,
                    isUpdated: false,
                    search: '',
                    async searchAct() {
                        try {
                            const url = `/master-barang/category-json?search=${this.search}&range=${this.range}`;
                            const response = await axios.get(url);
                            const data = response.data.data.data;
                            this.datatable = data;
                        } catch (error) {
                            console.error("Error fetching data:", error);
                        }
                    },

                    async updateCategory() {
                        this.isSubmitting = true;
                        try {
                            const url = `/master-barang/category-updated/${this.xform.code}`;
                            const response = await axios.post(url, this.xform);
                            this.getData();
                            this.resetForm();
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    getEdit(item) {
                        this.isUpdated = true;
                        this.xform.code = item.id;
                        this.xform.category = item.category_name;
                        this.xform.comment = item.comment;
                        console.log(this.xform);
                    },

                    async categoryStore() {
                        this.isSubmitting = true;
                        var token = document.querySelector('meta[name="csrf-token"]').content;
                        const FormData = {
                            method: 'post',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token
                            },
                            body: JSON.stringify(this.xform)
                        }
                        const store = await fetch("/master-barang/category-store", FormData);
                        const response = await store.json();
                        const option = {};
                        option.icons = {
                            prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15">`,
                            success: `<path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />`,
                            suffix: `</svg>`,
                        }
                        notifier.success('created is susscess', option);
                        this.getData();
                        this.xform = {
                            code: '',
                            category: '',
                            comment: ''
                        }
                        setTimeout(() => {
                            this.isSubmitting = false;
                        }, 3000);
                    },

                    async getData() {
                        const response = await fetch("/master-barang/category-json");
                        const data = await response.json();
                        const arrayData = data.data;
                        const table = arrayData.data;
                        this.datatable = table;
                    },

                    deleteCategory(key) {
                        const keyid = key;

                        let onOk = async () => {
                            let url = `/master-barang/delete-category/${keyid}`;
                            const response = await fetch(url);
                            const res = await response.json();
                            console.log(res);
                            this.getData()
                            notifier.success('You pressed is success')
                        };
                        let onCancel = () => {
                            notifier.info('You pressed Cancel')
                        };
                        notifier.confirm(
                            'Are you sure?',
                            onOk,
                            onCancel, {
                                labels: {
                                    confirm: 'Dangerous action'
                                }
                            }
                        )
                    },

                    resetForm() {
                        this.xform = {
                            code: '',
                            category: '',
                            comment: ''
                        }
                        this.isUpdated = false;
                        this.isSubmitting = false;
                    },

                    init() {
                        this.getData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
