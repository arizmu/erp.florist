<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Naira Gift Florist - ERP</title>
    </title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Lilita+One&family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap"
        rel="stylesheet">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-D3DZGydM.css') }}">
    <script src="{{ asset('build/assets/app-BjL84nCd.js') }}" defer></script>
    @stack('css')
</head>

<body class="dark light:bg-slate-100">

    {{ $slot }}

    @stack('js')
</body>

</html>
