<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script defer src="js/react/app.js"></script>


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <script>
        window.oldValues = {!! json_encode(Session::getOldInput()) !!};
        window.errors = {!! $errors !!};
        window.tempEndpoint = 'temp-upload';
    </script>

    <div class="flex-center position-ref full-height">
        <div>
            <p>errors: {{ $errors }}</p>
            <p>old values: {{ json_encode(Session::getOldInput()) }}</p>

            <form action="single-upload" method="POST">
                @csrf

                <p>
                    <input name="name" type="text" placeholder="name" value="{{ old('name', '') }}" />
                </p>

                <!--  <p>
                    <upload-component name="media" :initial-value="{{ json_encode(old('media') ?? []) }}" :errors="{{ $errors }}" temp-endpoint="temp-upload"></upload-component>
                </p> -->

                <div id="app"></div>

                <p>
                    <button>Submit</button>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
