<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactQuery;
use App\Models\HeroSlide;
use App\Models\PalashApplication;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'services' => Service::count(),
                'projects' => Project::count(),
                'reviews' => Review::count(),
                'team' => TeamMember::count(),
                'heroSlides' => HeroSlide::count(),
                'users' => User::count(),
                'contactQueries' => ContactQuery::count(),
                'palashApplications' => PalashApplication::count(),
            ],
        ]);
    }
}