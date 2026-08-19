<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Support\MediaHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(Request $request): View
    {
        $query = Service::query();
        if ($search = trim((string) $request->query('search'))) {
            $query->where(fn ($q) => $q->where('title', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%"));
        }
        $services = $query->orderBy('id')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.form', ['item' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($this->normalizeSlug($request->input('slug'), $request->input('title')), null);

        $id = Service::max('id') + 1;
        $data['image'] = $this->resolveImage($request, 'services', $id);
        $data['images'] = $this->resolveGallery($request, 'services', $id);
        $data['service_details'] = $data['service_details'] ?? '';

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.form', ['item' => $service]);
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $data = $this->validated($request);
        $slug = $this->normalizeSlug($request->input('slug'), $request->input('title'));
        $data['slug'] = ($slug === $service->slug) ? $service->slug : $this->uniqueSlug($slug, $service->id);

        $data['image'] = $this->resolveImage($request, 'services', $service->id, $service->image);
        $data['images'] = $this->resolveGallery($request, 'services', $service->id, $service->images ?? []);

        $oldImage = $service->image;
        $oldGallery = $service->images ?? [];

        $service->update($data);

        if (($oldImage ?? '') !== $data['image']) {
            MediaHelper::deleteImage($oldImage);
        }
        foreach (array_diff($oldGallery, $data['images']) as $removed) {
            MediaHelper::deleteImage($removed);
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        MediaHelper::deleteImage($service->image);
        foreach ($service->images ?? [] as $img) {
            MediaHelper::deleteImage($img);
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-z0-9-]*$/'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
            'service_details' => ['required', 'string', 'min:10'],
            'alt' => ['required', 'string', 'min:5', 'max:255'],
            'icon_name' => ['required', 'string', 'max:50'],
            'image' => ['nullable', 'string'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'string'],
        ]);
    }

    private function normalizeSlug(?string $slug, ?string $title): string
    {
        $base = trim($slug ?: ($title ? Str::slug($title) : ''));
        $base = $base === '' ? 'service' : $base;
        return preg_replace('/[^a-z0-9-]+/', '', Str::lower($base)) ?: 'service';
    }

    private function uniqueSlug(string $slug, ?int $ignoreId): string
    {
        $candidate = $slug;
        $i = 1;
        while (Service::where('slug', $candidate)->where('id', '!=', $ignoreId)->exists()) {
            $candidate = $slug . '-' . $i++;
        }
        return $candidate;
    }

    private function resolveImage(Request $request, string $folder, string|int $id, ?string $current = null): string
    {
        if ($request->hasFile('image_file')) {
            return MediaHelper::saveUploadedImage($request->file('image_file'), $folder, $id);
        }
        $value = trim((string) $request->input('image', ''));
        if ($value === '') {
            return (string) $current;
        }
        if (MediaHelper::isBase64Image($value)) {
            return MediaHelper::saveImage($value, $folder, $id);
        }
        return $value;
    }

    private function resolveGallery(Request $request, string $folder, string|int $id, array $current = []): array
    {
        if ($request->hasFile('images_files')) {
            $paths = [];
            foreach ($request->file('images_files') as $file) {
                $paths[] = MediaHelper::saveUploadedImage($file, $folder, $id);
            }
            return array_values(array_filter($paths));
        }
        $list = $request->input('images', []);
        if (!is_array($list)) {
            $list = [];
        }
        $out = [];
        foreach ($list as $img) {
            $img = trim((string) $img);
            if ($img === '') {
                continue;
            }
            $out[] = MediaHelper::isBase64Image($img) ? MediaHelper::saveImage($img, $folder, $id) : $img;
        }
        return $out;
    }
}