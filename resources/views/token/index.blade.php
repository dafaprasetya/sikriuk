@extends('layouts.wowdash.core')
@section('body')

<div class="custom-bg">
    <div class="container container--xl">
        <div class="d-flex align-items-center justify-content-between py-24">

        </div>

        <!-- <div class="py-res-120 text-center"> -->
        <div class="pt-48 pb-40 text-center">
            <div class="max-w-700-px mx-auto mt-40">
                <h3 class="mb-24 max-w-1000-px">Access Denied</h3>
                <p class="text-neutral-500 max-w-700-px text-lg">Anda tidak punya akses ke halaman ini, jika anda punya akses harap masukan kode akses yang anda punya</p>
                <form action="{{ route('checktoken') }}" method="post">
                    @csrf
                    <div class="col-12">
                        <input type="password" name="token" placeholder="Enter token" class="form-control" {!! session('error') ? 'autofocus' : '' !!}>
                        @if (session('error'))
                            <span class="text-danger">{{ session('error') }}</span>
                        @endif
                    </div>
                    <button type="submit" href="index.html" class="btn btn-primary-600 px-32 py-16 flex-shrink-0 d-inline-flex align-items-center justify-content-center gap-8 mt-28">
                        <i class="ri-key-fill"></i> Go
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
