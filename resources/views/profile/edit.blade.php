<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-900 leading-tight">
            Perfil de Usuario
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6 border border-indigo-100">

                <p class="mb-4 text-slate-700">
                    <strong class="text-slate-900">Nombre:</strong>
                    {{ $user->name }}
                </p>

                <p class="mb-4 text-slate-700">
                    <strong class="text-slate-900">Usuario:</strong>
                    {{ $user->user }}
                </p>

                <p class="mb-4 text-slate-700">
                    <strong class="text-slate-900">Email:</strong>
                    {{ $user->email }}
                </p>

                <p class="mb-4 text-slate-700">
                    <strong class="text-slate-900">Rol:</strong>
                    {{ $user->rol }}
                </p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white px-4 py-2 rounded transition-colors">

                        Cerrar Sesión

                    </button>
                </form>

            </div>

        </div>

    </div>

</x-app-layout>
