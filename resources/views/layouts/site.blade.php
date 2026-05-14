@php
    $locale = app()->getLocale();
    $rtl = $locale === 'ar';
    $nav = [
        ['label' => __('site.nav.home'), 'route' => 'home'],
        ['label' => __('site.nav.about'), 'route' => 'about'],
        ['label' => __('site.nav.products'), 'route' => 'products'],
        ['label' => __('site.nav.contact'), 'route' => 'contact'],
    ];
@endphp
<!doctype html>
<html lang="{{ $locale }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? __('site.brand') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur">
        <div class="pf-container flex items-center justify-between py-3">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/powerfalcon.jpg') }}" alt="Power Falcon" class="h-10 w-20 rounded bg-white object-contain sm:h-12 sm:w-24 md:w-32">
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden items-center gap-1 text-sm font-semibold text-slate-700 lg:flex">
                @foreach ($nav as $item)
                    <a href="{{ route($item['route']) }}" class="rounded px-3 py-2 transition hover:bg-cyan-50 hover:text-[#079fd4] {{ request()->routeIs($item['route']) ? 'text-[#2d247f]' : '' }}">{{ $item['label'] }}</a>
                @endforeach
                @auth
                    <a href="{{ route('admin.products.index') }}" class="rounded px-3 py-2 text-[#2d247f] hover:bg-cyan-50">{{ __('site.nav.dashboard') }}</a>
                @endauth
                <a href="{{ route('locale.switch', $locale === 'en' ? 'ar' : 'en') }}" class="rounded border border-slate-200 px-3 py-2 text-[#2d247f] transition hover:border-[#079fd4]">{{ $locale === 'en' ? 'AR' : 'EN' }}</a>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button type="button" id="pf-menu-toggle" class="relative h-10 w-10 lg:hidden" aria-label="Toggle menu">
                <span class="pf-hamburger-line pf-line-1"></span>
                <span class="pf-hamburger-line pf-line-2"></span>
                <span class="pf-hamburger-line pf-line-3"></span>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <nav id="pf-mobile-menu" class="hidden border-t border-slate-200/80 bg-white lg:hidden">
            <div class="pf-container flex flex-col">
                @foreach ($nav as $item)
                    <a href="{{ route($item['route']) }}" class="border-b border-slate-100 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-cyan-50 hover:text-[#079fd4] {{ request()->routeIs($item['route']) ? 'text-[#2d247f]' : '' }}">{{ $item['label'] }}</a>
                @endforeach
                @auth
                    <a href="{{ route('admin.products.index') }}" class="border-b border-slate-100 px-4 py-3 text-sm font-semibold text-[#2d247f] transition hover:bg-cyan-50">{{ __('site.nav.dashboard') }}</a>
                @endauth
                <a href="{{ route('locale.switch', $locale === 'en' ? 'ar' : 'en') }}" class="px-4 py-3 text-sm font-semibold text-[#2d247f] transition hover:bg-cyan-50">{{ $locale === 'en' ? 'العربية' : 'English' }}</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    @include('partials.whatsapp-widget')

    <footer class="pf-dark text-white">
        <div class="pf-container grid gap-8 py-12 md:grid-cols-[1.2fr_.8fr_.8fr]">
            <div>
                <img src="{{ asset('images/powerfalcon.jpg') }}" alt="Power Falcon" class="mb-5 h-16 w-36 rounded bg-white object-contain p-1">
                <p class="max-w-xl text-sm leading-7 text-cyan-50">{{ __('site.home.intro') }}</p>
            </div>
            <div>
                <h3 class="mb-4 font-bold">{{ __('site.nav.products') }}</h3>
                <p class="text-sm leading-7 text-cyan-50">AVRs, controllers, actuators, solenoids, sensors, battery chargers, ATS panels.</p>
            </div>
            <div>
                <h3 class="mb-4 font-bold">{{ __('site.nav.contact') }}</h3>
                <div class="space-y-2 text-sm text-cyan-50">
                    <p>{{ config('services.power_falcon.phone') }}</p>
                    <p>{{ config('services.power_falcon.phone_alt') }}</p>
                    <p>{{ config('services.power_falcon.address') }}</p>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10 py-5 text-center text-xs text-cyan-50">© {{ date('Y') }} Power Falcon. All rights reserved.</div>
    </footer>
</body>
</html>
