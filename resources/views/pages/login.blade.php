@extends('layouts.app')

@php
    $pageTitle = 'Login';
    $metaDescription = 'Sign in to the Ahead Solar admin dashboard.';
@endphp

@section('content')
<div class="min-h-screen flex items-center justify-center bg-secondary px-4 py-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-lg border border-forest-700/10 p-8 sm:p-10">
            <div class="text-center mb-8">
                <img src="{{ url('/logo.svg') }}" width="160" height="50" alt="Ahead Solar logo" class="h-10 w-auto mx-auto mb-6">
                <h1 class="text-2xl font-bold text-accent-500">Admin Login</h1>
                <p class="text-gray-500 text-sm mt-1">Sign in to access the admin panel</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 text-red-600 text-sm p-3 rounded-xl border border-red-200 flex items-center gap-2 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 shrink-0"><circle cx="12" cy="12" r="10"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                @csrf

                <div class="flex flex-col gap-1.5">
                    <label for="email" class="text-xs font-semibold text-gray-700 uppercase tracking-wider">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="admin@aheadsolarbd.com" autofocus class="w-full bg-white border border-forest-700/10 text-sm text-forest-900 rounded-lg p-3 outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="password" class="text-xs font-semibold text-gray-700 uppercase tracking-wider">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" class="w-full bg-white border border-forest-700/10 text-sm text-forest-900 rounded-lg p-3 outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition">
                </div>

                <button type="submit" class="w-full btn-brand font-semibold py-3 rounded-full transition-colors flex items-center justify-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-4"/><path d="m10 17 5-5-5-5"/><path d="M15 12H3"/></svg>
                    Sign In
                </button>
            </form>
        </div>
    </div>
</div>
@endsection