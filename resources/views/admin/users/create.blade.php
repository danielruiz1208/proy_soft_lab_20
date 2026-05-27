<x-app-layout>

    <x-slot name="header">

        <div class="rounded-3xl border border-slate-700 bg-slate-900/70 p-8 shadow-2xl backdrop-blur-xl">

            <h2 class="text-4xl font-extrabold text-white">
                Crear Usuario
            </h2>

            <p class="mt-3 text-slate-300">
                Registro de nuevos usuarios
            </p>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-3xl px-4">

            <form method="POST" action="{{ route('admin.users.store') }}"
                class="space-y-6 rounded-3xl border border-slate-700 bg-slate-900/70 p-8 shadow-2xl backdrop-blur-xl">

                @csrf

                <input class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white" name="name" placeholder="Nombre"
                    required>

                <input class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white" name="user" placeholder="Usuario"
                    required>

                <input class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white" name="email" placeholder="Email"
                    required>

                <select name="rol" class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white">

                    <option value="usuario">Usuario</option>
                    <option value="admin">Administrador</option>

                </select>

                <input type="password" class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white" name="password"
                    placeholder="Contraseña" required>

                <input type="password" class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white"
                    name="password_confirmation" placeholder="Confirmar contraseña" required>

                <div class="flex justify-between">

                    <a href="{{ route('admin.users.index') }}"
                        class="rounded-xl bg-slate-700 px-5 py-3 text-sm font-bold text-white">

                        Volver

                    </a>

                    <button
                        class="rounded-xl bg-gradient-to-r from-cyan-600 to-emerald-600 px-6 py-3 text-sm font-bold text-white">

                        Guardar

                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
