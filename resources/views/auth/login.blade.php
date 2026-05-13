@extends('layouts.site', ['title' => __('admin.login')])

@section('content')
<section class="pf-gradient flex min-h-[70vh] items-center py-14">
    <div class="pf-container max-w-md">
        <form method="POST" action="{{ route('login.store') }}" class="pf-card rounded-lg p-8">
            @csrf
            <img src="{{ asset('images/powerfalcon.jpg') }}" alt="Power Falcon" class="mx-auto mb-6 h-20 w-48 rounded object-contain">
            <h1 class="text-center text-2xl font-black text-[#2d247f]">{{ __('admin.login') }}</h1>
            <label class="mt-6 block">
                <span class="mb-2 block text-sm font-bold text-slate-700">Email</span>
                <input name="email" type="email" value="{{ old('email') }}" required autofocus class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
                @error('email')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror
            </label>
            <label class="mt-4 block">
                <span class="mb-2 block text-sm font-bold text-slate-700">Password</span>
                <input name="password" type="password" required class="pf-focus w-full rounded border border-slate-200 px-4 py-3">
            </label>
            <label class="mt-4 flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" class="rounded border-slate-300"> Remember me
            </label>
            <button class="mt-6 w-full rounded bg-[#2d247f] px-6 py-3 font-bold text-white transition hover:bg-[#211a66]">{{ __('admin.login') }}</button>
        </form>
    </div>
</section>
@endsection
