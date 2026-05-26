<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Administración de usuarios') }}
                </h2>
                <p class="text-sm text-gray-600">
                    {{ __('Bienvenido, :name', ['name' => Auth::user()->name]) }}
                </p>
            </div>
            <a href="{{ route('admin.users.create') }}">
                <x-primary-button>
                    {{ __('Nuevo usuario') }}
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    @if (session('status'))
                        <div class="rounded-md bg-green-50 px-4 py-3 text-sm text-green-700">
                            @switch(session('status'))
                                @case('user-created')
                                    {{ __('Usuario creado correctamente.') }}
                                    @break
                                @case('user-updated')
                                    {{ __('Usuario actualizado correctamente.') }}
                                    @break
                                @case('user-deleted')
                                    {{ __('Usuario eliminado correctamente.') }}
                                    @break
                                @default
                                    {{ session('status') }}
                            @endswitch
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-gray-600">
                                <tr>
                                    <th class="px-4 py-3 font-medium">{{ __('Nombre') }}</th>
                                    <th class="px-4 py-3 font-medium">{{ __('Usuario') }}</th>
                                    <th class="px-4 py-3 font-medium">{{ __('Email') }}</th>
                                    <th class="px-4 py-3 font-medium">{{ __('Rol') }}</th>
                                    <th class="px-4 py-3 font-medium text-right">{{ __('Acciones') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="px-4 py-3 text-gray-900">{{ $user->name }}</td>
                                        <td class="px-4 py-3 text-gray-700">{{ $user->user }}</td>
                                        <td class="px-4 py-3 text-gray-700">{{ $user->email }}</td>
                                        <td class="px-4 py-3 text-gray-700">
                                            {{ $user->rol === 'admin' ? __('Administrador') : __('Usuario') }}
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <div class="flex justify-end gap-2">
                                                <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900">
                                                    {{ __('Editar') }}
                                                </a>
                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button class="text-sm">
                                                        {{ __('Eliminar') }}
                                                    </x-danger-button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                            {{ __('No hay usuarios registrados.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
