<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use App\Support\MediaHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeroSliderController extends Controller
{
    public function index(): View
    {
        $slides = HeroSlide::query()->orderBy('order')->get();

        return view('admin.hero-slider.index', compact('slides'));
    }

    public function create(): View
    {
        return view('admin.hero-slider.form', ['item' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['show_video_button'] = $request->boolean('show_video_button');
        $data['is_active'] = $request->boolean('is_active');
        if (!$request->filled('order')) {
            $data['order'] = (int) HeroSlide::max('order') + 1;
        }

        $id = HeroSlide::max('id') + 1;
        $data['background_video'] = $this->resolveVideo($request, $id);

        HeroSlide::create($data);

        return redirect()->route('admin.hero-slider.index')->with('success', 'Hero slide created successfully.');
    }

    public function edit(HeroSlide $hero_slider): View
    {
        return view('admin.hero-slider.form', ['item' => $hero_slider]);
    }

    public function update(Request $request, HeroSlide $hero_slider): RedirectResponse
    {
        $data = $this->validated($request);
        $data['show_video_button'] = $request->boolean('show_video_button');
        $data['is_active'] = $request->boolean('is_active');
        if (!$request->filled('order')) {
            $data['order'] = (int) HeroSlide::max('order') + 1;
        }

        $oldVideo = $hero_slider->background_video;
        $data['background_video'] = $this->resolveVideo($request, $hero_slider->id, $oldVideo);

        $hero_slider->update($data);

        if (($oldVideo ?? '') !== $data['background_video'] && $oldVideo && str_starts_with($oldVideo, '/video/')) {
            MediaHelper::deleteVideo($oldVideo);
        }

        return redirect()->route('admin.hero-slider.index')->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $hero_slider): RedirectResponse
    {
        if ($hero_slider->background_video && str_starts_with($hero_slider->background_video, '/video/')) {
            MediaHelper::deleteVideo($hero_slider->background_video);
        }
        $hero_slider->delete();

        return redirect()->route('admin.hero-slider.index')->with('success', 'Hero slide deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'tagline' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:200'],
            'title_accent' => ['nullable', 'string', 'max:200'],
            'description' => ['required', 'string', 'min:10'],
            'background_video' => ['nullable', 'string'],
            'site' => ['required', 'string', 'in:ahead,palash'],
            'video_url' => ['nullable', 'string'],
            'show_video_button' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer', 'min:1'],
        ]);
    }

    private function resolveVideo(Request $request, string|int $id, ?string $current = null): string
    {
        $value = trim((string) $request->input('background_video', ''));
        if ($value === '') {
            return (string) $current;
        }
        if (MediaHelper::isBase64Video($value)) {
            return MediaHelper::saveVideo($value, $id);
        }
        return $value;
    }
}