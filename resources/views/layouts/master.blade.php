<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Media library pro test app</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    @stack('scripts')

    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
</head>

<body>

<script>
    window.oldValues = @json(Session::getOldInput());
    window.errors = {!! $errors->isEmpty() ? '{}' : $errors !!};
    window.tempEndpoint = '/temp-upload';
    window.csrfToken = '{{ csrf_token() }}';
</script>

<div class="p-4">
    <div>
        @if(flash()->message)
            <div class="flash()->class">
                {{ flash()->message }}
            </div>
        @endif
        @if($errors->any())
            {!! implode('', $errors->all('<li>:message</li>')) !!}
        @endif
        <div id="app">
            @yield('content')
        </div>
    </div>
</div>
</body>

</html>
