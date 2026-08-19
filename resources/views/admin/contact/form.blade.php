@extends('layouts.admin')
@section('content')
@php $pageTitle = 'Contact Query Details'; @endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Contact Query Details</h2>
            <p class="admin-page-header-sub">From {{ $item->name }} &middot; received {{ $item->created_at->format('M d, Y h:i A') }}</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.contact.index') }}" class="admin-btn-outline">Back</a>
            <form method="POST" action="{{ route('admin.contact.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this contact query?')">
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
                <p class="admin-section-title">Message Details</p>
                <p class="admin-section-subtitle">Information submitted via the contact form</p>
            </div>
        </div>
        <div class="admin-section-body">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Name</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->name }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Email</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->email }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Phone</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->phone }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Received</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->created_at->format('M d, Y h:i A') }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Subject</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1">{{ $item->subject }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Message</p>
                    <p class="text-sm text-(--admin-text-primary) mt-1 whitespace-pre-line">{{ $item->message }}</p>
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
            <form method="POST" action="{{ route('admin.contact.update', $item->id) }}" class="space-y-4">
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
                    <textarea name="notes" rows="4" placeholder="Internal notes about this query..." class="w-full bg-(--admin-surface-2) border {{ $errors->has('notes') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('notes', $item->notes) }}</textarea>
                    @error('notes')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                    <a href="{{ route('admin.contact.index') }}" class="admin-btn-outline">Cancel</a>
                    <button type="submit" class="admin-btn-primary px-6">Save Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection