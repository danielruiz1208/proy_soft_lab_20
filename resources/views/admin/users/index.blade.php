<x-app-layout>

    <x-slot name="header">

        <div class="rounded-3xl border border-slate-700 bg-slate-900/70 p-8 shadow-2xl backdrop-blur-xl">

            <p class="text-xs font-bold uppercase tracking-[0.35em] text-cyan-400">
                Panel Administrativo
            </p>

            <h2 class="mt-3 text-4xl font-extrabold text-white">
                Administración de Usuarios
            </h2>

            <p class="mt-3 text-slate-300">
                Gestiona usuarios del sistema
            </p>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-5xl px-4">

            <!-- BOTON -->
            <div class="flex justify-end">

                <a href="{{ route('admin.users.create') }}"
                    class="rounded-2xl bg-gradient-to-r from-cyan-600 to-emerald-600 px-6 py-3 text-sm font-bold uppercase tracking-[0.15em] text-white shadow-xl transition hover:-translate-y-1">

                    Nuevo Usuario

                </a>

            </div>

            <!-- TABLE -->
            <div
                class="mt-6 overflow-hidden rounded-3xl border border-slate-700 bg-slate-900/70 shadow-2xl backdrop-blur-xl">

                <table class="w-full text-sm text-white">

                    <thead class="bg-slate-800 text-slate-300">

                        <tr>

                            <th class="px-6 py-4 text-left">ID</th>
                            <th class="px-6 py-4 text-left">Nombre</th>
                            <th class="px-6 py-4 text-left">Usuario</th>
                            <th class="px-6 py-4 text-left">Email</th>
                            <th class="px-6 py-4 text-left">Rol</th>
                            <th class="px-6 py-4 text-center">Acciones</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-700">

                        @foreach ($users as $user)
                            <tr class="hover:bg-slate-800/60">

                                <td class="px-6 py-4 text-slate-300">{{ $user->id }}</td>
                                <td class="px-6 py-4 font-semibold text-white">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-cyan-400">{{ $user->user }}</td>
                                <td class="px-6 py-4 text-slate-300">{{ $user->email }}</td>

                                <td class="px-6 py-4">

                                    <span
                                        class="rounded-full px-3 py-1 text-xs font-bold uppercase
                                        {{ $user->rol == 'admin' ? 'bg-emerald-500/20 text-emerald-400' : 'bg-slate-700 text-slate-300' }}">

                                        {{ $user->rol }}

                                    </span>

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="rounded-xl bg-amber-500 px-4 py-2 text-xs font-bold uppercase text-white transition hover:-translate-y-1">

                                            Editar

                                        </a>

                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="rounded-xl bg-rose-600 px-4 py-2 text-xs font-bold uppercase text-white transition hover:-translate-y-1">

                                                Eliminar

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>
