<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();
        return $this->ok($reviews);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->json()->all();
        $name = $data['name'] ?? null;
        $role = $data['role'] ?? null;
        $quote = $data['quote'] ?? null;

        if (!$name || !$role || !$quote) {
            return $this->error('name, role, and quote are required');
        }

        $review = Review::create([
            'name' => $name,
            'role' => $role,
            'rating' => $data['rating'] ?? 5,
            'quote' => $quote,
            'created_at' => now(),
        ]);

        return $this->ok($review);
    }

    public function destroy(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $id = $request->query('id');
        if (!$id) {
            return $this->error('Missing ID parameter');
        }

        Review::find($id)?->delete();
        return $this->ok();
    }
}