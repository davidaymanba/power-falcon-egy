@csrf
@if ($product->exists)
    @method('PUT')
@endif

<div class="grid gap-5 md:grid-cols-2">
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.products.name_en') }}</span>
        <input name="name_en" value="{{ old('name_en', $product->name_en) }}" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
        @error('name_en')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.products.name_ar') }}</span>
        <input name="name_ar" value="{{ old('name_ar', $product->name_ar) }}" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
        @error('name_ar')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
</div>

<div class="mt-5 grid gap-5 md:grid-cols-2">
    <label class="block">
        <span class="mb-2 flex items-center justify-between gap-3 text-sm font-bold text-slate-700">
            <span>{{ __('admin.products.category') }}</span>
            <a href="{{ route('admin.categories.create') }}" class="text-xs font-bold text-[#0579a7] hover:text-[#2d247f]">{{ __('admin.categories.create') }}</a>
        </span>
        <select name="category_id" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
            <option value="">-</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((int) old('category_id', $product->category_id) === $category->id)>{{ $category->name_en }}</option>
            @endforeach
        </select>
        @error('category_id')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.products.image') }}</span>
        <input name="image" type="file" accept="image/*" class="pf-focus w-full rounded border border-slate-200 bg-white px-4 py-3">
        @error('image')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
    </label>
</div>

@if ($product->exists)
    <img src="{{ $product->image_url }}" alt="{{ $product->name_en }}" class="mt-5 h-32 w-40 rounded border border-slate-200 bg-white object-contain">
@endif

<div class="mt-5 grid gap-5 md:grid-cols-2">
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.products.description_en') }}</span>
        <textarea name="description_en" rows="5" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">{{ old('description_en', $product->description_en) }}</textarea>
    </label>
    <label class="block">
        <span class="mb-2 block text-sm font-bold text-slate-700">{{ __('admin.products.description_ar') }}</span>
        <textarea name="description_ar" rows="5" class="pf-focus w-full rounded border border-slate-200 px-4 py-3">{{ old('description_ar', $product->description_ar) }}</textarea>
    </label>
</div>

<div class="mt-6 flex gap-3">
    <button class="rounded bg-[#079fd4] px-6 py-3 font-bold text-white">{{ __('admin.products.save') }}</button>
    <a href="{{ route('admin.products.index') }}" class="rounded border border-slate-200 px-6 py-3 font-bold text-slate-700">Cancel</a>
</div>
