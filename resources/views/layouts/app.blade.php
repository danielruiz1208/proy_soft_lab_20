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

<body class="font-['Outfit'] antialiased">

    <div
        class="relative min-h-screen overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950 text-white">

        <!-- EFECTOS -->
        <div class="pointer-events-none absolute inset-0 overflow-hidden">

            <div class="absolute -top-32 right-0 h-96 w-96 rounded-full bg-cyan-500/20 blur-3xl"></div>

            <div class="absolute bottom-0 left-0 h-96 w-96 rounded-full bg-emerald-500/20 blur-3xl"></div>

            <div
                class="absolute left-1/2 top-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-500/10 blur-3xl">
            </div>

        </div>

        <!-- NAVBAR -->
        <nav class="sticky top-0 z-30 border-b border-slate-700 bg-slate-900/80 backdrop-blur-xl">

            <div class="mx-auto flex max-w-5xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-500 to-emerald-500 text-sm font-bold text-white shadow-xl">

                        LS

                    </div>

                    <div>

                        <p class="text-xs font-bold uppercase tracking-[0.3em] text-slate-400">
                            Sistema
                        </p>

                        <p class="text-xl font-bold text-white">
                            {{ config('app.name', 'Laravel') }}
                        </p>

                    </div>

                </div>

                @auth
                    <div class="flex items-center gap-4">

                        <div class="hidden text-right sm:block">

                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400">
                                Usuario
                            </p>

                            <p class="text-sm font-semibold text-white">
                                {{ Auth::user()->name }}
                            </p>

                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="rounded-2xl bg-gradient-to-r from-cyan-600 to-emerald-600 px-5 py-2.5 text-sm font-bold uppercase tracking-[0.15em] text-white shadow-lg transition duration-300 hover:-translate-y-1">

                                Cerrar sesión

                            </button>

                        </form>

                    </div>
                @endauth

            </div>

        </nav>

        <!-- HEADER -->
        @isset($header)
            <header class="relative z-10 border-b border-slate-700 bg-slate-900/40 backdrop-blur-xl">

                <div class="mx-auto max-w-5xl px-4 py-6 sm:px-6 lg:px-8">

                    {{ $header }}

                </div>

            </header>
        @endisset

        <!-- CONTENT -->
        <main class="relative z-10">

            {{ $slot }}

        </main>

    </div>

</body>

</html>
