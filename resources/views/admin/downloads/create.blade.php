@extends('layouts.admin', ['title' => __('admin.downloads.create')])

@section('content')
<div class="pf-card rounded-lg p-6 md:p-8">
    <h1 class="mb-6 text-3xl font-black text-[#111827]">{{ __('admin.downloads.create') }}</h1>
    <form method="POST" action="{{ route('admin.downloads.store') }}" enctype="multipart/form-data">
        @include('admin.downloads._form')
    </form>
</div>
@endsection
