<!DOCTYPE html>
<html lang="en" class="h-full antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ config('app.name') }} Admin</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="{{ url('/favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-layout-root">
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="flex items-center justify-center py-2">
                <a href="/">
                    <img src="{{ url('/logo.svg') }}" width="160" height="50" alt="Admin logo" class="h-10 w-auto object-contain">
                </a>
            </div>

            <nav class="sidebar-nav">
                @php
                    $nav = [
                        'Main Menu' => [
                            ['title' => 'Dashboard', 'href' => '/admin', 'match' => '/admin'],
                            ['title' => 'Services', 'href' => '/admin/services', 'match' => '/admin/services'],
                            ['title' => 'Projects', 'href' => '/admin/projects', 'match' => '/admin/projects'],
                            ['title' => 'Team', 'href' => '/admin/team', 'match' => '/admin/team'],
                            ['title' => 'Hero Slider', 'href' => '/admin/hero-slider', 'match' => '/admin/hero-slider'],
                            ['title' => 'Contact Queries', 'href' => '/admin/contact', 'match' => '/admin/contact'],
                            ['title' => 'Palash Applications', 'href' => '/admin/palash-applications', 'match' => '/admin/palash-applications'],
                            ['title' => 'Reviews', 'href' => '/admin/reviews', 'match' => '/admin/reviews'],
                            ['title' => 'Users', 'href' => '/admin/users', 'match' => '/admin/users'],
                        ],
                        'Support' => [
                            ['title' => 'Settings', 'href' => '/admin/settings', 'match' => '/admin/settings'],
                        ],
                    ];
                    $current = request()->path();
                @endphp
                @foreach ($nav as $label => $items)
                    <div class="sidebar-section">
                        <p class="sidebar-section-label">{{ $label }}</p>
                        <ul class="sidebar-nav-list">
                            @foreach ($items as $item)
                                @php $active = $current === trim($item['match'], '/'); @endphp
                                <li>
                                    <a href="{{ $item['href'] }}" class="sidebar-nav-item {{ $active ? 'active' : '' }}">
                                        <span class="sidebar-nav-label">{{ $item['title'] }}</span>
                                        @if ($active)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="sidebar-nav-arrow"><path d="m9 18 6-6-6-6"/></svg>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </nav>

            <div class="sidebar-user flex justify-between items-center">
                <div class="flex gap-2 items-center">
                    <div class="sidebar-user-avatar">
                        <span>{{ auth()->user()?->name ? mb_substr(auth()->user()->name, 0, 1) : 'A' }}</span>
                    </div>
                    <div class="sidebar-user-info">
                        <p class="sidebar-user-name">{{ auth()->user()?->name ?? 'Admin' }}</p>
                        <p class="sidebar-user-role">Admin</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-(--admin-text-muted) hover:text-(--admin-danger) transition cursor-pointer" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-500"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                    </button>
                </form>
            </div>
        </aside>

        <div class="admin-main">
            <header class="admin-header min-h-15">
                <div class="admin-header-left">
                    <button class="admin-header-menu-btn" aria-label="Toggle menu" data-admin-menu-btn>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </button>
                    <div>
                        <h1 class="admin-header-title">{{ $pageTitle ?? 'Dashboard' }}</h1>
                        <p class="admin-header-breadcrumb">Home / {{ $pageTitle ?? 'Dashboard' }}</p>
                    </div>
                </div>
                <div class="admin-header-right">
                    <div class="flex items-center gap-3">
                        <div class="text-right hidden sm:block">
                            <p class="text-xs font-semibold text-(--admin-text-primary)">{{ auth()->user()?->name }}</p>
                            <p class="text-[10px] text-(--admin-text-muted) capitalize">Admin</p>
                        </div>
                        <div class="admin-header-avatar">
                            <span>{{ auth()->user()?->name ? mb_substr(auth()->user()->name, 0, 1) : 'A' }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-(--admin-text-muted) hover:text-(--admin-danger) transition p-1.5 cursor-pointer" title="Logout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="admin-page">
                @if (session('success'))
                    <div data-toast class="mb-4 rounded-lg px-4 py-3 text-sm font-medium text-emerald-900 bg-emerald-100 border border-emerald-200 flex items-center justify-between">
                        <span>{{ session('success') }}</span>
                        <button type="button" data-toast-close class="ml-4 text-emerald-900/60 hover:text-emerald-900 cursor-pointer">✕</button>
                    </div>
                @endif
                @if (session('error'))
                    <div data-toast class="mb-4 rounded-lg px-4 py-3 text-sm font-medium text-red-900 bg-red-100 border border-red-200 flex items-center justify-between">
                        <span>{{ session('error') }}</span>
                        <button type="button" data-toast-close class="ml-4 text-red-900/60 hover:text-red-900 cursor-pointer">✕</button>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var btn = document.querySelector("[data-admin-menu-btn]");
        var sidebar = document.querySelector(".admin-sidebar");
        btn?.addEventListener("click", function () {
            sidebar?.classList.toggle("admin-sidebar-open");
        });
    });
    </script>

    @stack('scripts')
</body>
</html>