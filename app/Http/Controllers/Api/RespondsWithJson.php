<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait RespondsWithJson
{
    protected function ok(mixed $data = null, array $headers = []): JsonResponse
    {
        $json = ['success' => true];
        if ($data !== null) {
            $json['data'] = $data;
        }
        return response()->json($json, 200, $headers);
    }

    protected function created(mixed $data = null): JsonResponse
    {
        $json = ['success' => true];
        if ($data !== null) {
            $json['data'] = $data;
        }
        return response()->json($json, 200);
    }

    protected function error(string $message, int $status = 400): JsonResponse
    {
        return response()->json(['success' => false, 'error' => $message], $status);
    }

    protected function ip(Request $request): string
    {
        return $request->header('x-forwarded-for') ? explode(',', $request->header('x-forwarded-for'))[0] : $request->ip() ?? 'unknown';
    }
}