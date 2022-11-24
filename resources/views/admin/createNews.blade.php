<x-app-layout>
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-6">
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white bg-opacity-70 shadow-md p-5 rounded">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">Añade una Nueva Noticia</h3>

                </div>
                <x-form action="{{ route('News.store') }}" enctype="multipart/form-data">
                    <x-form-input name="titulo" label="Titulo:" class="rounded" />
                    <x-form-input name="autor" label="Autor:" class="rounded" />
                    <x-form-textarea style="height: 20em" name="contenido" label="Contenido:" class="rounded" />
                    <x-form-select label="Estado:" name="estado" class="rounded">
                        <option value="Publicada">Publicada</option>
                        <option value="Borrador">Borrador</option>
                    </x-form-select>

                    <x-form-input class="rounded" type="file" id="img" name="image" label="Imagen:"
                        accept="image/*" />
                    <div class="flex items-center justify-center mt-5 mx-7">
                        <div class="w-40 mb-4">
                            <img id="image" name='image'
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
