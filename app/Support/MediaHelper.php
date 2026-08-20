<?php

namespace App\Support;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MediaHelper
{
    public const ALLOWED_FOLDERS = ['services', 'projects', 'blogs', 'team', 'hero', 'settings'];

    private const EXTENSION_MAP = [
        'jpeg' => 'jpg',
        'jpg' => 'jpg',
        'png' => 'png',
        'gif' => 'gif',
        'webp' => 'webp',
        'svg+xml' => 'svg',
        'svg' => 'svg',
        'mp4' => 'mp4',
        'webm' => 'webm',
        'ogg' => 'ogv',
        'ogv' => 'ogv',
        'mov' => 'mov',
        'm4v' => 'm4v',
    ];

    private const MAX_IMAGE_SIZE = 5 * 1024 * 1024;

    public static function saveImage(string $data, string $folderName, string|int $id): string
    {
        if (!str_starts_with($data, 'data:image/')) {
            return $data;
        }

        if (!in_array($folderName, self::ALLOWED_FOLDERS, true)) {
            throw new \Exception("Invalid folder name: \"{$folderName}\"");
        }

        if (!preg_match('/^data:image\/([A-Za-z-+\/]+);base64,(.+)$/', $data, $matches)) {
            throw new \Exception('Invalid base64 image data');
        }

        $fileType = strtolower($matches[1]);
        $extension = self::EXTENSION_MAP[$fileType] ?? null;
        if (!$extension) {
            throw new \Exception("Unsupported image type: {$fileType}");
        }

        $buffer = base64_decode($matches[2], true);
        if ($buffer === false) {
            throw new \Exception('Invalid base64 image data');
        }

        if (strlen($buffer) > self::MAX_IMAGE_SIZE) {
            throw new \Exception('Image must be 5MB or smaller');
        }

        $relativeDir = '/images/api/' . $folderName;
        $targetDir = public_path($relativeDir);
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = self::sanitizeId($id) . '_' . time() . '.' . $extension;
        file_put_contents($targetDir . '/' . $fileName, $buffer);

        return $relativeDir . '/' . $fileName;
    }

    public static function deleteImage(string $imageUrl): void
    {
        if (!$imageUrl) {
            return;
        }
        if (str_starts_with($imageUrl, '/api/image/') || !str_starts_with($imageUrl, '/images/api/')) {
            return;
        }
        if (str_contains($imageUrl, '..') || str_contains($imageUrl, '\\')) {
            return;
        }
        $filePath = public_path($imageUrl);
        if (is_file($filePath)) {
            @unlink($filePath);
        }
    }

    public static function saveVideo(string $data, string|int $id, ?string $originalName = null): string
    {
        if (!str_starts_with($data, 'data:video/')) {
            return $data;
        }

        if (!preg_match('/^data:video\/([A-Za-z-+]+);base64,(.+)$/', $data, $matches)) {
            throw new \Exception('Invalid base64 video data');
        }

        $fileType = strtolower($matches[1]);
        $extension = self::EXTENSION_MAP[$fileType] ?? null;
        if (!$extension) {
            throw new \Exception("Unsupported video type: {$fileType}");
        }

        $buffer = base64_decode($matches[2], true);
        if ($buffer === false) {
            throw new \Exception('Invalid base64 video data');
        }

        $sanitizedOriginal = $originalName ? preg_replace('/[^a-zA-Z0-9._-]/', '_', basename($originalName)) : '';
        $fileName = $sanitizedOriginal ?: self::sanitizeId($id) . '_' . time() . '.' . $extension;

        $targetDir = public_path('/video');
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        file_put_contents($targetDir . '/' . $fileName, $buffer);

        return '/video/' . $fileName;
    }

    public static function deleteVideo(string $videoUrl): void
    {
        if (!$videoUrl || !str_starts_with($videoUrl, '/video/')) {
            return;
        }
        if (str_contains($videoUrl, '..') || str_contains($videoUrl, '\\')) {
            return;
        }
        $filePath = public_path($videoUrl);
        if (is_file($filePath)) {
            @unlink($filePath);
        }
    }

    public static function isBase64Image(string $data): bool
    {
        return str_starts_with($data, 'data:image/');
    }

    public static function saveUploadedImage(
        \Illuminate\Http\UploadedFile $file,
        string $folderName,
        string|int $id,
        int $maxSize = 5 * 1024 * 1024
    ): string {
        if (!in_array($folderName, self::ALLOWED_FOLDERS, true)) {
            throw new \Exception("Invalid folder name: \"{$folderName}\"");
        }

        $extension = strtolower($file->getClientOriginalExtension());
        $extension = self::EXTENSION_MAP[$extension] ?? ($file->guessExtension() ?: 'jpg');
        $extension = self::EXTENSION_MAP[$extension] ?? 'jpg';

        if ($file->getSize() > $maxSize) {
            throw new \Exception('Image must be ' . (int) ($maxSize / 1024 / 1024) . 'MB or smaller');
        }

        $relativeDir = '/images/api/' . $folderName;
        $targetDir = public_path($relativeDir);
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = self::sanitizeId($id) . '_' . time() . '.' . $extension;
        $file->move($targetDir, $fileName);

        return $relativeDir . '/' . $fileName;
    }

    public static function isBase64Video(string $data): bool
    {
        return str_starts_with($data, 'data:video/');
    }

    private static function sanitizeId(string|int $id): string
    {
        $str = (string) $id;
        if (!preg_match('/^[a-zA-Z0-9_-]+$/', $str)) {
            throw new \Exception('Invalid resource ID');
        }
        return $str;
    }

    public static function normalizeVideoUrl(string $raw): string
    {
        $url = trim($raw);
        if (!$url) {
            return '';
        }

        if (preg_match('/(?:youtube\.com\/(?:watch\?(?:.*&)?v=|shorts\/|embed\/)|youtu\.be\/)([\w-]{6,})/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        if (preg_match('/drive\.google\.com\/file\/d\/([\w-]{6,})(?:\/(?:view|preview))?/', $url, $m)) {
            return 'https://drive.google.com/file/d/' . $m[1] . '/preview';
        }

        return $url;
    }

    public static function isSupportedVideoUrl(string $raw): bool
    {
        $url = trim($raw);
        if (!$url) {
            return false;
        }
        return (bool) preg_match('/(?:youtube\.com\/(?:watch\?(?:.*&)?v=|shorts\/|embed\/)|youtu\.be\/)([\w-]{6,})/', $url)
            || (bool) preg_match('/drive\.google\.com\/file\/d\/([\w-]{6,})(?:\/(?:view|preview))?/', $url);
    }

    public static function slugify(string $text): string
    {
        $slug = Str::slug($text);
        return $slug ?: Str::lower(Str::random(8));
    }
}