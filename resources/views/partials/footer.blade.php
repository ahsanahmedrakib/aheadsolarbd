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
    $footerServices = \App\Support\SiteData::services()->take(6);
@endphp

<footer class="bg-forest-700 text-white pt-0 font-sans">
    <div class="solar-container">
        <!-- FOOTER CONTACT BOXES -->
        <div class="reveal" data-variant="fade-up">
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
        </div>

        <!-- MEGA FOOTER GRID -->
        <div class="reveal" data-variant="fade-up" data-delay="100">
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
                        @include('partials.social-icons')
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
    </div>
</footer>