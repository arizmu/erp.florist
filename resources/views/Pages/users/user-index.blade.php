<x-base-layout>
    <div x-data="userIndex" x-init="init()">
        <!-- Page Header with Breadcrumbs -->
        <div class="mb-6">
            <!-- Breadcrumbs -->
            <div class="breadcrumbs mb-4 text-sm">
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
                        <a href="#" aria-label="Management" class="hover:text-primary transition-colors">
                            <span class="icon-[tabler--settings]"></span>
                            Management
                        </a>
                    </li>
                    <li class="breadcrumbs-separator rtl:rotate-180">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </li>
                    <li aria-current="page" class="font-medium text-primary">
                        <span class="icon-[tabler--users] me-1 size-5"></span>
                        Users
                    </li>
                </ol>
            </div>

            <!-- Page Title & Description with Add Button -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
                        <span class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2.5 shadow-lg shadow-blue-500/30">
                            <span class="icon-[tabler--users] size-7 text-white"></span>
                        </span>
                        User Management
                    </h1>
                    <p class="text-gray-500 mt-2 ml-1">Manage and monitor all system users and their permissions</p>
                </div>
                <button x-on:click="create"
                    class="btn btn-primary gap-2 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all duration-300">
                    <span class="icon-[carbon--user-follow] size-5"></span>
                    Add New User
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="card bg-gradient-to-br from-blue-500 to-blue-600 border-0 shadow-xl shadow-blue-500/30">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-medium mb-1">Total Users</p>
                            <p class="text-3xl font-bold text-white" x-text="data.length"></p>
                        </div>
                        <div class="bg-white/20 rounded-2xl p-3 backdrop-blur-sm">
                            <span class="icon-[tabler--users] size-8 text-white"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-gradient-to-br from-emerald-500 to-emerald-600 border-0 shadow-xl shadow-emerald-500/30">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-emerald-100 text-sm font-medium mb-1">Active Users</p>
                            <p class="text-3xl font-bold text-white" 
                                x-text="data.filter(u => u.active).length"></p>
                        </div>
                        <div class="bg-white/20 rounded-2xl p-3 backdrop-blur-sm">
                            <span class="icon-[tabler--user-check] size-8 text-white"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-gradient-to-br from-amber-500 to-orange-500 border-0 shadow-xl shadow-amber-500/30">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-amber-100 text-sm font-medium mb-1">Inactive Users</p>
                            <p class="text-3xl font-bold text-white" 
                                x-text="data.filter(u => !u.active).length"></p>
                        </div>
                        <div class="bg-white/20 rounded-2xl p-3 backdrop-blur-sm">
                            <span class="icon-[tabler--user-off] size-8 text-white"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-gradient-to-br from-purple-500 to-indigo-600 border-0 shadow-xl shadow-purple-500/30">
                <div class="card-body p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm font-medium mb-1">Roles</p>
                            <p class="text-3xl font-bold text-white" x-text="roles.length"></p>
                        </div>
                        <div class="bg-white/20 rounded-2xl p-3 backdrop-blur-sm">
                            <span class="icon-[tabler--shield] size-8 text-white"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="card shadow-xl border-0">
            <div class="card-header bg-white border-b border-gray-100 px-6 py-4">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <!-- Search -->
                    <div class="flex-1 max-w-md">
                        <div class="relative flex items-center">
                            <span class="absolute left-3 text-gray-400 pointer-events-none">
                                <span class="icon-[tabler--search] size-5"></span>
                            </span>
                            <input type="text"
                                class="input input-bordered pl-10 w-full focus:ring-2 focus:ring-blue-500/20 py-2.5"
                                placeholder="Search users by name or email..."
                                x-model="search.keyword"
                                @keyup.enter="searchFunc" />
                        </div>
                    </div>

                    <!-- Filters & Actions -->
                    <div class="flex flex-wrap items-center gap-3">
                        <!-- Data Range -->
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-500">Show:</span>
                            <select class="select select-bordered select-sm w-24" 
                                x-model="search.range" 
                                @change="searchFunc()">
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>

                        <!-- Filter Button -->
                        <button class="btn btn-outline btn-primary gap-2" x-on:click="searchFunc">
                            <span class="icon-[tabler--filter] size-5"></span>
                            Apply Filter
                        </button>

                        <!-- Refresh Button -->
                        <button class="btn btn-ghost btn-circle hover:bg-blue-50 hover:text-blue-600" 
                            x-on:click="loadJson()"
                            title="Refresh data">
                            <span class="icon-[tabler--refresh] size-5"></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="table table-hover">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th class="font-semibold text-gray-600">User</th>
                                <th class="font-semibold text-gray-600">Employee</th>
                                <th class="font-semibold text-gray-600">Email</th>
                                <th class="font-semibold text-gray-600">Role</th>
                                <th class="font-semibold text-gray-600">Status</th>
                                <th class="font-semibold text-gray-600 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="user in data" :key="user.id">
                                <tr class="hover:bg-blue-50/30 transition-colors duration-200">
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar placeholder">
                                                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-full w-10 h-10 flex items-center justify-center font-semibold">
                                                    <span x-text="user.name ? user.name.charAt(0).toUpperCase() : 'U'"></span>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-800" x-text="user.name"></p>
                                                <p class="text-xs text-gray-500">ID: #<span x-text="user.id"></span></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-gray-600" 
                                            x-text="user.pegawai ? user.pegawai.pegawai_name : '-'"></span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-2">
                                            <span class="icon-[tabler--mail] size-4 text-gray-400"></span>
                                            <span class="text-gray-600" x-text="user.email"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <template x-for="role in user.roles">
                                            <span x-text="role.name" 
                                                class="badge badge-soft badge-info text-xs font-medium uppercase tracking-wide"></span>
                                        </template>
                                    </td>
                                    <td>
                                        <span x-show="user.active"
                                            class="badge badge-soft badge-success gap-1.5 text-xs font-medium">
                                            <span class="icon-[tabler--circle-filled] size-2"></span>
                                            Enabled
                                        </span>
                                        <span x-show="!user.active"
                                            class="badge badge-soft badge-warning gap-1.5 text-xs font-medium">
                                            <span class="icon-[tabler--circle-filled] size-2"></span>
                                            Disabled
                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <div class="flex justify-end gap-2">
                                            <button x-on:click="openEdit(user)"
                                                class="btn btn-soft btn-info btn-circle btn-sm hover:scale-110 transition-transform"
                                                aria-label="Edit user">
                                                <span class="icon-[fluent--person-edit-24-regular] size-5"></span>
                                            </button>
                                            <button x-on:click="deleteData(user.id)" 
                                                class="btn btn-soft btn-error btn-circle btn-sm hover:scale-110 transition-transform"
                                                aria-label="Delete user">
                                                <span class="icon-[tabler--trash] size-5"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            
                            <!-- Empty State -->
                            <tr x-show="data.length === 0">
                                <td colspan="6" class="text-center py-12">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="bg-gray-100 rounded-full p-4">
                                            <span class="icon-[tabler--user-search] size-12 text-gray-400"></span>
                                        </div>
                                        <p class="text-gray-500 font-medium">No users found</p>
                                        <p class="text-gray-400 text-sm">Try adjusting your search or filter criteria</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                    <p class="text-sm text-gray-500">
                        Showing <span class="font-medium text-gray-700" x-text="data.length"></span> users
                    </p>
                    <div class="flex gap-2">
                        <button type="button" 
                            class="btn btn-outline btn-sm gap-2"
                            @click="prevPageFunc" 
                            :disabled="!prevPage"
                            :class="{'opacity-50 cursor-not-allowed': !prevPage}">
                            <span class="icon-[heroicons-outline--arrow-circle-left] size-4"></span>
                            Previous
                        </button>
                        <button type="button" 
                            class="btn btn-outline btn-sm gap-2"
                            :disabled="!nextPage" 
                            @click="nextPageFunc"
                            :class="{'opacity-50 cursor-not-allowed': !nextPage}">
                            Next
                            <span class="icon-[heroicons-outline--arrow-circle-right] size-4"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-form" data-overlay="#modal-form" id="btn-open-modal">
            Open modal
        </button>

        <div id="modal-form" class="overlay modal overlay-open:opacity-100 hidden [--overlay-backdrop:static]"
            role="dialog" tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog overlay-open:opacity-100 max-w-lg">
                <div class="modal-content rounded-2xl shadow-2xl">
                    <div class="modal-header px-6 py-4 border-b border-gray-100">
                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2">
                                    <span class="icon-[tabler--user-plus] size-6 text-white"></span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800"
                                        x-text="status ? 'Update User' : 'Add New User'"></h3>
                                    <p class="text-sm text-gray-500" x-text="status ? 'Modify user information' : 'Create a new user account'"></p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-ghost btn-circle btn-sm hover:bg-red-50 hover:text-red-600"
                                aria-label="Close" data-overlay="#modal-form" id="model-close-layout">
                                <span class="icon-[tabler--x] size-5"></span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body p-6 space-y-5">
                        <!-- Employee & Role Section -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 space-y-4">
                            <h4 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="icon-[tabler--user-cog] size-4"></span>
                                User Assignment
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="label label-text font-medium" for="pegawai_id">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--badge] size-4"></span>
                                            Employee
                                        </span>
                                    </label>
                                    <select class="select select-bordered w-full" x-model="xform.pegawai_id">
                                        <option value="">Select Employee...</option>
                                        <template x-for="pegawai in pegawais" :key="pegawai.id">
                                            <option :value="pegawai.id" x-text="pegawai.pegawai_name"></option>
                                        </template>
                                    </select>
                                </div>
                                <div>
                                    <label class="label label-text font-medium" for="role_id">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--shield] size-4"></span>
                                            Role
                                        </span>
                                    </label>
                                    <select class="select select-bordered w-full" x-model="xform.role_id">
                                        <option value="">Select Role...</option>
                                        <template x-for="role in roles" :key="role.id">
                                            <option :value="role.id" x-text="role.name"></option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Account Details Section -->
                        <div class="space-y-4">
                            <h4 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="icon-[tabler--user] size-4"></span>
                                Account Details
                            </h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="label label-text font-medium" for="username">
                                        Username
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="absolute left-3 text-gray-400 pointer-events-none">
                                            <span class="icon-[tabler--at] size-5"></span>
                                        </span>
                                        <input x-model="xform.username" type="text"
                                            class="input input-bordered pl-10 w-full py-2.5"
                                            placeholder="Enter username" />
                                    </div>
                                </div>
                                <div>
                                    <label class="label label-text font-medium" for="email">
                                        Email Address
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="absolute left-3 text-gray-400 pointer-events-none">
                                            <span class="icon-[tabler--mail] size-5"></span>
                                        </span>
                                        <input x-model="xform.email" type="email"
                                            class="input input-bordered pl-10 w-full py-2.5"
                                            placeholder="Enter email address" />
                                    </div>
                                </div>
                                <div>
                                    <label class="label label-text font-medium" for="password">
                                        Password
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="absolute left-3 text-gray-400 pointer-events-none">
                                            <span class="icon-[tabler--lock] size-5"></span>
                                        </span>
                                        <input x-model="xform.password" id="toggle-password" type="password"
                                            class="input input-bordered pl-10 pr-12 w-full py-2.5"
                                            placeholder="Enter password" />
                                        <button type="button"
                                            data-toggle-password='{ "target": "#toggle-password" }'
                                            class="absolute right-3 text-gray-400 hover:text-gray-600"
                                            aria-label="Toggle password visibility">
                                            <span class="icon-[tabler--eye] password-active:block hidden size-5"></span>
                                            <span class="icon-[tabler--eye-off] password-active:hidden block size-5"></span>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label class="label label-text font-medium" for="password_confirm">
                                        Confirm Password
                                    </label>
                                    <div class="relative flex items-center">
                                        <span class="absolute left-3 text-gray-400 pointer-events-none">
                                            <span class="icon-[tabler--lock] size-5"></span>
                                        </span>
                                        <input x-model="xform.confirm_password" id="password_confirm" type="password"
                                            class="input input-bordered pl-10 pr-12 w-full py-2.5"
                                            placeholder="Confirm password" />
                                        <button type="button"
                                            data-toggle-password='{ "target": "#password_confirm" }'
                                            class="absolute right-3 text-gray-400 hover:text-gray-600"
                                            aria-label="Toggle password visibility">
                                            <span class="icon-[tabler--eye] password-active:block hidden size-5"></span>
                                            <span class="icon-[tabler--eye-off] password-active:hidden block size-5"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer px-6 py-4 border-t border-gray-100 bg-gray-50/50 rounded-b-2xl">
                        <div class="flex justify-end gap-3">
                            <button type="button" 
                                class="btn btn-ghost gap-2 hover:bg-gray-100"
                                x-on:click="closeModal">
                                <span class="icon-[tabler--x] size-5"></span>
                                Cancel
                            </button>
                            <button type="button" 
                                x-on:click="status ? update() : store()"
                                class="btn btn-primary gap-2 shadow-lg shadow-blue-500/30">
                                <span class="icon-[tabler--check] size-5"></span>
                                <span x-text="status ? 'Update User' : 'Create User'"></span>
                            </button>
                        </div>
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
                        this.resetXform();
                        this.openModal();
                    },
                    store() {
                        const url = `/management/user-store`;
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, create it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Loading...',
                                    html: 'Harap tunggu...',
                                    icon: 'info',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                })
                                axios.post(url, this.xform)
                                    .then((response) => {
                                        this.loadJson();
                                        this.closeModal();
                                        Swal.fire({
                                            title: "Created!",
                                            text: "Your file has been created.",
                                            icon: "success"
                                        })
                                    })
                                    .catch((error) => {
                                        console.log(error);
                                        if (error.response.status === 422) {
                                            const errors = error.response.data.errors;
                                            const errorKeys = []
                                            for (const key in errors) {
                                                errorKeys.push(errors[key][0])
                                            }
                                            Swal.fire({
                                                title: "Error!",
                                                text: errorKeys.join(', '),
                                                icon: "error"
                                            })
                                            return;
                                        }

                                        Swal.fire({
                                            title: "Error!",
                                            text: "Your file has not been created.",
                                            icon: "error"
                                        })
                                    });
                            }
                        })
                    },
                    update() {
                        const url = `/management/user-update/${this.xform.id}`;
                        Swal.fire({
                            title: 'Update confirm?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, update it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Loading...',
                                    html: 'Harap tunggu...',
                                    icon: 'info',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                })
                                axios.post(url, this.xform)
                                    .then((response) => {
                                        this.loadJson();
                                        this.closeModal();
                                        Swal.fire({
                                            title: "Updated!",
                                            text: "Your file has been updated.",
                                            icon: "success"
                                        })
                                    })
                                    .catch((error) => {
                                        console.log(error);
                                        if (error.response.status === 422) {
                                            const errors = error.response.data.errors;
                                            const errorKeys = []
                                            for (const key in errors) {
                                                errorKeys.push(errors[key][0])
                                            }
                                            Swal.fire({
                                                title: "Error!",
                                                text: errorKeys.join(', '),
                                                icon: "error"
                                            })
                                            return;
                                        }
                                        Swal.fire({
                                            title: "Error!",
                                            text: "Your file has not been updated.",
                                            icon: "error"
                                        })
                                    });
                            }
                        })

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
                            try {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            } catch (error) {
                                console.log(error);
                            }
                        }
                    },
                    openModal() {
                        Swal.fire({
                            title: 'Loading...',
                            text: 'Please wait while your file is being uploaded.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            icon: 'info',
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
                                console.log(this.data);
                                
                                this.links = this.processPaginationLinks(response.links);
                                this.nextPage = response.next_page_url ? this.addParamsToUrl(response
                                    .next_page_url) : null;
                                this.prevPage = response.prev_page_url ? this.addParamsToUrl(response
                                    .prev_page_url) : null;
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
                                Swal.showLoading();
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
                                Swal.close();
                            });

                    },

                    roles: [],
                    getRoles() {
                        axios.get('/management/user-get-roles')
                            .then((res) => {
                                const data = res.data.data;
                                this.roles = data;
                            })
                            .catch((err) => {
                                console.log(err);
                            });
                    },
                    init() {
                        this.getRoles();
                        this.loadJson();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
