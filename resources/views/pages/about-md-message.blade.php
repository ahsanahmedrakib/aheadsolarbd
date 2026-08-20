@extends('layouts.app')

@section('content')
<x-page-banner title="MD's" titleAccent="Message" crumb="MD's Message" :crumb-parent="['label' => 'About Us', 'href' => '/about']" image="/images/aheadsolar/about-2.jpg" eyebrow="Leadership" />

<section class="relative w-full overflow-hidden bg-white px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-12 items-start">
            <div class="lg:col-span-5">
                <div class="reveal-image relative w-full h-87.5 sm:h-112.5 lg:h-140 rounded-lg shadow-lg" style="transition-delay:150ms">
                    <img src="{{ url('/images/aheadsolar/team-1.jpg') }}" alt="Managing Director of Ahead Solar Ltd" class="absolute inset-0 w-full h-full object-cover">
                </div>
                <div class="reveal mt-6 rounded-lg border border-gray-100 bg-secondary p-6" data-variant="fade-up">
                    <h3 class="font-heading text-xl font-bold text-accent-500">A. R. Rahman</h3>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-gold-500">Managing Director</p>
                    <div class="mt-4 h-px w-full bg-forest-700/10"></div>
                    <p class="mt-4 text-xs sm:text-sm text-[#888888] leading-relaxed">
                        Leading Ahead Solar Ltd. with a vision to make Bangladesh self-sufficient in clean, affordable energy — one rooftop at a time.
                    </p>
                </div>
            </div>

            <div class="space-y-6 lg:col-span-7">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">A Message From Our MD</span>
                    </div>
                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            Let sunshine become the new electricity in Bangladesh
                        </h2>
                    </div>
                </div>

                <div class="reveal space-y-5 text-sm leading-relaxed text-[#888888] sm:text-base" data-variant="fade-up" data-delay="160">
                    <p>
                        Dear Friends, Valued Partners, and Esteemed Stakeholders,
                    </p>
                    <p>
                        Welcome to Ahead Solar Ltd. It is my privilege to lead a team that shares a bold and simple belief: that the abundant sunshine of Bangladesh can power our industries, our homes, and our future.
                    </p>
                    <p>
                        When we set out, our mission was clear — to replace all the diesel generators in Bangladesh with a rooftop solar and BESS fusion system. Today, I am proud to say that vision is becoming reality. From the largest rooftop solar installations powering industrial factories, to clean solar charging systems driving the country&apos;s first three-wheeler electric mobility network, every project we deliver brings us closer to a greener, more self-reliant Bangladesh.
                    </p>
                    <p>
                        We are blessed with the power of sunshine — 365 days a year. Our responsibility is to turn that blessing into affordable, reliable, and sustainable energy for every community we serve.
                    </p>
                </div>

                <div class="reveal space-y-5 text-sm leading-relaxed text-[#888888] sm:text-base" data-variant="fade-up" data-delay="220">
                    <p>
                        To our customers, I promise one thing above all: our team will stand beside you long after the installation is complete — with 24/7 monitoring, world-class service, and honest engineering.
                    </p>
                    <p>
                        To our partners — including the distinguished Nitol Niloy Group and our global partner Zhejiang SAV Digital Power Technologies — thank you for trusting us. Together, we are building something that will outlast all of us.
                    </p>
                </div>

                <div class="reveal flex flex-wrap items-center justify-between gap-6 border-t border-gray-100 pt-8" data-variant="fade-up" data-delay="280">
                    <div class="inline-flex flex-col gap-1">
                        <div class="flex items-center gap-2 text-gold-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <span class="font-heading text-lg font-bold text-accent-500">A. R. Rahman</span>
                        </div>
                        <p class="pl-7 text-xs font-semibold uppercase tracking-wider text-[#888888]">Managing Director, Ahead Solar Ltd.</p>
                    </div>
                    <a href="/contact" class="btn-brand group inline-flex">
                        Get In Touch
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative w-full overflow-hidden bg-secondary px-4 py-12 md:px-8 lg:px-16 lg:py-25">
    <div class="solar-container">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16 items-center">
            <div class="space-y-6 lg:col-span-7">
                <div>
                    <div class="reveal" data-variant="fade-up">
                        <span class="section-eyebrow">Our Promise</span>
                    </div>
                    <div class="reveal" data-variant="fade-up" data-delay="100">
                        <h2 class="mt-4 font-heading text-3xl font-bold tracking-tight text-accent-500 sm:text-4xl lg:text-[52px] lg:leading-[1.1]">
                            A commitment we uphold every single day
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ([
                        ['title' => 'Reliable Energy', 'text' => 'Solar power you can depend on — day and night, rain or shine.'],
                        ['title' => 'Transparent Engineering', 'text' => 'Clear designs, honest pricing, and data you can verify anytime.'],
                        ['title' => 'Lifelong Partnership', 'text' => 'We stay with you for the life of your system, not just the sale.'],
                        ['title' => 'Environmental Impact', 'text' => 'Every kilowatt we generate is a step toward a cleaner Bangladesh.'],
                    ] as $i => $f)
                        <div class="reveal flex items-start gap-4 rounded-lg border border-white/60 bg-white p-5 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-shadow duration-300 hover:shadow-md" data-variant="fade-up" data-delay="{{ $i * 70 }}">
                            <div class="shrink-0 flex h-10 w-10 items-center justify-center rounded-full bg-accent-500 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            </div>
                            <div>
                                <h4 class="font-heading text-base font-bold text-accent-500">{{ $f['title'] }}</h4>
                                <p class="mt-1 text-xs sm:text-sm text-[#888888] leading-relaxed">{{ $f['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="reveal-image relative w-full h-72 sm:h-95 lg:h-115 lg:col-span-5 rounded-lg shadow-lg" style="transition-delay:150ms">
                <img src="{{ url('/images/aheadsolar/project-3.jpg') }}" alt="Solar panels installed at an industrial facility" class="absolute inset-0 w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>
@endsection