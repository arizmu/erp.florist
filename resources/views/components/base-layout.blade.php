<x-master-layout>
    <div class="">
        <x-base.headers />
        <div class="p-6 py-4 lg:px-24 md:px-12 min-h-screen top-6">
            {{ $slot }}
        </div>
        <x-base.footers />
    </div>
</x-master-layout>
