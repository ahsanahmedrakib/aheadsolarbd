@extends('layouts.admin')
@section('content')
@php $pageTitle = 'Services'; @endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Services</h2>
            <p class="admin-page-header-sub">Configure &amp; manage client-facing solar services ({{ $services->count() }} services)</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.services.create') }}" class="admin-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
                Add Service
            </a>
        </div>
    </div>

    <form method="GET" action="{{ route('admin.services.index') }}" class="flex justify-between items-center gap-4 flex-wrap">
        <div class="admin-table-search relative w-full sm:w-80">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="admin-table-search-icon"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search services by title or description..." class="admin-table-search-input w-full">
        </div>
    </form>

    <div class="admin-table-card">
        @if ($services->isEmpty())
            <div class="admin-empty-state">
                <div class="admin-empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <p class="admin-empty-title">{{ request('search') ? 'No services match your search' : 'No services found' }}</p>
                <p class="admin-empty-desc">Try adjusting your search query or add a new service</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Slug</th>
                            <th class="text-center w-32">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="w-14 h-10 rounded-md bg-cover bg-center border border-(--admin-border) shrink-0" style="background-image:url('{{ $service->image }}')"></div>
                                        <div class="flex items-start gap-2.5 min-w-0">
                                            <div class="w-8 h-8 rounded-lg flex items-center justify-center bg-[rgba(245,158,11,0.08)] text-(--admin-accent) border border-[rgba(245,158,11,0.15)] shrink-0">
                                                @php
                                                    $icons = ['Zap' => 'zap', 'Sun' => 'sun', 'Battery' => 'battery', 'Wrench' => 'wrench', 'Shield' => 'shield', 'Globe' => 'globe', 'Leaf' => 'leaf', 'Activity' => 'activity'];
                                                    $ic = $icons[$service->icon_name] ?? 'help';
                                                @endphp
                                                @include('admin.partials._svg-icons', ['icon' => $ic, 'size' => 16])
                                            </div>
                                            <div class="min-w-0">
                                                <p class="font-semibold text-[14.5px] text-(--admin-text-primary)">{{ $service->title }}</p>
                                                <p class="text-[12px] text-(--admin-text-secondary) line-clamp-2 max-w-lg mt-0.5">{{ $service->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="font-mono text-[12px] text-(--admin-text-secondary) bg-(--admin-surface-2) px-2 py-1 rounded">{{ $service->slug }}</span>
                                </td>
                                <td>
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.services.edit', $service->id) }}" class="admin-action-btn" title="Edit Service">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="admin-action-btn danger" title="Delete Service">
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