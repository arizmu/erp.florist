<nav class="navbar  shadow sticky top-0 left-0 right-0 z-50 lg:px-24 md:px-12 flex justify-between backdrop-blur-xl bg-gradient-to-r from-white/95 via-white/90 to-white/95 dark:from-slate-900/95 dark:via-slate-800/90 dark:to-slate-900/95 border-b border-white/20 transition-all duration-300"
    x-data="headerIndexView">
    <div class="navbar-start">
        <a class="flex gap-3 items-center group transition-all duration-300 hover:scale-105"
            href="{{ route('dasbhoard') }}">
            <template x-if="icon">
                <img :src="icon" alt=""
                    class="size-12 rounded-xl shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:rotate-6">
            </template>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-12 text-red-600 drop-shadow-lg group-hover:text-red-500 transition-all duration-300 group-hover:rotate-6 group-hover:scale-110"
                x-show="!icon">
                <path
                    d="M11.25 3v4.046a3 3 0 0 0-4.277 4.204H1.5v-6A2.25 2.25 0 0 1 3.75 3h7.5ZM12.75 3v4.011a3 3 0 0 1 4.239 4.239H22.5v-6A2.25 2.25 0 0 0 20.25 3h-7.5ZM22.5 12.75h-8.983a4.125 4.125 0 0 0 4.108 3.75.75.75 0 0 1 0 1.5 5.623 5.623 0 0 1-4.875-2.817V21h7.5a2.25 2.25 0 0 0 2.25-2.25v-6ZM11.25 21v-5.817A5.623 5.623 0 0 1 6.375 18a.75.75 0 0 1 0-1.5 4.126 4.126 0 0 0 4.108-3.75H1.5v6A2.25 2.25 0 0 0 3.75 21h7.5Z" />
                <path
                    d="M11.085 10.354c.03.297.038.575.036.805a7.484 7.484 0 0 1-.805-.036c-.833-.084-1.677-.325-2.195-.843a1.5 1.5 0 0 1 2.122-2.12c.517.517.759 1.36.842 2.194ZM12.877 10.354c-.03.297-.038.575-.036.805.23.002.508-.006.805-.036.833-.084 1.677-.325 2.195-.843A1.5 1.5 0 0 0 13.72 8.16c-.518.518-.76 1.362-.843 2.194Z" />

            </svg>

            <div class="font-bold text-xl mt-1 font-poppins flex flex-col border-l-2 border-gradient-to-b from-red-400 to-blue-600 pl-3 group-hover:border-l-4 transition-all duration-300"
                style="--fw:700">
                <span
                    class="text-xl bg-gradient-to-r from-red-500 to-red-600 bg-clip-text text-transparent group-hover:from-red-400 group-hover:to-red-500 transition-all duration-300"
                    x-text="title ?? '-'">
                    Naira Gift
                </span>
                <span
                    class="bg-gradient-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent text-sm group-hover:from-blue-500 group-hover:to-blue-600 transition-all duration-300"
                    x-text="sub_title">
                    Enterprise Resource Planning
                </span>
            </div>
        </a>
    </div>
    <div class="navbar-center max-sm:hidden font-poppins" style="--fw:500">
        <ul class="menu menu-horizontal gap-2 p-0 text-base rtl:ml-20">
            <li>
                <a href="{{ route('dasbhoard') }}"
                    class="flex gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 text-green-600 dark:text-green-400 hover:from-green-100 hover:to-emerald-100 dark:hover:from-green-800/30 dark:hover:to-emerald-800/30 transition-all duration-300 hover:shadow-lg hover:scale-105 border border-green-200/50 dark:border-green-700/50">
                    <span
                        class="icon-[cuida--dashboard-outline] transition-transform duration-300 group-hover:rotate-12"
                        style="width: 20px; height: 20px;"></span>
                    <span class="text-md font-semibold">
                        Dashboard
                    </span>
                </a>
            </li>

            <li
                class="dropdown relative inline-flex [--auto-close:inside] [--offset:9] [--placement:bottom-end] max-sm:[--placement:bottom]">
                <button id="dropdown-end" type="button"
                    class="dropdown-toggle dropdown-open:bg-gradient-to-r dropdown-open:from-orange-100 dropdown-open:to-amber-100 dark:dropdown-open:from-orange-900/30 dark:dropdown-open:to-amber-900/30 max-sm:px-2 flex gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-orange-50 to-amber-50 dark:from-orange-900/20 dark:to-amber-900/20 text-orange-600 dark:text-orange-400 hover:from-orange-100 hover:to-amber-100 dark:hover:from-orange-800/30 dark:hover:to-amber-800/30 transition-all duration-300 hover:shadow-lg hover:scale-105 border border-orange-200/50 dark:border-orange-700/50"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="open-menu-navigation-modal"
                    data-overlay="#open-menu-navigation-modal">
                    <span
                        class="icon-[mage--dashboard-chart-notification] transition-transform duration-300 hover:rotate-12"
                        style="width: 20px; height: 20px;"></span>
                    <span class="font-semibold">Navigation</span>
                </button>
            </li>
            <li>
                <a href="{{ route('kasir.index') }}"
                    class="flex gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 text-blue-600 dark:text-blue-400 hover:from-blue-100 hover:to-cyan-100 dark:hover:from-blue-800/30 dark:hover:to-cyan-800/30 transition-all duration-300 hover:shadow-lg hover:scale-105 border border-blue-200/50 dark:border-blue-700/50">
                    <span class="icon-[mdi--trolley-minus] transition-transform duration-300 group-hover:rotate-12"
                        style="width: 20px; height: 20px;"></span>
                    <span class="font-semibold">Casier</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-end items-center gap-4">
        <div class="dropdown relative inline-flex sm:hidden rtl:[--placement:bottom-end]">
            <button id="dropdown-default" type="button"
                class="dropdown-toggle btn btn-text btn-secondary btn-square hover:bg-gradient-to-r hover:from-purple-100 hover:to-pink-100 dark:hover:from-purple-900/30 dark:hover:to-pink-900/30 transition-all duration-300 hover:scale-110 hover:shadow-lg rounded-xl"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <span
                    class="icon-[tabler--menu-2] dropdown-open:hidden size-5 transition-transform duration-300"></span>
                <span
                    class="icon-[tabler--x] dropdown-open:block hidden size-5 transition-transform duration-300 rotate-90"></span>
            </button>
            <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60 font-muse backdrop-blur-xl bg-white/95 dark:bg-slate-900/95 rounded-2xl shadow-2xl border border-white/20 p-2"
                role="menu" aria-orientation="vertical" aria-labelledby="dropdown-default">
                <li><a class="dropdown-item rounded-xl hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 dark:hover:from-green-900/20 dark:hover:to-emerald-900/20 transition-all duration-300"
                        href="#">
                        <span class="icon-[cuida--dashboard-outline]" style="width: 24px; height: 24px;"></span>
                        <span>Dashboard</span>
                    </a></li>
                <li
                    class="dropdown relative [--auto-close:inside] [--offset:9] [--placement:bottom-end] max-sm:[--placement:bottom]">
                    <button id="dropdown-end-2"
                        class="dropdown-toggle dropdown-item dropdown-open:bg-gradient-to-r dropdown-open:from-orange-100 dropdown-open:to-amber-100 dark:dropdown-open:from-orange-900/30 dark:dropdown-open:to-amber-900/30 flex gap-3 hover:bg-gradient-to-r hover:from-orange-50 hover:to-amber-50 dark:hover:from-orange-900/20 dark:hover:to-amber-900/20 rounded-xl transition-all duration-300"
                        aria-haspopup="dialog" aria-expanded="false" aria-controls="open-menu-navigation-modal"
                        data-overlay="#open-menu-navigation-modal">
                        <span class="icon-[mage--dashboard-chart-notification]"
                            style="width: 24px; height: 24px;"></span>
                        Navigation
                    </button>
                </li>
                <li><a class="dropdown-item rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 dark:hover:from-blue-900/20 dark:hover:to-cyan-900/20 transition-all duration-300"
                        href="{{ route('kasir.index') }}">
                        <span class="icon-[mdi--trolley-minus]" style="width: 24px; height: 24px;"></span>
                        Casier
                    </a></li>
            </ul>
        </div>
        {{-- <a class="btn btn-success btn-outline rounded-full btn-gradient" href="#">
            <span class="px-4">
                Keluar
            </span>
        </a> --}}

        <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
            <button id="dropdown-scrollable" type="button"
                class="dropdown-toggle flex items-center group transition-all duration-300 hover:scale-110"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <div class="avatar">
                    <div
                        class="size-11 rounded-full ring-2 ring-purple-400/50 group-hover:ring-4 group-hover:ring-purple-500/70 transition-all duration-300 shadow-lg group-hover:shadow-xl">
                        <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                    </div>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60 backdrop-blur-xl bg-white/95 dark:bg-slate-900/95 rounded-2xl shadow-2xl border border-white/20 overflow-hidden"
                role="menu" aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                <li
                    class="dropdown-header gap-3 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 p-4">
                    <div class="avatar">
                        <div class="w-12 rounded-full ring-2 ring-purple-400/50 shadow-lg">
                            <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar" />
                        </div>
                    </div>
                    <div>
                        <h6 class="text-base-content/90 text-base font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent"
                            x-text="name">John Doe</h6>
                        <small class="text-base-content/60 font-medium" x-text="username">Admin</small>
                    </div>
                </li>
                <li>
                    <a class="dropdown-item hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 dark:hover:from-blue-900/20 dark:hover:to-cyan-900/20 transition-all duration-300 rounded-xl mx-2 my-1"
                        href="#">
                        <span class="icon-[tabler--user]"></span>
                        My Profile
                    </a>
                </li>
                {{-- <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--settings]"></span>
                        Settings
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--receipt-rupee]"></span>
                        Billing
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--help-triangle]"></span>
                        FAQs
                    </a>
                </li> --}}
                <li
                    class="dropdown-footer gap-2 p-3 bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20">
                    <a class="btn btn-error btn-soft btn-block hover:shadow-lg transition-all duration-300 hover:scale-105 rounded-xl font-semibold"
                        href="{{ route('logout') }}">
                        <span class="icon-[tabler--logout]"></span>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="open-menu-navigation-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
    tabindex="-1">
    <div
        class="modal-dialog overlay-open:mt-8 overlay-open:opacity-100 overlay-open:duration-300 transition-all ease-out modal-dialog-centered max-w-4xl">
        <div class="modal-content">
            <div class="modal-header border-b border-gray-100 dark:border-gray-800 px-4 py-3">
                <h3 class="font-poppins text-sm font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                    <span class="icon-[tabler--menu-2] size-4 text-blue-500"></span>
                    MENU NAVIGATION
                </h3>
            </div>
            <x-base.header-menus />
            <div class="modal-footer flex justify-center py-3 border-t border-gray-100 dark:border-gray-800">
                <span class="text-xs text-gray-400 dark:text-gray-600">all navigation menus</span>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        function headerIndexView() {
            return {
                title: '',
                sub_title: '',
                icon: '',
                indexes() {
                    axios.get('/app-json')
                        .then(response => {
                            const data = response.data.data;
                            // console.log(data);
                            this.title = data.app_name;
                            this.sub_title = data.sub_title;
                            this.icon = data.icon;
                        })
                        .catch(error => {
                            console.error(error);
                        });
                },
                name: '',
                username: '',
                me() {
                    axios.get('/me')
                        .then(response => {
                            const data = response.data.data;
                            this.name = data['name'];
                            this.username = data.username;
                        })
                        .catch(error => {
                            console.error(error);
                        });
                },
                init() {
                    this.indexes();
                    this.me();
                }
            }
        }
    </script>
@endpush
