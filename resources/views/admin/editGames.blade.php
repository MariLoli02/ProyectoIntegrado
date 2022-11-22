<x-app-layout>
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-6">
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white bg-opacity-70 shadow-md p-5 rounded">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">Añade un Juego Nuevo</h3>

                </div>
                <x-form action="{{ route('Games.update', $game) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-form-input name="nombre" label="Nombre:" value="{{ $game->nombre_game }}" class="rounded" />
                    <x-form-textarea style="height: 20em" name="contenido" label="Contenido:"
                        default="{{ $game->contenido_game }}" class="rounded" />

                    <x-form-select label="Plataforma:" name="plataforma" class="rounded">
                        @foreach ($plataformas as $plataforma)
                            @if ($plataforma == $game->plataforma)
                                <option value="{{ $plataforma }}" selected>{{ $plataforma }}</option>
                            @else
                                <option value="{{ $plataforma }}">{{ $plataforma }}</option>
                            @endif
                        @endforeach
                    </x-form-select>

                    <x-form-select label="Genero:" name="genero" class="rounded">
                        @foreach ($generos as $genero)
                            @if ($genero->id == $game->genre_id)
                                <option value="{{ $genero->id }}" selected>{{ $genero->nombre_genre }}</option>
                            @else
                                <option value="{{ $genero->id }}">{{ $genero->nombre_genre }}</option>
                            @endif
                        @endforeach
                    </x-form-select>

                    <x-form-input class="rounded" type="file" id="img" name="image" label="Imagen:"
                        accept="image/*" />
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <div class="flex items-center justify-center w-40 mb-4 ">
                            <img id="image" src="{{Storage::url($game->image->url)}}" class="rounded" />
                        </div>
                    </div>
                    <x-form-submit class="bg-purple-600 hover:bg-purple-800">
                        <span><i class="fas fa-save"></i> Guardar</span>
                    </x-form-submit>
                </x-form>
            </div>

        </div>
    </div>

    <script>
        //Cambiar imagen 
        document.getElementById("img").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("image").setAttribute('src', event.target.result)
            };
            reader.readAsDataURL(file);
        }
    </script>
</x-app-layout>
