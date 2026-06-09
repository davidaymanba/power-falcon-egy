@csrf
@if ($download->exists)
    @method('PUT')
@endif

@php($typeLabels = trans('admin.downloads.types'))

<div class="grid gap-5 md:grid-cols-2">
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.downloads.title_en') }}</span>
        <input name="title_en" value="{{ old('title_en', $download->title_en) }}" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
        @error('title_en')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.downloads.title_ar') }}</span>
        <input name="title_ar" value="{{ old('title_ar', $download->title_ar) }}" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
        @error('title_ar')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
</div>

<div class="mt-5 grid gap-5 md:grid-cols-3">
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.downloads.type') }}</span>
        <select name="type" class="pf-focus w-full rounded border border-slate-200 bg-white px-4 py-3">
            @foreach ($types as $type)
                <option value="{{ $type }}" @selected(old('type', $download->type) === $type)>{{ $typeLabels[$type] ?? $type }}</option>
            @endforeach
        </select>
        @error('type')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.downloads.sort_order') }}</span>
        <input name="sort_order" type="number" min="0" value="{{ old('sort_order', $download->sort_order ?? 0) }}" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
        @error('sort_order')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
    <label class="flex items-center gap-3 rounded border border-slate-200 bg-white px-4 py-3 md:mt-7">
        <input name="is_active" type="checkbox" value="1" @checked((bool) old('is_active', $download->exists ? $download->is_active : true)) class="h-5 w-5 rounded border-slate-300 text-[#079fd4]">
        <span class="text-sm font-bold text-slate-700">{{ __('admin.downloads.active') }}</span>
    </label>
</div>

<div class="mt-5 grid gap-5 md:grid-cols-2">
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.downloads.url') }}</span>
        <input name="url" type="url" value="{{ old('url', $download->url) }}" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
        @error('url')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.downloads.file') }}</span>
        <input name="file" type="file" class="pf-focus w-full rounded border border-slate-200 bg-white px-4 py-3">
        @error('file')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
</div>

@if ($download->exists && $download->resource_url)
    <div class="mt-5 rounded border border-slate-200 bg-slate-50 px-4 py-3 text-sm">
        <span class="font-bold text-slate-700">{{ __('admin.downloads.current_resource') }}:</span>
        <a href="{{ $download->resource_url }}" target="_blank" rel="noopener" class="font-semibold text-[#0579a7] hover:text-[#2d247f]">{{ $download->resource_url }}</a>
    </div>
@endif

<div class="mt-5 grid gap-5 md:grid-cols-2">
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.downloads.description_en') }}</span>
        <textarea name="description_en" rows="5" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">{{ old('description_en', $download->description_en) }}</textarea>
        @error('description_en')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.downloads.description_ar') }}</span>
        <textarea name="description_ar" rows="5" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">{{ old('description_ar', $download->description_ar) }}</textarea>
        @error('description_ar')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
</div>

<div class="mt-6 flex flex-wrap gap-3">
    <button class="rounded bg-[#079fd4] px-6 py-3 font-bold text-white">{{ __('admin.downloads.save') }}</button>
    <a href="{{ route('admin.downloads.index') }}" class="rounded border border-slate-200 px-6 py-3 font-bold text-slate-700">Cancel</a>
</div>
