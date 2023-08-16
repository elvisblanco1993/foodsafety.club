<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

    </head>
    <body>
        {{-- Header bar --}}
        <div class="w-full h-16 sm:h-20 bg-white border-b border-b-slate-200">
            <nav class="h-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <a href="/" class="text-xl font-medium">{{ __("Food Safety Club") }}</a>

                <div class="flex items-center space-x-4">
                    <a href="/about" class="text-xs uppercase tracking-widest font-medium">{{__("About")}}</a>
                    @livewire('web.subscribe')
                </div>
            </nav>
        </div>
        <div class="font-sans text-gray-900 antialiased">
            @yield('content')
        </div>

        @if (!request()->routeIs('unsubscribe'))
            <footer class="text-xs text-center py-3 border-t">
                <p>{{__("Food Satefy Club is an experimental tool built by")}} <a href="https://linkd.page/@elvisbg" target="_blank" class="underline text-indigo-500">Elvis Blanco</a></p>
                <a href="/unsubscribe" class="inline-block mt-1 underline text-red-500">{{__("Unsubscribe")}}</a>
            </footer>
        @endif

        @stack('modals')

        @livewireScripts
    </body>
</html>
