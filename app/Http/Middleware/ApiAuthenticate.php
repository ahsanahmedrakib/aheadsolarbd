<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Support\Jwt;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        $header = $request->header('Authorization');
        if (!$header || !str_starts_with($header, 'Bearer ')) {
            return response()->json(['success' => false, 'error' => 'Unauthorized'], 401);
        }

        try {
            $payload = Jwt::decode(substr($header, 7), config('auth.jwt_secret'));
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'error' => 'Invalid or expired token'], 401);
        }

        $user = User::find($payload['userId']);
        if (!$user) {
            return response()->json(['success' => false, 'error' => 'User not found'], 404);
        }

        $request->attributes->set('auth_user', $user);
        $request->attributes->set('auth_payload', $payload);

        return $next($request);
    }
}