@extends('layouts.site', ['title' => __('site.brand')])

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 py-16">
    <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml+base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImEiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMiIgZmlsbD0iIzBmOWZkNCI+PC9jaXJjbGU+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2EpIi8+PC9zdmc+')] bg-repeat"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#2d247f]/60 to-[#079fd4]/30"></div>
    
    <div class="pf-container relative z-10 text-center">
        <h1 class="mb-4 text-5xl font-black leading-tight text-white md:text-6xl">{{ __('site.contact.title') }}</h1>
        <p class="text-lg text-slate-200">{{ __('site.contact.intro') }}</p>
    </div>
</section>

<!-- Contact Section -->
<section class="bg-white py-20">
    <div class="pf-container">
        <div class="grid gap-12 lg:grid-cols-3">
            <!-- Contact Info -->
            <div class="space-y-8 rtl:ml-auto rtl:max-w-xl rtl:text-right">
                <div>
                    <h2 class="mb-6 text-2xl font-black text-[#111827]">{{ __('site.contact.get_in_touch') }}</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <span class="mt-1 flex h-8 w-8 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4]">📞</span>
                            <div>
                                <p class="font-semibold text-slate-900">{{ __('site.contact.phone_label') }}</p>
                                <p class="text-slate-600"><bdi dir="ltr">{{ config('services.power_falcon.phone') }}</bdi></p>
                                <p class="text-slate-600"><bdi dir="ltr">{{ config('services.power_falcon.phone_alt') }}</bdi></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <span class="mt-1 flex h-8 w-8 items-center justify-center rounded-full bg-[#079fd4]/20 text-[#079fd4]">📍</span>
                            <div>
                                <p class="font-semibold text-slate-900">{{ __('site.contact.address_label') }}</p>
                                <p class="text-slate-600">{{ __('site.contact.address') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div>
                    <h3 class="mb-4 font-bold text-[#111827]">{{ __('site.contact.connect') }}</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', config('services.power_falcon.phone')) }}" target="_blank" class="inline-flex items-center gap-2 rounded-full bg-[#25D366] px-4 py-2 font-bold text-white transition hover:bg-[#20BA58]">
                            💬 {{ __('site.cta.whatsapp') }}
                        </a>
                        <a href="{{ config('services.power_falcon.maps_url') }}" target="_blank" class="inline-flex items-center gap-2 rounded-full border border-[#079fd4] px-4 py-2 font-bold text-[#079fd4] transition hover:bg-[#079fd4]/10">
                            🗺️ {{ __('site.cta.maps') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Map & Form Container -->
            <div class="lg:col-span-2">
                <!-- Map -->
                <div class="mb-8 overflow-hidden rounded-2xl border border-slate-200 shadow-md" style="height: 300px;">
                    <iframe src="{{ config('services.power_falcon.maps_embed_url', config('services.power_falcon.maps_url')) }}" width="100%" height="100%" style="border:none;" loading="lazy"></iframe>
                </div>

                <!-- Contact Form -->
                @if (session('success'))
                    <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block font-bold text-[#111827]">{{ __('site.contact.name') }}</label>
                            <input type="text" name="name" required class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-[#079fd4] focus:outline-none" value="{{ old('name') }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-2 block font-bold text-[#111827]">{{ __('site.contact.email') }}</label>
                            <input type="email" name="email" required class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-[#079fd4] focus:outline-none" value="{{ old('email') }}">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block font-bold text-[#111827]">{{ __('site.contact.phone') }}</label>
                            <input type="tel" name="phone" required dir="ltr" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-left focus:border-[#079fd4] focus:outline-none" value="{{ old('phone') }}">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-2 block font-bold text-[#111827]">{{ __('site.contact.subject') }}</label>
                            <input type="text" name="subject" required class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-[#079fd4] focus:outline-none" value="{{ old('subject') }}">
                            @error('subject')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block font-bold text-[#111827]">{{ __('site.contact.message') }}</label>
                        <textarea name="message" rows="5" required class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-[#079fd4] focus:outline-none">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full rounded-lg bg-[#079fd4] px-8 py-3 font-bold text-white transition hover:bg-[#0579a7]">
                        {{ __('site.cta.send') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
