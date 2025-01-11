<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-2.5 flex gap-4  align-middle text-red-500 font-semibold font-space" style="">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-7 mt-1">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
            </svg>
            <span>
                Menu Navigation
            </span>
        </h5>
        <div class="py-4">
            <div class="flex flex-wrap gap-4 md:flex-col">
                <a href="{{ route("barang.index") }}"
                    class="flex gap-4 bg-gray-100 p-4 py-3 rounded-md hover:bg-blue-100">
                    <span>
                        <span class="icon-[proicons--folder]" style="width: 24px; height: 24px;"></span>
                    </span>
                    <span class="font-muse text-md">Data Barang</span>
                </a>
                <a href="{{ route("category.index") }}"
                    class="flex gap-4 bg-gray-100 p-4 py-3 rounded-md hover:bg-blue-100">
                    <span>
                        <span class="icon-[proicons--folder]" style="width: 24px; height: 24px;"></span>
                    </span>
                    <span class="font-muse text-md">Kategori Barang</span>
                </a>
                <a href="{{ route("satuan.index") }}"
                    class="flex gap-4 bg-gray-100 p-4 py-3 rounded-md hover:bg-blue-100">
                    <span>
                        <span class="icon-[proicons--folder]" style="width: 24px; height: 24px;"></span>
                    </span>
                    <span class="font-muse text-md">Satuan Barang</span>
                </a>
            </div>
        </div>
    </div>
</div>
