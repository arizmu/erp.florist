<x-base-layout>
    <div class="breadcrumbs mt-2">
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
                Dashboard
            </li>
        </ol>
    </div>

    <div class="bg-linear-to-r from-pink-500 to-purple-500 p-8 font-sans rounded-xl mt-4">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-white mb-8 font-muse">Dashboard</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div
                        class="flex items-center justify-center bg-linear-to-r from-blue-500 to-indigo-500 rounded-full p-3 w-16 h-16">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div class="mt-4">
                        <p class="text-lg font-semibold text-gray-800">Total Transasction</p>
                        <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            metus mi consectetur felis turpis vitae ligula.</p>
                        <p class="text-gray-600 text-sm mt-2">1,200</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div
                        class="flex items-center justify-center bg-linear-to-r from-green-500 to-teal-500 rounded-full p-3 w-16 h-16">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div class="mt-4">
                        <p class="text-lg font-semibold text-gray-800">Revenue</p>
                        <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            metus mi consectetur felis turpis vitae ligula.</p>
                        <p class="text-gray-600 text-sm mt-2">$50,000</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div
                        class="flex items-center justify-center bg-linear-to-r from-yellow-500 to-orange-500 rounded-full p-3 w-16 h-16">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div class="mt-4">
                        <p class="text-lg font-semibold text-gray-800">Total Production</p>
                        <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            metus mi consectetur felis turpis vitae ligula.</p>
                        <p class="text-gray-600 text-sm mt-2">5</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-2">
        <div class="card">
            <div class="card-body">
                {!! $name !!}
                <canvas id="chart" class="w-full">
                    hello
                </canvas>
            </div>
        </div>
    </div> --}}

    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
                console.log("hello owrld");
                const data = [{
                        year: 2010,
                        count: 10
                    },
                    {
                        year: 2011,
                        count: 20
                    },
                    {
                        year: 2012,
                        count: 15
                    },
                    {
                        year: 2013,
                        count: 25
                    },
                    {
                        year: 2014,
                        count: 22
                    },
                    {
                        year: 2015,
                        count: 30
                    },
                    {
                        year: 2016,
                        count: 28
                    },
                ];

                new Chart(
                    document.getElementById('chart'), {
                        type: 'bar',
                        data: {
                            labels: data.map(row => row.year),
                            datasets: [{
                                label: 'Acquisitions by year',
                                data: data.map(row => row.count)
                            }]
                        }
                    }
                );
            });
        </script>
    @endpush

</x-base-layout>
