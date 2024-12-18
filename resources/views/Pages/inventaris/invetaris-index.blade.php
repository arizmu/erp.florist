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
                Produksi
            </li>
        </ol>
    </div>

    <div class="w-auto px-6 py-8 bg-white rounded-lg shadow-md mb-2 mt-2">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 align-middle">
            <div class="max-h-80">
                <img src="https://readymadeui.com/management-img.webp" alt="Image"
                    class="rounded-md object-cover w-full h-full" />
            </div>
            <div class="flex flex-col gap-4 md:gap-6 md:mt-8">
                <h2 class="text-3xl font-extrabold text-purple-700 mb-4 font-space">
                    Managemen Inventaris
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-blue-100 rounded p-5 shadow flex justify-start gap-8 align-middle items-center">
                        <div class="">
                            <div class="border-2 rounded-full bg-white p-2 border-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-15 text-red-500">
                                    <path fill-rule="evenodd"
                                        d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <span style="font-size: 32pt" class="font-semibold">45</span>
                            <span class="text-gray-500 font-semibold">hello world</span>
                        </div>
                    </div>
                    <div class="bg-blue-100 rounded p-5 shadow flex justify-start gap-8 align-middle items-center">
                        <div class="">
                            <div class="border-2 rounded-full bg-white p-2 border-yellow-500 text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-15">
                                    <path fill-rule="evenodd" d="M1.72 5.47a.75.75 0 0 1 1.06 0L9 11.69l3.756-3.756a.75.75 0 0 1 .985-.066 12.698 12.698 0 0 1 4.575 6.832l.308 1.149 2.277-3.943a.75.75 0 1 1 1.299.75l-3.182 5.51a.75.75 0 0 1-1.025.275l-5.511-3.181a.75.75 0 0 1 .75-1.3l3.943 2.277-.308-1.149a11.194 11.194 0 0 0-3.528-5.617l-3.809 3.81a.75.75 0 0 1-1.06 0L1.72 6.53a.75.75 0 0 1 0-1.061Z" clip-rule="evenodd" />
                                  </svg>

                            </div>
                        </div>
                        <div class="flex flex-col">
                            <span style="font-size: 32pt" class="font-semibold">45</span>
                            <span class="text-gray-500 font-semibold">hello world</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-9 py-3 gap-5">
        <div class="md:col-span-4 lg:col-span-6">
            <div class="card">
                <div class="card-body">
                    <div class="w-full overflow-x-auto bg-white border rounded-lg">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap">John Doe</td>
                                    <td>johndoe@example.com</td>
                                    <td><span class="badge badge-soft badge-success text-xs">Professional</span></td>
                                    <td class="text-nowrap">March 1, 2024</td>
                                    <td>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--pencil] size-5"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--trash] size-5"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--dots-vertical] size-5"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap">Jane Smith</td>
                                    <td>janesmith@example.com</td>
                                    <td><span class="badge badge-soft badge-error text-xs">Rejected</span></td>
                                    <td class="text-nowrap">March 2, 2024</td>
                                    <td>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--pencil] size-5"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--trash] size-5"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--dots-vertical] size-5"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap">Alice Johnson</td>
                                    <td>alicejohnson@example.com</td>
                                    <td><span class="badge badge-soft badge-info text-xs">Applied</span></td>
                                    <td class="text-nowrap">March 3, 2024</td>
                                    <td>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--pencil] size-5"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--trash] size-5"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--dots-vertical] size-5"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap">Bob Brown</td>
                                    <td>bobrown@example.com</td>
                                    <td><span class="badge badge-soft badge-primary text-xs">Current</span></td>
                                    <td class="text-nowrap">March 4, 2024</td>
                                    <td>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--pencil] size-5"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--trash] size-5"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                class="icon-[tabler--dots-vertical] size-5"></span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-2 lg:col-span-3 order-first md:order-last">
            <div class="card card-compact">
                <div class="card-header">
                    <h5 class="card-title px-4 font-space">Manajemen Inventory</h5>
                </div>
                <hr>
                <div class="card-body">
                    <div class="p-4 pt-3 flex flex-col gap-5">
                        <div class="relative w-auto">
                            <input type="text" class="input max-w-auto" placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                id="flatpickr-range" />
                        </div>
                        <div class="relative w-auto">
                            <select class="select select-floating" aria-label="Select floating label"
                                id="selectFloating">
                                <option>Pilih ...</option>
                            </select>
                            <label class="select-floating-label" for="selectFloating">
                                Barang
                            </label>
                        </div>
                        <div class="relative w-auto">
                            <select class="select select-floating" aria-label="Select floating label"
                                id="selectFloating">
                                <option>Pilih ...</option>
                                <option>Invoetory Masuk</option>
                                <option>Invetory Keluar</option>
                            </select>
                            <label class="select-floating-label" for="selectFloating">
                                Status
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
                <div class="card-footer text-center">
                    <div class="grid grid-cols-2 gap-4 p-4">
                        <button class="btn btn-outline btn-primary w-auto">Filter</button>
                        <button class="btn btn-outline btn-error w-auto">Produksi Baru</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push("js")
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
                console.log("DOM fully loaded and parsed");
                console.log(flatpickr);
                flatpickr('#flatpickr-range', {
                    mode: 'range'
                })
            });
        </script>
    @endpush
</x-base-layout>
