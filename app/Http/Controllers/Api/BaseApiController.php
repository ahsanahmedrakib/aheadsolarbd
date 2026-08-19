<?php

namespace App\Http\Controllers\Api;

use App\Support\Jwt;
use Illuminate\Http\Request;

abstract class BaseApiController
{
    use RespondsWithJson;

    protected function user(Request $request): mixed
    {
        return $request->attributes->get('auth_user');
    }

    protected function tokenPayload(Request $request): ?array
    {
        $header = $request->header('Authorization');
        if (!$header || !str_starts_with($header, 'Bearer ')) {
            return null;
        }
        $token = substr($header, 7);
        try {
            return Jwt::decode($token, config('auth.jwt_secret'));
        } catch (\Throwable $e) {
            return null;
        }
    }
}