<?php

namespace App\Http\Middleware;

use App\Models\SiteVisit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TrackSiteVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $visitorId = $request->cookie('pf_visitor_id') ?: (string) Str::uuid();
        $isNewVisitor = ! $request->hasCookie('pf_visitor_id');

        $response = $next($request);

        if ($this->shouldTrack($request, $response) && $this->visitsTableExists()) {
            SiteVisit::query()->create([
                'visitor_id' => $visitorId,
                'ip_address' => $request->ip(),
                'method' => $request->method(),
                'path' => '/'.ltrim($request->path(), '/'),
                'url' => $request->fullUrl(),
                'route_name' => $request->route()?->getName(),
                'referer' => $request->headers->get('referer'),
                'user_agent' => $request->userAgent(),
                'visited_at' => now(),
            ]);
        }

        if ($isNewVisitor && method_exists($response, 'withCookie')) {
            $response->withCookie(cookie(
                'pf_visitor_id',
                $visitorId,
                60 * 24 * 365,
                null,
                null,
                $request->isSecure(),
                true,
                false,
                'Lax'
            ));
        }

        return $response;
    }

    private function shouldTrack(Request $request, Response $response): bool
    {
        return $request->isMethod('GET')
            && $response->getStatusCode() < 400
            && ! $request->is('admin*')
            && ! $request->is('build*')
            && ! $request->is('images*')
            && ! $request->is('catalog*')
            && ! $request->is('storage*')
            && ! $request->expectsJson();
    }

    private function visitsTableExists(): bool
    {
        static $exists = null;

        return $exists ??= Schema::hasTable('site_visits');
    }
}
