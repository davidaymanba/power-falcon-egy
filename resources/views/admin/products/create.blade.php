@extends('layouts.admin', ['title' => __('admin.products.create')])

@section('content')
<div class="pf-card rounded-lg p-6 md:p-8">
    <h1 class="mb-6 text-3xl font-black text-[#111827]">{{ __('admin.products.create') }}</h1>
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @include('admin.products._form', ['product' => new App\Models\Product()])
    </form>
</div>
@endsection
