<x-app-layout>
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-6">
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white bg-opacity-70 shadow-md p-5 rounded">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">Añade un Juego Nuevo</h3>

                </div>
                <x-form action="{{ route('Games.store') }}" enctype="multipart/form-data">
                    <x-form-input name="nombre" label="Nombre:" class="rounded" />
                    <x-form-textarea style="height: 20em" name="contenido" label="Contenido:" class="rounded" />

                    <x-form-select label="Plataforma:" name="plataforma" class="rounded">
                        <option value="Xbox">Xbox</option>
                        <option value="Nintendo">Nintendo</option>
                        <option value="Pc">Pc</option>
                        <option value="PlayStation">PlayStation</option>
                    </x-form-select>

                    <x-form-select label="Genero:" name="genero" class="rounded">
                        @foreach ($generos as $genero)
                        <option value="{{$genero->id}}">{{ $genero->nombre_genre }}</option>
                        @endforeach
                        
                    </x-form-select>
                    
                    <x-form-input class="rounded" type="file" id="img" name="image" label="Imagen:"
                        accept="image/*" />
                        <div class="flex items-center justify-center mt-5 mx-7">
                        <div class="w-40 mb-4">
                            <img id="image"
                                src="https://alemautos.com.co/themes/kol3-cars/assets/images/no-image.png"
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
