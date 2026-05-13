@extends('layouts.site', ['title' => __('site.brand')])

@section('content')
<!-- Hero Section with Overlay -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 py-24">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml+base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImEiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIgZmlsbD0iIzBmOWZkNCI+PC9jaXJjbGU+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2EpIi8+PC9zdmc+')] bg-repeat"></div>
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#2d247f]/60 to-[#079fd4]/30"></div>
    
    <div class="pf-container relative z-10 grid gap-8 md:grid-cols-2 md:items-center">
        <div>
            <div class="mb-6 inline-flex items-center gap-2 rounded-full bg-[#079fd4]/20 px-4 py-2">
                <span class="h-2 w-2 rounded-full bg-[#079fd4]"></span>
                <span class="text-sm font-semibold text-[#079fd4] uppercase tracking-wide">Special Offer</span>
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
            <div class="mt-10 grid grid-cols-1 gap-6 text-white md:grid-cols-3">
                <div class="pf-count-card pf-reveal" style="animation-delay: .05s;">
                    <div class="pf-count text-lg font-black text-[#079fd4] md:text-2xl" data-countup="30" data-suffix="+">30+</div>
                    <div class="text-xs text-slate-300 md:text-sm">Years Experience</div>
                </div>
                <div class="pf-count-card pf-reveal" style="animation-delay: .12s;">
                    <div class="pf-count text-lg font-black text-[#079fd4] md:text-2xl" data-countup="112" data-suffix="+">112+</div>
                    <div class="text-xs text-slate-300 md:text-sm">Products</div>
                </div>
                <div class="pf-count-card pf-reveal" style="animation-delay: .19s;">
                    <div class="pf-count text-lg font-black text-[#079fd4] md:text-2xl" data-countup="100" data-suffix="%">100%</div>
                    <div class="text-xs text-slate-300 md:text-sm">Authentic</div>
                </div>
            </div>
        </div>
        <!-- Power Energy Animation Section -->
        <div class="relative hidden md:flex items-center justify-center h-96">
            <!-- Animated Background Energy Orbs -->
            <style>
                @keyframes energyPulse {
                    0%, 100% { 
                        transform: translate(0, 0) scale(1);
                        opacity: 0.5;
                    }
                    50% { 
                        transform: translate(20px, -20px) scale(1.1);
                        opacity: 0.8;
                    }
                }
                @keyframes energyRotate {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
                @keyframes lightning {
                    0%, 100% { 
                        opacity: 0;
                        stroke-dasharray: 100;
                        stroke-dashoffset: 100;
                    }
                    20% { opacity: 1; stroke-dasharray: 100; stroke-dashoffset: 0; }
                    40% { opacity: 0; }
                    60% { opacity: 1; stroke-dasharray: 100; stroke-dashoffset: 0; }
                    80% { opacity: 0; }
                }
                @keyframes floatOrb {
                    0%, 100% { transform: translateY(0px) translateX(0px); }
                    33% { transform: translateY(-30px) translateX(20px); }
                    66% { transform: translateY(20px) translateX(-20px); }
                }
                
                .energy-orb-1 { animation: energyPulse 4s ease-in-out infinite; }
                .energy-orb-2 { animation: energyPulse 5s ease-in-out infinite 0.5s; }
                .energy-orb-3 { animation: energyPulse 6s ease-in-out infinite 1s; }
                .energy-ring { animation: energyRotate 8s linear infinite; }
                .lightning-bolt { animation: lightning 4s ease-in-out infinite; }
                .float-orb { animation: floatOrb 6s ease-in-out infinite; }
            </style>
            
            <!-- Central Energy Core -->
            <div class="absolute inset-0 flex items-center justify-center">
                <!-- Outer Ring -->
                <div class="absolute h-64 w-64 rounded-full border-2 border-[#079fd4]/30 energy-ring"></div>
                <div class="absolute h-56 w-56 rounded-full border-2 border-[#2d247f]/20 energy-ring" style="animation-direction: reverse;"></div>
                
                <!-- Energy Orbs -->
                <div class="absolute h-32 w-32 rounded-full bg-[#079fd4]/20 blur-2xl energy-orb-1"></div>
                <div class="absolute -right-16 top-1/4 h-24 w-24 rounded-full bg-[#2d247f]/30 blur-xl energy-orb-2"></div>
                <div class="absolute -left-12 bottom-1/4 h-20 w-20 rounded-full bg-[#079fd4]/40 blur-lg energy-orb-3"></div>
                
                <!-- Central Glow -->
                <div class="absolute h-12 w-12 rounded-full bg-[#079fd4] blur-md" style="box-shadow: 0 0 40px rgba(7, 159, 212, 0.8);"></div>
                <div class="absolute h-8 w-8 rounded-full bg-white blur-sm" style="box-shadow: 0 0 20px rgba(255, 255, 255, 0.6);"></div>
                
                <!-- Floating Power Symbols -->
                <svg class="absolute h-40 w-40 float-orb" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <path class="lightning-bolt" d="M 50 10 L 60 40 L 45 40 L 70 90 M 50 10 L 40 40 L 55 40 L 30 90" 
                          stroke="#079fd4" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="bg-white py-20">
    <div class="pf-container">
        <div class="mb-12 text-center">
            <h2 class="mb-3 text-4xl font-black text-[#111827]">Featured <span class="text-[#079fd4]">Products</span></h2>
            <p class="mx-auto max-w-2xl text-slate-600">Explore our most popular generator spare parts and control solutions</p>
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
                <div class="col-span-full rounded-lg bg-slate-100 p-8 text-center text-slate-500">No products available</div>
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
            <h2 class="mb-4 text-4xl font-black text-[#111827]">Built for <span class="text-[#079fd4]">Reliability</span></h2>
            <p class="mb-6 text-lg text-slate-600">{{ __('site.home.overview') }}</p>
            <ul class="space-y-3">
                <li class="flex items-center gap-3">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4] font-bold">✓</span>
                    <span class="text-slate-700">Official distribution partnerships</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4] font-bold">✓</span>
                    <span class="text-slate-700">Generator control expertise</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4] font-bold">✓</span>
                    <span class="text-slate-700">Industrial spare parts quality</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4] font-bold">✓</span>
                    <span class="text-slate-700">Responsive technical support</span>
                </li>
            </ul>
        </div>
        <div class="relative">
            <div class="absolute -left-20 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full bg-[#079fd4]/5 blur-3xl"></div>
            <div class="relative z-10 rounded-2xl bg-gradient-to-br from-[#079fd4]/10 to-[#2d247f]/10 p-8">
                <div class="grid grid-cols-2 gap-4">
                    <div class="pf-stat-card pf-reveal rounded-xl bg-white p-6 text-center shadow-md" style="animation-delay: .05s;">
                        <div class="pf-count text-3xl font-black text-[#079fd4]" data-countup="30" data-suffix="+">30+</div>
                        <div class="text-sm font-semibold text-slate-600">Years</div>
                    </div>
                    <div class="pf-stat-card pf-reveal rounded-xl bg-white p-6 text-center shadow-md" style="animation-delay: .12s;">
                        <div class="pf-count text-3xl font-black text-[#2d247f]" data-countup="2016">2016</div>
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
            <h2 class="mb-3 text-4xl font-black text-[#111827]">Partners of <span class="text-[#079fd4]">Success</span></h2>
            <p class="mx-auto max-w-2xl text-lg text-slate-600">Trusted by Egypt's leading industrial and engineering companies</p>
        </div>

        <!-- Animated Partners Carousel -->
        <div class="relative">
            <style>
                @keyframes scroll-left {
                    0% {
                        transform: translateX(0);
                    }
                    100% {
                        transform: translateX(-50%);
                    }
                }
                .animate-scroll {
                    animation: none;
                }
                @media (min-width: 1024px) {
                    .animate-scroll {
                        animation: scroll-left 40s linear infinite;
                    }

                    .partner-carousel:hover .animate-scroll {
                        animation-play-state: paused;
                    }
                }
            </style>
            
            <div class="partner-carousel overflow-x-auto lg:overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-r from-slate-50 to-white p-4 sm:p-6 md:p-8">
                <!-- Duplicate for seamless loop -->
                <div class="flex animate-scroll gap-4 sm:gap-6 md:gap-12 lg:w-max lg:flex-nowrap">
                    <!-- Original logos -->
                    <div class="flex gap-4 min-w-full shrink-0 sm:gap-6 md:gap-12 lg:w-max lg:min-w-0 lg:flex-nowrap">
                        <div class="flex min-w-[130px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 sm:min-w-[160px] md:min-w-[220px] lg:w-[200px]">
                            <img src="{{ asset('images/partners/GILA ALTAWAKOL ELECTRIC.png') }}" alt="GILA ALTAWAKOL ELECTRIC" class="h-16 w-auto object-contain">
                        </div>
                        <div class="flex min-w-[130px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 sm:min-w-[160px] md:min-w-[220px] lg:w-[200px]">
                            <img src="{{ asset('images/partners/Orascome Construction company.png') }}" alt="Orascome Construction" class="h-16 w-auto object-contain">
                        </div>
                        <div class="flex min-w-[130px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 sm:min-w-[160px] md:min-w-[220px] lg:w-[200px]">
                            <img src="{{ asset('images/partners/Orascome trading company .png') }}" alt="Orascome Trading" class="h-16 w-auto object-contain">
                        </div>
                        <div class="flex min-w-[130px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 sm:min-w-[160px] md:min-w-[220px] lg:w-[200px]">
                            <img src="{{ asset('images/partners/PetroJet.png') }}" alt="PetroJet" class="h-16 w-auto object-contain">
                        </div>
                        <div class="flex min-w-[130px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 sm:min-w-[160px] md:min-w-[220px] lg:w-[200px]">
                            <img src="{{ asset('images/partners/The Arab Contractors.png') }}" alt="The Arab Contractors" class="h-16 w-auto object-contain">
                        </div>
                    </div>
                    
                    <!-- Duplicated for seamless loop -->
                    <div class="hidden lg:flex gap-12 shrink-0 w-max">
                        <div class="flex min-w-[220px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 lg:w-[200px]">
                            <img src="{{ asset('images/partners/GILA ALTAWAKOL ELECTRIC.png') }}" alt="GILA ALTAWAKOL ELECTRIC" class="h-16 w-auto object-contain">
                        </div>
                        <div class="flex min-w-[220px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 lg:w-[200px]">
                            <img src="{{ asset('images/partners/Orascome Construction company.png') }}" alt="Orascome Construction" class="h-16 w-auto object-contain">
                        </div>
                        <div class="flex min-w-[220px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 lg:w-[200px]">
                            <img src="{{ asset('images/partners/Orascome trading company .png') }}" alt="Orascome Trading" class="h-16 w-auto object-contain">
                        </div>
                        <div class="flex min-w-[220px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 lg:w-[200px]">
                            <img src="{{ asset('images/partners/PetroJet.png') }}" alt="PetroJet" class="h-16 w-auto object-contain">
                        </div>
                        <div class="flex min-w-[220px] flex-shrink-0 items-center justify-center rounded-lg bg-white p-4 shadow-md transition hover:shadow-lg hover:scale-105 lg:w-[200px]">
                            <img src="{{ asset('images/partners/The Arab Contractors.png') }}" alt="The Arab Contractors" class="h-16 w-auto object-contain">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gradient edges for better effect -->
            <div class="pointer-events-none absolute left-0 top-0 h-full w-16 bg-gradient-to-r from-white to-transparent"></div>
            <div class="pointer-events-none absolute right-0 top-0 h-full w-16 bg-gradient-to-l from-white to-transparent"></div>
        </div>
    </div>
</section>
@endsection
