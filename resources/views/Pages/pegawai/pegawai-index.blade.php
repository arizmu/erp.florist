<x-base-layout>
    <div x-data="managementPegawai">
        <div class="bg-linear-to-r from-blue-700 to-blue-300 w-full h-60 rounded-lg">
            <img src="https://readymadeui.com/cardImg.webp" alt="Banner Image"
                class="rounded-lg w-full rondu h-full object-cover" />
        </div>

        <div class="-mt-28 mb-6 px-4">
            <div class="mx-auto max-w-7xl shadow-lg p-8 relative bg-white rounded-md">
                <div class="grid grid-cols-1 md:grid-cols-7 gap-4">
                    <div class="md:col-span-5">
                        <h5 class="text-xl text-gray-600 font-semibold mb-5 flex justify-start gap-4 items-center">
                            <span class="icon-[tabler--users] size-6 text-blue-600"></span>
                            Pegawai
                        </h5>
                        <div class="w-full overflow-x-auto rounded-lg border">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Telpon</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="item in dataTable">
                                        <tr class="hover:bg-blue-100">
                                            <td class="text-nowrap" x-text="item.pegawai_name">John Doe</td>
                                            <td>
                                                <span class="badge badge-soft badge-info" x-show="item.gender">
                                                    <span class="icon-[tabler--gender-male]"></span>
                                                    Laki-laki
                                                </span>
                                                <span class="badge badge-soft badge-error" x-show="!item.gender">
                                                    <span class="icon-[tabler--gender-female]"></span>
                                                    Perempuan
                                                </span>
                                            </td>
                                            <td x-text="item.alamat" class="text-wrap"></td>
                                            <td class="text-nowrap" x-text="item.telpon">March 1, 2024</td>
                                            <td>
                                                <button type="button" x-on:click="getEdit(item)"
                                                    class="btn btn-soft btn-warning btn-circle">
                                                    <span class="icon-[tabler--user-edit]"></span>
                                                </button>
                                                <button @click="deleteData(item.id)" type="button"
                                                    class="btn btn-soft btn-error btn-circle">
                                                    <span class="icon-[tabler--trash]"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
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
                            <button class="btn btn-primary btn-soft">
                                <span class="icon-[tabler--user-search]"></span>
                                Filter
                            </button>
                            <button id="btn-open-modal" class="btn btn-error btn-soft" type="button"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-open-edit"
                                data-overlay="#modal-form-data">
                                <span class="icon-[tabler--user-plus]"></span>
                                Tambah Baru
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal add --}}
        <div id="modal-form-data" class="overlay modal overlay-open:opacity-100 hidden [--body-scroll:true]"
            role="dialog" tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="flex gap-4 justify-start">
                            <span class="icon-[mynaui--user-diamond] size-6"></span>
                            <h3 class="font-semibold font-space text-xl text-gray-500"
                                x-text="isSubmitting ? 'Form Updated' : 'Form Created'"></h3>
                        </div>
                        <button type="button" class="btn hidden btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#modal-form-data" id="modal-close">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <form enctype="multipart/form-data" @submit.prevent="!isSubmitting ? storeData:UpdatedData">
                            <div class="flex flex-col gap-3 p-4 rounded-lg border">
                                <div class="w-full">
                                    <label class="label label-text" for="">
                                        Nama Lengkap
                                    </label>
                                    <input x-model="form.nama" type="text" placeholder="..." class="input"
                                        id="" />
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="">
                                        Nomor Identitas
                                    </label>
                                    <input x-model="form.no_identitas" type="text" placeholder="..."
                                        class="input" id="" />
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="">
                                        Jenis kelamin
                                    </label>
                                    <select class="select" id="" x-model="form.jenis_kelamin">
                                        <option value="1">Laki-laki</option>
                                        <option value="0">Perempuan</option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="w-full">
                                        <label class="label label-text" for="">
                                            Bitrhplace
                                        </label>
                                        <input x-model="form.tempat_lahir" type="text" placeholder="..."
                                            class="input" id="" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text" for="">
                                            Birth date
                                        </label>
                                        <input x-model="form.tanggal_lahir" type="date" placeholder="..."
                                            class="input" id="" />
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="textareaLabel">Alamat</label>
                                    <textarea x-model="form.alamat" class="textarea" placeholder="Hello!!!" id="textareaLabel"></textarea>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="w-full">
                                        <label class="label label-text" for="">
                                            Telpon
                                        </label>
                                        <input x-model="form.telpon" type="text" placeholder="..." class="input"
                                            id="" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text" for="">
                                            Email
                                        </label>
                                        <input x-model="form.email" type="email" placeholder="..." class="input"
                                            id="" />
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="">
                                        File Upload
                                    </label>
                                    <input x-model="form.file" type="file" placeholder="..." class="input"
                                        id="" />
                                </div>
                            </div>
                            <div class="flex justify-end gap-4 py-4">
                                <button type="button" class="btn btn-soft btn-secondary rounded-full font-space"
                                    @click="modalClose">Close</button>
                                <button type="submit" class="btn btn-primary rounded-full px-4 font-space"
                                    x-text="isLoad ? 'is loading...':'Created Data'" :disabled="isLoad">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal --}}


        {{-- modal update --}}
        <button id="btn-open-edit" class="btn hidden btn-error btn-soft" type="button" aria-haspopup="dialog"
            aria-expanded="false" aria-controls="modal-open-edit" data-overlay="#modal-open-edit">
            <span class="icon-[tabler--user-plus]"></span>
            open edit
        </button>

        <div id="modal-open-edit" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">

                        <div class="flex gap-4 justify-start">
                            <span class="icon-[mynaui--user-diamond] size-6"></span>
                            <h3 class="font-semibold font-space text-xl text-gray-500">Form Update</h3>
                        </div>
                        <button type="button" class="btn hidden btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#modal-open-edit" id="modal-close">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" @submit.prevent="UpdatedData">
                            <div class="flex flex-col gap-3 p-4 py-2 border rounded-lg">
                                <div class="w-full">
                                    <label class="label label-text" for="">
                                        Nama Lengkap
                                    </label>
                                    <input x-model="edit.nama" type="text" placeholder="..." class="input"
                                        id="" />
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="">
                                        Nomor Identitas
                                    </label>
                                    <input x-model="edit.no_identitas" type="text" placeholder="..."
                                        class="input" id="" />
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="">
                                        Jenis kelamin
                                    </label>
                                    <select class="select" id="" x-model="edit.jenis_kelamin">
                                        <option value="1">Laki-laki</option>
                                        <option value="0">Perempuan</option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="w-full">
                                        <label class="label label-text" for="">
                                            Bitrhplace
                                        </label>
                                        <input x-model="edit.tempat_lahir" type="text" placeholder="..."
                                            class="input" id="" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text" for="">
                                            Birth date
                                        </label>
                                        <input x-model="edit.tanggal_lahir" type="date" placeholder="..."
                                            class="input" id="" />
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="textareaLabel">Alamat</label>
                                    <textarea x-model="edit.alamat" class="textarea" placeholder="Hello!!!" id="textareaLabel"></textarea>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="w-full">
                                        <label class="label label-text" for="">
                                            Telpon
                                        </label>
                                        <input x-model="edit.telpon" type="text" placeholder="..." class="input"
                                            id="" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text" for="">
                                            Email
                                        </label>
                                        <input x-model="edit.email" type="email" placeholder="..." class="input"
                                            id="" />
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="">
                                        File Upload
                                    </label>
                                    <input x-model="edit.file" type="file" placeholder="..." class="input"
                                        id="" />
                                </div>
                            </div>
                            <div class="flex gap-4 justify-end mt-4">
                                <button type="button" class="btn btn-soft font-space btn-secondary rounded-full"
                                    aria-label="Close" data-overlay="#modal-open-edit"
                                    id="modal-edit-close">Close</button>
                                <button type="submit" class="btn btn-soft font-space btn-error rounded-full px-4"
                                    :disabled="isLoad" x-text="isLoad ? 'is loading...':'Updated data'"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal --}}
    </div>

    @push('js')
        <script>
            window.addEventListener('load', function() {
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            })

            function managementPegawai() {
                return {
                    form: {
                        id: '',
                        nama: '',
                        jenis_kelamin: '',
                        no_identitas: '',
                        alamat: '',
                        telpon: '',
                        email: '',
                        file: '',
                        tempat_lahir: '',
                        tanggal_lahir: ''
                    },
                    isSubmitting: false,
                    isLoad: false,
                    async storeData() {
                        this.isLoad = true;
                        try {
                            const url = "/management/pegawai-store";
                            const res = await axios.post(url, this.form, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            });
                            console.log(res);
                            this.isLoad = false;
                            this.loadData();
                        } catch (error) {
                            console.log(error);
                        }
                    },


                    edit: {
                        id: '',
                        nama: '',
                        jenis_kelamin: '',
                        no_identitas: '',
                        alamat: '',
                        telpon: '',
                        email: '',
                        file: '',
                        tempat_lahir: '',
                        tanggal_lahir: ''
                    },
                    getEdit(index) {
                        const modalOpen = document.getElementById('btn-open-edit');
                        this.edit = {
                                id: index.id,
                                nama: index.pegawai_name,
                                jenis_kelamin: index.gender,
                                no_identitas: index.no_identitas,
                                alamat: index.alamat,
                                telpon: index.telpon,
                                email: index.email,
                                file: index.file,
                                tempat_lahir: index.tempat_lahir,
                                tanggal_lahir: index.tanggal_lahir
                            },
                            modalOpen.click();

                    },
                    async UpdatedData() {
                        this.isLoad = true;
                        const url = '/management/pegawai-updated';
                        axios.post(url, this.edit, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                            }
                        }).then((res) => {
                            this.isLoad = false;
                            notifier.success(res.message);
                            const btnClose = document.getElementById('modal-edit-close');
                            btnClose.click();
                        }).catch((error) => {
                            console.log(error);
                        }).finally(() => {
                            this.loadData();
                        });
                    },

                    deleteData(key) {
                        const id = key;
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
                                    const url = "/management/pegawai-deleted";
                                    const res = await axios.post(url, {
                                        key: id
                                    });
                                    this.loadData();
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } catch (error) {
                                    console.log(error);
                                }
                            }
                        });
                    },

                    modalClose() {
                        this.form = {
                            id: '',
                            nama: '',
                            jenis_kelamin: '',
                            no_identitas: '',
                            alamat: '',
                            telpon: '',
                            email: '',
                            file: '',
                            tempat_lahir: '',
                            tanggal_lahir: ''
                        }
                        this.isSubmitting = false;
                        const closeBtn = document.getElementById('modal-close');
                        closeBtn.click();
                    },

                    dataTable: [],
                    async loadData() {
                        try {
                            const url = "/management/pegawai-fetch-data";
                            const res = await axios.get(url);
                            const data = res.data.data;
                            this.dataTable = data;
                            console.log(data)
                        } catch (error) {
                            console.error(error)
                        }
                    },
                    init() {
                        this.loadData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
