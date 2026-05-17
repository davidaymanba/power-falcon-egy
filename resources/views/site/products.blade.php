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
            transform: translateX(-40px);
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
    .animate-fade-in-up { animation: fadeInUp 0.8s ease-out; }
    .animate-fade-in { animation: fadeIn 1s ease-out; }
    .animate-slide-in-left { animation: slideInLeft 0.8s ease-out; }
    .animate-scale-in { animation: scaleIn 0.6s ease-out; }
    
    /* Stagger animations */
    .stagger-item:nth-child(1) { animation-delay: 0.1s; }
    .stagger-item:nth-child(2) { animation-delay: 0.2s; }
    .stagger-item:nth-child(3) { animation-delay: 0.3s; }
    .stagger-item:nth-child(4) { animation-delay: 0.4s; }
    .stagger-item:nth-child(5) { animation-delay: 0.5s; }
    .stagger-item:nth-child(6) { animation-delay: 0.6s; }
    .stagger-item:nth-child(7) { animation-delay: 0.7s; }
    .stagger-item:nth-child(8) { animation-delay: 0.8s; }
    .stagger-item:nth-child(9) { animation-delay: 0.9s; }
    .stagger-item:nth-child(10) { animation-delay: 1s; }
    .stagger-item:nth-child(11) { animation-delay: 1.1s; }
    .stagger-item:nth-child(12) { animation-delay: 1.2s; }
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 py-16">
    <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml+base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImEiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIgZmlsbD0iIzBmOWZkNCI+PC9jaXJjbGU+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2EpIi8+PC9zdmc+')] bg-repeat"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#2d247f]/60 to-[#079fd4]/30"></div>
    
    <div class="pf-container relative z-10 text-center animate-fade-in-up">
        <h1 class="mb-4 text-5xl font-black leading-tight text-white md:text-6xl">{{ __('site.products.title') }}</h1>
        <p class="text-lg text-slate-200 animate-fade-in-up" style="animation-delay: 0.2s;">{{ __('site.products.intro') }}</p>
    </div>
</section>

<!-- Search & Filter Section -->
<section class="bg-white py-12">
    <div class="pf-container">
        <form method="GET" class="animate-fade-in-up rounded-2xl border border-slate-200 bg-slate-50 p-8 transform transition hover:shadow-lg duration-300">
            <div class="grid gap-4 md:grid-cols-[1fr_1fr_auto_auto]">
                <div>
                    <input type="text" name="search" placeholder="{{ __('site.products.search_placeholder') }}" value="{{ request('search') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-[#079fd4] focus:outline-none focus:ring-2 focus:ring-[#079fd4]/20 transition duration-300">
                </div>
                <div>
                    <select name="category" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-[#079fd4] focus:outline-none focus:ring-2 focus:ring-[#079fd4]/20 transition duration-300">
                        <option value="">{{ __('site.products.all_categories') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" @selected($activeCategory === $category->slug)>
                                {{ $category->name }} ({{ $category->products_count }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="rounded-lg bg-[#079fd4] px-6 py-3 font-bold text-white transition hover:bg-[#0579a7] hover:scale-105 duration-300">
                    {{ __('site.cta.search') }}
                </button>
                <a href="{{ route('products') }}" class="rounded-lg border border-[#079fd4] px-6 py-3 font-bold text-[#079fd4] transition hover:bg-[#079fd4]/10 hover:scale-105 duration-300">
                    {{ __('site.cta.reset') }}
                </a>
            </div>
        </form>
    </div>
</section>

<!-- Products Grid -->
<section class="bg-white py-16">
    <div class="pf-container">
        <div class="mb-8 animate-fade-in-up">
            <h2 class="text-2xl font-black text-[#111827]">{{ __('site.products.all_products') }}</h2>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse ($products as $product)
                <article class="stagger-item animate-scale-in group rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:border-[#079fd4] hover:shadow-lg hover:-translate-y-2 hover:shadow-[#079fd4]/20 duration-300">
                    <div class="relative overflow-hidden rounded-lg bg-white">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-40 w-full object-contain transition group-hover:scale-110 duration-300">
                    </div>
                    <p class="mt-3 text-xs font-bold uppercase text-[#2d247f]">{{ $product->category?->name }}</p>
                    <h3 class="mt-1 line-clamp-2 min-h-10 font-bold text-slate-900">{{ $product->name }}</h3>
                </article>
            @empty
                <div class="col-span-full animate-fade-in rounded-lg bg-slate-100 p-12 text-center text-slate-500">
                    <p class="mb-2 text-lg font-semibold">{{ __('site.products.empty_title') }}</p>
                    <p>{{ __('site.products.empty_text') }}</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($products->hasPages())
            <div class="mt-12 flex flex-col items-center gap-4 animate-fade-in-up">
                <div class="text-sm text-slate-600">
                    {{ __('site.products.showing_results', ['first' => $products->firstItem(), 'last' => $products->lastItem(), 'total' => $products->total()]) }}
                </div>
                <div class="flex gap-2">
                    @if ($products->onFirstPage())
                        <span class="rounded-lg border border-slate-300 px-4 py-2 text-slate-400">← {{ __('site.products.previous') }}</span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="rounded-lg border border-[#079fd4] px-4 py-2 text-[#079fd4] transition hover:bg-[#079fd4]/10 hover:scale-105 duration-300">← {{ __('site.products.previous') }}</a>
                    @endif

                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if ($page == $products->currentPage())
                            <span class="rounded-lg border-2 border-[#079fd4] bg-[#079fd4] px-4 py-2 text-white font-bold">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="rounded-lg border border-slate-300 px-4 py-2 text-slate-700 transition hover:border-[#079fd4] hover:text-[#079fd4] hover:scale-105 duration-300">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="rounded-lg border border-[#079fd4] px-4 py-2 text-[#079fd4] transition hover:bg-[#079fd4]/10 hover:scale-105 duration-300">{{ __('site.products.next') }} →</a>
                    @else
                        <span class="rounded-lg border border-slate-300 px-4 py-2 text-slate-400">{{ __('site.products.next') }} →</span>
                    @endif
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
