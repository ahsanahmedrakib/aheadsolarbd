<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Support\MediaHelper;
use App\Support\SiteData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $isAdmin = (bool) $this->tokenPayload($request);
        $blogs = $isAdmin ? Blog::orderBy('id')->get() : SiteData::blogs();
        return $this->ok($blogs);
    }

    public function store(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $data = $request->json()->all();
        $title = $data['title'] ?? null;
        $slug = $data['slug'] ?? null;
        if (!$title || !$slug) {
            return $this->error('title and slug are required');
        }

        $id = Blog::max('id') + 1;
        $imageUrl = !empty($data['imageUrl']) ? MediaHelper::saveImage($data['imageUrl'], 'blogs', $id) : '';
        $images = isset($data['images']) && is_array($data['images'])
            ? array_map(fn ($img) => MediaHelper::saveImage($img, 'blogs', $id), $data['images'])
            : [];

        $blog = Blog::create([
            'title' => $title,
            'category' => $data['category'] ?? '',
            'image_url' => $imageUrl,
            'slug' => $slug,
            'content' => $data['content'] ?? '',
            'tags' => $data['tags'] ?? [],
            'date' => $data['date'] ?? now()->format('M d, Y'),
            'blog_details' => $data['blogDetails'] ?? '',
            'images' => $images,
        ]);

        return $this->ok($blog);
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

        $blog = Blog::find($id);
        if (!$blog) {
            return $this->error('Blog not found', 404);
        }

        foreach (['title', 'category', 'slug', 'content', 'tags', 'date', 'blogDetails'] as $key) {
            if (array_key_exists($key, $data)) {
                $column = $key === 'blogDetails' ? 'blog_details' : $key;
                $blog->{$column} = $data[$key];
            }
        }

        if (!empty($data['imageUrl']) && $data['imageUrl'] !== $blog->image_url) {
            $old = $blog->image_url;
            $blog->image_url = MediaHelper::saveImage($data['imageUrl'], 'blogs', $blog->id);
            MediaHelper::deleteImage($old);
        }

        if (isset($data['images']) && is_array($data['images'])) {
            $removed = array_diff($blog->images ?? [], $data['images']);
            $blog->images = array_map(fn ($img) => MediaHelper::saveImage($img, 'blogs', $blog->id), $data['images']);
            foreach ($removed as $img) {
                MediaHelper::deleteImage($img);
            }
        }

        $blog->save();
        return $this->ok($blog);
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

        $blog = Blog::find($id);
        if ($blog) {
            MediaHelper::deleteImage($blog->image_url);
            foreach ($blog->images ?? [] as $img) {
                MediaHelper::deleteImage($img);
            }
            $blog->delete();
        }
        return $this->ok();
    }
}