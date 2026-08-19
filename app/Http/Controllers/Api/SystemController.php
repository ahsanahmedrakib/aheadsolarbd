<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Models\ContactQuery;
use App\Models\HeroSlide;
use App\Models\PalashApplication;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SystemController extends BaseApiController
{
    public function db(Request $request): JsonResponse
    {
        if (($this->tokenPayload($request)['role'] ?? null) !== 'superadmin') {
            return $this->error('Unauthorized', 401);
        }

        $counts = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'blogs' => Blog::count(),
            'reviews' => Review::count(),
            'team' => TeamMember::count(),
            'heroSlides' => HeroSlide::count(),
            'users' => User::count(),
            'contactQueries' => ContactQuery::count(),
            'palashApplications' => PalashApplication::count(),
        ];

        return $this->ok([
            'storage' => 'database',
            'environment' => app()->environment(),
            'counts' => $counts,
        ]);
    }

    public function env(Request $request): JsonResponse
    {
        if (($this->tokenPayload($request)['role'] ?? null) !== 'superadmin') {
            return $this->error('Unauthorized', 401);
        }

        $required = ['JWT_SECRET', 'JWT_REFRESH_SECRET', 'DEFAULT_SUPERADMIN_EMAIL', 'DEFAULT_SUPERADMIN_PASSWORD'];
        $requiredStatus = array_map(fn ($key) => ['key' => $key, 'set' => (bool) env($key)], $required);
        $missingRequired = array_values(array_filter($requiredStatus, fn ($v) => !$v['set']));
        $missingRequired = array_map(fn ($v) => $v['key'], $missingRequired);

        return $this->ok([
            'required' => $requiredStatus,
            'missingRequired' => $missingRequired,
            'allSet' => empty($missingRequired),
        ]);
    }
}