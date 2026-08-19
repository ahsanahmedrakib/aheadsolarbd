@extends('layouts.admin')
@section('content')
@php $pageTitle = 'Palash Applications'; @endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Palash Applications</h2>
            <p class="admin-page-header-sub">Dealer &amp; charging station applications ({{ $newCount }} new)</p>
        </div>
    </div>

    <div class="admin-filter-bar">
        @php
            $statusStyles = [
                'new' => 'bg-amber-500/10 text-amber-500 border-amber-500/30',
                'replied' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
                'archived' => 'bg-(--admin-surface-2) text-(--admin-text-secondary) border-(--admin-border)',
            ];
            $activeChip = 'bg-(--admin-accent-muted) text-(--admin-accent) border-(--admin-accent)';
        @endphp
        <a href="{{ route('admin.palash-applications.index', ['status' => 'all', 'search' => request('search')]) }}" class="admin-filter-chip {{ $activeTab === 'all' ? $activeChip : '' }}">All</a>
        <a href="{{ route('admin.palash-applications.index', ['status' => 'new', 'search' => request('search')]) }}" class="admin-filter-chip {{ $activeTab === 'new' ? $activeChip : '' }}">New <span class="ml-1 text-[10px] font-bold px-1.5 py-0.5 rounded-full bg-amber-500/10 text-amber-500 border border-amber-500/30">{{ $newCount }}</span></a>
        <a href="{{ route('admin.palash-applications.index', ['status' => 'replied', 'search' => request('search')]) }}" class="admin-filter-chip {{ $activeTab === 'replied' ? $activeChip : '' }}">Replied</a>
        <a href="{{ route('admin.palash-applications.index', ['status' => 'archived', 'search' => request('search')]) }}" class="admin-filter-chip {{ $activeTab === 'archived' ? $activeChip : '' }}">Archived</a>
    </div>

    <form method="GET" action="{{ route('admin.palash-applications.index') }}" class="flex justify-between items-center gap-4 flex-wrap">
        <input type="hidden" name="status" value="{{ $activeTab }}">
        <div class="admin-table-search relative w-full sm:w-80">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="admin-table-search-icon"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search applications by name, email or mobile..." class="admin-table-search-input w-full">
        </div>
    </form>

    <div class="admin-table-card">
        @if ($applications->isEmpty())
            <div class="admin-empty-state">
                <div class="admin-empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="16" height="10" rx="2"/><line x1="22" x2="22" y1="11" y2="13"/><line x1="6" x2="6" y1="11" y2="13"/><line x1="10" x2="10" y1="11" y2="13"/><line x1="14" x2="14" y1="11" y2="13"/></svg>
                </div>
                <p class="admin-empty-title">{{ request('search') ? 'No palash applications match your search' : 'No palash applications found' }}</p>
                <p class="admin-empty-desc">Try adjusting your search query or check another status tab</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th>Applicant</th>
                            <th>Contact</th>
                            <th>Services</th>
                            <th>Status</th>
                            <th class="text-center w-32">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $app)
                            <tr>
                                <td>
                                    <p class="font-semibold text-[14.5px] text-(--admin-text-primary)">{{ $app->full_name }}</p>
                                    <p class="text-[12px] text-(--admin-text-secondary)">{{ $app->business_name }}</p>
                                </td>
                                <td>
                                    <p class="text-[12px] text-(--admin-text-secondary)">{{ $app->email }}</p>
                                    <p class="text-[12px] text-(--admin-text-secondary)">{{ $app->mobile }}</p>
                                </td>
                                <td>
                                    <p class="text-[12px] text-(--admin-text-secondary) line-clamp-1 max-w-xs">{{ is_array($app->services) ? implode(', ', $app->services) : $app->services }}</p>
                                </td>
                                <td>
                                    <span class="inline-block px-2 py-1 rounded-full text-[11px] font-medium border capitalize {{ $statusStyles[$app->status] ?? 'bg-(--admin-surface-2) text-(--admin-text-secondary) border-(--admin-border)' }}">{{ $app->status }}</span>
                                </td>
                                <td>
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.palash-applications.edit', $app->id) }}" class="admin-action-btn" title="View &amp; Update">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.palash-applications.destroy', $app->id) }}" onsubmit="return confirm('Are you sure you want to delete this palash application?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="admin-action-btn danger" title="Delete">
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