<x-base-layout class="bg-gray-200">
    <div class="breadcrumbs">
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
                Kasir
            </li>
        </ol>
    </div>

    <div class="card mt-2 max-w-5xl" x-data="rolePermission">
        <div class="card-body">
            <div class="flex justify-between">
                <div class="flex gap-4 justify-start items-center">
                    <span class="icon-[icon-park-outline--form-one] size-6"></span>
                    <span class="text-xl font-semibold ">Role & Permission</span>
                </div>
                <div>
                    <button class="btn btn-outline btn-primary" type="button" @click="openModal">
                        <span class="icon-[fluent--open-12-regular] size-5"></span>
                        New Role
                    </button>
                </div>
            </div>
        </div>


        {{-- modal form --}}
        <button type="button" class="btn btn-primary hidden" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="modal-form" data-overlay="#modal-form" id="open-modal">
            Open modal
        </button>

        <div id="modal-form"
            class="overlay modal overlay-open:opacity-100 overlay-open:duration-300 hidden [--overlay-backdrop:static]"
            role="dialog" tabindex="-1" data-overlay-keyboard="false">
            <div class="modal-dialog overlay-open:opacity-100 overlay-open:duration-300">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">
                            Form Register
                        </h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3 hidden"
                            aria-label="Close" data-overlay="#modal-form" id="close-modal">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="">Role Name</label>
                            <input type="text" class="input" x-model="form.role_name">
                        </div>
                        <div class="p-4 border rounded-lg mt-4">
                            <h5 class="text-md font-semibold flex gap-4 items-center mb-3">
                                Permission List :
                            </h5>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="grid col-span-1 md:col-span-3 lg:col-span-5 gap-3">
                                    <template x-for="permission in permissions">
                                        <div class="flex gap-2 items-center">
                                            <input type="checkbox" class="checkbox" x-model="form.permissions[permission.name]" :value="permission">
                                            <span x-text="permission.permission_title"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft btn-secondary" x-on:click="closeModal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary" x-on:click="store">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal form --}}
    </div>

    @push('js')
        <script>
            function rolePermission() {
                return {
                    permissions: [],
                    searchPermission: '',
                    form :{
                        role_name : '',
                        permissions : []
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
                        document.getElementById('close-modal').click();
                    },
                    store() {
                        console.log(this.form);
                    },
                    init() {
                        this.getAllPermission();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
