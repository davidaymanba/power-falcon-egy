@php($rtl = app()->getLocale() === 'ar')
<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? __('admin.products.title') }} | Power Falcon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans text-slate-900 antialiased">
    <div class="min-h-screen">
        <header class="border-b border-slate-200 bg-white">
            <div class="pf-container flex min-h-18 items-center justify-between gap-4 py-3">
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/powerfalcon.jpg') }}" alt="Power Falcon" class="h-10 w-24 rounded object-contain sm:h-11 sm:w-28">
                    <span class="font-bold text-[#2d247f] text-lg sm:text-xl">{{ __('site.nav.dashboard') }}</span>
                </a>

                <nav class="hidden items-center gap-2 lg:flex">
                    <a href="{{ route('home') }}" class="rounded px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">{{ __('site.nav.home') }}</a>
                    <a href="{{ route('locale.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}" class="rounded border border-slate-200 px-3 py-2 text-sm font-semibold transition hover:border-[#079fd4]">{{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}</a>
                    <form method="POST" action="{{ route('logout') }}">@csrf<button class="rounded bg-[#2d247f] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#231d63]">{{ __('admin.logout') }}</button></form>
                </nav>

                <button type="button" id="pf-menu-toggle" class="relative h-10 w-10 lg:hidden" aria-label="Toggle menu">
                    <span class="pf-hamburger-line pf-line-1"></span>
                    <span class="pf-hamburger-line pf-line-2"></span>
                    <span class="pf-hamburger-line pf-line-3"></span>
                </button>
            </div>

            <nav id="pf-mobile-menu" class="hidden border-t border-slate-200/80 bg-white lg:hidden">
                <div class="pf-container flex flex-col py-1">
                    <a href="{{ route('home') }}" class="border-b border-slate-100 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-cyan-50">{{ __('site.nav.home') }}</a>
                    <a href="{{ route('locale.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}" class="border-b border-slate-100 px-4 py-3 text-sm font-semibold text-[#2d247f] transition hover:bg-cyan-50">{{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}</a>
                    <form method="POST" action="{{ route('logout') }}" class="px-4 py-3">
                        @csrf
                        <button class="w-full rounded bg-[#2d247f] px-4 py-2 text-sm font-bold text-white">{{ __('admin.logout') }}</button>
                    </form>
                </div>
            </nav>
        </header>
        <main class="pf-container py-8">
            @if (session('success'))
                <div class="mb-6 rounded border border-cyan-200 bg-cyan-50 px-4 py-3 text-sm font-semibold text-[#0579a7]">{{ session('success') }}</div>
            @endif
            @yield('content')
        </main>

        @include('partials.whatsapp-widget')
    </div>
</body>
</html>
