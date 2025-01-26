<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page | hello world</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Lilita+One&family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap"
        rel="stylesheet">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-BainYrTj.css') }}">
    <script src="{{ asset('build/assets/app-BjL84nCd.js') }}"></script>

    <style>
        body::-webkit-scrollbar {
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
</head>

<body>
    <div class="font-[sans-serif] bg-white flex items-center justify-center md:h-screen p-4">
        <div class="shadow-[0_2px_16px_-3px_rgba(6,81,237,0.3)] max-w-6xl max-md:max-w-lg rounded-md p-6">
            {{-- <a href="javascript:void(0)"><img
            src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-40 md:mb-4 mb-12' />
          </a> --}}
            <a class="flex gap-2" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-16 text-red-600">
                    <path
                        d="M11.25 3v4.046a3 3 0 0 0-4.277 4.204H1.5v-6A2.25 2.25 0 0 1 3.75 3h7.5ZM12.75 3v4.011a3 3 0 0 1 4.239 4.239H22.5v-6A2.25 2.25 0 0 0 20.25 3h-7.5ZM22.5 12.75h-8.983a4.125 4.125 0 0 0 4.108 3.75.75.75 0 0 1 0 1.5 5.623 5.623 0 0 1-4.875-2.817V21h7.5a2.25 2.25 0 0 0 2.25-2.25v-6ZM11.25 21v-5.817A5.623 5.623 0 0 1 6.375 18a.75.75 0 0 1 0-1.5 4.126 4.126 0 0 0 4.108-3.75H1.5v6A2.25 2.25 0 0 0 3.75 21h7.5Z" />
                    <path
                        d="M11.085 10.354c.03.297.038.575.036.805a7.484 7.484 0 0 1-.805-.036c-.833-.084-1.677-.325-2.195-.843a1.5 1.5 0 0 1 2.122-2.12c.517.517.759 1.36.842 2.194ZM12.877 10.354c-.03.297-.038.575-.036.805.23.002.508-.006.805-.036.833-.084 1.677-.325 2.195-.843A1.5 1.5 0 0 0 13.72 8.16c-.518.518-.76 1.362-.843 2.194Z" />

                    {{-- <path
                    d="M10.5 1.875a1.125 1.125 0 0 1 2.25 0v8.219c.517.162 1.02.382 1.5.659V3.375a1.125 1.125 0 0 1 2.25 0v10.937a4.505 4.505 0 0 0-3.25 2.373 8.963 8.963 0 0 1 4-.935A.75.75 0 0 0 18 15v-2.266a3.368 3.368 0 0 1 .988-2.37 1.125 1.125 0 0 1 1.591 1.59 1.118 1.118 0 0 0-.329.79v3.006h-.005a6 6 0 0 1-1.752 4.007l-1.736 1.736a6 6 0 0 1-4.242 1.757H10.5a7.5 7.5 0 0 1-7.5-7.5V6.375a1.125 1.125 0 0 1 2.25 0v5.519c.46-.452.965-.832 1.5-1.141V3.375a1.125 1.125 0 0 1 2.25 0v6.526c.495-.1.997-.151 1.5-.151V1.875Z" /> --}}

                </svg>

                <div class="font-bold text-xl mt-1 text-red-400 font-muse flex flex-col border-l-2 border-gray-400 pl-2"
                    style="--fw:700">
                    <span class="text-blue-600 text-base">
                        Enterprise Resource Planning
                    </span>
                    <span class="text-2xl">
                        Naira Gift Florist
                    </span>
                </div>
            </a>

            <div class="grid md:grid-cols-2 items-center gap-8">
                <div class="max-md:order-1 lg:min-w-[450px]">
                    <img src="https://readymadeui.com/signin-image.webp" class="lg:w-11/12 w-full object-cover"
                        alt="login-image" />
                </div>

                <form class="md:max-w-md w-full mx-auto" method="post" action="{{ route('login.action') }}">
                    @csrf
                    <div class="">
                        <div class="mb-12">
                            <h3 class="text-4xl font-extrabold text-blue-600 font-muse" style="--fw:700">Sign in</h3>
                        </div>

                        <div>
                            <div class="relative flex items-center">
                                <input name="username" type="text"
                                    class="w-full text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                    placeholder="Username" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-2" viewBox="0 0 682.667 682.667">
                                    <defs>
                                        <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                            <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                        <path fill="none" stroke-miterlimit="10" stroke-width="40"
                                            d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                            data-original="#000000"></path>
                                        <path
                                            d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                            data-original="#000000"></path>
                                    </g>
                                </svg>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="relative flex items-center">
                                <input name="password" type="password"
                                    class="w-full text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                    placeholder="Enter password" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-2 cursor-pointer" viewBox="0 0 128 128">
                                    <path
                                        d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-4 mt-6">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                <label for="remember-me" class="text-gray-800 ml-3 block text-sm">
                                    Remember me
                                </label>
                            </div>
                            <div>
                                <a href="jajvascript:void(0);" class="text-blue-600 font-semibold text-sm hover:underline">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>

                        <div class="mt-12">
                            <button type="submit"
                                class="w-full btn btn-outline btn-gradient btn-primary shadow font-muse" style="--fw:500">
                                Sign in
                            </button>

                            <p class="text-gray-800 text-sm text-center mt-6">Don't have an account <a
                                    href="javascript:void(0);"
                                    class="text-gray-600 font-semibold hover:underline ml-1 whitespace-nowrap">Register
                                    here</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
