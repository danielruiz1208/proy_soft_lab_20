<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuario
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form method="POST" action="{{ route('admin.users.update', $user) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Nombre</label>

                        <input type="text" name="name" value="{{ $user->name }}" class="border rounded w-full p-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label>Usuario</label>

                        <input type="text" name="user" value="{{ $user->user }}"
                            class="border rounded w-full p-2" required>
                    </div>

                    <div class="mb-4">
                        <label>Email</label>

                        <input type="email" name="email" value="{{ $user->email }}"
                            class="border rounded w-full p-2" required>
                    </div>

                    <div class="mb-4">
                        <label>Rol</label>

                        <select name="rol" class="border rounded w-full p-2">

                            <option value="usuario" {{ $user->rol == 'usuario' ? 'selected' : '' }}>
                                Usuario
                            </option>

                            <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>
                                Administrador
                            </option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Nueva Contraseña</label>

                        <input type="password" name="password" class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label>Confirmar Contraseña</label>

                        <input type="password" name="password_confirmation" class="border rounded w-full p-2">
                    </div>

                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">

                        Actualizar

                    </button>

                    <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">

                        Volver

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
