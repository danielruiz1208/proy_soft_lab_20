<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Administración de Usuarios
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">

                Nuevo Usuario

            </a>

            <div class="bg-white shadow rounded-lg p-6 mt-4">

                <table class="table-auto w-full">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $user)
                            <tr>

                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->user }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->rol }}</td>

                                <td>

                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded">

                                        Editar

                                    </a>

                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">

                                            Eliminar

                                        </button>

                                    </form>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

                <form method="POST" action="{{ route('logout') }}" class="mt-6">

                    @csrf

                    <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded">

                        Cerrar Sesión

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
