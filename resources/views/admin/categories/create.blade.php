@extends('layouts.admin', ['title' => __('admin.categories.create')])

@section('content')
<div class="pf-card rounded-lg p-6 md:p-8">
    <h1 class="mb-6 text-3xl font-black text-[#111827]">{{ __('admin.categories.create') }}</h1>
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @include('admin.categories._form')
    </form>
</div>
@endsection
