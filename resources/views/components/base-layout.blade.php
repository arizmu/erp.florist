<x-master-layout>
    @push('css')
        <style>
            body::-webkit-scrollbar {
                display: none;
            }

            .overflow-auto::-webkit-scrollbar {
                display: none;
            }

            .font-space {
                font-family: "Space Grotesk", sans-serif;
                font-optical-sizing: auto;
                font-weight: '';
                font-style: normal;
            }

            .font-fugaz {
                font-family: "Fugaz One", sans-serif;
                font-weight: 400;
                font-style: normal;
            }

            .font-lilita {
                font-family: "Lilita One", sans-serif;
                font-weight: 400;
                font-style: normal;
            }

            .font-muse {
                font-family: "MuseoModerno", sans-serif;
                font-optical-sizing: auto;
                font-weight: var(--fw, 400);
                /* font-weight: 500; */
                font-style: normal;
            }
        </style>
    @endpush
    <div class="">
        <x-base.headers />
        <div class="p-6 py-4 lg:px-24 md:px-12 min-h-screen top-6">
            {{ $slot }}
        </div>
        <x-base.footers />
    </div>
</x-master-layout>
