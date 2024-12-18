<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Lilita+One&family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap"
        rel="stylesheet">

    @vite(["resources/css/app.css", "resources/js/app.js"])


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
    @stack('css')
</head>

<body class="bg-slate-100">
    <div class="">
        <x-base.headers />
        <div class="p-6 py-4 lg:px-24 md:px-12 min-h-screen top-6">
            {{ $slot }}
        </div>
        <x-base.footers />
    </div>
    @stack('js')
</body>

</html>
