<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Medialibrary.pro {{ isset($pageTitle) ? '| ' . $pageTitle : '' }}</title>

    @stack('scripts')

    <link href="https://fonts.googleapis.com/css?family=Inter:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#c42543">
    <meta name="theme-color" content="#ffffff">

    <livewire:styles />
    <livewire:scripts />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
</head>

<body class="min-h-screen p-8 pb-0 flex flex-col text-gray-700 bg-gray-200">
    <script>
        window.oldValues = @json(Session::getOldInput());
        window.errors = {!! $errors->isEmpty() ? '{}' : $errors !!};
        window.csrfToken = '{{ csrf_token() }}';
    </script>

    <div class="flex-grow w-full max-w-4xl mx-auto p-16 bg-white rounded shadow-xl">
        <a href="/" class="hover:opacity-75 flex items-center mb-12">
            <svg class="w-10 h-10 mr-3" version="1.1" xmlns="http://www.w3.org/2000/svg"x="0px" y="0px"
            viewBox="0 0 512 512">
                <path class="logo-shadow" style="opacity:0.1;" d="M485.2,500.1H71.5c-7.6,0-13.8-6.2-13.8-13.8V72.7c0-7.6,6.2-13.8,13.8-13.8h413.7
            c7.6,0,13.8,6.2,13.8,13.8v413.7C499,494,492.8,500.1,485.2,500.1z"/>
            <path class="logo-canvas" style="fill:#13034A;" d="M460.5,474.1H46.8c-7.6,0-13.8-6.2-13.8-13.8V46.7c0-7.6,6.2-13.8,13.8-13.8h413.7
            c7.6,0,13.8,6.2,13.8,13.8v413.7C474.3,468,468.1,474.1,460.5,474.1z"/>
            <path class="logo-sky" style="fill:#C42543;" d="M460.5,474.1H46.8c-7.6,0-13.8-6.2-13.8-13.8V46.7c0-7.6,6.2-13.8,13.8-13.8h413.7
            c7.6,0,13.8,6.2,13.8,13.8v413.7C474.3,468,468.1,474.1,460.5,474.1z"/>
                <circle class="logo-sun" style="fill:#FFE375;" cx="364" cy="144.9" r="48.3"/>
                <path class="logo-mountains" style="fill:#13034A;" d="M365.4,247.2h-0.2c-6.2,0-12.3,2.4-17,7.1l-86,86c-4.7,4.7-10.9,7.1-17.1,7.1
                    c-6.2,0-12.4-2.4-17.1-7.1l-12.7-12.7c-4.7-4.7-10.9-7.1-17.1-7.1s-12.4,2.4-17.1,7.1L37.8,470.8c2.4,2.1,5.6,3.4,9,3.4h413.7
                    c7.6,0,13.8-6.2,13.8-13.8V346.1l-91.8-91.8C377.7,249.6,371.6,247.2,365.4,247.2"/>
            </svg>
            <h1 class="text-sm uppercase tracking-widest leading-tight font-medium">
                Media Library
                <span class="text-red-500">Pro</span>
            </h1>
        </a>

        <div>

            {{--
            @if($errors->any())
                <div class="my-8 -mx-16 py-6 px-16 grid gap-4 text-xs bg-gray-900 text-gray-200">
                    {{ dump($errors) }}

                    <ul>
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>
                </div>
            @endif
             --}}

            @if(flash()->message)
                <div class="rounded-sm mb-8 px-4 py-2 {{ flash()->class =='error' ? 'bg-red-100 text-red-500' : 'bg-green-100 text-green-500' }}">
                    {{ flash()->message }}
                </div>
            @endif

            <div id="app">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="flex-none text-center py-8 text-xs">
        Powered by <a href="https://media-library.pro" class="border-b border-gray-300">media-library.pro</a>
    </footer>
</body>
</html>
