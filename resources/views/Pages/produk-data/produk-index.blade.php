<x-base-layout>
    @push('css')
    <style>
        .overflow-auto::-webkit-scrollbar {
            display: none;
        }
    </style>
    @endpush

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
                Produk Item
            </li>
        </ol>
    </div>


    <div x-data="productIndex">
        <div class="bg-linear-to-r from-blue-700 to-blue-300 w-full h-60 rounded-lg">
            <img src="https://readymadeui.com/cardImg.webp" alt="Banner Image"
                class="rounded-lg w-full rondu h-full object-cover" />
        </div>

        <div class="-mt-28 mb-6 px-4">
            <div class="mx-auto max-w-7xl shadow-lg p-8 relative bg-white rounded-md">
                <div class="grid grid-cols-1 md:grid-cols-7 gap-4">
                    <div class="md:col-span-5">
                        <h5 class="text-xl text-gray-600 mb-5 flex justify-start gap-4 items-center">
                            <span class="icon-[fluent-mdl2--product-variant] size-6 text-orange-600"></span>
                            <span class="font-muse">
                                Product Data
                            </span>
                        </h5>
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4 py-4 max-h-screen overflow-auto rounded-lg">
                            <template x-for="item in data">
                                <div class="card shadow-lg" :title="item.product_name" :alt="item.product_name">
                                    <figure class="min-h-44 max-h-44">
                                        <template x-if="item.img">
                                            <img :src="item.img" alt="headphone" class="h-44 object-cover" />
                                        </template>
                                        <span x-show="!item.img"
                                            class="icon-[material-symbols-light--image-search-outline-sharp] size-36 h-44 object-cover"></span>
                                    </figure>
                                    <div class="card-body">
                                        <h5 class=" text-blue-400 text-lg font-semibold" style="margin-top: -10pt">
                                            <span class="mr-2"
                                                x-text="item.product_name?? '[null]'"></span>
                                        </h5>
                                        <div class="py-3 flex flex-wrap gap-2 text-xs mt-2">
                                            <div class="flex gap-2 align-middle badge badge-info badge-soft badge-sm">
                                                <span class="icon-[proicons--qr-code] size-3"></span>
                                                <span class="uppercase" x-text="item.code ?? [404]">

                                                </span>
                                            </div>
                                            <div class="flex gap-2 align-middle badge badge-secondary badge-soft badge-sm">
                                                <span class="icon-[tabler--clipboard-check] size-3"></span>
                                                <span class=""><span x-text="item.qty ?? '0'"></span>
                                                    PCS</span>
                                            </div>
                                            <div class="flex gap-2 align-middle badge badge-warning badge-soft badge-sm">
                                                <span class="icon-[tabler--moneybag] size-3"></span>
                                                <span class="">Rp. <span
                                                        x-text="formatRupiah(item.price)"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="flex gap-2 md:justify-start justify-center flex-wrap">

                                            <button class="btn btn-primary btn-circle btn-sm btn-soft shadow-md" type="button"
                                                x-on:click="barcode(item)">
                                                <span class="icon-[bx--barcode-reader] size-5"></span>
                                            </button>

                                            <a class="btn btn-success btn-circle btn-sm btn-soft shadow-md" href="#"
                                                @click.prevent="window.open(`/barcode?barcode=${item.code}`, '_blank', 'width=600,height=400,left=200,top=100')">
                                                <span class="icon-[bx--barcode-reader] size-5"></span>
                                            </a>
                                            <button x-on:click="openEdit(item)"
                                                class="btn btn-secondary btn-circle btn-sm btn-soft shadow-md" type="button">
                                                <span class="icon-[line-md--upload-loop] size-6"></span>
                                            </button>
                                            <button class="btn btn-error btn-circle btn-sm btn-soft shadow-md" type="button"
                                                x-on:click="archiveProduct(item)">
                                                <span class="icon-[lucide--trash-2] size-5"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div class="py-4 pl-4">
                            <nav class="flex justify-start gap-x-1">
                                <button type="button" class="btn btn-secondary btn-outline min-w-28"
                                    @click="prevPageFunc" :disabled="!prevPage">
                                    <span class="icon-[heroicons-outline--arrow-circle-left] size-5"></span>
                                    Previous
                                </button>
                                <button type="button" class="btn btn-secondary btn-outline min-w-28"
                                    :disabled="!nextPage" @click="nextPageFunc">
                                    Next
                                    <span class="icon-[heroicons-outline--arrow-circle-right] size-5"></span>
                                </button>
                            </nav>
                        </div>
                    </div>
                    <div class="md:col-span-2 order-first md:order-2">
                        <h5 class="font-semibold text-xl text-gray-600 flex justify-start gap-4 items-center">
                            <span class="icon-[tabler--filter-search] size-6 text-blue-600"></span>
                            Filter
                        </h5>
                        <div class="input-group mt-5">
                            <span class="input-group-text">
                                <span class="icon-[tabler--search] text-base-content/80 size-6"></span>
                            </span>
                            <input type="search" x-model="search.keyword" class="input input-lg grow"
                                placeholder="Search" id="kbdInput" />
                            <label class="sr-only" for="kbdInput">Search</label>
                            <span class="input-group-text gap-2">
                                <kbd class="kbd kbd-sm">⌘</kbd>
                                <kbd class="kbd kbd-sm">K</kbd>
                            </span>
                        </div>
                        <div class="relative w-full mt-4">
                            <select x-model="search.range" class="select select-floating "
                                aria-label="Select floating label" id="selectFloating">
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <label class="select-floating-label" for="selectFloating">Data Range</label>
                        </div>
                        <div class="flex justify-between flex-wrap gap-2 mt-4">
                            <button class="btn btn-primary btn-soft" @click="searchFunc" type="button">
                                <span class="icon-[tabler--user-search]"></span>
                                Filter
                            </button>
                            {{-- <button class="btn btn-primary btn-soft" @click="registerFrom">
                                <span class="icon-[fluent-mdl2--product-release]"></span>
                                Register Product
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal open --}}
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-edit-product-data" data-overlay="#modal-edit-product-data"
            id="modal-edit-prouduct">Open modal</button>

        <div id="modal-edit-product-data"
            class="overlay modal overlay-open:opacity-100 hidden [--overlay-backdrop:static]" role="dialog"
            tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <form x-on:submit.prevent="store()" enctype="multipart/form-data">
                        <div class="modal-body flex flex-col gap-4">
                            <div class="flex items-center">
                                <h3 class="text-xl font-semibold text-gray-600">Details | File Upload</h3>
                            </div>
                            <div class="flex flex-col gap-2 p-4 border-2 rounded-lg">
                                <div class="w-auto">
                                    <label class="label label-text" for=""> Bucket Name </label>
                                    <input type="text" x-model="xform.bucket" readonly class="input" />
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="w-auto">
                                        <label class="label label-text" for=""> Quantity </label>
                                        <input type="text" x-model="xform.qty" class="input" />
                                    </div>
                                    <div class="w-auto">
                                        <label class="label label-text" for=""> Cost Production </label>
                                        <input type="text" x-model="xform.cost_production" readonly
                                            class="input" />
                                    </div>
                                </div>
                                <div class="w-auto">
                                    <label class="label label-text" for=""> Price </label>
                                    <input type="text" x-model="xform.price" class="input" />
                                </div>
                            </div>
                            <div class="w-auto">
                                <label class="label label-text" for=""> Upload Foto </label>
                                <input type="file" x-ref="file" @change="file_upload" class="input" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-soft btn-circle btn-error"
                                data-overlay="#modal-edit-product-data" title="close" id="modal-file-upload-close">
                                <span class="icon-[mdi--close-octagon-outline]"
                                    style="width: 24px; height: 24px;"></span>
                            </button>
                            <button type="submit" class="btn btn-primary rounded-full btn-soft">
                                <span class="icon-[proicons--save]" style="width: 24px; height: 24px;"></span>
                                <span x-text="isStore ? 'Is Loading':'Updated'">Updated</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-register-product" data-overlay="#modal-register-product"
            id="modal-open-register">Open modal</button>
        <div id="modal-register-product"
            class="overlay modal overlay-open:opacity-100 hidden [--overlay-backdrop:static]" role="dialog"
            tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-xl font-semibold text-gray-600">Product Details</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#modal-register-product" id="model-close-layout">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <form x-on:submit.prevent="storeProduct()" enctype="multipart/form-data">
                        <div class="modal-body flex flex-col gap-4">
                            <div class="w-auto">
                                <label class="label label-text" for=""> Bucket Name </label>
                                <input type="text" x-model="regis.name" class="input" />
                            </div>
                            <div class="w-auto">
                                <label class="label label-text" for=""> Price </label>
                                <input type="text" x-model="regis.price" class="input" />
                            </div>
                            <div class="w-auto">
                                <label class="label label-text" for=""> Foto Product </label>
                                <input type="file" x-ref="file" @change="file_upload" class="input" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-soft btn-secondary"
                                data-overlay="#modal-register-product">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div for="barcode-view">
        <button id="open-barcode-modal" type="button" class="btn btn-primary hidden" aria-haspopup="dialog"
            aria-expanded="false" aria-controls="barcode-modal" data-overlay="#barcode-modal"> Open modal </button>

        <div id="barcode-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog" tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Dialog Title</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#basic-modal">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft btn-secondary"
                            data-overlay="#basic-modal">Close</button>
                        <button type="button" class="btn btn-primary">
                            Cetak Barcode
                        </button>
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
                    window.open(`/product/product-barcode/${index.code}`, '_blank', 'width=600,height=400,left=200,top=100');
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