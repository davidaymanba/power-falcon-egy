@csrf
@if ($category->exists)
    @method('PUT')
@endif

<div class="grid gap-5 md:grid-cols-2">
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.categories.name_en') }}</span>
        <input name="name_en" value="{{ old('name_en', $category->name_en) }}" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
        @error('name_en')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.categories.name_ar') }}</span>
        <input name="name_ar" value="{{ old('name_ar', $category->name_ar) }}" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
        @error('name_ar')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
</div>

<label class="mt-5 block">
    <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.categories.slug') }}</span>
    <input name="slug" value="{{ old('slug', $category->slug) }}" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
    @error('slug')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
</label>

<div class="mt-6 flex flex-wrap gap-3">
    <button class="rounded bg-[#079fd4] px-6 py-3 font-bold text-white">{{ __('admin.categories.save') }}</button>
    <a href="{{ route('admin.categories.index') }}" class="rounded border border-slate-200 px-6 py-3 font-bold text-slate-700">Cancel</a>
</div>
