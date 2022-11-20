<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="mt-11 bg-white rounded-md opacity-80">
                <div class="container px-6 py-10 mx-auto">
                    <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-[#981F80]">
                        Últimas noticias
                    </h1>
                    <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                        @foreach ($noticias as $noticia)
                            <div class="lg:flex">

                                <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                                    src="{{ Storage::url($noticia->image->url) }}" alt="image">

                                <div class="flex flex-col justify-between py-6 lg:mx-6">
                                    <p>
                                        <a class="text-xl font-semibold text-gray-800 hover:underline dark:text-gray-800"
                                            href="">
                                            {{ $noticia->titulo_news }}
                                        </a>
                                    </p>
                                    <span
                                        class="text-sm text-gray-800 dark:text-gray-800">{{ $noticia->autor_news }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
