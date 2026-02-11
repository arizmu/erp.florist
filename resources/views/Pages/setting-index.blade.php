<x-base-layout>
    <div x-data="settingIndex()" class="py-4">
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
                        Pengaturan
                    </li>
                </ol>
            </div>

            <!-- Page Title -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-xl md:text-1xl font-bold text-gray-700 flex items-center gap-3">
                        <span class="bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl p-2.5 shadow-lg shadow-violet-500/30">
                            <span class="icon-[tabler--settings] size-5 text-white"></span>
                        </span>
                        Konfigurasi Aplikasi
                    </h1>
                    <p class="text-gray-500 mt-2 ml-1">Manage application settings and branding</p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
            <!-- Left Column - Application Settings -->
            <div class="xl:col-span-1">
                <div class="card shadow-xl border-0">
                    <!-- Card Header -->
                    <div class="card-header bg-gradient-to-r from-violet-500 to-purple-600 px-6 py-4">
                        <div class="flex items-center gap-3 text-white">
                            <span class="icon-[tabler--settings-2] size-6"></span>
                            <h3 class="text-xl font-bold">Pengaturan Aplikasi</h3>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-6">
                        <form @submit.prevent="submit" class="space-y-5" enctype="multipart/form-data">
                            <!-- Application Name -->
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <span class="icon-[tabler--building-store] size-4 text-violet-500"></span>
                                    Title Aplikasi
                                </label>
                                <input x-model="data.appName" type="text" placeholder="Enter application name..."
                                    class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm" />
                            </div>

                            <!-- Sub Title -->
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <span class="icon-[tabler--text-caption] size-4 text-purple-500"></span>
                                    Sub Title
                                </label>
                                <input x-model="data.sub_title" type="text" placeholder="Enter subtitle..."
                                    class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm" />
                            </div>

                            <!-- Comment -->
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <span class="icon-[tabler--message] size-4 text-pink-500"></span>
                                    Keterangan
                                </label>
                                <textarea x-model="data.comment" placeholder="Add description..."
                                    rows="3"
                                    class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm resize-none"></textarea>
                            </div>

                            <!-- Address -->
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <span class="icon-[tabler--map-pin] size-4 text-blue-500"></span>
                                    Alamat
                                </label>
                                <textarea x-model="data.address" placeholder="Enter address..."
                                    rows="2"
                                    class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm resize-none"></textarea>
                            </div>

                            <!-- Phone & Email -->
                            <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                        <span class="icon-[tabler--phone] size-4 text-emerald-500"></span>
                                        Telpon
                                    </label>
                                    <input x-model="data.phone" type="text" placeholder="08..."
                                        class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm" />
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                        <span class="icon-[tabler--mail] size-4 text-orange-500"></span>
                                        Email
                                    </label>
                                    <input x-model="data.email" type="text" placeholder="email@example.com"
                                        class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 shadow-sm" />
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button class="btn btn-primary w-full gap-3 text-base font-semibold shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all duration-300" type="submit">
                                    <span class="icon-[ant-design--save-outlined] size-5"></span>
                                    Simpan Pengaturan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column - Logo & Icon Upload -->
            <div class="xl:col-span-1">
                <div class="card shadow-xl border-0">
                    <!-- Card Header -->
                    <div class="card-header bg-gradient-to-r from-cyan-500 to-blue-600 px-6 py-4">
                        <div class="flex items-center gap-3 text-white">
                            <span class="icon-[tabler--photo] size-6"></span>
                            <h3 class="text-xl font-bold">Logo & Icon</h3>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-6">
                        <div class="grid gap-6 grid-cols-1 md:grid-cols-2">
                            <!-- Logo Upload -->
                            <div>
                                <h4 class="font-semibold text-gray-700 flex items-center gap-2 mb-4">
                                    <span class="icon-[tabler--brand] size-4 text-cyan-500"></span>
                                    File Logo
                                </h4>
                                <div class="flex flex-col items-center gap-4 p-6 bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl border-2 border-cyan-100">
                                    <figure class="max-w-48">
                                        <div class="w-32 h-32 rounded-xl bg-white shadow-lg flex items-center justify-center overflow-hidden border-2 border-cyan-200">
                                            <img class="w-full h-full object-contain p-2" :title="data.appName" :src="data.file_logo" alt="Logo" />
                                        </div>
                                    </figure>
                                    <div class="w-full">
                                        <input type="file" x-ref="file" @change="file_upload"
                                            class="block w-full text-sm file:mr-0 file:py-2 file:px-4 file:rounded-xl file:border-2 file:border-cyan-200 file:bg-white file:text-cyan-600 file:font-semibold file:cursor-pointer hover:file:bg-cyan-50 hover:file:border-cyan-300 transition-all duration-200"
                                            aria-label="file-input" accept="image/*" />
                                        <p class="text-xs text-gray-500 mt-2">Maksimal 2MB (JPG, PNG)</p>
                                    </div>
                                    <button class="btn btn-gradient-to-r btn-cyan w-full gap-2 text-sm font-semibold shadow-lg shadow-cyan-500/30 hover:shadow-xl hover:shadow-cyan-500/40 transition-all duration-300" @click="logoUpload">
                                        <span class="icon-[hugeicons--file-upload] size-4"></span>
                                        Upload Logo
                                    </button>
                                </div>
                            </div>

                            <!-- Icon Upload -->
                            <div>
                                <h4 class="font-semibold text-gray-700 flex items-center gap-2 mb-4">
                                    <span class="icon-[tabler--fingerprint] size-4 text-blue-500"></span>
                                    File Icon
                                </h4>
                                <div class="flex flex-col items-center gap-4 p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border-2 border-blue-100">
                                    <figure class="max-w-48">
                                        <div class="w-32 h-32 rounded-xl bg-white shadow-lg flex items-center justify-center overflow-hidden border-2 border-blue-200">
                                            <img class="w-full h-full object-contain p-2" :title="data.appName" :src="data.icon" alt="Icon" />
                                        </div>
                                    </figure>
                                    <div class="w-full">
                                        <input type="file" x-ref="icon" @change="icon_upload"
                                            class="block w-full text-sm file:mr-0 file:py-2 file:px-4 file:rounded-xl file:border-2 file:border-blue-200 file:bg-white file:text-blue-600 file:font-semibold file:cursor-pointer hover:file:bg-blue-50 hover:file:border-blue-300 transition-all duration-200"
                                            aria-label="file-input" accept="image/*" />
                                        <p class="text-xs text-gray-500 mt-2">Maksimal 2MB (JPG, PNG)</p>
                                    </div>
                                    <button class="btn btn-gradient-to-r btn-blue w-full gap-2 text-sm font-semibold shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all duration-300" type="button" @click="iconUpload">
                                        <span class="icon-[hugeicons--file-upload] size-4"></span>
                                        Upload Icon
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
