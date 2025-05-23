<x-base-layout>
    @push('css')
        <style>
            .my-actions {
                margin: 2em 2em 0;
            }

            .order-1 {
                order: 1;
            }

            .order-2 {
                order: 2;
            }

            .order-3 {
                order: 3;
            }

            .right-gap {
                margin-right: auto;
            }
        </style>
    @endpush
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
                            class="stepper-active:bg-primary stepper-active:shadow stepper-active:text-primary-content stepper-success:bg-primary stepper-success:shadow stepper-success:text-primary-content stepper-error:bg-error stepper-error:text-error-content stepper-completed:bg-success stepper-completed:group-focus:bg-success bg-base-200/50 text-base-content group-focus:bg-base-content/20 size-7.5 flex shrink-0 items-center justify-center rounded-full font-medium">
                            <span
                                class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-sm">1</span>
                            <span class="icon-[tabler--check] stepper-success:block hidden size-4 shrink-0"></span>
                            <span class="icon-[tabler--x] stepper-error:block hidden size-4 shrink-0"></span>
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
                            class="stepper-active:bg-primary stepper-active:shadow stepper-active:text-primary-content stepper-success:bg-primary stepper-success:shadow stepper-success:text-primary-content stepper-error:bg-error stepper-error:text-error-content stepper-completed:bg-success stepper-completed:group-focus:bg-success bg-base-200/50 text-base-content group-focus:bg-base-content/20 size-7.5 flex shrink-0 items-center justify-center rounded-full font-medium">
                            <span
                                class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-sm">2</span>
                            <span class="icon-[tabler--check] stepper-success:block hidden size-4 shrink-0"></span>
                            <span class="icon-[tabler--x] stepper-error:block hidden size-4 shrink-0"></span>
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
                            class="stepper-active:bg-primary stepper-active:shadow stepper-active:text-primary-content stepper-success:bg-primary stepper-success:shadow stepper-success:text-primary-content stepper-error:bg-error stepper-error:text-error-content stepper-completed:bg-success stepper-completed:group-focus:bg-success bg-base-200/50 text-base-content group-focus:bg-base-content/20 size-7.5 flex shrink-0 items-center justify-center rounded-full font-medium">
                            <span
                                class="stepper-success:hidden stepper-error:hidden stepper-completed:hidden text-sm">3</span>
                            <span class="icon-[tabler--check] stepper-success:block hidden size-4 shrink-0"></span>
                            <span class="icon-[tabler--x] stepper-error:block hidden size-4 shrink-0"></span>
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
                    <div class="grid gap-6 grid-cols-1 lg:grid-cols-5">
                        <div class="lg:col-span-2 flex flex-col gap-4">
                            <div class=" flex justify-between gap-4">
                                <input x-model="searchMaterial" @keyup.enter="getMaterialFunc" type="text"
                                    class="input rounded-full">
                                <div class="flex gap-2">
                                    <button x-on:click="getMaterialFunc" type="button"
                                        class="btn btn-circle btn-soft btn-info">
                                        <span class="icon-[fluent--box-search-24-regular]"
                                            style="width: 24px; height: 24px;"></span>
                                    </button>
                                    <button type="button" class="btn btn-circle btn-soft btn-warning"
                                        aria-haspopup="dialog" aria-expanded="false" aria-controls="add-item-modal"
                                        data-overlay="#add-item-modal">
                                        <span class="icon-[gridicons--add-outline]"
                                            style="width: 24px; height: 24px;"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <template x-for="item in xmaterial">
                                    <div class="border rounded-lg p-4">
                                        <div class="flex gap-2 justify-between flex-wrap items-center">
                                            <div class="flex flex-col gap-0">
                                                <span class="font-semibold font-space text-wrap"
                                                    x-text="item.nama_barang">Title</span>
                                                <i class="text-sm text-gray-400 flex justify-start gap-2">
                                                    <span>Rp. <span x-text="formatRupiah(item.price)"></span></span>
                                                    <span>|</span>
                                                    <span><span x-text="item.stock"></span> Pcs</span>
                                                </i>
                                            </div>
                                            <div class="flex gap-2">
                                                <div class="input-group min-w-32 max-w-32" data-input-number>
                                                    <span class="input-group-text gap-3">
                                                        <button type="button" @click="decrement(item.id)"
                                                            class="btn btn-primary btn-soft size-[22px] rounded-sm min-h-0 p-0"
                                                            aria-label="Decrement button" data-input-number-decrement>
                                                            <span
                                                                class="icon-[tabler--minus] size-3.5 shrink-0"></span>
                                                        </button>
                                                    </span>
                                                    <input x-model="xitem_qty[item.id]" class="input text-center"
                                                        id="number-input-mini" type="text" value="0"
                                                        data-input-number-input />
                                                    <span class="input-group-text gap-3">
                                                        <button type="button" @click="increment(item.id)"
                                                            class="btn btn-primary btn-soft size-[22px] rounded-sm min-h-0 p-0"
                                                            aria-label="Increment button" data-input-number-increment>
                                                            <span
                                                                class="icon-[tabler--plus] size-3.5 shrink-0"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <button x-on:click="addItem(item)" type="button"
                                                    class="btn btn-soft btn-error btn-circle">
                                                    <span class="icon-[typcn--arrow-right-outline]"
                                                        style="width: 24px; height: 24px;"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div class="lg:col-span-3">
                            <div class="border rounded-lg p-4 flex flex-col gap-4">
                                <h5 class="text-md font-semibold flex gap-4 items-center mb-2">
                                    <span class="icon-[circum--box-list]" style="width: 24px; height: 24px;"></span>
                                    Material Produksi
                                </h5>
                                <div class="border-base-content/25 w-full rounded-lg border">
                                    <div class="overflow-x-auto">
                                        <table class="table rounded-sm">
                                            <thead>
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Total</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template x-for="item in xitems" :key="item.item_code">
                                                    <tr class="hover:bg-slate-100">
                                                        <td class="flex flex-col gap-1 font-space">
                                                            <span x-text="item.item_name">Product name</span>
                                                            <div
                                                                class="flex gap-2 text-xs text-red-400 dark:text-white">
                                                                <span x-text="formatRupiah(item.item_price)">
                                                                    Rp. 3.000
                                                                </span>
                                                                *
                                                                <span x-text="item.item_qty">3</span>
                                                            </div>
                                                        </td>
                                                        <td x-text="formatRupiah(item.item_total)">Rp. 9.000</td>
                                                        <td>
                                                            <button x-on:click="deleteItem(item.item_code)"
                                                                type="button"
                                                                class="btn btn-circle btn-error btn-soft">
                                                                <span class="icon-[tabler--trash]"
                                                                    style="width: 24px; height: 24px;">
                                                                </span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-4 grid-cols-1 md:grid-cols-5 mt-4">
                                <div class="col-span-1 md:col-span-2">
                                    <div class="border rounded-lg p-4">
                                        <h5 class=" text-md font-semibold flex gap-4 items-center mb-3">
                                            <span class="icon-[si--wallet-detailed-duotone]"
                                                style="width: 24px; height: 24px;"></span>
                                            Biaya
                                        </h5>
                                        <div class="flex flex-col gap-4">
                                            <div class="flex flex-col gap-2">
                                                <label>Biaya Material</label>
                                                <input x-model="xproduction.cost" readonly
                                                    class="input input-lg w-full bg-gray-300" type="number" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label>Biaya Produksi</label>
                                                <input @keyup="subtotal" x-model="xproduction.price"
                                                    class="input w-full" type="number" />
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label>Subtotal</label>
                                                <input x-model="xproduction.subtotal"
                                                    class="input input-lg w-full bg-gray-300" type="text"
                                                    readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-1 md:col-span-3">
                                    <div class="border rounded-lg p-4">
                                        <h5 class=" text-md font-semibold flex gap-4 items-center mb-3">
                                            <span class="icon-[carbon--ibm-data-product-exchange]"
                                                style="width: 24px; height: 24px;"></span>
                                            Product
                                        </h5>
                                        <div class="flex flex-col gap-2 mt-2">
                                            <label>Title Product</label>
                                            <input class="input w-full" type="text" x-model="xproduction.title" />
                                        </div>
                                        <div class="flex flex-col gap-2 mt-">
                                            <label>Keterangan</label>
                                            <textarea x-model="xproduction.keterangan" class="textarea" placeholder="Keterangan ..."></textarea>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                                            <div class="w-full">
                                                <label class="label label-text" for="favorite-simpson">Crafter</label>
                                                <select x-model="xproduction.crafter" class="select"
                                                    id="favorite-simpson">
                                                    <option>Pilih..</option>
                                                    <template x-for="val in xcrafter">
                                                        <option :value="val.id" x-text="val.pegawai_name">
                                                        </option>
                                                    </template>
                                                </select>
                                            </div>
                                            <div class="w-full">
                                                <label class="label label-text" for="favorite-simpson">
                                                    Jasa Crafter
                                                </label>
                                                <select x-model="xproduction.jasa" class="select"
                                                    id="favorite-simpson">
                                                    <option value="">Pilih...</option>
                                                    <template x-for="val in xjasalayanan">
                                                        <option :value="val.id">
                                                            <span x-text="val.title"></span> |
                                                            <i class="text-sm font-semibold"
                                                                x-text="formatRupiah(val.salary)"></i>
                                                        </option>
                                                    </template>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 px-2 md:px-0">
                                <button class="btn btn-soft btn-error w-full rounded-full" x-on:click="addProduct">
                                    <span class="icon-[hugeicons--file-add] size-5"></span>
                                    Add Pre-order List
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="personal-info-validation" class="space-y-5" data-stepper-content-item='{ "index": 2 }'
                    style="display: none">
                    <div class="flex gap-4 mb-8">
                        <span class="icon-[gravity-ui--trolley] size-6 text-orange-500"></span>
                        <span class="text-gray-400 text-lg font-semibold">
                            Pre-order List
                        </span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                        <div class="col-span-1 md:col-span-4 p-4 py-0">
                            <div class="border-base-content/25 w-full rounded-lg border">
                                <div class="overflow-x-auto">
                                    <table class="table rounded-sm">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-if="xproduct <= 0">
                                                <tr>
                                                    <td class="text-gray-400" colspan="5">
                                                        Empty data!
                                                    </td>
                                                </tr>
                                            </template>
                                            <template x-for="item in xproduct">
                                                <tr>
                                                    <td class="text-nowrap" x-text="item.title"></td>
                                                    <td x-text="formatRupiah(item.total_cost)"></td>
                                                    <td x-text="item.qty"></td>
                                                    <td x-text="formatRupiah(item.qty * item.total_cost)"></td>
                                                    <td>
                                                        <button type="button" x-on:click="delProduct(item._fake_id)"
                                                            class="btn btn-circle btn-text btn-sm btn-error btn-soft"
                                                            aria-label="Action button"><span
                                                                class="icon-[tabler--trash] size-5"></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-2 p-4 py-0 flex flex-col gap-2">
                            <div
                                class="w-full rounded-lg p-4 px-6 bg-red-400 shadow-sm flex justify-between items-center">
                                <div class="text-white flex flex-col gap-2">
                                    <label for="">Subtotal Pembayaran</label>
                                    <div class="font-bold text-2xl">
                                        Rp.
                                        <span x-text="subtotalPreorderView">0</span>
                                    </div>
                                </div>
                                <div class="avatar placeholder">
                                    <div class="bg-white text-red-300 w-14 rounded-full">
                                        <span class="icon-[solar--tag-price-linear] size-8"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 mt-4">
                                <label class="" for="floatingInput">Estimasi</label>
                                <input x-model="xproduction.estimasi" type="text" class="input flatpickr-input"
                                    placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" readonly="readonly">
                            </div>
                            <div class="flex flex-col gap-2 mb-3">
                                <label class="" for="textareaFloating">Keterangan</label>
                                <textarea x-model="xproduction.comment" class="textarea" placeholder="" id=""></textarea>
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
                            Profile Costumer
                        </span>
                    </div>

                    <div class="grid gap-6 grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-4 flex flex-col">
                            <div class="border rounded-xl p-8 flex flex-col gap-4">
                                <div class="w-full">
                                    <label class="label label-text" for=""> Nama Costumer </label>
                                    <input x-model="xcostumer.name" type="text" placeholder="nama costumer"
                                        class="input" id="" />
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex items-center gap-1">
                                        <input x-model="xcostumer.gender" :value="1" type="radio"
                                            name="radio-3" class="radio-inset radio-inset-primary" id="radioType3" />
                                        <label class="label label-text text-base" for="radioType3"> Pria </label>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <input x-model="xcostumer.gender" :value="0" type="radio"
                                            name="radio-3" class="radio-inset radio-inset-primary" id="radioType4"
                                            checked />
                                        <label class="label label-text text-base" for="radioType4"> Wanita </label>
                                    </div>
                                </div>
                                <div class="w-full hidden">
                                    <label class="label label-text" for=""> Alamat Costumer</label>
                                    <textarea x-model="xcostumer.address" type="text" placeholder="Alamat..." class="textarea" id=""></textarea>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="w-full">
                                        <label class="label label-text" for="">Telpon </label>
                                        <input x-model="xcostumer.phone" @keyup.enter="findCostumer" type="text"
                                            placeholder="08..." class="input" id="" />
                                    </div>
                                    <div class="w-full hidden">
                                        <label class="label label-text" for="">Email</label>
                                        <input x-model="xcostumer.email" type="text" placeholder=".....@mail.com"
                                            class="input" id="" />
                                    </div>
                                </div>
                                <div class="w-full hidden">
                                    <label class="label label-text" for="">Sosial Media
                                        (FB/IG/Tiktok/Lainnya)</label>
                                    <input x-model="xcostumer.sosmed" type="text" placeholder="@username-sosmed"
                                        class="input" id="" />
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
                                    <span class="text-4xl font-semibold font-space text-white">Rp.
                                        <span x-text="xcostumer.point_view"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="py-4">
                                <div class="flex items-center gap-1.5">
                                    <input x-model="xcostumer.point_use" type="checkbox"
                                        class="switch switch-outline switch-lg switch-primary" id="" />
                                    <label class="label label-text text-lg font-semibold font-space text-gray-700"
                                        for=""> Gunakan Point </label>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span>INFORMASI :</span>
                                <br>
                                <i class="text-sm text-warning">
                                    Gunakan nomor telpon untuk pencarian data costumer member!
                                </i>
                            </div>
                        </div>
                    </div>

                </div>
                <div data-stepper-content-item='{ "isFinal": true }' style="display: none">
                    <div class="bg-base-200/50 flex h-48 items-center justify-center rounded-xl p-4">
                        <h3 class="text-base-content/50 text-3xl">Your Form has been Submitted</h3>
                    </div>
                </div>
                <div class="mt-16 flex items-center justify-start gap-x-2 font-space">
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

                    <button :disabled="isStoring" type="button" x-on:click="resetFrom"
                        class="btn rounded-full px-8 btn-primary" data-stepper-reset-btn="" style="display: none">
                        <span x-text="isStoring ? 'Is Loading...!':'Back'" x-show="!isSuccess"></span>
                        <span x-show="isSuccess">Back</span>

                    </button>
                    <button x-show="isPembayaran" type="button" x-on:click="prosesBayar"
                        class="btn rounded-full px-8 btn-error" data-stepper-reset-btn="">Proses Pembayaran</button>
                </div>
            </div>
        </div>

        {{-- modal item add --}}
        <div id="add-item-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div
                class="modal-dialog overlay-open:mt-12 overlay-open:opacity-100 overlay-open:duration-500 transition-all ease-out">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Form item</h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#add-item-modal" id="close-modal">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <form @submit.prevent="addCostumeItem">
                        <div class="modal-body flex flex-col gap-2">
                            <div class="w-full">
                                <label class="label label-text" for="inte-name">
                                    Nama item
                                </label>
                                <input x-model="csForm.item" type="text" placeholder="item name" class="input"
                                    id="inte-name" />
                            </div>
                            <div class="grid grid-flow-row md:grid-cols-3 gap-2">
                                <div class="md:col-span-2 w-full">
                                    <label class="label label-text" for="biaya">
                                        Biaya
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input x-model="csForm.price" type="number" class="input grow"
                                            placeholder="00.00" id="biaya" />
                                        <label class="sr-only" for="biaya">Enter amount</label>
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label class="label label-text" for="qty">
                                        Qty
                                    </label>
                                    <input x-model="csForm.qty" type="number" placeholder="qty" class="input"
                                        id="qty" />
                                </div>
                            </div>
                            <div class="relative mt-2">
                                <textarea x-model="csForm.comment" class="textarea textarea-floating peer" placeholder="comment..."
                                    id="comment-cs-form"></textarea>
                                <label class="textarea-floating-label" for="comment-cs-form">Comment</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-soft btn-secondary" data-overlay="#add-item-modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Add item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end modal --}}
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
                    searchMaterial: '',
                    xmaterial: [],
                    xcostumer: {
                        status: false, // false = non member (new cs) | true = member
                        point: 0,
                        point_use: false, // false = tidak menggunakan point | true = menggunakan point
                        id: '',
                        name: '',
                        gender: '',
                        address: '',
                        phone: '',
                        email: '',
                        sosmed: '',
                        point_view: ''
                    },
                    xproduction: {
                        crafter: '',
                        jasa: '',
                        title: '',
                        keterangan: '',
                        deskripsi: '',
                        estimasi: '',
                        comment: '',
                        cost: 0,
                        price: 25000,
                        subtotal: 0
                    },
                    xitems: [],
                    csForm: {
                        item: '',
                        price: '',
                        qty: '',
                        comment: ''
                    },
                    xitem_qty: [],
                    isPembayaran: false,
                    isStoring: false,
                    isSuccess: false,
                    transaksi_id: '',
                    prosesBayar() {
                        try {
                            console.log(this.transaksi_id);
                            window.location.href = `/transaksi/kasir-proses-bayar/${this.transaksi_id}`;
                        } catch (error) {
                            console.log(this.transaksi_id);
                            console.log(error);
                        }
                    },
                    async storeFinish() {
                        const data = {
                            costumer: this.xcostumer,
                            product: this.xproduct,
                            estimasi: this.xproduction.estimasi,
                            subtotal: this.subtotalPreorder,
                            keterangan: this.xproduction.comment
                        }
                        this.isStoring = true;
                        try {
                            const url = "/transaksi/pre-order-action";
                            const store = await axios.post(url, data);
                            const res = store.data;
                            console.log(res);
                            this.transaksi_id = res.data.transaction_id;
                            console.log(this.transaksi_id);

                            this.isPembayaran = true;
                            this.isSuccess = true;
                        } catch (err) {
                            this.isStoring = false;
                            const errResponse = err.response;
                            if (errResponse.status === 400) {
                                const resErrors = errResponse.data.errors;
                                let delay = 0;
                                resErrors.forEach(element => {
                                    setTimeout(() => {
                                        notifier.warning(element);
                                    }, delay);
                                    delay += 250;
                                });
                            } else {
                                notifier.error('System Error!');
                            }
                        }
                    },

                    resetFrom() {
                        this.isPembayaran = false;
                        this.isStoring = false;
                    },

                    getMaterialFunc() {
                        axios.get(`/transaksi/get-material?key=${this.searchMaterial}`)
                            .then((res) => {
                                const data = res.data.data;
                                this.xmaterial = data;
                            }).catch((err) => {
                                console.log(err);
                            })
                    },
                    
                    increment(index) {
                        if (this.xitem_qty[index] === undefined) {
                            this.xitem_qty[index] = 0;
                        }
                        this.xitem_qty[index]++;
                    },
                    decrement(index) {
                        if (this.xitem_qty[index] === undefined || this.xitem_qty[index] === 0) {
                            this.xitem_qty[index] = 0;
                            return;
                        }
                        this.xitem_qty[index]--;
                    },

                    addItem(index) {
                        const i = index;
                        const qty = parseInt(this.xitem_qty[i.id]);
                        if (qty <= 0 || !qty) {
                            notifier.warning("Qty is empty!");
                            return;
                        }
                        const item = {
                            item_code: i.id,
                            item_name: i.nama_barang,
                            item_price: parseInt(i.price),
                            item_qty: qty,
                            item_total: parseInt(i.price) * qty,
                            item_status: false,
                            comment: ''
                        }
                        let data = this.xitems.find(result => result.item_code === item.item_code);
                        if (data) {
                            data.item_qty = item.item_qty;
                            data.item_total = item.item_qty * parseInt(i.price);
                        } else {
                            this.xitems.push(item);
                        }
                        this.sumTotalCost();
                    },

                    deleteItem(index) {
                        this.xitems = this.xitems.filter(result => result.item_code !== index);
                        this.sumTotalCost();
                        this.subtotal();
                    },

                    xcrafter: [],
                    getCrafter() {
                        axios.get(`/transaksi/get-crafter`)
                            .then((res) => {
                                const data = res.data.data;
                                this.xcrafter = data;
                            }).catch((err) => {
                                console.log(err);
                            });
                    },

                    xjasalayanan: [],
                    getJasa() {
                        axios.get(`/transaksi/get-referensi-jasa`)
                            .then((res) => {
                                const data = res.data.data;
                                this.xjasalayanan = data;
                            }).catch((err) => {
                                console.log(err);
                            })
                    },

                    sumTotalCost() {
                        let cost = 0;
                        this.xitems.forEach(element => {
                            cost += parseInt(element.item_total);
                        });
                        this.xproduction.cost = cost;
                        this.subtotal();
                    },

                    subtotal() {
                        this.xproduction.subtotal = parseInt(this.xproduction.price) + parseInt(this.xproduction.cost);
                    },

                    addCostumeItem() {
                        try {
                            const item = {
                                item_code: uuid(),
                                item_name: this.csForm.item,
                                item_price: parseInt(this.csForm.price),
                                item_qty: parseInt(this.csForm.qty),
                                item_total: parseInt(this.csForm.price) * parseInt(this.csForm.qty),
                                item_status: true,
                                comment: this.csForm.comment
                            }
                            this.xitems.push(item);
                            this.sumTotalCost();

                            const btnClose = document.getElementById("close-modal");
                            btnClose.click();
                            this.csForm = {
                                item: "",
                                price: "",
                                qty: "",
                            };
                        } catch (error) {
                            console.log(error);

                        }
                    },

                    findCostumer() {
                        axios.get(`/transaksi/find-costumer/${this.xcostumer.phone}`)
                            .then((res) => {
                                const costumer = res.data.data;
                                let point = parseInt(costumer.point_member);
                                this.xcostumer = {
                                    status: true,
                                    point: point,
                                    id: costumer.id,
                                    name: costumer.name,
                                    gender: costumer.jenis_kelamin === "L" ? true : false,
                                    address: costumer.alamat,
                                    phone: costumer.no_telp,
                                    email: costumer.email,
                                    sosmed: costumer.sosmed,
                                    point_view: formatRupiah(point)

                                }
                                console.log(this.xcostumer);

                            }).catch((err) => {
                                console.log(err);

                            })
                    },

                    xproduct: [],
                    addProduct() {
                        if (this.xitems <= 0 || this.xproduction.title == '' || this.xproduction.jasa == '' || this.xproduction
                            .crafter == '') { // items is array [{object data}]
                            if (this.xitems <= 0 || this.xproduction.price == '' || this.xproduction.subtotal == '') {
                                notifier.warning("Please add items!");
                            }
                            if (this.xproduction.title == '') {
                                notifier.warning("Please add title!");
                            }
                            if (this.xproduction.jasa == '') {
                                notifier.warning("Please add jasa!");
                            }
                            if (this.xproduction.crafter == '') {
                                notifier.warning("Please add crafter!");
                            }
                            if (this.production.price == '') {
                                notifier.warning("Please add cost production!");
                            }
                            return;
                        }

                        Swal.fire({
                            title: "Konfirmasi ?",
                            text: "yakin ingin tambah product pre-order!",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, tambah!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                try {
                                    const materials = this.xitems
                                    let product_data = {
                                        _fake_id: uuid(),
                                        title: this.xproduction.title,
                                        metarials: materials,
                                        description: this.xproduction.keterangan,
                                        qty: 1,
                                        cost_material: this.xproduction.cost,
                                        cost_production: this.xproduction.price,
                                        total_cost: this.xproduction.subtotal,
                                        crafter: this.xproduction.crafter,
                                        jasa: this.xproduction.jasa,
                                    }
                                    this.xproduct.push(product_data);
                                    this.xitems = [];
                                    this.xproduction = {
                                        crafter: '',
                                        jasa: '',
                                        title: '',
                                        keterangan: '',
                                        deskripsi: '',
                                        estimasi: '',
                                        comment: '',
                                        cost: 0,
                                        price: 25000,
                                        subtotal: 0
                                    };
                                    this.hitungTotalPreorder();
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Product pre-order berhasil ditambahkan.",
                                        icon: "success"
                                    });
                                    console.log(this.xproduct);
                                } catch (error) {
                                    Swal.fire({
                                        title: "Opss!!!",
                                        text: "Product pre-order gagal ditambahkan!.",
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    },

                    delProduct(fakeId) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Yakin ingin hapus product item ?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Yes, Hapus!',
                            denyButtonText: 'Tidak',
                            customClass: {
                                actions: 'my-actions',
                                cancelButton: 'order-1 right-gap',
                                confirmButton: 'order-2',
                                denyButton: 'order-3',
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.xproduct = this.xproduct.filter(product => product._fake_id !== fakeId);
                                this.hitungTotalPreorder();
                                Swal.fire('Product Item berhasil dihapus!', '', 'success')
                            } else if (result.isDenied) {
                                Swal.fire('Proses dibatalkan!', '', 'info')
                            }
                        })
                    },

                    subtotalPreorder: 0,
                    subtotalPreorderView: 0,
                    hitungTotalPreorder() {
                        let total = 0;
                        this.xproduct.forEach(product => {
                            total += parseInt(product.total_cost);
                        });
                        this.subtotalPreorder = total;
                        this.subtotalPreorderView = formatRupiah(total);
                        return;
                    },

                    init() {
                        this.getMaterialFunc();
                        this.getJasa();
                        this.getCrafter()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
