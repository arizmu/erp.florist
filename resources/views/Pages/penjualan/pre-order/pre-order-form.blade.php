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
                Pre-order
            </li>
        </ol>
    </div>
    <div class="mt-4" x-data="indexPreorder">
        <div data-stepper=""
            class="bg-base-100 flex w-full items-start gap-10 rounded-lg p-8 md:px-24 shadow-lg max-sm:flex-wrap max-sm:justify-center min-h-96 md:gap-24 md:py-24"
            id="wizard-validation">
            <ul class="relative flex flex-col gap-y-4">
                <li class="group flex flex-1 flex-col items-center" data-stepper-nav-item='{ "index": 1 }'>
                    <span class="min-h-7.5 group inline-flex flex-col items-center gap-2 align-middle text-sm">
                        <span
                            class="stepper-active:bg-primary stepper-active:shadow stepper-active:text-primary-content stepper-success:bg-primary stepper-success:shadow stepper-success:text-primary-content stepper-error:bg-error stepper-error:text-error-content stepper-completed:bg-success stepper-completed:group-focus:bg-success bg-base-200/50 text-base-content group-focus:bg-base-content/20 size-7.5 flex flex-shrink-0 items-center justify-center rounded-full font-medium">
                            <span
                                class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-sm">1</span>
                            <span class="icon-[tabler--check] stepper-success:block hidden size-4 flex-shrink-0"></span>
                            <span class="icon-[tabler--x] stepper-error:block hidden size-4 flex-shrink-0"></span>
                        </span>
                        <span class="text-base-content text-nowrap font-medium">
                            Material Produksi
                        </span>
                    </span>
                    <div
                        class="stepper-success:bg-primary stepper-completed:bg-success bg-base-content/20 mt-2 h-8 w-px group-last:hidden">
                    </div>
                </li>
                <li class="group flex flex-1 flex-col items-center" data-stepper-nav-item='{ "index": 2 }'>
                    <span class="min-h-7.5 group inline-flex flex-col items-center gap-2 align-middle text-sm">
                        <span
                            class="stepper-active:bg-primary stepper-active:shadow stepper-active:text-primary-content stepper-success:bg-primary stepper-success:shadow stepper-success:text-primary-content stepper-error:bg-error stepper-error:text-error-content stepper-completed:bg-success stepper-completed:group-focus:bg-success bg-base-200/50 text-base-content group-focus:bg-base-content/20 size-7.5 flex flex-shrink-0 items-center justify-center rounded-full font-medium">
                            <span
                                class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-sm">2</span>
                            <span class="icon-[tabler--check] stepper-success:block hidden size-4 flex-shrink-0"></span>
                            <span class="icon-[tabler--x] stepper-error:block hidden size-4 flex-shrink-0"></span>
                        </span>
                        <span class="text-base-content text-nowrap font-medium">
                            Profile Costumer
                        </span>
                    </span>
                    <div
                        class="stepper-success:bg-primary stepper-completed:bg-success bg-base-content/20 mt-2 h-8 w-px group-last:hidden">
                    </div>
                </li>
                <li class="group flex flex-1 flex-col items-center" data-stepper-nav-item='{ "index": 3 }'>
                    <span class="min-h-7.5 group inline-flex flex-col items-center gap-2 align-middle text-sm">
                        <span
                            class="stepper-active:bg-primary stepper-active:shadow stepper-active:text-primary-content stepper-success:bg-primary stepper-success:shadow stepper-success:text-primary-content stepper-error:bg-error stepper-error:text-error-content stepper-completed:bg-success stepper-completed:group-focus:bg-success bg-base-200/50 text-base-content group-focus:bg-base-content/20 size-7.5 flex flex-shrink-0 items-center justify-center rounded-full font-medium">
                            <span
                                class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-sm">3</span>
                            <span class="icon-[tabler--check] stepper-success:block hidden size-4 flex-shrink-0"></span>
                            <span class="icon-[tabler--x] stepper-error:block hidden size-4 flex-shrink-0"></span>
                        </span>
                        <span class="text-base-content text-nowrap font-medium">Crafter</span>
                    </span>
                    <div
                        class="stepper-success:bg-primary stepper-completed:bg-success bg-base-content/20 mt-2 h-8 w-px group-last:hidden">
                    </div>
                </li>
            </ul>
            <div id="wizard-validation-form" class="form-validate w-full p-3 md:p-8 border rounded-lg" novalidate>
                <div id="account-details-validation" class="space-y-5" data-stepper-content-item='{ "index": 1 }'>
                    <div class="flex gap-4 mb-8">
                        <span class="icon-[solar--box-broken] text-red-400" style="width: 24px; height: 24px;"></span>
                        <span class="text-gray-400 text-lg font-semibold">
                            Material Produksi
                        </span>
                    </div>
                    <div class="grid gap-6 grid-cols-1 md:grid-cols-5">
                        <div class="md:col-span-2 flex flex-col gap-4">
                            <div class="border rounded-lg p-4 flex justify-between gap-4">
                                <input type="text" class="input rounded-full">
                                <div class="flex gap-2">
                                    <button type="button" class="btn btn-circle btn-soft btn-info">
                                        <span class="icon-[fluent--box-search-24-regular]"
                                            style="width: 24px; height: 24px;"></span>
                                    </button>
                                    <button type="button" class="btn btn-circle btn-soft btn-warning">
                                        <span class="icon-[gridicons--add-outline]"
                                            style="width: 24px; height: 24px;"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="border rounded-lg p-4">
                                <span class="text-gray-300">
                                    Search product Bahan baku!
                                </span>
                            </div>
                        </div>
                        <div class="md:col-span-3">
                            <div class="border-base-content/25 w-full rounded-lg border">
                                <div class="overflow-x-auto">
                                    <table class="table rounded">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Total</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="hover:bg-slate-100">
                                                <td class="flex flex-col gap-1 font-space">
                                                    <span>Product name</span>
                                                    <div class="flex gap-2 text-xs text-red-400 dark:text-white">
                                                        <span>
                                                            Rp. 3.000
                                                        </span>
                                                        *
                                                        <span>3</span>
                                                    </div>
                                                </td>
                                                <td>Rp. 9.000</td>
                                                <td>
                                                    <button class="btn btn-circle btn-error btn-soft">
                                                        <span class="icon-[tabler--trash]"
                                                            style="width: 24px; height: 24px;"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="personal-info-validation" class="space-y-5" data-stepper-content-item='{ "index": 2 }'
                    style="display: none">
                    <div class="flex gap-4 mb-8">
                        <span class="icon-[solar--user-id-line-duotone] text-red-400"
                            style="width: 24px; height: 24px;"></span>
                        <span class="text-gray-400 text-lg font-semibold">
                            Profile Costumer
                        </span>
                    </div>

                    <div class="grid gap-6 grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-4 flex flex-col">
                            <div class="border rounded-xl p-8 flex flex-col gap-4">
                                <div class="w-full">
                                    <label class="label label-text" for=""> Nama Costumer </label>
                                    <input type="text" placeholder="nama costumer" class="input" id="" />
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex items-center gap-1">
                                        <input type="radio" name="radio-3" class="radio-inset radio-inset-primary"
                                            id="radioType3" />
                                        <label class="label label-text text-base" for="radioType3"> Pria </label>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <input type="radio" name="radio-3" class="radio-inset radio-inset-primary"
                                            id="radioType4" checked />
                                        <label class="label label-text text-base" for="radioType4"> Wanita </label>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for=""> Alamat Costumer</label>
                                    <textarea type="text" placeholder="Alamat..." class="textarea" id=""></textarea>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="w-full">
                                        <label class="label label-text" for="">Telpon </label>
                                        <input type="text" placeholder="08..." class="input" id="" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text" for="">Email</label>
                                        <input type="text" placeholder=".....@mail.com" class="input"
                                            id="" />
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="">Sosial Media
                                        (FB/IG/Tiktok/Lainnya)</label>
                                    <input type="text" placeholder="@username-sosmed" class="input"
                                        id="" />
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="bg-blue-300 p-5 rounded-lg flex flex-col gap-4">
                                <div class="flex gap-4">
                                    <span class="icon-[iconoir--coins] text-yellow-200"
                                        style="width: 24px; height: 24px;"></span>
                                    <span class="font-space font-semibold text-white">Point Member</span>
                                </div>
                                <div class="flex justify-start mb-4">
                                    <span class="text-4xl font-semibold font-space text-white">Rp. 500.000</span>
                                </div>
                            </div>
                            <div class="mt-8">
                                <span>INFORMASI :</span>
                                <br>
                                <i class="text-sm text-warning">
                                    Gunakan nomor telpon untuk pencarian data costumer member!
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="social-links-validation" class="space-y-5" data-stepper-content-item='{ "index": 3}'
                    style="display: none">

                    <div class="flex gap-4 mb-8">
                        <span class="icon-[solar--user-id-line-duotone] text-red-400"
                            style="width: 24px; height: 24px;"></span>
                        <span class="text-gray-400 text-lg font-semibold">
                            Crafter
                        </span>
                    </div>
                    <div class="border rounded-xl p-8 flex gap-4 flex-col">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="w-full">
                                <label class="label label-text" for="favorite-simpson">Crafter</label>
                                <select class="select" id="favorite-simpson">
                                    <option>The Godfather</option>
                                    <option>The Shawshank Redemption</option>
                                    <option>Pulp Fiction</option>
                                    <option>The Dark Knight</option>
                                    <option>Schindler's List</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label class="label label-text" for="favorite-simpson">
                                    Jasa Crafter
                                </label>
                                <select class="select" id="favorite-simpson">
                                    <option>The Godfather</option>
                                    <option>The Shawshank Redemption</option>
                                    <option>Pulp Fiction</option>
                                    <option>The Dark Knight</option>
                                    <option>Schindler's List</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="relative">
                                <input x-model="detail.title_product" type="text" placeholder="nama bucket"
                                    class="input input-floating peer" id="">
                                <label class="input-floating-label" for="">Produk Title</label>
                            </div>
                            <div class="relative">
                                <input x-model="detail.estimasi" type="text"
                                    class="input input-floating peer flatpickr-input"
                                    placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" readonly="readonly">
                                <label class="input-floating-label" for="floatingInput">Estimasi</label>
                            </div>
                        </div>
                        <div class="relative mb-3">
                            <textarea x-model="detail.comment" class="textarea textarea-floating peer" placeholder="" id="textareaFloating"></textarea>
                            <label class="textarea-floating-label" for="textareaFloating">Comment</label>
                        </div>
                    </div>
                </div>
                <div data-stepper-content-item='{ "isFinal": true }' style="display: none">
                    <div class="bg-base-200/50 flex h-48 items-center justify-center rounded-xl p-4">
                        <h3 class="text-base-content/50 text-3xl">Your Form has been Submitted</h3>
                    </div>
                </div>
                <div class="mt-16 flex items-center justify-between gap-x-2 font-space">
                    <button type="button" class="btn rounded-full px-8 btn-primary btn-prev max-sm:btn-square"
                        data-stepper-back-btn="">
                        <span class="icon-[tabler--chevron-left] text-primary-content size-5 rtl:rotate-180"></span>
                        <span class="max-sm:hidden">Back</span>
                    </button>
                    <button type="button" class="btn rounded-full px-8 btn-primary btn-next max-sm:btn-square"
                        data-stepper-next-btn="">
                        <span class="max-sm:hidden">Next</span>
                        <span class="icon-[tabler--chevron-right] text-primary-content size-5 rtl:rotate-180"></span>
                    </button>

                    <button x-on:click="storeFinish" type="button" class="btn rounded-full px-8 btn-primary"
                        data-stepper-finish-btn="" style="display: none">
                        <span class="icon-[mynaui--store]" style="width: 24px; height: 24px;"></span>
                        <span x-text="isStoring ? 'Processing...':'Finishing Store'"></span>
                    </button>

                    <button type="button" x-on:click="resetFrom" class="btn rounded-full px-8 btn-primary"
                        data-stepper-reset-btn="" style="display: none">Reset</button>
                    <button x-show="isPembayaran" type="button" class="btn rounded-full px-8 btn-error"
                        data-stepper-reset-btn="">Proses Pembayaran</button>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            window.addEventListener('load', function() {
                flatpickr('.jsPickr', {
                    allowInput: true,
                    monthSelectorType: 'static'
                })

                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            })
        </script>
        <script>
            function indexPreorder() {
                return {
                    xmaterial: [],
                    xcostumer: {
                        status: false, // false = non member (new cs) | true = member
                        point: '',
                        point_use: false, // false = tidak menggunakan point | true = menggunakan point
                        id: '',
                        name: '',
                        gender: '',
                        address: '',
                        phone: '',
                        email: '',
                        sosmed: ''
                    },
                    xproduction: {
                        crafter: '',
                        jasa: '',
                        title: '',
                        estimasi: '',
                        comment: ''
                    },
                    isPembayaran: false,
                    isStoring: false,
                    storeFinish() {
                        this.isPembayaran = true;
                    },
                    resetFrom() {
                        this.isPembayaran = false;
                        this.isStoring = false;
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
