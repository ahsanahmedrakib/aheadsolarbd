<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Support\MediaHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $query = Project::query();
        if ($search = trim((string) $request->query('search'))) {
            $query->where(fn ($q) => $q->where('title', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%"));
        }
        $projects = $query->orderBy('id')->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('admin.projects.form', ['item' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($this->normalizeSlug($request->input('slug'), $request->input('title')), null);
        $data['is_featured'] = $request->boolean('is_featured');

        $id = Project::max('id') + 1;
        $data['image_url'] = $this->resolveImage($request, 'projects', $id);
        $data['images'] = $this->resolveGallery($request, 'projects', $id);
        $data['project_details'] = $data['project_details'] ?? '';

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.form', ['item' => $project]);
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $data = $this->validated($request);
        $slug = $this->normalizeSlug($request->input('slug'), $request->input('title'));
        $data['slug'] = ($slug === $project->slug) ? $project->slug : $this->uniqueSlug($slug, $project->id);
        $data['is_featured'] = $request->boolean('is_featured');

        $data['image_url'] = $this->resolveImage($request, 'projects', $project->id, $project->image_url);
        $data['images'] = $this->resolveGallery($request, 'projects', $project->id, $project->images ?? []);

        $oldImage = $project->image_url;
        $oldGallery = $project->images ?? [];

        $project->update($data);

        if (($oldImage ?? '') !== $data['image_url']) {
            MediaHelper::deleteImage($oldImage);
        }
        foreach (array_diff($oldGallery, $data['images']) as $removed) {
            MediaHelper::deleteImage($removed);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        MediaHelper::deleteImage($project->image_url);
        foreach ($project->images ?? [] as $img) {
            MediaHelper::deleteImage($img);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-z0-9-]*$/'],
            'category' => ['required', 'string', 'max:100'],
            'client' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
            'project_details' => ['required', 'string', 'min:10'],
            'image_url' => ['nullable', 'string'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'string'],
        ]);
    }

    private function normalizeSlug(?string $slug, ?string $title): string
    {
        $base = trim($slug ?: ($title ? Str::slug($title) : ''));
        $base = $base === '' ? 'project' : $base;
        return preg_replace('/[^a-z0-9-]+/', '', Str::lower($base)) ?: 'project';
    }

    private function uniqueSlug(string $slug, ?int $ignoreId): string
    {
        $candidate = $slug;
        $i = 1;
        while (Project::where('slug', $candidate)->where('id', '!=', $ignoreId)->exists()) {
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