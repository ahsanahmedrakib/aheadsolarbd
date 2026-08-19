<!DOCTYPE html>
<html lang="en" class="h-full antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ config('app.name') }}</title>
    <meta name="description" content="{{ $metaDescription ?? \App\Support\SiteSettings::field('seo', 'meta-desc') }}">
    @php $keywords = \App\Support\SiteSettings::field('seo', 'meta-keywords'); @endphp
    @if ($keywords)
        <meta name="keywords" content="{{ $keywords }}">
    @endif
    <link rel="icon" href="{{ url('/favicon.ico') }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:title" content="{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ config('app.name') }}">
    <meta property="og:description" content="{{ $metaDescription ?? \App\Support\SiteSettings::field('seo', 'meta-desc') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ url('/images/home/hero-bg-image.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col {{ $bodyClass ?? '' }}">

    @include('partials.navbar')

    <main class="flex-1">
        @yield('content')
    </main>

    @include('partials.marquee')
    @include('partials.footer')
    @include('partials.chat-widget')

    @stack('scripts')

</body>
</html>