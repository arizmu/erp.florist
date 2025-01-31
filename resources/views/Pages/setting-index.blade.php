<x-base-layout>
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
    <div x-data="settingIndex()" class="py-4">
        <div class="card bg-slate-0 dark:bg-gray-800">
            <div class="card-body">
                <div class="p-4 px-5">
                    <h5 class="card-title">Konfigurasi Aplikasi</h5>
                    <form @submit.prevent="submit" class="" enctype="multipart/form-data">
                        <div class="max-w-3xl">
                            <div class="flex flex-col items-start gap-2">
                                <div class="w-full">
                                    <label class="label label-text font-semibold text-gray-400" for="">Title
                                    </label>
                                    <input x-model="data.appName" type="text" class="input" id="" />
                                </div>
                                <div class="w-full">
                                    <label class="label label-text font-semibold text-gray-400" for=""> Sub
                                        Title </label>
                                    <input x-model="data.sub_title" type="text" class="input" id="" />
                                </div>
                                <div class="w-full">
                                    <label class="label label-text font-semibold text-gray-400"> Comment </label>
                                    <textarea x-model="data.comment" class="textarea"></textarea>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text font-semibold text-gray-400"> Address </label>
                                    <textarea class="textarea" x-model="data.address"></textarea>
                                </div>
                                <div class="grid gap-2 grid-cols-1 md:grid-cols-2 w-full">
                                    <div class="w-full">
                                        <label class="label label-text font-semibold text-gray-400"></label> Telpon
                                        </label>
                                        <input x-model="data.phone" type="text" class="input" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text font-semibold text-gray-400"> Email </label>
                                        <input x-model="data.email" type="text" class="input" />
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button class="btn btn-info btn-soft rounded-full px-4" type="submit">
                                        <span class="icon-[ant-design--save-outlined] size-5"></span>
                                        <label for="">Simpan</label>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="max-w-3xl grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <h5 class="card-title mb-2.5 mt-8">File Logo</h5>
                            <div class="lg:col-span-1 flex item-center flex-col gap-4 py-6">
                                <figure class="max-w-48">
                                    <img class="rounded-lg" :title="data.appName" :src="data.file_logo"
                                        alt="Watch" />
                                </figure>
                                <div>
                                    <input type="file" x-ref="file" @change="file_upload"
                                        class="block text-sm file:uppercase file:btn file:btn-secondary file:btn-soft file:rounded-full file:me-3 file:btn-sm"
                                        aria-label="file-input" />
                                </div>
                                <div class="">
                                    <button class=" btn btn-soft btn-info rounded-full" @click="logoUpload">
                                        <span class="icon-[hugeicons--file-upload] size-5"></span>
                                        <label for="">Upload File</label>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="card-title mb-2.5 mt-8">File Icon</h5>
                            <div class="lg:col-span-1 flex item-center flex-col gap-4 py-6">
                                <figure class="max-w-48">
                                    <img class="rounded-lg" :title="data.appName" :src="data.icon"
                                        alt="Watch" />
                                </figure>
                                <div>
                                    <input type="file" x-ref="icon" @change="icon_upload"
                                        class="block text-sm file:uppercase file:btn file:btn-secondary file:btn-soft file:rounded-full file:me-3 file:btn-sm"
                                        aria-label="file-input" />
                                </div>
                                <div>

                                    <button class=" btn btn-soft btn-info rounded-full" type="button"
                                        @click="iconUpload">
                                        <span class="icon-[hugeicons--file-upload] size-5"></span>
                                        <label for="">Upload File</label>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            function settingIndex() {
                return {
                    file: "",
                    data: {
                        appName: '',
                        sub_title: '',
                        appLogo: '',
                        comment: '',
                        address: '',
                        phone: '',
                        email: '',
                        file_logo: '',
                        icon: '',
                    },
                    file_upload(e) {
                        this.file = e.target.files[0];
                        const fsize = this.file.size / 1024;
                        if (fsize > 2048) {
                            alert("File size is too big. File size should be less than 2MB.");
                            return;
                        }
                        this.data.file_logo = this.file;
                    },

                    icon: '',
                    icon_upload(e) {
                        this.icon = e.target.files[0];
                        const fsize = this.icon.size / 1024;
                        if (fsize > 2048) {
                            alert("File size is too big. File size should be less than 2MB.");
                            return;
                        }
                        this.data.icon = this.icon;
                    },
                    
                    async submit() {
                        if (this.data.appName == "" || this.data.sub_title == "" || this.data.comment == "" || this.data
                            .address == "" || this.data.phone == "" || this.data.email == "") {
                            alert("Form must be filled out completely!");
                            return;
                        }

                        Swal.fire({
                            title: "Are you sure?",
                            text: "for update your application!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, change!"
                        }).then(async (response) => {
                            if (response.isConfirmed) {
                                Swal.fire({
                                    title: 'Uploading...',
                                    text: 'Please wait while your file is being uploaded.',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading(); // Tampilkan spinner loading
                                    }
                                });
                                try {
                                    const formData = this.data;
                                    const store = await axios.post('/management/app-set-store',
                                        formData, {
                                            headers: {
                                                'Content-Type': 'application/json'
                                            }
                                        });
                                    const response = store.data.data;
                                    console.log(response);

                                    Swal.fire({
                                        title: "success!",
                                        text: "Your application updated successfully.",
                                        icon: "success"
                                    });
                                } catch (error) {
                                    console.error(error);
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Failed to update application.",
                                        icon: "error"
                                    });
                                }
                            }
                        })
                    },

                    logoUpload() {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "for update your icon site!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, change!"
                        }).then(async (result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Uploading...',
                                    text: 'Please wait while your file is being uploaded.',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading(); // Tampilkan spinner loading
                                    }
                                });
                                try {
                                    const formData = this.data;
                                    const store = await axios.post('/management/logo-upload',
                                        formData, {
                                            headers: {
                                                'Content-Type': 'multipart/form-data'
                                            }
                                        });
                                    const response = store.data.data;
                                    console.log(response);

                                    Swal.fire({
                                        title: "success!",
                                        text: "Your logo updated successfully.",
                                        icon: "success"
                                    });
                                } catch (error) {
                                    console.log(error);
                                }
                            }
                        });
                    },

                    iconUpload() {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "for update your icon site!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, change!"
                        }).then(async (result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Uploading...',
                                    text: 'Please wait while your file is being uploaded.',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal
                                            .showLoading(); // Tampilkan spinner loading
                                    }
                                });

                                try {
                                    const formData = this.data;
                                    const store = await axios.post('/management/icon-upload',
                                        formData, {
                                            headers: {
                                                'Content-Type': 'multipart/form-data'
                                            }
                                        });
                                    const response = store.data.data;
                                    console.log(response);
                                    Swal.fire({
                                        title: "success",
                                        text: "Your icon app updated successfully.",
                                        icon: "success"
                                    });
                                } catch (error) {
                                    console.log(error);
                                }
                            }
                        });
                    },

                    getData() {
                        axios.get('/management/app-set-get')
                            .then(response => {
                                const data = response.data.data
                                if (data) {
                                    this.data.appName = data.app_name;
                                    this.data.appLogo = data.foto;
                                    this.data.comment = data.comment;
                                    this.data.address = data.alamat;
                                    this.data.phone = data.telpon;
                                    this.data.email = data.email;
                                    this.data.file_logo = data.foto;
                                    this.data.icon = data.icon;
                                    this.data.sub_title = data.sub_title;
                                }
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    },
                    init: function() {
                        this.getData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
