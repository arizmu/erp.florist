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
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            Rp.
                                            <span x-text="parseInt(item.cost_item).toLocaleString('id-ID')"></span>
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
                    <div class="p-5 border rounded-lg mt-3 flex flex-col gap-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <div class="relative">
                                <input x-model="xform.costumer.nama" type="text" placeholder="Nama Costumer"
                                    class="input input-filled peer" id="nama_costumer" />
                                <label class="input-filled-label" for="nama_costumer">
                                    Nama Pelanggang
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
                            <i>
                                Masukkan no telpon untuk mencari costumer costumer member - "tab / Enter".
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-1 lg:col-span-2 font-space">
            <div class="card shadow-lg">
                <form x-on:submit.prevent="store()">
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
                            </div>

                            <div class="p-5 border rounded-lg mt-3 flex flex-col gap-2">
                                <div class="w-full">
                                    <label class="label label-text" for="favorite-simpson">Metode Bayar</label>
                                    <select x-model="xform.payment.method" class="select" id="favorite-simpson">
                                        <option value="">Select</option>
                                        <option value="q">Qris</option>
                                        <option value="b">Transfer Bank</option>
                                        <option value="t">Tunai</option>
                                    </select>
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
                            <button type="submit" :disabled="isStoring"
                                x-text="isStoring ? 'Load...' : 'Proses Pembayaran'"
                                class="w-full btn btn-error btn-soft btn-circle">Proses Pembayaran</button>
                        </div>
                    </div>
                </form>
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
                return {
                    isStoring: false,
                    indexData: index,
                    total_pembayaran: index.total_unpaid,
                    paid: `${parseInt(index.total_paid).toLocaleString('id-ID')}`,
                    unpaid: `${parseInt(index.total_unpaid).toLocaleString('id-ID')}`,
                    subtotal: `${parseInt(index.total_payment).toLocaleString('id-ID')}`,
                    kembali_sisabayar: 0,
                    code_transaksi: index.code,
                    xform: {
                        costumer: {
                            nama: '',
                            alamat: '',
                            telpon: ''
                        },
                        payment: {
                            cashback: 0,
                            payment: 0,
                            method: ''
                        }
                    },
                    labelCount: "Kembali / Sisa Bayar",
                    hitungCashback() {
                        let total = parseInt(index.total_unpaid);
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
                                    costumer: this.xform.costumer
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
                        console.log(this.indexData.costumer);
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
                        axios.get(`/transaksi/find-costumer/${this.xform.costumer.telpon}`)
                            .then((res) => {
                                const costumer = res.data.data;
                                if (costumer) {
                                    this.xform.costumer.nama = costumer.name;
                                    this.xform.costumer.alamat = costumer.alamat;
                                    this.xform.costumer.telpon = costumer.no_telp;
                                    notifier.success(`Found!`);
                                } else {
                                    notifier.warning(`Data tidak ditemukan!`);
                                    this.xform.costumer.nama = '';
                                    this.xform.costumer.alamat = '';
                                    this.xform.costumer.telpon = '';
                                }

                            }).catch((err) => {
                                console.log(err);

                            })
                    },

                    init() {
                        this.getCostumer()
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
