@extends('layouts.admin')
@section('content')
@php $pageTitle = 'Hero Slider'; @endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Hero Slider</h2>
            <p class="admin-page-header-sub">Manage homepage hero slides ({{ $slides->count() }} slides)</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.hero-slider.create') }}" class="admin-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                Add Slide
            </a>
        </div>
    </div>

    <div class="admin-table-card">
        @if ($slides->isEmpty())
            <div class="admin-empty-state">
                <div class="admin-empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <p class="admin-empty-title">No hero slides found</p>
                <p class="admin-empty-desc">Add a new slide to showcase on the homepage</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th>Slide</th>
                            <th>Site</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th class="text-center w-32">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slides as $slide)
                            @php
                                $bv = (string) $slide->background_video;
                                $isImage = $bv !== '' && (str_contains($bv, '/images/') || preg_match('/\.(jpe?g|png|gif|webp|svg|avif)$/i', $bv));
                            @endphp
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="w-20 h-12 rounded-md overflow-hidden border border-(--admin-border) bg-(--admin-surface-2) flex items-center justify-center shrink-0">
                                            @if ($isImage)
                                                <img src="{{ $bv }}" alt="{{ $slide->title }}" class="w-full h-full object-cover">
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-(--admin-text-muted)"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="m9 8 6 4-6 4Z"/></svg>
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-[10px] font-semibold uppercase tracking-wider text-(--admin-text-secondary)">{{ $slide->tagline }}</p>
                                            <p class="font-semibold text-[14.5px] text-(--admin-text-primary) truncate max-w-md">
                                                {{ $slide->title }}{{ $slide->title_accent ? ' ' : '' }}@if ($slide->title_accent)<span class="text-(--admin-accent)">{{ $slide->title_accent }}</span>@endif
                                            </p>
                                            <p class="text-[12px] text-(--admin-text-secondary) line-clamp-1 max-w-lg mt-0.5">{{ $slide->description }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if ($slide->site === 'palash')
                                        <span class="text-[11px] font-semibold bg-purple-500/10 text-purple-400 border border-purple-500/20 px-2 py-1 rounded">Palash</span>
                                    @elseif ($slide->site === 'projects')
                                        <span class="text-[11px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 px-2 py-1 rounded">Projects</span>
                                    @else
                                        <span class="text-[11px] font-semibold bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 px-2 py-1 rounded">Ahead Solar</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="font-mono text-[12px] text-(--admin-text-secondary) bg-(--admin-surface-2) px-2 py-1 rounded">#{{ $slide->order }}</span>
                                </td>
                                <td>
                                    @if ($slide->is_active)
                                        <span class="text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-1 rounded">Active</span>
                                    @else
                                        <span class="text-[11px] font-semibold bg-gray-500/10 text-gray-400 border border-gray-500/20 px-2 py-1 rounded">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.hero-slider.edit', $slide->id) }}" class="admin-action-btn" title="Edit Slide">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.hero-slider.destroy', $slide->id) }}" onsubmit="return confirm('Are you sure you want to delete this hero slide?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="admin-action-btn danger" title="Delete Slide">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection