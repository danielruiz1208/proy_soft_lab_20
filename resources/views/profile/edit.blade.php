<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Perfil de Usuario
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <p class="mb-4">
                    <strong>Nombre:</strong>
                    {{ $user->name }}
                </p>

                <p class="mb-4">
                    <strong>Usuario:</strong>
                    {{ $user->user }}
                </p>

                <p class="mb-4">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </p>

                <p class="mb-4">
                    <strong>Rol:</strong>
                    {{ $user->rol }}
                </p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">

                        Cerrar Sesión

                    </button>
                </form>

            </div>

        </div>

    </div>

</x-app-layout>
