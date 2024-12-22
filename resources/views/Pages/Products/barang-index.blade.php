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

    <div class="grid md:grid-cols-5 lg:grid-cols-8 gap-5" x-data="IndexBarang">
        <div class="md:col-span-3 lg:col-span-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2.5">Master Barang</h5>
                    <div class="grid grid-cols-1 lg:grid-cols-9 gap-5 py-4">
                        <div class="md:col-span-2 lg:col-span-3 ">
                            <div class="card">
                                <div class="card-body">
                                    <form @submit.prevent="storeCategory">
                                        <div class="flex flex-col gap-4">
                                            <div class="relative w-auto">
                                                <input x-model="sForm.nama_barang" type="text" placeholder=""
                                                    class="input input-floating peer" id="" />
                                                <label class="input-floating-label" for="">Category
                                                    Name</label>
                                            </div>
                                            <div class="relative w-auto">
                                                <select x-model="sForm.category_id" class="select select-floating"
                                                    aria-label="Select floating label" id="">
                                                    <option>Pilih ...</option>
                                                    <template x-for="value in category">
                                                        <option :value="value.id" x-text="value.category_name">
                                                        </option>
                                                    </template>
                                                </select>
                                                <label class="select-floating-label text-blue-500"
                                                    for="">Kategori</label>
                                            </div>
                                            <div class="relative w-auto">
                                                <select x-model="sForm.satuan_id" class="select select-floating"
                                                    aria-label="Select floating label" id="">
                                                    <option>Pilih ...</option>
                                                </select>
                                                <label class="select-floating-label text-blue-500"
                                                    for="">Satuan</label>
                                            </div>
                                            <div class="relative w-auto">
                                                <textarea x-model="sForm.comment" class="textarea textarea-floating peer" placeholder="Hello!!!" id=""></textarea>
                                                <label class="textarea-floating-label" for="">Comment</label>
                                            </div>
                                            <div class="flex justify-between">

                                                <button type="reset"
                                                    class="btn btn-outline btn-warning w-auto btn-soft">
                                                    Reset
                                                </button>
                                                <button type="submit"
                                                    class="btn btn-outline btn-primary w-auto btn-soft">
                                                    Save
                                                </button>
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
                                            <th>Kategori</th>
                                            <th>stock</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="barang in dataBarang" :key="barang.id">
                                            <tr class="hover:bg-slate-100">
                                                <td class="text-nowrap" x-text="barang.nama_barang"></td>
                                                <td x-text="barang.category_barang_id">johndoe@example.com</td>
                                                <td>
                                                    <template x-if="barang.stock > 0">
                                                        <span class="badge badge-soft badge-success text-xs"
                                                            x-text="barang.stock">Ready
                                                        </span>
                                                    </template>

                                                    <template x-if="barang.stock < 1">
                                                        <span class="badge badge-soft badge-error text-xs"
                                                            x-text="barang.stock">
                                                            hello
                                                        </span>
                                                    </template>
                                                </td>
                                                <td class="text-nowrap" x-text="formatTanggal(barang.updated_at)">
                                                </td>
                                                <td>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button"><span
                                                            class="icon-[tabler--pencil] size-5"></span></button>
                                                    <button x-on:click="deleteBarang(barang.id)" type="button"
                                                        class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button"><span
                                                            class="icon-[tabler--trash] size-5"></span></button>
                                                    <button class="btn btn-circle btn-text btn-sm"
                                                        aria-label="Action button"><span
                                                            class="icon-[tabler--dots-vertical] size-5"></span></button>
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
    @push("js")
        <script>
            function IndexBarang() {
                return {
                    deleteBarang(key) {
                        let url = `/master-barang/barang-destroy/${key}`;
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!"
                        }).then(async (result) => {
                            if (result.isConfirmed) {
                                try {
                                    const response = await fetch(url);
                                    const res = await response.json();
                                    this.loadBarang();
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } catch (error) {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Your file has been deleted.",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    },

                    dataBarang: [],
                    async loadBarang() {
                        try {
                            const response = await axios.get('/master-barang/barang-json');
                            this.dataBarang = response.data.data.data;
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    sForm: {
                        nama_barang: '',
                        category_id: '',
                        satuan_id: '',
                        commnet: '',
                    },
                    async storeCategory() {
                        const postData = await axios.post('/master-barang/barang-store', this.sForm, {
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then((response) => {
                            console.log(response);
                            this.sForm = {
                                nama_barang: '',
                                category_id: '',
                                satuan_id: '',
                                commnet: '',
                            }
                        }).catch((errors) => {
                            console.log(errors);
                        })
                        this.loadBarang();
                    },

                    category: [],
                    getCagetory() {
                        axios.get("/master-barang/category-json")
                            .then((response) => {
                                console.log(response.data.data.data);
                                this.category = response.data.data.data;
                            })
                            .catch((error) => {
                                console.log(error);
                            })
                    },

                    init() {
                        this.getCagetory()
                        this.loadBarang()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
