@extends('layouts.admin', ['title' => __('admin.products.title')])

@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="text-3xl font-black text-[#111827]">{{ __('admin.products.title') }}</h1>
        <p class="mt-1 text-sm text-slate-500">Manage the public product showcase.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="rounded bg-[#079fd4] px-5 py-3 font-bold text-white">{{ __('admin.products.create') }}</a>
</div>

<form method="GET" class="mb-5 flex gap-3">
    <input name="search" value="{{ request('search') }}" placeholder="{{ __('site.products.search_placeholder') }}" class="pf-focus w-full max-w-md rounded border border-slate-200 bg-white px-4 py-3">
    <button class="rounded bg-[#2d247f] px-5 py-3 font-bold text-white">{{ __('site.cta.search') }}</button>
</form>

<div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[760px] text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                <tr>
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3">{{ __('admin.products.name_en') }}</th>
                    <th class="px-4 py-3">{{ __('admin.products.name_ar') }}</th>
                    <th class="px-4 py-3">{{ __('admin.products.category') }}</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($products as $product)
                    <tr>
                        <td class="px-4 py-3"><img src="{{ $product->image_url }}" alt="{{ $product->name_en }}" class="h-16 w-20 rounded bg-slate-50 object-contain"></td>
                        <td class="px-4 py-3 font-semibold text-slate-900">{{ $product->name_en }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $product->name_ar }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $product->category?->name_en }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="rounded border border-slate-200 px-3 py-2 font-bold text-[#2d247f]">Edit</a>
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" data-delete-form>
                                    @csrf @method('DELETE')
                                    <button type="button" data-delete-button class="rounded border border-red-200 px-3 py-2 font-bold text-red-600">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-12 text-center text-slate-500">{{ __('site.products.empty_title') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">{{ $products->links() }}</div>

<dialog id="deleteProductModal" class="w-full max-w-md rounded-lg p-0 shadow-2xl backdrop:bg-slate-950/50">
    <div class="p-6">
        <h2 class="text-xl font-black text-[#111827]">{{ __('admin.products.delete_confirm') }}</h2>
        <p class="mt-3 text-sm leading-6 text-slate-600">This action permanently removes the product from the showcase.</p>
        <div class="mt-6 flex justify-end gap-3">
            <button type="button" data-modal-cancel class="rounded border border-slate-200 px-4 py-2 font-bold text-slate-700">Cancel</button>
            <button type="button" data-modal-confirm class="rounded bg-red-600 px-4 py-2 font-bold text-white">Delete</button>
        </div>
    </div>
</dialog>

<script>
    const modal = document.getElementById('deleteProductModal');
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
