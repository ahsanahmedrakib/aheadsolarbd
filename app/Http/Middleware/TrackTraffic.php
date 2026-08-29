<?php

namespace App\Http\Middleware;

use App\Models\Traffic;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackTraffic
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->wantsJson() || $request->is('admin/*', 'login', 'logout', 'favicon.ico')) {
            return $response;
        }

        $cookieName = 'traffic_visited_' . now()->toDateString();

        try {
            // Only count one unique visitor per browser per day.
            if ($request->hasCookie($cookieName)) {
                return $response;
            }

            Traffic::track();

            $response->withCookie(
                cookie($cookieName, '1', 60 * 24 * 2, '/', null, false, true)
            );
        } catch (\Throwable) {
            // Never let tracking break the request.
        }

        return $response;
    }
}
