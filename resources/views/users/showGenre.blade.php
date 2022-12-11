<x-app-layout>
    <div class="mt-28 flex justify-center">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm opacity-90">
          <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{$genre->nombre_genre}}</h5>
          <p class="text-gray-700 text-base mb-4">
            {{$genre->contenido_genre}}
          </p>
          <a href="{{route('games.indexUser')}}" type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Volver</a>
        </div>
      </div>
</x-app-layout>