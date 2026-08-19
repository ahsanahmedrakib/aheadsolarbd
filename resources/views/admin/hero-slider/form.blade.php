@extends('layouts.admin')
@section('content')
@php
    $pageTitle = $item ? 'Edit Hero Slide' : 'Add Hero Slide';
    $isEdit = (bool) $item;
@endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">{{ $isEdit ? 'Edit Hero Slide' : 'Add Hero Slide' }}</h2>
            <p class="admin-page-header-sub">{{ $isEdit ? 'Update this homepage hero slide' : 'Create a new homepage hero slide' }}</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.hero-slider.index') }}" class="admin-btn-outline">Back to Hero Slider</a>
        </div>
    </div>

    @include('admin.partials._errors')

    <div class="admin-section-card">
        <form method="POST" action="{{ $isEdit ? route('admin.hero-slider.update', $item->id) : route('admin.hero-slider.store') }}" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Site *</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <label class="flex items-center gap-2.5 rounded-lg border p-3 cursor-pointer transition {{ old('site', $item?->site) === 'ahead' ? 'border-(--admin-accent) bg-(--admin-accent-muted)' : 'border-(--admin-border) bg-(--admin-surface-2) hover:border-(--admin-border)/70' }}">
                        <input type="radio" name="site" value="ahead" {{ old('site', $item?->site) === 'ahead' ? 'checked' : '' }} class="accent-(--admin-accent)">
                        <span>
                            <span class="block text-[13px] font-semibold text-(--admin-text-primary)">Ahead Solar</span>
                            <span class="block text-[11px] text-(--admin-text-muted)">Main solar brand site</span>
                        </span>
                    </label>
                    <label class="flex items-center gap-2.5 rounded-lg border p-3 cursor-pointer transition {{ old('site', $item?->site) === 'palash' ? 'border-(--admin-accent) bg-(--admin-accent-muted)' : 'border-(--admin-border) bg-(--admin-surface-2) hover:border-(--admin-border)/70' }}">
                        <input type="radio" name="site" value="palash" {{ old('site', $item?->site) === 'palash' ? 'checked' : '' }} class="accent-(--admin-accent)">
                        <span>
                            <span class="block text-[13px] font-semibold text-(--admin-text-primary)">Palash</span>
                            <span class="block text-[11px] text-(--admin-text-muted)">Palash applications site</span>
                        </span>
                    </label>
                </div>
                @error('site')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Tagline *</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $item?->tagline) }}" placeholder="e.g. Powering Bangladesh"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('tagline') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('tagline')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $item?->title) }}" placeholder="e.g. Clean Solar Energy for"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('title') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('title')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Title Accent</label>
                    <input type="text" name="title_accent" value="{{ old('title_accent', $item?->title_accent) }}" placeholder="e.g. Every Home"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('title_accent') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('title_accent')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Description *</label>
                <textarea name="description" rows="4" placeholder="Short description shown on the hero slide..."
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('description') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('description', $item?->description) }}</textarea>
                @error('description')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Background Video</label>
                <input type="text" name="background_video" value="{{ old('background_video', $item?->background_video) }}" placeholder="/video/xxx.mp4 or youtube/drive URL or image path"
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('background_video') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                <p class="text-[11px] text-(--admin-text-muted)">Paste a /video path, YouTube/Drive URL, or image path.</p>
                @error('background_video')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Video URL</label>
                <input type="text" name="video_url" value="{{ old('video_url', $item?->video_url) }}" placeholder="https://www.youtube.com/embed/..."
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('video_url') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                @error('video_url')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="flex items-center gap-2 cursor-pointer w-fit">
                        <input type="checkbox" name="show_video_button" value="1" {{ old('show_video_button', $item?->show_video_button) ? 'checked' : '' }} class="w-4 h-4 accent-(--admin-accent)">
                        <span class="text-sm text-(--admin-text-primary)">Show Video Button</span>
                    </label>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="flex items-center gap-2 cursor-pointer w-fit">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item?->is_active) ? 'checked' : '' }} class="w-4 h-4 accent-(--admin-accent)">
                        <span class="text-sm text-(--admin-text-primary)">Active (visible on homepage)</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col gap-1.5 max-w-xs">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Order</label>
                <input type="number" name="order" min="1" value="{{ old('order', $item?->order) }}" placeholder="1"
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('order') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                @error('order')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                <a href="{{ route('admin.hero-slider.index') }}" class="admin-btn-outline">Cancel</a>
                <button type="submit" class="admin-btn-primary px-6">{{ $isEdit ? 'Update Slide' : 'Save Slide' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection