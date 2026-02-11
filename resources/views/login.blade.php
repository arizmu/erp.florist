<x-master-layout>
    @push('css')
    @endpush

    <div class="min-h-screen font-[sans-serif] bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center p-4">
        <div class="w-full max-w-6xl">
            <!-- Decorative Background Elements -->
            <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
                <div class="absolute top-20 left-20 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob"></div>
                <div class="absolute top-40 right-20 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-4000"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-center bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden">
                <!-- Left Column - Branding & Image -->
                <div class="relative hidden md:flex flex-col justify-between p-8 lg:p-12 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 rounded-r-3xl">
                    <!-- Decorative Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <defs>
                                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="currentColor" stroke-width="0.5"/>
                                </pattern>
                            </defs>
                            <rect width="100" height="100" fill="url(#grid)" />
                        </svg>
                    </div>

                    <!-- Logo Section -->
                    <div class="relative z-10">
                        <a class="flex gap-4 items-start" href="#">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/30 shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-8 text-white">
                                    <path
                                        d="M11.25 3v4.046a3 3 0 0 0-4.277 4.204H1.5v-6A2.25 2.25 0 0 1 3.75 3h7.5ZM12.75 3v4.011a3 3 0 0 1 4.239 4.239H22.5v-6A2.25 2.25 0 0 0 20.25 3h-7.5ZM22.5 12.75h-8.983a4.125 4.125 0 0 0 4.108 3.75.75.75 0 0 1 0 1.5 5.623 5.623 0 0 1-4.875-2.817V21h7.5a2.25 2.25 0 0 0 2.25-2.25v-6ZM11.25 21v-5.817A5.623 5.623 0 0 1 6.375 18a.75.75 0 0 1 0-1.5 4.126 4.126 0 0 0 4.108-3.75H1.5v6A2.25 2.25 0 0 0 3.75 21h7.5Z" />
                                    <path
                                        d="M11.085 10.354c.03.297.038.575.036.805a7.484 7.484 0 0 1-.805-.036c-.833-.084-1.677-.325-2.195-.843a1.5 1.5 0 0 1 2.122-2.12c.517.517.759 1.36.842 2.194ZM12.877 10.354c-.03.297-.038.575-.036.805.23.002.508-.006.805-.036.833-.084 1.677-.325 2.195-.843A1.5 1.5 0 0 0 13.72 8.16c-.518.518-.76 1.362-.843 2.194Z" />
                                </svg>
                            </div>

                            <div class="flex flex-col">
                                <span class="text-white/80 text-sm font-medium">
                                    Enterprise Resource Planning
                                </span>
                                <span class="text-white text-2xl font-bold">
                                    Florist Crafter
                                </span>
                            </div>
                        </a>
                    </div>

                    <!-- Welcome Text -->
                    <div class="relative z-10 space-y-6 mt-5">
                        <div>
                            <h2 class="text-4xl font-bold text-white mb-3">Welcome Back!</h2>
                            <p class="text-white/80 text-lg">Sign in to access your dashboard and manage your business efficiently.</p>
                        </div>

                    </div>

                    <!-- Footer Info -->
                    <div class="relative z-10">
                        <p class="text-white/60 text-sm">© 2026 Florist Crafter. All rights reserved.</p>
                    </div>
                </div>

                <!-- Right Column - Login Form -->
                <div class="p-8 lg:p-12">
                    <!-- Mobile Logo -->
                    <div class="md:hidden flex justify-center mb-8">
                        <a class="flex items-center gap-3" href="#">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-white">
                                    <path
                                        d="M11.25 3v4.046a3 3 0 0 0-4.277 4.204H1.5v-6A2.25 2.25 0 0 1 3.75 3h7.5ZM12.75 3v4.011a3 3 0 0 1 4.239 4.239H22.5v-6A2.25 2.25 0 0 0 20.25 3h-7.5ZM22.5 12.75h-8.983a4.125 4.125 0 0 0 4.108 3.75.75.75 0 0 1 0 1.5 5.623 5.623 0 0 1-4.875-2.817V21h7.5a2.25 2.25 0 0 0 2.25-2.25v-6ZM11.25 21v-5.817A5.623 5.623 0 0 1 6.375 18a.75.75 0 0 1 0-1.5 4.126 4.126 0 0 0 4.108-3.75H1.5v6A2.25 2.25 0 0 0 3.75 21h7.5Z" />
                                </svg>
                            </div>
                            <span class="text-xl font-bold text-gray-800 font-poppins">NGF</span>
                        </a>
                    </div>

                    <!-- Form Header -->
                    <div class="mb-8">
                        <h3 class="text-3xl font-bold text-gray-800 mb-2">Sign in</h3>
                        <p class="text-gray-500">Enter your credentials to access your account</p>
                    </div>

                    <!-- Login Form -->
                    <form class="space-y-6" method="post" action="{{ route('login.action') }}">
                        @csrf

                        <!-- Username Field -->
                        <div class="flex flex-col gap-2">
                            <label for="username" class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="icon-[tabler--user] size-4 text-blue-500"></span>
                                Username
                            </label>
                            <div class="relative">
                                <input id="username" name="username" type="text"
                                    class="w-full pl-12 pr-4 py-3.5 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 shadow-sm"
                                    placeholder="Enter your username" autocomplete="username" />
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <span class="icon-[tabler--user] size-5"></span>
                                </span>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="flex flex-col gap-2">
                            <label for="password" class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="icon-[tabler--lock] size-4 text-purple-500"></span>
                                Password
                            </label>
                            <div class="relative">
                                <input id="password" name="password" type="password"
                                    class="w-full pl-12 pr-12 py-3.5 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 transition-all duration-200 shadow-sm"
                                    placeholder="Enter your password" autocomplete="current-password" />
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <span class="icon-[tabler--lock] size-5"></span>
                                </span>
                                <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors" onclick="togglePassword()">
                                    <span class="icon-[tabler--eye] size-5" id="eye-icon"></span>
                                </button>
                            </div>
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center gap-2">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="checkbox checkbox-primary checkbox-sm border-2 border-gray-300" />
                                <label for="remember-me" class="text-gray-600 text-sm font-medium cursor-pointer select-none">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit"
                                class="w-full btn bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:from-blue-700 hover:to-purple-700 rounded-xl font-bold text-lg shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all duration-300 flex items-center justify-center gap-2 border-0">
                                <span class="icon-[tabler--login] size-5"></span>
                                Sign in
                            </button>
                        </div>

                        
                    </form>

                    <!-- Security Badge -->
                    <div class="mt-8 flex items-center justify-center gap-2 text-gray-400 text-sm">
                        <span class="icon-[tabler--shield-check] size-4"></span>
                        <span>Secured with industry-standard encryption</span>
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

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</x-master-layout>
