<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="m-0">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite('resources/js/app.js')
</head>
<body class="font-normal font-sans">
    <div id="app" class="flex flex-col max-w-2xl mx-auto pb-8 bg-white shadow-md">
        <header class="flex py-8 justify-center">
            <h1 class="text-4xl tracking-wide">{{ config('app.name', 'PostIt') }}</h1>
        </header>

        <section class="flex justify-center mt-8">
            <div class="flex flex-col justify-around h-full">
                <Dashboard :targets="{{ json_encode($targets) }}" :sources="{{ json_encode($sources) }}"/>
            </div>
        </section>

        <footer>
            <p class="mr-3">
                Brought to you by the lovely humans at
                <a href="https://tighten.co">Tighten</a>
            </p>

            <a href="https://github.com/tightenco/postit">Issues/Feature Requests</a>
        </footer>
    </div>

</body>
</html>
