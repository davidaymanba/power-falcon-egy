<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteVisit;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AnalyticsController extends Controller
{
    public function index(): View
    {
        if (! Schema::hasTable('site_visits')) {
            return view('admin.analytics.index', [
                'trackingReady' => false,
                'totalVisits' => 0,
                'uniqueVisitors' => 0,
                'todayVisits' => 0,
                'lastSevenDaysVisits' => 0,
                'topPages' => collect(),
                'latestVisits' => collect(),
            ]);
        }

        $today = now()->startOfDay();
        $lastSevenDays = now()->subDays(6)->startOfDay();

        return view('admin.analytics.index', [
            'trackingReady' => true,
            'totalVisits' => SiteVisit::query()->count(),
            'uniqueVisitors' => SiteVisit::query()
                ->whereNotNull('visitor_id')
                ->distinct('visitor_id')
                ->count('visitor_id'),
            'todayVisits' => SiteVisit::query()
                ->where('visited_at', '>=', $today)
                ->count(),
            'lastSevenDaysVisits' => SiteVisit::query()
                ->where('visited_at', '>=', $lastSevenDays)
                ->count(),
            'topPages' => SiteVisit::query()
                ->select('path', DB::raw('count(*) as visits_count'))
                ->groupBy('path')
                ->orderByDesc('visits_count')
                ->limit(8)
                ->get(),
            'latestVisits' => SiteVisit::query()
                ->latest('visited_at')
                ->limit(20)
                ->get(),
        ]);
    }
}
