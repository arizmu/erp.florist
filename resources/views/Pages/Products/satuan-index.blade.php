<x-base-layout>
    <div x-data="satuanIndex">
        <!-- Page Header -->
        <div class="mb-6">
            <!-- Breadcrumbs -->
            <div class="mb-4 text-sm">
                <nav class="flex items-center text-gray-500">
                    <a href="#" class="flex items-center gap-2 hover:text-blue-600 transition-colors">
                        <span class="icon-[tabler--home] size-5"></span>
                        <span>Home</span>
                    </a>
                    <span class="mx-3 text-gray-300">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </span>
                    <a href="#" aria-label="More Pages" class="flex items-center gap-1 hover:text-blue-600 transition-colors">
                        <span class="icon-[tabler--dots]"></span>
                        <span>More Pages</span>
                    </a>
                    <span class="mx-3 text-gray-300">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </span>
                    <span class="flex items-center gap-2 font-medium text-gray-700">
                        <span class="icon-[tabler--scale] size-5 text-blue-500"></span>
                        <span>Satuan Barang</span>
                    </span>
                </nav>
            </div>

            <!-- Page Title -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                        <span class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-3 shadow-lg shadow-blue-500/30">
                            <span class="icon-[tabler--scale] size-6 text-white"></span>
                        </span>
                        Unit Management
                    </h1>
                    <p class="text-gray-500 mt-2 ml-1">Manage product measurement units</p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-4 gap-6">
            <!-- Left Column: Form and Table -->
            <div class="lg:col-span-3 space-y-6">
                
                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                        <div class="flex items-center gap-3 text-white">
                            <span class="icon-[tabler--edit] size-6"></span>
                            <div>
                                <h2 class="text-xl font-bold" x-text="isUpdated ? 'Update Unit' : 'Add New Unit'"></h2>
                                <p class="text-blue-100 text-sm" x-text="isUpdated ? 'Edit existing unit details' : 'Create a new measurement unit'"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <form @submit.prevent="!isUpdated ? storeSatuan : udpateSatuan" class="space-y-5">
                            <!-- Unit Name Input -->
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <span class="icon-[tabler--tag] size-4 text-blue-500"></span>
                                    Unit Name
                                </label>
                                <div class="relative">
                                    <input 
                                        x-model="xform.satuan" 
                                        type="text" 
                                        placeholder="Enter unit name (e.g., kg, pcs, liter)..."
                                        required 
                                        class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 shadow-sm"
                                        :class="{'border-blue-500 ring-2 ring-blue-500': isUpdated}" />
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <span class="icon-[tabler--text] size-5"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment Textarea -->
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <span class="icon-[tabler--message] size-4 text-orange-500"></span>
                                    Comment
                                </label>
                                <div class="relative">
                                    <textarea 
                                        x-model="xform.comment" 
                                        placeholder="Add a comment or description..."
                                        rows="3"
                                        class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 shadow-sm resize-none"></textarea>
                                    <div class="absolute right-4 bottom-3 text-gray-400 pointer-events-none">
                                        <span class="icon-[tabler--note] size-5"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-wrap gap-3 pt-2">
                                <button 
                                    type="reset"
                                    @click="reseFrom()"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 transition-all duration-200">
                                    <span class="icon-[tabler--refresh] size-5"></span>
                                    <span>Reset</span>
                                </button>
                                <button 
                                    :disabled="isSubmitting"
                                    type="submit"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-xl hover:from-blue-600 hover:to-indigo-700 focus:ring-4 focus:ring-blue-200 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40">
                                    <span x-show="!isSubmitting" class="icon-[tabler--device-floppy] size-5"></span>
                                    <span x-show="isSubmitting" class="icon-[tabler--loader-2] size-5 animate-spin"></span>
                                    <span x-text="isSubmitting ? 'Saving...' : (isUpdated ? 'Update Unit' : 'Save Unit')"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Data Table Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-4">
                        <div class="flex items-center gap-3 text-white">
                            <span class="icon-[tabler--list-details] size-6"></span>
                            <div>
                                <h2 class="text-xl font-bold">Unit List</h2>
                                <p class="text-emerald-100 text-sm">View and manage all units</p>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--abc] size-4"></span>
                                            Unit Name
                                        </span>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <span class="flex items-center gap-2">
                                            <span class="icon-[tabler--message-circle] size-4"></span>
                                            Comment
                                        </span>
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <span class="flex items-center justify-center gap-2">
                                            <span class="icon-[tabler--settings] size-4"></span>
                                            Actions
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <template x-for="(item, index) in datas" :key="item.id">
                                    <tr class="hover:bg-blue-50/50 transition-colors duration-150">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="bg-blue-100 rounded-lg p-2">
                                                    <span class="icon-[tabler--scale] size-5 text-blue-600"></span>
                                                </div>
                                                <span class="font-semibold text-gray-800" x-text="item.nama_satuan"></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-gray-600 text-sm" x-text="item.comment || '-'"></div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-2">
                                                <button 
                                                    x-on:click="getSatuan(item)" 
                                                    type="button" 
                                                    class="inline-flex items-center justify-center w-10 h-10 bg-amber-100 text-amber-600 rounded-xl hover:bg-amber-200 focus:ring-4 focus:ring-amber-200 transition-all duration-200"
                                                    aria-label="Edit unit">
                                                    <span class="icon-[tabler--pencil] size-5"></span>
                                                </button>
                                                <button 
                                                    x-on:click="satuanDelete(item.id)" 
                                                    type="button" 
                                                    class="inline-flex items-center justify-center w-10 h-10 bg-red-100 text-red-600 rounded-xl hover:bg-red-200 focus:ring-4 focus:ring-red-200 transition-all duration-200"
                                                    aria-label="Delete unit">
                                                    <span class="icon-[tabler--trash] size-5"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="datas.length === 0">
                                    <td colspan="3" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center gap-4">
                                            <div class="bg-gray-100 rounded-full p-4">
                                                <span class="icon-[tabler--scale-off] size-12 text-gray-400"></span>
                                            </div>
                                            <div>
                                                <p class="text-gray-600 font-medium">No units found</p>
                                                <p class="text-gray-400 text-sm mt-1">Add a new unit to get started</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar Panel -->
            <div class="lg:col-span-1 order-first lg:order-last">
                <x-panel.panel-product />
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function satuanIndex() {
                return {
                    datas: [],
                    xform: {
                        id: '',
                        satuan: '',
                        comment: ''
                    },
                    isSubmitting: false,
                    isUpdated: false,
                    
                    async satuanDelete(key) {
                        const url = `/master-barang/satuan-delete/${key}`;
                        const response = await axios.post(url);
                        const res = response.data;
                        this.init()
                    },

                    getSatuan(index) {
                        this.isUpdated = true;
                        this.xform = {
                            id: index.id,
                            satuan: index.nama_satuan,
                            comment: index.comment
                        }
                    },

                    async udpateSatuan() {
                        this.isSubmitting = true;
                        const url = `/master-barang/satuan-update/${this.xform.id}`;
                        const response = await axios.post(url, this.xform);
                        const res = response.data;
                        this.getData()
                        this.isSubmitting = false;
                        this.isUpdated = false;
                        this.init();
                    },

                    async storeSatuan() {
                        this.isSubmitting = true;
                        const url = `/master-barang/satuan-store`;
                        const response = await axios.post(url, this.xform);
                        const res = response.data;
                        this.init()
                    },
                    async getData() {
                        const url = `/master-barang/satuan-get-json`;
                        const response = await axios.get(url);
                        const data = response.data.data.data;
                        this.datas = data;
                    },
                    reseFrom() {
                        this.xform = {
                            id: '',
                            satuan: '',
                            comment: ''
                        }
                    },
                    init() {
                        this.getData()
                        this.isSubmitting = false;
                        this.isUpdated = false;
                        this.reseFrom();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
