<x-base-layout>
    <div class="grid md:grid-cols-5 lg:grid-cols-8 gap-5">
        <div class="md:col-span-3 lg:col-span-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2.5">Category Product</h5>
                    <div class="grid grid-cols-1 lg:grid-cols-9 gap-5 py-4">
                        <div class="md:col-span-2 lg:col-span-3 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="flex flex-col gap-4">
                                        <div class="relative w-auto">
                                            <input type="text" placeholder="John Doe"
                                                class="input input-floating peer" id="floatingInput" />
                                            <label class="input-floating-label" for="floatingInput">Category</label>
                                        </div>
                                        <div class="relative w-auto">
                                            <textarea class="textarea textarea-floating peer" placeholder="Hello!!!" id="textareaFloating"></textarea>
                                            <label class="textarea-floating-label" for="textareaFloating">
                                                Comment
                                            </label>
                                        </div>
                                        <div class="flex justify-between">

                                            <button class="btn btn-outline btn-warning">Reset Form</button>
                                            <button class="btn btn-outline btn-primary">Simpan Baru</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="lg:col-span-6">
                            <div class="w-full overflow-x-auto border rounded-lg">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Comment</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">John Doe</td>
                                            <td>johndoe@example.com</td>
                                            <td><span class="badge badge-soft badge-success text-xs">Professional</span>
                                            </td>
                                            <td class="text-nowrap">March 1, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">Jane Smith</td>
                                            <td>janesmith@example.com</td>
                                            <td><span class="badge badge-soft badge-error text-xs">Rejected</span></td>
                                            <td class="text-nowrap">March 2, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">Alice Johnson</td>
                                            <td>alicejohnson@example.com</td>
                                            <td><span class="badge badge-soft badge-info text-xs">Applied</span></td>
                                            <td class="text-nowrap">March 3, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">Bob Brown</td>
                                            <td>bobrown@example.com</td>
                                            <td><span class="badge badge-soft badge-primary text-xs">Current</span></td>
                                            <td class="text-nowrap">March 4, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">John Doe</td>
                                            <td>johndoe@example.com</td>
                                            <td><span class="badge badge-soft badge-success text-xs">Professional</span>
                                            </td>
                                            <td class="text-nowrap">March 1, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">Jane Smith</td>
                                            <td>janesmith@example.com</td>
                                            <td><span class="badge badge-soft badge-error text-xs">Rejected</span></td>
                                            <td class="text-nowrap">March 2, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">Alice Johnson</td>
                                            <td>alicejohnson@example.com</td>
                                            <td><span class="badge badge-soft badge-info text-xs">Applied</span></td>
                                            <td class="text-nowrap">March 3, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">Bob Brown</td>
                                            <td>bobrown@example.com</td>
                                            <td><span class="badge badge-soft badge-primary text-xs">Current</span>
                                            </td>
                                            <td class="text-nowrap">March 4, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">John Doe</td>
                                            <td>johndoe@example.com</td>
                                            <td><span
                                                    class="badge badge-soft badge-success text-xs">Professional</span>
                                            </td>
                                            <td class="text-nowrap">March 1, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">Jane Smith</td>
                                            <td>janesmith@example.com</td>
                                            <td><span class="badge badge-soft badge-error text-xs">Rejected</span></td>
                                            <td class="text-nowrap">March 2, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">Alice Johnson</td>
                                            <td>alicejohnson@example.com</td>
                                            <td><span class="badge badge-soft badge-info text-xs">Applied</span></td>
                                            <td class="text-nowrap">March 3, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap">Bob Brown</td>
                                            <td>bobrown@example.com</td>
                                            <td><span class="badge badge-soft badge-primary text-xs">Current</span>
                                            </td>
                                            <td class="text-nowrap">March 4, 2024</td>
                                            <td>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--pencil] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
                                                <button class="btn btn-circle btn-text btn-sm"
                                                    aria-label="Action button"><span
                                                        class="icon-[tabler--dots-vertical] size-5"></span></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-2 lg:col-span-2 order-first md:order-last">
            <x-panel.panel-product />
        </div>
    </div>
</x-base-layout>
