@extends('layouts.app')

@section('content')
<x-page-banner title="OpEx" titleAccent="Model" crumb="OpEx Model" image="/images/aheadsolar/banner.jpg" eyebrow="Solution" />

@php
    $features = [
        [
            'id' => '01.',
            'title' => 'Zero Upfront Investment',
            'description' => 'Deploy green energy with no initial capital requirement from the roof owner.',
            'd' => 'M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3',
        ],
        [
            'id' => '02.',
            'title' => 'Risk-Free Adoption',
            'description' => 'No financial risk from market changes or technology innovation.',
            'd' => 'M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181',
        ],
        [
            'id' => '03.',
            'title' => '20-Year Assurance',
            'description' => 'Service provider ensures smooth maintenance and good performance for 20 years.',
            'd' => 'M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75',
        ],
    ];
@endphp

<section class="bg-white py-20 lg:py-25 px-4 sm:px-6 lg:px-8 font-sans overflow-x-hidden">
    <div class="solar-container space-y-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            <div class="lg:col-span-6">
                <div class="reveal-image relative w-full aspect-4/3 rounded-lg overflow-hidden shadow-sm">
                    <img src="{{ url('/images/aheadsolar/about-2.jpg') }}" alt="Engineers inspecting a massive commercial hybrid solar system farm" class="absolute inset-0 w-full h-full object-cover">
                </div>
            </div>

            <div class="lg:col-span-6 space-y-6">
                <div class="reveal" data-variant="fade-up">
                    <span class="section-eyebrow">Our Solution</span>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Operational Expenditure <span class="text-accent-500">Model</span></h2>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed text-justify">In this model as there is zero investment upfront, the roof owner ends up paying a little higher than the CapEx model. No financial risk to deploy green energy due to market change or technology innovation. It is paid in annual installments. Service provider ensures smooth maintenance and good performance for 20 years.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($features as $i => $feature)
                <div class="reveal" data-variant="fade-up" data-delay="{{ $i * 100 }}">
                    <div class="group bg-secondary rounded-lg p-6 sm:p-8 shadow-sm border border-white/60 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-500 flex flex-col justify-between relative overflow-hidden min-h-55 card-shine">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-[18px] text-white bg-accent-500 flex items-center justify-center shadow-sm transition-all duration-500 group-hover:scale-110 group-hover:rotate-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['d'] }}"/></svg>
                            </div>
                            <span class="font-heading text-sm font-extrabold text-accent-500 tracking-wider">{{ $feature['id'] }}</span>
                        </div>

                        <div class="mt-6 space-y-2">
                            <h3 class="font-heading text-lg sm:text-xl font-bold text-accent-500 tracking-tight group-hover:text-accent-700 transition-colors duration-300">{{ $feature['title'] }}</h3>
                            <p class="text-xs sm:text-sm text-[#888888] font-medium leading-relaxed">{{ $feature['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="relative w-full overflow-hidden bg-forest-900 py-16 lg:py-24 font-sans">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat kenburns-active" style="background-image:url('{{ url('/images/aheadsolar/banner-2.jpg') }}')"></div>
    <div class="absolute inset-0 bg-forest-900/85"></div>

    <div class="relative z-10 solar-container flex flex-col items-center text-center">
        <div class="reveal" data-variant="fade-up">
            <span class="section-eyebrow mb-4">24/7 Support</span>
        </div>

        <div class="reveal" data-variant="fade-up" data-delay="100">
            <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-white tracking-tight leading-[1.1] max-w-3xl">Have Questions? We are Here to <span class="text-accent-500">Help You!</span></h2>
        </div>

        <div class="reveal" data-variant="fade-up" data-delay="200">
            <a href="/contact" class="btn-brand group mt-8">
                Learn More
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection