@extends('layouts.app')

@php
    $pageTitle = 'Company Profile';
    $metaDescription =
        'Explore Ahead Solar\'s company profile - a vertically integrated solar company delivering rooftop solar, energy storage, and OPEX & CAPEX solar solutions across Bangladesh.';
@endphp

@section('content')
    <x-page-banner title="Company" titleAccent="Profile" crumb="Company Profile" :crumb-parent="['label' => 'About Us', 'href' => '/about']"
        image="/images/aheadsolar/about-1.jpg" eyebrow="Who We Are" />

    {{-- COMPANY INTRODUCTION --}}
    <section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
        <div class="solar-container">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-8 items-center">
                <div class="space-y-6 lg:col-span-7">
                    <div>
                        <div class="reveal" data-variant="fade-up">
                            <span class="section-eyebrow">Our Company</span>
                        </div>
                        <div class="reveal" data-variant="fade-up" data-delay="100">
                            <h2
                                class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                                Building a clean, reliable energy future for Bangladesh
                            </h2>
                        </div>
                    </div>

                    <div class="reveal" data-variant="fade-up" data-delay="180">
                        <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                            Ahead Solar Ltd. (ASL) was incorporated on <strong class="text-accent-500">February 14,
                                2021</strong> with registration number <strong
                                class="text-accent-500">C-168770/2021</strong>. The main business of the company is to
                            develop green energy resources — especially rooftop solar projects — across Bangladesh.
                        </p>
                    </div>

                    <div class="reveal" data-variant="fade-up" data-delay="240">
                        <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                            Meantime, we have extended our business into the distributed energy sector through energy
                            storage systems — a starfish model energy distribution system built on the comprehensive
                            utilization of lithium-ion batteries. This improves uninterrupted electricity supply for
                            industries in Bangladesh, increasing production efficiency and economic output.
                        </p>
                    </div>

                    <div class="grid grid-cols-3 gap-4 sm:gap-6 border-t border-b border-forest-700/10 py-6 text-left">
                        <div>
                            <h3
                                class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">
                                2021</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Incorporated</p>
                        </div>
                        <div class="border-l border-gray-200 pl-4 sm:pl-6">
                            <h3
                                class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">
                                08</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">Completed Projects</p>
                        </div>
                        <div class="border-l border-gray-200 pl-4 sm:pl-6">
                            <h3
                                class="font-heading text-2xl sm:text-3xl lg:text-4xl font-bold text-accent-500 tracking-tight">
                                3.5MWp</h3>
                            <p class="text-[11px] sm:text-xs text-[#888888] font-medium mt-1">EPC Capacity Installed</p>
                        </div>
                    </div>
                </div>

                <div class="reveal-image relative w-full h-87.5 sm:h-112.5 lg:h-137.5 lg:col-span-5 rounded-lg shadow-lg"
                    style="transition-delay:150ms">
                    <img src="{{ url('/images/aheadsolar/about-1.jpg') }}"
                        alt="Ahead Solar engineers reviewing solar planning on a tablet"
                        class="absolute inset-0 w-full h-full object-cover object-center">
                </div>
            </div>
        </div>
    </section>

    {{-- MARKET OPPORTUNITY --}}
    <section class="bg-white py-20 lg:py-25 font-sans overflow-x-hidden">
        <div class="solar-container">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-8 items-start">
                <div class="lg:col-span-6 space-y-6 lg:pr-6">
                    <div class="reveal" data-variant="fade-up"><span class="section-eyebrow">Market Opportunity</span></div>
                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2
                            class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">
                            A nation built for solar energy</h2>
                    </div>
                    <div class="reveal" data-variant="fade-up" data-delay="180">
                        <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed max-w-xl">
                            Carbon neutralization has become a global consensus, and the Bangladesh government actively
                            supports the development of new energy. Given the country&apos;s environment and weather
                            conditions, <strong class="text-accent-500">solar is the most suitable new energy
                                source</strong> for Bangladesh.
                        </p>
                    </div>
                    <div class="reveal" data-variant="fade-up" data-delay="240">
                        <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed max-w-xl">
                            Land scarcity makes large-scale ground projects challenging — but Bangladesh has an abundance of
                            idle industrial and commercial roofs. As one of the major textile and garment exporters, the
                            country is welcoming large numbers of Chinese companies relocating for favorable conditions.
                            These financially strong enterprises are our primary target market for rooftop solar, offering
                            relatively controllable financial risk.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-6 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ([
            ['icon' => 'M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z', 'title' => 'Green Energy Focus', 'text' => 'Solar is the most suitable new energy source given Bangladesh\'s environment and climate.'],
            ['icon' => 'M2.25 18L9 11.25l4.306 4.306a11.95 11.95 0 015.814-5.518l2.74-1.22m0 0l-5.94-2.281m5.94 2.28l-2.28 5.941', 'title' => 'Rooftop Advantage', 'text' => 'Idle industrial & commercial rooftops offer immense potential for solar development.'],
            ['icon' => 'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z', 'title' => 'Foreign Investment', 'text' => 'Relocating Chinese enterprises are a key market with strong finance and controllable risk.'],
            ['icon' => 'M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605V4.5h-3v1.5', 'title' => 'Project Scale', 'text' => 'Each first-stage project ranges from 50KW to 10MW at Chinese-invested enterprises.'],
        ] as $i => $f)
                            <div class="reveal flex items-start gap-4 rounded-lg bg-secondary p-5 border-l-4 border-accent-500 shadow-sm transition-all duration-500 hover:shadow-md"
                                data-variant="fade-up" data-delay="{{ $i * 80 }}">
                                <div
                                    class="shrink-0 w-11 h-11 rounded-lg bg-accent-500 text-white flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-heading text-base font-bold text-accent-500">{{ $f['title'] }}</h4>
                                    <p class="mt-1 text-xs sm:text-sm text-[#888888] leading-relaxed">{{ $f['text'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- LAND & FIRST PROJECTS --}}
    <section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
        <div class="solar-container">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16 items-start">
                <figure class="reveal-image w-full lg:col-span-6 rounded-lg bg-white p-3 shadow-sm border border-white/60">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div
                            class="relative w-full h-56 sm:h-72 overflow-hidden rounded-md bg-gray-100 flex items-center justify-center">
                            <img src="{{ url('/images/aheadsolar/why-1.jpg') }}"
                                alt="Rooftop solar project at Bangladesh Hardware Industry Ltd. in OPEX model - image 1"
                                class="absolute inset-0 w-full h-full object-cover object-center">
                        </div>
                        <div
                            class="relative w-full h-56 sm:h-72 overflow-hidden rounded-md bg-gray-100 flex items-center justify-center">
                            <img src="{{ url('/images/aheadsolar/project-4.jpg') }}"
                                alt="Rooftop solar project at Bangladesh Hardware Industry Ltd. in OPEX model - image 2"
                                class="absolute inset-0 w-full h-full object-cover object-center">
                        </div>
                    </div>
                    <figcaption class="pt-3 pb-1 text-center text-sm text-[#888888]">Fig 1: Rooftop solar project in the
                        roof of Bangladesh Hardware Industry Ltd. in OPEX model</figcaption>
                </figure>

                <div class="space-y-6 lg:col-span-6">
                    <div>
                        <div class="reveal" data-variant="fade-up">
                            <span class="section-eyebrow">Our First Project</span>
                        </div>
                        <div class="reveal" data-variant="fade-up" data-delay="100">
                            <h2
                                class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                                From land to landmark in Manikganj
                            </h2>
                        </div>
                    </div>

                    <div class="reveal" data-variant="fade-up" data-delay="180">
                        <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                            ASL has purchased <strong class="text-accent-500">4.23 acres of land</strong> — with ministry
                            permission for <strong class="text-accent-500">6.94 acres</strong> — at Goalkhali, Shibaloy,
                            Manikganj, located 75 kilometers west of Dhaka and adjacent to the N5 expressway. This site will
                            be gradually expanded to 30 acres.
                        </p>
                    </div>

                    <div class="reveal" data-variant="fade-up" data-delay="240">
                        <p class="max-w-2xl text-sm leading-relaxed text-[#888888] sm:text-base">
                            A steel structure building has been constructed on the site, and ASL has already rented out
                            <strong class="text-accent-500">133,637.72 sq ft</strong> to Bangladesh Hardware Industry Ltd.
                            at a rate of 4 taka/sq ft/month — generating income of BDT 534,550 per month from January 2025.
                            On the same rooftop, ASL installed a <strong class="text-accent-500">690.27KW rooftop solar
                                plant in OPEX model</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- OPEX PROJECT DETAILS --}}
    <section class="bg-white py-20 lg:py-25 font-sans overflow-x-hidden">
        <div class="solar-container">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">Project Overview</span>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2
                    class="mt-4 max-w-xl font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">
                    The numbers behind the OPEX rooftop solar project
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
                @foreach ([['value' => '690.27KW', 'label' => 'Solar Project Capacity', 'note' => 'QN Solar modules, 570Wp each'], ['value' => '862,838', 'label' => 'KWh Generated / Year', 'note' => 'Annual electricity production'], ['value' => '11tk', 'label' => 'Average Tariff / kWh', 'note' => 'Electricity bill tariff rate'], ['value' => 'BDT 9.49M', 'label' => 'Solar Income / Year', 'note' => '≈ BDT 790,934 per month']] as $i => $s)
                    <div class="reveal rounded-lg border border-white/60 bg-secondary p-6 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md"
                        data-variant="fade-up" data-delay="{{ $i * 80 }}">
                        <h3 class="font-heading text-2xl sm:text-3xl font-bold text-accent-500 tracking-tight">
                            {{ $s['value'] }}</h3>
                        <p class="mt-2 text-sm font-semibold text-forest-700">{{ $s['label'] }}</p>
                        <p class="mt-1 text-xs text-[#888888] leading-relaxed">{{ $s['note'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="reveal mt-10 rounded-lg bg-forest-700 p-6 sm:p-8 text-white flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4"
                data-variant="fade-up">
                <div>
                    <h3 class="font-heading text-lg font-bold text-accent-500">Combined Monthly Income</h3>
                    <p class="text-sm text-white/80 mt-1">Land lease (BDT 534,550) + Rooftop solar (BDT 790,934)</p>
                </div>
                <p class="font-heading text-3xl sm:text-4xl font-bold text-gold-500 whitespace-nowrap">BDT 1,325,484 <span
                        class="text-base font-medium text-white/70">/ month</span></p>
            </div>
        </div>
    </section>

    {{-- OPEX VS CAPEX --}}
    <section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
        <div class="solar-container">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-8 items-center">
                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <div class="reveal" data-variant="fade-up">
                            <span class="section-eyebrow">Business Models</span>
                        </div>
                        <div class="reveal" data-variant="fade-up" data-delay="100">
                            <h2
                                class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                                Two flexible solar models, one clean outcome
                            </h2>
                        </div>
                    </div>
                    <div class="reveal" data-variant="fade-up" data-delay="180">
                        <p class="max-w-xl text-sm leading-relaxed text-[#888888] sm:text-base">
                            According to SREDA policy, there are two models for rooftop solar projects in Bangladesh — OPEX
                            and CAPEX — giving every customer a flexible path to green energy.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach ([['badge' => 'OPEX', 'title' => 'OPEX Model', 'text' => 'The Renewable Energy Developer solely bears the entire cost of the project. The customer (factory or industry owner) pays a tariff only for the electricity consumed — with zero upfront investment.', 'icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z'], ['badge' => 'CAPEX', 'title' => 'CAPEX Model', 'text' => 'The customer (factory or industry owner) bears the entire project cost and owns the system outright — maximizing long-term savings and energy independence.', 'icon' => 'M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25']] as $i => $b)
                        <div class="reveal rounded-lg border border-white/60 bg-white p-6 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md"
                            data-variant="fade-up" data-delay="{{ $i * 120 }}">
                            <span
                                class="inline-flex items-center rounded-full bg-accent-500 text-white text-xs font-bold uppercase tracking-wider px-3 py-1">{{ $b['badge'] }}</span>
                            <div
                                class="mt-5 flex h-12 w-12 items-center justify-center rounded-lg bg-accent-500 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $b['icon'] }}" />
                                </svg>
                            </div>
                            <h3 class="font-heading mt-5 text-xl font-bold text-accent-500">{{ $b['title'] }}</h3>
                            <p class="mt-3 text-sm text-[#888888] leading-relaxed">{{ $b['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- STARFISH MODEL --}}
    <section class="bg-white py-20 lg:py-25 font-sans overflow-x-hidden">
        <div class="solar-container">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">The Starfish Model</span>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2
                    class="mt-4 max-w-3xl font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">
                    Uninterrupted power, even when the grid goes down
                </h2>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <p class="mt-6 max-w-3xl text-[#888888] text-sm sm:text-base font-normal leading-relaxed">
                    We envision a continuous, stable, uninterrupted power supply for investment enterprises built on a
                    distributed renewable energy local area network. A starfish can live normally even if one leg is broken
                    — so too, even when the national grid fails, our partner enterprises enjoy a stable and sustainable
                    power supply. The system combines rooftop solar generation, lithium battery energy storage, and an
                    energy management platform to guarantee <strong class="text-accent-500">no less than 2 hours of
                        uninterrupted power</strong>.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
                @foreach ([
            ['icon' => 'M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Energy Value', 'text' => 'Solar generation delivers strong ROI with an IRR above 20%, and can save a company more than 500 million taka in diesel costs each year.'],
            ['icon' => 'M12 3a6 6 0 016 6v7h-3v-7a3 3 0 00-6 0v7H6V9a6 6 0 016-6zM6 16h12M8 20h8', 'title' => 'Flexibility Value', 'text' => 'Adjust power output and store excess power anytime. Solar charges the battery first; on grid interruption it switches seamlessly; excess power uploads to the grid.'],
            ['icon' => 'M12 21a9 9 0 100-18 9 9 0 000 18zm0 0c-2.5 0-4.5-4-4.5-9S9.5 3 12 3M12 3c2.5 0 4.5 4 4.5 9S14.5 21 12 21', 'title' => 'Reliability Value', 'text' => 'Instantaneous seamless switching when the grid fails — response time no more than 25 milliseconds, protecting equipment and production quality.'],
            ['icon' => 'M2.25 18L9 11.25l4.306 4.306a11.95 11.95 0 015.814-5.518l2.74-1.22m0 0l-5.94-2.281m5.94 2.28l-2.28 5.941', 'title' => 'Economic Value', 'text' => 'Improves production efficiency by more than 20% for high-energy enterprises, reduces downtime losses, and lowers electricity costs.'],
            ['icon' => 'M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21', 'title' => 'National Competitiveness', 'text' => 'Scaling to 5GW across 100 EZs and 9 EPZs could cut Bangladesh\'s foreign-exchange expenditure by over US$700 million each year.'],
            ['icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z', 'title' => 'Green Environmental Value', 'text' => 'By applying for I-REC and carbon-reduction projects, the plant generates positive environmental impact from sustainable, eco-friendly practices.'],
        ] as $i => $f)
                    <div class="reveal flex items-start gap-4 rounded-lg border border-white/60 bg-secondary p-5 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md"
                        data-variant="fade-up" data-delay="{{ $i * 70 }}">
                        <div
                            class="shrink-0 w-11 h-11 rounded-lg bg-accent-500 text-white flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-heading text-base font-bold text-accent-500">{{ $f['title'] }}</h4>
                            <p class="mt-1 text-xs sm:text-sm text-[#888888] leading-relaxed">{{ $f['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROPOSED MODEL IMAGE --}}
    <section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
        <div class="solar-container">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">Forward Plans</span>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2
                    class="mt-4 max-w-3xl font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">
                    Scaling green energy across the country
                </h2>
            </div>
            <div class="reveal mt-6" data-variant="fade-up" data-delay="180">
                <p class="max-w-3xl text-[#888888] text-sm sm:text-base font-normal leading-relaxed">
                    ASL is implementing rooftop solar power demonstration projects with energy storage systems of about
                    <strong class="text-accent-500">10MWp</strong>, while continuing to secure additional land. We are
                    confident the project will be built as a business and operation model to develop and extend this green
                    energy business into different industries across Bangladesh.
                </p>
            </div>

            <div class="reveal mt-10" data-variant="fade-up" data-delay="120">
                <p class="max-w-3xl mx-auto text-[#888888] text-sm sm:text-base font-normal leading-relaxed">
                    ASL has obtained land purchase permission for <strong class="text-accent-500">6.94 acres</strong> from
                    the Manikganj DC office in the name of Ahead Solar Ltd. — the copy is attached below. In addition, more
                    than <strong class="text-accent-500">23 acres</strong> of land purchase permission are currently under
                    processing.
                </p>
            </div>

            <figure class="reveal mt-10 w-full max-w-3xl mx-auto rounded-lg bg-white p-3 shadow-sm border border-white/60"
                data-variant="fade-up" data-delay="180">
                <div
                    class="relative w-full h-full overflow-hidden rounded-md bg-gray-100 flex items-center justify-center">
                    <img src="{{ url('/images/aheadsolar/permission.jpg') }}" alt="Land purchase permission copy"
                        class="w-full h-full object-contain object-center">
                </div>
                <figcaption class="pt-3 pb-1 text-center text-sm text-[#888888]">Fig 2: Land purchase permission copy
                </figcaption>
            </figure>

            <figure class="reveal mt-10 w-full max-w-3xl mx-auto rounded-lg bg-white p-3 shadow-sm border border-white/60"
                data-variant="fade-up">
                <div
                    class="relative w-full aspect-[1.9/1] overflow-hidden rounded-md bg-gray-100 flex items-center justify-center">
                    <img src="{{ url('/images/aheadsolar/proposed.jpg') }}"
                        alt="Proposed rooftop solar project model in ASL land"
                        class="absolute inset-0 w-full h-full object-cover object-center">
                </div>
                <figcaption class="pt-3 pb-1 text-center text-sm text-[#888888]">Fig 3: Proposed rooftop solar project
                    model in ASL land</figcaption>
            </figure>

        </div>
    </section>

    {{-- 10 YEAR BUSINESS PLAN --}}
    <section class="bg-white py-20 lg:py-25 font-sans overflow-x-hidden">
        <div class="solar-container">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">Our Roadmap</span>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2
                    class="mt-4 max-w-2xl font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">
                    A 10-year strategy for exponential growth
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-12">
                @foreach ([['year' => '2024 - 25', 'cap' => '20', 'unit' => 'MW', 'label' => 'Present Capacity', 'active' => true], ['year' => '2027', 'cap' => '100', 'unit' => 'MW', 'label' => 'Mid-Term Target', 'active' => true], ['year' => '2032', 'cap' => '200', 'unit' => 'MW', 'label' => 'Long-Term Vision', 'active' => true]] as $i => $p)
                    <div class="reveal rounded-lg border {{ $i === 2 ? 'border-accent-500' : 'border-white/60' }} bg-secondary p-8 text-center shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md"
                        data-variant="fade-up" data-delay="{{ $i * 120 }}">
                        <p class="text-xs font-bold uppercase tracking-widest text-gold-500">{{ $p['year'] }}</p>
                        <p class="mt-4 font-heading text-5xl sm:text-6xl font-bold text-accent-500 tracking-tight">
                            {{ $p['cap'] }}<span class="text-3xl">{{ $p['unit'] }}</span></p>
                        <p class="mt-2 text-sm font-semibold text-forest-700">{{ $p['label'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="reveal mt-12 rounded-lg bg-forest-700 p-6 sm:p-10 text-white" data-variant="fade-up">
                <h3 class="font-heading text-xl font-bold text-accent-500">Strategy: Growth with IPO</h3>
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach ([['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Expand Capacity', 'text' => 'Expand electricity generation capacity continuously.'], ['icon' => 'M15.75 15.75l3.75 3.75M16.5 10.5a6 6 0 11-12 0 6 6 0 0112 0z', 'title' => 'Drive Innovation', 'text' => 'Utilize technology and innovation in management.'], ['icon' => 'M4.5 12.75l6 6 9-13.5', 'title' => 'Diversify Energy', 'text' => 'Enter the realm of other potential alternative renewable energy.']] as $i => $f)
                        <div class="flex items-start gap-4">
                            <div
                                class="shrink-0 w-11 h-11 rounded-lg bg-accent-500 text-white flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-heading text-base font-bold text-accent-500">{{ $f['title'] }}</h4>
                                <p class="mt-1 text-xs sm:text-sm text-white/80 leading-relaxed">{{ $f['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- COMPLETED PROJECTS TABLE --}}
    <section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
        <div class="solar-container">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">EPC Track Record</span>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2
                    class="mt-4 max-w-2xl font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">
                    Completed projects across Bangladesh
                </h2>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <p class="mt-6 max-w-3xl text-[#888888] text-sm sm:text-base font-normal leading-relaxed">
                    As an EPC, Ahead Solar Ltd. has completed various rooftop solar projects in CAPEX model. Among them, the
                    <strong class="text-accent-500">Santic Bangladesh Ltd.</strong> project is Bangladesh&apos;s first
                    <strong class="text-accent-500">Building Integrated Photovoltaic (BIPV)</strong> project — where no
                    extra roof is needed and the solar modules themselves act as the roof.
                </p>
            </div>
            <div class="reveal mt-6 max-w-3xl text-[#888888] text-sm sm:text-base font-normal leading-relaxed"
                data-variant="fade-up" data-delay="220">
                <strong class="text-accent-500">BIPV systems</strong> are dual-purpose: they serve as both the outer layer
                of a structure and generate electricity for on-site use or export to the grid. BIPV systems can provide
                savings in materials and electricity costs, reduce pollution, and add to the architectural appeal of a
                building.
            </div>

            <div class="reveal mt-8 flex flex-col sm:flex-row sm:items-center gap-4 rounded-lg bg-white p-5 border border-forest-700/10 shadow-sm"
                data-variant="fade-up">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-accent-500 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-heading text-lg font-bold text-accent-500">Santic Bangladesh Ltd. — BIPV Solar System
                    </h3>
                    <p class="mt-1 text-sm text-[#888888]">Capacity: 714.21 KW &middot; Location: Ashulia, Savar, Dhaka</p>
                </div>
                <a href="https://www.720yun.com/vr/f75jO7ywtw1" target="_blank" rel="noopener"
                    class="btn-brand group mt-4 sm:mt-0 inline-flex shrink-0">
                    View VR Tour
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1">
                        <path d="M7 17 17 7" />
                        <path d="M7 7h10v10" />
                    </svg>
                </a>
            </div>


            <figure class="reveal mt-10 w-full max-w-3xl mx-auto rounded-lg bg-white p-3 shadow-sm border border-white/60"
                data-variant="fade-up" data-delay="180">
                <div
                    class="relative w-full h-full overflow-hidden rounded-md bg-gray-100 flex items-center justify-center">
                    <img src="{{ url('/images/aheadsolar/what.jpg') }}" alt="Land purchase permission copy"
                        class="w-full h-full object-contain object-center">
                </div>
            </figure>

            <figure class="reveal mt-10 w-full max-w-3xl mx-auto rounded-lg bg-white p-3 shadow-sm border border-white/60"
                data-variant="fade-up" data-delay="180">
                <div
                    class="relative w-full h-full overflow-hidden rounded-md bg-gray-100 flex items-center justify-center">
                    <img src="{{ url('/images/aheadsolar/roof.jpg') }}" alt="Land purchase permission copy"
                        class="w-full h-full object-contain object-center">
                </div>
            </figure>

            <div class="reveal mt-10 overflow-x-auto rounded-lg shadow-sm" data-variant="fade-up">
                <table class="w-full border-collapse text-left text-sm">
                    <thead>
                        <tr style="background-color:#0c3d3b;">
                            <th class="px-4 py-3.5 font-heading font-bold"
                                style="border:1px solid #0a322f; color:#ffffff;">SL</th>
                            <th class="px-4 py-3.5 font-heading font-bold"
                                style="border:1px solid #0a322f; color:#ffffff;">Project Name</th>
                            <th class="px-4 py-3.5 font-heading font-bold"
                                style="border:1px solid #0a322f; color:#ffffff;">Location</th>
                            <th class="px-4 py-3.5 font-heading font-bold"
                                style="border:1px solid #0a322f; color:#ffffff;">Type</th>
                            <th class="px-4 py-3.5 font-heading font-bold text-right"
                                style="border:1px solid #0a322f; color:#ffffff;">Capacity (kWp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([['name' => 'IALT Rooftop Solar Project', 'loc' => 'Bhulta, Rupganj, Narayanganj', 'type' => 'BAPV', 'cap' => '435.48'], ['name' => 'Alltex Rooftop Solar Project', 'loc' => 'Barpa, Rupganj, Narayanganj', 'type' => 'BAPV', 'cap' => '300.96'], ['name' => 'Magic Rooftop Solar Project', 'loc' => 'Chandipasha, Nandail, Mymensingh', 'type' => 'BAPV', 'cap' => '861.84'], ['name' => 'Santic Rooftop Solar Project', 'loc' => 'Ashulia, Savar, Dhaka', 'type' => 'BIPV', 'cap' => '714.21'], ['name' => 'Haque Lock Rooftop Solar Project', 'loc' => 'Kalampur, Dhamrai, Dhaka', 'type' => 'BIPV', 'cap' => '337.44'], ['name' => 'Shengda Rooftop Solar Project', 'loc' => 'Bagbari, Kashimpur, Gazipur', 'type' => 'BAPV', 'cap' => '102.62'], ['name' => 'ASL Rooftop Solar Project', 'loc' => 'Goalkhali, Shibaloy, Manikganj', 'type' => 'BAPV', 'cap' => '652.08'], ['name' => 'Mother Textile Rooftop Solar Project', 'loc' => 'Choto Gobindopur, Kashimpur, Gazipur', 'type' => 'BAPV', 'cap' => '100.32']] as $i => $row)
                            <tr class="group transition-colors duration-150 hover:bg-accent-500"
                                style="background-color:{{ $i % 2 === 0 ? '#ffffff' : '#f4f8f7' }};">
                                <td class="px-4 py-3.5 font-semibold group-hover:text-white!"
                                    style="border:1px solid #dce5e3; color:#0c3d3b;">
                                    {{ $i + 1 }}</td>
                                <td class="px-4 py-3.5 font-semibold group-hover:text-white!"
                                    style="border:1px solid #dce5e3; color:#0c3d3b;">
                                    {{ $row['name'] }}</td>
                                <td class="px-4 py-3.5 group-hover:text-white!"
                                    style="border:1px solid #dce5e3; color:#5b6b68;">
                                    {{ $row['loc'] }}</td>
                                <td class="px-4 py-3.5" style="border:1px solid #dce5e3;"><span
                                        class="inline-flex rounded-full px-2.5 py-1 text-xs font-bold"
                                        style="background-color:#28cbc6; color:#082928;">{{ $row['type'] }}</span></td>
                                <td class="px-4 py-3.5 font-heading font-bold text-right whitespace-nowrap group-hover:text-white!"
                                    style="border:1px solid #dce5e3; color:#187a76;">
                                    {{ number_format((float) $row['cap'], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr style="background-color:#0c3d3b;">
                            <td class="px-4 py-4 font-heading font-bold" colspan="4"
                                style="border:1px solid #0a322f; color:#ffffff;">Total Installed Capacity</td>
                            <td class="px-4 py-4 font-heading font-bold text-right whitespace-nowrap"
                                style="border:1px solid #0a322f; color:#f7b308;">3,504.93</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- GET IN TOUCH --}}
    <section class="relative w-full bg-white px-4 py-12 md:px-8 lg:px-16 lg:py-25">
        <div class="solar-container text-center">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">Get In Touch</span>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2
                    class="mx-auto mt-4 max-w-2xl font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                    Let&apos;s power your business with sunshine
                </h2>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="180">
                <a href="/contact" class="btn-brand group mt-8 inline-flex">
                    Talk To Our Experts
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1">
                        <path d="M7 17 17 7" />
                        <path d="M7 7h10v10" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
