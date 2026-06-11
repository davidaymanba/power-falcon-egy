@extends('layouts.site', ['title' => __('site.brand')])

@section('content')
<!-- Hero Section with Overlay -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 py-24">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml+base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImEiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIgZmlsbD0iIzBmOWZkNCI+PC9jaXJjbGU+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2EpIi8+PC9zdmc+')] bg-repeat"></div>
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#2d247f]/60 to-[#079fd4]/30"></div>
    
    <div class="pf-container relative z-10 grid gap-8 md:grid-cols-2 md:items-center">
        <div class="md:col-start-1 md:row-start-1">
            <div class="mb-6 inline-flex items-center gap-2 rounded-full bg-[#079fd4]/20 px-4 py-2">
                <span class="h-2 w-2 rounded-full bg-[#079fd4]"></span>
                <span class="text-sm font-semibold text-[#079fd4] uppercase tracking-wide">{{ __('site.home.eyebrow') }}</span>
            </div>
            <h1 class="mb-4 text-5xl font-black leading-tight text-white md:text-6xl">{{ __('site.home.title') }}</h1>
            <p class="mb-8 max-w-lg text-lg text-slate-200">{{ __('site.home.intro') }}</p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('products') }}" class="rounded-full bg-[#079fd4] px-8 py-3 font-bold text-white shadow-lg shadow-[#079fd4]/30 transition hover:bg-[#0579a7] hover:shadow-[#079fd4]/50">
                    {{ __('site.cta.view_products') }}
                </a>
                <a href="{{ route('contact') }}" class="rounded-full border-2 border-white/30 bg-white/10 px-8 py-3 font-bold text-white backdrop-blur transition hover:bg-white/20 hover:border-white/50">
                    {{ __('site.cta.contact_us') }}
                </a>
            </div>
        </div>
        <!-- 3D Power Energy Animation Section -->
        <div class="pf-hero-visual relative flex h-[19rem] items-center justify-center md:col-start-2 md:row-span-2 md:row-start-1 md:h-96" aria-hidden="true">
            <div class="pf-energy-halo"></div>
            <div class="pf-energy-scene" data-energy-scene></div>
        </div>
        <div class="grid grid-cols-1 gap-6 text-white md:col-start-1 md:row-start-2 md:mt-2 md:grid-cols-3">
            <div class="pf-count-card pf-reveal" style="animation-delay: .05s;">
                <div class="pf-count text-lg font-black text-[#079fd4] md:text-2xl" data-countup="35" data-suffix="+">35+</div>
                <div class="text-xs text-slate-300 md:text-sm">{{ __('site.home.stats.years') }}</div>
            </div>
            <div class="pf-count-card pf-reveal" style="animation-delay: .12s;">
                <div class="pf-count text-lg font-black text-[#079fd4] md:text-2xl" data-countup="112" data-suffix="+">112+</div>
                <div class="text-xs text-slate-300 md:text-sm">{{ __('site.home.stats.products') }}</div>
            </div>
            <div class="pf-count-card pf-reveal" style="animation-delay: .19s;">
                <div class="pf-count text-lg font-black text-[#079fd4] md:text-2xl" data-countup="100" data-suffix="%">100%</div>
                <div class="text-xs text-slate-300 md:text-sm">{{ __('site.home.stats.authentic') }}</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="bg-white py-20">
    <div class="pf-container">
        <div class="mb-12 text-center">
            <h2 class="mb-3 text-4xl font-black text-[#111827]">{{ __('site.home.featured') }}</h2>
            <p class="mx-auto max-w-2xl text-slate-600">{{ __('site.products.intro') }}</p>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-5">
            @forelse ($featuredProducts as $product)
                <article class="group rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:border-[#079fd4] hover:shadow-lg hover:-translate-y-1">
                    <div class="relative overflow-hidden rounded-lg bg-white">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-40 w-full object-contain transition group-hover:scale-105">
                    </div>
                    <p class="mt-3 text-xs font-bold uppercase text-[#2d247f]">{{ $product->category?->name }}</p>
                    <h3 class="mt-1 line-clamp-2 min-h-10 font-bold text-slate-900">{{ $product->name }}</h3>
                </article>
            @empty
                <div class="col-span-full rounded-lg bg-slate-100 p-8 text-center text-slate-500">{{ __('site.products.empty_title') }}</div>
            @endforelse
        </div>
        <div class="mt-10 flex justify-center">
            <a href="{{ route('products') }}" class="rounded-full border-2 border-[#079fd4] px-8 py-3 font-bold text-[#079fd4] transition hover:bg-[#079fd4] hover:text-white">
                {{ __('site.cta.view_products') }} →
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="bg-gradient-to-br from-slate-50 to-white py-20">
    <div class="pf-container grid gap-12 md:grid-cols-2 md:items-center">
        <div>
            <h2 class="mb-4 text-4xl font-black text-[#111827]">{{ __('site.home.overview_title') }}</h2>
            <p class="mb-6 text-lg text-slate-600">{{ __('site.home.overview') }}</p>
            <ul class="space-y-3">
                @foreach (trans('site.home.about_points') as $point)
                    <li class="flex items-center gap-3">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4] font-bold">✓</span>
                        <span class="text-slate-700">{{ $point }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="relative">
            <div class="absolute -left-20 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full bg-[#079fd4]/5 blur-3xl"></div>
            <div class="relative z-10 rounded-2xl bg-gradient-to-br from-[#079fd4]/10 to-[#2d247f]/10 p-8">
                <div class="grid grid-cols-2 gap-4">
                    <div class="pf-stat-card pf-reveal rounded-xl bg-white p-6 text-center shadow-md" style="animation-delay: .05s;">
                        <div class="pf-count text-3xl font-black text-[#079fd4]" data-countup="35" data-suffix="+">35+</div>
                        <div class="text-sm font-semibold text-slate-600">{{ __('site.home.stats.years') }}</div>
                    </div>
                    <div class="pf-stat-card pf-reveal rounded-xl bg-white p-6 text-center shadow-md" style="animation-delay: .12s;">
                        <div class="pf-count text-3xl font-black text-[#2d247f]" data-countup="1991">1991</div>
                        <div class="text-sm font-semibold text-slate-600">SICES</div>
                    </div>
                    <div class="pf-stat-card pf-reveal rounded-xl bg-white p-6 text-center shadow-md" style="animation-delay: .19s;">
                        <div class="pf-count text-3xl font-black text-[#079fd4]" data-countup="2025">2025</div>
                        <div class="text-sm font-semibold text-slate-600">Mecc Alte</div>
                    </div>
                    <div class="pf-stat-card pf-reveal rounded-xl bg-white p-6 text-center shadow-md" style="animation-delay: .26s;">
                        <div class="pf-count text-3xl font-black text-[#2d247f]" data-countup="112" data-suffix="+">112+</div>
                        <div class="text-sm font-semibold text-slate-600">Products</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="relative overflow-hidden bg-white py-24">
    <div class="pf-container">
        <div class="mb-16 text-center">
            <h2 class="mb-3 text-4xl font-black text-[#111827]">{{ __('site.home.partners_title') }}</h2>
            <p class="mx-auto max-w-2xl text-lg text-slate-600">{{ __('site.home.partners_intro') }}</p>
        </div>

        <!-- Animated Partners Carousel -->
        @php
            $partners = [
                ['src' => 'images/partners/GILA ALTAWAKOL ELECTRIC.png', 'alt' => 'GILA ALTAWAKOL ELECTRIC'],
                ['src' => 'images/partners/Orascome Construction company.png', 'alt' => 'Orascome Construction'],
                ['src' => 'images/partners/Orascome trading company .png', 'alt' => 'Orascome Trading'],
                ['src' => 'images/partners/PetroJet.png', 'alt' => 'PetroJet'],
                ['src' => 'images/partners/The Arab Contractors.png', 'alt' => 'The Arab Contractors'],
            ];
        @endphp
        <div class="relative">
            <style>
                @keyframes partners-marquee {
                    from { transform: translateX(0); }
                    to { transform: translateX(-33.333333%); }
                }

                .partner-carousel {
                    --partner-gap: 1rem;
                    direction: ltr;
                    max-width: 100%;
                }

                .partner-track {
                    display: flex;
                    flex-direction: row;
                    width: max-content;
                    max-width: none;
                    direction: ltr;
                    will-change: transform;
                    animation: partners-marquee 26s linear infinite;
                }

                .partner-set {
                    display: flex;
                    flex-direction: row;
                    flex: none;
                    direction: ltr;
                }

                .partner-logo {
                    width: 150px;
                    min-width: 150px;
                    margin-right: var(--partner-gap);
                }

                .partner-carousel:hover .partner-track {
                    animation-play-state: paused;
                }

                @media (min-width: 640px) {
                    .partner-carousel { --partner-gap: 1.5rem; }
                    .partner-logo {
                        width: 180px;
                        min-width: 180px;
                    }
                }

                @media (min-width: 768px) {
                    .partner-carousel { --partner-gap: 3rem; }
                    .partner-logo {
                        width: 220px;
                        min-width: 220px;
                    }
                }

                @media (min-width: 1024px) {
                    .partner-logo {
                        width: 200px;
                        min-width: 200px;
                    }
                }
            </style>
            
            <div class="partner-carousel overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-r from-slate-50 to-white p-4 sm:p-6 md:p-8" dir="ltr">
                <div class="partner-track">
                    @for ($set = 0; $set < 3; $set++)
                        <div class="partner-set" aria-hidden="{{ $set === 0 ? 'false' : 'true' }}">
                            @foreach ($partners as $partner)
                                <div class="partner-logo flex h-28 flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105">
                                    <img src="{{ asset($partner['src']) }}" alt="{{ $partner['alt'] }}" class="h-16 w-auto object-contain">
                                </div>
                            @endforeach
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Gradient edges for better effect -->
            <div class="pointer-events-none absolute left-0 top-0 h-full w-16 bg-gradient-to-r from-white to-transparent"></div>
            <div class="pointer-events-none absolute right-0 top-0 h-full w-16 bg-gradient-to-l from-white to-transparent"></div>
        </div>
    </div>
</section>
@endsection
