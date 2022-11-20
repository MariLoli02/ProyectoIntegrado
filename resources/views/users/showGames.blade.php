<x-app-layout>
    <div class="container h-screen max-w-full">
        <div
            class="m-auto my-28 w-96 max-w-lg items-center justify-center overflow-hidden rounded-2xl bg-slate-200 shadow-xl">
            <div class="h-24 bg-white"></div>
            <div class="-mt-20 flex justify-center">
                <img class="h-32 rounded-full" src="{{ Storage::url($game->image->url) }}" />
            </div>
            <div class="mt-5 mb-1 px-3 text-center text-xl font-bold">{{ $game->nombre_game }}</div>
            <div class="mb-5 px-3 text-center text-sky-500">{{ $game->contenido_game }}</div>
            <div class="mb-5 px-3 text-center">Plataforma: {{ $game->plataforma }}</div>

            @foreach ($generos as $genero)
                @if ($genero->id == $game->genre_id)
                    <p class="mx-2 mb-7 text-center text-base">{{ $genero->nombre_genre }}</p>
                @endif
            @endforeach
            <a href="{{ route('games.indexUser') }}"
                class="mx-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-backward"></i> Volver
            </a>
        </div>
    </div>
</x-app-layout>
