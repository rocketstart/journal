<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="@yield('page-meta-description', 'Every rocket has its own story')">
    <meta name="author" content="Rocketstart">

    <title>@yield('title', 'Home') | Rocketstart Journal</title>

    <!-- Fonts -->
    <script src="https://use.typekit.net/vis0vov.js"></script>
    <script>try {
            Typekit.load({async: true});
        } catch (e) {
        }</script>


    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body>

@include('flash::message')

@include('includes.navigation')

@if(!\Request::is('posts/create'))
    @include('includes.header')
@endif

<main class="content">
    @yield('content')

</main>

@if(\Request::is('/'))
    @include('includes.newsletter')
@endif

@include('includes.footer')

<!-- workaround -->
<script src="//cdn.jsdelivr.net/medium-editor/latest/js/medium-editor.min.js"></script>

<script src="{{ elixir('js/app.js') }}"></script>
<script src="{{ elixir('js/lib.js') }}"></script>

</body>

</html>



