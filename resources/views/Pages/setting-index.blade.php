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
        <div class="card bg-slate-50 dark:bg-gray-800">
            <div class="card-body">
                <div class="p-4 md:px-60 lg:px-72">
                    <h5 class="card-title mb-2.5">Konfigurasi Aplikasi</h5>
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                        <div class="lg:col-span-2">
                            <form @submit.prevent="submit" class="">
                                <div class="flex flex-col items-end gap-4">
                                    <div class="w-full">
                                        <label class="label label-text" for=""> App Name </label>
                                        <input x-model="data.appName" type="text" class="input" id="" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text"> Comment </label>
                                        <textarea x-model="data.comment" class="textarea"></textarea>
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text"> Address </label>
                                        <textarea class="textarea"  x-model="data.address"></textarea>
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text"></label> Telpon </label>
                                        <input x-model="data.phone" type="text" class="input" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text"> Email </label>
                                        <input x-model="data.email" type="text" class="input" />
                                    </div>

                                    <div class="flex justify-end gap-4 mt-3">
                                        <button class="btn btn-info btn-soft rounded-full px-4" type="submit">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="lg:col-span-1 flex item-center flex-col gap-4 py-6">
                            <figure class="">
                                <img class="rounded-lg"
                                    src="https://cdn.flyonui.com/fy-assets/components/card/image-9.png"
                                    alt="Watch" />
                            </figure>
                            <div>
                                <input type="file"
                                    class="block text-sm file:uppercase file:btn file:btn-secondary file:btn-soft file:rounded-full file:me-3"
                                    aria-label="file-input" />
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
                    data: {
                        appName: '',
                        appLogo: '',
                        comment: '',
                        address: '',
                        phone: '',
                        email: ''
                    },
                    submit: function() {
                        axios.post('/management/app-set-store', this.data)
                            .then(response => {
                                const data = response.data.data;
                                thisgetData();
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    },
                    getData: function() {
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
                                }
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    },
                    init: function() {
                        this.getData();
                        console.log('Setting Index');
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
