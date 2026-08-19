<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload) {
            return $this->error('Unauthorized', 401);
        }
        $users = User::orderBy('id')->get()->map(fn ($u) => $u->only(['id', 'name', 'email', 'role', 'created_at', 'updated_at']));
        return $this->ok($users);
    }

    public function store(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload || ($payload['role'] ?? null) !== 'superadmin') {
            return $this->error('Only superadmin can create users', 403);
        }

        $data = $request->json()->all();
        $name = $data['name'] ?? null;
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (!$name || !$email || !$password) {
            return $this->error('Name, email, and password are required');
        }
        if (strlen($password) < 6) {
            return $this->error('Password must be at least 6 characters');
        }
        if (isset($data['role']) && !in_array($data['role'], ['admin', 'superadmin'], true)) {
            return $this->error("Role must be 'admin' or 'superadmin'");
        }
        if (User::where('email', strtolower($email))->exists()) {
            return $this->error('A user with this email already exists', 409);
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $data['role'] ?? 'admin',
        ]);

        return $this->ok($user->only(['id', 'name', 'email', 'role', 'created_at', 'updated_at']));
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
            return $this->error('User ID is required');
        }

        $user = User::find($id);
        if (!$user) {
            return $this->error('User not found', 404);
        }

        $isSuperadmin = ($payload['role'] ?? null) === 'superadmin';
        $isOwnProfile = (string) $payload['userId'] === (string) $id;

        if (!$isSuperadmin && !$isOwnProfile) {
            return $this->error('You can only update your own profile', 403);
        }
        if (isset($data['role']) && !$isSuperadmin) {
            return $this->error('Only superadmin can change roles', 403);
        }
        if (isset($data['role']) && !in_array($data['role'], ['admin', 'superadmin'], true)) {
            return $this->error("Role must be 'admin' or 'superadmin'");
        }

        if (!empty($data['name'])) {
            $user->name = $data['name'];
        }
        if (!empty($data['email']) && $isSuperadmin) {
            if (User::where('email', strtolower($data['email']))->where('id', '!=', $id)->exists()) {
                return $this->error('Email already in use', 409);
            }
            $user->email = $data['email'];
        }
        if (isset($data['role']) && $isSuperadmin) {
            $user->role = $data['role'];
        }
        if (!empty($data['password'])) {
            if (strlen($data['password']) < 6) {
                return $this->error('Password must be at least 6 characters');
            }
            $user->password = Hash::make($data['password']);
        }

        $user->save();
        return $this->ok($user->only(['id', 'name', 'email', 'role', 'created_at', 'updated_at']));
    }

    public function destroy(Request $request): JsonResponse
    {
        $payload = $this->tokenPayload($request);
        if (!$payload || ($payload['role'] ?? null) !== 'superadmin') {
            return $this->error('Only superadmin can delete users', 403);
        }

        $id = $request->query('id');
        if (!$id) {
            return $this->error('User ID is required');
        }

        $user = User::find($id);
        if (!$user) {
            return $this->error('User not found', 404);
        }

        if ($user->role === 'superadmin' && User::where('role', 'superadmin')->count() <= 1) {
            return $this->error('Cannot delete the only superadmin account', 403);
        }

        $user->delete();
        return $this->ok();
    }
}