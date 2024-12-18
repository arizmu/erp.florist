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
                Transaksi Penjualan
            </li>
        </ol>
    </div>

    <div class="w-auto px-8 py-8 bg-white rounded-lg shadow-md mb-2 mt-2">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 align-middle">
            <div
                class="max-h-96 order-first md:order-first lg:order-last flex justify-center lg:justify-end md:justify-center">
                <img src="https://readymadeui.com/management-img.webp" alt="Image"
                    class="rounded-md object-cover w-auto h-full" />
            </div>
            <div class="flex flex-col gap-4 md:gap-6 w-full">
                <h2 class="text-3xl font-extrabold text-purple-700 mb-4 font-space">
                    Managemen Penjualan
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg gap-4">
                    <div
                        class="col-span-1 md:col-span-2 bg-blue-300 rounded-2xl p-5 shadow flex justify-between gap-8 align-middle items-center">
                        <div class="flex flex-col gap-0">
                            <span class="text-gray-50 font-semibold">Total Revenue</span>
                            <span class="font-bold text-4xl text-white">Rp. 4.300.000</span>
                        </div>
                        <div class="">
                            <div class="border-2 rounded-full bg-white p-3 border-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-10">
                                    <path fill-rule="evenodd"
                                        d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-red-300  rounded-2xl p-5 shadow flex flex-wrap gap-8 align-middle items-center justify-between lg:justify-between"">
                        <div class="flex flex-col gap-0">
                            <span class="text-gray-50 font-semibold">Total Unpaid</span>
                            <span class="font-bold text-4xl text-white">Rp. 4.300.000</span>
                        </div>
                        <div class="">
                            <div class="border-2 rounded-full bg-white p-3 border-yellow-500 text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-10">
                                    <path fill-rule="evenodd"
                                        d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-green-300 rounded-2xl p-5 shadow flex flex-wrap gap-8 align-middle items-center justify-between lg:justify-between">
                        <div class="flex flex-col gap-0">
                            <span class="text-gray-50 font-semibold">Total Paid</span>
                            <span class="font-bold text-4xl text-white">Rp. 4.300.000</span>
                        </div>
                        <div class="">
                            <div class="border-2 rounded-full bg-white p-3 border-yellow-500 text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-10">
                                    <path fill-rule="evenodd"
                                        d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-2 mt-4">
                        <div class="grid gap-2 grid-cols-1 md:grid-cols-2 lg:grid-cols-6">
                            <div class="col-span-1 md:col-span-1 lg:col-span-3">
                                <input type="text" class="input" placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                    id="flatpickr-range" />
                            </div>
                            <div class="col-span-1 md:col-span-1 lg:col-span-2">
                                <select class="select appearance-none" aria-label="select">
                                    <option disabled selected>Pilih ...</option>
                                    <option>The Godfather</option>
                                    <option>The Shawshank Redemption</option>
                                    <option>Pulp Fiction</option>
                                    <option>The Dark Knight</option>
                                    <option>Schindler's List</option>
                                </select>
                            </div>
                            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                                <button class="btn btn-primary w-full">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div>
        hllo
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
