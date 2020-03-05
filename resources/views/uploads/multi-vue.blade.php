<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script defer src="js/vue/app.js"></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
</head>

<body>

    <div class="p-4">
        <div id="app">
            <p>errors: {{ $errors }}</p>
            <form action="multi-upload" method="POST">
                @csrf

                <p>
                    <input name="name" type="text" placeholder="name" value="{{ old('name', '') }}" />
                </p>

                <p>
                    </p>
                    <media-table-component name="media" :initial-value="{{ json_encode(old('media') ?? []) }}" :errors="{{ $errors }}" temp-endpoint="temp-upload"></table-component>

                <p>
                    <button>Submit</button>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
