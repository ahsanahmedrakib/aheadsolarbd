@extends('layouts.app')

@php
    $pageTitle = 'Palash Charging Station';
    $metaDescription = '100% solar-charged lithium-ion battery rental for easy-bikes and Mishuks by Ahead Solar. Daily rent from 120 Tk - and join our dealership & partner network.';
@endphp

@section('content')
<div class="palash-page">
    @php $heroVideo = $heroSlides->first()->background_video ?: '/videos/palash-hero.mp4'; @endphp
    <section class="w-full relative min-h-187.5 overflow-hidden select-none" data-fade-slider data-autoplay="true">
        <video class="absolute inset-0 w-full h-full object-cover" src="{{ $heroVideo }}" autoplay muted loop playsinline preload="auto"></video>
        <div class="absolute inset-0 bg-linear-to-r from-forest-900/90 via-forest-900/60 to-transparent z-10"></div>

        @foreach ($heroSlides as $i => $slide)
        <div class="slide {{ $i === 0 ? 'active' : '' }} relative min-h-187.5 flex items-start">
            <div class="solar-container z-20 pt-20 pb-16 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative">
                <div class="lg:col-span-7 flex flex-col items-start space-y-6">
                    <div class="hero-anime-item inline-flex items-center space-x-2 bg-white text-accent-500 px-4 py-1.5 rounded-full shadow-lg">
                        <span class="w-2 h-2 rounded-full bg-accent-500 animate-pulse"></span>
                        <span class="text-xs md:text-sm font-semibold tracking-wide text-gold-500">{{ $slide->tagline }}</span>
                    </div>

                    <h1 class="font-heading text-4xl md:text-5xl lg:text-[68px] font-bold text-accent-600 leading-[1.1] tracking-tight max-w-3xl uppercase">
                        @php $titleWords = preg_split('/\s+/', trim($slide->title)); @endphp
                        @foreach ($titleWords as $wi => $word)
                        <span class="anime-word" style="transition-delay:{{ 0.35 + $wi * 0.06 }}">{{ $word }}{!! $wi < count($titleWords) - 1 ? '&nbsp;' : '' !!}</span>
                                @endforeach
                                <br class="hidden md:inline">
                                @if ($slide->title_accent)
                                @php $accentWords = preg_split('/\s+/', trim($slide->title_accent)); @endphp
                                <span class="text-stroke-white">
                                    @foreach ($accentWords as $wi => $word)
                                    <span class="anime-word" style="transition-delay:{{ 0.35 + count($titleWords) * 0.06 + $wi * 0.06 }}s">{{ $word }}{!! $wi < count($accentWords) - 1 ? '&nbsp;' : '' !!}</span>
                                            @endforeach
                                    </span>
                                    @endif
                    </h1>

                    <p class="hero-anime-item text-white/75 text-base md:text-lg font-normal max-w-xl leading-relaxed">
                        {{ $slide->description }}
                    </p>

                    <div class="hero-anime-item flex flex-wrap items-center gap-4 pt-4 w-full sm:w-auto">
                        <a href="/contact" class="btn-brand w-full sm:w-auto justify-center group">
                            <span>Get Free Consultation</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="transition-transform duration-300 group-hover:translate-x-1">
                                <path d="M6 4v16l14-8z" />
                            </svg>
                        </a>

                        @if ($slide->show_video_button && $slide->video_url)
                        <button type="button" data-video-open="{{ $slide->video_url }}" class="group flex cursor-pointer items-center space-x-3 text-white font-medium hover:text-accent-500 transition-colors duration-300 py-3 px-4 rounded-full">
                            <span class="relative w-12 h-12 rounded-full bg-accent-500 group-hover:bg-forest-700 flex items-center justify-center transition-colors duration-300 shadow-md">
                                <span class="absolute inset-0 rounded-full bg-accent-500/50 pulse-ring"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#fff" class="ml-0.5 relative">
                                    <path d="M6 4v16l14-8z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Watch Our Story</span>
                        </button>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-5 hidden lg:block"></div>
            </div>
        </div>
        @endforeach

        @if (count($heroSlides) > 1)
        <div class="swiper-dots hero-dots" data-slider-dots>
            @foreach ($heroSlides as $i => $slide)
            <button type="button" data-bullet class="hero-swiper-bullet {{ $i === 0 ? 'hero-swiper-bullet-active' : '' }}"></button>
            @endforeach
        </div>
        @endif
    </section>

    @php
    $highlights = [
    ['title' => 'Premium Easy-Bike Power', 'description' => 'Advanced easy-bike power solutions dedicated to maximizing your daily income and performance.'],
    ['title' => 'Top-Tier Battery Rentals', 'description' => 'Specialized lithium-ion battery rentals engineered for reliable, long-lasting performance.'],
    ['title' => 'Reliable Charging Network', 'description' => 'A dependable charging station network that keeps you on the road — not waiting in line.'],
    ['title' => 'Maximum Mileage, Zero Hassle', 'description' => 'Long-lasting power so you spend less time waiting and more time earning.'],
    ];
    @endphp


    <section class="bg-white pt-4 px-4 sm:px-6 lg:px-8 font-sans overflow-clip flex justify-center">
        <a href="#become-partner" class="group flex gap-1 justify-between items-center bg-forest-500 text-white disabled:bg-gray-400 text-base font-semibold px-8 py-3.5 rounded-full shadow-md transition-colors duration-200 cursor-pointer disabled:cursor-not-allowed">
            <span>Become A Partner</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1">
                <path d="M7 17 17 7" />
                <path d="M7 7h10v10" />
            </svg>
        </a>
    </section>
    <section class="bg-white py-10 px-4 sm:px-6 lg:px-8 font-sans overflow-clip">
        <div class="solar-container grid grid-cols-1 lg:grid-cols-12 gap-24 items-center">
            <div class="lg:col-span-6 space-y-6">
                <div class="reveal sm:flex sm:items-center sm:justify-between gap-4" data-variant="fade-up">
                    <span class="section-eyebrow">About Palash Charging Station</span>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Maximum Mileage, <span class="text-accent-500">Zero Hassle</span></h2>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed text-justify">
                        Welcome to Palash Charging Station! ⚡ As your premium destination for advanced easy-bike power solutions, we are dedicated to maximizing your daily income and performance. We specialize in top-tier lithium-ion battery rentals and offer a reliable, charging station network. Our goal is to equip you with long-lasting power so you spend less time waiting and more time on the road.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                    @foreach ($highlights as $i => $item)
                    <div class="reveal" data-variant="fade-up" data-delay="{{ 220 + $i * 80 }}">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 shrink-0 rounded-[18px] bg-accent-500/10 text-accent-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-heading text-lg font-bold text-accent-500 tracking-tight">{{ $item['title'] }}</h3>
                                <p class="text-xs sm:text-sm text-[#888888] font-medium leading-relaxed mt-1">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="reveal" data-variant="slide-right" data-delay="150">
                    <div class="relative bg-forest-700 rounded-lg overflow-hidden shadow-xl p-6">
                        <div class="reveal w-full" data-variant="fade-up" data-delay="180">
                            <div class="relative flex flex-col items-center text-center gap-8">
                                <div class="bg-white rounded-lg p-2 shadow-lg">
                                    <img src="{{ url('/images/palash/palash.jpg') }}" alt="Palash Charging Station - Ahead Solar Ltd." class="w-48 sm:w-60 h-auto object-contain">
                                </div>

                                <div class="w-full">
                                    <div class="bg-white/5 border border-white/10 rounded-xl px-3 py-5">
                                        <p class="text-white/90 text-[10px] sm:text-lg font-semibold uppercase tracking-wider mt-1">থ্রি হুইলার চালকের আপন ঠিকানা স্বাস্থ সুরক্ষা</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
    $batteryPackages = [
    [
    'vehicle' => 'Mishuk',
    'vehicleLabel' => 'Mishuk Battery',
    'voltage' => '51.2 V',
    'batteryType' => 'Lithium-Ion Battery',
    'range' => '100 km',
    'capacity' => 'On a single charge',
    'rent' => 'Affordable',
    'rentLabel' => 'Daily Rent',
    'accent' => 'from-forest-700 to-forest-900',
    'features' => ['51.2 Volt lithium-ion battery', '100 km range on a single charge', 'Affordable daily rent', '100% solar-charged'],
    ],
    [
    'vehicle' => 'Easybike',
    'vehicleLabel' => 'Easybike Battery',
    'voltage' => '64 V',
    'batteryType' => 'Lithium-Ion Battery',
    'range' => '140 km',
    'capacity' => 'Carries 8-9 passengers',
    'rent' => 'Affordable',
    'rentLabel' => 'Daily Rental Rate',
    'accent' => 'from-accent-500 to-forest-900',
    'features' => ['64 Volt lithium-ion battery', '140 km range on a single charge', 'Carries 8-9 passengers comfortably', '100% solar-charged'],
    ],
    ];
    @endphp

    <section class="bg-secondary py-20 lg:py-25 px-4 sm:px-6 lg:px-8 font-sans overflow-clip">
        <div class="solar-container space-y-14">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="reveal" data-variant="fade-up">
                    <span class="section-eyebrow">Battery Packages</span>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">State-of-the-Art Lithium-Ion Batteries at an <span class="text-accent-500">Affordable Daily Rate</span></h2>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="text-[#888888] text-sm sm:text-base font-normal leading-relaxed">Palash Charging Station offers state-of-the-art lithium-ion batteries on a highly affordable daily rental basis - keeping easy-bike and Mishuk drivers on the road, every day.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach ($batteryPackages as $i => $pkg)
                <div class="reveal" data-variant="fade-up" data-delay="{{ $i * 150 }}">
                    <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-500 overflow-hidden h-full flex flex-col card-shine">
                        <div class="relative px-8 py-8 bg-linear-to-br {{ $pkg['accent'] }} text-white">
                            <span class="section-eyebrow text-white/80!">{{ $pkg['vehicleLabel'] }}</span>
                            <div class="flex items-end justify-between mt-4 gap-4">
                                <div>
                                    <h3 class="font-heading text-3xl sm:text-4xl font-bold tracking-tight">{{ $pkg['voltage'] }}</h3>
                                    <p class="text-white/80 text-sm font-medium mt-1">{{ $pkg['batteryType'] }}</p>
                                </div>
                                <div class="text-right shrink-0">
                                    <p class="font-heading text-2xl sm:text-3xl font-bold text-accent-500">{{ $pkg['rent'] }}</p>
                                    <p class="text-white/70 text-xs font-semibold uppercase tracking-wider mt-0.5">{{ $pkg['rentLabel'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4 flex-1 p-8">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-secondary rounded-xl px-4 py-3">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#888888]">Range</p>
                                    <p class="font-heading text-lg font-bold text-accent-500">{{ $pkg['range'] }}</p>
                                </div>
                                <div class="bg-secondary rounded-xl px-4 py-3">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#888888]">Capacity</p>
                                    <p class="font-heading text-sm font-bold text-accent-500 leading-tight mt-0.5">{{ $pkg['capacity'] }}</p>
                                </div>
                            </div>

                            <ul class="flex flex-col gap-2.5">
                                @foreach ($pkg['features'] as $feature)
                                <li class="flex items-start gap-2.5 text-sm text-[#888888] font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mt-0.5 shrink-0 text-accent-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    {{ $feature }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20 lg:py-25 px-4 sm:px-6 lg:px-8 font-sans overflow-clip">
        <div class="solar-container">
            <div class="text-center mb-12 space-y-4">
                <div class="reveal" data-variant="fade-up">
                    <span class="section-eyebrow justify-center">Watch Our Story</span>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold tracking-tight leading-[1.1] text-accent-500">See Palash Charging Station in Action</h2>
                </div>
            </div>

            <div class="reveal" data-variant="fade-up" data-delay="180">
                <div class="relative solar-container aspect-video rounded-lg overflow-hidden shadow-xl">
                    <iframe src="https://drive.google.com/file/d/16Vmtfknf7_4Di-jlXJmsyGQ_iuUOlNzR/preview" title="Palash Charging Station video" class="absolute inset-0 w-full h-full" allow="autoplay; encrypted-media; fullscreen" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    @php
    $galleryImages = [
    ['src' => '/images/palash/palash-1.webp', 'alt' => 'Palash Charging Station gallery image 1'],
    ['src' => '/images/palash/palash-2.webp', 'alt' => 'Palash Charging Station gallery image 2'],
    ['src' => '/images/palash/palash-3.webp', 'alt' => 'Palash Charging Station gallery image 3'],
    ['src' => '/images/palash/palash-4.webp', 'alt' => 'Palash Charging Station gallery image 4'],
    ['src' => '/images/palash/palash-5.webp', 'alt' => 'Palash Charging Station gallery image 5'],
    ['src' => '/images/palash/palash-6.webp', 'alt' => 'Palash Charging Station gallery image 6'],
    ['src' => '/images/palash/palash-7.webp', 'alt' => 'Palash Charging Station gallery image 7'],
    ];
    @endphp

    <section class="bg-secondary py-20 lg:py-25 px-4 sm:px-6 lg:px-8 font-sans overflow-clip">
        <div class="solar-container">
            <div class="reveal" data-variant="fade-up">
                <span class="section-eyebrow">Station Gallery</span>
            </div>
            <div class="reveal" data-variant="fade-up" data-delay="100">
                <h2 class="mt-4 font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-accent-500 tracking-tight leading-[1.1]">Inside Palash Charging Station</h2>
            </div>

            <div class="reveal" data-variant="fade-up" data-delay="180">
                <div class="mt-12">
                    <div class="swiper-dots pb-12" data-swiper data-loop="true" data-delay="3000" data-slides="1" data-breakpoints='{"640":2,"1024":3}'>
                        <div class="swiper-wrapper">
                            @foreach ($galleryImages as $image)
                            <div class="swiper-slide h-auto">
                                <div class="relative w-full h-64 sm:h-72 lg:h-80 rounded-xl overflow-hidden shadow-md">
                                    <img src="{{ url($image['src']) }}" alt="{{ $image['alt'] }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
    $servicesOptions = [
    ['value' => 'charging', 'label' => 'Charging Station Network Partner', 'bangla' => 'চার্জিং স্টেশন নেটওয়ার্ক পার্টনার'],
    ['value' => 'battery', 'label' => 'Lithium Battery Dealership (Rent & Sales)', 'bangla' => 'লিথিয়াম ব্যাটারি ডিলারশিপ (ভাড়া ও বিক্রয়)'],
    ['value' => 'both', 'label' => 'Both', 'bangla' => 'উভয়ই'],
    ];

    $inputClass = 'w-full bg-white px-4 py-3 rounded-[14px] border border-transparent outline-none placeholder-gray-400 text-base focus:ring-2 focus:ring-accent-500 transition-all';
    @endphp

    <section class="bg-white py-20 lg:py-25 px-4 sm:px-6 lg:px-8 font-sans overflow-clip" id="become-partner">
        <div class="solar-container">
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-12">
                <div class="reveal" data-variant="fade-up">
                    <span class="section-eyebrow">Become a Partner</span>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-forest-500 tracking-tight leading-[1.1]">Dealership &amp; Partner <span class="text-forest-500">Application Form</span></h2>
                </div>
                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="text-[#888888] text-base sm:text-lg font-normal leading-relaxed">পলাশ চার্জিং স্টেশন - ডিলারশিপ ও পার্টনার আবেদন ফরম</p>
                </div>
            </div>

            <div class="max-w-5xl mx-auto bg-secondary rounded-2xl p-4 shadow-sm my-3">
                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="text-[#888888] text-base sm:text-lg font-normal leading-relaxed">
                        Welcome! Fill out this form to register your interest in joining the Palash Charging Station network or becoming an official dealer for our premium easy-bike lithium-ion battery rental services. Our team will review your application and contact you shortly. <br> <br>
                        পলাশ চার্জিং স্টেশন নেটওয়ার্কে যুক্ত হতে অথবা আমাদের প্রিমিয়াম ইজি-বাইক লিথিয়াম ব্যাটারির ডিলারশিপ নিতে নিচের ফরমটি পূরন করুন। আমাদের প্রতিনিধি খুব দ্রুতই আপনার সাথে যোগাযোগ করবেন।
                    </p>
                </div>
            </div>

            <div class="reveal" data-variant="fade-up" data-delay="150">
                <form id="palash-application-form" action="{{ route('palash.submit') }}" method="POST" class="max-w-5xl mx-auto bg-secondary rounded-2xl p-6 sm:p-10 shadow-sm">
                    @csrf

                    <div id="palash-success" class="hidden mb-8 transition-all">
                        <div class="bg-accent-500/15 text-forest-500 p-4 rounded-lg text-base font-medium border border-accent-500/40 flex items-center gap-2">
                            <svg class="w-5 h-5 shrink-0 text-accent-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Thank you! Your application has been submitted successfully. Our team will review it and contact you shortly.</span>
                        </div>
                    </div>

                    <div id="palash-error" class="hidden mb-8 transition-all">
                        <div class="bg-red-50 text-red-600 p-4 rounded-lg text-base font-medium border border-red-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 shrink-0">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 8v4" />
                                <path d="M12 16h.01" />
                            </svg>
                            <span data-palash-error-text>Failed to submit application. Please try again.</span>
                        </div>
                    </div>

                    <div class="mb-10">
                        <div class="flex items-center gap-3">
                            <span class="w-9 h-9 shrink-0 rounded-full bg-forest-500 text-white font-heading font-bold text-base flex items-center justify-center">1</span>
                            <div>
                                <h3 class="font-heading text-xl font-bold text-forest-500 tracking-tight">Personal &amp; Business Information</h3>
                                <p class="text-sm text-[#888888] font-medium">ব্যক্তিগত ও ব্যবসায়িক তথ্য</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-6">
                            <div class="flex flex-col gap-2">
                                <label class="text-forest-500 text-sm font-bold tracking-wide">Full Name / আপনার সম্পূর্ণ নাম*</label>
                                <input type="text" name="fullName" placeholder="Enter your full name" data-rules="required|min:2" data-label="Full Name" class="{{ $inputClass }}">
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-forest-500 text-sm font-bold tracking-wide">Business / Shop Name / ব্যবসা বা দোকানের নাম</label>
                                <input type="text" name="businessName" placeholder="Enter shop or garage name" class="{{ $inputClass }}">
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-forest-500 text-sm font-bold tracking-wide">Mobile Number / মোবাইল নম্বর*</label>
                                <input type="tel" name="mobile" placeholder="Enter mobile number" data-rules="required|phone" data-label="Mobile Number" class="{{ $inputClass }}">
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-forest-500 text-sm font-bold tracking-wide">WhatsApp Number / হোয়াটসঅ্যাপ নম্বর</label>
                                <input type="tel" name="whatsapp" placeholder="Enter WhatsApp number" data-rules="phone" data-label="WhatsApp Number" class="{{ $inputClass }}">
                            </div>

                            <div class="flex flex-col gap-2 sm:col-span-2">
                                <label class="text-forest-500 text-sm font-bold tracking-wide">Email Address (Optional) / ইমেইল ঠিকানা (ঐচ্ছিক)</label>
                                <input type="email" name="email" placeholder="Enter email address" data-rules="email" data-label="Email Address" class="{{ $inputClass }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-10">
                        <div class="flex items-center gap-3">
                            <span class="w-9 h-9 shrink-0 rounded-full bg-forest-500 text-white font-heading font-bold text-base flex items-center justify-center">2</span>
                            <div>
                                <h3 class="font-heading text-xl font-bold text-forest-500 tracking-tight">Location Details</h3>
                                <p class="text-sm text-[#888888] font-medium">অবস্থান তথ্য</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-6">
                            <div class="flex flex-col gap-2">
                                <label class="text-forest-500 text-sm font-bold tracking-wide">District / জেলা*</label>
                                <input type="text" name="district" placeholder="Enter district" data-rules="required|min:2" data-label="District" class="{{ $inputClass }}">
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-forest-500 text-sm font-bold tracking-wide">Thana / Upazila / থানা / উপজেলা*</label>
                                <input type="text" name="thana" placeholder="Enter thana or upazila" data-rules="required|min:2" data-label="Thana / Upazila" class="{{ $inputClass }}">
                            </div>

                            <div class="flex flex-col gap-2 sm:col-span-2">
                                <label class="text-forest-500 text-sm font-bold tracking-wide">Full Shop / Garage Address / শপ / গ্যারেজের সম্পূর্ণ ঠিকানা*</label>
                                <textarea name="address" rows="3" placeholder="Enter your full shop or garage address" data-rules="required|min:5" data-label="Address" class="{{ $inputClass }} resize-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mb-10">
                        <div class="flex items-center gap-3">
                            <span class="w-9 h-9 shrink-0 rounded-full bg-forest-500 text-white font-heading font-bold text-base flex items-center justify-center">3</span>
                            <div>
                                <h3 class="font-heading text-xl font-bold text-forest-500 tracking-tight">Dealership Interest</h3>
                                <p class="text-sm text-[#888888] font-medium">ডিলারশিপ আগ্রহ</p>
                            </div>
                        </div>
                        <div class="mt-6 space-y-6">
                            <div class="flex flex-col gap-3">
                                <p class="text-forest-500 text-sm font-bold tracking-wide">Which service are you interested in? / আপনি কোন ধরনের ডিলারশিপ নিতে আগ্রহী?*</p>
                                @foreach ($servicesOptions as $option)
                                <label class="flex items-center gap-3 cursor-pointer group" data-palash-service-label>
                                    <input type="checkbox" name="services[]" value="{{ $option['value'] }}" {{ $loop->first ? 'data-rules="required" data-label="Service"' : '' }} class="w-4 h-4 rounded border-gray-300 text-forest-500 focus:ring-accent-500 cursor-pointer">
                                    <span class="text-base text-[#888888] font-medium group-hover:text-forest-500 transition-colors">{{ $option['label'] }} - <span class="font-semibold">{{ $option['bangla'] }}</span></span>
                                </label>
                                @endforeach
                            </div>

                            <div class="flex flex-col gap-3">
                                <p class="text-forest-500 text-sm font-bold tracking-wide">Do you currently have a business related to easy-bikes or batteries? / ইজি-বাইক বা ব্যাটারি সংক্রান্ত বর্তমানে আপনার কোনো ব্যবসা আছে কি?*</p>
                                <div class="flex flex-col sm:flex-row sm:gap-8 gap-3">
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="radio" name="hasBusiness" value="yes" data-rules="required" data-label="Business" class="w-4 h-4 border-gray-300 text-forest-500 focus:ring-accent-500 cursor-pointer">
                                        <span class="text-base text-[#888888] font-medium group-hover:text-forest-500 transition-colors">Yes / হ্যাঁ</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="radio" name="hasBusiness" value="no" class="w-4 h-4 border-gray-300 text-forest-500 focus:ring-accent-500 cursor-pointer">
                                        <span class="text-base text-[#888888] font-medium group-hover:text-forest-500 transition-colors">No, I am a new investor / না, আমি নতুন ব্যবসা শুরু করতে চাই</span>
                                    </label>
                                </div>
                            </div>

                            <div class="hidden" data-palash-exp>
                                <div class="flex flex-col gap-2">
                                    <label class="text-forest-500 text-sm font-bold tracking-wide">Years of Experience / এই ব্যবসায় কত বছরের অভিজ্ঞতা আছে?</label>
                                    <input type="text" name="experienceYears" placeholder="e.g. 3 years" class="{{ $inputClass }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-10">
                        <div class="flex items-center gap-3">
                            <span class="w-9 h-9 shrink-0 rounded-full bg-forest-500 text-white font-heading font-bold text-base flex items-center justify-center">4</span>
                            <div>
                                <h3 class="font-heading text-xl font-bold text-forest-500 tracking-tight">Facility &amp; Capacity</h3>
                                <p class="text-sm text-[#888888] font-medium">সুবিধা ও সক্ষমতা</p>
                            </div>
                        </div>
                        <div class="mt-6 space-y-6">
                            <div class="flex flex-col gap-3">
                                <p class="text-forest-500 text-sm font-bold tracking-wide">Do you have an existing space / garage for the charging station or battery stock? / চার্জিং স্টেশন বা ব্যাটারি মজুতের জন্য আপনার কি জায়গা / গ্যারেজ আছে?*</p>
                                <div class="flex flex-col gap-3">
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="radio" name="space" value="own" data-rules="required" data-label="Space" class="w-4 h-4 border-gray-300 text-forest-500 focus:ring-accent-500 cursor-pointer">
                                        <span class="text-base text-[#888888] font-medium group-hover:text-forest-500 transition-colors">Yes, I have my own space / হ্যাঁ, আমার নিজস্ব জায়গা আছে</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="radio" name="space" value="rented" class="w-4 h-4 border-gray-300 text-forest-500 focus:ring-accent-500 cursor-pointer">
                                        <span class="text-base text-[#888888] font-medium group-hover:text-forest-500 transition-colors">Yes, I have a rented space / হ্যাঁ, ভাড়া করা জায়গা আছে</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="radio" name="space" value="looking" class="w-4 h-4 border-gray-300 text-forest-500 focus:ring-accent-500 cursor-pointer">
                                        <span class="text-base text-[#888888] font-medium group-hover:text-forest-500 transition-colors">No, I am looking for a space / না, আমি জায়গা খুঁজছি</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-forest-500 text-sm font-bold tracking-wide">Additional Questions or Comments / আরও কোনো প্রশ্ন বা মন্তব্য</label>
                                <textarea name="comments" rows="4" placeholder="Write any additional information..." class="{{ $inputClass }} resize-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:justify-between">
                        <p class="text-sm text-[#888888] font-medium">* Required fields / * বাধ্যতামূলক ক্ষেত্র</p>
                        <button type="submit" data-palash-submit class="bg-forest-500 text-white disabled:bg-gray-400 text-base font-semibold px-8 py-3.5 rounded-full shadow-md transition-colors duration-200 cursor-pointer disabled:cursor-not-allowed">Apply Now / আবেদন করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @php
    $contactLinks = [
    ['label' => 'Facebook Page', 'title' => 'Palash Charging Station', 'href' => 'https://www.facebook.com/profile.php?id=61589795817520', 'external' => true, 'icon' => 'facebook'],
    ['label' => 'Phone / WhatsApp', 'title' => '01335-127307', 'href' => 'tel:+8801335127307', 'external' => false, 'icon' => 'phone'],
    ['label' => 'Email', 'title' => 'solarahead.re@gmail.com', 'href' => 'mailto:solarahead.re@gmail.com', 'external' => false, 'icon' => 'mail'],
    ];
    @endphp

    <section class="bg-forest-900 py-20 lg:py-25 px-4 sm:px-6 lg:px-8 font-sans overflow-clip">
        <div class="solar-container grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-10 items-stretch">
            <div class="space-y-6">
                <div class="reveal" data-variant="fade-up">
                    <span class="section-eyebrow">Contact &amp; Location</span>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="100">
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-[52px] font-bold text-white tracking-tight leading-[1.1]">Reach Out to <span class="text-accent-500">Palash Charging Station</span></h2>
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="180">
                    <p class="text-white/70 text-sm sm:text-base font-normal leading-relaxed">Visit our charging station or contact our team for lithium battery rental, charging services, dealership and partnership inquiries.</p>
                </div>

                <div class="flex flex-col gap-4 pt-2">
                    @foreach ($contactLinks as $i => $item)
                    <div class="reveal" data-variant="fade-up" data-delay="{{ 220 + $i * 80 }}">
                        <a href="{{ $item['href'] }}" target="{{ $item['external'] ? '_blank' : '' }}" rel="{{ $item['external'] ? 'noopener noreferrer' : '' }}" class="group flex items-center gap-4 bg-white/5 border border-white/10 rounded-xl p-4 hover:bg-white/10 hover:border-accent-500/40 transition-all duration-300">
                            <div class="w-12 h-12 shrink-0 rounded-[16px] bg-accent-500/15 text-accent-500 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                                @if ($item['icon'] === 'facebook')
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                                @elseif ($item['icon'] === 'phone')
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                                @elseif ($item['icon'] === 'mail')
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="4" width="20" height="16" rx="2" />
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                </svg>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-white/50 text-[11px] font-bold uppercase tracking-wider">{{ $item['label'] }}</p>
                                <p class="text-white text-sm sm:text-base font-semibold mt-0.5 truncate group-hover:text-accent-500 transition-colors">{{ $item['title'] }}</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white/40 group-hover:text-accent-500 transition-all duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 shrink-0">
                                <path d="M7 7h10v10" />
                                <path d="M7 17 17 7" />
                            </svg>
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="reveal" data-variant="fade-up" data-delay="460">
                    <div class="flex items-start gap-3 bg-white/5 border border-white/10 rounded-xl p-4">
                        <div class="w-12 h-12 shrink-0 rounded-[16px] bg-gold-500/15 text-gold-500 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-white/50 text-[11px] font-bold uppercase tracking-wider">Location</p>
                            <p class="text-white text-sm sm:text-base font-semibold mt-0.5 leading-relaxed">Mouchak, Kaliakoir, Gazipur, Dhaka, Bangladesh, 1751</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal h-full" data-variant="slide-left" data-delay="150">
                <div class="relative w-full h-80 sm:h-96 lg:h-full min-h-80 lg:min-h-112.5 rounded-2xl overflow-hidden border border-white/10 shadow-xl">
                    <iframe title="Palash Charging Station location map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1422.6220272309374!2d90.37387910856147!3d23.98919654091044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDU5JzIwLjAiTiA5MMKwMjInMzAuMCJF!5e1!3m2!1sen!2sbd!4v1785743688050!5m2!1sen!2sbd" class="absolute inset-0 w-full h-full border-0" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
            </div>
        </div>
    </section>

    <div data-video-modal class="hidden fixed inset-0 z-50 items-center justify-center bg-black/80 backdrop-blur-sm">
    <div class="relative w-full max-w-4xl mx-4">
        <button type="button" data-video-close class="absolute -top-12 right-0 text-white/80 hover:text-white transition z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
        <div class="relative aspect-video rounded-xl overflow-hidden shadow-2xl">
            <iframe src="" class="w-full h-full" allow="autoplay; encrypted-media; fullscreen" allowfullscreen title="Video Player"></iframe>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("palash-application-form");
        if (!form) return;

        var successBox = document.getElementById("palash-success");
        var errorBox = document.getElementById("palash-error");
        var errorText = document.querySelector("[data-palash-error-text]");
        var submitBtn = form.querySelector("[data-palash-submit]");
        var csrfToken = document.querySelector('meta[name="csrf-token"]');

        var serviceInputs = form.querySelectorAll("input[name='services[]']");
        var bothInput = form.querySelector("input[name='services[]'][value='both']");
        var expField = form.querySelector("[data-palash-exp]");

        serviceInputs.forEach(function(input) {
            input.addEventListener("change", function() {
                var isBoth = bothInput && bothInput.checked;
                serviceInputs.forEach(function(el) {
                    var disabled = el.value !== "both" && isBoth;
                    el.disabled = disabled;
                    var label = el.closest("[data-palash-service-label]");
                    if (label) {
                        label.classList.toggle("opacity-50", disabled);
                        label.classList.toggle("cursor-not-allowed", disabled);
                    }
                });
                if (isBoth) {
                    serviceInputs.forEach(function(el) {
                        if (el.value !== "both") el.checked = false;
                    });
                }
            });
        });

        form.querySelectorAll("input[name='hasBusiness']").forEach(function(input) {
            input.addEventListener("change", function() {
                if (expField) expField.classList.toggle("hidden", !(input.value === "yes" && input.checked));
            });
        });

        form.addEventListener("submit", function(e) {
            e.preventDefault();

            if (typeof window.validateForm === "function" && !window.validateForm(form)) {
                return;
            }

            var services = [];
            serviceInputs.forEach(function(el) {
                if (el.checked) services.push(el.value);
            });

            var payload = {
                fullName: form.fullName.value,
                businessName: form.businessName.value,
                mobile: form.mobile.value,
                whatsapp: form.whatsapp.value,
                email: form.email.value,
                district: form.district.value,
                thana: form.thana.value,
                address: form.address.value,
                services: services,
                hasBusiness: form.hasBusiness.value || "",
                experienceYears: form.experienceYears.value,
                space: form.space.value || "",
                comments: form.comments.value,
            };

            submitBtn.disabled = true;
            submitBtn.textContent = "Submitting... / জমা হচ্ছে...";
            errorBox.classList.add("hidden");

            fetch(form.action, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": csrfToken ? csrfToken.content : ""
                    },
                    body: JSON.stringify(payload),
                })
                .then(function(res) {
                    return res.json();
                })
                .then(function(json) {
                    if (json.success) {
                        successBox.classList.remove("hidden");
                        form.reset();
                        if (expField) expField.classList.add("hidden");
                        serviceInputs.forEach(function(el) {
                            el.disabled = false;
                        });
                        form.querySelectorAll("[data-palash-service-label]").forEach(function(label) {
                            label.classList.remove("opacity-50");
                            label.classList.remove("cursor-not-allowed");
                        });
                        setTimeout(function() {
                            successBox.classList.add("hidden");
                        }, 5000);
                    } else {
                        if (errorText) errorText.textContent = "Failed to submit application: " + (json.error || "Unknown error");
                        errorBox.classList.remove("hidden");
                    }
                })
                .catch(function() {
                    if (errorText) errorText.textContent = "An error occurred. Please try again.";
                    errorBox.classList.remove("hidden");
                })
                .finally(function() {
                    submitBtn.disabled = false;
                    submitBtn.textContent = "Apply Now / আবেদন করুন";
                });
        });
    });
</script>
@endpush