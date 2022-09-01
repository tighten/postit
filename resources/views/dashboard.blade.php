@extends('layouts.base')

@section('content')
    <header class="flex py-8 justify-center text-white">
        <h1 class="text-4xl tracking-wide">{{ config('app.name', 'PostIt') }}</h1>
    </header>

    <section class="flex justify-center mt-8">
        <div class="flex flex-col justify-around h-full">
            <Dashboard v-bind:targets="{{ $targets }}" v-bind:sources="{{ $sources }}"/>
        </div>
    </section>
@endsection
