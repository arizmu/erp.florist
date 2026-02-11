<x-base-layout>
    <!-- Breadcrumbs -->
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
                Pegawai
            </li>
        </ol>
    </div>

    <div x-data="managementPegawai">
        <!-- Page Header -->
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Pegawai</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Kelola data pegawai dan karyawan</p>
                </div>
                <button id="btn-open-modal" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-blue-500/40 hover:-translate-y-0.5" type="button"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-open-edit"
                    data-overlay="#modal-form-data">
                    <span class="icon-[tabler--user-plus] size-5"></span>
                    <span>Tambah Pegawai</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Main Content - Employee Table -->
            <div class="lg:col-span-9">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <!-- Table Header -->
                    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Pegawai</h2>
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300">
                                    <span class="icon-[tabler--users] size-3 mr-1"></span>
                                    <span x-text="dataTable.length">0</span> Pegawai
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50/50 dark:bg-gray-700/50">
                                    <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Jenis Kelamin</th>
                                    <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Alamat</th>
                                    <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Telepon</th>
                                    <th class="px-6 py-3.5 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                <template x-for="item in dataTable" :key="item.id">
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                                    <span class="icon-[tabler--user] size-5 text-white"></span>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-gray-900 dark:text-white" x-text="item.pegawai_name">-</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400" x-text="item.email">-</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span x-show="item.gender" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300">
                                                <span class="icon-[tabler--gender-male] size-3"></span>
                                                Laki-laki
                                            </span>
                                            <span x-show="!item.gender" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium bg-pink-50 dark:bg-pink-900/30 text-pink-700 dark:text-pink-300">
                                                <span class="icon-[tabler--gender-female] size-3"></span>
                                                Perempuan
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300 text-sm">
                                                <span class="icon-[tabler--map-pin] size-4 text-gray-400"></span>
                                                <span class="max-w-[200px] truncate" x-text="item.alamat">-</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300 text-sm">
                                                <span class="icon-[tabler--phone] size-4 text-gray-400"></span>
                                                <span x-text="item.telpon">-</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-2">
                                                <button type="button" x-on:click="getEdit(item)"
                                                    class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/50 transition-all duration-200 hover:scale-105"
                                                    aria-label="Edit pegawai">
                                                    <span class="icon-[tabler--user-edit] size-4"></span>
                                                </button>
                                                <button @click="deleteData(item.id)" type="button"
                                                    class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/50 transition-all duration-200 hover:scale-105"
                                                    aria-label="Delete pegawai">
                                                    <span class="icon-[tabler--trash] size-4"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="dataTable.length === 0">
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                                <span class="icon-[tabler--users] size-8 text-gray-400"></span>
                                            </div>
                                            <p class="text-gray-500 dark:text-gray-400 font-medium">Tidak ada data pegawai</p>
                                            <p class="text-sm text-gray-400 dark:text-gray-500">Klik tombol "Tambah Pegawai" untuk menambah data baru</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Filter -->
            <div class="lg:col-span-3">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 sticky top-6">
                    <!-- Filter Header -->
                    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                                <span class="icon-[tabler--filter-search] size-5 text-white"></span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Filter Data</h3>
                        </div>
                    </div>

                    <!-- Filter Form -->
                    <div class="p-6 space-y-5">
                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--search] size-4 text-gray-400"></span>
                                    Cari Pegawai
                                </span>
                            </label>
                            <div class="relative">
                                <input type="search" 
                                    class="w-full pl-11 pr-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" 
                                    placeholder="Ketik untuk mencari..." id="kbdInput" />
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <span class="icon-[tabler--search] size-5"></span>
                                </span>
                            </div>
                        </div>

                        <!-- Data Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center gap-2">
                                    <span class="icon-[tabler--list-details] size-4 text-gray-400"></span>
                                    Jumlah Data
                                </span>
                            </label>
                            <div class="relative">
                                <select class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200" 
                                    aria-label="Select data range">
                                    <option>15</option>
                                    <option>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <span class="icon-[tabler--chevron-down] size-5"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="px-6 pb-6">
                        <div class="grid grid-cols-1 gap-3">
                            <button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-blue-500/40 hover:-translate-y-0.5">
                                <span class="icon-[tabler--user-search] size-4"></span>
                                Filter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Card -->
                <div class="mt-6 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-lg shadow-indigo-500/30 p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                            <span class="icon-[tabler--users] size-7 text-white"></span>
                        </div>
                        <div>
                            <p class="text-indigo-100 text-sm font-medium">Total Pegawai</p>
                            <p class="text-3xl font-bold text-white mt-1" x-text="dataTable.length">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Add --}}
        <div id="modal-form-data" class="overlay modal overlay-open:opacity-100 hidden [--body-scroll:true]"
            role="dialog" tabindex="-1">
            <div class="overlay-animation-target modal-dialog overlay-open:mt-4 overlay-open:opacity-100 overlay-open:duration-500 mt-12 transition-all ease-out">
                <div class="modal-content bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden">
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-white dark:from-gray-700 dark:to-gray-800">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                    <span class="icon-[mynaui--user-diamond] size-5 text-white"></span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" x-text="isSubmitting ? 'Form Update' : 'Form Tambah Pegawai'">Form Tambah Pegawai</h3>
                                    <p class="text-xs text-gray-500 dark:text-gray-400" x-text="isSubmitting ? 'Update data pegawai' : 'Input data pegawai baru'">Input data pegawai baru</p>
                                </div>
                            </div>
                            <button type="button" class="inline-flex items-center justify-center w-9 h-9 rounded-xl text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200"
                                aria-label="Close" data-overlay="#modal-form-data" id="modal-close">
                                <span class="icon-[tabler--x] size-5"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body p-6">
                        <form enctype="multipart/form-data" @submit.prevent="!isSubmitting ? storeData:UpdatedData">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Nama Lengkap -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--user] size-4 text-gray-400"></span>
                                            Nama Lengkap
                                        </span>
                                    </label>
                                    <input x-model="form.nama" type="text" placeholder="Masukkan nama lengkap" 
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Nomor Identitas -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--id] size-4 text-gray-400"></span>
                                            Nomor Identitas
                                        </span>
                                    </label>
                                    <input x-model="form.no_identitas" type="text" placeholder="Masukkan no. identitas"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Jenis Kelamin -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--gender-male-female] size-4 text-gray-400"></span>
                                            Jenis Kelamin
                                        </span>
                                    </label>
                                    <div class="relative">
                                        <select class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200" 
                                            x-model="form.jenis_kelamin">
                                            <option value="1">Laki-laki</option>
                                            <option value="0">Perempuan</option>
                                        </select>
                                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                            <span class="icon-[tabler--chevron-down] size-5"></span>
                                        </span>
                                    </div>
                                </div>

                                <!-- Tempat Lahir -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--map-pin] size-4 text-gray-400"></span>
                                            Tempat Lahir
                                        </span>
                                    </label>
                                    <input x-model="form.tempat_lahir" type="text" placeholder="Masukkan tempat lahir"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Tanggal Lahir -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--calendar] size-4 text-gray-400"></span>
                                            Tanggal Lahir
                                        </span>
                                    </label>
                                    <input x-model="form.tanggal_lahir" type="date" placeholder="Pilih tanggal lahir"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Alamat -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--map-pin] size-4 text-gray-400"></span>
                                            Alamat
                                        </span>
                                    </label>
                                    <textarea x-model="form.alamat" class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none" 
                                        rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                                </div>

                                <!-- Telepon -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--phone] size-4 text-gray-400"></span>
                                            Nomor Telepon
                                        </span>
                                    </label>
                                    <input x-model="form.telpon" type="text" placeholder="Masukkan nomor telepon"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--mail] size-4 text-gray-400"></span>
                                            Email
                                        </span>
                                    </label>
                                    <input x-model="form.email" type="email" placeholder="Masukkan email"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- File Upload -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--upload] size-4 text-gray-400"></span>
                                            Upload Foto
                                        </span>
                                    </label>
                                    <input x-model="form.file" type="file" placeholder="Pilih file foto"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div class="flex items-center justify-end gap-3 mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                                <button type="button" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200"
                                    @click="modalClose">
                                    <span class="icon-[tabler--x] size-4"></span>
                                    Batal
                                </button>
                                <button type="submit" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200"
                                    x-text="isLoad ? 'Loading...' : 'Simpan'" :disabled="isLoad">
                                    <span class="icon-[tabler--device-floppy] size-4"></span>
                                    <span x-text="isLoad ? 'Loading...' : 'Simpan'"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End modal add --}}


        {{-- Modal Update --}}
        <button id="btn-open-edit" class="btn hidden btn-error btn-soft" type="button" aria-haspopup="dialog"
            aria-expanded="false" aria-controls="modal-open-edit" data-overlay="#modal-open-edit">
            <span class="icon-[tabler--user-plus]"></span>
            open edit
        </button>

        <div id="modal-open-edit" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
            tabindex="-1">
            <div class="overlay-animation-target modal-dialog overlay-open:mt-4 overlay-open:opacity-100 overlay-open:duration-500 mt-12 transition-all ease-out">
                <div class="modal-content bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden">
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-white dark:from-gray-700 dark:to-gray-800">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center">
                                    <span class="icon-[mynaui--user-diamond] size-5 text-white"></span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Form Update Pegawai</h3>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Update data pegawai yang ada</p>
                                </div>
                            </div>
                            <button type="button" class="inline-flex items-center justify-center w-9 h-9 rounded-xl text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200"
                                aria-label="Close" data-overlay="#modal-open-edit" id="modal-close">
                                <span class="icon-[tabler--x] size-5"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body p-6">
                        <form enctype="multipart/form-data" @submit.prevent="UpdatedData">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Nama Lengkap -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--user] size-4 text-gray-400"></span>
                                            Nama Lengkap
                                        </span>
                                    </label>
                                    <input x-model="edit.nama" type="text" placeholder="Masukkan nama lengkap" 
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Nomor Identitas -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--id] size-4 text-gray-400"></span>
                                            Nomor Identitas
                                        </span>
                                    </label>
                                    <input x-model="edit.no_identitas" type="text" placeholder="Masukkan no. identitas"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Jenis Kelamin -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--gender-male-female] size-4 text-gray-400"></span>
                                            Jenis Kelamin
                                        </span>
                                    </label>
                                    <div class="relative">
                                        <select class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white appearance-none cursor-pointer transition-all duration-200" 
                                            x-model="edit.jenis_kelamin">
                                            <option value="1">Laki-laki</option>
                                            <option value="0">Perempuan</option>
                                        </select>
                                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                            <span class="icon-[tabler--chevron-down] size-5"></span>
                                        </span>
                                    </div>
                                </div>

                                <!-- Tempat Lahir -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--map-pin] size-4 text-gray-400"></span>
                                            Tempat Lahir
                                        </span>
                                    </label>
                                    <input x-model="edit.tempat_lahir" type="text" placeholder="Masukkan tempat lahir"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Tanggal Lahir -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--calendar] size-4 text-gray-400"></span>
                                            Tanggal Lahir
                                        </span>
                                    </label>
                                    <input x-model="edit.tanggal_lahir" type="date" placeholder="Pilih tanggal lahir"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Alamat -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--map-pin] size-4 text-gray-400"></span>
                                            Alamat
                                        </span>
                                    </label>
                                    <textarea x-model="edit.alamat" class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none" 
                                        rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                                </div>

                                <!-- Telepon -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--phone] size-4 text-gray-400"></span>
                                            Nomor Telepon
                                        </span>
                                    </label>
                                    <input x-model="edit.telpon" type="text" placeholder="Masukkan nomor telepon"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--mail] size-4 text-gray-400"></span>
                                            Email
                                        </span>
                                    </label>
                                    <input x-model="edit.email" type="email" placeholder="Masukkan email"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200" />
                                </div>

                                <!-- File Upload -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--upload] size-4 text-gray-400"></span>
                                            Upload Foto
                                        </span>
                                    </label>
                                    <input x-model="edit.file" type="file" placeholder="Pilih file foto"
                                        class="w-full px-4 py-3 text-sm border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div class="flex items-center justify-end gap-3 mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                                <button type="button" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200"
                                    aria-label="Close" data-overlay="#modal-open-edit"
                                    id="modal-edit-close">
                                    <span class="icon-[tabler--x] size-4"></span>
                                    Batal
                                </button>
                                <button type="submit" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 rounded-xl shadow-lg shadow-amber-500/30 transition-all duration-200"
                                    :disabled="isLoad" x-text="isLoad ? 'Loading...' : 'Update'">
                                    <span class="icon-[tabler--device-floppy] size-4"></span>
                                    <span x-text="isLoad ? 'Loading...' : 'Update'"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End modal update --}}
    </div>

    @push('js')
        <script>
            window.addEventListener('load', function() {
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            })

            function managementPegawai() {
                return {
                    form: {
                        id: '',
                        nama: '',
                        jenis_kelamin: '',
                        no_identitas: '',
                        alamat: '',
                        telpon: '',
                        email: '',
                        file: '',
                        tempat_lahir: '',
                        tanggal_lahir: ''
                    },
                    isSubmitting: false,
                    isLoad: false,
                    async storeData() {
                        this.isLoad = true;
                        try {
                            const url = "/management/pegawai-store";
                            const res = await axios.post(url, this.form, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            });
                            this.resetForm();
                            this.isLoad = false;
                            this.loadData();
                        } catch (error) {
                            console.log(error);
                        }
                    },


                    edit: {
                        id: '',
                        nama: '',
                        jenis_kelamin: '',
                        no_identitas: '',
                        alamat: '',
                        telpon: '',
                        email: '',
                        file: '',
                        tempat_lahir: '',
                        tanggal_lahir: ''
                    },
                    getEdit(index) {
                        const modalOpen = document.getElementById('btn-open-edit');
                        this.edit = {
                                id: index.id,
                                nama: index.pegawai_name,
                                jenis_kelamin: index.gender,
                                no_identitas: index.no_identitas,
                                alamat: index.alamat,
                                telpon: index.telpon,
                                email: index.email,
                                file: index.file,
                                tempat_lahir: index.tempat_lahir,
                                tanggal_lahir: index.tanggal_lahir
                            },
                            modalOpen.click();

                    },
                    async UpdatedData() {
                        this.isLoad = true;
                        const url = '/management/pegawai-updated';
                        axios.post(url, this.edit, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                            }
                        }).then((res) => {
                            this.isLoad = false;
                            notifier.success(res.message);
                            const btnClose = document.getElementById('modal-edit-close');
                            this.resetForm();
                            btnClose.click();
                        }).catch((error) => {
                            console.log(error);
                        }).finally(() => {
                            this.loadData();
                        });
                    },

                    deleteData(key) {
                        const id = key;
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
                                try {
                                    const url = "/management/pegawai-deleted";
                                    const res = await axios.post(url, {
                                        key: id
                                    });
                                    this.loadData();
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } catch (error) {
                                    console.log(error);
                                }
                            }
                        });
                    },

                    modalClose() {
                        this.form = {
                            id: '',
                            nama: '',
                            jenis_kelamin: '',
                            no_identitas: '',
                            alamat: '',
                            telpon: '',
                            email: '',
                            file: '',
                            tempat_lahir: '',
                            tanggal_lahir: ''
                        }
                        this.isSubmitting = false;
                        const closeBtn = document.getElementById('modal-close');
                        closeBtn.click();
                    },

                    dataTable: [],
                    async loadData() {
                        try {
                            const url = "/management/pegawai-fetch-data";
                            const res = await axios.get(url);
                            const data = res.data.data;
                            this.dataTable = data;
                            console.log(data)
                        } catch (error) {
                            console.error(error)
                        }
                    },
                    resetForm() {
                        this.form = {
                            id: '',
                            nama: '',
                            jenis_kelamin: '',
                            no_identitas: '',
                            alamat: '',
                            telpon: '',
                            email: '',
                            file: '',
                            tempat_lahir: '',
                            tanggal_lahir: ''
                        }
                    },
                    init() {
                        this.loadData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
