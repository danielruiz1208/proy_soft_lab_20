<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=outfit:300,400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-['Outfit'] antialiased text-white">

    <div class="relative min-h-screen overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950">

        <!-- EFECTOS -->
        <div class="pointer-events-none absolute inset-0 overflow-hidden">

            <div class="absolute -top-32 left-0 h-96 w-96 rounded-full bg-cyan-500/20 blur-3xl"></div>

            <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-emerald-500/20 blur-3xl"></div>

        </div>

        <!-- CONTENIDO -->
        <div class="relative flex min-h-screen items-center justify-center px-4 py-10">

            <div class="w-full max-w-lg">

                <!-- LOGO -->
                <div class="mb-8 text-center">

                    <div
                        class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-gradient-to-br from-cyan-500 to-emerald-500 shadow-2xl">

                        <x-application-logo class="h-10 w-10 fill-current text-white" />

                    </div>

                    <h1 class="mt-6 text-4xl font-extrabold text-white">
                        {{ config('app.name', 'Laravel') }}
                    </h1>

                    <p class="mt-3 text-sm text-slate-300">
                        Plataforma de administración
                    </p>

                </div>

                <!-- CARD -->
                <div class="rounded-3xl border border-slate-700 bg-slate-900/70 p-8 shadow-2xl backdrop-blur-xl">

                    {{ $slot }}

                </div>

            </div>

        </div>

    </div>

</body>

</html>
