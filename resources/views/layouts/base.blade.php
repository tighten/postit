<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="m-0">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $page->description ?? 'Tighten tool to manage posts.' }}">

    <meta property="og:site_name" content="{{ config('app.name', 'PostIt') }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="{{ $page->title ?? 'PostIt' }}">
    <meta property="og:url" content="{{ config('app.url', 'http://postit.tighten.co') }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $page->description ?? 'Tighten tool to manage posts.' }}">

    <meta property="og:image" content="{{ asset('img/tighten-com-og-cover.png') }}">
    <meta property="og:image:height" content="630">
    <meta property="og:image:width" content="1200">

    <meta name="twitter:site" content="@TightenCo">
    <meta name="twitter:creator" content="@TightenCo">
    <meta name="twitter:title" content="{{ $page->title ?? 'PostIt' }}">
    <meta name="twitter:description" content="{{ $page->description ?? 'Tighten tool to manage posts.' }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ asset('img/tighten-com-og-cover.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="font-normal font-sans text-base h-full bg-primary">
<div id="app" class="flex flex-col max-w-6xl mx-auto pb-8 bg-white shadow-md">
    @yield('content')

    <footer class="border-t border-grey flex justify-center mt-8 mx-auto pt-6 w-3/4">
        <p class="mr-3 text-grey-dark">
            Brought to you by the lovely humans at
            <a class="text-yellow no-underline" href="https://tighten.co">Tighten</a>
        </p>

        <a class="text-yellow no-underline" href="https://github.com/tightenco/postit">Issues/Feature Requests</a>
    </footer>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
