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
                        <input type="text" class="input max-w-96 rounded-full" x-model="search.key"
                            placeholder="ketik untuk mencari ..." @keyup.enter="searchFunc">
                        <button class="btn btn-circle btn-soft btn-info" type="button" @click="searchFunc">
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
                                                <button x-on:click="hapus(item)"
                                                    class="btn btn-soft btn-error btn-circle btn-sm">
                                                    <span class="icon-[mi--delete]"></span>
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
                        <div class="py-4 grid grid-cols-1 gap-2 font-space">
                            <div class="flex flex-col gap-2">
                                <label for="">Costumer</label>
                                <input type="text" class="input" x-model="xform.costumer">
                            </div>
                            <div class=" flex flex-col gap-2">
                                <label for="">Jenis kelamin</label>
                                <select class="select" x-model="xform.gender">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                
                            </div>
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-col gap-2">
                                    <label for="">Address</label>
                                    <textarea class="textarea" placeholder="" x-model="xform.address"></textarea>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="">Telpon</label>
                                <input type="text" class="input" x-model="xform.telpon">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="">Email</label>
                                <input type="text" class="input" x-model="xform.email">
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
                        this.xform.id = index.id
                        this.xform.costumer = index.name
                        this.xform.gender = index.jenis_kelamin
                        this.xform.address = index.alamat
                        this.xform.telpon = index.no_telp
                        this.xform.email = index.email
                        this.id = index.id
                        console.log(this.xform);
                        
                    },

                    async update() {
                        this.isSubmit = true;
                        Swal.fire({
                            title: "Are you sure?",
                            text: "udpate this data !",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, update it!"
                        }).then(async (result) => {
                            if (result.isConfirmed) {
                                try {
                                    const url = `/costumers/update`;
                                    const res = await axios.post(url, this.xform);
                                    if (res.status === 200) {
                                        this.getData();
                                        Swal.fire({
                                            title: "Updated!",
                                            text: "Your file has been updated.",
                                            icon: "success"
                                        });
                                        this.isUpdated = false;
                                        this.resetForm();
                                    } else {
                                        Swal.fire({
                                            title: "Error!",
                                            text: "Something went wrong.",
                                            icon: "error"
                                        });
                                    }
                                    this.isSubmit = false;
                                } catch (error) {
                                    console.error(error);
                                    this.isSubmit = false;
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Something went wrong.",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    },

                    resetForm() {
                        this.isUpdated = false;
                        this.xsearch = '';
                        this.xdataTable = [];
                        this.xform = {
                            id: '',
                            costumer: '',
                            gender: '',
                            address: '',
                            telpon: '',
                            email: '',
                            point: ''
                        };
                    },

                    hapus(key) {
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
                                    console.log(key);
                                    const url = `/costumers/delete`;
                                    const res = await axios.post(url, key);
                                    if (res.status === 200) {
                                        this.getData();
                                        Swal.fire({
                                            title: "Deleted!",
                                            text: "Your file has been deleted.",
                                            icon: "success"
                                        });
                                    } else {
                                        console.log(res.status);
                                        Swal.fire({
                                            title: "Deleted!",
                                            text: "Failed to delete your file.",
                                            icon: "error"
                                        });
                                    }
                                } catch (error) {
                                    console.log(error.message);
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Invalid deleted request.",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    },

                    data: [],
                    links: [],
                    nextPage: '',
                    prevPage: '',
                    search: {
                        key: ''
                    },
                    getData(url = "") {
                        if (!url) {
                            const params = new URLSearchParams({
                                key: this.search.key ?? "",
                            });
                            url = `/costumer/data-json?${params.toString()}`;
                        }
                        axios.get(url)
                            .then(res => {
                                const response = res.data.data;
                                this.xdataTable = response.data;
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
                        searchParams.set('crafter', this.search.crafter);
                        searchParams.set('range', this.search.range);
                        searchParams.set('estimasi', this.search.estimasi);
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
                        console.log('Search params before send:', this.search);
                        const params = new URLSearchParams({
                            key: this.search.key,
                        });
                        url = `/costumer/data-json?${params.toString()}`;
                        console.log('Final URL:', url);
                        this.getData(url);
                    },

                    init() {
                        this.getData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
