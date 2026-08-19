<?php

namespace App\Support;

use Exception;

class Jwt
{
    public static function encode(array $payload, string $secret, int $expiresInSeconds): string
    {
        $header = ['alg' => 'HS256', 'typ' => 'JWT'];
        $now = time();
        $payload = array_merge($payload, [
            'iat' => $now,
            'exp' => $now + $expiresInSeconds,
        ]);
        $segments = [
            self::base64UrlEncode(json_encode($header)),
            self::base64UrlEncode(json_encode($payload)),
        ];
        $signature = self::sign(implode('.', $segments), $secret);
        $segments[] = $signature;
        return implode('.', $segments);
    }

    public static function decode(string $token, string $secret): array
    {
        $parts = explode('.', $token);
        if (count($parts) !== 3) {
            throw new Exception('Invalid token');
        }
        [$header, $body, $signature] = $parts;

        $expected = self::sign($header . '.' . $body, $secret);
        if (!hash_equals($expected, $signature)) {
            throw new Exception('Invalid signature');
        }

        $payload = json_decode(self::base64UrlDecode($body), true);
        if (!is_array($payload)) {
            throw new Exception('Invalid payload');
        }

        if (isset($payload['exp']) && time() >= (int) $payload['exp']) {
            throw new Exception('Token expired');
        }

        return $payload;
    }

    private static function sign(string $data, string $secret): string
    {
        return self::base64UrlEncode(hash_hmac('sha256', $data, $secret, true));
    }

    public static function base64UrlEncode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public static function base64UrlDecode(string $data): string
    {
        return base64_decode(strtr($data, '-_', '+/'), true);
    }
}