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
                Kasir
            </li>
        </ol>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mt-2">
        <div class="md:col-span-1 lg:col-span-3 order-last md:order-first">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-7 gap-3">
                    <div class="md:col-span-1 lg:col-span-2">
                        <div class="relative w-full">
                            <select class="select select-floating" aria-label="Select floating label"
                                id="selectFloating">
                                <option>Pilih ...</option>
                                <option>The Shawshank Redemption</option>
                                <option>Pulp Fiction</option>
                                <option>The Dark Knight</option>
                                <option>Schindler's List</option>
                            </select>
                            <label class="select-floating-label" for="selectFloating">Kategory</label>
                        </div>
                    </div>
                    <div class="md:col-span-2 lg:col-span-4">
                        <div class="relative">
                            <input type="text" placeholder="masukkan pencarian..." class="input input-floating peer"
                                id="floatingInput" />
                            <label class="input-floating-label" for="floatingInput">
                                Search
                            </label>
                        </div>
                    </div>
                    <div class="md:col-span-3 lg:col-span-1">
                        <button class="btn btn-outline btn-primary w-full">
                            Filter
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 py-4">
                <div class="card shadow-lg">
                    <figure>
                        <img src="https://cdn.flyonui.com/fy-assets/components/card/image-7.png" alt="headphone" />
                    </figure>
                    <div class="card-body">
                        <h5 class="card-title text-orange-400 text-2xl font-space" style="margin-top: -10pt">
                            Product Name
                        </h5>
                        <div class="py-3 flex flex-col gap-1 mb-2">
                            <div class="flex gap-3 align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="font-semibold">Rp. 100.000</span>
                            </div>
                            <div class="flex gap-3 align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.098 19.902a3.75 3.75 0 0 0 5.304 0l6.401-6.402M6.75 21A3.75 3.75 0 0 1 3 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 0 0 3.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008Z" />
                                </svg>
                                <span class="font-semibold">10 PCS</span>
                            </div>
                        </div>

                        <div class="flex gap-2 md:justify-start justify-center flex-wrap">
                            <button class="btn btn-error btn-soft">Costume</button>
                            <button class="btn btn-primary btn-soft">Add to cart</button>
                            <button class="btn btn-info btn-soft">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-1 lg:col-span-2">
            <div class="w-full bg-white shadow-lg relative ml-auto h-auto rounded-lg">
                <div class="p-6">
                    <div class="flex items-center gap-4 text-gray-800">
                        <h3 class="text-2xl font-bold flex-1">Shopping cart</h3>
                    </div>
                </div>
                <hr class="border-gray-300" />
                <div class="overflow-auto p-6" style="max-height: 700px; height: 500px;">
                    <div class="space-y-4">
                        <div class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img src='https://readymadeui.com/images/product14.webp'
                                        class="w-full h-full object-contain" />
                                </div>

                                <div class="flex flex-col">
                                    <h3 class="text-base max-sm:text-sm font-bold text-gray-800">Velvet Sneaker
                                    </h3>
                                    <p class="text-xs font-semibold text-gray-500 mt-0.5">Size: MD</p>

                                    <button type="button"
                                        class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000"></path>
                                        </svg>
                                        REMOVE
                                    </button>
                                </div>
                            </div>

                            <div class="ml-auto">
                                <h4 class="text-lg max-sm:text-base max-sm:text-sm font-bold text-gray-800">
                                    $20.00</h4>

                                <button type="button"
                                    class="mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>

                                    <span class="mx-3 font-bold">2</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img src='https://readymadeui.com/images/watch5.webp'
                                        class="w-full h-full object-contain" />
                                </div>

                                <div class="flex flex-col">
                                    <h3 class="text-base max-sm:text-sm font-bold text-gray-800">Smart Watch
                                        Timex</h3>
                                    <p class="text-xs font-semibold text-gray-500 mt-0.5">Size: SM</p>

                                    <button type="button"
                                        class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000"></path>
                                        </svg>
                                        REMOVE
                                    </button>
                                </div>
                            </div>

                            <div class="ml-auto">
                                <h4 class="text-lg max-sm:text-base max-sm:text-sm font-bold text-gray-800">
                                    $60.00</h4>

                                <button type="button"
                                    class="mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>

                                    <span class="mx-3 font-bold">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img src='https://readymadeui.com/images/watch4.webp'
                                        class="w-full h-full object-contain" />
                                </div>

                                <div class="flex flex-col">
                                    <h3 class="text-base max-sm:text-sm font-bold text-gray-800">French
                                        Connection</h3>
                                    <p class="text-xs font-semibold text-gray-500 mt-0.5">Size: LG</p>

                                    <button type="button"
                                        class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000"></path>
                                        </svg>
                                        REMOVE
                                    </button>
                                </div>
                            </div>

                            <div class="ml-auto">
                                <h4 class="text-lg max-sm:text-base max-sm:text-sm font-bold text-gray-800">
                                    $40.00</h4>

                                <button type="button"
                                    class="mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>

                                    <span class="mx-3 font-bold">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img src='https://readymadeui.com/images/watch7.webp'
                                        class="w-full h-full object-contain" />
                                </div>

                                <div class="flex flex-col">
                                    <h3 class="text-base max-sm:text-sm font-bold text-gray-800">Smart Watch
                                    </h3>
                                    <p class="text-xs font-semibold text-gray-500 mt-0.5">Size: LG</p>

                                    <button type="button"
                                        class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000"></path>
                                        </svg>
                                        REMOVE
                                    </button>
                                </div>
                            </div>

                            <div class="ml-auto">
                                <h4 class="text-lg max-sm:text-base max-sm:text-sm font-bold text-gray-800">
                                    $60.00</h4>

                                <button type="button"
                                    class="mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>

                                    <span class="mx-3 font-bold">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img src='https://readymadeui.com/images/watch7.webp'
                                        class="w-full h-full object-contain" />
                                </div>

                                <div class="flex flex-col">
                                    <h3 class="text-base max-sm:text-sm font-bold text-gray-800">Smart Watch
                                    </h3>
                                    <p class="text-xs font-semibold text-gray-500 mt-0.5">Size: LG</p>

                                    <button type="button"
                                        class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000"></path>
                                        </svg>
                                        REMOVE
                                    </button>
                                </div>
                            </div>

                            <div class="ml-auto">
                                <h4 class="text-lg max-sm:text-base max-sm:text-sm font-bold text-gray-800">
                                    $60.00</h4>

                                <button type="button"
                                    class="mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>

                                    <span class="mx-3 font-bold">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img src='https://readymadeui.com/images/watch7.webp'
                                        class="w-full h-full object-contain" />
                                </div>

                                <div class="flex flex-col">
                                    <h3 class="text-base max-sm:text-sm font-bold text-gray-800">Smart Watch
                                    </h3>
                                    <p class="text-xs font-semibold text-gray-500 mt-0.5">Size: LG</p>

                                    <button type="button"
                                        class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000"></path>
                                        </svg>
                                        REMOVE
                                    </button>
                                </div>
                            </div>

                            <div class="ml-auto">
                                <h4 class="text-lg max-sm:text-base max-sm:text-sm font-bold text-gray-800">
                                    $60.00</h4>

                                <button type="button"
                                    class="mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>

                                    <span class="mx-3 font-bold">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img src='https://readymadeui.com/images/watch7.webp'
                                        class="w-full h-full object-contain" />
                                </div>

                                <div class="flex flex-col">
                                    <h3 class="text-base max-sm:text-sm font-bold text-gray-800">Smart Watch
                                    </h3>
                                    <p class="text-xs font-semibold text-gray-500 mt-0.5">Size: LG</p>

                                    <button type="button"
                                        class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000"></path>
                                        </svg>
                                        REMOVE
                                    </button>
                                </div>
                            </div>

                            <div class="ml-auto">
                                <h4 class="text-lg max-sm:text-base max-sm:text-sm font-bold text-gray-800">
                                    $60.00</h4>

                                <button type="button"
                                    class="mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>

                                    <span class="mx-3 font-bold">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img src='https://readymadeui.com/images/watch7.webp'
                                        class="w-full h-full object-contain" />
                                </div>

                                <div class="flex flex-col">
                                    <h3 class="text-base max-sm:text-sm font-bold text-gray-800">Smart Watch
                                    </h3>
                                    <p class="text-xs font-semibold text-gray-500 mt-0.5">Size: LG</p>

                                    <button type="button"
                                        class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000"></path>
                                        </svg>
                                        REMOVE
                                    </button>
                                </div>
                            </div>

                            <div class="ml-auto">
                                <h4 class="text-lg max-sm:text-base max-sm:text-sm font-bold text-gray-800">
                                    $60.00</h4>

                                <button type="button"
                                    class="mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>

                                    <span class="mx-3 font-bold">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="p-6 absolute bottom-0 w-full border-t bg-white rounded-b-md">
                    <ul class="text-gray-800 divide-y">
                        <li class="flex flex-wrap gap-4 text-lg font-bold">Subtotal <span
                                class="ml-auto">$125.00</span></li>
                    </ul>
                    <button type="button"
                        class="btn btn-error btn-soft mt-3 w-full">
                        Proses Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push("js")
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
