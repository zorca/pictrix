<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @translations
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="0" width="0">
            <defs>
                <filter id="squiggly-0">
                    <feTurbulence type="fractalNoise" id="turbulence" baseFrequency=".1" numOctaves="2" result="turbulence" seed="0"></feTurbulence>
                    <feDisplacementMap id="displacement" in="SourceGraphic" scale="3"></feDisplacementMap>
                </filter>
                <filter id="squiggly-1">
                    <feTurbulence type="fractalNoise" id="turbulence" baseFrequency=".4" numOctaves="2" result="turbulence" seed="1"></feTurbulence>
                    <feDisplacementMap in="SourceGraphic" scale="4"></feDisplacementMap>
                </filter>

                <filter id="squiggly-2">
                    <feTurbulence type="fractalNoise" id="turbulence" baseFrequency=".1" numOctaves="2" result="turbulence" seed="2"></feTurbulence>
                    <feDisplacementMap in="SourceGraphic" scale="3"></feDisplacementMap>
                </filter>
                <filter id="squiggly-3">
                    <feTurbulence type="fractalNoise" id="turbulence" baseFrequency=".4" numOctaves="2" result="turbulence" seed="3"></feTurbulence>
                    <feDisplacementMap in="SourceGraphic" scale="4"></feDisplacementMap>
                </filter>
            </defs>
        </svg>
    </body>
</html>
