<x-app-layout>

    <x-slot name="header">

        <div class="rounded-3xl border border-slate-700 bg-slate-900/70 p-8 shadow-2xl backdrop-blur-xl">

            <p class="text-xs font-bold uppercase tracking-[0.35em] text-cyan-400">
                Usuario
            </p>

            <h2 class="mt-3 text-4xl font-extrabold text-white">
                Perfil de Usuario
            </h2>

            <p class="mt-3 text-slate-300">
                Revisa y administra tu información personal.
            </p>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-5xl px-4">

            <div class="grid gap-6 lg:grid-cols-3">

                <!-- INFO -->
                <div
                    class="lg:col-span-2 rounded-3xl border border-slate-700 bg-slate-900/70 p-8 shadow-2xl backdrop-blur-xl">

                    <h3 class="text-sm font-bold uppercase tracking-[0.3em] text-cyan-400">
                        Datos personales
                    </h3>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">

                        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-5">

                            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">
                                Nombre
                            </p>

                            <p class="mt-3 text-lg font-bold text-white">
                                {{ $user->name }}
                            </p>

                        </div>

                        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-5">

                            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">
                                Usuario
                            </p>

                            <p class="mt-3 text-lg font-bold text-white">
                                {{ $user->user }}
                            </p>

                        </div>

                        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-5">

                            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">
                                Email
                            </p>

                            <p class="mt-3 text-lg font-bold text-white">
                                {{ $user->email }}
                            </p>

                        </div>

                        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-5">

                            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">
                                Rol
                            </p>

                            <p class="mt-3 text-lg font-bold text-cyan-400">
                                {{ ucfirst($user->rol) }}
                            </p>

                        </div>

                    </div>

                </div>

                <!-- PANEL -->
                <div class="rounded-3xl border border-slate-700 bg-slate-900/70 p-8 shadow-2xl backdrop-blur-xl">

                    <h3 class="text-sm font-bold uppercase tracking-[0.3em] text-emerald-400">
                        Seguridad
                    </h3>

                    <p class="mt-4 text-slate-300">
                        Tu sesión está protegida.
                    </p>

                    <form method="POST" action="{{ route('logout') }}" class="mt-8">

                        @csrf

                        <button type="submit"
                            class="w-full rounded-2xl bg-gradient-to-r from-cyan-600 to-emerald-600 px-5 py-3 text-sm font-bold uppercase tracking-[0.15em] text-white shadow-2xl transition hover:-translate-y-1">

                            Cerrar sesión

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
