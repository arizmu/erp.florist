<footer class="border-t border-gray-100 bg-white/80 backdrop-blur-sm">
    <div class="p-6 py-4 lg:px-24 md:px-12 top-6">

        <!-- Main Row -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">

            <!-- Brand -->
            <div class="flex items-center gap-2.5">
                {{-- <div
                    class="w-7 h-7 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-lg flex items-center justify-center shadow-sm shrink-0">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.6745 16.9224L12.6233 10.378C12.2167 9.85117 11.4185 9.8611 11.0251 10.3979L6.45728 16.631C6.26893 16.888 5.96935 17.0398 5.65069 17.0398H3.79114C2.9635 17.0398 2.49412 16.0919 2.99583 15.4336L11.0224 4.90319C11.4206 4.38084 12.2056 4.37762 12.608 4.89668L20.9829 15.6987C21.4923 16.3558 21.024 17.3114 20.1926 17.3114H18.4661C18.1562 17.3114 17.8638 17.1677 17.6745 16.9224ZM12.5866 15.5924L14.8956 18.3593C15.439 19.0105 14.976 20 14.1278 20H9.74075C8.9164 20 8.4461 19.0586 8.94116 18.3994L11.0192 15.6325C11.4065 15.1169 12.1734 15.0972 12.5866 15.5924Z"
                            fill="white" />
                    </svg>
                </div> --}}
                <div>
                    <p class="text-xl font-bold text-gray-700 leading-none font-poppins">Naira Gift Florist</p>
                    <p class="text-[10px] text-gray-400 mt-0.5 leading-none">Internal Management System</p>
                </div>
            </div>

            <!-- Center: Status + Time -->
            <div class="flex items-center gap-3">
                <!-- System status -->
                <div
                    class="flex items-center gap-1.5 bg-emerald-50 text-emerald-700 text-[11px] font-medium px-2.5 py-1 rounded-full border border-emerald-100">
                    <span class="relative flex size-1.5">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full size-1.5 bg-emerald-500"></span>
                    </span>
                    Sistem Online
                </div>
                <!-- Divider -->
                <span class="text-gray-200 text-xs hidden sm:inline">|</span>
                <!-- Live time -->
                <div class="flex items-center gap-1 text-[11px] text-gray-400">
                    <span class="icon-[tabler--clock] size-3.5 text-gray-300"></span>
                    <span id="footer-clock">--:--:--</span>
                </div>
            </div>

            <!-- Right: Dev contact -->
            <div class="flex items-center gap-1.5 text-[11px] text-gray-400">
                <span class="icon-[tabler--device-mobile] size-3.5 text-gray-300"></span>
                <span>Dev: <span class="font-medium text-gray-500">0851 5631 2320</span></span>
                <span class="mx-1 text-gray-200">•</span>
                <span>© 2026 Arissman</span>
            </div>

        </div>
    </div>
</footer>

<script>
    (function() {
        function updateClock() {
            const el = document.getElementById('footer-clock');
            if (!el) return;
            const now = new Date();
            const hh = String(now.getHours()).padStart(2, '0');
            const mm = String(now.getMinutes()).padStart(2, '0');
            const ss = String(now.getSeconds()).padStart(2, '0');
            el.textContent = `${hh}:${mm}:${ss}`;
        }
        updateClock();
        setInterval(updateClock, 1000);
    })();
</script>
