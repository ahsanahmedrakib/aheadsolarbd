@extends('layouts.admin')
@section('content')
@php
    $pageTitle = $item ? 'Edit Team Member' : 'Add Team Member';
    $isEdit = (bool) $item;
@endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">{{ $isEdit ? 'Edit Team Member' : 'Add Team Member' }}</h2>
            <p class="admin-page-header-sub">{{ $isEdit ? 'Update this team member' : 'Create a new team member' }}</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.team.index') }}" class="admin-btn-outline">Back to Team</a>
        </div>
    </div>

    @include('admin.partials._errors')

    <div class="admin-section-card">
        <form method="POST" action="{{ $isEdit ? route('admin.team.update', $item->id) : route('admin.team.store') }}" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item?->name) }}" placeholder="e.g. Rakibul Hasan"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('name') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('name')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Role *</label>
                    <input type="text" name="role" value="{{ old('role', $item?->role) }}" placeholder="e.g. Senior Solar Engineer"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('role') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('role')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Bio</label>
                <textarea name="bio" rows="4" placeholder="Short bio about this team member..."
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('bio') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('bio', $item?->bio) }}</textarea>
                @error('bio')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            @include('admin.partials._image-input', [
                'name' => 'image',
                'label' => 'Member Photo',
                'value' => old('image', $item?->image),
                'required' => false,
                'hint' => 'Upload a file or paste a path. Max 5MB.',
            ])

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Social Links</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <input type="text" name="social_facebook" value="{{ old('social_facebook', $item?->social_links['facebook'] ?? '') }}" placeholder="https://facebook.com/..." class="w-full bg-(--admin-surface-2) border border-(--admin-border) text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                        @error('social_facebook')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <input type="text" name="social_instagram" value="{{ old('social_instagram', $item?->social_links['instagram'] ?? '') }}" placeholder="https://instagram.com/..." class="w-full bg-(--admin-surface-2) border border-(--admin-border) text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                        @error('social_instagram')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <input type="text" name="social_x" value="{{ old('social_x', $item?->social_links['x'] ?? '') }}" placeholder="https://x.com/..." class="w-full bg-(--admin-surface-2) border border-(--admin-border) text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                        @error('social_x')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <input type="text" name="social_linkedin" value="{{ old('social_linkedin', $item?->social_links['linkedin'] ?? '') }}" placeholder="https://linkedin.com/in/..." class="w-full bg-(--admin-surface-2) border border-(--admin-border) text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                        @error('social_linkedin')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                <a href="{{ route('admin.team.index') }}" class="admin-btn-outline">Cancel</a>
                <button type="submit" class="admin-btn-primary px-6">{{ $isEdit ? 'Update Member' : 'Save Member' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection