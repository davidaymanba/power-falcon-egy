@extends('layouts.site', ['title' => __('site.brand')])

@section('content')
<!-- Animation Styles -->
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-60px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(60px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    @keyframes drawLine {
        from {
            height: 0;
            opacity: 0;
        }
        to {
            height: 100%;
            opacity: 1;
        }
    }
    @keyframes pulseScale {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.8;
        }
    }
    .animate-fade-in-up { animation: fadeInUp 0.8s ease-out; }
    .animate-fade-in { animation: fadeIn 1s ease-out; }
    .animate-slide-in-left { animation: slideInLeft 0.9s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .animate-slide-in-right { animation: slideInRight 0.9s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .animate-scale-in { animation: scaleIn 0.6s ease-out; }
    .animate-draw-line { animation: drawLine 0.8s ease-out forwards; }
    .animate-pulse-scale { animation: pulseScale 0.6s ease-out forwards; }
    
    /* Sequential timeline delays */
    .timeline-1 { animation-delay: 0.5s; }
    .timeline-2 { animation-delay: 0.9s; }
    .timeline-3 { animation-delay: 1.3s; }
    
    .timeline-dot-1 { animation-delay: 0.4s; }
    .timeline-dot-2 { animation-delay: 0.8s; }
    .timeline-dot-3 { animation-delay: 1.2s; }
    
    .timeline-line-1 { animation-delay: 0.1s; }
    .timeline-line-2 { animation-delay: 0.9s; }
    
    /* Stagger animations */
    .stagger-item:nth-child(1) { animation-delay: 0.1s; }
    .stagger-item:nth-child(2) { animation-delay: 0.2s; }
    .stagger-item:nth-child(3) { animation-delay: 0.3s; }
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 py-16">
    <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml+base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImEiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIgZmlsbD0iIzBmOWZkNCI+PC9jaXJjbGU+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2EpIi8+PC9zdmc+')] bg-repeat"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#2d247f]/60 to-[#079fd4]/30"></div>
    
    <div class="pf-container relative z-10 text-center animate-fade-in-up">
        <p class="mb-4 inline-flex items-center gap-2 rounded-full bg-[#079fd4]/20 px-4 py-2 animate-fade-in-up">
            <span class="h-2 w-2 rounded-full bg-[#079fd4]"></span>
            <span class="text-sm font-semibold text-[#079fd4] uppercase tracking-wide">{{ __('site.about.title') }}</span>
        </p>
        <h1 class="mx-auto mb-4 max-w-5xl text-4xl font-black leading-tight text-white md:text-6xl animate-fade-in-up" style="animation-delay: 0.2s;">{{ __('site.about.title') }}</h1>
        <p class="mx-auto max-w-4xl text-lg leading-8 text-slate-200 animate-fade-in-up" style="animation-delay: 0.3s;">{{ __('site.about.intro') }}</p>
    </div>
</section>

<!-- Company Story Section -->
<section class="bg-white py-20">
    <div class="pf-container">
        <div class="grid gap-10 lg:grid-cols-[.9fr_1.1fr] lg:items-center">
            <div class="animate-slide-in-left">
                <p class="mb-4 inline-flex items-center gap-2 rounded-full bg-[#079fd4]/10 px-4 py-2">
                    <span class="h-2 w-2 rounded-full bg-[#079fd4]"></span>
                    <span class="text-sm font-bold text-[#079fd4]">{{ __('site.about.history') }}</span>
                </p>
                <h2 class="mb-5 text-4xl font-black text-[#111827]">{{ __('site.about.title') }}</h2>
                <div class="space-y-5 text-lg leading-8 text-slate-600">
                    <p>{{ __('site.about.intro') }}</p>
                    <p>{{ __('site.about.history_text') }}</p>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-3 animate-slide-in-right">
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-6 text-center shadow-sm">
                    <div class="text-4xl font-black text-[#079fd4]">1991</div>
                    <div class="mt-2 text-sm font-semibold text-slate-600">{{ __('site.about.history') }}</div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-6 text-center shadow-sm">
                    <div class="text-4xl font-black text-[#2d247f]">35+</div>
                    <div class="mt-2 text-sm font-semibold text-slate-600">{{ __('site.home.stats.years') }}</div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-6 text-center shadow-sm">
                    <div class="text-4xl font-black text-[#079fd4]">24/7</div>
                    <div class="mt-2 text-sm font-semibold text-slate-600">{{ __('site.cta.contact_us') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="bg-gradient-to-br from-slate-50 to-white py-20">
    <div class="pf-container grid gap-12 md:grid-cols-2">
        <div class="stagger-item animate-slide-in-left rounded-2xl border border-slate-200 bg-white p-8 shadow-md transform transition hover:shadow-xl hover:scale-105 duration-300">
            <div class="mb-6 inline-flex items-center gap-3 rounded-full bg-[#079fd4]/10 px-4 py-2">
                <span class="font-bold text-[#079fd4]">{{ __('site.about.vision') }}</span>
            </div>
            <h3 class="mb-4 text-2xl font-black text-[#111827]">{{ __('site.about.vision') }}</h3>
            <p class="text-lg leading-8 text-slate-600">{{ __('site.about.vision_text') }}</p>
        </div>

        <div class="rounded-2xl border border-[#079fd4] bg-gradient-to-br from-[#079fd4]/5 to-[#2d247f]/5 p-8">
            <div class="mb-6 inline-flex items-center gap-3 rounded-full bg-[#079fd4]/10 px-4 py-2">
                <span class="font-bold text-[#079fd4]">{{ __('site.about.mission') }}</span>
            </div>
            <h3 class="mb-4 text-2xl font-black text-[#111827]">{{ __('site.about.mission') }}</h3>
            <p class="text-lg leading-8 text-slate-600">{{ __('site.about.mission_text') }}</p>
        </div>
    </div>
</section>

<!-- Goals, Services, Why Us Section -->
<section class="bg-white py-20">
    <div class="pf-container grid gap-6 lg:grid-cols-3">
        @foreach (['goals', 'services', 'why'] as $section)
            <article class="rounded-2xl border border-slate-200 bg-slate-50 p-8 shadow-sm">
                <h2 class="mb-6 text-2xl font-black text-[#111827]">{{ __("site.about.$section.title") }}</h2>
                <ul class="space-y-4">
                    @foreach (trans("site.about.$section.items") as $item)
                        <li class="flex items-start gap-3">
                            <span class="mt-1 flex h-6 w-6 flex-none items-center justify-center rounded-full bg-[#079fd4]/20 text-sm font-bold text-[#079fd4]">✓</span>
                            <span class="leading-7 text-slate-700">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </article>
        @endforeach
    </div>
</section>
@endsection
