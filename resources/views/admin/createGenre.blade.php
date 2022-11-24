<x-app-layout>
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-6">
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white bg-opacity-70 shadow-md p-5 rounded">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">Añade un Nuevo Genero</h3>

                </div>
                <x-form action="{{ route('Genre.store') }}">
                    <x-form-input name="nombre" label="Nombre:" class="rounded" />
                    <x-form-textarea style="height: 20em" name="contenido" label="Contenido:" class="rounded" />

                    <x-form-submit class="bg-purple-600 hover:bg-purple-800">
                        <span><i class="fas fa-save"></i> Guardar</span>
                    </x-form-submit>
                </x-form>
            </div>

        </div>
    </div>
</x-app-layout>
