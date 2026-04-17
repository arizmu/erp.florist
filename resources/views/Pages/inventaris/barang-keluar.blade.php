<x-base-layout>
    <div x-data="loadFormBarangKeluar">
        <!-- Page Header -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Barang Keluar</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Catatan barang keluar dari inventory</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-7 gap-6">
            <!-- Left Column - Form & List -->
            <div class="lg:col-span-5 space-y-6 ">
                <!-- Info Form -->
                <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                    <div
                        class="md:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">

                        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <input x-model="searchBarang" @input.debounce.500="onSearchInput" type="text"
                                    class="w-full px-4 py-2.5 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 dark:bg-gray-700 dark:text-white"
                                    placeholder="pilih barang...">
                            </div>
                        </div>

                        <div class="w-full p-6 min-h-96 max-h-screen flex flex-col gap-4 overflow-auto">
                            <template x-for="item in filteredBarang">
                                <div
                                    class="grid grid-cols-1 lg:grid-cols-6 gap-2 p-2 bg-gray-50 hover:bg-indigo-50 hover:shadow-sm rounded-xl items-center px-4">
                                    <div class="lg:col-span-3 flex flex-col">
                                        <span class="w-full text-wrap font-muse font-semibold text-gray-600 capitalize"
                                            x-text="item.nama_barang">Material
                                            barang</span>
                                        <span class="text-xs text-red-600">
                                            <i x-text="item.stock"></i>
                                            <i x-text="item.satuan.nama_satuan" class="lowercase"></i>
                                        </span>
                                    </div>
                                    <div class="lg:col-span-2 w-full">
                                        <input type="number" x-model="qty[item.id]" class="input input-sm">
                                    </div>
                                    <button @click="selectBarang(item)"
                                        class="lg:col-span-1 btn btn-soft btn-error btn-sm">Pilih</button>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Selected Items Table -->
                    <div class="md:col-span-3">

                        <div
                            class=" bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Barang</h3>
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300">0
                                        items</span>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-gray-50/50 dark:bg-gray-700/50">
                                            <th
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300">
                                                Nama Barang</th>
                                            <th
                                                class="px-6 py-3 text-center text-xs font-semibold text-gray-600 dark:text-gray-300">
                                                Jumlah</th>
                                            <th
                                                class="px-6 py-3 text-center text-xs font-semibold text-gray-600 dark:text-gray-300">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                        <template x-if="formData.details.length === 0">
                                            <tr>
                                                <td colspan="3" class="px-6 py-8 text-center">
                                                    <div class="flex flex-col items-center gap-2">
                                                        <span
                                                            class="icon-[tabler--package] size-8 text-gray-400"></span>
                                                        <p class="text-gray-500 dark:text-gray-400">Belum ada barang
                                                            dipilih
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                        <template x-for="item in formData.details">
                                            <tr>
                                                <td class="px-6 py-3 text-xs text-gray-600 dark:text-gray-300">
                                                    <span x-text="item.name"></span>
                                                </td>
                                                <td class="py-3 text-center text-xs text-gray-600 dark:text-gray-300">
                                                    <span x-text="item.qty"></span>
                                                </td>
                                                <td class="py-3 text-center text-xs text-gray-600 dark:text-gray-300">
                                                    <button @click="removeItem(item.key)"
                                                        class="btn btn-soft btn-error btn-sm">Hapus</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Add Item Form -->
            <div class="lg:col-span-2">
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 sticky top-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Keluar</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tanggal</label>
                            <input x-model="formData.tanggal" type="text" id="flatpickr-date"
                                class="w-full px-4 py-2.5 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 dark:bg-gray-700 dark:text-white"
                                placeholder="pilih tanggal">
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tujuan</label>
                            <select x-model="formData.tujuan"
                                class="w-full px-4 py-2.5 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 dark:bg-gray-700 dark:text-white">
                                <option value="">Pilih tujuan...</option>
                                <option value="rusak">Barang Rusak</option>
                                <option value="produksi">Produksi</option>
                                <option value="lain">Lainnya</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Keterangan</label>
                            <textarea x-model="formData.keterangan"
                                class="w-full px-4 py-2.5 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 dark:bg-gray-700 dark:text-white resize-none"
                                rows="2" placeholder="Keterangan tambahan..."></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Petugas</label>
                            <select x-model="formData.petugas"
                                class="w-full px-4 py-2.5 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 dark:bg-gray-700 dark:text-white resize-none">
                                <option value="">Pilih petugas...</option>
                                <template x-for="item in pegawai" :key="item.key">
                                    <option :value="item.key" x-text="item.name"></option>
                                </template>
                            </select>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="mt-6 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <button type="submit" @click="storingData()"
                            class="w-full mt-4 inline-flex items-center justify-center gap-2 px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-red-600 to-orange-700 rounded-xl shadow-lg shadow-red-500/30 hover:shadow-red-500/40 hover:-translate-y-0.5 transition-all duration-200">
                            <span class="icon-[tabler--device-floppy] size-4"></span>
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('loadFormBarangKeluar', () => ({

                    // State
                    barang: [],
                    pegawai: [],
                    searchBarang: '',
                    filteredBarang: [],
                    showDropdown: false,
                    isLoadingBarang: false,
                    debounceTimer: null,
                    qty: [],
                    formData: {
                        tanggal: '',
                        tujuan: '',
                        keterangan: '',
                        petugas: '',
                        details: []
                    },

                    async storingData() {
                        // 1. Show Confirmation Dialog
                        const result = await Swal.fire({
                            title: 'Konfirmasi',
                            text: "Apakah anda yakin ingin menyimpan data ini?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, simpan!',
                            cancelButtonText: 'Batal'
                        });

                        // Check if user clicked "Confirm"
                        if (result.isConfirmed) {

                            // 2. Show Loading Dialog (tanpa timer, tetap aktif sampai response datang)
                            Swal.fire({
                                title: 'Processing...',
                                text: "Mohon tunggu...",
                                icon: 'info',
                                showCancelButton: false,
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false, // Mencegah user menutup dengan ESC
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            try {
                                const url = "/inventory/barang-keluar/storing";
                                const response = await fetch(url, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            'content')
                                    },
                                    body: JSON.stringify(this.formData)
                                });

                                const resultData = await response.json();

                                // Cek jika response tidak OK (HTTP 4xx/5xx)
                                if (!response.ok) {
                                    throw new Error(resultData.message ||
                                        'Terjadi kesalahan pada server');
                                }

                                // 3. Loading otomatis tertutup, tampilkan Success
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: resultData.message || "Data berhasil disimpan.",
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                });

                                console.log(resultData.data);
                                this.resetForm();

                            } catch (error) {
                                console.error(error);

                                // 3. Loading otomatis tertutup, tampilkan Error
                                Swal.fire({
                                    title: 'Error!',
                                    text: error.message ||
                                        "Terjadi kesalahan saat menyimpan data",
                                    icon: 'error',
                                    confirmButtonColor: '#d33',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    },

                    async searchBarangFromAPI(keyword) {
                        if (!keyword || keyword.trim().length < 2) {
                            this.filteredBarang = []
                            this.showDropdown = false
                            return
                        }

                        this.isLoadingBarang = true

                        try {
                            const res = await fetch(
                                `/inventory/get-barang-data?key=${encodeURIComponent(keyword)}`, {
                                    headers: {
                                        'Accept': 'application/json'
                                    }
                                })
                            const data = await res.json()
                            this.filteredBarang = data
                                .data
                            this.showDropdown = this.filteredBarang.length > 0
                        } catch (err) {
                            console.error('Gagal fetch barang:', err)
                            this.filteredBarang = []
                        } finally {
                            this.isLoadingBarang = false
                        }
                    },

                    onSearchInput() {
                        this.searchBarangFromAPI(this.searchBarang)
                    },


                    selectBarang(item) {
                        const qty = this.qty[item.id];
                        if (!qty || qty < 1) {
                            return;
                        }

                        const data = {
                            key: item.id,
                            stok: Number(item.stock),
                            name: item.nama_barang,
                            qty: Number(qty)
                        };

                        if (data.stok < data.qty) {
                            notifier.warning("stok tidak mencukupi.", {
                                labels: {
                                    warning: "Oppss..."
                                },
                                icons: {
                                    prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"`,
                                    suffix: '/>'
                                }
                            });
                            return
                        }

                        const indexData = this.formData.details.findIndex(detail => detail.key ===
                            data.key);

                        if (indexData !== -1) {
                            this.formData.details.splice(indexData, 1, data);
                        } else {
                            this.formData.details.push(data);
                        }
                        notifier.success('item added success.', {
                            labels: {
                                success: "OK"
                            },
                            durations: {
                                success: 2000
                            },
                            icons: {
                                prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />`,
                                suffix: '</svg>'
                            }
                        })
                    },

                    addItem() {
                        if (!this.formBarang.key || !this.formBarang.qty) return

                        const existing = this.formData.details.find(d => d.key === this.formBarang.key)
                        if (existing) {
                            existing.qty = parseInt(existing.qty) + parseInt(this.formBarang.qty)
                        } else {
                            this.formData.details.push({
                                key: this.formBarang.key,
                                name: this.formBarang.name,
                                qty: parseInt(this.formBarang.qty)
                            })
                        }

                        this.clearBarang()
                    },

                    removeItem(key) {
                        this.formData.details = this.formData.details.filter(d => d.key !== key)
                    },

                    async getPegawai() {
                        const res = await fetch('/inventory/get-pegawai', {
                            headers: {
                                'Accept': 'application/json'
                            }
                        })
                        const data = await res.json()
                        this.pegawai = data.data
                    },

                    resetForm() {
                        this.formData = {
                            tanggal: '',
                            keterangan: '',
                            petugas: '',
                            details: []
                        }
                    },

                    init() {
                        this.getPegawai() // ← getBarang() dihapus, diganti search on-demand
                        this.onSearchInput()
                        flatpickr('#flatpickr-date', {
                            monthSelectorType: 'static'
                        })
                    }
                }))
            })
        </script>
    @endpush
</x-base-layout>
