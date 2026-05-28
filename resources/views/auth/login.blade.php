<x-guest-layout>

    <div class="space-y-8">

        <!-- HEADER -->
        <div class="text-center">

            <div
                class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-gradient-to-br from-cyan-500 to-emerald-500 shadow-2xl">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M15.75 9V5.25A3.75 3.75 0 0012 1.5a3.75 3.75 0 00-3.75 3.75V9m-1.5 0h9A1.5 1.5 0 0117.25 10.5v9A1.5 1.5 0 0115.75 21h-7.5a1.5 1.5 0 01-1.5-1.5v-9A1.5 1.5 0 018.25 9z" />

                </svg>

            </div>

            <p class="mt-6 text-xs font-bold uppercase tracking-[0.4em] text-cyan-400">
                Acceso Seguro
            </p>

            <h1 class="mt-3 text-4xl font-extrabold text-white">
                DANIEL RUIZ VARGAS
            </h1>

            <p class="mt-3 text-sm leading-relaxed text-slate-300">
                Inicia sesión para acceder al panel administrativo.
            </p>

        </div>

        <!-- STATUS -->
        <x-auth-session-status
            class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 px-5 py-4 text-sm font-medium text-emerald-300"
            :status="session('status')" />

        @auth

            <div class="rounded-3xl border border-slate-700 bg-slate-900/70 p-6 shadow-2xl backdrop-blur-xl">

                <p class="text-slate-200">
                    {{ __('Hola, :name. Tu sesión está activa.', ['name' => Auth::user()->name]) }}
                </p>

                <div class="mt-6 flex flex-col gap-3">

                    <a class="rounded-2xl bg-gradient-to-r from-cyan-600 to-emerald-600 px-5 py-3 text-center text-sm font-bold uppercase tracking-[0.15em] text-white shadow-lg transition hover:-translate-y-1"
                        href="{{ Auth::user()->rol === 'admin' ? route('admin.users.index') : route('profile.edit') }}">

                        Ir a mi panel

                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="w-full rounded-2xl bg-slate-800 px-5 py-3 text-sm font-bold uppercase tracking-[0.15em] text-white transition hover:bg-slate-700">

                            Cerrar sesión

                        </button>

                    </form>

                </div>

            </div>
        @else
            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">

                @csrf

                <!-- USER -->
                <div>

                    <x-input-label for="user" :value="__('Usuario')"
                        class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-300" />

                    <x-text-input id="user"
                        class="mt-3 block w-full rounded-2xl border border-slate-600 bg-slate-800 px-5 py-3 text-sm text-white placeholder:text-slate-400 focus:border-cyan-500 focus:ring-cyan-500"
                        type="text" name="user" :value="old('user')" required autofocus
                        placeholder="Ingrese su usuario" />

                    <x-input-error :messages="$errors->get('user')" class="mt-2 text-sm text-rose-400" />

                </div>

                <!-- PASSWORD -->
                <div>

                    <x-input-label for="password" :value="__('Contraseña')"
                        class="text-xs font-bold uppercase tracking-[0.2em] text-emerald-300" />

                    <x-text-input id="password"
                        class="mt-3 block w-full rounded-2xl border border-slate-600 bg-slate-800 px-5 py-3 text-sm text-white placeholder:text-slate-400 focus:border-emerald-500 focus:ring-emerald-500"
                        type="password" name="password" required autocomplete="current-password"
                        placeholder="Ingrese su contraseña" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-rose-400" />

                </div>

                <!-- ACTIONS -->
                <div class="space-y-4 pt-2">

                    @if (Route::has('password.request'))
                        <a class="block text-center text-sm font-semibold text-slate-300 transition hover:text-cyan-400"
                            href="{{ route('password.request') }}">

                            ¿Olvidaste tu contraseña?

                        </a>
                    @endif

                    <button type="submit"
                        class="w-full rounded-2xl bg-gradient-to-r from-cyan-600 to-emerald-600 px-6 py-3 text-sm font-bold uppercase tracking-[0.15em] text-white shadow-2xl transition duration-300 hover:-translate-y-1">

                        Iniciar sesión

                    </button>

                </div>

            </form>

        @endauth

    </div>

</x-guest-layout>
