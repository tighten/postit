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
<body class="bg-brand-lightest font-sans font-normal">
    <div class="flex flex-col">
        <div class="min-h-screen flex items-center justify-center">
            <div class="flex flex-col justify-around h-full">
                <div>
                    <h1 class="text-center tracking-wide text-7xl mb-6">
                        {{ config('app.name', 'PostIt') }}
                    </h1>
                    <p class="mb-8">Remembering to submit our posts to all the spots</p>

                    <table>
                        @foreach ($sources as $source)
                            <tr>
                                <td><h2>{{ $source->name }}</h2></td>
                                @foreach ($targets as $target)
                                <th><a href="{{ $target['url'] }}" target="_blank">{{ $target['name'] }}</a></th>
                                @endforeach
                            </tr>
                            @foreach ($source->posts as $post)
                            <tr>
                                <td class="text-right pr-8">
                                    <a href="https://laravel.com/docs" class="no-underline hover:underline text-sm font-normal text-brand-dark">{{ $post->title }}</a>
                                </td>
                                @foreach ($targets as $target)
                                <td>
                                    <input type="checkbox">
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
