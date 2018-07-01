<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="font-sans font-normal">
    <div class="flex flex-col" id="app">
        <div class="flex items-center justify-center mt-8">
            <div class="flex flex-col justify-around h-full">
                <div>
                    <h1 class="tracking-wide text-7xl mb-6">
                        {{ config('app.name', 'PostIt') }}
                    </h1>

                    <Dashboard :targets='@json($targets)' :sources='@json($sources)'/>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
