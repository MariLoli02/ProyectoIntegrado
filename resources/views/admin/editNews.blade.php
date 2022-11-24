<x-app-layout>
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-6">
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white bg-opacity-70 shadow-md p-5 rounded">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">Editar Noticia</h3>

                </div>
                <x-form action="{{ route('News.update', $news->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-form-input name="titulo" label="Titulo:" class="rounded" value="{{ $news->titulo_news }}" />

                    <x-form-input name="autor" label="Autor:" class="rounded" value="{{ $news->autor_news }}" />

                    <x-form-textarea style="height: 20em" name="contenido" label="Contenido:" class="rounded"
                        default="{{ $news->contenido_news }}" />

                    <x-form-select label="Estado:" name="estado" class="rounded">
                        @if ($news->estado == 'Publicada')
                            <option value="Publicada" selected>Publicada</option>
                            <option value="Borrador">Borrador</option>
                        @else
                            <option value="Publicada">Publicada</option>
                            <option value="Borrador" selected>Borrador</option>
                        @endif
                    </x-form-select>

                    <x-form-input class="rounded" type="file" id="img" name="image" label="Imagen:"
                        accept="image/*" />
                    <div class="flex items-center justify-center mt-5 mx-7">
                        <div class="w-40 mb-4">
                            <img id="image" name='image' src="{{ Storage::url($news->image->url) }}"
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
