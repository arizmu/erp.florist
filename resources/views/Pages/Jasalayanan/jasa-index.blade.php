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
                Jasa produksi
            </li>
        </ol>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-9 py-3 gap-5" x-data="helloCrafter">
        <div class="md:col-span-4 lg:col-span-6">
            <div class="card">
                <div class="card-body">
                    <div class="w-full overflow-x-auto bg-white border rounded-lg">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Crafter</th>
                                    <th>Kode Bucket</th>
                                    <th>Tgl Produksi</th>
                                    <th>Biaya Produksi</th>
                                    <th>Status</th>
                                    <th>Jasa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(item, index) in xtableData" :key="index">
                                    <tr>
                                        <td x-text="item.pegawai.pegawai_name"></td>
                                        <td x-text="item.code_production"></td>
                                        <td x-text="item.production_date"></td>
                                        <td x-text="formatRupiah(item.production_cost)"></td>
                                        <td>
                                            <span class="badge badge-soft badge-success rounded-full" x-show="item.production_status">Done</span>
                                            <span class="badge badge-soft badge-error rounded-full" x-show="!item.production_status">Undone</span>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="md:col-span-2 lg:col-span-3 order-first md:order-last">
            <div class="card card-compact">
                <div class="card-header">
                    <h5 class="card-title px-4 font-muse">Crafters</h5>
                </div>
                <hr>
                <div class="card-body">
                    <div class="p-4 pt-3 flex flex-col gap-5">
                        <div class="relative w-auto">
                            <input type="text" placeholder="" class="input input-floating peer"
                                id="flatpickr-range" />

                            <label class="input-floating-label" for="floatingInput">
                                Periode
                            </label>
                        </div>
                        <div class="relative w-auto">
                            <select class="select select-floating" aria-label="Select floating label"
                                id="selectFloating">
                                <option>The Godfather</option>
                                <option>The Shawshank Redemption</option>
                                <option>Pulp Fiction</option>
                                <option>The Dark Knight</option>
                                <option>Schindler's List</option>
                            </select>
                            <label class="select-floating-label" for="selectFloating">
                                Crafter
                            </label>
                        </div>
                        <div class="relative w-auto">
                            <select class="select select-floating" aria-label="Select floating label"
                                id="selectFloating">
                                <option>15</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                            <label class="select-floating-label" for="selectFloating">
                                Data Range
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center border-t py-2">
                    <div class="p-4">
                        <button class="btn btn-outline btn-primary w-full">Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            function helloCrafter() {
                return {
                    xtableData: [],
                    dataLoads() {
                        axios.get(`/jasa-crafter/data-json`)
                        .then((res) => {
                            const data = res.data;
                            this.xtableData = data.data;
                            console.log(this.xtableData);
                            
                        }).catch((err) => {
                            console.log(err);
                        })
                    },
                    init() {
                        this.dataLoads()
                    }
                }
            }
        </script>
        <script>
            window.addEventListener('load', function() {
                // Range Date Picker
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            })
        </script>
    @endpush
</x-base-layout>
