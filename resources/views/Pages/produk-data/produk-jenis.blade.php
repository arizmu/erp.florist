<x-base-layout>
    <div class="mb-6">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs text-sm">
            <ol>
                <li>
                    <a href="#" class="flex items-center gap-2 hover:text-primary transition-colors">
                        <span class="icon-[tabler--home] size-5"></span>
                        Home
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li>
                    <a href="#" aria-label="Produk" class="hover:text-primary transition-colors">
                        <span class="icon-[tabler--package]"></span>
                        Produk
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li aria-current="page" class="font-medium text-primary">
                    <span class="icon-[tabler--tag] me-1 size-5"></span>
                    Jenis Barang
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl p-2.5 shadow-lg shadow-purple-500/30">
                        <span class="icon-[tabler--tag] size-7 text-white"></span>
                    </span>
                    Jenis Barang
                </h1>
                <p class="text-gray-500 mt-2 ml-1">Manage product categories</p>
            </div>
        </div>
    </div>

    <div x-data="jenisProduct">
        <!-- Banner Image -->
        <div class="relative h-64 mb-6 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600">
                <img src="https://readymadeui.com/cardImg.webp" alt="Banner Image"
                    class="w-full h-full object-cover opacity-30" />
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-2">Jenis Barang</h2>
                    <p class="text-white/80 text-lg">Product Categories</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-lg border-0 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3">
                <!-- Form Section -->
                <div class="lg:col-span-1 p-6 border-r border-gray-200 bg-gray-50">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="icon-[tabler--edit-circle] size-6 text-purple-600"></span>
                        <h3 class="text-xl font-bold text-gray-800">Tambah Jenis</h3>
                    </div>

                    <div class="card shadow-md border-0">
                        <div class="card-body p-6">
                            <form @submit.prevent="submitAction">
                                <div class="flex flex-col gap-4">
                                    <!-- Category Name -->
                                    <div class="relative">
                                        <label class="label label-text font-medium mb-1">Category Name</label>
                                        <div class="relative flex items-center">
                                            <span class="absolute left-3 text-gray-400 pointer-events-none">
                                                <span class="icon-[tabler--tag] size-4"></span>
                                            </span>
                                            <input 
                                                type="text" 
                                                placeholder="Enter category name..."
                                                class="input input-bordered pl-10 w-full peer"
                                                id=""
                                                x-model="xform.jenis" 
                                                required />
                                        </div>
                                    </div>

                                    <!-- Comment -->
                                    <div class="relative">
                                        <label class="label label-text font-medium mb-1">Comment</label>
                                        <div class="relative flex items-start">
                                            <span class="absolute left-3 top-3 text-gray-400 pointer-events-none">
                                                <span class="icon-[tabler--message] size-4"></span>
                                            </span>
                                            <textarea 
                                                class="textarea textarea-bordered pl-10 w-full peer"
                                                placeholder="Enter description..." 
                                                id="" 
                                                x-model="xform.comment"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="flex gap-3 mt-2">
                                    <button 
                                        type="reset" 
                                        class="btn btn-soft btn-warning gap-2 flex-1">
                                        <span class="icon-[tabler--refresh] size-5"></span>
                                        Reset
                                    </button>
                                    <button 
                                        type="submit" 
                                        :disabled="isSubmitting"
                                        class="btn btn-primary gap-2 flex-1 shadow-lg shadow-primary/30"
                                        :class="{'opacity-50 cursor-not-allowed': isSubmitting}">
                                        <span class="icon-[tabler--device-floppy] size-5"></span>
                                        <span x-text="isSubmitting ? 'Loading...' : 'Simpan'"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="lg:col-span-2 p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="icon-[tabler--list] size-6 text-purple-600"></span>
                        <h3 class="text-xl font-bold text-gray-800">Daftar Jenis</h3>
                    </div>

                    <div class="card shadow-md border-0">
                        <div class="card-body p-0">
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="font-semibold text-gray-600">Name</th>
                                            <th class="font-semibold text-gray-600">Comment</th>
                                            <th class="font-semibold text-gray-600 text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="val in dataTable ? dataTable : []">
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="text-gray-800 font-medium">
                                                    <span x-text="val.jenis"></span>
                                                </td>
                                                <td class="text-gray-600 max-w-xs">
                                                    <span x-text="val.comment" class="truncate block"></span>
                                                </td>
                                                <td>
                                                    <div class="flex gap-2 justify-end">
                                                        <button 
                                                            class="btn btn-circle btn-sm btn-soft btn-secondary hover:scale-110 transition-transform"
                                                            type="button"
                                                            aria-label="Edit"
                                                            title="Edit">
                                                            <span class="icon-[tabler--pencil] size-4"></span>
                                                        </button>
                                                        <button 
                                                            x-on:click="deleteAction(val.id)"
                                                            class="btn btn-circle btn-sm btn-soft btn-error hover:scale-110 transition-transform"
                                                            type="button"
                                                            aria-label="Delete"
                                                            title="Delete">
                                                            <span class="icon-[tabler--trash] size-4"></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Empty State -->
                        <div x-show="!dataTable || dataTable.length === 0" class="mt-6">
                            <div class="flex flex-col items-center gap-3 py-12 text-center">
                                <div class="bg-gray-100 rounded-full p-4">
                                    <span class="icon-[tabler--tag] size-12 text-gray-400"></span>
                                </div>
                                <p class="text-gray-500 font-medium">No categories found</p>
                                <p class="text-gray-400 text-sm">Add categories to get started</p>
                            </div>
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
                    comment:''
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
