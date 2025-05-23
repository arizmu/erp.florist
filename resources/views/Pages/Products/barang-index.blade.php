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
                    <h5 class="card-title mb-2.5 text-orange-500">
                        <span class="icon-[tabler--align-box-top-right]" style="width: 24px; height: 24px;"></span>
                        Master Barang
                    </h5>
                    <div class="grid grid-cols-1 lg:grid-cols-9 gap-5 py-4">
                        <div class="md:col-span-2 lg:col-span-3 ">
                            <div class="card">
                                <div class="card-header flex gap-4 items-center align-middle">
                                    <span class="icon-[material-symbols--trackpad-input-3-outline-sharp] size-6"></span>
                                    <h3 class="font-semibold text-lg font-space"
                                        x-text="isUpdated ? 'Form Updated':'Form Input'"></h3>
                                </div>
                                <div class="card-body">
                                    <form @submit.prevent="isUpdated ? postUpdate : storeBarang">
                                        <div class="flex flex-col gap-4">
                                            <div class="relative w-auto">
                                                <input x-model="sForm.nama_barang" type="text" placeholder=""
                                                    class="input input-floating peer" id="" />
                                                <label class="input-floating-label" for="">
                                                    Nama Barang
                                                </label>
                                            </div>
                                            <div class="relative w-auto">
                                                <select x-model="sForm.satuan_id" class="select select-floating"
                                                    aria-label="Select floating label" id="">
                                                    <option>Pilih ...</option>
                                                    <template x-for="item in satuan">
                                                        <option :value="item.id" x-text="item.nama_satuan">
                                                        </option>
                                                    </template>
                                                </select>
                                                <label class="select-floating-label text-blue-500"
                                                    for="">Satuan</label>
                                            </div>
                                            <div class="relative w-auto">
                                                <select x-model="sForm.category_id" class="select select-floating"
                                                    aria-label="Select floating label" id="">
                                                    <option>Pilih ...</option>
                                                    <template x-for="value in category" :key="value.id">
                                                        <option :value="value.id" x-text="value.category_name">
                                                        </option>
                                                    </template>
                                                </select>
                                                <label class="select-floating-label text-blue-500"
                                                    for="">Kategori</label>
                                            </div>
                                            <div class="relative w-auto">
                                                <textarea x-model="sForm.comment" class="textarea textarea-floating peer" placeholder="Hello!!!" id=""></textarea>
                                                <label class="textarea-floating-label" for="">Comment</label>
                                            </div>
                                            <div class="relative w-auto">
                                                <input x-model="sForm.harga" type="text" placeholder=""
                                                    class="input input-floating peer" id="" />
                                                <label class="input-floating-label" for="">
                                                    Harga Jual
                                                </label>
                                            </div>
                                            <div class="flex justify-between flex-wrap gap-4">
                                                <button type="button" x-on:click="resetForm"
                                                    class="btn btn-outline btn-warning rounded-full w-auto btn-soft px-5 ">
                                                    <span class="icon-[ic--twotone-reset-tv]"
                                                        style="width: 24px; height: 24px;"></span>
                                                    <span>Reset</span>
                                                </button>
                                                <button type="submit" :disabled="isAction"
                                                    class="btn btn-outline btn-primary w-auto btn-soft rounded-full px-5">
                                                    <span class="icon-[proicons--save]"
                                                        style="width: 24px; height: 24px;"></span>
                                                    <span class="" x-text="isAction ? 'Load...':'Submit'"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-6">
                            <div class="mb-3 rounded-lg border p-4 flex justify-start flex-wrap gap-2 md:gap-6 ">
                                <input type="text" class="input rounded-full max-w-60" x-model="search.keyword"
                                    @keyup.enter="searchFunc">
                                <button class="btn btn-soft btn-secondary btn-circle" type="button" x-on:click="searchFunc">
                                    <span class="icon-[mingcute--search-3-line] size-5"></span>
                                </button>
                            </div>
                            <div class="w-full overflow-x-auto border rounded-lg">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Harga</th>
                                            <th>Satuan</th>
                                            <th>Category</th>
                                            <th>stock</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="barang in data" :key="barang.id">
                                            <tr class="hover:bg-slate-100">
                                                <td class="text-wrap font-semibold" x-text="barang.nama_barang"></td>
                                                <td>
                                                    Rp.
                                                    <span x-text="formatRupiah(barang.price)"></span>
                                                </td>
                                                <td x-text="barang.satuan.nama_satuan"></td>
                                                <td x-text="barang.category.category_name">johndoe@example.com</td>
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
                                                <td class="text-nowrap"
                                                    x-text="formatTanggalNoTime(barang.updated_at)">
                                                </td>
                                                <td>
                                                    <button type="btn" x-on:click="getEdit(barang)"
                                                        class="btn btn-circle btn-soft btn-sm btn-warning">
                                                        <span class="icon-[mdi--circle-edit-outline] size-5"></span>
                                                    </button>
                                                    <button x-on:click="deleteBarang(barang.id)" type="button"
                                                        class="btn btn-error btn-circle btn-soft btn-sm">
                                                        <span class="icon-[tabler--trash] size-5"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>

                            <div class="py-4">
                                <nav class="flex justify-between gap-x-1">
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
            </div>
        </div>
        <div class="md:col-span-2 lg:col-span-2 order-first md:order-last">
            <x-panel.panel-product />
        </div>
    </div>
    @push('js')
    <script>
        function IndexBarang() {
            return {
                dataBarang: [],
                category: [],
                satuan: [],
                sForm: {
                    id: '',
                    harga: '',
                    nama_barang: '',
                    satuan_id: '',
                    category_id: '',
                    satuan_id: '',
                    comment: '',
                },
                isAction: false,
                isUpdated: false,
                getEdit(item) {
                    this.isUpdated = true;
                    this.sForm.nama_barang = item.nama_barang;
                    this.sForm.satuan_id = '';
                    this.sForm.category_id = item.category_barang_id;
                    this.sForm.comment = '';
                    this.sForm.id = item.id;
                    this.sForm.harga = item.price;
                },

                async postUpdate() {
                    this.isAction = true;

                    const sweeLoad = Swal.fire({
                        icon:'info',
                        title: 'Loading',
                        html: 'Please wait...',
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            sweeLoad.showLoading();
                        },
                    })

                    const item = this.sForm;
                    let url = `/master-barang/barang-update/${item.id}`;
                    let data = {
                        nama_barang: item.nama_barang,
                        harga: item.harga,
                        category_id: item.category_id,
                        satuan: item.satuan_id,
                        comment: item.comment,
                    };
                    try {
                        const response = await axios.post(url, data);
                        this.getData();
                        this.resetForm();
                        Swal.fire({
                            title: "Updated!",
                            text: "Your file has been updated.",
                            icon: "success"
                        });
                    } catch (error) {
                        Swal.fire({
                            title: "Error!",
                            text: "Your file has not been updated.",
                            icon: "error"
                        });
                    }
                },

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
                                this.getData();
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
                async storeBarang() {
                    this.isAction = true;
                    try {
                        const url = "/master-barang/barang-store"
                        const response = await axios.post(url, this.sForm);
                        this.getData();
                        this.resetForm();
                        Swal.fire({
                            title: "success",
                            text: "store data is successuflly.",
                            icon: "success"
                        });

                    } catch (error) {
                        Swal.fire({
                            title: "Error",
                            text: "store data is failed.",
                            icon: "error"
                        });
                        this.isAction = false;
                    }

                },

                getCagetory() {
                    axios.get("/master-barang/category-json")
                        .then((response) => {
                            this.category = response.data.data.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        })
                },

                getSatuan() {
                    const url = '/master-barang/barang-get-satuan';
                    response = axios.get(url)
                        .then((res) => {
                            const data = res.data.data;
                            this.satuan = data;
                        }).catch((err) => {
                            console.log(err);
                        });

                },

                resetForm() {
                    this.sForm = {
                        id: '',
                        nama_barang: '',
                        satuan_id: '',
                        category_id: '',
                        satuan_id: '',
                        comment: '',
                    }

                    this.isAction = false;
                    this.isUpdated = false;
                },

                data: [],
                links: [],
                nextPage: '',
                prevPage: '',

                search: {
                    keyword: '',
                },
                getData(url = "") {
                    if (!url) {
                        const params = new URLSearchParams({
                            keywords: this.search.keyword ?? "",
                        });
                        url = `/master-barang/barang-json?${params.toString()}`;
                    }

                    // swall loading
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
                    })

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
                        })
                        .finally(() => {
                            Swal.close();
                        });
                },
                // Fungsi untuk menambahkan parameter pencarian ke semua link pagination
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
                // Fungsi untuk menambahkan parameter pencarian ke URL
                addParamsToUrl(url) {
                    if (!url) return null;
                    const newUrl = new URL(url);
                    const searchParams = new URLSearchParams(newUrl.search);
                    // Tambahkan parameter pencarian terkini
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
                        keywords: this.search.keyword,
                    });
                    url = `/master-barang/barang-json?${params.toString()}`;
                    console.log('Final URL:', url);
                    this.getData(url);
                },

                init() {
                    this.getCagetory()
                    this.getSatuan()
                    this.getData()
                }
            }
        }
    </script>
    @endpush
</x-base-layout>