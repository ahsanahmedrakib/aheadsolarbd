@extends('layouts.admin')
@section('content')
@php
    $pageTitle = 'Palash Application Details';
    $services = implode(', ', $item->services ?? []);
    $hasBusiness = in_array(strtolower((string) ($item->has_business ?? '')), ['1', 'yes', 'true']) ? 'Yes' : 'No';
@endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Palash Application Details</h2>
            <p class="admin-page-header-sub">From {{ $item->full_name }} &middot; received {{ $item->created_at->format('M d, Y h:i A') }}</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.palash-applications.index') }}" class="admin-btn-outline">Back</a>
            <form method="POST" action="{{ route('admin.palash-applications.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this palash application?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-action-btn danger">Delete</button>
            </form>
        </div>
    </div>

    @include('admin.partials._errors')

    <div class="admin-section-card">
        <div class="admin-section-header">
            <div>
                <p class="admin-section-title">Application Details</p>
                <p class="admin-section-subtitle">Dealer &amp; charging station application submitted via the form</p>
            </div>
        </div>
        <div class="admin-section-body">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Full Name</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->full_name }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Business Name</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->business_name }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Mobile</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->mobile }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">WhatsApp</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->whatsapp }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Email</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->email }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Received</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->created_at->format('M d, Y h:i A') }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">District</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->district }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Thana</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->thana }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Address</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->address }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Services</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $services }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Has Business</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $hasBusiness }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Experience (years)</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->experience_years }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Space</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->spaceLabel() }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Comments</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->comments }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Raw Message</p>
                    <div class="mt-1 border border-(--admin-border) rounded-lg p-3 bg-(--admin-surface-2) whitespace-pre-wrap text-sm text-(--admin-text-secondary)">{{ $item->raw_message }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-section-card">
        <div class="admin-section-header">
            <div>
                <p class="admin-section-title">Update Status</p>
                <p class="admin-section-subtitle">Mark as replied or archived and add internal notes</p>
            </div>
        </div>
        <div class="admin-section-body">
            <form method="POST" action="{{ route('admin.palash-applications.update', $item->id) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Status</label>
                    <select name="status" class="w-full bg-(--admin-surface-2) border {{ $errors->has('status') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                        <option value="new" {{ old('status', $item->status) === 'new' ? 'selected' : '' }}>New</option>
                        <option value="replied" {{ old('status', $item->status) === 'replied' ? 'selected' : '' }}>Replied</option>
                        <option value="archived" {{ old('status', $item->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                    @error('status')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Notes</label>
                    <textarea name="notes" rows="4" placeholder="Internal notes about this application..." class="w-full bg-(--admin-surface-2) border {{ $errors->has('notes') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('notes', $item->notes) }}</textarea>
                    @error('notes')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                    <a href="{{ route('admin.palash-applications.index') }}" class="admin-btn-outline">Cancel</a>
                    <button type="submit" class="admin-btn-primary px-6">Save Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection