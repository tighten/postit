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
    <div class="flex flex-col max-w-5xl mx-auto pb-8 bg-white shadow-md">
        <header class="flex py-8 justify-center">
            <h1 class="text-4xl tracking-wide font-bold leading-none">{{ config('app.name', 'PostIt') }}</h1>
        </header>

        <section x-data="dashboard({{ Js::from($targets) }}, {{ Js::from($sources) }})" class="flex justify-center mt-8">
            <div class="flex flex-col justify-around h-full">
                <table>
                    <template x-for="source in sources" :key="source.id">
                        <tbody>
                            <tr>
                                <th x-text="source.name"></th>
                                <template x-for="target in targets" :key="target.id">
                                    <th class="pr-4 text-sm" colspan="1">
                                        <a :href="target.url" :title="target.name" target="_blank" x-text="target.name"></a>
                                    </th>
                                </template>
                            </tr>
                            <template x-for="post in recentPosts(source)" :key="post.id">
                                <tr>
                                    <td class="text-right pb-4 pr-4">
                                        <a :href="post.guid" :title="post.title"
                                           class="no-underline hover:underline font-normal text-gray-600"
                                           x-text="post.title"></a>
                                        <p class="text-xs text-gray-500 uppercase"
                                           x-text="formatDate(post.published_at)"></p>
                                    </td>
                                    <template x-for="target in targets" :key="target.id">
                                        <td class="align-top">
                                            <input type="checkbox"
                                                style="transform: scale(1.25)"
                                                :checked="hasSubmission(post, target)"
                                                @change="toggleSubmission($event, post.id, target.id)">
                                        </td>
                                    </template>
                                </tr>
                            </template>
                        </tbody>
                    </template>
                </table>
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
