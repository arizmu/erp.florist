<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Naira Gift Florist - ERP</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}


    <link rel="stylesheet" href="{{ asset('build/assets/app-DsztXtmK.css') }}">
    <script src="{{ asset('build/assets/app-Bx3SeRlo.js') }}" defer></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body::-webkit-scrollbar {
            width: 8px;
        }

        body::-webkit-scrollbar-track {
            background: linear-gradient(to bottom, #f1f5f9, #e2e8f0);
        }

        body::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #94a3b8, #64748b);
            border-radius: 4px;
        }

        body::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #64748b, #475569);
        }

        .overflow-auto::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .overflow-auto::-webkit-scrollbar-track {
            background: transparent;
        }

        .overflow-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .overflow-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .font-space {
            font-family: "Space Grotesk", "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: '';
            font-style: normal;
        }

        .font-fugaz {
            font-family: "Fugaz One", "Outfit", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .font-lilita {
            font-family: "Lilita One", "Outfit", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .font-muse {
            font-family: "MuseoModerno", "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-weight: var(--fw, 400);
            /* font-weight: 500; */
            font-style: normal;
        }

        .font-poppins {
            font-family: 'Poppins', 'Inter', sans-serif;
        }
    </style>
    @stack('css')
</head>

<body class="dark light:bg-slate-100">
    {{ $slot }}
    @stack('js')
</body>

</html>
