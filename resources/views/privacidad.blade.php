<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=cabin:400" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Cabin', sans-serif;
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="antialiased bg-cover bg-[url({{ Storage::url('img/fondo.jpg') }})]">
    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-white dark:text-white underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-6 text-sm text-white dark:text-white underline">Iniciar
                        Sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-sm text-white dark:text-white underline">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif
        <!-- component -->
        <div class="p-8">
            <div class="bg-white opacity-80 p-4 rounded-lg shadow-xl py-8 mt-12">
                <h4 class="text-4xl font-bold text-gray-800 tracking-widest uppercase text-center">Política de
                    privacidad de los Servicios
                    GameStation</h4>
                <div class="space-y-12 px-2 xl:px-16 mt-12">
                    <div class="mt-4 flex">
                        <div>
                            <div class="flex items-center h-16 border-l-4 border-gray-400">
                                <span class="text-4xl text-gray-400 px-4">A.</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center h-16">
                                <span class="text-lg text-purple-600 font-bold">Introducción y definiciones.</span>
                            </div>
                            <div class="flex items-center py-2">
                                <span class="text-gray-500"> Tras leer y aceptar esta Política de Privacidad y
                                    Condiciones de los Servicios GameStation,
                                    usted podrá disfrutar de estos Servicios.
                                    A través de la aceptación de esta cláusula, usted acepta expresamente la Política de
                                    Privacidad de los Servicios GameStation como Usuario de cualquiera de los medios o
                                    Servicios
                                    y/o productos, ya sean gratuitos o de pago, que consisten en el acceso a diferentes
                                    informaciones, contenidos, programas, apps, tiendas, sitios web de ‘e-commerce’,
                                    vídeo bajo
                                    demanda o similares (en adelante, “Servicios GameStation) que GameStation pone a
                                    disposición
                                    de los Usuarios en Internet.
                                    Para el correcto entendimiento de esta Política de Privacidad y las Condiciones de
                                    los
                                    Servicios GameStation, se realizan las siguientes definiciones:
                                    El Usuario será aquella persona física o jurídica que acceda y/o use cualquiera de
                                    los
                                    Servicios GameStation por cualquier medio sin necesidad de registrarse. Mediante la
                                    aceptación de esta cláusula, el Usuario acepta la Política de Privacidad y las
                                    Condiciones
                                    de los Servicios GameStation, reflejadas en el presente documento.
                                    Los Servicios GameStation, abarcan servicios, productos y acciones promocionales, ya
                                    sean
                                    gratuitos o de pago, que consisten en el acceso a diferentes informaciones,
                                    contenidos,
                                    comunicaciones comerciales, editoriales y corporativas, programas, aplicaciones,
                                    tiendas,
                                    sitios web, vídeo bajo demanda o similares.
                                    La Política de Privacidad de los Servicios GameStation es de aplicación a:

                                    La navegación como Usuario que se realice sobre cualquier página web de GameStation
                                    o
                                    aplicación móvil de GameStation.
                                    El acceso como Usuario a cualquiera de los contenidos a través de cualquier otro
                                    medio o
                                    Servicio de GameStation.
                                    La navegación que se pueda realizar desde cualquier dispositivo desde el que se
                                    permita el
                                    acceso a los contenidos o a los Servicios GameStation, como ordenadores, televisión
                                    digital,
                                    ‘Smart Tv’s’, PDA, Tabletas, ‘iPad’, ‘iPhone’, teléfonos móviles, ‘Smartphones’,
                                    suscripciones vía RSS o cualquier otro medio de acceso a los contenidos puestos a
                                    disposición en internet.
                                    La navegación y disfrute de los Servicios GameStation que se realice desde cualquier
                                    parte
                                    del mundo, ya se trate de Servicios ubicados en el país de acceso o ubicados en otro
                                    país.</span>

                            </div>
                        </div>

                    </div>
                    <div class="mt-4 flex">
                        <div class="flex items-center h-16 border-l-4 border-gray-400">
                            <span class="text-4xl text-gray-400 px-4">B.</span>
                        </div>
                        <div>
                            <div class="flex items-center h-16">
                                <span class="text-lg text-purple-600 font-bold">Cumplimiento de la normativa
                                    vigente.</span>
                            </div>
                            <div class="flex items-center py-2">
                                <span class="text-gray-500"> GameStation, al estar ubicado en España, está sometido
                                    al cumplimiento de la
                                    normativa
                                    española y europea en materia de protección de datos y servicios de la sociedad
                                    de la
                                    información.
                                    Por lo tanto, GameStation garantiza en todo momento el íntegro y pleno
                                    cumplimiento de las
                                    obligaciones dispuestas por la normativa de protección de datos y de servicios
                                    de la
                                    sociedad de la información, así como por cualquier otra Ley o norma que
                                    complemente o
                                    sustituya a las anteriores.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex">
                        <div class="flex items-center h-16 border-l-4 border-gray-400">
                            <span class="text-4xl text-gray-400 px-4">C.</span>
                        </div>
                        <div>
                            <div class="flex items-center h-16">
                                <span class="text-lg text-purple-600 font-bold">Finalidades del tratamiento de los datos
                                    personales de los Usuarios.</span>
                            </div>
                            <div class="flex items-center py-2">
                                <span class="text-gray-500"> Finalidades del tratamiento de los datos personales de los
                                    Usuarios.
                                    Los datos facilitados por el Usuario de los Servicios GameStation son utilizados
                                    con
                                    diversas finalidades que se enumeran a continuación:

                                    Facilitar un Servicio personalizado para el Usuario, adecuando dichos Servicios
                                    a su perfil
                                    personal, geográfico, así como a sus preferencias y gustos.
                                    Definir tipologías, segmentaciones y perfiles de usuarios, así como prestar,
                                    gestionar,
                                    administrar, ampliar y mejorar los Servicios y/o contenidos ofrecidos en los
                                    Servicios
                                    GameStation, mediante el análisis de la utilización de los Servicios por parte
                                    de los
                                    Usuarios.
                                    Mostrar información editorial o comercial específicamente diseñada para el
                                    perfil inferido
                                    en función del uso de los Servicios GameStation por parte del Usuario, tanto en
                                    servicios
                                    propios como en servicios de terceros, pertenecientes a cualquiera de los
                                    Sectores, con los
                                    que GameStation llegue a acuerdos. Dicho perfil también podrá ser inferido en
                                    función de la
                                    localización geográfica del dispositivo o terminal desde que utiliza los
                                    Servicios
                                    GameStation; no obstante, siempre se le solicitará una autorización previa y
                                    específica para
                                    poder tratar dicha información.
                                    Diseñar nuevos servicios que puedan resultar de su interés.
                                    Gestionar las incidencias y el mantenimiento de los Servicios GameStation.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex">
                        <div class="flex items-center h-16 border-l-4 border-gray-400">
                            <span class="text-4xl text-gray-400 px-4">D.</span>
                        </div>
                        <div>
                            <div class="flex items-center h-16">
                                <span class="text-lg text-purple-600 font-bold">Datos compartidos con terceros.</span>
                            </div>
                            <div class="flex items-center py-2">
                                <span class="text-gray-500"> GameStation no cederá los datos personales de los Usuarios
                                    a ningún tercero sin
                                    una base
                                    jurídica que legitime este tratamiento.
                                    Para la medición del uso de los Servicios, GameStation utiliza proveedores
                                    externos que
                                    utilizan Cookies para realizar estudios analíticos del uso de los Servicios
                                    GameStation. El
                                    Usuario podrá consultar la POLÍTICA DE COOKIES en todo momento.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex">
                        <div class="flex items-center h-16 border-l-4 border-gray-400">
                            <span class="text-4xl text-gray-400 px-4">E.</span>
                        </div>
                        <div>
                            <div class="flex items-center h-16">
                                <span class="text-lg text-purple-600 font-bold">Menores de edad.</span>
                            </div>
                            <div class="flex items-center py-2">
                                <span class="text-gray-500"> Los Servicios de GameStation van dirigido a mayores de 14
                                    años. Los menores de
                                    14 años no
                                    deberán utilizar los Servicios GameStation sin consentimiento de sus padres o
                                    tutores.
                                    En caso de que GameStation detecte usuarios que pudieran ser menores de 14 años,
                                    se reserva
                                    el derecho a solicitar documentación identificativa para verificar la edad y/o a
                                    cancelar el
                                    Servicio.
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    </div>
    <footer
        class="mt-40 p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 bg-gradient-to-r from-[#981F80] to-[#1F2198]">
        <span class="text-sm text-white sm:text-center ">© 2022 <a href=""
                class="hover:underline">GameStation</a>.
            All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm text-white sm:mt-0">
            <li>
                <a href="{{ route('about') }}" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="https://www.instagram.com/" class="hover:underline">Social Media</a>
            </li>
        </ul>
    </footer>
</body>


</html>
