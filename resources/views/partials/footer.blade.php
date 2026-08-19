@php
    $companyName = config('app.name');
    $tagline = \App\Support\SiteSettings::field('general', 'brand-tagline');
    $phone = \App\Support\SiteSettings::field('general', 'phone-number');
    $email = \App\Support\SiteSettings::field('general', 'contact-email');
    $address = \App\Support\SiteSettings::field('general', 'hq-address');
    $socialFb = \App\Support\SiteSettings::field('social', 'social-fb');
    $socialX = \App\Support\SiteSettings::field('social', 'social-x');
    $socialIg = \App\Support\SiteSettings::field('social', 'social-ig');
    $socialLi = \App\Support\SiteSettings::field('social', 'social-li');
    $socialYt = \App\Support\SiteSettings::field('social', 'social-youtube');
    $footerServices = \App\Models\Service::orderBy('id')->limit(5)->get();
@endphp

<footer class="bg-forest-700 text-white pt-0 font-sans">
    <div class="solar-container">
        <!-- FOOTER CONTACT BOXES -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-4 py-10 border-b border-white/20">
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-xl bg-accent-500 text-white flex items-center justify-center shrink-0 chat-idle" style="animation-delay: 0s">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                </div>
                <div>
                    <h3 class="text-xl font-heading font-bold text-white mb-1">Support &amp; Email</h3>
                    <a href="mailto:{{ $email }}" class="text-white/80 hover:text-accent-400 transition-colors text-sm">{{ $email }}</a>
                </div>
            </div>

            <div class="flex items-center gap-5 md:border-l md:border-white/20 md:pl-6">
                <div class="w-16 h-16 rounded-xl bg-accent-500 text-white flex items-center justify-center shrink-0 chat-idle" style="animation-delay: 0.5s">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </div>
                <div>
                    <h3 class="text-xl font-heading font-bold text-white mb-1">Customer Support</h3>
                    <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="text-white/80 hover:text-accent-400 transition-colors text-sm">{{ $phone }}</a>
                </div>
            </div>

            <div class="flex items-center gap-5 md:border-l md:border-white/20 md:pl-6">
                <div class="w-16 h-16 rounded-xl bg-accent-500 text-white flex items-center justify-center shrink-0 chat-idle" style="animation-delay: 1s">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <div>
                    <h3 class="text-xl font-heading font-bold text-white mb-1">Our Location</h3>
                    <p class="text-white/80 text-sm">{{ $address }}</p>
                </div>
            </div>
        </div>

        <!-- MEGA FOOTER GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pt-14 pb-10">
            <!-- BRAND COLUMN -->
            <div class="lg:col-span-5 space-y-6">
                <a href="/">
                    <img src="{{ url('/logo.svg') }}" width="160" height="48" alt="Ahead Solar logo" class="h-12 w-auto object-contain">
                </a>
                <p class="text-white/75 text-sm leading-relaxed max-w-sm">{{ $tagline }}</p>
                <div class="space-y-3">
                    <h4 class="font-heading text-lg font-bold text-white">Follow Us On Socials:</h4>
                    <div class="flex items-center gap-2">
                        @if ($socialFb)
                            <a href="{{ $socialFb }}" target="_blank" rel="noopener noreferrer" class="rounded-xl flex items-center justify-center transition-all hover:text-gold-500" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                        @endif
                        @if ($socialX)
                            <a href="{{ $socialX }}" target="_blank" rel="noopener noreferrer" class="rounded-xl flex items-center justify-center transition-all hover:text-gold-500" aria-label="X">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                        @endif
                        @if ($socialIg)
                            <a href="{{ $socialIg }}" target="_blank" rel="noopener noreferrer" class="rounded-xl flex items-center justify-center transition-all hover:text-gold-500" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                            </a>
                        @endif
                        @if ($socialLi)
                            <a href="{{ $socialLi }}" target="_blank" rel="noopener noreferrer" class="rounded-xl flex items-center justify-center transition-all hover:text-gold-500" aria-label="LinkedIn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
                            </a>
                        @endif
                        @if ($socialYt)
                            <a href="{{ $socialYt }}" target="_blank" rel="noopener noreferrer" class="rounded-xl flex items-center justify-center transition-all hover:text-gold-500" aria-label="YouTube">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- QUICK LINKS -->
            <div class="lg:col-span-3 space-y-5">
                <h3 class="font-heading text-xl font-bold text-accent-500">Quick Links</h3>
                <ul class="space-y-3">
                    @foreach ([['Home', '/'], ['About Us', '/about'], ['Services', '/services'], ['Projects', '/projects'], ['Blogs', '/blogs']] as [$label, $href])
                        <li>
                            <a href="{{ $href }}" class="relative pl-4 text-white/75 hover:text-gold-500 transition-colors text-sm before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-1.5 before:h-1.5 before:rounded-full before:bg-gold-500">
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- OUR SERVICES -->
            <div class="lg:col-span-4 space-y-5">
                <h3 class="font-heading text-xl font-bold text-accent-500">Our Services</h3>
                <ul class="space-y-3">
                    @foreach ($footerServices as $service)
                        <li>
                            <a href="{{ url('services/' . $service->slug) }}" class="relative pl-4 text-white/75 hover:text-gold-500 transition-colors text-sm before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:w-1.5 before:h-1.5 before:rounded-full before:bg-gold-500">
                                {{ $service->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- COPYRIGHT -->
        <p class="flex justify-between flex-wrap gap-3 text-sm text-white/70 mb-6">
            <span>Copyright © {{ date('Y') }} {{ $companyName }}. All rights reserved.</span>
            <span>Design &amp; Development by <a href="https://bct.com.bd/" target="_blank" class="hover:text-gold-500">Bismillah Computer &amp; Technology</a></span>
        </p>
    </div>
</footer>