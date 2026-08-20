@extends('layouts.app')

@section('content')
<x-page-banner title="About" titleAccent="Us" crumb="About Us" image="/images/aheadsolar/banner.jpg" />

<section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-8 items-center">
            <div class="space-y-6 lg:col-span-7">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">Our Approach</span>
                    </div>

                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            Turning your clean energy vision <br class="hidden sm:inline"> into reality
                        </h2>
                    </div>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                        We guide you through every step of your solar journey &ndash; from understanding your energy needs and designing the right system to expert installation and ongoing support. Our approach focuses on smart planning, quality components, and reliable execution.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 pt-4 sm:grid-cols-3">
                    <div class="reveal rounded-lg border border-white/60 bg-white p-6 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md" data-variant="fade-up" data-delay="0">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-accent-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                        </div>
                        <h3 class="font-heading mt-6 text-lg font-bold text-accent-500">Our Mission</h3>
                        <p class="mt-3 text-xs leading-relaxed text-[#888888] sm:text-sm">Replace All The Diesel Generators with Rooftop Solar and BESS Fusion System.</p>
                    </div>

                    <div class="reveal rounded-lg border border-white/60 bg-white p-6 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md" data-variant="fade-up" data-delay="120">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-accent-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.6 9h16.8M3.6 15h16.8M12 3a15.3 15.3 0 014 9 15.3 15.3 0 01-4 9 15.3 15.3 0 01-4-9 15.3 15.3 0 014-9z"/></svg>
                        </div>
                        <h3 class="font-heading mt-6 text-lg font-bold text-accent-500">Our Vision</h3>
                        <p class="mt-3 text-xs leading-relaxed text-[#888888] sm:text-sm">Let Sunshine Become The New Electricity in Bangladesh.</p>
                    </div>

                    <div class="reveal rounded-lg border border-white/60 bg-white p-6 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md" data-variant="fade-up" data-delay="240">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-accent-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                        </div>
                        <h3 class="font-heading mt-6 text-lg font-bold text-accent-500">Our Values</h3>
                        <p class="mt-3 text-xs leading-relaxed text-[#888888] sm:text-sm">We are dedicated to creating profits and giving back to society with sunshine.</p>
                    </div>
                </div>
            </div>

            <div class="reveal-image relative w-full h-87.5 sm:h-112.5 lg:h-137.5 lg:col-span-5 rounded-lg shadow-lg" style="transition-delay:150ms">
                <img src="{{ url('/images/aheadsolar/approach.jpg') }}" alt="Engineers reviewing solar planning on a tablet" class="absolute inset-0 w-full h-full object-cover object-center">
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-20 lg:py-25 font-sans overflow-x-hidden">
    <div class="solar-container grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-start">
        <div class="lg:col-span-6 space-y-6 lg:pr-6">
            <div class="reveal" data-variant="fade-up"><span class="section-eyebrow">Why Choose Us</span></div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">One-stop rooftop solar solution provider for industries</h2>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed max-w-xl">
                    We deliver complete solar solutions — from system design and engineering to installation and ongoing maintenance — backed by 06+ years of experience serving Bangladesh&apos;s top industrial sectors.
                </p>
            </div>

            <div class="reveal" data-variant="fade-up" data-delay="240">
                <div class="relative bg-secondary rounded-lg p-5 sm:p-6 border-l-4 border-accent-500 flex gap-4 items-start shadow-sm transition-all duration-500 hover:shadow-md group">
                    <div class="shrink-0 w-12 h-12 rounded-[18px] bg-accent-500 text-accent-500 flex items-center justify-center transition-transform duration-500 group-hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.864 16.5a4.5 4.5 0 005.322-.024m0 0a4.5 4.5 0 005.322-6.104m-5.322 6.128a4.5 4.5 0 01-5.322-6.128m5.322 6.128v4.5m0-9.75a4.5 4.5 0 00-.001 9.001M12 3v3.75m0 9.75V21m0-12a3 3 0 110-6 3 3 0 010 6z"/></svg>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-heading text-base sm:text-lg font-bold text-accent-500">Flexible CapEx &amp; OpEx Models</h4>
                        <p class="text-xs sm:text-sm text-[#888888] leading-relaxed">Choose to own your system with our CapEx model or start saving from day one with our OpEx model — we provide the right financial and technical solution for every business.</p>
                    </div>
                </div>
            </div>

            <div class="reveal" data-variant="fade-up" data-delay="200">
                <div class="border-t border-b border-gray-100 py-6 my-8">
                    <div class="grid grid-cols-3 gap-4 sm:gap-6 text-left">
                        <div>
                            <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">52MWp</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Largest Rooftop Project</p>
                        </div>
                        <div class="border-l border-gray-200 pl-4 sm:pl-6">
                            <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">30GWh</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Green Energy Per Year</p>
                        </div>
                        <div class="border-l border-gray-200 pl-4 sm:pl-6">
                            <h3 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">06+</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Years In Solar Business</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-6 w-full space-y-4">
            <div class="reveal-image relative w-full aspect-[2.1/1] rounded-lg overflow-hidden shadow-sm bg-gray-100">
                <img src="{{ url('/images/aheadsolar/why-1.jpg') }}" alt="Expert solar engineers team installing panels on rooftop" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute bottom-3 left-3 right-3 flex flex-wrap gap-2 z-10">
                    @foreach (['Solar Systems', 'Green Energy', 'Residential Solar', 'Solar Installation'] as $idx => $label)
                        <span class="text-[9px] sm:text-[11px] font-medium text-white px-2.5 py-1 rounded-md backdrop-blur-md bg-black/30 whitespace-nowrap {{ $idx > 1 ? 'hidden sm:inline-block' : '' }}">{{ $label }}</span>
                    @endforeach
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="reveal-image relative w-full aspect-[1.15/1] sm:aspect-[0.9/1] rounded-lg overflow-hidden shadow-sm bg-gray-100" style="transition-delay:120ms">
                    <img src="{{ url('/images/aheadsolar/why-2.jpg') }}" alt="Solar engineer inspecting photovoltaic panels" class="absolute inset-0 w-full h-full object-cover">
                </div>
                <div class="reveal w-full aspect-[1.15/1] sm:aspect-[0.9/1] bg-accent-500 text-white p-6 sm:p-8 rounded-lg shadow-sm flex flex-col justify-end relative overflow-hidden group" data-variant="fade-up" data-delay="220">
                    <div class="absolute top-6 left-6 w-20 h-20 sm:w-24 sm:h-24 md:w-30 md:h-30 opacity-95 transition-transform duration-500 group-hover:scale-110">
                        <img src="{{ url('/images/home/why-choose-info-image.png') }}" alt="Solar engineer" class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-2 sm:space-y-3 z-10">
                        <h3 class="font-heading text-xl sm:text-2xl font-bold tracking-tight">24/7 Data Monitoring</h3>
                        <div class="w-full h-px bg-forest-700/20 my-1 sm:my-2"></div>
                        <p class="text-xs sm:text-sm leading-relaxed">Real-time monitoring and analysis of every solar plant to ensure peak performance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16 items-start">
            <div class="space-y-8 lg:col-span-6">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">What We Do</span>
                    </div>

                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            Complete solar services built for performance
                        </h2>
                    </div>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="200">
                    <p class="text-sm leading-relaxed text-[#888888] sm:text-base max-w-xl">
                        Our team provides end-to-end solar solutions including site assessment, custom system design, professional installation, and ongoing maintenance.
                    </p>
                </div>

                <div class="reveal-image relative w-full h-60 sm:h-85 overflow-hidden rounded-lg shadow-md" style="transition-delay:250ms">
                    <img src="{{ url('/images/aheadsolar/what.jpg') }}" alt="Engineers looking at a laptop in front of wind turbines" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-102">
                </div>
            </div>

            <div class="space-y-8 lg:col-span-6 lg:mt-4">
                <div class="reveal-image relative w-full h-60 sm:h-85 overflow-hidden rounded-lg shadow-md" style="transition-delay:150ms">
                    <img src="{{ url('/images/aheadsolar/about-2.jpg') }}" alt="Workers installing solar panels on a rooftop" class="absolute inset-0 w-full h-full object-cover">
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="220">
                    <div class="border-b border-gray-200 pb-8 grid grid-cols-1 gap-6 sm:grid-cols-12 items-center">
                        <div class="flex items-start gap-4 sm:col-span-8">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-[18px] bg-accent-500 text-white shadow-sm">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-5 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                            </div>
                            <div>
                                <h4 class="font-heading text-base font-bold text-accent-500">Complete Solar Solutions</h4>
                                <p class="mt-1 text-sm text-[#888888] leading-normal">We provide end-to-end solar services from site assessment &amp; system design.</p>
                            </div>
                        </div>

                        <div class="hidden sm:block h-12 w-px bg-gray-200 sm:col-span-1 justify-self-center"></div>

                        <div class="sm:col-span-3 space-y-1">
                            <div class="flex items-baseline gap-1">
                                <span class="font-heading text-2xl font-bold tracking-tight text-accent-500">4.9</span>
                                <span class="text-xs font-semibold text-[#888888]">/5.0</span>
                                <span class="ml-1 text-accent-500">★</span>
                            </div>
                            <p class="text-xs font-medium text-[#888888] leading-tight">Average Website Ratings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative w-full bg-white px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 lg:gap-12 items-end mb-16">
            <div class="lg:col-span-7 space-y-4">
                <div class="reveal" data-variant="fade-up">
                    <span class="section-eyebrow">Our Expert Team</span>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                        Skilled professional powering your clean energy future<span class="text-accent-500">.</span>
                    </h2>
                </div>
            </div>

            <div class="lg:col-span-5 space-y-6 lg:pl-4">
                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="text-sm leading-relaxed text-[#888888] sm:text-base">
                        Our team of experienced engineers, technicians, and energy specialists work together to design, install, and maintain solar systems.
                    </p>
                </div>
            </div>
        </div>

        <div class="reveal" data-variant="fade-up" data-delay="150">
            <div class="team-swiper swiper-dots pb-12" data-swiper data-loop="true" data-delay="3000" data-slides="1" data-breakpoints='{"640":2,"1024":3}'>
                <div class="swiper-wrapper">
                    @foreach ($team as $i => $member)
                        @php $links = collect($member->social_links ?? [])->filter(); @endphp
                        <div class="swiper-slide h-auto">
                            <div class="group flex h-full flex-col overflow-hidden rounded-lg bg-secondary border border-accent-500 transition-all duration-300 hover:shadow-md">
                                <div class="relative aspect-4/3 w-full overflow-hidden p-4 pb-0">
                                    <div class="relative h-full w-full overflow-hidden rounded-lg">
                                        <img src="{{ $member->image }}" alt="{{ $member->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    </div>
                                </div>

                                <div class="flex flex-col items-center text-center px-6 py-8">
                                    <h3 class="font-heading text-xl font-bold text-accent-500">{{ $member->name }}</h3>
                                    <p class="mt-1 text-sm text-[#888888] font-medium">{{ $member->role }}</p>

                                    <div class="mt-6 flex min-h-16 w-full items-center justify-center gap-3 pt-6 {{ $links->isNotEmpty() ? 'border-t border-forest-700/10' : '' }}">
                                        @foreach ($links as $key => $url)
                                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center transition-transform duration-300 hover:scale-110" aria-label="{{ ucfirst($key) }}">
                                                @switch($key)
                                                    @case('facebook')
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#1877F2"/><path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z" fill="#ffffff"/></svg>
                                                        @break
                                                    @case('instagram')
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#E4405F"/><g transform="translate(3,3) scale(0.75)"><rect x="3" y="3" width="18" height="18" rx="5" stroke="#ffffff" stroke-width="2.5" stroke-linejoin="round" fill="none"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" stroke="#ffffff" stroke-width="2.5" fill="none"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round"/></g></svg>
                                                        @break
                                                    @case('x')
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#000000"/><g transform="translate(3,3) scale(0.75)"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.847h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.806l5.38 7.12 6.715-7.12zM17.61 20.644h2.039L6.486 3.24H4.298L17.61 20.644z" fill="#ffffff"/></g></svg>
                                                        @break
                                                    @case('linkedin')
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#0A66C2"/><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.854 0-2.137 1.446-2.137 2.94v5.666H9.351V9.358h3.414v1.513h.048c.475-.9 1.633-1.85 3.36-1.85 3.593 0 4.256 2.363 4.256 5.437v5.994zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9.358h3.564v11.094z" fill="#ffffff"/></svg>
                                                        @break
                                                    @case('youtube')
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><rect width="24" height="24" rx="3" fill="#FF0000"/><g transform="translate(3,3) scale(0.75)"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" fill="#ffffff"/></g></svg>
                                                        @break
                                                @endswitch
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[data-review-open]").forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            var modal = document.getElementById("write-review");
            modal.classList.remove("hidden");
            modal.classList.add("flex");
            document.body.style.overflow = "hidden";
        });
    });
    document.querySelectorAll("[data-review-close]").forEach(function (el) {
        el.addEventListener("click", function () {
            var modal = document.getElementById("write-review");
            modal.classList.add("hidden");
            modal.classList.remove("flex");
            document.body.style.overflow = "";
        });
    });
});
</script>
@endpush