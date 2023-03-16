<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ isset($title) ? $title . ' - ' : null }}Laravel - The PHP Framework For Web Artisans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    @if (isset($canonical))
    <link rel="canonical" href="{{ url($canonical) }}">
    @endif

    <!-- Primary Meta Tags -->
    <meta name="title" content="Laravel - The PHP Framework For Web Artisans">
    <meta name="description" content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://laravel.com/">
    <meta property="og:title" content="Laravel - The PHP Framework For Web Artisans">
    <meta property="og:description" content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">
    <meta property="og:image" content="https://laravel.com/img/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://laravel.com/">
    <meta property="twitter:title" content="Laravel - The PHP Framework For Web Artisans">
    <meta property="twitter:description" content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">
    <meta property="twitter:image" content="https://laravel.com/img/og-image.jpg">

    <!-- Favicon -->
    <meta name="msapplication-TileColor" content="#ff2d20">
   
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://use.typekit.net/ins2wgm.css">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css')+'?v=time'.() }}">

    @production
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="DVMEKBYF" defer></script>
        <!-- / Fathom -->
    @endproduction
@include('partials.theme')
</head>
<body
    x-data="{
        navIsOpen: false,
        searchIsOpen: false,
        search: '',
    }"
    class="language-php h-full w-full font-sans text-gray-900 antialiased"
>

@yield('content')

@include('partials.footer')


<script>
    var algolia_app_id = '{{ config('algolia.connections.main.id', false) }}';
    var algolia_search_key = '{{ config('algolia.connections.main.search_key', false) }}';
    var version = '{{ isset($currentVersion) ? $currentVersion : DEFAULT_VERSION }}';
</script>

<script src="{{ mix('js/app.js') }}"></script>

<script>
    var _gaq=[['_setAccount','UA-23865777-1'],['_trackPageview']];
    (function(d,t){
        var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)
    }(document,'script'));
</script>
</body>
</html>