<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController extends BaseApiController
{
    private const MIME_BY_EXT = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'webp' => 'image/webp',
        'svg' => 'image/svg+xml',
    ];

    public function show(Request $request, string $id): BinaryFileResponse|JsonResponse
    {
        if (!preg_match('/^\d+$/', $id)) {
            return $this->error('Image not found', 404);
        }

        $root = public_path('images/api');
        if (!is_dir($root)) {
            return $this->error('Image not found', 404);
        }

        $file = $this->findImageFile($root, $id);
        if (!$file) {
            return $this->error('Image not found', 404);
        }

        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $contentType = self::MIME_BY_EXT[$ext] ?? 'application/octet-stream';

        return response()
            ->file($file, [
                'Content-Type' => $contentType,
                'X-Content-Type-Options' => 'nosniff',
                'Content-Security-Policy' => "default-src 'none'; sandbox",
                'Cache-Control' => 'public, max-age=31536000, immutable',
            ]);
    }

    private function findImageFile(string $dir, string $imageId): ?string
    {
        $entries = @scandir($dir);
        if (!$entries) {
            return null;
        }
        foreach ($entries as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }
            $full = $dir . DIRECTORY_SEPARATOR . $entry;
            if (is_dir($full)) {
                $found = $this->findImageFile($full, $imageId);
                if ($found) {
                    return $found;
                }
            } elseif (is_file($full) && str_starts_with($entry, $imageId . '_')) {
                return $full;
            }
        }
        return null;
    }
}