<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'role' => ['required', 'string', 'min:2', 'max:120'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'quote' => ['required', 'string', 'min:10', 'max:500'],
        ]);

        Review::create([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'rating' => $validated['rating'],
            'quote' => $validated['quote'],
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}