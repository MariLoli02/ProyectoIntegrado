<x-app-layout>
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-6">
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white bg-opacity-70 shadow-md p-5 rounded">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">Añade una Nueva Guía</h3>

                </div>
                <x-form action="{{ route('Guide.update', $guide->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-form-input name="titulo" label="Titulo Guía:" class="rounded" value="{{$guide->titulo_guide}}"/>
                    <x-form-textarea style="height: 20em" name="contenido" label="Contenido:" class="rounded" default="{{$guide->contenido_guide}}"/>

                    <x-form-select label="Juego:" name="juego" class="rounded">
                        @foreach ($games as $game)
                        @if ($game->id == $guide->game_id)
                        <option value="{{$game->id}}" selected>{{ $game->nombre_game }}</option>
                        @else
                            <option value="{{$game->id}}">{{ $game->nombre_game }}</option>
                        @endif
                        
                        @endforeach
                    </x-form-select>
                    
                    <x-form-input class="rounded" type="file" id="img" name="image" label="Imagen:"
                        accept="image/*" />
                        <div class="flex items-center justify-center mt-5 mx-7">
                        <div class="w-40 mb-4">
                            <img id="image"
                                src="{{Storage::url($guide->image->url)}}"
                                class="rounded" />
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