@extends('layouts.admin')
@section('content')
@php $pageTitle = 'Contact Queries'; @endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Contact Queries</h2>
            <p class="admin-page-header-sub">Incoming messages from the contact form ({{ $newCount }} new)</p>
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
        <a href="{{ route('admin.contact.index', ['status' => 'all', 'search' => request('search')]) }}" class="admin-filter-chip {{ $activeTab === 'all' ? $activeChip : '' }}">All</a>
        <a href="{{ route('admin.contact.index', ['status' => 'new', 'search' => request('search')]) }}" class="admin-filter-chip {{ $activeTab === 'new' ? $activeChip : '' }}">New <span class="ml-1 text-[10px] font-bold px-1.5 py-0.5 rounded-full bg-amber-500/10 text-amber-500 border border-amber-500/30">{{ $newCount }}</span></a>
        <a href="{{ route('admin.contact.index', ['status' => 'replied', 'search' => request('search')]) }}" class="admin-filter-chip {{ $activeTab === 'replied' ? $activeChip : '' }}">Replied</a>
        <a href="{{ route('admin.contact.index', ['status' => 'archived', 'search' => request('search')]) }}" class="admin-filter-chip {{ $activeTab === 'archived' ? $activeChip : '' }}">Archived</a>
    </div>

    <form method="GET" action="{{ route('admin.contact.index') }}" class="flex justify-between items-center gap-4 flex-wrap">
        <input type="hidden" name="status" value="{{ $activeTab }}">
        <div class="admin-table-search relative w-full sm:w-80">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="admin-table-search-icon"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search queries by name, email or subject..." class="admin-table-search-input w-full">
        </div>
    </form>

    <div class="admin-table-card">
        @if ($queries->isEmpty())
            <div class="admin-empty-state">
                <div class="admin-empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                </div>
                <p class="admin-empty-title">{{ request('search') ? 'No contact queries match your search' : 'No contact queries found' }}</p>
                <p class="admin-empty-desc">Try adjusting your search query or check another status tab</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th class="text-center w-32">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($queries as $query)
                            <tr>
                                <td>
                                    <p class="font-semibold text-[14.5px] text-(--admin-text-primary)">{{ $query->name }}</p>
                                    <p class="text-[12px] text-(--admin-text-secondary)">{{ $query->email }}</p>
                                </td>
                                <td>
                                    <p class="font-medium text-[13.5px] text-(--admin-text-primary)">{{ $query->subject }}</p>
                                </td>
                                <td>
                                    <p class="text-[12px] text-(--admin-text-secondary) line-clamp-2 max-w-md">{{ $query->message }}</p>
                                </td>
                                <td>
                                    <span class="inline-block px-2 py-1 rounded-full text-[11px] font-medium border capitalize {{ $statusStyles[$query->status] ?? 'bg-(--admin-surface-2) text-(--admin-text-secondary) border-(--admin-border)' }}">{{ $query->status }}</span>
                                </td>
                                <td>
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.contact.edit', $query->id) }}" class="admin-action-btn" title="View &amp; Update">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.contact.destroy', $query->id) }}" onsubmit="return confirm('Are you sure you want to delete this contact query?')">
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