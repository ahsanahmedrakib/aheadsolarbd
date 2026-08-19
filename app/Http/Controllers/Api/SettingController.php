<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Support\MediaHelper;
use App\Support\SiteSettings;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $setting = Setting::first();
        $sections = $setting?->sections;
        $data = $sections ? SiteSettings::stripHardcodedFields($sections) : null;
        return $this->ok($data);
    }

    public function store(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $data = $request->json()->all();
        $sections = $data['sections'] ?? null;
        if (!is_array($sections)) {
            return $this->error('sections array is required');
        }

        $existing = Setting::first()?->sections ?? [];

        $processed = array_map(function ($section) {
            if (empty($section['fields'])) {
                return $section;
            }
            $section['fields'] = array_map(function ($field) {
                if (($field['type'] ?? null) === 'image' && MediaHelper::isBase64Image((string) ($field['value'] ?? ''))) {
                    $field['value'] = MediaHelper::saveImage($field['value'], 'settings', $field['id']);
                }
                return $field;
            }, $section['fields']);
            return $section;
        }, SiteSettings::stripHardcodedFields($sections));

        // Delete removed image fields
        foreach ($processed as $section) {
            $existingSection = collect($existing)->firstWhere('id', $section['id']);
            $existingImageFields = array_values(array_filter($existingSection['fields'] ?? [], fn ($f) => ($f['type'] ?? null) === 'image'));
            $removed = array_filter($existingImageFields, function ($f) use ($section) {
                $current = array_values(array_filter($section['fields'] ?? [], fn ($nf) => $nf['id'] === $f['id']));
                return empty($current) || ($current[0]['value'] ?? null) !== $f['value'];
            });
            foreach ($removed as $f) {
                MediaHelper::deleteImage($f['value']);
            }
        }

        $setting = Setting::first() ?? new Setting();
        $setting->sections = $processed;
        $setting->save();

        return $this->ok();
    }
}