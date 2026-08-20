@php
    $email = \App\Support\SiteSettings::field('general', 'contact-email');
    $phone = \App\Support\SiteSettings::field('general', 'phone-number');
    $socialFb = \App\Support\SiteSettings::field('social', 'social-fb');
    $socialX = \App\Support\SiteSettings::field('social', 'social-x');
    $socialIg = \App\Support\SiteSettings::field('social', 'social-ig');
    $socialLi = \App\Support\SiteSettings::field('social', 'social-li');
    $socialYt = \App\Support\SiteSettings::field('social', 'social-youtube');
@endphp

<!-- 1. TOPBAR -->
<div class="bg-forest-700 text-white/90 text-sm">
    <div class="solar-container flex justify-between items-center py-3">
        <div class="flex items-center flex-wrap gap-2 sm:gap-4">
            <a href="mailto:{{ $email }}" class="inline-flex items-center gap-2 hover:text-gold-400 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gold-500"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                <span>{{ $email }}</span>
            </a>
            <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="inline-flex items-center gap-2 hover:text-gold-400 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gold-500"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span>{{ $phone }}</span>
            </a>
        </div>

        <!-- <div class="flex items-center gap-1">
            @include('partials.social-icons')
        </div> -->
    </div>
</div>

<!-- 2. STICKY NAVBAR -->
<header data-navbar class="sticky top-0 z-50 transition-all duration-300 nav-animate">
    <div class="solar-container">
        <div data-navbar-inner class="flex bg-white items-center justify-between gap-2 sm:gap-6 px-2 transition-all duration-300 py-2 my-1.5 rounded-lg shadow-md shadow-forest-900/5">
            <!-- LOGO -->
            <a href="/" class="shrink-0 flex items-center">
                <img src="{{ url('/logo.svg') }}" width="160" height="46" alt="Ahead Solar logo" class="h-7.5 sm:h-11 w-auto object-contain">
            </a>

            <!-- DESKTOP NAVIGATION -->
            <nav class="hidden lg:flex items-center gap-1 font-medium">
                @php
                    $navItems = [
                        ['label' => 'Home', 'href' => '/', 'match' => ['/', '/home']],
                        ['label' => 'About', 
                            'children' => [
                                ['label' => 'About Us', 'href' => '/about'],
                                ['label' => 'Company Profile', 'href' => '/about/company-profile'],
                                ['label' => 'Sister Concern', 'href' => '/about/sister-concern'],
                                ['label' => "MD's Message", 'href' => '/about/md-message'],
                                ['label' => 'Our Management', 'href' => '/about/our-management'],
                            ],
                             'match' => ['/about', '/about/*'],
                        ],
                        [
                            'label' => 'Solution',
                            'children' => [
                                ['label' => 'CAPEX', 'href' => '/solutions/capex'],
                                ['label' => 'OPEX', 'href' => '/solutions/opex'],
                                ['label' => 'BOT', 'href' => '/solutions/bot'],
                                ['label' => 'Comparison', 'href' => '/solutions/comparison'],
                            ],
                            'match' => ['/solutions/*'],
                        ],
                        ['label' => 'Services', 'href' => '/services', 'match' => ['/services', 'services/*']],
                        ['label' => 'Projects', 'href' => '/projects', 'match' => ['/projects', 'projects/*']],
                        ['label' => 'Contact', 'href' => '/contact', 'match' => ['/contact']],
                    ];
                    $current = request()->path();
                @endphp
                @foreach ($navItems as $item)
                    @php
                        $active = false;
                        foreach ($item['match'] ?? [] as $m) {
                            if (request()->is($m === '/' ? '/' : ltrim($m, '/'))) { $active = true; break; }
                        }
                    @endphp
                    <div class="relative group">
                        @if (!empty($item['children']))
                            <button type="button" class="nav-link-sweep py-1.25 px-3 rounded-full transition-colors inline-flex items-center gap-1 cursor-pointer {{ $active ? 'text-accent-500 nav-link-active' : 'text-accent-500 hover:text-gold-500' }}">
                                {{ $item['label'] }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:rotate-180"><path d="m6 9 6 6 6-6"/></svg>
                            </button>
                            <div class="absolute left-0 top-full pt-3 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300">
                                <div class="bg-white rounded-xl shadow-xl shadow-forest-900/10 border border-gray-100 py-2 min-w-48 overflow-hidden">
                                    @foreach ($item['children'] as $child)
                                        <a href="{{ $child['href'] }}" class="block px-4 py-2.5 text-sm transition-colors {{ request()->is(ltrim($child['href'], '/')) ? 'text-gold-500 bg-secondary' : 'text-accent-500 hover:text-gold-500 hover:bg-secondary' }}">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $item['href'] }}" class="nav-link-sweep py-2 px-3 rounded-full transition-colors {{ $active ? 'text-accent-500 nav-link-active' : 'text-accent-500 hover:text-gold-500' }}">
                                {{ $item['label'] }}
                            </a>
                        @endif
                    </div>
                @endforeach
            </nav>

            <div class="flex gap-2">
                <a href="/palash-charging-station" class="border-2 rounded-lg border-accent-500 mr-0 lg:mr-2.25">
                    <img src="{{ url('/images/palash/logo-palash.png') }}" alt="Palash" height="40" width="70" class="p-2">
                </a>

                <button type="button" data-mobile-menu-btn class="lg:hidden text-accent-500 p-2" aria-label="Toggle menu">
                    <svg data-menu-open-icon xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    <svg data-menu-close-icon xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- 3. MOBILE MENU -->
        <div data-mobile-menu class="lg:hidden absolute left-0 right-0 top-full bg-secondary shadow-xl z-40 border-t border-forest-700/10 max-h-[calc(100dvh-64px)] overflow-y-auto overscroll-contain hidden">
            <div class="solar-container">
                <nav class="flex flex-col py-4 font-medium text-accent-500">
                    @foreach ($navItems as $item)
                        @php
                            $active = false;
                            foreach ($item['match'] ?? [] as $m) {
                                if (request()->is($m === '/' ? '/' : ltrim($m, '/'))) { $active = true; break; }
                            }
                        @endphp
                        <div>
                            @if (!empty($item['children']))
                                <button type="button" data-submenu-toggle class="w-full flex items-center justify-between py-3 border-b border-gray-100 cursor-pointer {{ $active ? 'text-gold-500' : 'hover:text-gold-500' }}">
                                    {{ $item['label'] }}
                                    <svg data-submenu-chevron xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300"><path d="m6 9 6 6 6-6"/></svg>
                                </button>
                                <div class="grid transition-all duration-300 ease-in-out grid-rows-[0fr] opacity-0">
                                    <div class="overflow-hidden">
                                        @foreach ($item['children'] as $child)
                                            <a href="{{ $child['href'] }}" class="block pl-6 py-3 border-b border-gray-100 text-sm {{ request()->is(ltrim($child['href'], '/')) ? 'text-gold-500' : 'hover:text-gold-500' }}">
                                                {{ $child['label'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ $item['href'] }}" class="py-3 border-b border-gray-100 block {{ $active ? 'text-gold-500' : 'hover:text-gold-500' }}">
                                    {{ $item['label'] }}
                                </a>
                            @endif
                        </div>
                    @endforeach
                </nav>
            </div>
        </div>
    </div>
</header>