@extends('layouts.admin')
@section('content')
@php
    $s = $stats;
    $statCards = [
        ['label' => 'Services', 'value' => $s['services'], 'color' => 'amber', 'icon' => 'briefcase', 'href' => '/admin/services'],
        ['label' => 'Projects', 'value' => $s['projects'], 'color' => 'green', 'icon' => 'layers', 'href' => '/admin/projects'],
        ['label' => 'Reviews', 'value' => $s['reviews'], 'color' => 'purple', 'icon' => 'message', 'href' => '/admin/reviews'],
        ['label' => 'Team Members', 'value' => $s['team'], 'color' => 'amber', 'icon' => 'users', 'href' => '/admin/team'],
        ['label' => 'Hero Slides', 'value' => $s['heroSlides'], 'color' => 'green', 'icon' => 'image', 'href' => '/admin/hero-slider'],
        ['label' => 'Contact Queries', 'value' => $s['contactQueries'], 'color' => 'blue', 'icon' => 'mail', 'href' => '/admin/contact'],
        ['label' => 'Palash Applications', 'value' => $s['palashApplications'], 'color' => 'purple', 'icon' => 'battery', 'href' => '/admin/palash-applications'],
    ];
@endphp

<div>
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Dashboard</h2>
            <p class="admin-page-header-sub">Overview of your site content and activity.</p>
        </div>
    </div>

    <div class="admin-stats-grid">
        @foreach ($statCards as $c)
            <a href="{{ $c['href'] }}" class="admin-stat-card" style="text-decoration:none">
                <div class="admin-stat-header">
                    <span class="admin-stat-label">{{ $c['label'] }}</span>
                    <div class="admin-stat-icon {{ $c['color'] }}">
                        @if ($c['icon'] === 'briefcase')
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        @elseif ($c['icon'] === 'layers')
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/></svg>
                        @elseif ($c['icon'] === 'message')
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        @elseif ($c['icon'] === 'users')
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        @elseif ($c['icon'] === 'image')
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                        @elseif ($c['icon'] === 'mail')
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        @elseif ($c['icon'] === 'battery')
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="16" height="10" rx="2"/><line x1="22" x2="22" y1="11" y2="13"/><line x1="6" x2="6" y1="11" y2="13"/><line x1="10" x2="10" y1="11" y2="13"/><line x1="14" x2="14" y1="11" y2="13"/></svg>
                        @endif
                    </div>
                </div>
                <div class="admin-stat-value">{{ number_format($c['value']) }}</div>
                <div style="display:flex;align-items:center;gap:8px">
                    <span class="admin-stat-trend up">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                        {{ $c['value'] > 0 ? 'Live' : 'Empty' }}
                    </span>
                    <span class="admin-stat-sub">in database</span>
                </div>
            </a>
        @endforeach
    </div>

    <div class="admin-dashboard-grid">
        <div class="admin-section-card">
            <div class="admin-section-header">
                <div>
                    <p class="admin-section-title">Site Overview</p>
                    <p class="admin-section-subtitle">Content distribution by module</p>
                </div>
            </div>
            <div class="admin-section-body">
                <div class="admin-bar-chart">
                    @php
                        $max = max(1, max(array_column($statCards, 'value')));
                        $labels = ['Services', 'Projects', 'Reviews', 'Team', 'Hero', 'Contact', 'Palash'];
                        $vals = [$s['services'], $s['projects'], $s['reviews'], $s['team'], $s['heroSlides'], $s['contactQueries'], $s['palashApplications']];
                    @endphp
                    @foreach ($vals as $i => $v)
                        <div class="admin-bar-group">
                            <div class="admin-bar-track">
                                <div class="admin-bar-fill {{ $i % 2 === 1 ? 'secondary' : '' }}" style="height: {{ max(4, ($v / $max) * 100) }}%"></div>
                            </div>
                            <span class="admin-bar-label">{{ $labels[$i] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="admin-section-card">
            <div class="admin-section-header">
                <div>
                    <p class="admin-section-title">Account</p>
                    <p class="admin-section-subtitle">Current session</p>
                </div>
            </div>
            <div class="admin-section-body">
                <div class="admin-activity-list">
                    <div class="admin-activity-item">
                        <div class="admin-activity-dot" style="background:#10b981"></div>
                        <div class="admin-activity-content">
                            <p class="admin-activity-text">Signed in as <strong>{{ auth()->user()->name }}</strong></p>
                            <p class="admin-activity-time">{{ auth()->user()->role === 'superadmin' ? 'Super Admin' : 'Admin' }}</p>
                        </div>
                    </div>
                    <div class="admin-activity-item">
                        <div class="admin-activity-dot" style="background:#3b82f6"></div>
                        <div class="admin-activity-content">
                            <p class="admin-activity-text">Email: {{ auth()->user()->email }}</p>
                            <p class="admin-activity-time">Member since {{ auth()->user()->created_at?->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <div class="admin-activity-item">
                        <div class="admin-activity-dot" style="background:#8b5cf6"></div>
                        <div class="admin-activity-content">
                            <p class="admin-activity-text">{{ $s['contactQueries'] }} contact queries &amp; {{ $s['palashApplications'] }} palash applications</p>
                            <p class="admin-activity-time">Pending review in admin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection