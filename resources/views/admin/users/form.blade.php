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
        <form method="POST" action="{{ $isEdit ? route('admin.users.update', $item->id) : route('admin.users.store') }}" class="p-6 space-y-4">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item?->name) }}" placeholder="e.g. John Doe"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('name') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('name')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Email *</label>
                    <input type="email" name="email" value="{{ old('email', $item?->email) }}" placeholder="e.g. admin@aheadsolarbd.com"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('email') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('email')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">{{ $isEdit ? 'Password (leave blank to keep current)' : 'Password *' }}</label>
                <input type="password" name="password" placeholder="{{ $isEdit ? 'Enter a new password to change it' : 'Minimum 8 characters' }}"
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('password') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                @error('password')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Role *</label>
                <select name="role"
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('role') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    <option value="superadmin" {{ old('role', $item?->role) === 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin" {{ old('role', $item?->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                <a href="{{ route('admin.users.index') }}" class="admin-btn-outline">Cancel</a>
                <button type="submit" class="admin-btn-primary px-6">{{ $isEdit ? 'Update User' : 'Save User' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection