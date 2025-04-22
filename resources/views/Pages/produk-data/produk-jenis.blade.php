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
                Barang
            </li>
        </ol>
    </div>


    <div class="" x-data="jenisProduct">
        <div class="bg-linear-to-r from-blue-700 to-blue-300 w-full h-60 rounded-lg">
            <img src="https://readymadeui.com/cardImg.webp" alt="Banner Image"
                class="rounded-lg w-full rondu h-full object-cover" />
        </div>

        <div class="-mt-28 mb-6 px-4">
            <div class="mx-auto max-w-7xl shadow-lg p-8 relative bg-white rounded-md">
                <h5 class="card-title mb-2.5">Jenis Product</h5>
                <div class="grid grid-cols-1 lg:grid-cols-9 gap-5 py-4">
                    <div class="md:col-span-2 lg:col-span-3 ">
                        <div class="card">
                            <div class="card-body">
                                <form @submit.prevent="submitAction">
                                    <div class="flex flex-col gap-4">
                                        <div class="relative w-auto">
                                            <input type="text" placeholder="John Doe"
                                                class="input input-floating peer" id=""
                                                x-model="xform.jenis" required />
                                            <label class="input-floating-label" for="floatingInput">Category</label>
                                        </div>
                                        <div class="relative w-auto">
                                            <textarea class="textarea textarea-floating peer" placeholder="Hello!!!" id="" x-model="xform.comment"></textarea>
                                            <label class="textarea-floating-label" for="textareaFloating">
                                                Comment
                                            </label>
                                        </div>
                                        <div class="flex justify-start flex-warp gap-2 w-full">
                                            <button type="reset" class="btn btn-warning btn-soft">Reset</button>
                                            <button type="submit" :disabled="isSubmitting"
                                                class="btn btn-primary btn-soft"
                                                x-text="isSubmitting ? 'Loading...'
                                                    :'Simpan'">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="lg:col-span-6">
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
                                    <template x-for="val in dataTable ? dataTable : []">
                                        <tr>
                                            <td class="text-nowrap" x-text="val.jenis">category name</td>
                                            <td x-text="val.comment">comment...</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span>
                                                </button>
                                                <button x-on:click="deleteAction(val.id)"
                                                    class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span>
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
    </div>

    @push("js")
        <script>
            function jenisProduct() {
                return {
                    dataTable:[],
                    xform : {
                        jenis:'',
                        commnet:''
                    },
                    isSubmitting:false,
                    submitAction() {
                        this.isSubmitting = true;
                        const url = "/jenis-product/store-data";
                        axios.post(url, this.xform)
                        .then(res => {
                            // console.log(res);
                            this.loadData()
                        }).catch(err => {
                            console.log(err);
                        }).finally(() => {
                            this.loadData();
                            this.xform.jenis = '';
                            this.xform.comment = '';
                            this.isSubmitting = false;
                        })
                    },
                    deleteAction(key) {

                        const url = `/jenis-product/delete-data/${key}`;
                        axios.get(url).then(res => {
                            // console.log(res)
                        }).catch(res => {
                            console.log(res)
                        }).finally(() => {
                            this.loadData()
                        })
                    },
                    loadData() {
                        const url = "/jenis-product/load-json-data";
                        axios.get(url).then(res => {
                            const data = res.data.data.data;
                            this.dataTable = data;
                            console.log(data)
                        }).catch(err => {
                            console.log(err);
                        })
                    },
                    init() {
                        this.loadData()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
