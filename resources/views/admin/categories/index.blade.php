@extends('layouts.admin', ['title' => __('admin.categories.title')])

@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="text-3xl font-black text-[#111827]">{{ __('admin.categories.title') }}</h1>
        <p class="mt-1 text-sm text-slate-500">Manage product categories for the dashboard and public catalog.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="rounded bg-[#079fd4] px-5 py-3 font-bold text-white">{{ __('admin.categories.create') }}</a>
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
                    <th class="px-4 py-3">{{ __('admin.categories.name_en') }}</th>
                    <th class="px-4 py-3">{{ __('admin.categories.name_ar') }}</th>
                    <th class="px-4 py-3">{{ __('admin.categories.slug') }}</th>
                    <th class="px-4 py-3">{{ __('admin.categories.products_count') }}</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($categories as $category)
                    <tr>
                        <td class="px-4 py-3 font-semibold text-slate-900">{{ $category->name_en }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $category->name_ar }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $category->slug }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $category->products_count }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="rounded border border-slate-200 px-3 py-2 font-bold text-[#2d247f]">Edit</a>
                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" data-delete-form>
                                    @csrf @method('DELETE')
                                    <button type="button" data-delete-button class="rounded border border-red-200 px-3 py-2 font-bold text-red-600">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-12 text-center text-slate-500">{{ __('admin.categories.empty') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">{{ $categories->links() }}</div>

<dialog id="deleteCategoryModal" class="w-full max-w-md rounded-lg p-0 shadow-2xl backdrop:bg-slate-950/50">
    <div class="p-6">
        <h2 class="text-xl font-black text-[#111827]">{{ __('admin.categories.delete_confirm') }}</h2>
        <p class="mt-3 text-sm leading-6 text-slate-600">{{ __('admin.categories.delete_note') }}</p>
        <div class="mt-6 flex justify-end gap-3">
            <button type="button" data-modal-cancel class="rounded border border-slate-200 px-4 py-2 font-bold text-slate-700">Cancel</button>
            <button type="button" data-modal-confirm class="rounded bg-red-600 px-4 py-2 font-bold text-white">Delete</button>
        </div>
    </div>
</dialog>

<script>
    const modal = document.getElementById('deleteCategoryModal');
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
