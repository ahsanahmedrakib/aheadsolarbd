<?php

namespace App\Support;

use App\Models\Blog;
use App\Models\HeroSlide;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Support\Collection;

/**
 * Database-backed content with default fallback data.
 *
 * Mirrors the original Next.js "readDataFile(FILE, DEFAULT_*)" pattern:
 * - If the database already holds records for an entity, those are returned.
 * - If the database is empty, the bundled default (fallback) data is returned
 *   so the public site never appears empty before an admin adds content.
 * - Admin-facing consumers (admin panel, authenticated API calls) should use
 *   the query()/allDb() helpers to see ONLY stored database records.
 */
class SiteData
{
    public static function services(): Collection
    {
        $data = Service::query()->orderBy('id')->get();
        if ($data->isNotEmpty()) {
            return $data;
        }
        return static::toModels(Service::class, Defaults::services());
    }

    public static function projects(): Collection
    {
        $data = Project::query()->orderBy('id')->get();
        if ($data->isNotEmpty()) {
            return $data;
        }
        return static::toModels(Project::class, Defaults::projects());
    }

    public static function blogs(): Collection
    {
        $data = Blog::query()->orderBy('date', 'desc')->get();
        if ($data->isNotEmpty()) {
            return $data;
        }
        return static::toModels(Blog::class, Defaults::blogs());
    }

    public static function team(): Collection
    {
        $data = TeamMember::query()->orderBy('id')->get();
        if ($data->isNotEmpty()) {
            return $data;
        }
        return static::toModels(TeamMember::class, Defaults::team());
    }

    /**
     * Public reviews: approved database reviews when any exist, otherwise the
     * bundled default testimonials. Never returns pending reviews.
     */
    public static function reviews(): Collection
    {
        $approved = Review::query()
            ->where('status', Review::STATUS_APPROVED)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($approved->isNotEmpty()) {
            return $approved;
        }

        return static::toModels(Review::class, Defaults::reviews());
    }

    /**
     * All stored reviews (admin view), newest first.
     */
    public static function allReviewsDb(): Collection
    {
        return Review::query()->orderBy('id', 'desc')->get();
    }

    public static function heroSlides(string $site): Collection
    {
        $stored = HeroSlide::query()
            ->where('site', $site)
            ->where('is_active', true)
            ->orderBy('order')->orderBy('id')
            ->get();

        if ($stored->isNotEmpty()) {
            return $stored;
        }

        return collect(Defaults::heroSlides())
            ->filter(fn ($slide) => ($slide['site'] ?? null) === $site)
            ->map(fn ($slide) => new HeroSlide($slide))
            ->values();
    }

    /**
     * Hydrate an Eloquent model collection from plain arrays.
     *
     * @template T of \Illuminate\Database\Eloquent\Model
     * @param  class-string<T>  $model
     * @param  array<int, array<string, mixed>>  $rows
     * @return Collection<int, T>
     */
    private static function toModels(string $model, array $rows): Collection
    {
        return collect($rows)->map(fn ($row) => new $model($row));
    }
}