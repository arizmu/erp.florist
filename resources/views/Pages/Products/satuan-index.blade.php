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

    <div class="grid md:grid-cols-5 lg:grid-cols-8 gap-5" x-data="satuanIndex">
        <div class="md:col-span-3 lg:col-span-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2.5">Satuan Barang</h5>
                    <div class="grid grid-cols-1 lg:grid-cols-9 gap-5 py-4">
                        <div class="md:col-span-2 lg:col-span-3 ">
                            <div class="card">
                                <div class="card-body">
                                    <form @submit.prevent="!isUpdated ? storeSatuan : udpateSatuan">
                                        <div class="flex flex-col gap-4">
                                            <div class="relative w-auto">
                                                <input x-model="xform.satuan" type="text" placeholder="satuan..."
                                                    required class="input input-floating peer" id="" />
                                                <label class="input-floating-label" for="">Satuan</label>
                                            </div>
                                            <div class="relative w-auto">
                                                <textarea x-model="xform.comment" class="textarea textarea-floating peer" placeholder="comment..." id=""></textarea>
                                                <label class="textarea-floating-label" for="">
                                                    Comment
                                                </label>
                                            </div>
                                            <div class="flex justify-between gap-2">
                                                <button type="reset"
                                                    class="btn btn-outline btn-warning">Reset</button>
                                                <button :disabled="isSubmitting" type="submit"
                                                    class="btn btn-outline btn-primary"
                                                    x-text="isSubmitting ? 'Load...':'Submit'">
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
                                            <th>Satuan</th>
                                            <th>Comment</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in datas">
                                            <tr>
                                                <td x-text="item.nama_satuan"></td>
                                                <td x-text="item.comment"></td>
                                                <td>
                                                    <button x-on:click="satuanDelete(item.id)" type="button" class="btn btn-sm btn-circle btn-soft btn-error">
                                                        <span class="icon-[oui--trash]"
                                                            style="width: 16px; height: 16px;"></span>
                                                    </button>
                                                    <button x-on:click="getSatuan(item)" type="button" class="btn btn-sm btn-circle btn-soft btn-info">
                                                        <span class="icon-[hugeicons--pencil-edit-02] size-4"></span>
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
        <div class="md:col-span-2 lg:col-span-2 order-first md:order-last">
            <x-panel.panel-product />
        </div>
    </div>

    @push('js')
        <script>
            function satuanIndex() {
                return {
                    datas: [],
                    xform: {
                        id: '',
                        satuan: '',
                        comment: ''
                    },
                    isSubmitting: false,
                    isUpdated: false,
                    
                    async satuanDelete(key) {
                        const url = `/master-barang/satuan-delete/${key}`;
                        const response = await axios.post(url);
                        const res = response.data;
                        this.init()
                    },

                    getSatuan(index) {
                        this.isUpdated = true;
                        this.xform = {
                            id: index.id,
                            satuan: index.nama_satuan,
                            comment: index.comment
                        }
                    },

                    async udpateSatuan() {
                        this.isSubmitting = true;
                        const url = `/master-barang/satuan-update/${this.xform.id}`;
                        const response = await axios.post(url, this.xform);
                        const res = response.data;
                        this.getData()
                        this.isSubmitting = false;
                        this.isUpdated = false;
                        this.init();
                    },

                    async storeSatuan() {
                        this.isSubmitting = true;
                        const url = `/master-barang/satuan-store`;
                        const response = await axios.post(url, this.xform);
                        const res = response.data;
                        this.init()
                    },
                    async getData() {
                        const url = `/master-barang/satuan-get-json`;
                        const response = await axios.get(url);
                        const data = response.data.data.data;
                        this.datas = data;
                    },
                    reseFrom() {
                        this.xform = {
                            id: '',
                            satuan: '',
                            comment: ''
                        }
                    },
                    init() {
                        this.getData()
                        this.isSubmitting = false;
                        this.isUpdated = false;
                        this.reseFrom();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
