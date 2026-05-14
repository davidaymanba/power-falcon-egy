@php
    $primaryPhone = config('services.power_falcon.phone');
    $secondaryPhone = config('services.power_falcon.phone_alt');
    $primaryDigits = str_replace(['+', ' ', '-'], '', $primaryPhone);
    $secondaryDigits = str_replace(['+', ' ', '-'], '', $secondaryPhone);
@endphp

<div class="pf-whatsapp-widget fixed bottom-5 right-5 z-[60]">
    <button type="button" id="pf-whatsapp-toggle" class="flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-2xl font-black text-white shadow-xl shadow-[#25D366]/30 transition hover:scale-105 focus:outline-none focus:ring-4 focus:ring-[#25D366]/30" aria-expanded="false" aria-controls="pf-whatsapp-panel" aria-label="Open WhatsApp contacts">
        <span aria-hidden="true">💬</span>
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
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-50 text-2xl">⚡</div>
                        <div>
                            <div class="text-lg font-bold text-slate-800">{{ $primaryPhone }}</div>
                            <div class="text-sm text-slate-500">Sales &amp; Enquiries</div>
                        </div>
                    </div>
                    <span class="rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-600">Online</span>
                </a>

                <a href="https://wa.me/{{ $secondaryDigits }}" target="_blank" rel="noreferrer" class="flex items-center justify-between gap-4 py-4 transition hover:bg-emerald-50/60">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-50 text-2xl">⚡</div>
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