<x-base-layout class="bg-gray-200">
    <div x-data="rolePermission" class="py-4">
        <!-- Page Header -->
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
                        <a href="#" aria-label="More Pages" class="hover:text-primary transition-colors">
                            <span class="icon-[tabler--dots]"></span>
                        </a>
                    </li>
                    <li class="breadcrumbs-separator rtl:rotate-180">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </li>
                    <li aria-current="page" class="font-medium text-primary">
                        <span class="icon-[tabler--file] me-1 size-5"></span>
                        Role & Permission
                    </li>
                </ol>
            </div>

            <!-- Page Title -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-xl md:text-1xl font-bold text-gray-700 flex items-center gap-3">
                        <span class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl p-2.5 shadow-lg shadow-amber-500/30">
                            <span class="icon-[icon-park-outline--form-one] size-5 text-white"></span>
                        </span>
                        Role & Permission Management
                    </h1>
                    <p class="text-gray-500 mt-2 ml-1">Manage user roles and their permissions</p>
                </div>
                <div>
                    <button class="btn btn-primary gap-2 font-semibold shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300 rounded-xl" type="button" @click="openModal">
                        <span class="icon-[fluent--open-12-regular] size-5"></span>
                        <span>New Role</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Card -->
        <div class="card shadow-xl border-0 max-w-6xl">
            <div class="card-header bg-gradient-to-r from-amber-500 to-orange-600 px-6 py-4">
                <div class="flex items-center gap-3 text-white">
                    <span class="icon-[tabler--shield-check] size-6"></span>
                    <h3 class="text-xl font-bold">Roles & Permissions</h3>
                </div>
            </div>
            <div class="card-body p-6">
                <!-- Table -->
                <div class="border-2 border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="font-semibold text-gray-600">Role Name</th>
                                    <th class="font-semibold text-gray-600">Permissions</th>
                                    <th class="font-semibold text-gray-600 text-center w-48">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(role, index) in roles" :key="index">
                                    <tr class="hover:bg-amber-50/50 transition-colors">
                                        <td class="font-medium text-gray-800 py-3">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-100 to-orange-100 flex items-center justify-center">
                                                    <span class="icon-[tabler--user-shield] size-5 text-amber-600"></span>
                                                </div>
                                                <span x-text="role.name" class="text-base"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex gap-2 flex-wrap">
                                                <template x-for="permission in role.permissions" :key="index">
                                                    <span x-text="permission.permission_title"
                                                        class="badge badge-soft badge-info gap-1.5 px-3 py-1.5 shadow-sm">
                                                        <span class="icon-[tabler--lock] size-3"></span>
                                                        <span class="font-semibold text-xs" x-text="permission.permission_title"></span>
                                                    </span>
                                                </template>
                                                <template x-if="role.permissions.length === 0">
                                                    <span class="text-gray-400 text-sm italic">No permissions</span>
                                                </template>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="flex justify-center gap-2">
                                                <button class="btn btn-soft btn-warning btn-sm gap-2 hover:scale-105 transition-transform shadow-sm" type="button"
                                                    @click="edit(role)">
                                                    <span class="icon-[tabler--pencil] size-4"></span>
                                                    <span class="hidden sm:inline font-semibold">Edit</span>
                                                </button>
                                                <button class="btn btn-soft btn-error btn-sm gap-2 hover:scale-105 transition-transform shadow-sm" type="button"
                                                    x-on:click="hapus(role.id)">
                                                    <span class="icon-[tabler--trash] size-4"></span>
                                                    <span class="hidden sm:inline font-semibold">Delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>

                                <!-- Empty State -->
                                <tr x-show="roles.length === 0">
                                    <td colspan="3">
                                        <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                                            <div class="bg-amber-50 rounded-full p-4 mb-4">
                                                <span class="icon-[tabler--shield-x] size-12 text-amber-400"></span>
                                            </div>
                                            <p class="font-medium">No roles found</p>
                                            <p class="text-sm">Click "New Role" to create your first role</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Form -->
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-form" data-overlay="#modal-form" id="open-modal">
            Open modal
        </button>

        <div id="modal-form"
            class="overlay modal overlay-open:opacity-100 overlay-open:duration-300 hidden [--overlay-backdrop:static]"
            role="dialog" tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog modal-dialog-centered overlay-open:opacity-100 overlay-open:duration-300">
                <div class="modal-content shadow-2xl border-0">
                    <!-- Modal Header -->
                    <div class="modal-header bg-gradient-to-r from-amber-500 to-orange-600 px-6 py-4">
                        <h3 class="modal-title text-white font-bold text-lg flex items-center gap-2">
                            <span class="icon-[tabler--user-shield] size-5"></span>
                            <span x-text="isEdit ? 'Edit Role': 'Add New Role'"></span>
                        </h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3 text-white hover:bg-white/20 transition-colors"
                            aria-label="Close" data-overlay="#modal-form" id="close-modal">
                            <span class="icon-[tabler--x] size-5"></span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body p-6">
                        <div class="flex flex-col gap-5">
                            <!-- Role Name Input -->
                            <div class="flex flex-col gap-2">
                                <label for="role-name" class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <span class="icon-[tabler--badge] size-4 text-amber-500"></span>
                                    Role Name
                                </label>
                                <input type="text" id="role-name" class="input w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200" x-model="form.role_name" placeholder="Enter role name...">
                            </div>

                            <!-- Permissions -->
                            <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-5 border-2 border-amber-100">
                                <h5 class="text-base font-bold text-gray-700 flex gap-3 items-center mb-4 pb-3 border-b border-amber-200">
                                    <span class="icon-[tabler--lock] size-5 text-orange-500"></span>
                                    Permission List
                                </h5>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                                    <template x-for="(permission, index) in permissions">
                                        <label class="flex items-center gap-3 p-3 bg-white rounded-xl border-2 border-gray-200 hover:border-amber-300 hover:shadow-md cursor-pointer transition-all duration-200 group">
                                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                                x-model="form.permissions[permission.name]">
                                            <span class="text-sm font-medium text-gray-700 group-hover:text-amber-600 transition-colors" x-text="permission.permission_title"></span>
                                        </label>
                                    </template>
                                    <template x-if="permissions.length === 0">
                                        <div class="col-span-3 text-center text-gray-400 py-8">
                                            <span class="icon-[tabler--lock-off] size-8 mb-2"></span>
                                            <p>No permissions available</p>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer px-6 py-4 bg-gray-50 border-t border-gray-200 flex gap-3 justify-end">
                        <button type="button" class="btn btn-soft btn-secondary gap-2 hover:scale-105 transition-transform" x-on:click="closeModal">
                            <span class="icon-[tabler--x] size-4"></span>
                            <span class="font-semibold">Close</span>
                        </button>
                        <button type="button" class="btn btn-primary gap-2 shadow-lg shadow-primary/30 hover:scale-105 transition-transform" x-on:click="isEdit ? update() : store()">
                            <span class="icon-[tabler--device-floppy] size-4"></span>
                            <span class="font-semibold" x-text="isEdit ? 'Update Role' : 'Save Role'"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Form -->
    </div>

        @push('js')
            <script>
                function rolePermission() {
                    return {
                        roles: [],
                        permissions: [],
                        searchPermission: '',
                        form: {
                            id: '',
                            role_name: '',
                            permissions: {}
                        },
                        isEdit: false,
                        isLoading: false,
                        getAllRoles() {
                            const urlRoles = '/role-permission/json';
                            axios.get(urlRoles)
                                .then((response) => {
                                    this.roles = response.data.data
                                    console.log(this.roles);

                                })
                                .catch((error) => {
                                    console.log(error)
                                });
                        },
                        getAllPermission() {
                            axios.get(`/role-permission/permissions?search=${this.searchPermission}`)
                                .then((response) => {
                                    this.permissions = response.data.data
                                })
                                .catch((error) => {
                                    console.log(error)
                                })
                        },
                        openModal() {
                            document.getElementById('open-modal').click();
                        },
                        closeModal() {
                            this.resetForm();
                            this.isEdit = false;
                            document.getElementById('close-modal').click();
                        },
                        store() {
                            const url = "/role-permission/store";
                            console.log(this.form);
                            axios.post(url, this.form)
                                .then((response) => {
                                    console.log(response.data);
                                    this.getAllRoles();
                                    this.closeModal();
                                })
                                .catch((error) => {
                                    console.log(error);
                                });
                        },
                        edit(data) {
                            this.isEdit = true;
                            this.form.id = data.id;
                            this.form.role_name = data.name;
                            this.openModal();
                        },
                        update() {
                            const url = `/role-permission/update`;
                            axios.post(url, this.form)
                                .then((response) => {
                                    console.log(response.data);
                                    this.getAllRoles();
                                    this.closeModal();
                                })
                                .catch((error) => {
                                    console.log(error);
                                });
                        },
                        resetForm() {
                            this.form.id = '';
                            this.form.role_name = '';
                            this.form.permissions = {};
                        },
                        hapus(id) {
                            // swal confirmation
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    axios.get(`/role-permission/delete/${id}`)
                                        .then((response) => {
                                            //swall success
                                            Swal.fire({
                                                title: "Deleted!",
                                                text: "Your file has been deleted.",
                                                icon: "success"
                                            })
                                            this.getAllRoles();
                                        })
                                        .catch((error) => {
                                            //swall error
                                            Swal.fire({
                                                title: "Error!",
                                                text: "Your file has not been deleted.",
                                                icon: "error"
                                            })
                                        });
                                }
                            })
                        },
                        init() {
                            this.getAllRoles();
                            this.getAllPermission();
                        }
                    }
                }
            </script>
        @endpush
</x-base-layout>
