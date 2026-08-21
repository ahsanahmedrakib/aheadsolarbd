<?php

use App\Http\Middleware\ApiAuthenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'api.auth' => ApiAuthenticate::class,
        ]);
        $middleware->trustProxies(at: env('CC_REVERSE_PROXY_IPS'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );

        // Gracefully handle file-upload failures (e.g. exceeding upload_max_filesize)
        // instead of surfacing a raw 500 error page.
        $exceptions->render(function (FileException $e, Request $request) {
            $message = 'The uploaded file is invalid or exceeds the maximum allowed size. Please upload a smaller file.';

            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json(['message' => $message], 422);
            }

            return redirect()->back()->withInput()->with('error', $message);
        });
    })->create();