<x-base-layout>

    <!-- Page Header -->
    <div class="mb-6">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs mb-4 text-sm">
            <ol>
                <li>
                    <a href="#" class="flex items-center gap-2 hover:text-primary transition-colors">
                        <span class="icon-[tabler--home] size-5"></span>
                        Home
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li>
                    <a href="#" aria-label="Products" class="hover:text-primary transition-colors">
                        <span class="icon-[tabler--package]"></span>
                        Products
                    </a>
                </li>
                <li class="breadcrumbs-separator rtl:rotate-180">
                    <span class="icon-[tabler--chevron-right]"></span>
                </li>
                <li aria-current="page" class="font-medium text-primary">
                    <span class="icon-[tabler--category me-1 size-5"></span>
                    Category Barang
                </li>
            </ol>
        </div>

        <!-- Page Title -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-xl md:text-1xl font-bold text-gray-700 flex items-center gap-3">
                    <span class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-2.5 shadow-lg shadow-blue-500/30">
                        <span class="icon-[tabler--category] size-5 text-white"></span>
                    </span>
                    Category Management
                </h1>
                <p class="text-gray-500 mt-2 ml-1">Manage your product categories efficiently</p>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-4 gap-6" x-data="KategoriBarang">
        
        <!-- Left Column: Form and Table -->
        <div class="xl:col-span-3 space-y-6">
            
            <!-- Form Card -->
            <div class="card shadow-xl border-0">
                <!-- Card Header -->
                <div class="card-header bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                    <div class="flex items-center gap-3 text-white">
                        <span class="icon-[tabler--edit] size-6"></span>
                        <h3 class="text-xl font-bold" x-text="isUpdated ? 'Update Category' : 'Add New Category'"></h3>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-6">
                    <form @submit.prevent="isUpdated ? updateCategory:categoryStore" class="space-y-5">
                        <!-- Category Name Input -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="icon-[tabler--tag] size-4 text-blue-500"></span>
                                Category Name
                            </label>
                            <div class="relative">
                                <input type="text" 
                                    placeholder="Enter category name"
                                    class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 shadow-sm"
                                    x-model="xform.category" 
                                    required 
                                    :class="{'border-blue-500 ring-2 ring-blue-500': isUpdated}" />
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <span class="icon-[tabler--text] size-5"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Comment Textarea -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="icon-[tabler--message] size-4 text-indigo-500"></span>
                                Comment
                            </label>
                            <div class="relative">
                                <textarea 
                                    class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 shadow-sm resize-none"
                                    placeholder="Add a comment or description..."
                                    rows="3"
                                    x-model="xform.comment"></textarea>
                                <div class="absolute right-4 top-4 text-gray-400">
                                    <span class="icon-[tabler--note] size-5"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap gap-3 pt-2">
                            <button type="submit" 
                                :disabled="isSubmitting"
                                class="btn btn-primary gap-2 font-semibold shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all duration-300 rounded-xl px-6 py-3"
                                :class="{'opacity-50 cursor-not-allowed': isSubmitting}">
                                <span x-show="!isSubmitting" class="icon-[tabler--device-floppy] size-5"></span>
                                <span x-show="isSubmitting" class="icon-[tabler--loader-2] size-5 animate-spin"></span>
                                <span x-text="isSubmitting ? 'Saving...' : (isUpdated ? 'Update Category' : 'Save Category')"></span>
                            </button>
                            
                            <button type="button" 
                                @click="resetForm"
                                class="btn btn-soft btn-secondary gap-2 font-semibold hover:scale-105 transition-transform rounded-xl px-6 py-3">
                                <span class="icon-[tabler--refresh] size-5"></span>
                                <span>Reset</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Data Table Card -->
            <div class="card shadow-xl border-0">
                <!-- Card Header -->
                <div class="card-header bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-4">
                    <div class="flex items-center gap-3 text-white">
                        <span class="icon-[tabler--list-details] size-6"></span>
                        <h3 class="text-xl font-bold">Category List</h3>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-6">
                    <!-- Search and Filter Bar -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                        <!-- Search -->
                        <div class="relative flex-1">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <span class="icon-[tabler--search] size-5"></span>
                            </span>
                            <input type="text" 
                                class="input input-bordered pl-12 w-full py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all duration-200"
                                placeholder="Search categories..."
                                x-model="search"
                                @keyup.enter="searchAct" />
                        </div>
                        
                        <!-- Rows per page -->
                        <div class="flex items-center gap-2">
                            <select x-model="range" 
                                class="select bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all duration-200 shadow-sm">
                                <option value="15">15 items</option>
                                <option value="25">25 items</option>
                                <option value="50">50 items</option>
                                <option value="100">100 items</option>
                            </select>
                        </div>
                    </div>

                    <!-- Table Container -->
                    <div class="border-2 border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="font-semibold text-gray-600">
                                            <span class="flex items-center gap-2">
                                                <span class="icon-[tabler--abc] size-4"></span>
                                                Category Name
                                            </span>
                                        </th>
                                        <th class="font-semibold text-gray-600">
                                            <span class="flex items-center gap-2">
                                                <span class="icon-[tabler--message-circle] size-4"></span>
                                                Comment
                                            </span>
                                        </th>
                                        <th class="font-semibold text-gray-600 text-center">
                                            <span class="flex items-center justify-center gap-2">
                                                <span class="icon-[tabler--settings] size-4"></span>
                                                Actions
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(value, index) in datatable" :key="value.id">
                                        <tr class="hover:bg-emerald-50/50 transition-colors">
                                            <td class="font-medium text-gray-800">
                                                <div class="flex items-center gap-3">
                                                    <div class="bg-blue-100 rounded-lg p-2">
                                                        <span class="icon-[tabler--folder-filled] size-5 text-blue-600"></span>
                                                    </div>
                                                    <span x-text="value.category_name"></span>
                                                </div>
                                            </td>
                                            <td class="text-gray-600 text-sm" x-text="value.comment || '-'"></td>
                                            <td>
                                                <div class="flex items-center justify-center gap-2">
                                                    <button type="button" 
                                                        @click="getEdit(value)"
                                                        class="btn btn-circle btn-sm btn-soft btn-amber hover:scale-110 transition-transform shadow-sm"
                                                        aria-label="Edit category">
                                                        <span class="icon-[tabler--pencil] size-4"></span>
                                                    </button>
                                                    <button type="button" 
                                                        x-on:click="deleteCategory(value.id)"
                                                        class="btn btn-circle btn-sm btn-soft btn-error hover:scale-110 transition-transform shadow-sm"
                                                        aria-label="Delete category">
                                                        <span class="icon-[tabler--trash] size-4"></span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                    
                                    <!-- Empty State -->
                                    <tr x-show="datatable.length === 0">
                                        <td colspan="3">
                                            <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                                                <div class="bg-emerald-50 rounded-full p-4 mb-4">
                                                    <span class="icon-[tabler--folder-off] size-12 text-emerald-400"></span>
                                                </div>
                                                <p class="font-medium">No categories found</p>
                                                <p class="text-sm">Try adjusting your search or add a new category</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pt-6 flex justify-end">
                        <nav class="flex gap-2">
                            <button type="button" 
                                class="btn btn-soft btn-secondary gap-2 px-4 hover:scale-105 transition-transform shadow-sm"
                                :disabled="true">
                                <span class="icon-[tabler--chevron-left] size-4"></span>
                                <span class="hidden sm:inline">Previous</span>
                            </button>
                            <button type="button" 
                                class="btn btn-soft btn-secondary gap-2 px-4 hover:scale-105 transition-transform shadow-sm"
                                :disabled="true">
                                <span class="hidden sm:inline">Next</span>
                                <span class="icon-[tabler--chevron-right] size-4"></span>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Sidebar Panel -->
        <div class="xl:col-span-1 order-first xl:order-last">
            <x-panel.panel-product />
        </div>
    </div>

    @push('js')
        <script>
            function KategoriBarang() {
                return {
                    datatable: [],
                    xform: {
                        code: '',
                        category: '',
                        comment: ''
                    },
                    range: 15,
                    isSubmitting: false,
                    isUpdated: false,
                    search: '',
                    async searchAct() {
                        try {
                            const url = `/master-barang/category-json?search=${this.search}&range=${this.range}`;
                            const response = await axios.get(url);
                            const data = response.data.data.data;
                            this.datatable = data;
                        } catch (error) {
                            console.error("Error fetching data:", error);
                        }
                    },

                    async updateCategory() {
                        this.isSubmitting = true;
                        try {
                            const url = `/master-barang/category-updated/${this.xform.code}`;
                            const response = await axios.post(url, this.xform);
                            this.getData();
                            this.resetForm();
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    getEdit(item) {
                        this.isUpdated = true;
                        this.xform.code = item.id;
                        this.xform.category = item.category_name;
                        this.xform.comment = item.comment;
                        console.log(this.xform);
                    },

                    async categoryStore() {
                        this.isSubmitting = true;
                        var token = document.querySelector('meta[name="csrf-token"]').content;
                        const FormData = {
                            method: 'post',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token
                            },
                            body: JSON.stringify(this.xform)
                        }
                        const store = await fetch("/master-barang/category-store", FormData);
                        const response = await store.json();
                        const option = {};
                        option.icons = {
                            prefix: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15">`,
                            success: `<path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />`,
                            suffix: `</svg>`,
                        }
                        notifier.success('created is susscess', option);
                        this.getData();
                        this.xform = {
                            code: '',
                            category: '',
                            comment: ''
                        }
                        setTimeout(() => {
                            this.isSubmitting = false;
                        }, 3000);
                    },

                    async getData() {
                        const response = await fetch("/master-barang/category-json");
                        const data = await response.json();
                        const arrayData = data.data;
                        const table = arrayData.data;
                        this.datatable = table;
                    },

                    deleteCategory(key) {
                        const keyid = key;

                        let onOk = async () => {
                            let url = `/master-barang/delete-category/${keyid}`;
                            const response = await fetch(url);
                            const res = await response.json();
                            console.log(res);
                            this.getData()
                            notifier.success('You pressed is success')
                        };
                        let onCancel = () => {
                            notifier.info('You pressed Cancel')
                        };
                        notifier.confirm(
                            'Are you sure?',
                            onOk,
                            onCancel, {
                                labels: {
                                    confirm: 'Dangerous action'
                                }
                            }
                        )
                    },

                    resetForm() {
                        this.xform = {
                            code: '',
                            category: '',
                            comment: ''
                        }
                        this.isUpdated = false;
                        this.isSubmitting = false;
                    },

                    init() {
                        this.getData();
                    }
                }
            }
        </script>
    @endpush
</x-base-layout>
