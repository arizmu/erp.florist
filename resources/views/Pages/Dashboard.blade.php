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

    <div class="grid md:grid-cols-3 gap-6 min-h-[164px] mt-2 mb-2 py-8 p-16 bg-gradient-to-r from-blue-700 to-blue-400 font-sans overflow-hidden rounded">
        <div class="md:col-span-2">
          <h1 class="text-3xl font-bold text-white">Welcome to ReadymadeUI!</h1>
          <p class="text-base text-gray-200 mt-4">Best tailwind css readymade UI plateform</p>

          <button type="button"
            class="py-3 px-6 text-sm font-semibold bg-white text-blue-600 hover:bg-slate-100 rounded-md mt-8">Get
            Started</button>
        </div>

        <div class="relative max-md:hidden">
          <img src="https://readymadeui.com/signin-image.webp" alt="Banner Image"
            class="w-full right-4 top-[-13px] md:absolute skew-x-[-16deg] rotate-0 object-cover" />
        </div>
      </div>

    <div class="py-2">
        <div class="card">
            <div class="card-body">
                {{-- {!! $name !!} --}}

            </div>
        </div>
    </div>

    </x-base-layout>
