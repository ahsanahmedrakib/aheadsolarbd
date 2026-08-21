@extends('layouts.admin')
@section('content')
@php $pageTitle = $item ? 'Edit Review' : 'Add Review'; @endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">{{ $item ? 'Edit Review' : 'Add Review' }}</h2>
            <p class="admin-page-header-sub">{{ $item ? 'Update this customer testimonial' : 'Create a new customer testimonial' }}</p>
        </div>
        <div class="admin-page-header-actions">
            <a href="{{ route('admin.reviews.index') }}" class="admin-btn-outline">Back</a>
        </div>
    </div>

    @include('admin.partials._errors')

    <div class="admin-section-card">
        <form method="POST" action="{{ $item ? route('admin.reviews.update', $item->id) : route('admin.reviews.store') }}" class="p-6 space-y-4" data-validate>
            @csrf
            @if ($item)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item?->name) }}" placeholder="e.g. Mahmudul Hasan" data-rules="required|min:2|max:255" data-label="Name"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('name') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('name')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Role</label>
                    <input type="text" name="role" value="{{ old('role', $item?->role) }}" placeholder="e.g. Homeowner, Dhaka"
                        class="w-full bg-(--admin-surface-2) border {{ $errors->has('role') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @error('role')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Rating *</label>
                <select name="rating" data-rules="required|in:1,2,3,4,5" data-label="Rating" class="w-full bg-(--admin-surface-2) border {{ $errors->has('rating') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating', $item?->rating) == $i ? 'selected' : '' }}>{{ $i }} star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
                @error('rating')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Status</label>
                <select name="status" class="w-full bg-(--admin-surface-2) border {{ $errors->has('status') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition">
                    <option value="pending" {{ old('status', $item?->status) === 'pending' ? 'selected' : '' }}>Pending (hidden)</option>
                    <option value="approved" {{ old('status', $item?->status) === 'approved' ? 'selected' : '' }}>Approved (visible)</option>
                </select>
                @error('status')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-(--admin-text-secondary) uppercase tracking-wider">Quote *</label>
                <textarea name="quote" rows="5" placeholder="What did this customer say about their experience?" data-rules="required|min:10" data-label="Quote"
                    class="w-full bg-(--admin-surface-2) border {{ $errors->has('quote') ? 'border-(--admin-danger)' : 'border-(--admin-border)' }} text-sm text-(--admin-text-primary) rounded-lg p-2.5 outline-none focus:border-(--admin-accent) transition resize-none">{{ old('quote', $item?->quote) }}</textarea>
                @error('quote')<span class="text-[11px] text-(--admin-danger)">{{ $message }}</span>@enderror
            </div>

            <div class="flex justify-end gap-3 pt-3 border-t border-(--admin-border)">
                <a href="{{ route('admin.reviews.index') }}" class="admin-btn-outline">Cancel</a>
                <button type="submit" class="admin-btn-primary px-6">{{ $item ? 'Update Review' : 'Save Review' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection