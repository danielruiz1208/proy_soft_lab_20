<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Usuario
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form method="POST" action="{{ route('admin.users.store') }}">

                    @csrf

                    <div class="mb-4">
                        <label>Nombre</label>

                        <input type="text" name="name" class="border rounded w-full p-2" required>
                    </div>

                    <div class="mb-4">
                        <label>Usuario</label>

                        <input type="text" name="user" class="border rounded w-full p-2" required>
                    </div>

                    <div class="mb-4">
                        <label>Email</label>

                        <input type="email" name="email" class="border rounded w-full p-2" required>
                    </div>

                    <div class="mb-4">
                        <label>Rol</label>

                        <select name="rol" class="border rounded w-full p-2">

                            <option value="usuario">Usuario</option>
                            <option value="admin">Administrador</option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Contraseña</label>

                        <input type="password" name="password" class="border rounded w-full p-2" required>
                    </div>

                    <div class="mb-4">
                        <label>Confirmar Contraseña</label>

                        <input type="password" name="password_confirmation" class="border rounded w-full p-2" required>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">

                        Guardar

                    </button>

                    <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">

                        Volver

                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
