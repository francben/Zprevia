<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="section-body">
        <div class="flex flex-col lg:flex-row">
            <div class="w-full lg:w-full">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="p-6">

                    @can('crear-rol')
                        <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('roles.create') }}">Nuevo</a>
                    @endcan

                    <table class="min-w-full leading-normal mt-2">
                        <thead class="bg-verde-600">
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-white text-left text-sm uppercase font-semibold">Rol</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-white text-left text-sm uppercase font-semibold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $role->name }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @can('editar-rol')
                                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                @endcan
                                
                                @can('borrar-rol')
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Borrar', ['class' => 'bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Centramos la paginacion a la derecha -->
                    <div class="flex justify-end mt-4">
                        {!! $roles->links() !!}
                    </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>