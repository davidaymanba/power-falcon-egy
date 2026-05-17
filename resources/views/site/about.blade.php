@extends('layouts.site', ['title' => __('site.brand')])

@section('content')
<!-- Enhanced Animation Styles -->
<style>
    /* Core Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-80px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(80px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes zoomIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    @keyframes blurInUp {
        from {
            opacity: 0;
            filter: blur(10px);
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            filter: blur(0);
            transform: translateY(0);
        }
    }
    
    @keyframes rotateBounce {
        0% { transform: scale(0.8) rotate(-45deg); opacity: 0; }
        50% { transform: scale(1.1); }
        100% { transform: scale(1) rotate(0deg); opacity: 1; }
    }
    
    @keyframes floatUp {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }
    
    @keyframes popIn1 {
        0% {
            opacity: 0;
            transform: scale(0.5) translateY(30px);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    
    @keyframes popIn2 {
        0% {
            opacity: 0;
            transform: scale(0.5) translateY(30px);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    
    @keyframes popIn3 {
        0% {
            opacity: 0;
            transform: scale(0.5) translateY(30px);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    
    /* Animation Classes */
    .animate-fade-in-up { animation: fadeInUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }
    .animate-fade-in-down { animation: fadeInDown 0.8s ease-out forwards; }
    .animate-slide-in-left { animation: slideInLeft 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }
    .animate-slide-in-right { animation: slideInRight 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }
    .animate-zoom-in { animation: zoomIn 0.7s ease-out forwards; }
    .animate-blur-in-up { animation: blurInUp 1s ease-out forwards; }
    .animate-rotate-bounce { animation: rotateBounce 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }
    .animate-float { animation: floatUp 3s ease-in-out infinite; }
    .animate-sequence-pop { animation: sequencePop 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; opacity: 0; }
    
    /* Staggered Animations */
    .stagger-item:nth-child(1) { animation-delay: 0.1s; }
    .stagger-item:nth-child(2) { animation-delay: 0.2s; }
    .stagger-item:nth-child(3) { animation-delay: 0.3s; }
    .stagger-item:nth-child(4) { animation-delay: 0.4s; }
    .stagger-item:nth-child(5) { animation-delay: 0.5s; }
    .stagger-item:nth-child(6) { animation-delay: 0.6s; }
    
    /* Stat Box Sequential Animations - One by one */
    .stat-box-1 { 
        animation: popIn1 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s forwards;
    }
    .stat-box-2 { 
        animation: popIn2 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.8s forwards;
    }
    .stat-box-3 { 
        animation: popIn3 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 1.4s forwards;
    }
    
    /* Hover Effects */
    .card-hover {
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .stat-card-hover {
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    
    .stat-card-hover:hover {
        transform: scale(1.08) translateY(-10px);
        box-shadow: 0 25px 50px rgba(7, 159, 212, 0.2);
    }
    
    /* Timeline Styles */
    .timeline-item {
        position: relative;
        padding-left: 40px;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 24px;
        height: 24px;
        background: linear-gradient(135deg, #079fd4, #2d247f);
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 3px #079fd4;
        animation: rotateBounce 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }
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

            <div class="grid gap-6 sm:grid-cols-3 animate-slide-in-right">
                <!-- 1991 Card - Appears First -->
                <div class="stat-box-1 stat-card-hover group relative overflow-hidden rounded-2xl bg-gradient-to-br from-white to-slate-50 p-8 border border-slate-200 shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#079fd4]/10 to-[#2d247f]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative">
                        <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-[#079fd4] to-[#2d247f]">1991</div>
                        <div class="mt-3 text-sm font-bold text-slate-600 uppercase tracking-wider">{{ __('site.about.history') }}</div>
                        <p class="mt-3 text-xs text-slate-500 leading-relaxed">تأسيس الشركة بمهمة واضحة</p>
                    </div>
                </div>
                
                <!-- 35+ Years Card - Appears Second -->
                <div class="stat-box-2 stat-card-hover group relative overflow-hidden rounded-2xl bg-gradient-to-br from-white to-slate-50 p-8 border border-slate-200 shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#2d247f]/10 to-[#079fd4]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative">
                        <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-[#2d247f] to-[#079fd4]">35+</div>
                        <div class="mt-3 text-sm font-bold text-slate-600 uppercase tracking-wider">سنة خبرة</div>
                        <p class="mt-3 text-xs text-slate-500 leading-relaxed">قيادة السوق والابتكار</p>
                    </div>
                </div>
                
                <!-- 24/7 Contact Card - Appears Third -->
                <div class="stat-box-3 stat-card-hover group relative overflow-hidden rounded-2xl bg-gradient-to-br from-white to-slate-50 p-8 border border-slate-200 shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#079fd4]/10 to-[#2d247f]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative">
                        <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-[#079fd4] to-[#2d247f]">24/7</div>
                        <div class="mt-3 text-sm font-bold text-slate-600 uppercase tracking-wider">{{ __('site.cta.contact_us') }}</div>
                        <p class="mt-3 text-xs text-slate-500 leading-relaxed">دعم مستمر على مدار الساعة</p>
                    </div>
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
