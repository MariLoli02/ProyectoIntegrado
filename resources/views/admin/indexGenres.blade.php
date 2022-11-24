<x-app-layout>
    <!-- component -->
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen flex justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6 my-10">
                <div class="shadow-md rounded">
                    <div class=" my-2 flex flex-row-reverse">
                        <a href="{{ route('Genre.create') }}"
                            class="text-white bg-gradient-to-r from-purple-500 to-blue-500 hover:bg-gradient-to-l focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-2xl text-md px-5 py-2.5 text-center"><i
                                class="fas fa-plus"></i> Añadir Genero</a>

                    </div>
                    <!-- component -->
                    <table class="border-collapse w-full">
                        <thead>
                            <tr>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Id</th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Nombre</th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Resumen</th>
                                <th
                                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generos as $item)
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Id</span>
                                        {{ $item->id }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nombre</span>
                                        {{ $item->nombre_genre }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Resumen</span>
                                        {{ $item->contenido_genre }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                                        <span
                                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Acciones</span>
                                        <form action="{{ route('Genre.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 mr-2"><i
                                                    class="fas fa-trash"></i></button>
                                            <a href="{{ route('Genre.edit', $item->id) }}"
                                                class="text-blue-500 hover:text-blue-700 mr-2"><i
                                                    class="fas fa-edit"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{$generos->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
