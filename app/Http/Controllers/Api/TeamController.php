<?php

namespace App\Http\Controllers\Api;

use App\Models\TeamMember;
use App\Support\MediaHelper;
use App\Support\SiteData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $isAdmin = (bool) $this->tokenPayload($request);
        $members = $isAdmin ? TeamMember::orderBy('id')->get() : SiteData::team();
        return $this->ok($members);
    }

    public function store(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }

        $data = $request->json()->all();
        if (empty($data['name']) || empty($data['role'])) {
            return $this->error('name and role are required');
        }

        $id = TeamMember::max('id') + 1;
        $image = !empty($data['image']) ? MediaHelper::saveImage($data['image'], 'team', $id) : '';

        $member = TeamMember::create([
            'name' => $data['name'],
            'role' => $data['role'],
            'image' => $image,
            'bio' => $data['bio'] ?? null,
            'social_links' => $data['socialLinks'] ?? null,
        ]);

        return $this->ok($member);
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

        $member = TeamMember::find($id);
        if (!$member) {
            return $this->error('Team member not found', 404);
        }

        foreach (['name', 'role', 'bio'] as $key) {
            if (array_key_exists($key, $data)) {
                $member->{$key} = $data[$key];
            }
        }
        if (array_key_exists('socialLinks', $data)) {
            $member->social_links = $data['socialLinks'];
        }

        if (!empty($data['image']) && $data['image'] !== $member->image) {
            $old = $member->image;
            $member->image = MediaHelper::saveImage($data['image'], 'team', $member->id);
            MediaHelper::deleteImage($old);
        }

        $member->save();
        return $this->ok($member);
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

        $member = TeamMember::find($id);
        if ($member) {
            MediaHelper::deleteImage($member->image);
            $member->delete();
        }
        return $this->ok();
    }
}