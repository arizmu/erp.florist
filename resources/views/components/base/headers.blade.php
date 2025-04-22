<nav class="navbar rounded-sm shadow-sm sticky top-0 left-0 right-0 z-50 lg:px-24 md:px-12 flex justify-between" x-data="headerIndexView">
    <div class="navbar-start">
        <a class="flex gap-2" href="{{ route('dasbhoard') }}">
            <template x-if="icon">
                <img :src="icon" alt="" class="size-16">
            </template>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-16 text-red-600"
                x-show="!icon">
                <path
                    d="M11.25 3v4.046a3 3 0 0 0-4.277 4.204H1.5v-6A2.25 2.25 0 0 1 3.75 3h7.5ZM12.75 3v4.011a3 3 0 0 1 4.239 4.239H22.5v-6A2.25 2.25 0 0 0 20.25 3h-7.5ZM22.5 12.75h-8.983a4.125 4.125 0 0 0 4.108 3.75.75.75 0 0 1 0 1.5 5.623 5.623 0 0 1-4.875-2.817V21h7.5a2.25 2.25 0 0 0 2.25-2.25v-6ZM11.25 21v-5.817A5.623 5.623 0 0 1 6.375 18a.75.75 0 0 1 0-1.5 4.126 4.126 0 0 0 4.108-3.75H1.5v6A2.25 2.25 0 0 0 3.75 21h7.5Z" />
                <path
                    d="M11.085 10.354c.03.297.038.575.036.805a7.484 7.484 0 0 1-.805-.036c-.833-.084-1.677-.325-2.195-.843a1.5 1.5 0 0 1 2.122-2.12c.517.517.759 1.36.842 2.194ZM12.877 10.354c-.03.297-.038.575-.036.805.23.002.508-.006.805-.036.833-.084 1.677-.325 2.195-.843A1.5 1.5 0 0 0 13.72 8.16c-.518.518-.76 1.362-.843 2.194Z" />

            </svg>

            <div class="font-bold text-xl mt-1 font-poppins text-red-400 flex flex-col border-l-2 border-gray-400 pl-2"
                style="--fw:700">
                <span class="text-2xl" x-text="title ?? '-'">
                    Naira Gift
                </span>
                <span class="text-blue-600 text-poippins" x-text="sub_title">
                    Enterprise Resource Planning
                </span>
            </div>
        </a>
    </div>
    <div class="navbar-center max-sm:hidden font-poppins" style="--fw:400">
        <ul class="menu menu-horizontal gap-4 p-0 text-base rtl:ml-20">
            <li>
                <a href="{{ route('dasbhoard') }}" class="flex gap-1 flex-col text-green-600">
                    <span class="icon-[cuida--dashboard-outline]" style="width: 24px; height: 24px;"></span>
                    <span class="">
                        Dashboard
                    </span>
                </a>
            </li>

            <li
                class="dropdown relative inline-flex [--auto-close:inside] [--offset:9] [--placement:bottom-end] max-sm:[--placement:bottom]">
                <button id="dropdown-end" type="button"
                    class="dropdown-toggle dropdown-open:bg-base-content/10 dropdown-open:text-base-content max-sm:px-2 flex gap-1 flex-col text-orange-500"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="open-menu-navigation-modal"
                    data-overlay="#open-menu-navigation-modal">
                    <span class="icon-[mage--dashboard-chart-notification]" style="width: 24px; height: 24px;"></span>
                    <span class="">Navigation</span>
                </button>
            </li>
            <li>
                <a href="{{ route('kasir.index') }}" class="flex gap-1 flex-col text-blue-500">
                    <span class="icon-[mdi--trolley-minus]" style="width: 24px; height: 24px;"></span>
                    Casier
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-end items-center gap-4">
        <div class="dropdown relative inline-flex sm:hidden rtl:[--placement:bottom-end]">
            <button id="dropdown-default" type="button" class="dropdown-toggle btn btn-text btn-secondary btn-square"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <span class="icon-[tabler--menu-2] dropdown-open:hidden size-5"></span>
                <span class="icon-[tabler--x] dropdown-open:block hidden size-5"></span>
            </button>
            <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60 font-muse" role="menu"
                aria-orientation="vertical" aria-labelledby="dropdown-default">
                <li><a class="dropdown-item" href="#">
                        <span class="icon-[cuida--dashboard-outline]" style="width: 24px; height: 24px;"></span>
                        <span>Dashboard</span>
                    </a></li>
                <li
                    class="dropdown relative [--auto-close:inside] [--offset:9] [--placement:bottom-end] max-sm:[--placement:bottom]">
                    <button id="dropdown-end-2"
                        class="dropdown-toggle dropdown-item dropdown-open:bg-base-content/10 dropdown-open:text-base-content  flex gap-3 hover:bg-blue-200"
                        aria-haspopup="dialog" aria-expanded="false" aria-controls="open-menu-navigation-modal"
                        data-overlay="#open-menu-navigation-modal">
                        <span class="icon-[mage--dashboard-chart-notification]"
                            style="width: 24px; height: 24px;"></span>
                        Navigation
                    </button>
                </li>
                <li><a class="dropdown-item" href="{{ route('kasir.index') }}">
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
            <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <div class="avatar">
                    <div class="size-15 rounded-full">
                        <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                    </div>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                <li class="dropdown-header gap-2">
                    <div class="avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar" />
                        </div>
                    </div>
                    <div>
                        <h6 class="text-base-content/90 text-base font-semibold" x-text="name">John Doe</h6>
                        <small class="text-base-content/50" x-text="username">Admin</small>
                    </div>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
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
                <li class="dropdown-footer gap-2">
                    <a class="btn btn-error btn-soft btn-block" href="{{ route('logout') }}">
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
        class="modal-dialog overlay-open:mt-12 overlay-open:opacity-100 overlay-open:duration-500 transition-all ease-out modal-dialog-lg">
        <div class="modal-content">
            <div class="modal-header border-b">
                <h3 class="font-space text-lg font-semibold md:px-4">
                    Menu Navigation
                </h3>
            </div>
            <x-base.header-menus />
            <div class="modal-footer flex justify-center py-4">

                <span class="text-gray-300">all navigation menus</span>
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
