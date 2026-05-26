<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-900 leading-tight">
            Administración de Usuarios
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('admin.users.create') }}"
                class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition-colors">

                Nuevo Usuario

            </a>

            <div class="bg-white shadow rounded-lg p-6 mt-4 border border-indigo-100">

                <table class="table-auto w-full text-slate-700">

                    <thead class="bg-indigo-50 text-indigo-900">
                        <tr>
                            <th class="px-3 py-2 text-left">ID</th>
                            <th class="px-3 py-2 text-left">Nombre</th>
                            <th class="px-3 py-2 text-left">Usuario</th>
                            <th class="px-3 py-2 text-left">Email</th>
                            <th class="px-3 py-2 text-left">Rol</th>
                            <th class="px-3 py-2 text-left">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $user)
                            <tr class="border-b border-slate-100 hover:bg-slate-50">

                                <td class="px-3 py-2">{{ $user->id }}</td>
                                <td class="px-3 py-2">{{ $user->name }}</td>
                                <td class="px-3 py-2">{{ $user->user }}</td>
                                <td class="px-3 py-2">{{ $user->email }}</td>
                                <td class="px-3 py-2">{{ $user->rol }}</td>

                                <td class="px-3 py-2">

                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded transition-colors">

                                        Editar

                                    </a>

                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="bg-rose-600 hover:bg-rose-700 text-white px-3 py-1 rounded transition-colors">

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

                    <button type="submit" class="bg-slate-700 hover:bg-slate-800 text-white px-4 py-2 rounded transition-colors">

                        Cerrar Sesión

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
