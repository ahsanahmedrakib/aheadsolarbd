<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Support\MediaHelper;
use App\Support\SiteData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $isAdmin = (bool) $this->tokenPayload($request);
        $services = $isAdmin ? Service::orderBy('id')->get() : SiteData::services();
        return $this->ok($services);
    }

    public function store(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $data = $request->json()->all();
        if (empty($data['title']) || empty($data['description']) || empty($data['slug'])) {
            return $this->error('title, description, and slug are required');
        }

        $id = Service::max('id') + 1;
        $image = !empty($data['image']) ? MediaHelper::saveImage($data['image'], 'services', $id) : '';
        $images = isset($data['images']) && is_array($data['images'])
            ? array_map(fn ($img) => MediaHelper::saveImage($img, 'services', $id), $data['images'])
            : [];

        $service = Service::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'service_details' => $data['serviceDetails'] ?? '',
            'image' => $image,
            'alt' => $data['alt'] ?? '',
            'icon_name' => $data['iconName'] ?? '',
            'slug' => $data['slug'],
            'images' => $images,
        ]);

        return $this->ok($service);
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

        $service = Service::find($id);
        if (!$service) {
            return $this->error('Service not found', 404);
        }

        foreach (['title', 'description', 'serviceDetails', 'alt', 'iconName', 'slug'] as $key) {
            if (array_key_exists($key, $data)) {
                $column = $key === 'serviceDetails' ? 'service_details' : ($key === 'iconName' ? 'icon_name' : $key);
                $service->{$column} = $data[$key];
            }
        }

        if (!empty($data['image']) && $data['image'] !== $service->image) {
            $old = $service->image;
            $service->image = MediaHelper::saveImage($data['image'], 'services', $service->id);
            MediaHelper::deleteImage($old);
        }

        if (isset($data['images']) && is_array($data['images'])) {
            $removed = array_diff($service->images ?? [], $data['images']);
            $service->images = array_map(fn ($img) => MediaHelper::saveImage($img, 'services', $service->id), $data['images']);
            foreach ($removed as $img) {
                MediaHelper::deleteImage($img);
            }
        }

        $service->save();
        return $this->ok($service);
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

        $service = Service::find($id);
        if ($service) {
            MediaHelper::deleteImage($service->image);
            foreach ($service->images ?? [] as $img) {
                MediaHelper::deleteImage($img);
            }
            $service->delete();
        }
        return $this->ok();
    }
}