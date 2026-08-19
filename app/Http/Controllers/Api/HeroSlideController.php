<?php

namespace App\Http\Controllers\Api;

use App\Models\HeroSlide;
use App\Support\Defaults;
use App\Support\MediaHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HeroSlideController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $site = $request->query('site');
        $isAdmin = (bool) $this->tokenPayload($request);
        $stored = HeroSlide::orderBy('order')->orderBy('id')->get();

        if ($site === 'ahead' || $site === 'palash') {
            $stored = $stored->filter(fn ($s) => $s->site === $site)->values();
        }

        $data = $isAdmin
            ? $stored
            : ($stored->isNotEmpty() ? $stored : collect(Defaults::heroSlides())->filter(fn ($s) => ($s['site'] ?? null) === $site)->map(fn ($s) => new HeroSlide($s))->values());

        return $this->ok($data);
    }

    public function store(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $data = $request->json()->all();
        if (empty($data['title'])) {
            return $this->error('title is required');
        }

        $wantsVideoButton = $data['showVideoButton'] ?? false;
        $finalVideoUrl = '';
        if ($wantsVideoButton) {
            $rawVideoUrl = trim((string) ($data['videoUrl'] ?? ''));
            if (!$rawVideoUrl) {
                return $this->error('Video URL is required when Show video button is enabled');
            }
            if (!MediaHelper::isSupportedVideoUrl($rawVideoUrl)) {
                return $this->error('Video URL must be a YouTube watch link or a Google Drive view link');
            }
            $finalVideoUrl = MediaHelper::normalizeVideoUrl($rawVideoUrl);
        }

        $targetSite = ($data['site'] ?? 'ahead') === 'palash' ? 'palash' : 'ahead';

        $order = $data['order'] ?? null;
        if ($order === null) {
            $order = (HeroSlide::where('site', $targetSite)->max('order') ?? 0) + 1;
        }

        $slide = HeroSlide::create([
            'tagline' => $data['tagline'] ?? '',
            'title' => $data['title'],
            'title_accent' => $data['titleAccent'] ?? '',
            'description' => $data['description'] ?? '',
            'site' => $targetSite,
            'video_url' => $finalVideoUrl,
            'show_video_button' => $wantsVideoButton,
            'is_active' => $data['isActive'] ?? true,
            'order' => $order,
        ]);

        return $this->ok($slide);
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

        $slide = HeroSlide::find($id);
        if (!$slide) {
            return $this->error('Slide not found', 404);
        }

        foreach (['tagline', 'title', 'titleAccent', 'description'] as $key) {
            if (array_key_exists($key, $data)) {
                $column = $key === 'titleAccent' ? 'title_accent' : $key;
                $slide->{$column} = $data[$key];
            }
        }
        if (isset($data['site']) && in_array($data['site'], ['ahead', 'palash'], true)) {
            $slide->site = $data['site'];
        }

        $nextShowVideoButton = array_key_exists('showVideoButton', $data) ? $data['showVideoButton'] : $slide->show_video_button;
        $slide->show_video_button = $nextShowVideoButton;

        if (array_key_exists('videoUrl', $data) || (array_key_exists('showVideoButton', $data) && $nextShowVideoButton)) {
            if ($nextShowVideoButton) {
                $rawVideoUrl = array_key_exists('videoUrl', $data) ? trim((string) $data['videoUrl']) : (string) $slide->video_url;
                if (!$rawVideoUrl) {
                    return $this->error('Video URL is required when Show video button is enabled');
                }
                if (!MediaHelper::isSupportedVideoUrl($rawVideoUrl)) {
                    return $this->error('Video URL must be a YouTube watch link or a Google Drive view link');
                }
                $slide->video_url = MediaHelper::normalizeVideoUrl($rawVideoUrl);
            } else {
                $slide->video_url = '';
            }
        }

        if (array_key_exists('isActive', $data)) {
            $slide->is_active = $data['isActive'];
        }
        if (array_key_exists('order', $data)) {
            $slide->order = $data['order'];
        }

        $slide->save();
        return $this->ok($slide);
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

        HeroSlide::find($id)?->delete();
        return $this->ok();
    }
}