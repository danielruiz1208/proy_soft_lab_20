<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @auth
        <div class="space-y-4 text-slate-700">
            <p class="text-sm">
                {{ __('Hola, :name. Tu sesión está activa.', ['name' => Auth::user()->name]) }}
            </p>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <a
                    class="underline text-sm text-indigo-600 hover:text-indigo-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ Auth::user()->rol === 'admin' ? route('admin.users.index') : route('profile.edit') }}"
                >
                    {{ __('Ir a mi panel') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-primary-button>
                        {{ __('Cerrar sesión') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    @else
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="user" :value="__('Usuario')" />

                <x-text-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user')" required
                    autofocus />

                <x-input-error :messages="$errors->get('user')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-indigo-600 hover:text-indigo-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    @endauth
</x-guest-layout>
