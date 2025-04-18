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


    <div x-data="userIndex">
        <div class="bg-gradient-to-r from-blue-700 to-blue-300 w-full h-60 rounded-lg">
            <img src="https://readymadeui.com/cardImg.webp" alt="Banner Image"
                class="rounded-lg w-full rondu h-full object-cover" />
        </div>

        <div class="-mt-28 mb-6 px-4">
            <div class="mx-auto max-w-7xl shadow-lg p-8 relative bg-white rounded-md">
                <div class="grid grid-cols-1 md:grid-cols-7 gap-8">
                    <div class="md:col-span-5">
                        <h5 class="text-xl text-gray-600 font-semibold mb-5 flex justify-start gap-4 items-center">
                            <span class="icon-[tabler--users] size-6 text-blue-600"></span>
                            User Pengguna
                        </h5>
                        <div class="border-base-content/25 w-full rounded-lg border">
                            <div class="overflow-x-auto">
                                <table class="table rounded">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="user in data">
                                            <tr>
                                                <td class="text-nowrap" x-text="user.name"></td>
                                                <td x-text="user.email"></td>
                                                <td>
                                                    <span x-show="user.active"
                                                        class="badge badge-soft badge-success text-xs">
                                                        Enabled
                                                    </span>
                                                    <span x-show="!user.active"
                                                        class="badge badge-soft badge-warning text-xs">
                                                        Disabled
                                                    </span>
                                                </td>
                                                <td>
                                                    <button x-on:click="openEdit(user)"
                                                        class="btn btn-info btn-soft btn-circle btn-sm"
                                                        aria-label="Action button">
                                                        <span
                                                            class="icon-[fluent--person-edit-24-regular] size-5"></span>
                                                    </button>
                                                    <button x-on:click="deleteData(user.id)" type="button" class="btn btn-circle btn-soft btn-error btn-sm"
                                                        aria-label="Action button">
                                                        <span class="icon-[tabler--trash] size-5"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="py-4 px-0">
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
                            <input type="text" class="input input-lg grow" placeholder="Search" x-model="search.keyword" />
                            <label class="sr-only" for="kbdInput">Search</label>
                            <span class="input-group-text gap-2">
                                <kbd class="kbd kbd-sm">⌘</kbd>
                                <kbd class="kbd kbd-sm">K</kbd>
                            </span>
                        </div>
                        <div class="relative w-full mt-4">
                            <select class="select select-floating " aria-label="Select floating label"
                                x-model="search.range">
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <label class="select-floating-label" for="selectFloating">Data Range</label>
                        </div>
                        <div class="flex justify-between flex-wrap gap-2 mt-4">
                            <button class="btn btn-primary btn-soft rounded-full" type="button" x-on:click="searchFunc">
                                <span class="icon-[tabler--user-search]"></span>
                                Filter
                            </button>
                            <button class="btn btn-info btn-soft rounded-full" type="button" x-on:click="create">
                                <span class="icon-[carbon--user-follow]"></span>
                                New User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  modal open  -->
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-form" data-overlay="#modal-form" id="btn-open-modal">
            Open modal
        </button>

        <div id="modal-form"
            class="overlay modal overlay-open:opacity-100 hidden [--overlay-backdrop:static]" role="dialog"
            tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-xl font-semibold text-gray-600" x-text="status ? 'Form Update' : 'Form Registrasi'">Registrasi User</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#modal-form" id="model-close-layout">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body flex flex-col gap-4">
                        <div class="p-2 border rounded-xl flex flex-col gap-2 px-3">
                            <div class="w-full">
                                <label class="label label-text" for="">Pilih Pegawai</label>
                                <select class="select" id="" x-model="xform.pegawai_id">
                                    <option>Pilih...</option>
                                    <template x-for="pegawai in pegawais" :key="pegawai.id">
                                        <option :value="pegawai.id" x-text="pegawai.pegawai_name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="w-full">
                                <label class="label label-text" for="">
                                    Role User
                                </label>
                                <select class="select" id="" x-model="xform.role_id">
                                    <option>Pilih role</option>

                                </select>
                            </div>
                        </div>
                        <div class="p-2 px-3 border rounded-lg flex flex-col gap-2">
                            <div class="w-full">
                                <label class="label label-text" for="username"> Username </label>
                                <input x-model="xform.username" type="text"
                                    class="input"/>
                            </div>
                            <div class="w-full">
                                <label class="label label-text" for="emai"> Email </label>
                                <input x-model="xform.email" type="text" placeholder="email" class="input"
                                    id="email" />
                            </div>
                            <div class="w-full">
                                <label class="label label-text" for="password"> Password </label>
                                <div class="input-group">
                                    <input x-model="xform.password" id="toggle-password" type="password"
                                        class="input" placeholder="Enter password" value="" />
                                    <span class="input-group-text">
                                        <button type="button"
                                            data-toggle-password='{ "target": "#toggle-password" }' class="block"
                                            aria-label="password toggle">
                                            <span
                                                class="icon-[tabler--eye] text-base-content/80 password-active:block hidden size-5 flex-shrink-0"></span>
                                            <span
                                                class="icon-[tabler--eye-off] text-base-content/80 password-active:hidden block size-5 flex-shrink-0"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="label label-text" for="password_confirm"> Password Confirm </label>
                                <div class="input-group">
                                    <input x-model="xform.confirm_password" id="password_confirm" type="password"
                                        class="input" placeholder="Enter password" value="" />
                                    <span class="input-group-text">
                                        <button type="button"
                                            data-toggle-password='{ "target": "#password_confirm" }'
                                            class="block" aria-label="password toggle">
                                            <span
                                                class="icon-[tabler--eye] text-base-content/80 password-active:block hidden size-5 flex-shrink-0"></span>
                                            <span
                                                class="icon-[tabler--eye-off] text-base-content/80 password-active:hidden block size-5 flex-shrink-0"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft btn-secondary rounded-full"
                            x-on:click="closeModal">
                            <span class="icon-[material-symbols--reset-focus] size-5"></span>
                            Close</button>
                        <button type="submit" class="btn btn-primary btn-soft rounded-full">
                            <span class="icon-[ri--user-follow-line] size-5"></span>
                            Submit data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        function userIndex() {
            return {
                pegawais: [],
                xform: {
                    id: "",
                    pegawai_id: '',
                    role_id: '',
                    username: '',
                    email: '',
                    password: '',
                    confirm_password: ''
                },
                status: false,
                create() {
                    console.log('create');
                    this.resetXform();
                    this.openModal();
                },
                async store() {
                    try {
                        const response = await axios.post('/management/user-store', this.xform);
                        const data = response.data.data;
                        console.log(data);
                        this.resetXform();
                        this.getData();
                    } catch (error) {
                        console.log(error);
                    }
                },
                openEdit(index) {
                    this.status = true;
                    this.openModal();
                    const user = index;
                    this.xform.id = user.id;
                    this.xform.pegawai_id = user.pegawai_id;
                    this.xform.role_id = user.role_id;
                    this.xform.username = user.name;
                    this.xform.email = user.email;
                    this.xform.password = user.password;
                    this.xform.confirm_password = user.password;
                    console.log(this.xform);
                    console.log(user);
                },
                resetXform() {
                    this.xform = {
                        pegawai_id: '',
                        role_id: '',
                        username: '',
                        email: '',
                        password: '',
                        confirm_password: ''
                    }
                },
                async deleteData(index) {
                    // sweetalert for confirmation before delete data
                    const result = await Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    });
                    if (!result.isConfirmed) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Cancelled',
                            text: 'Your data is safe!'
                        })
                        return;
                    } else {
                        // error callback
                        try {
                            // const url = `/management/user-delete/${index}`;
                            // const res = await axios.post(url);
                            // this.getData();
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                        } catch (error) {
                            console.log(error);
                        }
                    }

                    // const response = await axios.get(`/management/user-delete/${index}`);
                    // console.log(response);
                },
                openModal() {
                    Swal.fire({
                        title: 'Loading...',
                        text: 'Please wait while your file is being uploaded.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    })
                    axios.get('/management/user-get-pegawai')
                        .then((res) => {
                            const data = res.data.data;
                            this.pegawais = data;
                        })
                        .catch((err) => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            })
                            
                        })
                        .finally(() => {
                            Swal.close();
                            const openModal = document.getElementById('btn-open-modal');
                            openModal.click();
                        });
                },
                closeModal() {
                    const closeModal = document.getElementById('model-close-layout');
                    closeModal.click();
                    this.resetXform();
                    this.status = false;
                    console.log('clear...');
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
                        url = `/management/user-json?${params.toString()}`;
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
                            Swal.fire({
                                title: "Error!",
                                text: "Failed to fetch product data.",
                                icon: "error"
                            })
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
                    url = `/management/user-json?${params.toString()}`;
                    this.loadJson(url);
                },

                getPegawai() {
                    Swal.fire({
                        icon: 'info',
                        title: 'Loading...',
                        text: 'Please wait while your file is being uploaded.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading(); // Tampilkan spinner loading
                        }
                    })
                    axios.get('/management/user-get-pegawai')
                        .then((res) => {
                            const data = res.data.data;
                            this.pegawais = data;
                        })
                        .catch((err) => {
                            console.log(err);
                        })
                        .finally(() => {
                            Swal.close(); // Tutup spinner loading
                        });

                },
                init() {
                    this.loadJson();
                }
            }
        }
    </script>
    @endpush
</x-base-layout>