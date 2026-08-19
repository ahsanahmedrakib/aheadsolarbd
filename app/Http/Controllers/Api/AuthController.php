<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Support\Jwt;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends BaseApiController
{
    public function login(Request $request): JsonResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (!$email || !$password) {
            return $this->error('Email and password are required');
        }

        $key = 'login:' . $this->ip($request) . ':' . strtolower($email);
        if (RateLimiter::tooManyAttempts($key, 10)) {
            return $this->error('Too many login attempts. Please try again later.', 429);
        }
        RateLimiter::hit($key, 15 * 60);

        $user = User::where('email', strtolower(trim($email)))->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return $this->error('Invalid email or password', 401);
        }

        $payload = [
            'userId' => $user->id,
            'email' => $user->email,
        ];

        $accessToken = Jwt::encode($payload, config('auth.jwt_secret'), 15 * 60);
        $refreshToken = Jwt::encode($payload, config('auth.jwt_refresh_secret'), 60 * 60 * 24 * 7);

        return $this->ok([
            'accessToken' => $accessToken,
            'refreshToken' => $refreshToken,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        $user = $request->attributes->get('auth_user');
        if (!$user) {
            return $this->error('Unauthorized', 401);
        }
        return $this->ok($user->only(['id', 'name', 'email', 'created_at', 'updated_at']));
    }

    public function refresh(Request $request): JsonResponse
    {
        $refreshToken = $request->input('refreshToken');
        if (!$refreshToken) {
            return $this->error('Refresh token is required');
        }

        try {
            $payload = Jwt::decode($refreshToken, config('auth.jwt_refresh_secret'));
            $accessToken = Jwt::encode([
                'userId' => $payload['userId'],
                'email' => $payload['email'],
            ], config('auth.jwt_secret'), 15 * 60);

            return $this->ok(['accessToken' => $accessToken]);
        } catch (\Throwable $e) {
            return $this->error('Invalid or expired refresh token', 401);
        }
    }

    public function logout(): JsonResponse
    {
        return $this->ok(['message' => 'Logged out successfully']);
    }
}