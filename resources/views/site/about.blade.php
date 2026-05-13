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
        <h1 class="mb-4 text-5xl font-black leading-tight text-white md:text-6xl animate-fade-in-up" style="animation-delay: 0.2s;">{{ __('site.about.intro') }}</h1>
    </div>
</section>

<!-- Timeline Section -->
<section class="bg-white py-20">
    <div class="pf-container">
        <h2 class="mb-12 text-center text-4xl font-black text-[#111827] animate-fade-in-up">Our <span class="text-[#079fd4]">Journey</span></h2>
        <div class="space-y-8">
            <!-- Timeline Item 1: 1990 -->
            <div class="grid gap-8 md:grid-cols-[1fr_auto_1fr] md:items-center timeline-1 animate-slide-in-left">
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-8 md:text-right transform transition hover:shadow-lg hover:scale-105 duration-300">
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-[#079fd4]/10 px-3 py-1">
                        <span class="text-sm font-bold text-[#079fd4]">{{ __('site.about.history') }}</span>
                    </div>
                    <h3 class="mb-3 text-2xl font-black text-[#111827]">1990</h3>
                    <p class="text-slate-600">Power Falcon has served the Egyptian market for electric generators and control systems for more than three decades, building a reputation on reliability and technical knowledge.</p>
                </div>
                <div class="hidden md:flex md:flex-col md:items-center">
                    <div class="timeline-dot-1 animate-pulse-scale h-12 w-12 rounded-full border-4 border-[#079fd4] bg-white"></div>
                    <div class="timeline-line-1 animate-draw-line h-16 w-1 bg-gradient-to-b from-[#079fd4] to-slate-200 origin-top"></div>
                </div>
                <div></div>
            </div>

            <!-- Timeline Item 2: 2016 -->
            <div class="grid gap-8 md:grid-cols-[1fr_auto_1fr] md:items-center timeline-2 animate-slide-in-right">
                <div></div>
                <div class="hidden md:flex md:flex-col md:items-center">
                    <div class="timeline-dot-2 animate-pulse-scale h-12 w-12 rounded-full border-4 border-[#079fd4] bg-white"></div>
                    <div class="timeline-line-2 animate-draw-line h-16 w-1 bg-gradient-to-b from-[#079fd4] to-slate-200 origin-top"></div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-8 transform transition hover:shadow-lg hover:scale-105 duration-300">
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-[#079fd4]/10 px-3 py-1">
                        <span class="text-sm font-bold text-[#079fd4]">2016</span>
                    </div>
                    <h3 class="mb-3 text-2xl font-black text-[#111827]">SICES</h3>
                    <p class="text-slate-600">The company strengthened its position by becoming an official distributor in Egypt, expanding advanced control solutions for genset applications.</p>
                </div>
            </div>

            <!-- Timeline Item 3: 2025 -->
            <div class="grid gap-8 md:grid-cols-[1fr_auto_1fr] md:items-center timeline-3 animate-slide-in-left">
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-8 md:text-right transform transition hover:shadow-lg hover:scale-105 duration-300">
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-[#079fd4]/10 px-3 py-1">
                        <span class="text-sm font-bold text-[#079fd4]">2025</span>
                    </div>
                    <h3 class="mb-3 text-2xl font-black text-[#111827]">Mecc Alte</h3>
                    <p class="text-slate-600">Power Falcon became an official agent for Mecc Alte, offering alternators, smart AVRs, controllers, and battery chargers from a globally recognized manufacturer.</p>
                </div>
                <div class="hidden md:flex md:flex-col md:items-center">
                    <div class="timeline-dot-3 animate-pulse-scale h-12 w-12 rounded-full border-4 border-[#079fd4] bg-white"></div>
                </div>
                <div></div>
            </div>
        </div>
    </div>
</section>

<!-- Experience & Vision Section -->
<section class="bg-gradient-to-br from-slate-50 to-white py-20">
    <div class="pf-container grid gap-12 md:grid-cols-2">
        <!-- Technical Experience -->
        <div class="stagger-item animate-slide-in-left rounded-2xl border border-slate-200 bg-white p-8 shadow-md transform transition hover:shadow-xl hover:scale-105 duration-300">
            <div class="mb-6 inline-flex items-center gap-3 rounded-full bg-[#079fd4]/10 px-4 py-2">
                <span class="text-2xl">🔧</span>
                <span class="font-bold text-[#079fd4]">{{ __('site.about.experience') }}</span>
            </div>
            <h3 class="mb-4 text-2xl font-black text-[#111827]">Technical Expertise</h3>
            <p class="text-slate-600">The team supports generator manufacturers and panel builders with product selection, control integration, troubleshooting, and reliable spare parts sourcing. Our technical guidance ensures your systems run at peak performance.</p>
            <ul class="mt-6 space-y-3">
                <li class="flex items-center gap-3">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4] text-sm">✓</span>
                    <span>Product Selection & Integration</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4] text-sm">✓</span>
                    <span>Control System Support</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4] text-sm">✓</span>
                    <span>Troubleshooting & Maintenance</span>
                </li>
            </ul>
        </div>

        <!-- Vision & Goals -->
        <div class="rounded-2xl border border-[#079fd4] bg-gradient-to-br from-[#079fd4]/5 to-[#2d247f]/5 p-8">
            <div class="mb-6 inline-flex items-center gap-3 rounded-full bg-[#079fd4]/10 px-4 py-2">
                <span class="text-2xl">🎯</span>
                <span class="font-bold text-[#079fd4]">{{ __('site.about.vision') }}</span>
            </div>
            <h3 class="mb-4 text-2xl font-black text-[#111827]">Vision & Goals</h3>
            <p class="text-slate-600">Our goal is to be the trusted technical partner for dependable power generation solutions across Egypt, combining quality products with practical field support. We're committed to innovation and reliability in everything we do.</p>
            <ul class="mt-6 space-y-3">
                <li class="flex items-center gap-3">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full border-2 border-[#079fd4] text-[#079fd4] text-sm">🎯</span>
                    <span>Premium Product Quality</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full border-2 border-[#079fd4] text-[#079fd4] text-sm">🎯</span>
                    <span>Exceptional Service</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full border-2 border-[#079fd4] text-[#079fd4] text-sm">🎯</span>
                    <span>Market Leadership</span>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection
