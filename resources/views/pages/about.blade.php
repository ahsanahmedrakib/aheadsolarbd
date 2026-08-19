@extends('layouts.app')

@section('content')
<x-page-banner title="About Us" crumb="About Us" image="/images/aheadsolar/banner.jpg" />

<section class="bg-white py-20 lg:py-25 font-sans relative">
    <div class="solar-container grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
        <div class="relative w-full max-w-135 mx-auto aspect-[0.92/1] lg:col-span-6 order-2 lg:order-1 mt-12 lg:mt-0 select-none">
            <div class="absolute top-6 right-4 sm:right-8 z-30 w-28 h-28 sm:w-32 sm:h-32 hidden sm:block select-none">
                <div class="w-full h-full relative animate-[spin_18s_linear_infinite]">
                    <svg viewBox="0 0 100 100" class="w-full h-full">
                        <defs>
                            <path id="rot-path" d="M 50,50 m -38,0 a 38,38 0 1,1 76,0 a 38,38 0 1,1 -76,0" fill="none"></path>
                        </defs>
                        <circle cx="50" cy="50" r="48" class="fill-forest-700/90"></circle>
                        <text class="text-[8.5px] font-bold fill-white tracking-[2.4px] uppercase">
                            <textPath href="#rot-path" startOffset="0" textAnchor="start">Ahead Solar Ltd&nbsp;&bull;&nbsp;Sunshine To Electricity&nbsp;&bull;&nbsp;</textPath>
                        </text>
                    </svg>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-12 h-12 rounded-full bg-accent-600 text-white flex items-center justify-center shadow-lg border-2 border-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                    </div>
                </div>
            </div>

            <div class="reveal-image absolute top-0 left-0 w-[70%] h-[64%] rounded-xl overflow-hidden shadow-sm">
                <img src="{{ url('/images/aheadsolar/about-1.jpg') }}" alt="Team discussing clean energy" class="absolute inset-0 w-full h-full object-cover">
            </div>

            <div class="reveal absolute bottom-0 left-0 w-[42%] aspect-[1/.85] flex flex-col justify-center items-center bg-forest-700 text-white p-4 rounded-lg shadow-md text-center z-20" data-variant="fade-up" data-delay="200">
                <div class="animate-float flex flex-col items-center">
                    <h3 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight mb-1 text-white">06+</h3>
                    <p class="text-xs sm:text-sm text-white/70 font-semibold leading-snug">Years In<br>Solar Business</p>
                </div>
            </div>

            <div class="reveal-image absolute bottom-0 right-0 w-[56%] h-[74%] rounded-xl overflow-hidden shadow-2xl border-4 sm:border-8 border-white z-10" style="transition-delay:150ms">
                <img src="{{ url('/images/aheadsolar/about-2.jpg') }}" alt="Engineers walking on site" class="absolute inset-0 w-full h-full object-cover">
            </div>
        </div>

        <div class="lg:col-span-6 lg:pl-10 space-y-6 order-1 lg:order-2">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">About Ahead Solar Ltd.</span>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Pioneering Bangladesh&apos;s energy revolution</h2>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed max-w-xl">
                    At Ahead Solar Ltd., we are pioneering Bangladesh&apos;s energy revolution. We specialize in advanced commercial and industrial energy storage solutions, primarily focusing on Rooftop Solar and BESS (Battery Energy Storage System) fusion systems. Driven by our mission to replace all diesel generators with our solar and storage fusion systems, we are dedicated to creating profits and giving back to society with sunshine.
                </p>
            </div>

            <hr class="border-gray-100 my-6">

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 items-center">
                <div class="sm:col-span-7 space-y-6">
                    @foreach ([
                        ['title' => 'R&D Driven Approach', 'text' => 'We are the only solar company focused on research and development to continuously improve system performance and adapt to evolving technology.', 'd' => 'M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5'],
                        ['title' => 'Five Milestone Firsts', 'text' => 'As an industry leader, we have achieved five milestone "firsts," including Bangladesh\'s first MW-Scale Energy Storage Project and the country\'s first BESS Assembly plant.', 'd' => 'M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21h.75a.75.75 0 0 0 .75-.75V9.375m0 0A2.25 2.25 0 0 1 9.375 7.125h5.25a2.25 2.25 0 0 1 2.25 2.25v6.375m-10.5 0V5.625a2.25 2.25 0 0 1 2.25-2.25h5.25a2.25 2.25 0 0 1 2.25 2.25v13.125'],
                        ['title' => 'First Solar 3-Wheeler Approval', 'text' => 'In the realm of sustainable mobility, we secured Bangladesh\'s first Solar 3-wheeler approval from the DNCC.', 'd' => 'M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12'],
                    ] as $i => $feature)
                        <div class="reveal flex gap-4 items-start group" data-variant="fade-up" data-delay="{{ 100 + $i * 100 }}">
                            <div class="shrink-0 w-12 h-12 rounded-[18px] bg-accent-500 text-accent-500 flex items-center justify-center shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['d'] }}"/></svg>
                            </div>
                            <div>
                                <h4 class="font-heading text-lg font-bold text-accent-500 mb-1">{{ $feature['title'] }}</h4>
                                <p class="text-xs sm:text-sm text-[#888888] leading-normal text-justify">{{ $feature['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="reveal-image sm:col-span-5 relative w-full aspect-4/3 sm:aspect-square rounded-lg overflow-hidden shadow-sm bg-gray-100" style="transition-delay:150ms">
                    <img src="{{ url('/images/aheadsolar/about-3.jpg') }}" alt="Solar fields installation" class="absolute inset-0 w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative w-full bg-white px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="flex flex-col items-center text-center max-w-3xl mx-auto mb-16">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">Our Advantages</span>
            </div>

            <div class="reveal" data-variant="fade-up" data-delay="120">
                <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-tight">
                    Smart solar benefits designed to deliver performance,
                    <span class="inline-flex items-center align-middle mx-1 h-7 w-14 sm:h-9 sm:w-20 relative rounded-full overflow-hidden border border-accent-500 shadow-sm">
                        <img src="{{ url('/images/about/advantages-title-image.jpg') }}" alt="Solar graphic illustration" class="absolute inset-0 w-full h-full object-cover">
                    </span>
                    saving, &amp; long term reliability
                </h2>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:gap-8 lg:grid-cols-3 items-stretch">
            <div class="reveal flex flex-col justify-between rounded-lg bg-secondary p-8 md:p-10 transition-all duration-300 hover:shadow-sm" data-variant="fade-up" data-delay="0">
                <div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-lg bg-accent-500 text-white shadow-sm">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    </div>

                    <div class="mt-12">
                        <span class="font-heading block text-4xl md:text-5xl font-black text-accent-500 tracking-tight">
                            <span data-counter="24" data-suffix="*7">0</span>
                        </span>
                        <span class="block mt-1 text-sm font-bold text-accent-500 tracking-wide">
                            Support Availability
                        </span>
                    </div>
                </div>

                <p class="mt-8 text-sm leading-relaxed text-[#888888] border-t border-forest-700/10 pt-6">
                    Dedicated service team to ensure smooth operation and quick assistance whenever needed.
                </p>
            </div>

            <div class="reveal-image relative min-h-80 sm:min-h-100 lg:min-h-full overflow-hidden rounded-lg shadow-sm" style="transition-delay:140ms">
                <img src="{{ url('/images/about/our-advantages-image.jpg') }}" alt="Solar energy specialists consulting on top of panels" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 hover:scale-102">
            </div>

            <div class="reveal flex flex-col justify-between rounded-lg bg-secondary p-8 md:p-10 transition-all duration-300 hover:shadow-sm" data-variant="fade-up" data-delay="280">
                <div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-lg bg-accent-500 text-white shadow-sm">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.6 9h16.8M3.6 15h16.8M12 3a15.3 15.3 0 014 9 15.3 15.3 0 01-4 9 15.3 15.3 0 01-4-9 15.3 15.3 0 014-9z"/></svg>
                    </div>

                    <div class="mt-12">
                        <span class="font-heading block text-4xl md:text-5xl font-black text-accent-500 tracking-tight">
                            <span data-counter="2000" data-suffix="+">0</span>
                        </span>
                        <span class="block mt-1 text-sm font-bold text-accent-500 tracking-wide">
                            Projects Completed
                        </span>
                    </div>
                </div>

                <p class="mt-8 text-sm leading-relaxed text-[#888888] border-t border-forest-700/10 pt-6">
                    Successfully installed solar systems across residential, commercial, and industrial areas.
                </p>
            </div>
        </div>
    </div>
</section>

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

        <div class="reveal grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3" data-variant="fade-up" data-delay="150">
            @foreach ($team as $i => $member)
                @php $links = collect($member->social_links ?? [])->filter(); @endphp
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
                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center text-forest-700 transition-colors hover:text-accent-500" aria-label="{{ ucfirst($key) }}">
                                    @switch($key)
                                        @case('facebook')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                            @break
                                        @case('instagram')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                            @break
                                        @case('x')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                            @break
                                        @case('linkedin')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
                                            @break
                                    @endswitch
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-secondary py-20 lg:py-25 px-4 sm:px-6 lg:px-8 font-sans overflow-hidden">
    <div class="solar-container">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            <div class="lg:col-span-5 space-y-6">
                <div class="reveal" data-variant="fade-up"><span class="section-eyebrow">Our Testimonials</span></div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Customers sharing their journey to solar</h2>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <a href="#write-review" class="btn-brand group" data-review-open>
                        Write A Review
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                    </a>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="240">
                    <div class="bg-white rounded-lg p-5 border border-accent-500 shadow-sm max-w-sm mt-8 space-y-3">
                        <div class="flex items-center gap-3">
                            @php $avg = $reviews->count() ? number_format($reviews->avg('rating'), 1) : '5.0'; @endphp
                            <span class="font-heading text-2xl font-extrabold text-accent-500">{{ $avg }}/5</span>
                            <div class="flex">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="relative w-8 h-8">
                                        <svg class="absolute inset-0 w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        <div class="absolute inset-0 overflow-hidden" style="width:{{ max(0, min(1, (float)$avg - $i)) * 100 }}%">
                                            <svg class="w-8 h-8 text-accent-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <p class="text-xs font-bold text-[#888888] leading-tight">1K+ Customer Trust Our Service</p>
                    </div>
                </div>
            </div>

            <div class="reveal lg:col-span-7 w-full" data-variant="fade-up" data-delay="150">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach ($reviews as $item)
                        <div class="bg-white rounded-lg mt-2 py-6 px-6 border border-accent-500 shadow-sm flex flex-col justify-between space-y-8 transition-all duration-300 hover:shadow-xl hover:-translate-y-1.5 min-h-80">
                            <div class="space-y-4">
                                <div class="flex text-accent-500">
                                    @for ($s = 0; $s < $item->rating; $s++)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-7 h-7 mr-0.5"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    @endfor
                                </div>
                                <p class="text-sm sm:text-base font-medium text-[#888888] leading-snug tracking-tight">&ldquo;{{ \Illuminate\Support\Str::limit($item->quote, 181) }}&rdquo;</p>
                            </div>
                            <div class="pt-4 border-t border-gray-100/80">
                                <h4 class="font-heading text-base font-bold text-accent-500 tracking-tight">{{ $item->name }}</h4>
                                <p class="text-xs sm:text-sm font-semibold text-[#888888] mt-0.5">{{ $item->role }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<div id="write-review" class="hidden fixed inset-0 z-50 items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" data-review-close></div>
    <div class="relative bg-white rounded-lg shadow-2xl w-full max-w-lg p-6 sm:p-8 max-h-[90vh] overflow-y-auto">
        <button type="button" data-review-close class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        <h3 class="font-heading text-xl sm:text-2xl font-bold text-accent-500 mb-1">Write A Review</h3>
        <p class="text-sm text-[#888888] mb-6">Share your experience with our solar solutions.</p>

        <form action="{{ route('reviews.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <div class="flex flex-col gap-1.5">
                <label class="text-accent-500 text-xs font-bold tracking-wide">Your Name*</label>
                <input type="text" name="name" placeholder="Enter your name" required class="w-full bg-gray-50 px-4 py-3 rounded-xl border border-gray-200 outline-none placeholder-gray-400 text-sm focus:ring-2 focus:ring-accent-600 transition-all">
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-accent-500 text-xs font-bold tracking-wide">Your Role*</label>
                <input type="text" name="role" placeholder="e.g. Home Owner, Business Owner" required class="w-full bg-gray-50 px-4 py-3 rounded-xl border border-gray-200 outline-none placeholder-gray-400 text-sm focus:ring-2 focus:ring-accent-600 transition-all">
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-accent-500 text-xs font-bold tracking-wide">Rating*</label>
                <select name="rating" class="w-full bg-gray-50 px-4 py-3 rounded-xl border border-gray-200 outline-none text-sm focus:ring-2 focus:ring-accent-600 transition-all">
                    @for ($s = 5; $s >= 1; $s--)
                        <option value="{{ $s }}">{{ $s }} Star{{ $s > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-accent-500 text-xs font-bold tracking-wide">Your Review*</label>
                <textarea name="quote" rows="4" placeholder="Share your experience..." required class="w-full bg-gray-50 px-4 py-3 rounded-xl border border-gray-200 outline-none placeholder-gray-400 text-sm resize-none focus:ring-2 focus:ring-accent-600 transition-all"></textarea>
            </div>
            <div class="mt-2">
                <button type="submit" class="w-full bg-accent-500 hover:bg-accent-600 text-secondary text-sm font-semibold px-6 py-3 rounded-2xl shadow-md transition-colors duration-200 cursor-pointer">Submit Review</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[data-review-open]").forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            var modal = document.getElementById("write-review");
            modal.classList.remove("hidden");
            document.body.style.overflow = "hidden";
        });
    });
    document.querySelectorAll("[data-review-close]").forEach(function (el) {
        el.addEventListener("click", function () {
            var modal = document.getElementById("write-review");
            modal.classList.add("hidden");
            document.body.style.overflow = "";
        });
    });
});
</script>
@endpush