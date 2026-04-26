<x-master-layout>
    @push('css')
        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) rotate(0deg);
                }

                50% {
                    transform: translateY(-12px) rotate(3deg);
                }
            }

            @keyframes floatDelay {

                0%,
                100% {
                    transform: translateY(0px) rotate(0deg);
                }

                50% {
                    transform: translateY(-8px) rotate(-2deg);
                }
            }

            @keyframes softPulse {

                0%,
                100% {
                    opacity: 0.4;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.7;
                    transform: scale(1.05);
                }
            }

            .float-1 {
                animation: float 6s ease-in-out infinite;
            }

            .float-2 {
                animation: floatDelay 8s ease-in-out infinite;
            }

            .float-3 {
                animation: float 10s ease-in-out infinite;
                animation-delay: 2s;
            }

            .soft-pulse {
                animation: softPulse 4s ease-in-out infinite;
            }
        </style>
    @endpush

    <div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden"
        style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 40%, #f0fdf4 100%);">

        <!-- Background blobs -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
            <div class="absolute top-10 left-10 w-80 h-80 bg-blue-300/20 rounded-full blur-3xl soft-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-300/20 rounded-full blur-3xl soft-pulse"
                style="animation-delay:2s"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-emerald-200/20 rounded-full blur-3xl soft-pulse"
                style="animation-delay:4s"></div>
        </div>

        <div class="w-full max-w-5xl">
            <div
                class="grid md:grid-cols-5 bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-blue-100/50">

                <!-- ===== LEFT PANEL — Branding ===== -->
                <div class="md:col-span-2 relative hidden md:flex flex-col justify-between p-9 overflow-hidden"
                    style="background: linear-gradient(160deg, #1d4ed8 0%, #1e40af 50%, #064e3b 100%);">

                    <!-- Decorative organic circles -->
                    <div class="absolute -top-16 -left-16 w-64 h-64 bg-white/5 rounded-full"></div>
                    <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-black/10 rounded-full"></div>
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-white/5 rounded-full blur-2xl">
                    </div>

                    <!-- Floating flower SVG decorations -->
                    <div class="absolute top-16 right-8 float-1 opacity-25">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <circle cx="30" cy="14" r="10" fill="white" />
                            <circle cx="46" cy="22" r="10" fill="white" />
                            <circle cx="46" cy="38" r="10" fill="white" />
                            <circle cx="30" cy="46" r="10" fill="white" />
                            <circle cx="14" cy="38" r="10" fill="white" />
                            <circle cx="14" cy="22" r="10" fill="white" />
                            <circle cx="30" cy="30" r="12" fill="white" />
                        </svg>
                    </div>
                    <div class="absolute bottom-28 left-6 float-2 opacity-20">
                        <svg width="44" height="44" viewBox="0 0 60 60" fill="none">
                            <circle cx="30" cy="14" r="10" fill="white" />
                            <circle cx="46" cy="22" r="10" fill="white" />
                            <circle cx="46" cy="38" r="10" fill="white" />
                            <circle cx="30" cy="46" r="10" fill="white" />
                            <circle cx="14" cy="38" r="10" fill="white" />
                            <circle cx="14" cy="22" r="10" fill="white" />
                            <circle cx="30" cy="30" r="12" fill="white" />
                        </svg>
                    </div>
                    <div class="absolute top-1/2 right-4 float-3 opacity-15">
                        <svg width="32" height="32" viewBox="0 0 60 60" fill="none">
                            <circle cx="30" cy="14" r="10" fill="white" />
                            <circle cx="46" cy="22" r="10" fill="white" />
                            <circle cx="46" cy="38" r="10" fill="white" />
                            <circle cx="30" cy="46" r="10" fill="white" />
                            <circle cx="14" cy="38" r="10" fill="white" />
                            <circle cx="14" cy="22" r="10" fill="white" />
                            <circle cx="30" cy="30" r="12" fill="white" />
                        </svg>
                    </div>

                    <!-- Top: Logo -->
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-2">
                            <div
                                class="w-10 h-10 bg-white/15 border border-white/25 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <svg width="20" height="20" viewBox="0 0 60 60" fill="none">
                                    <circle cx="30" cy="14" r="10" fill="white" />
                                    <circle cx="46" cy="22" r="10" fill="white" />
                                    <circle cx="46" cy="38" r="10" fill="white" />
                                    <circle cx="30" cy="46" r="10" fill="white" />
                                    <circle cx="14" cy="38" r="10" fill="white" />
                                    <circle cx="14" cy="22" r="10" fill="white" />
                                    <circle cx="30" cy="30" r="11" fill="white" />
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-white text-xs font-medium opacity-70 leading-none tracking-widest uppercase">
                                    Management System</p>
                                <p class="text-white text-lg font-bold leading-tight">Naira Gift Florist</p>
                            </div>
                        </div>
                    </div>

                    <!-- Middle: Tagline -->
                    <div class="relative z-10 space-y-4">
                        <div class="w-10 h-0.5 bg-white/40 rounded-full"></div>
                        <h2 class="text-3xl font-bold text-white leading-snug">
                            Bunga untuk<br>setiap momen<br>
                            <span class="text-blue-200">istimewa</span>
                        </h2>
                        <p class="text-white/60 text-sm leading-relaxed">
                            Kelola penjualan buket, karangan bunga,<br>dan semua gift dengan mudah.
                        </p>

                        <!-- Feature list -->
                        <div class="flex flex-col gap-2 pt-2">
                            <div class="flex items-center gap-2 text-white/80 text-xs">
                                <span class="w-1.5 h-1.5 bg-blue-300 rounded-full shrink-0"></span>
                                Kasir & Transaksi Harian
                            </div>
                            <div class="flex items-center gap-2 text-white/80 text-xs">
                                <span class="w-1.5 h-1.5 bg-indigo-300 rounded-full shrink-0"></span>
                                Manajemen Produksi & Stok
                            </div>
                            <div class="flex items-center gap-2 text-white/80 text-xs">
                                <span class="w-1.5 h-1.5 bg-emerald-300 rounded-full shrink-0"></span>
                                Laporan & Pre-Order
                            </div>
                        </div>
                    </div>

                    <!-- Bottom -->
                    <div class="relative z-10">
                        <p class="text-white/40 text-xs">© 2026 Naira Gift Florist · Private System</p>
                    </div>
                </div>

                <!-- ===== RIGHT PANEL — Form ===== -->
                <div class="md:col-span-3 p-8 lg:p-12 flex flex-col justify-center">

                    <!-- Mobile logo -->
                    <div class="md:hidden flex items-center gap-2.5 mb-8">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center"
                            style="background:linear-gradient(135deg,#1d4ed8,#064e3b)">
                            <svg width="18" height="18" viewBox="0 0 60 60" fill="none">
                                <circle cx="30" cy="14" r="10" fill="white" />
                                <circle cx="46" cy="22" r="10" fill="white" />
                                <circle cx="30" cy="30" r="11" fill="white" />
                            </svg>
                        </div>
                        <span class="text-gray-800 font-bold text-lg font-poppins">Naira Gift Florist</span>
                    </div>

                    <!-- Form header -->
                    <div class="mb-8">
                        <p class="text-xs font-semibold text-blue-500 tracking-widest uppercase mb-1">Selamat Datang
                        </p>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">Masuk ke Sistem</h3>
                        <p class="text-gray-400 text-sm">Gunakan akun yang telah diberikan untuk mengakses sistem</p>
                    </div>

                    @if ($errors->any())
                        <div
                            class="mb-5 flex items-start gap-3 bg-blue-50 border border-blue-200 text-blue-700 rounded-xl px-4 py-3 text-sm">
                            <span class="icon-[tabler--alert-circle] size-4 mt-0.5 shrink-0"></span>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <!-- Login form -->
                    <form class="space-y-5" method="post" action="{{ route('login.action') }}">
                        @csrf

                        <!-- Username -->
                        <div>
                            <label for="username" class="block text-sm font-semibold text-gray-600 mb-1.5">
                                Username
                            </label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-1/2 -translate-y-1/2">
                                    <span class="icon-[tabler--user] size-4 text-gray-300"></span>
                                </span>
                                <input id="username" name="username" type="text"
                                    class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 text-sm placeholder-gray-300 focus:outline-none focus:bg-white focus:border-blue-400 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200"
                                    placeholder="Masukkan username Anda" autocomplete="username"
                                    value="{{ old('username') }}" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-600 mb-1.5">
                                Password
                            </label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-1/2 -translate-y-1/2">
                                    <span class="icon-[tabler--lock] size-4 text-gray-300"></span>
                                </span>
                                <input id="password" name="password" type="password"
                                    class="w-full pl-10 pr-11 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 text-sm placeholder-gray-300 focus:outline-none focus:bg-white focus:border-blue-400 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200"
                                    placeholder="Masukkan password Anda" autocomplete="current-password" />
                                <button type="button"
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-300 hover:text-gray-500 transition-colors"
                                    onclick="togglePassword()">
                                    <span class="icon-[tabler--eye] size-4" id="eye-icon"></span>
                                </button>
                            </div>
                        </div>

                        <!-- Remember me -->
                        <div class="flex items-center gap-2">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="checkbox checkbox-sm border-gray-200" />
                            <label for="remember-me" class="text-sm text-gray-500 cursor-pointer select-none">
                                Ingat saya di perangkat ini
                            </label>
                        </div>

                        <!-- Submit -->
                        <div class="pt-1">
                            <button type="submit"
                                class="w-full py-3 rounded-xl text-white font-semibold text-sm shadow-lg transition-all duration-300 flex items-center justify-center gap-2 hover:opacity-90 hover:shadow-xl active:scale-[0.99]"
                                style="background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 60%, #065f46 100%);">
                                <span class="icon-[tabler--login-2] size-4"></span>
                                Masuk ke Sistem
                            </button>
                        </div>
                    </form>

                    <!-- Security note -->
                    <div
                        class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-center gap-2 text-gray-300 text-xs">
                        <span class="icon-[tabler--shield-lock] size-3.5"></span>
                        <span>Sistem internal — akses terbatas untuk pengguna terdaftar</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('icon-[tabler--eye]');
                eyeIcon.classList.add('icon-[tabler--eye-off]');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('icon-[tabler--eye-off]');
                eyeIcon.classList.add('icon-[tabler--eye]');
            }
        }
    </script>
</x-master-layout>
