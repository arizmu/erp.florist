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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mt-2 py-2" x-data="pembayaran({{ $data }})">
        <div class="md:col-span-1 lg:col-span-3 order-last md:order-first">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold font-space flex items-center gap-4 text-gray-500">
                    <span class="icon-[carbon--product] size-7 text-blue-500"></span>
                    Detail Product
                </h2>

                <div class="mt-6 flex flex-col gap-4 font-space">
                    <template x-for="item in indexData.details">
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-2 px-4 items-center border-b-2 font-space">
                            <img class="max-h-40 w-auto"
                                src="https://png.pngtree.com/png-clipart/20230312/ourmid/pngtree-transparent-watercolor-flowers-png-image_6646331.png"
                                alt="">
                            <div class="flex flex-col gap-2">
                                <div for="product_name" class="flex flex-col gap-0">
                                    <label for="" class="text-xs text-gray-400">Product name</label>
                                    <h4 x-text="item.item_name" class="text-xl font-bold text-gray-500">Nama proudc
                                        buanga</h4>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span for="for-harga" class="text-orange-400 font-semibold text-sm">
                                        Rp. <span x-text="parseInt(item.cost_item).toLocaleString('id-ID')"></span> *
                                        <span x-text="item.amount_item"></span>
                                    </span>

                                </div>
                            </div>
                            <div class="flex flex-col gap-2 md:text-right">
                                <div class="flex flex-col gap-0" for="total">
                                    <label for="" class="text-xs text-gray-400">Total</label>
                                    <span class="text-xl font-bold text-gray-500">Rp.
                                        <span x-text="parseInt(item.total_cost).toLocaleString('id-ID')"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <div class="md:col-span-1 lg:col-span-2 font-space">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h5 class="card-title">Transaction Details</h5>
                </div>
                <form x-on:submit.prevent="store()">
                    <div class="card-body">
                        <div class="p-8 bg-orange-300 rounded-lg flex flex-col gap-1 ">
                            <label for="" class="text-slate-50">Subtotal</label>
                            <span class="text-white text-4xl font-semibold">Rp.
                                <span x-text="total_pembayaran"></span>
                            </span>
                        </div>
                        <div class="flex flex-col gap-2 mt-4 p-2">
                            <div class="flex justify-between gap-2">
                                <label for="" class="text-gray-500">Code Transaksi</label>
                                <span class="font-semibold" x-text="code_transaksi">kdjkdjfkjd kjkdjkjj kjdkfu</span>
                            </div>

                            <div>
                                <label for="" class="">Custumer</label>
                                <div class="p-5 border rounded-lg mt-3 flex flex-col gap-2">
                                    <div class="relative">
                                        <input x-model="xform.costumer.nama" type="text" placeholder="Nama Costumer"
                                            required class="input input-filled peer" id="nama_costumer" />
                                        <label class="input-filled-label" for="nama_costumer">Costumer Name</label>
                                        <span class="input-filled-focused"></span>
                                    </div>

                                    <div class="relative">
                                        <textarea x-model='xform.costumer.alamat' class="textarea textarea-filled peer" required placeholder="Alamat..."
                                            id="alamat_costumer"></textarea>
                                        <label class="textarea-filled-label" for="alamat_costumer">Alamat
                                            Costumers</label>
                                        <span class="textarea-filled-focused"></span>
                                    </div>

                                    <div class="relative">
                                        <input x-model="xform.costumer.telpon" required type="text"
                                            placeholder="08***" class="input input-filled peer" id="nama_costumer" />
                                        <label class="input-filled-label" for="nama_costumer">Telpon</label>
                                        <span class="input-filled-focused"></span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="" class="">Payment</label>
                                <div class="p-5 border rounded-lg mt-3 flex flex-col gap-2">
                                    <div class="w-full">
                                        <label class="label label-text" for="favorite-simpson">Method</label>
                                        <select required x-model="xform.payment.method" class="select"
                                            id="favorite-simpson">
                                            <option value="">Select</option>
                                            <option value="q">Qris</option>
                                            <option value="b">Transfer Bank</option>
                                            <option value="t">Tunai</option>
                                        </select>
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text" for=""> Jumlah Bayar </label>
                                        <input required x-model="xform.payment.payment" type="text"
                                            placeholder="input nominal pembayaran" class="input" id=""
                                            @keyup="hitungCashback()" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label label-text" for=""> kembali / Sisa Pembayaran
                                        </label>
                                        <input x-model="xform.payment.cashback" type="text" readonly
                                            placeholder="123..." class="input bg-gray-200" id="" />
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" :disabled="isStoring" x-text="isStoring ? 'Load...' : 'Proses Pembayaran'"
                            class="w-full btn btn-error btn-soft btn-circle">Proses Pembayaran</button>
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
                    total_pembayaran: `${parseInt(index.total_unpaid).toLocaleString('id-ID')}.,`,
                    code_transaksi: `${index.code}`,
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
                    hitungCashback() {
                        let total = parseInt(this.indexData.total_unpaid);
                        let pay = this.xform.payment.payment;
                        if (this.xform.payment.payment > 0) {
                            this.xform.payment.cashback = formatRupiah(pay - total) ?? "0";
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
                                this.store = true;
                                const data = {
                                    transaksi_id: this.code_transaksi,
                                    transaksi_details: this.indexData,
                                    metode_bayar: this.xform.payment.method,
                                    jumlah_bayar: this.xform.payment.payment,
                                    kembali: this.xform.payment.cashback,
                                    costumer: this.xform.costumer
                                }
                                const url = `/transaksi/kasir-proses-bayar-post/${this.indexData.id}`;
                                const response = await axios.post(url, data);
                                const result = response.data;
                                if (result.code == 200) {
                                    Swal.fire({
                                        title: "Success!",
                                        text: result.message,
                                        icon: "success"
                                    });
                                    window.open(`/transaksi/cetak-invoice/${this.indexData.id}/${result.data.payment_id}`, '_blank');
                                    window.location.href = '/transaksi';
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: result.message,
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    },
                    getCostumer() {
                        this.xform.costumer.nama = this.indexData.costumer.name;
                        this.xform.costumer.alamat = this.indexData.costumer.alamat;
                        this.xform.costumer.telpon = this.indexData.costumer.no_telp;
                    },
                    init() {
                        this.getCostumer()
                        this.hitungCashback();
                        console.log(this.indexData);

                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
