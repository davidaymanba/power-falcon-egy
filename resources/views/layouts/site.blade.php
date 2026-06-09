@php
    $locale = app()->getLocale();
    $rtl = $locale === 'ar';
    $nav = [
        ['label' => __('site.nav.home'), 'route' => 'home'],
        ['label' => __('site.nav.about'), 'route' => 'about'],
        ['label' => __('site.nav.products'), 'route' => 'products'],
        ['label' => __('site.nav.downloads'), 'route' => 'downloads'],
        ['label' => __('site.nav.contact'), 'route' => 'contact'],
    ];
@endphp
<!doctype html>
<html lang="{{ $locale }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? __('site.brand') }}</title>
    <script>
        (function () {
            const theme = localStorage.getItem('pf-theme');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (theme === 'dark' || (!theme && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur">
        <div class="pf-container flex items-center justify-between py-3">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/powerfalcon.png') }}" alt="Power Falcon" class="h-10 w-auto object-contain sm:h-12 md:h-14">
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
                <button type="button" class="pf-theme-toggle" aria-label="{{ __('site.ui.toggle_dark_mode') }}" aria-pressed="false">
                    <svg class="pf-theme-icon pf-theme-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"></path>
                    </svg>
                    <svg class="pf-theme-icon pf-theme-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"></path>
                    </svg>
                </button>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button type="button" id="pf-menu-toggle" class="relative h-10 w-10 lg:hidden" aria-label="{{ __('site.ui.toggle_menu') }}">
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
                <button type="button" class="pf-theme-toggle pf-theme-toggle-mobile" aria-label="{{ __('site.ui.toggle_dark_mode') }}" aria-pressed="false">
                    <span class="pf-theme-label-light">{{ __('site.ui.dark_mode') }}</span>
                    <span class="pf-theme-label-dark">{{ __('site.ui.light_mode') }}</span>
                    <svg class="pf-theme-icon pf-theme-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"></path>
                    </svg>
                    <svg class="pf-theme-icon pf-theme-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"></path>
                    </svg>
                </button>
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
                <img src="{{ asset('images/powerfalcon.png') }}" alt="Power Falcon" class="mb-5 h-16 w-auto object-contain">
                <p class="max-w-xl text-sm leading-7 text-cyan-50">{{ __('site.home.intro') }}</p>
            </div>
            <div>
                <h3 class="mb-4 font-bold">{{ __('site.nav.products') }}</h3>
                <p class="text-sm leading-7 text-cyan-50">{{ __('site.footer.products_text') }}</p>
            </div>
            <div>
                <h3 class="mb-4 font-bold">{{ __('site.nav.contact') }}</h3>
                <div class="space-y-2 text-sm text-cyan-50">
                    <p>{{ config('services.power_falcon.phone') }}</p>
                    <p>{{ config('services.power_falcon.phone_alt') }}</p>
                    <p>{{ __('site.contact.address') }}</p>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10 py-5 text-center text-xs text-cyan-50">© {{ date('Y') }} Power Falcon. {{ __('site.ui.rights') }}</div>
    </footer>
</body>
</html>
