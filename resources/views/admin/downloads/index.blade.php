@extends('layouts.admin', ['title' => __('admin.downloads.title')])

@section('content')
@php($typeLabels = trans('admin.downloads.types'))

<div class="mb-6 flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="text-3xl font-black text-[#111827]">{{ __('admin.downloads.title') }}</h1>
        <p class="mt-1 text-sm text-slate-500">Manage public catalogs, videos, links, and downloadable files.</p>
    </div>
    <a href="{{ route('admin.downloads.create') }}" class="rounded bg-[#079fd4] px-5 py-3 font-bold text-white">{{ __('admin.downloads.create') }}</a>
</div>

<form method="GET" class="mb-5 grid gap-3 md:grid-cols-[minmax(0,1fr)_220px_auto_auto]">
    <input name="search" value="{{ request('search') }}" placeholder="{{ __('site.downloads.search_placeholder') }}" class="pf-focus w-full rounded border border-slate-200 bg-white px-4 py-3">
    <select name="type" class="pf-focus w-full rounded border border-slate-200 bg-white px-4 py-3">
        <option value="">{{ __('site.downloads.all_types') }}</option>
        @foreach ($types as $type)
            <option value="{{ $type }}" @selected(request('type') === $type)>{{ $typeLabels[$type] ?? $type }}</option>
        @endforeach
    </select>
    <button class="rounded bg-[#2d247f] px-5 py-3 font-bold text-white">{{ __('site.cta.search') }}</button>
    <a href="{{ route('admin.downloads.index') }}" class="rounded border border-slate-200 px-5 py-3 text-center font-bold text-slate-700">{{ __('site.cta.reset') }}</a>
</form>

<div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[900px] text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                <tr>
                    <th class="px-4 py-3">{{ __('admin.downloads.title_en') }}</th>
                    <th class="px-4 py-3">{{ __('admin.downloads.title_ar') }}</th>
                    <th class="px-4 py-3">{{ __('admin.downloads.type') }}</th>
                    <th class="px-4 py-3">{{ __('admin.downloads.source') }}</th>
                    <th class="px-4 py-3">{{ __('admin.downloads.status') }}</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($downloads as $download)
                    <tr>
                        <td class="px-4 py-3 font-semibold text-slate-900">{{ $download->title_en }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $download->title_ar }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $typeLabels[$download->type] ?? $download->type }}</td>
                        <td class="max-w-[260px] truncate px-4 py-3 text-slate-600">
                            @if ($download->resource_url)
                                <a href="{{ $download->resource_url }}" target="_blank" rel="noopener" class="font-semibold text-[#0579a7] hover:text-[#2d247f]">{{ $download->resource_url }}</a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <span class="rounded px-2 py-1 text-xs font-bold {{ $download->is_active ? 'bg-cyan-50 text-[#0579a7]' : 'bg-slate-100 text-slate-500' }}">{{ $download->is_active ? __('admin.downloads.active') : __('admin.downloads.inactive') }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.downloads.edit', $download) }}" class="rounded border border-slate-200 px-3 py-2 font-bold text-[#2d247f]">Edit</a>
                                <form method="POST" action="{{ route('admin.downloads.destroy', $download) }}" data-delete-form>
                                    @csrf @method('DELETE')
                                    <button type="button" data-delete-button class="rounded border border-red-200 px-3 py-2 font-bold text-red-600">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-12 text-center text-slate-500">{{ __('admin.downloads.empty') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">{{ $downloads->links() }}</div>

<dialog id="deleteDownloadModal" class="w-full max-w-md rounded-lg p-0 shadow-2xl backdrop:bg-slate-950/50">
    <div class="p-6">
        <h2 class="text-xl font-black text-[#111827]">{{ __('admin.downloads.delete_confirm') }}</h2>
        <p class="mt-3 text-sm leading-6 text-slate-600">{{ __('admin.downloads.delete_note') }}</p>
        <div class="mt-6 flex justify-end gap-3">
            <button type="button" data-modal-cancel class="rounded border border-slate-200 px-4 py-2 font-bold text-slate-700">Cancel</button>
            <button type="button" data-modal-confirm class="rounded bg-red-600 px-4 py-2 font-bold text-white">Delete</button>
        </div>
    </div>
</dialog>

<script>
    const modal = document.getElementById('deleteDownloadModal');
    let activeDeleteForm = null;

    document.querySelectorAll('[data-delete-button]').forEach((button) => {
        button.addEventListener('click', () => {
            activeDeleteForm = button.closest('[data-delete-form]');
            modal.showModal();
        });
    });

    document.querySelector('[data-modal-cancel]').addEventListener('click', () => modal.close());
    document.querySelector('[data-modal-confirm]').addEventListener('click', () => activeDeleteForm?.submit());
</script>
@endsection
