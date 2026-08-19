<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Support\MediaHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $query = Blog::query();
        if ($search = trim((string) $request->query('search'))) {
            $query->where(fn ($q) => $q->where('title', 'like', "%{$search}%")->orWhere('category', 'like', "%{$search}%")->orWhere('content', 'like', "%{$search}%"));
        }
        $blogs = $query->orderBy('id')->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create(): View
    {
        return view('admin.blogs.form', ['item' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($this->normalizeSlug($request->input('slug'), $request->input('title')), null);
        $data['tags'] = array_values(array_filter(array_map('trim', explode(',', (string) $request->input('tags')))));

        $id = Blog::max('id') + 1;
        $data['image_url'] = $this->resolveImage($request, 'blogs', $id);
        $data['images'] = $this->resolveGallery($request, 'blogs', $id);
        $data['date'] = ($data['date'] ?? '') ?: now()->format('F j, Y');

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog): View
    {
        return view('admin.blogs.form', ['item' => $blog]);
    }

    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $data = $this->validated($request);
        $slug = $this->normalizeSlug($request->input('slug'), $request->input('title'));
        $data['slug'] = ($slug === $blog->slug) ? $blog->slug : $this->uniqueSlug($slug, $blog->id);
        $data['tags'] = array_values(array_filter(array_map('trim', explode(',', (string) $request->input('tags')))));
        $data['date'] = ($data['date'] ?? '') ?: now()->format('F j, Y');

        $data['image_url'] = $this->resolveImage($request, 'blogs', $blog->id, $blog->image_url);
        $data['images'] = $this->resolveGallery($request, 'blogs', $blog->id, $blog->images ?? []);

        $oldImage = $blog->image_url;
        $oldGallery = $blog->images ?? [];

        $blog->update($data);

        if (($oldImage ?? '') !== $data['image_url']) {
            MediaHelper::deleteImage($oldImage);
        }
        foreach (array_diff($oldGallery, $data['images']) as $removed) {
            MediaHelper::deleteImage($removed);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        MediaHelper::deleteImage($blog->image_url);
        foreach ($blog->images ?? [] as $img) {
            MediaHelper::deleteImage($img);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-z0-9-]*$/'],
            'category' => ['required', 'string', 'max:100'],
            'content' => ['nullable', 'string'],
            'tags' => ['nullable', 'string'],
            'date' => ['nullable', 'string', 'max:50'],
            'blog_details' => ['required', 'string', 'min:10'],
            'image_url' => ['nullable', 'string'],
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
        while (Blog::where('slug', $candidate)->where('id', '!=', $ignoreId)->exists()) {
            $candidate = $slug . '-' . $i++;
        }
        return $candidate;
    }

    private function resolveImage(Request $request, string $folder, string|int $id, ?string $current = null): string
    {
        if ($request->hasFile('image_url_file')) {
            return MediaHelper::saveUploadedImage($request->file('image_url_file'), $folder, $id);
        }
        $value = trim((string) $request->input('image_url', ''));
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