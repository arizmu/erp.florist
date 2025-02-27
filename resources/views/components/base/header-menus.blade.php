<div class="modal-body">
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:p-4 max-h-96" style="margin-bottom: 15pt">
        <div class="flex gap-4 flex-col">
            <h4 class="font-semibold  text-gray-500" style="--fw:500">
                Manajement Penjualan
            </h4>
            <div class="flex flex-col gap-1 border-l px-2">
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('kasir.index') }}">
                    <span class="icon-[tabler--device-desktop-check] size-6"></span>
                    <span class="">Kasir</span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('preoder.form.layout') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    <span class="">Pre-order</span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('transaksi.index') }}">
                    <span class="icon-[tabler--basket-check] size-6"></span>
                    <span class="">Transaksi</span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('costumer.index') }}">
                    <span class="icon-[fa6-solid--users-viewfinder] size-6"></span>
                    <span class="">Costumers</span>
                </a>
            </div>
        </div>
        <div class="flex gap-4 flex-col">
            <h4 class="font-semibold  text-gray-500" style="--fw:500">
                Manajement Product
            </h4>
            <div class="flex flex-col gap-1 border-l px-2">
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('product.index') }}">
                    <span class="icon-[tabler--list-details] size-6"></span>
                    <span class="">Product</span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('produksi.index') }}">
                    <span class="icon-[tabler--category] size-6"></span>
                    <span class="">Production</span>
                </a>
                {{-- <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('jenis.product.index') }}">
                    <span class="icon-[tabler--paperclip] size-6"></span>
                    <span class="">Jenis Product</span>
                </a> --}}
            </div>
        </div>
        <div class="flex gap-4 flex-col">
            <h4 class="font-semibold  text-gray-500" style="--fw:500">
                Manajemen Inventaris
            </h4>
            <div class="flex flex-col gap-1 border-l px-2">
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('inventory.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                    </svg>
                    <span class="">Invetory Data</span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('inventory.form') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <span class="">Invetory Masuk</span>
                </a>

                {{-- <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('inventory.form') }}">
                    <span class="icon-[basil--history-outline] size-6" style="width: 24px; height: 24px;"></span>
                    <span class="">
                        History

                    </span>
                </a> --}}
            </div>
        </div>
        <div class="flex gap-4 flex-col">
            <h4 class="font-semibold  text-gray-500" style="--fw:500">
                Manajemen Jasa

            </h4>
            <div class="flex flex-col gap-1 border-l px-2">
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('jasa.crafter.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                    </svg>

                    <span class="">Jasa Produksi</span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('ref-jasa.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <span class="">Referensi Jasa Produksi</span>
                </a>
            </div>
        </div>
        <div class="flex gap-4 flex-col">
            <h4 class="font-semibold  text-gray-500" style="--fw:500">
                Manajemen Pelaporan
            </h4>
            <div class="flex flex-col gap-1 border-l px-2">
                {{-- <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 9h3.75m-4.5 2.625h4.5M12 18.75 9.75 16.5h.375a2.625 2.625 0 0 0 0-5.25H9.75m.75-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    <span class="">Laporan Invetaris</span>
                </a> --}}
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('laporanPenjualanLayout') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 9h3.75m-4.5 2.625h4.5M12 18.75 9.75 16.5h.375a2.625 2.625 0 0 0 0-5.25H9.75m.75-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    <span class="">Laporan Penjualan</span>
                </a>
                {{-- <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 9h3.75m-4.5 2.625h4.5M12 18.75 9.75 16.5h.375a2.625 2.625 0 0 0 0-5.25H9.75m.75-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    <span class="">Laporan Produksi</span>
                </a> --}}
            </div>
        </div>
        <div class="flex gap-4 flex-col">
            <h4 class="font-semibold  text-gray-500" style="--fw:500">
                Manajemen Barang <span></span>
            </h4>
            <div class="flex flex-col gap-1 border-l px-2">
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('barang.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                    </svg>

                    <span class="">Barang (Bahan baku)</span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('category.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <span class="">Category</span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('satuan.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <span class="">Satuan</span>
                </a>
            </div>
        </div>
        <div class="flex gap-4 flex-col">
            <h4 class="font-semibold  text-gray-500" style="--fw:500">
                Manajemen Sistem
            </h4>
            <div class="flex flex-col gap-1 border-l px-2">
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('pegawai.index') }}">
                    <span class="size-6 icon-[ph--folder-user]"></span>
                    <span class="">Pegawai</span>
                </a>
                <a href="{{ route('user.index') }}"
                    class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100" href="">
                    <span class="icon-[stash--shield-user] size-6"></span>
                    <span class="">Pengguna</span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100" href="">
                    <span class="icon-[hugeicons--shield-energy] size-6"></span>
                    <span class="">Role & Permission
                    </span>
                </a>
                <a class="flex gap-3 p-2 hover:text-blue-600 hover:rounded-lg hover:bg-slate-100"
                    href="{{ route('app-setting.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                    </svg>
                    <span class="">Pengaturan</span>
                </a>
            </div>
        </div>
    </div>
</div>
