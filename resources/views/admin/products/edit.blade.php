@extends('layouts.admin', ['title' => __('admin.products.edit')])

@section('content')
<div class="pf-card rounded-lg p-6 md:p-8">
    <h1 class="mb-6 text-3xl font-black text-[#111827]">{{ __('admin.products.edit') }}</h1>
    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @include('admin.products._form')
    </form>
</div>
@endsection
