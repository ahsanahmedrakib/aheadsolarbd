@extends('layouts.app')

@php
    $pageTitle = 'Contact Us';
    $metaDescription = 'Get in touch with Ahead Solar for solar panel installation, battery storage, and maintenance. Request a free consultation today.';
@endphp

@section('content')

@php $mapUrl = trim($mapUrl ?? ''); @endphp

<x-page-banner title="Contact" titleAccent="Us" crumb="Contact Us" image="/images/aheadsolar/banner.jpg" />

<section class="bg-white py-20 lg:py-25 px-4 sm:px-8 font-sans">
    <div class="max-w-6xl w-full mx-auto flex flex-col md:flex-row gap-6">

        <div class="reveal w-full md:w-[40%] bg-forest-700 rounded-lg p-6 flex flex-col justify-between shadow-xl" data-variant="slide-left">
            <div>
                <div class="w-full h-56 rounded-3xl overflow-hidden bg-cover bg-center mb-8 border border-white/10" style="background-image:url('{{ url('/images/aheadsolar/about-2.jpg') }}')"></div>
                <h3 class="font-heading text-white text-xl font-bold tracking-wide mb-6">Contact Information</h3>
                <hr class="border-white/10 mb-8">
                <div class="flex flex-col gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-11 h-11 shrink-0 rounded-full bg-accent-500 text-white flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-6 18.75h9"/></svg>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs font-medium">Phone Number</p>
                            <p class="text-white text-base font-semibold mt-0.5">{{ $phone }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-11 h-11 shrink-0 rounded-full bg-accent-500 text-white flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs font-medium">Email Address</p>
                            <p class="text-white text-base font-semibold mt-0.5 break-all">{{ $email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-11 h-11 shrink-0 rounded-full bg-accent-500 text-white flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25A7.5 7.5 0 1 1 19.5 10.5z"/></svg>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs font-medium">Our Location</p>
                            <p class="text-white text-base font-semibold mt-0.5">{{ $address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="reveal w-full md:w-[60%] bg-secondary rounded-lg p-8 sm:p-10 flex flex-col shadow-sm" data-variant="slide-right" data-delay="150">
            <h2 class="font-heading text-accent-500 text-3xl sm:text-4xl font-bold tracking-tight mb-4">Get In Touch</h2>
            <p class="text-[#888888] text-sm leading-relaxed mb-8 max-w-xl">
                Whether you have questions about our services, want a free consultation, or need support for your existing system, our team is ready to assist.
            </p>

            @if (session('success'))
                <div data-toast class="bg-accent-500/15 text-accent-500 p-4 rounded-lg text-sm font-medium border border-accent-500/40 mb-6 flex items-center gap-2 transition-all">
                    <svg class="w-5 h-5 shrink-0 text-accent-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span class="flex-1">Thank you! Your message has been sent successfully. We will get back to you soon.</span>
                    <button type="button" data-toast-close class="shrink-0 w-6 h-6 flex items-center justify-center rounded-full hover:bg-accent-500/20 transition-colors cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>
            @endif

            <div id="contact-success" class="hidden mb-6">
                <div class="bg-accent-500/15 text-accent-500 p-4 rounded-lg text-sm font-medium border border-accent-500/40 flex items-center gap-2">
                    <svg class="w-5 h-5 shrink-0 text-accent-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span>Thank you! Your message has been sent successfully. We will get back to you soon.</span>
                </div>
            </div>
            <div id="contact-error" class="hidden mb-6">
                <div class="bg-red-50 text-red-600 p-4 rounded-lg text-sm font-medium border border-red-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 shrink-0"><circle cx="12" cy="12" r="10"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>
                    <span data-contact-error-text>Something went wrong. Please try again.</span>
                </div>
            </div>

            <form action="{{ route('contact.submit') }}" method="POST" class="flex flex-col gap-5" id="contact-form" data-validate>
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-2">
                        <label for="first_name" class="text-accent-500 text-xs font-bold tracking-wide">First Name*</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name" data-rules="required|min:2|max:60" data-label="First Name" class="w-full bg-white px-4 py-3 rounded-lg border outline-none placeholder-gray-400 text-sm focus:ring-2 transition-all @error('first_name') border-red-500 focus:ring-red-500 @else border-transparent focus:ring-accent-500 @enderror">
                        @error('first_name')
                            <span class="text-red-500 text-xs font-medium px-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="last_name" class="text-accent-500 text-xs font-bold tracking-wide">Last Name*</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name" data-rules="required|min:2|max:60" data-label="Last Name" class="w-full bg-white px-4 py-3 rounded-lg border outline-none placeholder-gray-400 text-sm focus:ring-2 transition-all @error('last_name') border-red-500 focus:ring-red-500 @else border-transparent focus:ring-accent-500 @enderror">
                        @error('last_name')
                            <span class="text-red-500 text-xs font-medium px-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-2">
                        <label for="phone" class="text-accent-500 text-xs font-bold tracking-wide">Phone Number*</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" data-rules="required|phone|max:40" data-label="Phone Number" class="w-full bg-white px-4 py-3 rounded-lg border outline-none placeholder-gray-400 text-sm focus:ring-2 transition-all @error('phone') border-red-500 focus:ring-red-500 @else border-transparent focus:ring-accent-500 @enderror">
                        @error('phone')
                            <span class="text-red-500 text-xs font-medium px-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-accent-500 text-xs font-bold tracking-wide">Email Address*</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" data-rules="required|email|max:190" data-label="Email Address" class="w-full bg-white px-4 py-3 rounded-lg border outline-none placeholder-gray-400 text-sm focus:ring-2 transition-all @error('email') border-red-500 focus:ring-red-500 @else border-transparent focus:ring-accent-500 @enderror">
                        @error('email')
                            <span class="text-red-500 text-xs font-medium px-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="message" class="text-accent-500 text-xs font-bold tracking-wide">Message*</label>
                    <textarea id="message" name="message" rows="5" placeholder="Any Message..." data-rules="required|min:10|max:5000" data-label="Message" class="w-full bg-white px-4 py-3 rounded-lg border outline-none placeholder-gray-400 text-sm resize-none focus:ring-2 transition-all @error('message') border-red-500 focus:ring-red-500 @else border-transparent focus:ring-accent-500 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <span class="text-red-500 text-xs font-medium px-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn-brand text-sm font-semibold px-6 py-3 rounded-full shadow-md transition-colors duration-200 cursor-pointer">Submit Message</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="bg-white py-16 px-4 sm:px-6 lg:py-24 font-sans">
    <div class="solar-container flex flex-col items-center text-center">
        <div class="reveal" data-variant="fade-up">
            <div class="inline-flex items-center gap-2 bg-secondary border border-white rounded-full px-4 py-1.5 mb-5 shadow-sm">
                <span class="w-1.5 h-1.5 bg-accent-500 rounded-full animate-pulse"></span>
                <span class="text-accent-500 text-xs font-semibold tracking-wide">Our Location</span>
            </div>
        </div>
        <div class="reveal" data-variant="fade-up" data-delay="100">
            <h2 class="font-heading text-accent-500 text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight mb-6 max-w-3xl leading-tight">Connecting you to clean energy</h2>
        </div>
        <div class="reveal" data-variant="fade-up" data-delay="180">
            <p class="text-[#888888] text-sm sm:text-base leading-relaxed max-w-2xl mb-12 sm:mb-16">
                No matter where you are, our expert team is ready to provide reliable solar solutions, on-site support, and consultations to help you transition to sustainable energy with ease.
            </p>
        </div>
        <div class="reveal-image relative w-full h-80 sm:h-112.5 lg:h-130 rounded-lg overflow-hidden shadow-md border border-gray-100" data-delay="200">
            @if ($mapUrl)
                <iframe title="Office Location Map" src="{{ $mapUrl }}" class="w-full h-full border-0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            @else
                <div class="w-full h-full flex items-center justify-center bg-secondary text-[#888888] text-sm">Map is not available right now.</div>
            @endif
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("contact-form");
    if (!form) return;

    var successBox = document.getElementById("contact-success");
    var errorBox = document.getElementById("contact-error");
    var errorText = document.querySelector("[data-contact-error-text]");
    var submitBtn = form.querySelector("button[type='submit']");
    var csrfToken = document.querySelector('meta[name="csrf-token"]');

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        if (typeof window.validateForm === "function" && !window.validateForm(form)) {
            return;
        }

        var payload = {
            first_name: form.first_name.value,
            last_name: form.last_name.value,
            phone: form.phone.value,
            email: form.email.value,
            message: form.message.value,
        };

        submitBtn.disabled = true;
        submitBtn.textContent = "Sending...";
        errorBox.classList.add("hidden");
        successBox.classList.add("hidden");

        fetch(form.action, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": csrfToken ? csrfToken.content : "",
            },
            body: JSON.stringify(payload),
        })
            .then(function (res) {
                if (res.status === 422) {
                    return res.json().then(function (json) {
                        throw { errors: json.errors || {}, status: 422 };
                    });
                }
                return res.json();
            })
            .then(function (json) {
                if (json.success) {
                    successBox.classList.remove("hidden");
                    form.reset();
                    setTimeout(function () { successBox.classList.add("hidden"); }, 5000);
                } else {
                    if (errorText) errorText.textContent = json.message || "Something went wrong. Please try again.";
                    errorBox.classList.remove("hidden");
                }
            })
            .catch(function (err) {
                if (err && err.errors) {
                    if (typeof window.showServerErrors === "function") {
                        window.showServerErrors(form, err.errors);
                    }
                    var msgs = [];
                    Object.values(err.errors).forEach(function (arr) {
                        msgs.push(arr.join(" "));
                    });
                    if (errorText) errorText.textContent = msgs.join(" ");
                } else if (errorText) {
                    errorText.textContent = "An error occurred. Please try again.";
                }
                errorBox.classList.remove("hidden");
            })
            .finally(function () {
                submitBtn.disabled = false;
                submitBtn.textContent = "Submit Message";
            });
    });
});
</script>
@endpush