<?php

namespace App\Http\Controllers;

use App\Support\SiteData;
use App\Support\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'heroSlides' => SiteData::heroSlides('ahead'),
            'services' => SiteData::services(),
            'projects' => SiteData::projects(),
            'reviews' => SiteData::reviews(),
            'site' => 'ahead',
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'services' => SiteData::services(),
            'team' => SiteData::team(),
            'reviews' => SiteData::reviews(),
        ]);
    }

    public function companyProfile(): View
    {
        return view('pages.about-company-profile', [
            'team' => SiteData::team(),
            'reviews' => SiteData::reviews(),
        ]);
    }

    public function sisterConcern(): View
    {
        return view('pages.about-sister-concern');
    }

    public function mdMessage(): View
    {
        return view('pages.about-md-message');
    }

    public function ourManagement(): View
    {
        return view('pages.about-our-management', [
            'team' => SiteData::team(),
        ]);
    }

    public function services(): View
    {
        return view('pages.services', [
            'services' => SiteData::services(),
        ]);
    }

    public function service(string $slug): View
    {
        $service = SiteData::services()->firstWhere('slug', $slug);
        if (!$service) {
            abort(404);
        }

        $related = SiteData::services()
            ->where('slug', '!=', $service->slug)
            ->shuffle()
            ->take(3)
            ->values();

        return view('pages.service-single', [
            'service' => $service,
            'related' => $related,
        ]);
    }

    public function projects(): View
    {
        $projects = SiteData::projects();
        $categories = $projects->pluck('category')->unique()->values();

        return view('pages.projects', [
            'projects' => $projects,
            'categories' => $categories,
            'heroSlides' => SiteData::heroSlides('projects'),
        ]);
    }

    public function project(string $slug): View
    {
        $project = SiteData::projects()->firstWhere('slug', $slug);
        if (!$project) {
            abort(404);
        }

        return view('pages.project-single', [
            'project' => $project,
            'allProjects' => SiteData::projects(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'mapUrl' => SiteSettings::field('general', 'google-map'),
            'email' => SiteSettings::field('general', 'contact-email'),
            'phone' => SiteSettings::field('general', 'phone-number'),
            'address' => SiteSettings::field('general', 'hq-address'),
        ]);
    }

    public function solution(string $type): View
    {
        if (!in_array($type, ['capex', 'opex', 'bot', 'comparison'], true)) {
            abort(404);
        }

        return view("pages.solution-{$type}");
    }

    public function palash(): View
    {
        return view('pages.palash', [
            'heroSlides' => SiteData::heroSlides('palash'),
            'chatWidgetOverrides' => [
                'facebook' => [
                    'title' => 'Visit Palash Charging Station on Facebook',
                    'href' => 'https://www.facebook.com/profile.php?id=61589795817520',
                ],
                'messenger' => [
                    'title' => 'Chat with Palash Charging Station on Messenger',
                    'href' => 'https://m.me/61589795817520',
                ],
            ],
        ]);
    }

    public function login(): View
    {
        return view('pages.login');
    }
}