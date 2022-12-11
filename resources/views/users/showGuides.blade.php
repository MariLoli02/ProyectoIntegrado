<x-app-layout>
    <div class="mt-28 container h-screen max-w-full mb-96">
        <div class="flex justify-center">
            <div class="rounded-lg shadow-lg bg-white max-w-2xl opacity-90">
                <img class="rounded-t-lg" src="{{ Storage::url($guide->image->url) }}" alt="" />
                <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $guide->titulo_guide }}</h5>
                    <p class="text-gray-700 text-base mb-4 text-justify">
                        {{ $guide->contenido_guide }}
                    </p>
                    <a href="{{ route('guides.indexUser') }}" type="button"
                        class="inline-block mt-4 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Volver</a>
                </div>
            </div>
        </div>
</x-app-layout>
