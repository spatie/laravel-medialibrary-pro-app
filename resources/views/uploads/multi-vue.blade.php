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
    <script>
        window.oldValues = @json(Session::getOldInput());
        window.errors = {!! $errors->isEmpty() ? '{}' : $errors !!};
        window.tempEndpoint = 'temp-upload';
    </script>

    <div class="p-4">
        <div id="app">
            <p>errors: {!! $errors->isEmpty() ? '{}' : $errors !!}</p>

            <form action="multi-upload" method="POST">
                @csrf

                <p>
                    <input name="name" type="text" placeholder="name" value="{{ old('name', '') }}" />
                </p>

                <form-with-table></form-with-table>

                <p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Submit</button>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
