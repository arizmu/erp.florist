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
                                        <template x-for="user in users">
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
                                                    <button x-on:click="openEdit(users)"
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
                        <nav class="flex items-center gap-x-1 mt-4">
                            <button type="button" class="btn btn-soft rounded-full">Previous</button>
                            <div class="flex items-center gap-x-1">
                                <button type="button"
                                    class="btn btn-soft btn-circle aria-[current='page']:text-bg-soft-primary">1</button>
                                <button type="button"
                                    class="btn btn-soft btn-circle aria-[current='page']:text-bg-soft-primary"
                                    aria-current="page">2</button>
                                <button type="button"
                                    class="btn btn-soft btn-circle aria-[current='page']:text-bg-soft-primary">3</button>
                            </div>
                            <button type="button" class="btn btn-soft rounded-full">Next</button>
                        </nav>
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
                            <input type="search" class="input input-lg grow" placeholder="Search" id="kbdInput" />
                            <label class="sr-only" for="kbdInput">Search</label>
                            <span class="input-group-text gap-2">
                                <kbd class="kbd kbd-sm">⌘</kbd>
                                <kbd class="kbd kbd-sm">K</kbd>
                            </span>
                        </div>
                        <div class="relative w-full mt-4">
                            <select class="select select-floating " aria-label="Select floating label"
                                id="selectFloating">
                                <option>15</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                            <label class="select-floating-label" for="selectFloating">Data Range</label>
                        </div>
                        <div class="flex justify-between flex-wrap gap-2 mt-4">
                            <button class="btn btn-primary btn-soft rounded-full">
                                <span class="icon-[tabler--user-search]"></span>
                                Filter
                            </button>
                            <button class="btn btn-info btn-soft rounded-full" type="button" @click="openModalAdd">
                                <span class="icon-[carbon--user-follow]"></span>
                                New User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal open --}}
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-edit-product-data" data-overlay="#modal-edit-product-data" id="btn-modal-add-user">Open
            modal</button>

        <div id="modal-edit-product-data"
            class="overlay modal overlay-open:opacity-100 hidden [--overlay-backdrop:static]" role="dialog"
            tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-xl font-semibold text-gray-600">Registrasi User</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#modal-edit-product-data">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <form x-on:submit.prevent="store">
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
                                    <input x-model="xform.username" type="text" placeholder="username"
                                        class="input" id="username" />
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
                                data-overlay="#modal-edit-product-data">
                                <span class="icon-[material-symbols--reset-focus] size-5"></span>
                                Close</button>
                            <button type="submit" class="btn btn-primary btn-soft rounded-full">
                                <span class="icon-[ri--user-follow-line] size-5"></span>
                                Submit data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- modal open --}}
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-edit-user-data" data-overlay="#modal-edit-user-data" id="btn-modal-open-edit">Open
            modal</button>

        <div id="modal-edit-user-data"
            class="overlay modal overlay-open:opacity-100 hidden [--overlay-backdrop:static]" role="dialog"
            tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-xl font-semibold text-gray-600">Edit User</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#modal-edit-product-data">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body flex flex-col gap-4">
                        <div class="p-2 border rounded-xl flex flex-col gap-2 px-3">
                            <div class="w-full">
                                <label class="label label-text" for="">Pilih Pegawai</label>
                                <select class="select" id="">
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
                                <select class="select" id="">
                                    <option>Pilih role</option>
                                    <option>The Shawshank Redemption</option>
                                    <option>Pulp Fiction</option>
                                    <option>The Dark Knight</option>
                                    <option>Schindler's List</option>
                                </select>
                            </div>
                        </div>
                        <div class="relative w-full">
                            <input type="text" placeholder="username" class="input input-floating peer"
                                id="" />
                            <label class="input-floating-label" for="">Username</label>
                        </div>
                        <div class="relative w-full">
                            <input type="text" placeholder="password" class="input input-floating peer"
                                id="" />
                            <label class="input-floating-label" for="">Email</label>
                        </div>
                        <div class="relative w-full">
                            <input type="text" placeholder="password" class="input input-floating peer"
                                id="" />
                            <label class="input-floating-label" for="">password</label>
                        </div>
                        <div class="relative w-full">
                            <input type="text" placeholder="confirm password" class="input input-floating peer"
                                id="" />
                            <label class="input-floating-label" for="">Confirm Password</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft btn-secondary rounded-full"
                            data-overlay="#modal-edit-user-data">
                            <span class="icon-[material-symbols--reset-focus] size-5"></span>
                            Close</button>
                        <button type="button" class="btn btn-primary btn-soft rounded-full">
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
                    users: [],
                    pegawais: [],
                    xform: {
                        pegawai_id: '',
                        role_id: '',
                        username: '',
                        email: '',
                        password: '',
                        confirm_password: ''
                    },
                    async openModalAdd() {
                        const modal = document.getElementById('btn-modal-add-user');
                        const getPegawai = await axios.get('/management/user-get-pegawai');
                        const response = getPegawai.data.data;
                        console.log(response);

                        this.pegawais = response;
                        modal.click();
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
                    getData() {
                        axios.get('/management/user-json')
                            .then(response => {
                                const data = response.data.data;
                                this.users = data;
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    },
                    openEdit(index) {
                        const openModal = document.getElementById('btn-modal-open-edit');
                        openModal.click();

                        const user = index;
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
                        console.log('delete data');
                        const response = await axios.get(`/management/user-delete/${index}`);
                        console.log(response);
                    },
                    init() {
                        this.getData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
