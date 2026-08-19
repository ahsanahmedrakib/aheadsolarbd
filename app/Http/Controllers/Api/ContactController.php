<?php

namespace App\Http\Controllers\Api;

use App\Models\ContactQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }
        $queries = ContactQuery::orderBy('created_at', 'desc')->get();
        return $this->ok($queries);
    }

    public function store(Request $request): JsonResponse
    {
        $ip = $this->ip($request);
        if (RateLimiter::tooManyAttempts('contact:' . $ip, 5)) {
            return $this->error('Too many requests. Please try again later.', 429);
        }
        RateLimiter::hit('contact:' . $ip, 15 * 60);

        $name = trim((string) $request->input('name', ''));
        $email = trim((string) $request->input('email', ''));
        $phone = trim((string) $request->input('phone', ''));
        $subject = trim((string) $request->input('subject', ''));
        $message = trim((string) $request->input('message', ''));

        if (!$name || !$email || !$subject || !$message) {
            return $this->error('name, email, subject, and message are required');
        }
        if (mb_strlen($name) < 2) {
            return $this->error('Name must be at least 2 characters');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->error('Invalid email address');
        }
        if (mb_strlen($message) < 10) {
            return $this->error('Message must be at least 10 characters');
        }
        if (mb_strlen($subject) < 2) {
            return $this->error('Subject must be at least 2 characters');
        }

        $query = ContactQuery::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
            'status' => 'new',
        ]);

        return $this->ok($query);
    }

    public function update(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $data = $request->json()->all();
        $id = $data['id'] ?? null;
        if (!$id) {
            return $this->error('ID is required');
        }

        $query = ContactQuery::find($id);
        if (!$query) {
            return $this->error('Query not found', 404);
        }

        foreach (['name', 'email', 'phone', 'subject', 'message', 'status', 'notes'] as $key) {
            if (array_key_exists($key, $data)) {
                $query->{$key} = $data[$key];
            }
        }
        $query->save();

        return $this->ok($query);
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

        ContactQuery::find($id)?->delete();
        return $this->ok();
    }
}