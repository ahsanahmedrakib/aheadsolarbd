<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Support\MediaHelper;
use App\Support\SiteData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $isAdmin = (bool) $this->tokenPayload($request);
        $projects = $isAdmin ? Project::orderBy('id')->get() : SiteData::projects();
        return $this->ok($projects);
    }

    public function store(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $data = $request->json()->all();
        if (empty($data['title']) || empty($data['slug'])) {
            return $this->error('title and slug are required');
        }

        $id = Project::max('id') + 1;
        $imageUrl = !empty($data['imageUrl']) ? MediaHelper::saveImage($data['imageUrl'], 'projects', $id) : '';
        $images = isset($data['images']) && is_array($data['images'])
            ? array_map(fn ($img) => MediaHelper::saveImage($img, 'projects', $id), $data['images'])
            : [];

        $project = Project::create([
            'title' => $data['title'],
            'image_url' => $imageUrl,
            'slug' => $data['slug'],
            'category' => $data['category'] ?? '',
            'is_featured' => $data['isFeatured'] ?? false,
            'client' => $data['client'] ?? '',
            'location' => $data['location'] ?? '',
            'project_details' => $data['projectDetails'] ?? '',
            'images' => $images,
        ]);

        return $this->ok($project);
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

        $project = Project::find($id);
        if (!$project) {
            return $this->error('Project not found', 404);
        }

        foreach (['title', 'slug', 'category', 'client', 'location', 'projectDetails'] as $key) {
            if (array_key_exists($key, $data)) {
                $column = $key === 'projectDetails' ? 'project_details' : $key;
                $project->{$column} = $data[$key];
            }
        }
        if (array_key_exists('isFeatured', $data)) {
            $project->is_featured = $data['isFeatured'];
        }

        if (!empty($data['imageUrl']) && $data['imageUrl'] !== $project->image_url) {
            $old = $project->image_url;
            $project->image_url = MediaHelper::saveImage($data['imageUrl'], 'projects', $project->id);
            MediaHelper::deleteImage($old);
        }

        if (isset($data['images']) && is_array($data['images'])) {
            $removed = array_diff($project->images ?? [], $data['images']);
            $project->images = array_map(fn ($img) => MediaHelper::saveImage($img, 'projects', $project->id), $data['images']);
            foreach ($removed as $img) {
                MediaHelper::deleteImage($img);
            }
        }

        $project->save();
        return $this->ok($project);
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

        $project = Project::find($id);
        if ($project) {
            MediaHelper::deleteImage($project->image_url);
            foreach ($project->images ?? [] as $img) {
                MediaHelper::deleteImage($img);
            }
            $project->delete();
        }
        return $this->ok();
    }
}