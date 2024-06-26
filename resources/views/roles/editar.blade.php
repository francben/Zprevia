<x-app-layout>    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Rol') }}
        </h2>
    </x-slot>
    <div class="section-body">
        <div class="flex flex-col lg:flex-row">
            <div class="w-full lg:w-full">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="p-6">
                    
                    @if ($errors->any())                                                
                        <div class="bg-gray-800 text-white rounded-lg p-4 mb-4 relative" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                            @foreach ($errors->all() as $error)                                    
                                <span class="bg-red-600 text-white py-1 px-2 rounded-full">{{ $error }}</span>
                            @endforeach                        
                            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                                <span class="text-2xl text-white" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="">Nombre del Rol:</label>      
                                {!! Form::text('name', null, array('class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline')) !!}
                            </div>
                        </div>
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="">Permisos para este Rol:</label>
                                <br/>
                                @foreach($permission as $value)
                                    <label class="block">
                                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'mr-2 leading-tight')) }}
                                        <span class="text-gray-700">{{ $value->name }}</span>
                                    </label>
                                <br/>
                                @endforeach
                            </div>
                        </div>
                        
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                        
                    </div>
                    {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>    