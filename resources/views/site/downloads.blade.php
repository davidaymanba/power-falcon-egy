@extends('layouts.site', ['title' => __('site.downloads.title').' | '.__('site.brand')])

@section('content')
@php
    $typeLabels = trans('site.downloads.types');
    $typeStyles = [
        'pdf' => 'border-red-100 bg-red-50 text-red-700',
        'youtube' => 'border-red-100 bg-red-600 text-white',
        'archive' => 'border-amber-100 bg-amber-50 text-amber-800',
        'file' => 'border-emerald-100 bg-emerald-50 text-emerald-800',
        'link' => 'border-cyan-100 bg-cyan-50 text-[#0579a7]',
    ];
    $iconStyles = [
        'pdf' => 'bg-red-600 text-white',
        'youtube' => 'bg-[#2d247f] text-white',
        'archive' => 'bg-amber-500 text-white',
        'file' => 'bg-emerald-600 text-white',
        'link' => 'bg-[#079fd4] text-white',
    ];
@endphp

<section class="relative overflow-hidden bg-slate-950 text-white">
    <img src="{{ asset('images/powerfalcon.jpg') }}" alt="Power Falcon" class="absolute inset-0 h-full w-full object-cover opacity-20">
    <div class="absolute inset-0 bg-gradient-to-r from-[#111827] via-[#2d247f]/90 to-[#0579a7]/75"></div>
    <div class="pf-container relative z-10 py-12">
        <div class="max-w-3xl">
            <h1 class="text-4xl font-black leading-tight md:text-5xl">{{ __('site.downloads.title') }}</h1>
            <p class="mt-3 max-w-2xl text-base leading-7 text-cyan-50">{{ __('site.downloads.intro') }}</p>
        </div>

        <form method="GET" class="mt-7 max-w-4xl rounded-lg border border-white/20 bg-white/90 p-2 shadow-xl shadow-slate-950/20 backdrop-blur">
            <div class="grid gap-2 md:grid-cols-[minmax(220px,1fr)_180px_auto_auto] md:items-center">
                <div class="relative">
                    <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400 rtl:left-auto rtl:right-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m20 20-3.5-3.5"></path>
                    </svg>
                    <input name="search" value="{{ request('search') }}" placeholder="{{ __('site.downloads.search_placeholder') }}" class="pf-focus h-11 w-full rounded-md border border-slate-200 bg-white py-2 pl-10 pr-3 text-sm text-slate-900 shadow-sm rtl:pl-3 rtl:pr-10">
                </div>
                <select name="type" class="pf-focus h-11 w-full rounded-md border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-700 shadow-sm">
                    <option value="">{{ __('site.downloads.all_types') }}</option>
                    @foreach ($types as $type)
                        <option value="{{ $type }}" @selected($activeType === $type)>{{ $typeLabels[$type] ?? $type }}</option>
                    @endforeach
                </select>
                <button class="inline-flex h-11 items-center justify-center rounded-md bg-[#079fd4] px-6 text-sm font-black text-white transition hover:bg-[#0579a7]">{{ __('site.cta.search') }}</button>
                <a href="{{ route('downloads') }}" class="inline-flex h-11 items-center justify-center rounded-md border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:border-[#079fd4] hover:text-[#0579a7]">{{ __('site.cta.reset') }}</a>
            </div>
        </form>
    </div>
</section>

<section class="bg-white py-14">
    <div class="pf-container">
        <div class="mb-8 flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-black text-[#111827]">{{ __('site.downloads.featured_title') }}</h2>
                @if ($downloads->total() > 0)
                    <p class="mt-2 text-sm text-slate-500">{{ __('site.downloads.showing_results', ['first' => $downloads->firstItem(), 'last' => $downloads->lastItem(), 'total' => $downloads->total()]) }}</p>
                @endif
            </div>
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($downloads as $download)
                @php
                    $resourceUrl = $download->resource_url;
                    $buttonLabel = match ($download->type) {
                        'youtube' => __('site.cta.watch'),
                        'pdf', 'archive', 'file' => __('site.cta.download'),
                        default => __('site.cta.open'),
                    };
                @endphp
                <article class="group flex min-h-[260px] flex-col rounded-lg border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-[#079fd4] hover:shadow-lg">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg {{ $iconStyles[$download->type] ?? $iconStyles['link'] }}">
                                @switch($download->type)
                                    @case('youtube')
                                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.75 8.75v6.5L15.5 12 9.75 8.75Z"></path><path d="M21.58 7.19a2.5 2.5 0 0 0-1.76-1.76C18.26 5 12 5 12 5s-6.26 0-7.82.43a2.5 2.5 0 0 0-1.76 1.76C2 8.75 2 12 2 12s0 3.25.42 4.81a2.5 2.5 0 0 0 1.76 1.76C5.74 19 12 19 12 19s6.26 0 7.82-.43a2.5 2.5 0 0 0 1.76-1.76C22 15.25 22 12 22 12s0-3.25-.42-4.81Z"></path></svg>
                                        @break
                                    @case('archive')
                                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 7h16v15H4Z"></path><path d="M7 2h10l3 5H4Z"></path><path d="M12 11v6"></path><path d="M9 14h6"></path></svg>
                                        @break
                                    @case('pdf')
                                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"></path><path d="M14 2v6h6"></path><path d="M8 17h8"></path><path d="M8 13h8"></path></svg>
                                        @break
                                    @default
                                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M13.5 6.5 16 4a4 4 0 0 1 5.66 5.66l-3 3a4 4 0 0 1-5.66 0"></path><path d="m10.5 17.5-2.5 2.5A4 4 0 0 1 2.34 14.34l3-3a4 4 0 0 1 5.66 0"></path><path d="m8 16 8-8"></path></svg>
                                @endswitch
                            </div>
                            <span class="rounded border px-3 py-1 text-xs font-black uppercase {{ $typeStyles[$download->type] ?? $typeStyles['link'] }}">{{ $typeLabels[$download->type] ?? $download->type }}</span>
                        </div>
                    </div>

                    <h3 class="mt-5 text-xl font-black leading-tight text-[#111827]">{{ $download->title }}</h3>
                    @if ($download->description)
                        <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-600">{{ $download->description }}</p>
                    @endif

                    @if ($resourceUrl)
                        <div class="mt-auto pt-5">
                            <p class="mb-3 truncate rounded bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-500" title="{{ $resourceUrl }}">{{ $resourceUrl }}</p>
                            <a href="{{ $resourceUrl }}" target="_blank" rel="noopener" class="inline-flex w-full items-center justify-center rounded bg-[#2d247f] px-5 py-3 text-sm font-black text-white transition hover:bg-[#231d63]">
                                {{ $buttonLabel }}
                            </a>
                        </div>
                    @endif
                </article>
            @empty
                <div class="col-span-full rounded-lg border border-slate-200 bg-slate-50 p-12 text-center">
                    <h3 class="text-xl font-black text-[#111827]">{{ __('site.downloads.empty_title') }}</h3>
                    <p class="mt-3 text-sm text-slate-500">{{ __('site.downloads.empty_text') }}</p>
                </div>
            @endforelse
        </div>

        @if ($downloads->hasPages())
            <div class="mt-10">{{ $downloads->links() }}</div>
        @endif
    </div>
</section>
@endsection
