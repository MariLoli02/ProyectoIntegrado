<x-app-layout>
    <!-- component -->
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen flex justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6 my-32">
                <div class="bg-white shadow-md rounded">
                    <div class="flex flex-row-reverse">
                        <a href="{{ route('Games.create') }}"
                            class="py-2 px-2 text-purple-500 hover:text-purple-700 mr-2 font-bold"><i
                                class="fas fa-plus"></i> Añadir Juego</a>

                    </div>
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Id</th>
                                <th class="py-3 px-6 text-left">Game</th>
                                <th class="py-3 px-6 text-center">Plataforma</th>
                                <th class="py-3 px-6 text-center">Genero</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($games as $item)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $item->id }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img class="w-6 h-6 rounded-full" src="{{ Storage::url($item->image->url) }}"
                                                    alt="image">
                                            </div>
                                            <span class="font-medium">{{ $item->nombre_game }}</span>
                                        </div>
                                    </td>
                                    
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <span class="font-medium">{{ $item->plataforma }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @foreach ($generos as $genero)
                                            @if ($genero->id == $item->genre_id)
                                            <div class="flex items-center justify-center">
                                                <span class="font-medium">{{ $genero->nombre_genre }}</span>
                                            </div> 
                                            @endif
                                        @endforeach
                                    </td>


                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <form action="{{ route('Games.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 mr-2"><i
                                                        class="fas fa-trash"></i></button>
                                                <a href="{{ route('Games.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 mr-2"><i
                                                        class="fas fa-edit"></i></a>
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
    </div>
</x-app-layout>
