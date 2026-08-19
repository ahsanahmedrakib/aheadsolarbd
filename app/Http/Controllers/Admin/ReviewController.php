<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = \App\Support\SiteData::allReviewsDb();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function approve(Request $request, Review $review): RedirectResponse
    {
        $action = $request->input('action', 'approve');
        $review->status = $action === 'approve' ? Review::STATUS_APPROVED : Review::STATUS_PENDING;
        $review->save();

        return redirect()->route('admin.reviews.index')->with(
            'success',
            $review->status === Review::STATUS_APPROVED ? 'Review approved and now visible on the website.' : 'Review marked as pending and hidden from the website.'
        );
    }

    public function edit(Review $review): View
    {
        return view('admin.reviews.form', ['item' => $review]);
    }

    public function update(Request $request, Review $review): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'quote' => ['required', 'string', 'min:10'],
            'status' => ['required', 'in:pending,approved'],
        ]);
        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review): RedirectResponse
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}