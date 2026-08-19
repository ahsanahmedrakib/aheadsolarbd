@props([
    'title' => '',
    'titleAccent' => null,
    'crumb' => '',
    'crumbParent' => null,
    'image' => '/images/aheadsolar/banner.jpg',
    'eyebrow' => null,
])

<section class="relative w-full h-65 sm:h-80 lg:h-100 flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat kenburns-active" style="background-image:url('{{ $image }}')"></div>
    <div class="absolute inset-0 bg-linear-to-r from-forest-900/45 via-forest-900/30 to-forest-900/20"></div>
    <div class="absolute inset-0 bg-forest-900/20"></div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto flex flex-col items-center justify-center h-full pt-6 text-gold-500">
        @if ($eyebrow)
            <div class="reveal" data-variant="fade-down" style="transition-duration:800ms">
                <span class="section-eyebrow mb-3">{{ $eyebrow }}</span>
            </div>
        @endif

        <div class="reveal" data-variant="fade-down" style="transition-duration:800ms">
            <h1 class="font-heading text-4xl sm:text-5xl lg:text-[64px] font-bold text-white uppercase tracking-tight drop-shadow-sm mb-3 sm:mb-4">
                {{ $title }}
                @if ($titleAccent)
                    <span class="text-accent-500">{{ $titleAccent }}</span>
                @endif
            </h1>
        </div>

        <div class="reveal" data-variant="fade-up" style="transition-delay:180ms;transition-duration:800ms">
            <nav class="flex items-center space-x-2 text-sm sm:text-base font-semibold drop-shadow-sm">
                <a href="/" class="text-white/70 hover:text-accent-400 transition-colors duration-200 tracking-wide">Home</a>
                <span class="text-accent-500 font-medium select-none">/</span>
                @if ($crumbParent)
                    <a href="{{ $crumbParent['href'] }}" class="text-white/70 hover:text-accent-400 transition-colors duration-200 tracking-wide">{{ $crumbParent['label'] }}</a>
                    <span class="text-accent-500 font-medium select-none">/</span>
                @endif
                <span class="text-white tracking-wide">{{ $crumb }}</span>
            </nav>
        </div>

        <div class="reveal" data-variant="scale" style="transition-delay:320ms;transition-duration:700ms">
            <div class="mt-5 h-1 w-16 rounded-full bg-accent-500"></div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 h-px bg-white/10"></div>
</section>