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
                    <span class="icon-[tabler--file-invoice] me-1 size-5"></span>
                    Produk data
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                    <span
                        class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2.5 shadow-lg shadow-blue-500/30">
                        <span class="icon-[fluent-mdl2--product-variant] size-7 text-white"></span>
                    </span>
                    Product Data
                </h1>
                <p class="text-gray-500 mt-2 ml-1">Manage your product inventory</p>
            </div>
        </div>
    </div>

    <div x-data="productIndex">
        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-lg border-0 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-4">
                <!-- Products Grid -->
                <div class="lg:col-span-3 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            <span class="icon-[fluent-mdl2--product-variant] size-6 text-blue-600"></span>
                            Daftar Produk
                        </h3>
                    </div>

                    <div
                        class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-5 lg:grid-cols-3 gap-4 max-h-screen overflow-y-auto pr-2">
                        <template x-for="item in data">
                            <div
                                class="card shadow-md hover:shadow-xl transition-all duration-300 border-0 overflow-hidden group">
                                <!-- Product Image -->
                                <figure class="relative h-48 bg-gray-100">
                                    <template x-if="item.img">
                                        <img :src="item.img" alt="Product"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                    </template>
                                    <span x-show="!item.img" class="absolute inset-0 flex items-center justify-center">
                                        <span
                                            class="icon-[material-symbols-light--image-search-outline-sharp] size-20 text-gray-300"></span>
                                    </span>
                                </figure>

                                <!-- Product Details -->
                                <div class="card-body p-4">
                                    <h5 class="text-lg font-semibold text-blue-600 mb-3 truncate"
                                        :title="item.product_name">
                                        <span x-text="item.product_name ?? '[null]'"></span>
                                    </h5>

                                    <!-- Badges -->
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <div class="badge badge-sm badge-soft badge-info gap-1.5">
                                            <span class="icon-[proicons--qr-code] size-3"></span>
                                            <span class="uppercase" x-text="item.code ?? '[404]'"></span>
                                        </div>
                                        <div class="badge badge-sm badge-soft badge-secondary gap-1.5">
                                            <span class="icon-[tabler--clipboard-check] size-3"></span>
                                            <span x-text="item.qty ?? '0'"></span> PCS
                                        </div>
                                        <div class="badge badge-sm badge-soft badge-warning gap-1.5">
                                            <span class="icon-[tabler--moneybag] size-3"></span>
                                            <span>Rp. <span x-text="formatRupiah(item.price)"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Footer -->
                                <div class="card-footer px-4 py-3 bg-gray-50 border-t border-gray-100">
                                    <div class="flex gap-2 justify-center flex-wrap">
                                        <button
                                            class="btn btn-soft btn-primary btn-circle btn-sm hover:scale-110 transition-transform"
                                            type="button" x-on:click="barcode(item)" title="Barcode">
                                            <span class="icon-[bx--barcode-reader] size-5"></span>
                                        </button>
                                        <a class="btn btn-soft btn-success btn-circle btn-sm hover:scale-110 transition-transform"
                                            href="#"
                                            @click.prevent="window.open(`/barcode?barcode=${item.code}`, '_blank', 'width=600,height=400,left=200,top=100')"
                                            title="Print Barcode">
                                            <span class="icon-[bx--barcode-reader] size-5"></span>
                                        </a>
                                        <button x-on:click="openEdit(item)"
                                            class="btn btn-soft btn-secondary btn-circle btn-sm hover:scale-110 transition-transform"
                                            type="button" title="Edit">
                                            <span class="icon-[line-md--upload-loop] size-5"></span>
                                        </button>
                                        <button x-on:click="archiveProduct(item)"
                                            class="btn btn-soft btn-error btn-circle btn-sm hover:scale-110 transition-transform"
                                            type="button" title="Delete">
                                            <span class="icon-[lucide--trash-2] size-5"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Empty State -->
                        <div x-show="!data || data.length === 0" class="col-span-full py-12 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="bg-gray-100 rounded-full p-4">
                                    <span class="icon-[tabler--box] size-12 text-gray-400"></span>
                                </div>
                                <p class="text-gray-500 font-medium">No products found</p>
                                <p class="text-gray-400 text-sm">Add products to get started</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-start gap-2 mt-4">
                        <button type="button" class="btn btn-outline gap-2" @click="prevPageFunc"
                            :disabled="!prevPage" :class="{ 'opacity-50 cursor-not-allowed': !prevPage }">
                            <span class="icon-[heroicons-outline--arrow-circle-left] size-4"></span>
                            Previous
                        </button>
                        <button type="button" class="btn btn-outline gap-2" :disabled="!nextPage"
                            @click="nextPageFunc" :class="{ 'opacity-50 cursor-not-allowed': !nextPage }">
                            Next
                            <span class="icon-[heroicons-outline--arrow-circle-right] size-4"></span>
                        </button>
                    </div>
                </div>

                <!-- Filter Sidebar -->
                <div class="lg:col-span-1 bg-gray-50 p-6 border-l border-gray-200">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="icon-[tabler--filter-search] size-6 text-blue-600"></span>
                        <h3 class="text-lg font-bold text-gray-800">Filter</h3>
                    </div>

                    <div class="flex flex-col gap-4">
                        <!-- Search Input -->
                        <div class="relative">
                            <label class="label label-text font-medium mb-1">Search</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-3 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--search] size-4"></span>
                                </span>
                                <input type="search" x-model="search.keyword"
                                    class="input input-bordered pl-10 w-full" placeholder="Search products..."
                                    id="kbdInput" />
                            </div>
                            <label class="sr-only" for="kbdInput">Search</label>
                        </div>

                        <!-- Data Range -->
                        <div class="relative">
                            <label class="label label-text font-medium mb-1">Data Range</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-3 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--list-numbers] size-4"></span>
                                </span>
                                <select x-model="search.range" class="select pl-10 w-full"
                                    aria-label="Select data range">
                                    <option value="15">15</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>

                        <!-- Filter Button -->
                        <button class="btn btn-primary gap-2 w-full mt-2" type="button" @click="searchFunc">
                            <span class="icon-[tabler--user-search] size-5"></span>
                            Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal: Edit Product -->
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-edit-product-data" data-overlay="#modal-edit-product-data" id="modal-edit-prouduct">
            Open modal
        </button>

        <div id="modal-edit-product-data"
            class="overlay modal overlay-open:opacity-100 hidden [--overlay-backdrop:static]" role="dialog"
            tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content rounded-2xl shadow-2xl">
                    <div class="modal-header px-6 py-4 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2">
                                <span class="icon-[fluent-mdl2--product-variant] size-6 text-white"></span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Edit Product</h3>
                                <p class="text-sm text-gray-500">Update product details</p>
                            </div>
                        </div>
                        <button type="button"
                            class="btn btn-ghost btn-circle btn-sm absolute end-3 top-3 hover:bg-red-50 hover:text-red-600"
                            aria-label="Close" data-overlay="#modal-edit-product-data" id="modal-file-upload-close">
                            <span class="icon-[tabler--x] size-5"></span>
                        </button>
                    </div>
                    <form x-on:submit.prevent="store()" enctype="multipart/form-data">
                        <div class="modal-body p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <label class="label label-text font-medium">Bucket Name</label>
                                    <input type="text" x-model="xform.bucket" readonly class="input" />
                                </div>
                                <div>
                                    <label class="label label-text font-medium">Quantity</label>
                                    <input type="text" x-model="xform.qty" class="input" />
                                </div>
                                <div>
                                    <label class="label label-text font-medium">Cost Production</label>
                                    <input type="text" x-model="xform.cost_production" readonly class="input" />
                                </div>
                                <div>
                                    <label class="label label-text font-medium">Price</label>
                                    <input type="text" x-model="xform.price" class="input" />
                                </div>
                            </div>
                            <div>
                                <label class="label label-text font-medium">Upload Foto</label>
                                <div class="relative">
                                    <input type="file" x-ref="file" @change="file_upload" class="input" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-2xl">
                            <div class="flex gap-3 justify-end">
                                <button type="button" class="btn btn-ghost gap-2 hover:bg-gray-200"
                                    data-overlay="#modal-edit-product-data">
                                    <span class="icon-[tabler--x] size-5"></span>
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary gap-2 shadow-lg shadow-primary/30">
                                    <span class="icon-[proicons--save] size-5"></span>
                                    <span x-text="isStore ? 'Loading...' : 'Updated'"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal: Barcode -->
        <div for="barcode-view">
            <button id="open-barcode-modal" type="button" class="btn btn-primary hidden" aria-haspopup="dialog"
                aria-expanded="false" aria-controls="barcode-modal" data-overlay="#barcode-modal">
                Open modal
            </button>

            <div id="barcode-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
                tabindex="-1">
                <div class="modal-dialog overlay-open:opacity-100 max-w-md">
                    <div class="modal-content rounded-2xl shadow-2xl">
                        <div class="modal-header px-6 py-4 border-b border-gray-100">
                            <div class="w-full flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2">
                                        <span class="icon-[bx--barcode-reader] size-6 text-white"></span>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800">Barcode</h3>
                                        <p class="text-sm text-gray-500">Print product barcode</p>
                                    </div>
                                </div>
                                <button type="button"
                                    class="btn btn-ghost btn-circle btn-sm hover:bg-red-50 hover:text-red-600"
                                    aria-label="Close" data-overlay="#barcode-modal">
                                    <span class="icon-[tabler--x] size-5"></span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body p-6">
                            <div class="flex flex-col items-center gap-4 text-center">
                                <div class="bg-gray-100 rounded-full p-6">
                                    <span class="icon-[bx--barcode-reader] size-16 text-gray-400"></span>
                                </div>
                                <p class="text-gray-600">Barcode preview will appear here</p>
                            </div>
                        </div>
                        <div class="modal-footer px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-2xl">
                            <div class="flex gap-3 justify-end">
                                <button type="button" class="btn btn-ghost gap-2 hover:bg-gray-200"
                                    data-overlay="#barcode-modal">
                                    <span class="icon-[tabler--x] size-5"></span>
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary gap-2 shadow-lg shadow-primary/30">
                                    <span class="icon-[tabler--printer] size-5"></span>
                                    Cetak Barcode
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('js')
        <script>
            function productIndex() {
                return {
                    file: '',
                    xform: {
                        product_id: '',
                        bucket: '',
                        qty: '',
                        cost_production: '',
                        price: '',
                        img_file: ''
                    },

                    openEdit(index) {
                        this.xform.bucket = index.product_name
                        this.xform.qty = index.qty
                        this.xform.cost_production = formatRupiah(index.cost_production)
                        this.xform.price = formatRupiah(index.price)
                        this.xform.img_file = index.img
                        this.xform.product_id = index.id
                        this.openModal();
                    },

                    file_upload(e) {
                        this.file = e.target.files[0];
                        this.xform.img_file = this.file;
                        this.regis.file = this.file;
                    },

                    isStore: false,
                    async store() {
                        try {
                            this.isStore = true;
                            const data = this.xform;
                            console.log(this.xform);
                            const url = `/product/update-product-data/${this.xform.product_id}`;
                            const response = await axios.post(url, data, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            this.loadJson();
                            notifier.success("Product updated successfully")
                            this.isStore = false;
                            const clsoe = document.getElementById('modal-file-upload-close');
                            clsoe.click();
                        } catch (error) {
                            console.log(error);
                            notifier.error("Failed to update product");
                        }
                    },

                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',
                    search: {
                        keyword: '',
                        range: 15,
                    },
                    loadJson(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                keywords: this.search.keyword ?? "",
                                range: this.search.range ?? ""
                            });
                            url = `/product/product-json?${params.toString()}`;
                        }
                        Swal.fire({
                            title: "Loading...",
                            text: "Fetching product data.",
                            icon: "info",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        axios.get(url)
                            .then((res) => {
                                const response = res.data.data;
                                this.data = response.data;
                                this.links = this.processPaginationLinks(response.links);
                                this.nextPage = response.next_page_url ? this.addParamsToUrl(response.next_page_url) : null;
                                this.prevPage = response.prev_page_url ? this.addParamsToUrl(response.prev_page_url) : null;
                            })
                            .catch((err) => {
                                //sweetalert error, get error message
                                // console.error(err.message);
                                notifier.error("Failed to load product data");
                            })
                            .finally(() => {
                                Swal.close();
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
                        searchParams.set('range', this.search.range);

                        newUrl.search = searchParams.toString();
                        return newUrl.toString();
                    },

                    nextPageFunc() {
                        if (this.nextPage) {
                            this.loadJson(this.nextPage);
                        }
                    },

                    prevPageFunc() {
                        if (this.prevPage) {
                            this.loadJson(this.prevPage);
                        }
                    },

                    searchFunc() {
                        const params = new URLSearchParams({
                            keywords: this.search.keyword,
                            range: this.search.range
                        });
                        url = `/product/product-json?${params.toString()}`;
                        console.log('Final URL:', url);
                        this.loadJson(url);
                    },

                    openModal() {
                        const openModal = document.getElementById('modal-edit-prouduct');
                        openModal.click();
                    },

                    closeModal() {
                        const openModal = document.getElementById('model-close-layout');
                        openModal.click();
                    },

                    resetForm() {
                        this.xform = {
                            product_id: '',
                            bucket: '',
                            qty: '',
                            cost_production: '',
                            price: '',
                            img_file: ''
                        }
                    },

                    registerFrom() {
                        const openModal = document.getElementById('modal-open-register');
                        openModal.click();
                    },

                    regis: {
                        name: '',
                        price: '',
                        file: ''
                    },

                    async storeProduct() {
                        try {
                            const url = "/register-product";
                            const response = await axios.post(url, this.regis, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            });
                            const data = response.data.data;
                        } catch (error) {

                        }
                    },

                    async archiveProduct(params) {
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
                                    const data = params;
                                    const url = `/product/delete-product-data/${data.id}`;
                                    const res = await axios.post(url, {
                                        id: data.id
                                    });
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } catch (error) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Invalid deleted request.",
                                        icon: "error"
                                    });
                                } finally {
                                    this.loadJson();
                                }
                            }
                        });
                    },

                    barcode(index) {
                        window.open(`/product/product-barcode/${index.code}`, '_blank',
                        'width=600,height=400,left=200,top=100');
                        return BarcodeFunc(index);
                    },

                    init() {
                        this.loadJson()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
