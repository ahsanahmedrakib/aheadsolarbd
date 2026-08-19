@extends('layouts.admin')
@section('content')
@php $pageTitle = 'Reviews'; @endphp

<div class="space-y-6">
    <div class="admin-page-header">
        <div>
            <h2 class="admin-page-header-title">Reviews</h2>
            <p class="admin-page-header-sub">Customer testimonials shown on the homepage ({{ $reviews->count() }} reviews)</p>
        </div>
    </div>

    <div class="admin-table-card">
        @if ($reviews->isEmpty())
            <div class="admin-empty-state">
                <div class="admin-empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                <p class="admin-empty-title">No reviews found</p>
                <p class="admin-empty-desc">Customer testimonials will appear here once added</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Status</th>
                            <th class="text-center w-44">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>
                                    <p class="font-semibold text-[14.5px] text-(--admin-text-primary)">{{ $review->name }}</p>
                                    <p class="text-[12px] text-(--admin-text-secondary)">{{ $review->role }}</p>
                                </td>
                                <td>
                                    <div class="flex items-center gap-0.5">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="{{ $i <= $review->rating ? 'text-amber-500' : 'text-(--admin-border)' }}"><path d="M12 2l2.9 6.26 6.86.6-5.22 4.53 1.56 6.71L12 16.9l-6.1 3.2 1.56-6.71L2.24 8.86l6.86-.6L12 2z"/></svg>
                                        @endfor
                                    </div>
                                </td>
                                <td>
                                    <p class="text-[12px] text-(--admin-text-secondary) line-clamp-2 max-w-lg italic">"{{ $review->quote }}"</p>
                                </td>
                                <td>
                                    @if ($review->status === \App\Models\Review::STATUS_APPROVED)
                                        <span class="inline-flex items-center gap-1 text-[11px] font-semibold px-2.5 py-1 rounded-full bg-emerald-500/10 text-emerald-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Approved
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 text-[11px] font-semibold px-2.5 py-1 rounded-full bg-amber-500/10 text-amber-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                            Pending
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="flex gap-2 justify-center items-center">
                                        @if ($review->status !== \App\Models\Review::STATUS_APPROVED)
                                            <form method="POST" action="{{ route('admin.reviews.approve', $review->id) }}">
                                                @csrf
                                                <input type="hidden" name="action" value="approve">
                                                <button type="submit" class="admin-action-btn success" title="Approve & Show on Website">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('admin.reviews.approve', $review->id) }}">
                                                @csrf
                                                <input type="hidden" name="action" value="reject">
                                                <button type="submit" class="admin-action-btn warning" title="Reject / Hide from Website">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.reviews.edit', $review->id) }}" class="admin-action-btn" title="Edit Review">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.reviews.destroy', $review->id) }}" onsubmit="return confirm('Are you sure you want to delete this review?')">
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