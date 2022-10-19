<!-- Container -->
<div class="flex flex-wrap min-h-screen w-full content-center justify-center py-10">
    <!-- Login component -->
    <div class="flex shadow-md">
        <!-- Login form -->
        <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white"
            style="width: 28rem; height: 32rem;">
            <div class="w-72">
                <h1 class="text-xl font-semibold ">Bienvenido/a de nuevo</h1>
                <small class="text-gray-400 mb-4">Por favor, introduzca sus datos</small>
                {{ $slot }}
            </div>
        </div>

        <!-- Login banner -->
        <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 28rem; height: 32rem;">
            {{ $logo }}
        </div>

    </div>
</div>
