@extends('layouts.admin', ['title' => __('admin.analytics.title')])

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-black text-[#111827]">{{ __('admin.analytics.title') }}</h1>
    <p class="mt-1 text-sm text-slate-500">{{ __('admin.analytics.intro') }}</p>
</div>

@if (! $trackingReady)
    <div class="mb-6 rounded border border-amber-200 bg-amber-50 px-4 py-3 text-sm font-semibold text-amber-800">
        {{ __('admin.analytics.not_ready') }}
    </div>
@endif

<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    <div class="pf-card rounded-lg p-5">
        <p class="text-sm font-bold text-slate-500">{{ __('admin.analytics.total_visits') }}</p>
        <p class="mt-3 text-3xl font-black text-[#111827]">{{ number_format($totalVisits) }}</p>
    </div>
    <div class="pf-card rounded-lg p-5">
        <p class="text-sm font-bold text-slate-500">{{ __('admin.analytics.unique_visitors') }}</p>
        <p class="mt-3 text-3xl font-black text-[#111827]">{{ number_format($uniqueVisitors) }}</p>
    </div>
    <div class="pf-card rounded-lg p-5">
        <p class="text-sm font-bold text-slate-500">{{ __('admin.analytics.today_visits') }}</p>
        <p class="mt-3 text-3xl font-black text-[#111827]">{{ number_format($todayVisits) }}</p>
    </div>
    <div class="pf-card rounded-lg p-5">
        <p class="text-sm font-bold text-slate-500">{{ __('admin.analytics.last_seven_days') }}</p>
        <p class="mt-3 text-3xl font-black text-[#111827]">{{ number_format($lastSevenDaysVisits) }}</p>
    </div>
</div>

<div class="mt-6 grid gap-6 lg:grid-cols-[minmax(0,1fr)_minmax(0,2fr)]">
    <section class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-5 py-4">
            <h2 class="text-lg font-black text-[#111827]">{{ __('admin.analytics.top_pages') }}</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[360px] text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-4 py-3">{{ __('admin.analytics.page') }}</th>
                        <th class="px-4 py-3 text-right">{{ __('admin.analytics.visits') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($topPages as $page)
                        <tr>
                            <td class="px-4 py-3 font-semibold text-slate-900">{{ $page->path }}</td>
                            <td class="px-4 py-3 text-right text-slate-600">{{ number_format($page->visits_count) }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="2" class="px-4 py-10 text-center text-slate-500">{{ __('admin.analytics.empty') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-5 py-4">
            <h2 class="text-lg font-black text-[#111827]">{{ __('admin.analytics.latest_visits') }}</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-4 py-3">{{ __('admin.analytics.visitor') }}</th>
                        <th class="px-4 py-3">{{ __('admin.analytics.page') }}</th>
                        <th class="px-4 py-3">{{ __('admin.analytics.device') }}</th>
                        <th class="px-4 py-3">{{ __('admin.analytics.referer') }}</th>
                        <th class="px-4 py-3 text-right">{{ __('admin.analytics.time') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($latestVisits as $visit)
                        <tr>
                            <td class="px-4 py-3 font-semibold text-slate-900">{{ $visit->ip_address ?: '-' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $visit->path }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $visit->device_name }} / {{ $visit->browser_name }}</td>
                            <td class="max-w-[220px] truncate px-4 py-3 text-slate-600" title="{{ $visit->referer }}">{{ $visit->referer ?: '-' }}</td>
                            <td class="px-4 py-3 text-right text-slate-600">{{ $visit->visited_at?->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-10 text-center text-slate-500">{{ __('admin.analytics.empty') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
