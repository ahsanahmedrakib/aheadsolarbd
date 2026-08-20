@extends('layouts.app')

@section('content')
<x-page-banner title="Company" titleAccent="Profile" crumb="Company Profile" :crumb-parent="['label' => 'About Us', 'href' => '/about']" image="/images/aheadsolar/about-1.jpg" eyebrow="Who We Are" />

<section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-8 items-center">
            <div class="space-y-6 lg:col-span-7">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">Our Company</span>
                    </div>

                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            A forward-looking renewable energy company
                        </h2>
                    </div>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                        Ahead Solar Ltd. is dedicated to advancing sustainable power solutions in Bangladesh. With a strong commitment to innovation and clean energy, we provide solar power projects tailored for both industrial factories and residential homes, ensuring reliable and cost-effective green energy for diverse needs.
                    </p>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="240">
                    <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                        In addition to solar installations, we are pioneering the field of electric mobility by introducing advanced solar charging systems for three-wheeler vehicles. This initiative supports eco-friendly transportation and reduces dependency on traditional fuels.
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
                <img src="{{ url('/images/about/approach-image.jpg') }}" alt="Ahead Solar engineers reviewing solar planning on a tablet" class="absolute inset-0 w-full h-full object-cover object-center">
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-20 lg:py-25 font-sans overflow-x-hidden">
    <div class="solar-container grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-start">
        <div class="lg:col-span-6 space-y-6 lg:pr-6">
            <div class="reveal" data-variant="fade-up"><span class="section-eyebrow">What We Do</span></div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Complete solar services built for performance</h2>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed max-w-xl">
                    Our team provides end-to-end solar solutions including site assessment, custom system design, professional installation, and ongoing maintenance — backed by years of experience serving Bangladesh&apos;s top industrial sectors.
                </p>
            </div>

            <div class="space-y-4">
                @foreach ([
                    ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Rooftop Solar Solutions', 'text' => 'High-performance rooftop solar systems designed for industrial and commercial facilities.'],
                    ['icon' => 'M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25z', 'title' => 'Battery Energy Storage', 'text' => 'BESS systems that store clean energy for reliable backup and peak-shaving performance.'],
                    ['icon' => 'M4.5 12.75l6 6 9-13.5', 'title' => 'Green Energy For All', 'text' => 'Solar power for industries, homes, and the growing electric mobility sector.'],
                ] as $idx => $f)
                    <div class="reveal flex items-start gap-4 rounded-lg bg-secondary p-5 border-l-4 border-accent-500 shadow-sm transition-all duration-500 hover:shadow-md" data-variant="fade-up" data-delay="{{ $idx * 80 }}">
                        <div class="shrink-0 w-12 h-12 rounded-[18px] bg-accent-500 text-white flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}"/></svg>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-heading text-base sm:text-lg font-bold text-accent-500">{{ $f['title'] }}</h4>
                            <p class="text-xs sm:text-sm text-[#888888] leading-relaxed">{{ $f['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="lg:col-span-6 w-full space-y-4">
            <div class="reveal-image relative w-full aspect-[2.1/1] rounded-lg overflow-hidden shadow-sm bg-gray-100">
                <img src="{{ url('/images/aheadsolar/about-2.jpg') }}" alt="Workers installing solar panels on a rooftop" class="absolute inset-0 w-full h-full object-cover">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="reveal-image relative w-full aspect-[1.15/1] rounded-lg overflow-hidden shadow-sm bg-gray-100" style="transition-delay:120ms">
                    <img src="{{ url('/images/aheadsolar/project-1.jpg') }}" alt="Solar project installation" class="absolute inset-0 w-full h-full object-cover">
                </div>
                <div class="reveal w-full aspect-[1.15/1] bg-accent-500 text-white p-6 sm:p-8 rounded-lg shadow-sm flex flex-col justify-end relative overflow-hidden group" data-variant="fade-up" data-delay="220">
                    <div class="space-y-2 sm:space-y-3 z-10">
                        <h3 class="font-heading text-xl sm:text-2xl font-bold tracking-tight">24/7 Data Monitoring</h3>
                        <div class="w-full h-px bg-forest-700/20 my-1 sm:my-2"></div>
                        <p class="text-xs sm:text-sm leading-relaxed">Real-time monitoring and analysis of every solar plant to ensure peak performance.</p>
                    </div>
                </div>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="260">
                <div class="grid grid-cols-3 gap-4 sm:gap-6 border-t border-b border-gray-100 py-6 my-2 text-left">
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
</section>

<section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16 items-center">
            <div class="reveal-image relative w-full h-72 sm:h-95 lg:h-115 lg:col-span-5 rounded-lg shadow-lg" style="transition-delay:150ms">
                <img src="{{ url('/images/aheadsolar/why-1.jpg') }}" alt="Expert solar engineers team installing panels on rooftop" class="absolute inset-0 w-full h-full object-cover">
            </div>

            <div class="space-y-6 lg:col-span-7">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">Why Choose Us</span>
                    </div>
                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            One-stop rooftop solar solution provider
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ([
                        ['title' => 'Expert Engineering', 'text' => 'Certified engineers design systems tailored to your energy needs and roof structure.', 'icon' => 'M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z'],
                        ['title' => 'Quality Components', 'text' => 'We use world-class panels, inverters, and storage from trusted global brands.', 'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['title' => 'End-to-End Support', 'text' => 'From consultation and financing to installation and 24/7 monitoring after-sales.', 'icon' => 'M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z'],
                        ['title' => 'Sustainable Impact', 'text' => 'Every project reduces carbon footprint and contributes to a greener Bangladesh.', 'icon' => 'M12 21a9 9 0 100-18 9 9 0 000 18zm0 0a8.949 8.949 0 00-4.951-1.488A3.987 3.987 0 013 16.5M15 13.5h3v-2.25m0 0a9.009 9.009 0 00-6-8.311M17.25 11.25A9 9 0 0114 21.75'],
                    ] as $i => $f)
                        <div class="reveal flex items-start gap-4 rounded-lg border border-white/60 bg-white p-5 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md" data-variant="fade-up" data-delay="{{ $i * 70 }}">
                            <div class="shrink-0 w-11 h-11 rounded-lg bg-accent-500 text-white flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}"/></svg>
                            </div>
                            <div>
                                <h4 class="font-heading text-base font-bold text-accent-500">{{ $f['title'] }}</h4>
                                <p class="mt-1 text-xs sm:text-sm text-[#888888] leading-relaxed">{{ $f['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative w-full bg-white px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container text-center">
        <div class="reveal" data-variant="fade-up">
            <span class="section-eyebrow">Get In Touch</span>
        </div>
        <div class="reveal" data-variant="fade-up" data-delay="100">
            <h2 class="mx-auto mt-4 max-w-2xl font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                Let&apos;s build your clean energy future together
            </h2>
        </div>
        <div class="reveal" data-variant="fade-up" data-delay="180">
            <a href="/contact" class="btn-brand group mt-8 inline-flex">
                Talk To Our Experts
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection