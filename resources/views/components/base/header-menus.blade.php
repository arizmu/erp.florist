<div class="modal-body">
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 p-3 max-h-[60vh] overflow-y-auto font-poppins text-xs">
        
        {{-- Manajemen Penjualan --}}
        <div class="menu-card bg-gradient-to-br from-emerald-50/50 to-teal-50/50 dark:from-emerald-900/10 dark:to-teal-900/10 rounded-xl p-3 border border-emerald-100/50 dark:border-emerald-800/30 hover:shadow-lg hover:shadow-emerald-100/20 dark:hover:shadow-emerald-900/20 transition-all duration-300 hover:-translate-y-0.5">
            <h4 class="font-semibold text-emerald-700 dark:text-emerald-400 text-xs mb-2 flex items-center gap-2">
                <span class="icon-[tabler--shopping-cart] size-4"></span>
                Penjualan
            </h4>
            <div class="flex flex-col gap-0.5">
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-emerald-100 dark:hover:bg-emerald-800/30 hover:text-emerald-700 dark:hover:text-emerald-300 transition-all duration-200 group"
                    href="{{ route('kasir.index') }}">
                    <span class="icon-[tabler--device-desktop-check] size-4 text-gray-400 dark:text-gray-500 group-hover:text-emerald-500 dark:group-hover:text-emerald-400 transition-colors"></span>
                    <span class="truncate">Kasir</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-emerald-100 dark:hover:bg-emerald-800/30 hover:text-emerald-700 dark:hover:text-emerald-300 transition-all duration-200 group"
                    href="{{ route('preoder.form.layout') }}">
                    <span class="icon-[tabler--clipboard-list] size-4 text-gray-400 dark:text-gray-500 group-hover:text-emerald-500 dark:group-hover:text-emerald-400 transition-colors"></span>
                    <span class="truncate">Pre-order</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-emerald-100 dark:hover:bg-emerald-800/30 hover:text-emerald-700 dark:hover:text-emerald-300 transition-all duration-200 group"
                    href="{{ route('transaksi.index') }}">
                    <span class="icon-[tabler--basket-check] size-4 text-gray-400 dark:text-gray-500 group-hover:text-emerald-500 dark:group-hover:text-emerald-400 transition-colors"></span>
                    <span class="truncate">Transaksi</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-emerald-100 dark:hover:bg-emerald-800/30 hover:text-emerald-700 dark:hover:text-emerald-300 transition-all duration-200 group"
                    href="{{ route('costumer.index') }}">
                    <span class="icon-[fa6-solid--users-viewfinder] size-4 text-gray-400 dark:text-gray-500 group-hover:text-emerald-500 dark:group-hover:text-emerald-400 transition-colors"></span>
                    <span class="truncate">Customers</span>
                </a>
            </div>
        </div>

        {{-- Manajemen Product --}}
        <div class="menu-card bg-gradient-to-br from-blue-50/50 to-indigo-50/50 dark:from-blue-900/10 dark:to-indigo-900/10 rounded-xl p-3 border border-blue-100/50 dark:border-blue-800/30 hover:shadow-lg hover:shadow-blue-100/20 dark:hover:shadow-blue-900/20 transition-all duration-300 hover:-translate-y-0.5">
            <h4 class="font-semibold text-blue-700 dark:text-blue-400 text-xs mb-2 flex items-center gap-2">
                <span class="icon-[tabler--package] size-4"></span>
                Product
            </h4>
            <div class="flex flex-col gap-0.5">
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-800/30 hover:text-blue-700 dark:hover:text-blue-300 transition-all duration-200 group"
                    href="{{ route('product.index') }}">
                    <span class="icon-[tabler--list-details] size-4 text-gray-400 dark:text-gray-500 group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors"></span>
                    <span class="truncate">Product</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-800/30 hover:text-blue-700 dark:hover:text-blue-300 transition-all duration-200 group"
                    href="{{ route('produksi.index') }}">
                    <span class="icon-[tabler--category] size-4 text-gray-400 dark:text-gray-500 group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors"></span>
                    <span class="truncate">Production</span>
                </a>
            </div>
        </div>

        {{-- Manajemen Inventaris --}}
        <div class="menu-card bg-gradient-to-br from-amber-50/50 to-orange-50/50 dark:from-amber-900/10 dark:to-orange-900/10 rounded-xl p-3 border border-amber-100/50 dark:border-amber-800/30 hover:shadow-lg hover:shadow-amber-100/20 dark:hover:shadow-amber-900/20 transition-all duration-300 hover:-translate-y-0.5">
            <h4 class="font-semibold text-amber-700 dark:text-amber-400 text-xs mb-2 flex items-center gap-2">
                <span class="icon-[tabler--warehouse] size-4"></span>
                Inventaris
            </h4>
            <div class="flex flex-col gap-0.5">
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-amber-100 dark:hover:bg-amber-800/30 hover:text-amber-700 dark:hover:text-amber-300 transition-all duration-200 group"
                    href="{{ route('inventory.index') }}">
                    <span class="icon-[tabler--database] size-4 text-gray-400 dark:text-gray-500 group-hover:text-amber-500 dark:group-hover:text-amber-400 transition-colors"></span>
                    <span class="truncate">Inventory Data</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-amber-100 dark:hover:bg-amber-800/30 hover:text-amber-700 dark:hover:text-amber-300 transition-all duration-200 group"
                    href="{{ route('inventory.form') }}">
                    <span class="icon-[tabler--circle-plus] size-4 text-gray-400 dark:text-gray-500 group-hover:text-amber-500 dark:group-hover:text-amber-400 transition-colors"></span>
                    <span class="truncate">Inventory Masuk</span>
                </a>
            </div>
        </div>

        {{-- Manajemen Jasa --}}
        <div class="menu-card bg-gradient-to-br from-purple-50/50 to-pink-50/50 dark:from-purple-900/10 dark:to-pink-900/10 rounded-xl p-3 border border-purple-100/50 dark:border-purple-800/30 hover:shadow-lg hover:shadow-purple-100/20 dark:hover:shadow-purple-900/20 transition-all duration-300 hover:-translate-y-0.5">
            <h4 class="font-semibold text-purple-700 dark:text-purple-400 text-xs mb-2 flex items-center gap-2">
                <span class="icon-[tabler--tools] size-4"></span>
                Jasa
            </h4>
            <div class="flex flex-col gap-0.5">
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-purple-100 dark:hover:bg-purple-800/30 hover:text-purple-700 dark:hover:text-purple-300 transition-all duration-200 group"
                    href="{{ route('jasa.crafter.index') }}">
                    <span class="icon-[tabler--hammer] size-4 text-gray-400 dark:text-gray-500 group-hover:text-purple-500 dark:group-hover:text-purple-400 transition-colors"></span>
                    <span class="truncate">Jasa Produksi</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-purple-100 dark:hover:bg-purple-800/30 hover:text-purple-700 dark:hover:text-purple-300 transition-all duration-200 group"
                    href="{{ route('ref-jasa.index') }}">
                    <span class="icon-[tabler--tag] size-4 text-gray-400 dark:text-gray-500 group-hover:text-purple-500 dark:group-hover:text-purple-400 transition-colors"></span>
                    <span class="truncate">Ref. Jasa Produksi</span>
                </a>
            </div>
        </div>

        {{-- Manajemen Pelaporan --}}
        <div class="menu-card bg-gradient-to-br from-rose-50/50 to-red-50/50 dark:from-rose-900/10 dark:to-red-900/10 rounded-xl p-3 border border-rose-100/50 dark:border-rose-800/30 hover:shadow-lg hover:shadow-rose-100/20 dark:hover:shadow-rose-900/20 transition-all duration-300 hover:-translate-y-0.5">
            <h4 class="font-semibold text-rose-700 dark:text-rose-400 text-xs mb-2 flex items-center gap-2">
                <span class="icon-[tabler--chart-bar] size-4"></span>
                Pelaporan
            </h4>
            <div class="flex flex-col gap-0.5">
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-rose-100 dark:hover:bg-rose-800/30 hover:text-rose-700 dark:hover:text-rose-300 transition-all duration-200 group"
                    href="{{ route('laporanPenjualanLayout') }}">
                    <span class="icon-[tabler--file-chart] size-4 text-gray-400 dark:text-gray-500 group-hover:text-rose-500 dark:group-hover:text-rose-400 transition-colors"></span>
                    <span class="truncate">Laporan Penjualan</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-rose-100 dark:hover:bg-rose-800/30 hover:text-rose-700 dark:hover:text-rose-300 transition-all duration-200 group"
                    href="{{ route('laporanPenjualanDetail') }}">
                    <span class="icon-[tabler--file-analytics] size-4 text-gray-400 dark:text-gray-500 group-hover:text-rose-500 dark:group-hover:text-rose-400 transition-colors"></span>
                    <span class="truncate">Laporan Detail</span>
                </a>
            </div>
        </div>

        {{-- Manajemen Barang --}}
        <div class="menu-card bg-gradient-to-br from-cyan-50/50 to-sky-50/50 dark:from-cyan-900/10 dark:to-sky-900/10 rounded-xl p-3 border border-cyan-100/50 dark:border-cyan-800/30 hover:shadow-lg hover:shadow-cyan-100/20 dark:hover:shadow-cyan-900/20 transition-all duration-300 hover:-translate-y-0.5">
            <h4 class="font-semibold text-cyan-700 dark:text-cyan-400 text-xs mb-2 flex items-center gap-2">
                <span class="icon-[tabler--box] size-4"></span>
                Barang
            </h4>
            <div class="flex flex-col gap-0.5">
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-cyan-100 dark:hover:bg-cyan-800/30 hover:text-cyan-700 dark:hover:text-cyan-300 transition-all duration-200 group"
                    href="{{ route('barang.index') }}">
                    <span class="icon-[tabler--package] size-4 text-gray-400 dark:text-gray-500 group-hover:text-cyan-500 dark:group-hover:text-cyan-400 transition-colors"></span>
                    <span class="truncate">Bahan Baku</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-cyan-100 dark:hover:bg-cyan-800/30 hover:text-cyan-700 dark:hover:text-cyan-300 transition-all duration-200 group"
                    href="{{ route('category.index') }}">
                    <span class="icon-[tabler--folder] size-4 text-gray-400 dark:text-gray-500 group-hover:text-cyan-500 dark:group-hover:text-cyan-400 transition-colors"></span>
                    <span class="truncate">Category</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-cyan-100 dark:hover:bg-cyan-800/30 hover:text-cyan-700 dark:hover:text-cyan-300 transition-all duration-200 group"
                    href="{{ route('satuan.index') }}">
                    <span class="icon-[tabler--ruler] size-4 text-gray-400 dark:text-gray-500 group-hover:text-cyan-500 dark:group-hover:text-cyan-400 transition-colors"></span>
                    <span class="truncate">Satuan</span>
                </a>
            </div>
        </div>

        {{-- Manajemen Sistem --}}
        <div class="menu-card bg-gradient-to-br from-slate-50/50 to-gray-50/50 dark:from-slate-900/10 dark:to-gray-900/10 rounded-xl p-3 border border-slate-100/50 dark:border-slate-800/30 hover:shadow-lg hover:shadow-slate-100/20 dark:hover:shadow-slate-900/20 transition-all duration-300 hover:-translate-y-0.5">
            <h4 class="font-semibold text-slate-700 dark:text-slate-400 text-xs mb-2 flex items-center gap-2">
                <span class="icon-[tabler--settings] size-4"></span>
                Sistem
            </h4>
            <div class="flex flex-col gap-0.5">
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-slate-800/30 hover:text-slate-700 dark:hover:text-slate-300 transition-all duration-200 group"
                    href="{{ route('pegawai.index') }}">
                    <span class="icon-[ph--folder-user] size-4 text-gray-400 dark:text-gray-500 group-hover:text-slate-500 dark:group-hover:text-slate-400 transition-colors"></span>
                    <span class="truncate">Pegawai</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-slate-800/30 hover:text-slate-700 dark:hover:text-slate-300 transition-all duration-200 group"
                    href="{{ route('user.index') }}">
                    <span class="icon-[stash--shield-user] size-4 text-gray-400 dark:text-gray-500 group-hover:text-slate-500 dark:group-hover:text-slate-400 transition-colors"></span>
                    <span class="truncate">Pengguna</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-slate-800/30 hover:text-slate-700 dark:hover:text-slate-300 transition-all duration-200 group"
                    href="{{ route('role.permission.index') }}">
                    <span class="icon-[hugeicons--shield-energy] size-4 text-gray-400 dark:text-gray-500 group-hover:text-slate-500 dark:group-hover:text-slate-400 transition-colors"></span>
                    <span class="truncate">Role & Permission</span>
                </a>
                <a class="flex items-center gap-2 px-2 py-1.5 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-slate-800/30 hover:text-slate-700 dark:hover:text-slate-300 transition-all duration-200 group"
                    href="{{ route('app-setting.index') }}">
                    <span class="icon-[tabler--settings-2] size-4 text-gray-400 dark:text-gray-500 group-hover:text-slate-500 dark:group-hover:text-slate-400 transition-colors"></span>
                    <span class="truncate">Pengaturan</span>
                </a>
            </div>
        </div>

    </div>
</div>
