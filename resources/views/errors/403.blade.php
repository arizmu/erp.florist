<x-base-layout>
    <div
        class="flex items-center justify-center min-h-96 bg-gradient-to-br from-red-50 to-orange-100 rounded-md shadow-sm">
        <div class="text-center font-poppins">
            <h1 class="text-9xl font-bold text-gray-800">403</h1>
            <h2 class="text-2xl md:text-4xl font-semibold text-gray-700 mt-4">Access Denied</h2>
            <p class="text-gray-500 mt-4 text-md">
                Anda tidak memiliki akses untuk mengakses halaman ini. <br> Silahkan hubungi admin untuk informasi
                lebih lanjut.
            </p>

            <div class="mt-8">
                <a href="{{ url('/dashboard') }}" class="btn btn-primary gap-2 shadow-lg shadow-blue-500/30">
                    <span class="icon-[tabler--home] size-5"></span>
                    Go to Home
                </a>
            </div>
        </div>
    </div>
</x-base-layout>
