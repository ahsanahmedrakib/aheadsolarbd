@extends('layouts.admin')
@section('content')
@php
    $pageTitle = $item ? 'Edit User' : 'Add User';
    $isEdit = (bool) $item;
@endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">{{ $isEdit ? 'Edit User' : 'Add User' }}</h2>
            <p class="admin-page-header-sub">{{ $isEdit ? 'Update this admin panel user' : 'Create a new admin panel user' }}</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.users.index') }}" class="admin-btn-outline">Back to Users</a>
        </div>
    </div>

    @include('admin.partials._errors')

    <div class="admin-section-card">
        <form method="POST" action="{{ $isEdit ? route('admin.users.update', $item->id) : route('admin.users.store') }}" class="p-6 space-y-4" data-validate>
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item?->name) }}" placeholder="e.g. John Doe" data-rules="required|min:2|max:255" data-label="Name"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('name') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('name')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Email *</label>
                    <input type="email" name="email" value="{{ old('email', $item?->email) }}" placeholder="e.g. admin@aheadsolarbd.com" data-rules="required|email" data-label="Email"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('email') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('email')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">{{ $isEdit ? 'Password (leave blank to keep current)' : 'Password *' }}</label>
                <div class="relative">
                    <input type="password" name="password" data-password-toggle placeholder="{{ $isEdit ? 'Enter a new password to change it' : 'Minimum 8 characters' }}" {{ $isEdit ? '' : 'data-rules="required|min:8"' }} data-label="Password"
                        class="w-full bg-(--admin-surface-2) border pl-2.5 pr-12 py-2.5 {{ $errors->has('password') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg outline-none focus:border-(--admin-accent) transition">
                    <button type="button" data-password-eye class="absolute right-1.5 top-0 bottom-0 flex items-center justify-center px-2 text-(--admin-text-secondary) hover:text-(--admin-accent) transition-colors cursor-pointer" title="Show password">
                        <svg data-eye-open xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg data-eye-closed xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                    </button>
                </div>
                @error('password')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                <a href="{{ route('admin.users.index') }}" class="admin-btn-outline">Cancel</a>
                <button type="submit" class="admin-btn-primary px-6">{{ $isEdit ? 'Update User' : 'Save User' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[data-password-toggle]").forEach(function (input) {
        var eye = input.closest(".relative").querySelector("[data-password-eye]");
        if (!eye) return;
        var open = eye.querySelector("[data-eye-open]");
        var closed = eye.querySelector("[data-eye-closed]");
        eye.addEventListener("click", function () {
            var show = input.type === "password";
            input.type = show ? "text" : "password";
            if (open) open.classList.toggle("hidden", show);
            if (closed) closed.classList.toggle("hidden", !show);
            eye.title = show ? "Hide password" : "Show password";
        });
    });
});
</script>
@endpush