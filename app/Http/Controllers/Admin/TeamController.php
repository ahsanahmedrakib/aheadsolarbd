<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Support\MediaHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(Request $request): View
    {
        $query = TeamMember::query();
        if ($search = trim((string) $request->query('search'))) {
            $query->where(fn ($q) => $q->where('name', 'like', "%{$search}%")->orWhere('role', 'like', "%{$search}%"));
        }
        $team = $query->orderBy('id')->get();

        return view('admin.team.index', compact('team'));
    }

    public function create(): View
    {
        return view('admin.team.form', ['item' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $social = $this->socialLinks($request);
        if ($social !== null) {
            $data['social_links'] = $social;
        }

        $id = TeamMember::max('id') + 1;
        $data['image'] = $this->resolveImage($request, 'team', $id);

        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $team): View
    {
        return view('admin.team.form', ['item' => $team]);
    }

    public function update(Request $request, TeamMember $team): RedirectResponse
    {
        $data = $this->validated($request);
        $data['social_links'] = $this->socialLinks($request) ?? [];

        $oldImage = $team->image;
        $data['image'] = $this->resolveImage($request, 'team', $team->id, $oldImage);

        $team->update($data);

        if (($oldImage ?? '') !== $data['image']) {
            MediaHelper::deleteImage($oldImage);
        }

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team): RedirectResponse
    {
        MediaHelper::deleteImage($team->image);
        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'role' => ['required', 'string', 'max:100'],
            'bio' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'image_file' => ['nullable', 'file', 'max:5120'],
            'social_facebook' => ['nullable', 'string'],
            'social_instagram' => ['nullable', 'string'],
            'social_x' => ['nullable', 'string'],
            'social_linkedin' => ['nullable', 'string'],
        ]);
    }

    private function socialLinks(Request $request): ?array
    {
        $map = [
            'facebook' => 'social_facebook',
            'instagram' => 'social_instagram',
            'x' => 'social_x',
            'linkedin' => 'social_linkedin',
        ];
        $social = [];
        foreach ($map as $key => $input) {
            $value = trim((string) $request->input($input, ''));
            if ($value !== '') {
                $social[$key] = $value;
            }
        }
        return count($social) > 0 ? $social : null;
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
}