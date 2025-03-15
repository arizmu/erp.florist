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
                Kasir Pembayaran
            </li>
        </ol>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4 mt-2 py-2" x-data="pembayaran({{ $data }})">
        <div class="md:col-span-1 lg:col-span-4 order-last md:order-first">
            <div class="bg-white p-6 rounded-lg shadow-lg min-h-96 max-h-screen">
                <h2 class="font-space flex items-center gap-4 text-gray-500">
                    <span class="icon-[carbon--product] size-6 text-blue-500"></span>
                    <span class="text-lg font-semibold"> Detail Product</span>
                </h2>
                <div class="border-base-content/25 w-full rounded-lg border mt-4">
                    <div class="overflow-x-auto">
                        <table class="table rounded">
                            <!-- head -->
                            <thead class="bg-slate-200">
                                <tr>
                                    <th>
                                        <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                            aria-label="product" />
                                    </th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="item in indexData.details">
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                                    aria-label="product" />
                                            </label>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                {{-- <div class="avatar">
                                                    <div class="bg-base-content/10 h-10 w-10 rounded-md">
                                                        <img src="https://cdn.flyonui.com/fy-assets/components/table/product-2.png"
                                                            alt="product image" />
                                                    </div>
                                                </div> --}}
                                                <div>
                                                    <div class="font-medium capitalize" x-text="item.item_name">Item
                                                        Name</div>
                                                    <div class="text-sm opacity-50" x-text="item.code_product">-</div>
                                                    <span class="badge badge-soft badge-sm badge-warning"
                                                        x-show="item.costume_status">
                                                        COSTUME
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex gap-2 flex-wrap">
                                                <span class="badge badge-soft badge-info">
                                                    Rp.
                                                    <span
                                                        x-text="parseInt(item.cost_item).toLocaleString('id-ID')"></span>
                                                </span>
                                                <span x-show="item.costume_status"
                                                    class="badge badge-soft badge-warning"
                                                    x-text="parseInt(item.costume_total).toLocaleString('id-ID')"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span x-text="item.amount_item"></span>
                                        </td>
                                        <td>
                                            Rp.
                                            <span x-text="parseInt(item.total_cost).toLocaleString('id-ID')"></span>
                                        </td>
                                        {{-- <td></td> --}}
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-5">
                    <h2 class="font-space flex items-center gap-4 text-gray-500">
                        <span class="icon-[carbon--product] size-5 text-blue-500"></span>
                        <span class="text-lg font-semibold">Costumer</span>
                    </h2>
                    <div class="flex justify-start flex-wrap gap-4 mt-3">
                        <div class="sm:w-full md:w-full lg:w-8/12 p-5 border rounded-lg flex flex-col gap-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div class="relative">
                                    <input x-model="xform.costumer.nama" type="text" placeholder="Costumer"
                                        class="input input-filled peer" id="nama_costumer" />
                                    <label class="input-filled-label" for="nama_costumer">
                                        Costumer
                                    </label>
                                    <span class="input-filled-focused"></span>
                                </div>
                                <div class="relative">
                                    <input x-model="xform.costumer.telpon" type="text" @keyup.tab="findCostumer"
                                        @keyup.enter="findCostumer" placeholder="08***" class="input input-filled peer"
                                        id="nama_costumer" />
                                    <label class="input-filled-label" for="nama_costumer">Telpon</label>
                                    <span class="input-filled-focused"></span>
                                </div>
                            </div>
                            <div class="relative">
                                <textarea x-model='xform.costumer.alamat' class="textarea textarea-filled peer" placeholder="Alamat..."
                                    id="alamat_costumer"></textarea>
                                <label class="textarea-filled-label" for="alamat_costumer">Alamat
                                </label>
                                <span class="textarea-filled-focused"></span>
                            </div>
                            <div class="text-xs text-warning">
                                INFORMASI <sup class="text-error">*</sup> <br>
                                <ul class="list-inside list-disc">
                                    <li>Masukkan no telpon untuk mencari Costumer yang terdaftar sebagai Member - "tab / Enter".</li>
                                    <li>Apabila terdapat discount product, pastikan memasukkan nilai Discount terlebih dahulu sebelum Point Member digunakan!</li>
                                </ul>
                            </div>
                        </div>
                        <div class="">
                            <div class="rounded-lg bg-blue-400 p-6 min-w-72 font-muse text-white">
                                <div class="flex flex-col gap-1">
                                    <span> Point Member</span>
                                    <span class="font-bold text-3xl">
                                        Rp. <span x-text="xform.costumer.point_view"></span>
                                    </span>
                                    <!-- <div class="space-x-3 mt-3">
                                        <label class="relative inline-block">
                                            <input type="checkbox" class="switch switch-primary peer"
                                                aria-label="default switch with icon" x-model="xform.costumer.point_use"
                                                @change="FuncPoint" />
                                            <span
                                                class="icon-[tabler--check] peer-checked:text-primary-content absolute start-1 top-1 hidden size-4 peer-checked:block"></span>
                                            <span
                                                class="icon-[tabler--x] text-base-content peer-checked:text-base-content absolute end-1.5 top-1  block size-4 peer-checked:hidden"></span>
                                        </label>
                                    </div> -->
                                    <div>
                                        <button type="button" @click="FuncPoint" x-show="!point.status" class="btn btn-sm btn-warning mt-2 font-space">
                                            <div class="flex items-center gap-2">
                                                <span class="icon-[solar--bill-check-outline]"></span>
                                                Gunakan Point
                                            </div>
                                        </button>
                                        <button type="button" @click="FuncPoint" x-show="point.status" class="btn btn-sm btn-error mt-2 font-space">
                                            <div class="flex items-center gap-2">
                                                <span class="icon-[ix--error]"></span>
                                                Batal
                                            </div>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-1 lg:col-span-2 font-space">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h5 class="flex gap-4 items-center mb-4">
                        <span class="icon-[carbon--order-details] size-6 text-blue-500"></span>
                        <span class="text-lg font-semibold text-gray-500">Payment Details</span>
                    </h5>

                    <div class="p-8 bg-orange-300 rounded-lg flex flex-col gap-1 ">
                        <label for="" class="text-slate-50">Total Pembayaran</label>
                        <span class="text-white text-4xl font-semibold">Rp.
                            <span x-text="unpaid"></span>
                        </span>
                    </div>
                    <div class="flex flex-col gap-2 mt-4">
                        <div class="border rounded-lg flex flex-col gap-2 p-4">
                            <div class="flex justify-between gap-2">
                                <label for="" class="text-gray-500">Code Transaksi</label>
                                <span class="font-semibold" x-text="code_transaksi">
                                    Code Transaksi
                                </span>
                            </div>
                            <div class="flex justify-between gap-2">
                                <label for="" class="text-gray-500">Subtotal</label>
                                <div class="badge badge-soft badge-info px-4">
                                    Rp.
                                    <span x-text="subtotal" class="font-semibold"></span>
                                </div>
                            </div>
                            <div class="flex justify-between gap-2">
                                <label for="" class="text-gray-500">Paid</label>
                                <div class="badge badge-soft badge-success px-4">
                                    Rp.
                                    <span x-text="paid" class="font-semibold"></span>
                                </div>
                            </div>
                            <div class="flex justify-between gap-2">
                                <label for="" class="text-gray-500">Unpaid</label>
                                <div class="badge badge-soft badge-error px-4">
                                    Rp.
                                    <span x-text="unpaid" class="font-semibold"></span>
                                </div>
                            </div>
                            <div class="flex justify-between gap-2">
                                <label for="" class="text-gray-500">Point Use</label>
                                <div class="badge badge-soft badge-error px-4">
                                    Rp.
                                    <span x-text="point.status ? parseInt(xform.costumer.point).toLocaleString('id-ID') : 0"
                                        class="font-semibold"></span>
                                </div>
                            </div>
                            <div class="flex justify-between gap-2">
                                <label for="" class="text-gray-500">Discount <span x-text="discount.status ? discount.discount_percent :0"></span> %</label>
                                <div class="badge badge-soft badge-error px-4">
                                    Rp.
                                    <span x-text="discount.status ? discount.discount_nilai.toLocaleString('id-ID') :0"
                                        class="font-semibold"></span>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 border rounded-lg mt-3 flex flex-col gap-2">
                            <div class="grid grid-cols-5 items-end gap-4">
                                <div class="col-span-4">
                                    <label class="label label-text" for="favorite-simpson">Metode Bayar</label>
                                    <select x-model="xform.payment.method" class="select" id="favorite-simpson">
                                        <option value="">Select</option>
                                        <option value="q">Qris</option>
                                        <option value="b">Transfer Bank</option>
                                        <option value="t">Tunai</option>
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button class="btn btn-soft btn-warning flex items-center" type="button"
                                        aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-discount"
                                        data-overlay="#modal-discount">
                                        <span class="icon-[iconamoon--discount-light] size-5"></span>
                                        {{-- Discount --}}
                                    </button>
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="label label-text" for=""> Nominal Pembayaran </label>
                                <input x-model="xform.payment.payment" type="text"
                                    placeholder="input nominal pembayaran" class="input" id=""
                                    @keyup="hitungCashback()" />
                            </div>
                            <div class="w-full">
                                <label class="label label-text" for="" x-text="labelCount"> kembali /
                                    Sisa Pembayaran
                                </label>
                                <input x-model="kembali_sisabayar" type="text" readonly placeholder="123..."
                                    class="input bg-gray-200" id="" />
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="button" @click="store" :disabled="isStoring"
                            x-text="isStoring ? 'Load...' : 'Proses Pembayaran'"
                            class="w-full btn btn-error btn-soft btn-circle">Proses Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>


        {{-- modal --}}
        <div id="modal-discount" class="overlay modal overlay-open:opacity-100 modal-middle hidden" role="dialog"
            tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="font-semibold text-lg flex items-center gap-4">
                            <span class="icon-[streamline--discount-percent-coupon]"></span>
                            Dicsount
                        </h3>
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#modal-discount" id="btn-close-modal-discount">
                            <span class="icon-[tabler--x] size-4"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="flex flex-col gap-2">
                            <div class="w-full">
                                Persen
                                <div class="input-group mt-1">
                                    <input x-model="discount.discount_percent" type="text" class="input grow"
                                        @keyup="FuncDiscountCount" />
                                    <span class="input-group-text">
                                        <span class="icon-[hugeicons--percent-circle]"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="label label-text" for="">Discount</label>
                                <input x-model="discount.discount_nilai" type="text" @keyup="FuncDiscount"
                                    placeholder="masukkan nilai diskon" class="input" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-full"
                            x-on:click="discount.status ? FuncDiscountFalse:FuncDiscountTrue" x-show="!discount.status">
                            <span x-text="discount.status ? 'Batal': 'Gunakan Discount'"></span>
                        </button>
                        <button type="button" class="btn btn-error w-full" x-show="discount.status"
                            x-on:click="discount.status ? FuncDiscountFalse:FuncDiscountTrue">
                            <span x-text="discount.status ? 'Batal': 'Gunakan Discount'"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        window.addEventListener('load', function() {
            flatpickr('#flatpickr-range', {
                mode: 'range'
            })
        })

        function pembayaran(index) {
            let subtotal = parseInt(index.total_payment);
            let totalPembayaran = parseInt(index.total_unpaid);
            let totalPaid = parseInt(index.total_paid);
            return {
                isStoring: false,
                indexData: index,
                total_pembayaran: parseInt(index.total_unpaid),
                paid: `${totalPaid.toLocaleString('id-ID')}`,
                unpaid: totalPembayaran.toLocaleString('id-ID'),
                subtotal: `${subtotal.toLocaleString('id-ID')}`,
                kembali_sisabayar: 0,
                code_transaksi: index.code,
                xform: {
                    costumer: {
                        nama: '',
                        alamat: '',
                        telpon: '',
                        point: 0,
                        point_view: 0,
                        point_use: false
                    },
                    payment: {
                        cashback: 0,
                        payment: 0,
                        method: ''
                    }
                },
                labelCount: "Kembali / Sisa Bayar",
                hitungCashback() {
                    let total = parseInt(totalPembayaran);
                    let pay = parseInt(this.xform.payment.payment);
                    if (pay >= total) {
                        this.labelCount = "Kembali";
                        let count = total - pay;
                        this.xform.payment.cashback = count >= 0 ? count : Math.abs(count);
                        this.kembali_sisabayar = parseInt(this.xform.payment.cashback).toLocaleString('id-ID')
                        return;
                    }
                    if (pay < total) {
                        this.labelCount = "Sisa Bayar";
                        let count = total - pay;
                        this.xform.payment.cashback = count > 0 ? count : 0;
                        this.kembali_sisabayar = parseInt(this.xform.payment.cashback).toLocaleString('id-ID')
                        return;
                    }

                },

                store() {
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
                            this.isStoring = true; // Ganti `this.store` menjadi `this.isStoring`
                            // loading alert

                            const data = {
                                transaksi_id: this.code_transaksi,
                                transaksi_details: this.indexData,
                                metode_bayar: this.xform.payment.method,
                                jumlah_bayar: this.xform.payment.payment,
                                kembali: this.xform.payment.cashback,
                                costumer: this.xform.costumer,
                                pembayaran: {
                                    subtotal: subtotal,
                                    total_bayar: totalPembayaran,
                                    jumlah_bayar: parseInt(this.xform.payment.payment),
                                    discount: {
                                        persen: this.discount.discount_percent,
                                        nilai: this.discount.discount_nilai,
                                        status: this.discount.status,
                                    },
                                    point: {
                                        status: this.point.status,
                                        nilai: this.xform.costumer.point ?? 0,
                                    }
                                }
                            };

                            try {
                                const url = `/transaksi/kasir-proses-bayar-post/${this.indexData.id}`;
                                const response = await axios.post(url, data);
                                const result = response.data;
                                if (result.code == 200) {
                                    Swal.fire({
                                        title: "Success!",
                                        text: result.message,
                                        icon: "success"
                                    });
                                    window.open(
                                        `/transaksi/cetak-invoice/${this.indexData.id}/${result.data.payment_id}`,
                                        '_blank');
                                    window.location.href = '/transaksi';
                                }
                            } catch (error) {
                                const err = error.response.data;
                                if (error.status === 400) {
                                    const res = err.errors;
                                    const dataErr = Object.values(res);
                                    dataErr.forEach(element => {
                                        element.forEach(pesan => {
                                            notifier.warning(pesan)
                                        });
                                    });
                                }
                            } finally {
                                this.isStoring = false; // Reset status setelah selesai
                            }
                        }
                    });
                },

                getCostumer() {
                    if (this.indexData.costumer) {
                        this.xform.costumer.nama = this.indexData.costumer.name;
                        this.xform.costumer.alamat = this.indexData.costumer.alamat;
                        this.xform.costumer.telpon = this.indexData.costumer.no_telp;
                    }
                },

                findCostumer() {
                    if (this.xform.costumer.telpon.length <= 0) {
                        notifier.warning(`Do no match!`);
                        return;
                    }
                    Swal.fire({
                        icon: 'info',
                        title: 'Loading...',
                        text: 'Harap tunggu',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    axios.get(`/transaksi/find-costumer/${this.xform.costumer.telpon}`)
                        .then((res) => {
                            const costumer = res.data.data;
                            if (costumer) {
                                this.xform.costumer.nama = costumer.name;
                                this.xform.costumer.alamat = costumer.alamat;
                                this.xform.costumer.telpon = costumer.no_telp;
                                this.xform.costumer.point = costumer.point_member;
                                this.xform.costumer.point_view = parseInt(this.xform.costumer.point).toLocaleString(
                                    'id-ID');

                                // notifier.success(`Found!`);
                                Swal.fire({
                                    icon: "success",
                                    title: "Informasi",
                                    text: 'Data member berhasil ditemukan!',
                                    showConfirmButton: true,
                                    // confirmButtonText: "Close",
                                    showCancelButton: true,
                                    timer: 5000
                                });
                            } else {
                                // notifier.warning(`Data tidak ditemukan!`);
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Data tidak ditemukan!',
                                    showConfirmButton: false,
                                    timer: 5000
                                });
                                this.xform.costumer.nama = '';
                                this.xform.costumer.alamat = '';
                                this.xform.costumer.telpon = '';
                            }

                        }).catch((err) => {
                            console.log(err);
                            Swal.close(); // Menutup loading jika terjadi error
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi kesalahan!',
                                text: 'Gagal mengambil data.',
                                showConfirmButton: true
                            });
                        })
                },

                discount: {
                    status: false,
                    discount_nilai: 0,
                    discount_percent: 0,
                },

                FuncDiscount() {
                    let total_unpaid = parseInt(totalPembayaran);
                    let paid_after_discount = total_unpaid - parseInt(this.discount.discount_nilai);
                    let countPersent = (parseInt(this.discount.discount_nilai) / total_unpaid) * 100;
                    this.discount.discount_percent = parseFloat(countPersent.toFixed(1));
                },

                FuncDiscountCount() {
                    let total_unpaid = parseInt(totalPembayaran);
                    let hitungDiscount = (total_unpaid * parseInt(this.discount.discount_percent)) / 100;
                    let paid_after_discount = total_unpaid - hitungDiscount;
                    this.discount.discount_nilai = hitungDiscount;

                },

                FuncDiscountTrue() {
                    axios.get(`/transaksi/discount-check/${index.id}`)
                        .then((res) => {
                            const data = res.data.data;
                            if (data.status) {
                                // sweetalert get discount tdidak dapat diproses, form data.info
                                Swal.fire({
                                    title: 'Gagal menggunakan diskon!',
                                    text: data.info,
                                    icon: 'warning',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Ok, Mengerti!',
                                    timer: 5000
                                });
                                return;
                            } else {
                                this.discount.status = true;
                                let hitungTotalBayar = totalPembayaran - parseFloat(this.discount.discount_nilai);
                                totalPembayaran = hitungTotalBayar;
                                this.unpaid = totalPembayaran.toLocaleString('id-ID');
                                Swal.fire({
                                    title: 'Berhasil menggunakan diskon!',
                                    text: `Diskon yang digunakan: ${parseFloat(this.discount.discount_nilai).toLocaleString('id-ID')}`,
                                    icon: 'success',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Ok, Mengerti!',
                                    timer: 5000
                                })

                                const closeModal = document.getElementById('btn-close-modal-discount');
                                closeModal.click();
                            }

                        })
                        .catch((errors) => {
                            const err = errors.data.data;
                            //sweetalert error response form err.message
                            Swal.fire({
                                title: 'Terjadi kesalahan!',
                                text: err.message,
                                icon: 'error',
                                showConfirmButton: true,
                                confirmButtonText: 'Ok, Mengerti!',
                                timer: 5000
                            });
                        });
                },

                FuncDiscountFalse() {
                    this.discount.status = false;
                    let hitungTotalBayar = totalPembayaran + parseFloat(this.discount.discount_nilai);
                    totalPembayaran = hitungTotalBayar;
                    this.unpaid = totalPembayaran.toLocaleString('id-ID');
                    // discount dibatalkan
                    Swal.fire({
                        title: 'Berhasil membatalkan diskon!',
                        text: `Diskon yang dibatalkan: ${parseFloat(this.discount.discount_nilai).toLocaleString('id-ID')}`,
                        icon: 'info',
                        showConfirmButton: true,
                        confirmButtonText: 'Ok, Mengerti!',
                        timer: 5000
                    })
                    const closeModal = document.getElementById('btn-close-modal-discount');
                    closeModal.click();
                },

                point: {
                    status: false,
                    point_use: 0,
                    point_view: 0
                },

                FuncPoint() {
                    if (this.point.status) {
                        this.point.status = false;
                        let point = this.xform.costumer.point;
                        let totalBayar = totalPembayaran;
                        let hitungBayar = parseInt(totalBayar) + parseInt(point);
                        totalPembayaran = hitungBayar;
                        this.unpaid = totalPembayaran.toLocaleString('id-ID');

                        // sweetalert point batal diguankan!
                        Swal.fire({
                            title: 'Penggunaan point batal!',
                            text: `Total Point Rp. ${parseInt(this.xform.costumer.point).toLocaleString('id-ID')}`,
                            icon: 'info',
                            showConfirmButton: true,
                            confirmButtonText: 'Ok, Mengerti!',
                            timer: 5000
                        })
                    } else {
                        // point check, wheen poin check 0 sweetalert point null
                        if (!this.xform.costumer || this.xform.costumer.point <= 0) {
                            Swal.fire({
                                title: 'Point anda kosong!',
                                text: 'Silahkan cek point anda.',
                                icon: 'warning',
                                showConfirmButton: true,
                                confirmButtonText: 'Ok, Mengerti!',
                                timer: 5000
                            });
                            return
                        }
                        // sweetalert confirmation use point
                        Swal.fire({
                            title: 'Apakah ingin menggunakan point ?',
                            text: `Total nilai point Rp. ${parseInt(this.xform.costumer.point).toLocaleString('id-ID')}`,
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, Gunakan',
                            cancelButtonText: 'Batalkan'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Loading data...',
                                    text: 'Harap tunggu',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });

                                axios.get(`/transaksi/point-use-validation`, {
                                    params: {
                                        key: this.indexData.id
                                    }
                                }).then((response) => {
                                    this.point.status = true;
                                    let point = this.xform.costumer.point;
                                    let totalBayar = totalPembayaran;
                                    let sisa = totalBayar - point;
                                    totalPembayaran = sisa;
                                    this.unpaid = totalPembayaran.toLocaleString("id-ID")
                                    Swal.fire({
                                        title: 'Berhasil menggunakan point!',
                                        text: `Point yang digunakan Rp. ${parseInt(this.point.point_use).toLocaleString('id-ID')}`,
                                        icon: 'success',
                                        showConfirmButton: true,
                                        confirmButtonText: 'Ok, Mengerti!',
                                        timer: 5000
                                    })
                                }).catch((errors) => {
                                    this.point.status = false;

                                    // use if to get response 403
                                    if (errors.response.status === 403) {
                                        Swal.fire({
                                            title: 'Invalid!',
                                            text: errors.response.data.message,
                                            icon: 'error',
                                            showConfirmButton: true,
                                            confirmButtonText: 'Ok, Mengerti!',
                                            timer: 5000
                                        });
                                        return
                                    }

                                    // sweetalert error internal server error 500
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Maaf, terjadi kesalahan internal server. Silahkan coba lagi nanti.',
                                        icon: 'error',
                                        showConfirmButton: true,
                                        confirmButtonText: 'Ok, Mengerti!',
                                        timer: 5000
                                    })
                                })
                            }
                        }).catch((error) => {
                            // console.log(error)
                        });

                    }
                },

                init() {
                    this.getCostumer()
                }
            }
        }
    </script>
    @endpush
</x-base-layout>