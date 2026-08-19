<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\HeroSlide;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\TeamMember;
use App\Support\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        $heroSlides = HeroSlide::where('site', 'ahead')
            ->where('is_active', true)
            ->orderBy('order')->orderBy('id')->get();

        if ($heroSlides->isEmpty()) {
            $heroSlides = HeroSlide::where('site', 'ahead')->orderBy('order')->get();
        }

        return view('pages.home', [
            'heroSlides' => $heroSlides,
            'services' => Service::orderBy('id')->get(),
            'projects' => Project::orderBy('id')->get(),
            'blogs' => Blog::orderBy('date', 'desc')->limit(3)->get(),
            'reviews' => Review::orderBy('created_at', 'desc')->get(),
            'site' => 'ahead',
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'services' => Service::orderBy('id')->get(),
            'team' => TeamMember::orderBy('id')->get(),
            'reviews' => Review::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function services(): View
    {
        return view('pages.services', [
            'services' => Service::orderBy('id')->get(),
        ]);
    }

    public function service(string $slug): View
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $related = Service::where('id', '!=', $service->id)->inRandomOrder()->limit(3)->get();

        return view('pages.service-single', [
            'service' => $service,
            'related' => $related,
        ]);
    }

    public function projects(): View
    {
        $projects = Project::orderBy('id')->get();
        $categories = $projects->pluck('category')->unique()->values();

        return view('pages.projects', [
            'projects' => $projects,
            'categories' => $categories,
        ]);
    }

    public function project(string $slug): View
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $related = Project::where('id', '!=', $project->id)
            ->where('category', $project->category)
            ->orWhere('id', '!=', $project->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('pages.project-single', [
            'project' => $project,
            'related' => $related,
        ]);
    }

    public function blogs(): View
    {
        return view('pages.blogs', [
            'blogs' => Blog::orderBy('date', 'desc')->get(),
        ]);
    }

    public function blog(string $slug): View
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recent = Blog::where('id', '!=', $blog->id)->orderBy('date', 'desc')->limit(3)->get();

        return view('pages.blog-single', [
            'blog' => $blog,
            'recent' => $recent,
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'mapUrl' => SiteSettings::field('social', 'google-map'),
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
        $heroSlides = HeroSlide::where('site', 'palash')
            ->where('is_active', true)
            ->orderBy('order')->orderBy('id')->get();

        if ($heroSlides->isEmpty()) {
            $heroSlides = HeroSlide::where('site', 'palash')->orderBy('order')->get();
        }

        return view('pages.palash', [
            'heroSlides' => $heroSlides,
        ]);
    }

    public function login(): View
    {
        return view('pages.login');
    }
}