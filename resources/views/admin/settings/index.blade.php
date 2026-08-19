@extends('layouts.admin')
@section('content')
@php
    $pageTitle = 'Settings';
    $colorMap = [
        'amber' => 'bg-amber-500',
        'green' => 'bg-emerald-500',
        'blue' => 'bg-blue-500',
        'purple' => 'bg-purple-500',
        'red' => 'bg-red-500',
        'slate' => 'bg-slate-500',
        'cyan' => 'bg-cyan-500',
        'orange' => 'bg-orange-500',
    ];
@endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Settings</h2>
            <p class="admin-page-header-sub">Global brand, SEO, and system defaults ({{ count($sections) }} sections)</p>
        </div>
    </div>

    @include('admin.partials._errors')

    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
        @csrf

        @foreach ($sections as $i => $section)
            <div class="admin-section-card">
                <div class="admin-section-header">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full {{ $colorMap[$section['color'] ?? ''] ?? 'bg-(--admin-accent)' }} text-white flex items-center justify-center font-bold uppercase text-sm shrink-0">{{ mb_strtoupper(mb_substr($section['title'] ?? 'S', 0, 1)) }}</div>
                        <div>
                            <p class="admin-section-title">{{ $section['title'] ?? 'Section' }}</p>
                            <p class="admin-section-subtitle">Section</p>
                        </div>
                    </div>
                </div>
                <div class="admin-section-body space-y-4">
                    @foreach ($section['fields'] ?? [] as $fIndex => $field)
                        <div class="flex flex-col gap-1.5">
                            <input type="hidden" name="sections[{{ $i }}][fields][{{ $fIndex }}][id]" value="{{ $field['id'] ?? '' }}">
                            <input type="hidden" name="sections[{{ $i }}][fields][{{ $fIndex }}][type]" value="{{ $field['type'] ?? 'text' }}">
                            <input type="hidden" name="sections[{{ $i }}][fields][{{ $fIndex }}][label]" value="{{ $field['label'] ?? '' }}">
                            <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">{{ $field['label'] ?? 'Field' }}</label>
                            @if (($field['type'] ?? 'text') === 'textarea')
                                <textarea name="sections[{{ $i }}][fields][{{ $fIndex }}][value]" rows="4"
                                    class="w-full bg-(--admin-surface-2) border border-(--admin-border) text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ $field['value'] ?? '' }}</textarea>
                            @else
                                <input type="{{ ($field['type'] ?? 'text') === 'email' ? 'email' : (($field['type'] ?? 'text') === 'tel' ? 'tel' : 'text') }}" name="sections[{{ $i }}][fields][{{ $fIndex }}][value]" value="{{ $field['value'] ?? '' }}"
                                    class="w-full bg-(--admin-surface-2) border border-(--admin-border) text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                            @endif
                        </div>
                    @endforeach

                    @foreach ($section['toggles'] ?? [] as $tIndex => $toggle)
                        <div class="flex items-center justify-between gap-3 py-2 border-b border-(--admin-border)/60 last:border-b-0">
                            <div>
                                <input type="hidden" name="sections[{{ $i }}][toggles][{{ $tIndex }}][id]" value="{{ $toggle['id'] ?? '' }}">
                                <input type="hidden" name="sections[{{ $i }}][toggles][{{ $tIndex }}][label]" value="{{ $toggle['label'] ?? '' }}">
                                <label class="text-sm font-medium text-(--admin-text-primary) cursor-pointer">{{ $toggle['label'] ?? 'Toggle' }}</label>
                            </div>
                            <input type="checkbox" name="sections[{{ $i }}][toggles][{{ $tIndex }}][checked]" value="1" {{ !empty($toggle['checked']) ? 'checked' : '' }} class="w-5 h-5 accent-(--admin-accent)">
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="flex justify-end">
            <button type="submit" class="admin-btn-primary px-6">Save Settings</button>
        </div>
    </form>
</div>
@endsection