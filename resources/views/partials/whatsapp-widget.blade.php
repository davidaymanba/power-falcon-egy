@php
    $primaryPhone = config('services.power_falcon.phone');
    $secondaryPhone = config('services.power_falcon.phone_alt');
    $primaryDigits = str_replace(['+', ' ', '-'], '', $primaryPhone);
    $secondaryDigits = str_replace(['+', ' ', '-'], '', $secondaryPhone);
@endphp

<div class="pf-whatsapp-widget fixed bottom-5 right-5 z-[60]">
    <button type="button" id="pf-whatsapp-toggle" class="flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-xl shadow-[#25D366]/30 transition hover:scale-105 focus:outline-none focus:ring-4 focus:ring-[#25D366]/30" aria-expanded="false" aria-controls="pf-whatsapp-panel" aria-label="Open WhatsApp contacts">
        <svg aria-hidden="true" class="h-8 w-8" viewBox="0 0 32 32" fill="currentColor">
            <path d="M16.01 3.2A12.73 12.73 0 0 0 3.27 15.91c0 2.24.59 4.42 1.72 6.34L3.16 28.8l6.73-1.77a12.78 12.78 0 0 0 6.12 1.56h.01A12.73 12.73 0 0 0 28.74 15.88 12.73 12.73 0 0 0 16.01 3.2Zm0 23.24h-.01c-1.9 0-3.76-.51-5.39-1.48l-.39-.23-3.99 1.05 1.07-3.88-.25-.4a10.48 10.48 0 0 1-1.61-5.59A10.58 10.58 0 0 1 16.01 5.36a10.57 10.57 0 0 1 10.57 10.53 10.57 10.57 0 0 1-10.57 10.55Zm5.79-7.89c-.32-.16-1.88-.93-2.17-1.03-.29-.11-.5-.16-.71.16-.21.32-.82 1.03-1 1.24-.18.21-.37.24-.69.08-.32-.16-1.34-.49-2.55-1.57-.94-.84-1.58-1.88-1.76-2.19-.18-.32-.02-.49.14-.65.14-.14.32-.37.48-.56.16-.18.21-.32.32-.53.11-.21.05-.4-.03-.56-.08-.16-.71-1.71-.97-2.34-.26-.61-.52-.53-.71-.54h-.61c-.21 0-.56.08-.85.4-.29.32-1.11 1.09-1.11 2.65 0 1.56 1.14 3.07 1.3 3.28.16.21 2.24 3.42 5.43 4.8.76.33 1.35.52 1.81.67.76.24 1.45.21 2 .13.61-.09 1.88-.77 2.15-1.51.26-.74.26-1.38.18-1.51-.08-.13-.29-.21-.61-.37Z" />
        </svg>
    </button>

    <div id="pf-whatsapp-panel" class="pointer-events-none absolute bottom-16 right-0 mb-3 w-[min(22rem,calc(100vw-2rem))] translate-y-2 scale-95 opacity-0 transition duration-200 ease-out">
        <div class="overflow-hidden rounded-2xl border border-emerald-100 bg-white shadow-2xl shadow-slate-900/15">
            <div class="bg-gradient-to-r from-emerald-700 to-[#25D366] px-5 py-4 text-white">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <h3 class="text-2xl font-black leading-tight">Support Staff</h3>
                        <p class="mt-1 text-sm text-emerald-50">How can we help you today?</p>
                    </div>
                    <button type="button" id="pf-whatsapp-close" class="rounded-full p-1 text-3xl leading-none text-white/90 transition hover:text-white" aria-label="Close WhatsApp contacts">&times;</button>
                </div>
            </div>

            <div class="space-y-0 bg-white px-5 py-4">
                <a href="https://wa.me/{{ $primaryDigits }}" target="_blank" rel="noreferrer" class="flex items-center justify-between gap-4 border-b border-slate-100 py-4 transition hover:bg-emerald-50/60">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-[#25D366]">
                            <svg aria-hidden="true" class="h-6 w-6" viewBox="0 0 32 32" fill="currentColor">
                                <path d="M16.01 3.2A12.73 12.73 0 0 0 3.27 15.91c0 2.24.59 4.42 1.72 6.34L3.16 28.8l6.73-1.77a12.78 12.78 0 0 0 6.12 1.56h.01A12.73 12.73 0 0 0 28.74 15.88 12.73 12.73 0 0 0 16.01 3.2Zm0 23.24h-.01c-1.9 0-3.76-.51-5.39-1.48l-.39-.23-3.99 1.05 1.07-3.88-.25-.4a10.48 10.48 0 0 1-1.61-5.59A10.58 10.58 0 0 1 16.01 5.36a10.57 10.57 0 0 1 10.57 10.53 10.57 10.57 0 0 1-10.57 10.55Zm5.79-7.89c-.32-.16-1.88-.93-2.17-1.03-.29-.11-.5-.16-.71.16-.21.32-.82 1.03-1 1.24-.18.21-.37.24-.69.08-.32-.16-1.34-.49-2.55-1.57-.94-.84-1.58-1.88-1.76-2.19-.18-.32-.02-.49.14-.65.14-.14.32-.37.48-.56.16-.18.21-.32.32-.53.11-.21.05-.4-.03-.56-.08-.16-.71-1.71-.97-2.34-.26-.61-.52-.53-.71-.54h-.61c-.21 0-.56.08-.85.4-.29.32-1.11 1.09-1.11 2.65 0 1.56 1.14 3.07 1.3 3.28.16.21 2.24 3.42 5.43 4.8.76.33 1.35.52 1.81.67.76.24 1.45.21 2 .13.61-.09 1.88-.77 2.15-1.51.26-.74.26-1.38.18-1.51-.08-.13-.29-.21-.61-.37Z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-lg font-bold text-slate-800">{{ $primaryPhone }}</div>
                            <div class="text-sm text-slate-500">Sales &amp; Enquiries</div>
                        </div>
                    </div>
                    <span class="rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-600">Online</span>
                </a>

                <a href="https://wa.me/{{ $secondaryDigits }}" target="_blank" rel="noreferrer" class="flex items-center justify-between gap-4 py-4 transition hover:bg-emerald-50/60">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-[#25D366]">
                            <svg aria-hidden="true" class="h-6 w-6" viewBox="0 0 32 32" fill="currentColor">
                                <path d="M16.01 3.2A12.73 12.73 0 0 0 3.27 15.91c0 2.24.59 4.42 1.72 6.34L3.16 28.8l6.73-1.77a12.78 12.78 0 0 0 6.12 1.56h.01A12.73 12.73 0 0 0 28.74 15.88 12.73 12.73 0 0 0 16.01 3.2Zm0 23.24h-.01c-1.9 0-3.76-.51-5.39-1.48l-.39-.23-3.99 1.05 1.07-3.88-.25-.4a10.48 10.48 0 0 1-1.61-5.59A10.58 10.58 0 0 1 16.01 5.36a10.57 10.57 0 0 1 10.57 10.53 10.57 10.57 0 0 1-10.57 10.55Zm5.79-7.89c-.32-.16-1.88-.93-2.17-1.03-.29-.11-.5-.16-.71.16-.21.32-.82 1.03-1 1.24-.18.21-.37.24-.69.08-.32-.16-1.34-.49-2.55-1.57-.94-.84-1.58-1.88-1.76-2.19-.18-.32-.02-.49.14-.65.14-.14.32-.37.48-.56.16-.18.21-.32.32-.53.11-.21.05-.4-.03-.56-.08-.16-.71-1.71-.97-2.34-.26-.61-.52-.53-.71-.54h-.61c-.21 0-.56.08-.85.4-.29.32-1.11 1.09-1.11 2.65 0 1.56 1.14 3.07 1.3 3.28.16.21 2.24 3.42 5.43 4.8.76.33 1.35.52 1.81.67.76.24 1.45.21 2 .13.61-.09 1.88-.77 2.15-1.51.26-.74.26-1.38.18-1.51-.08-.13-.29-.21-.61-.37Z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-lg font-bold text-slate-800">{{ $secondaryPhone }}</div>
                            <div class="text-sm text-slate-500">Sales &amp; Enquiries</div>
                        </div>
                    </div>
                    <span class="rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-600">Online</span>
                </a>
            </div>
        </div>
    </div>
</div>
