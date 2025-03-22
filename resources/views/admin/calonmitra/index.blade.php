@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Daftar Calon Mitra</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Daftar Calon Mitra</li>
            </ul>
        </div>
        <div class="row gy-4">
            <div class="col-xxl-3">
                <div class="card h-100 p-0">
                    <div class="card-body p-24">
                        <div class="mt-16">
                            <ul>
                                <li class="{{ $linkall ? 'item-active' : ''}} mb-4">
                                    <a href="?linkall=linkall" class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light">
                                        <span class="d-flex align-items-center gap-10 justify-content-between w-100">
                                            <span class="d-flex align-items-center gap-10">   
                                                <span class="icon text-xxl line-height-1 d-flex"><iconify-icon icon="uil:envelope" class="icon line-height-1"></iconify-icon></span>
                                                <span class="fw-semibold">Semua</span>
                                            </span>
                                            <span class="fw-medium">{{ $total }}</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $linkunread ? 'item-active' : ''}} mb-4">
                                    <a href="?linkunread=linkunread" class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light">
                                        <span class="d-flex align-items-center gap-10 justify-content-between w-100">
                                            <span class="d-flex align-items-center gap-10">   
                                                <span class="icon text-xxl line-height-1 d-flex"><iconify-icon icon="mingcute:alert-line" class="icon line-height-1"></iconify-icon></span>
                                                <span class="fw-semibold">Belum Dibaca/Ditanggapi</span>
                                            </span>
                                            <span class="fw-medium">{{ $unread }}</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $linkread ? 'item-active' : ''}} mb-4">
                                    <a href="?linkread=linkread" class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light">
                                        <span class="d-flex align-items-center gap-10 justify-content-between w-100">
                                            <span class="d-flex align-items-center gap-10">   
                                                <span class="icon text-xxl line-height-1 d-flex"><iconify-icon icon="uil:comment-verify" class="icon line-height-1"></iconify-icon></span>
                                                <span class="fw-semibold">Sudah Dibaca/Ditanggapi</span>
                                            </span>
                                            <span class="fw-medium">{{ $read }}</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9">
                <div class="card h-100 p-0 email-card">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border input-form-dark" type="checkbox" name="checkbox" id="selectAll">
                                    
                                </div>
                                <button type="button" class="delete-button d-none text-secondary-light text-xl d-flex">
                                    <iconify-icon icon="material-symbols:delete-outline" class="icon line-height-1"></iconify-icon>
                                </button>
                                <button type="button" class="reload-button text-secondary-light text-xl d-flex">
                                    <iconify-icon icon="tabler:reload" class="icon"></iconify-icon>
                                </button>
                                
                                <form class="navbar-search d-lg-block d-none" method="GET" action="{{ route('calonMitra') }}">
                                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search">
                                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                                </form>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <span class="text-secondary-light line-height-1">1-10 of {{ $total }}</span>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link d-flex bg-base border text-secondary-light text-xl {{ $calon->onFirstPage() ? 'disabled' : '' }}" href="{{ $calon->previousPageUrl() }}"><iconify-icon icon="iconamoon:arrow-left-2" class="icon"></iconify-icon> </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link d-flex bg-base border text-secondary-light text-xl {{ $calon->hasMorePages() ? '' : 'disabled' }}" href="{{ $calon->nextPageUrl() }}"><iconify-icon icon="iconamoon:arrow-right-2" class="icon"></iconify-icon> </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="overflow-x-auto">
                            @foreach ($calon as $calons)
                            <li class="email-item px-24 py-16 d-flex gap-4 align-items-center border-bottom cursor-pointer bg-hover-neutral-200 min-w-max-content ">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox">
                                </div>
                                <button type="button" class="starred-button icon text-xl text-secondary-light line-height-1 d-flex">
                                    @if ($calons->status == 'unread')
                                    <iconify-icon icon="icon-park-outline:dot" class="icon-outline line-height-1 text-primary-600"></iconify-icon>
                                    @else
                                    <div style="width: 19px"></div>
                                    @endif
                                </button>
                                <a href="{{ route('detailCalonMitra', encrypt($calons->id)) }}" class="text-{{ $calons->status == 'unread' ? 'primary' : 'secondary' }}-light fw-medium text-md text-line-1 w-190-px">{{ $calons->nama }}</a>
                                <a href="{{ route('detailCalonMitra', encrypt($calons->id)) }}" class="text-{{ $calons->status == 'unread' ? 'primary' : 'secondary' }}-light fw-medium mb-0 text-line-1 max-w-740-px">Nomor Telpon: {{ $calons->phone }}, Lokasi: {{ $calons->lokasi }}</a>
                                <span class="text-{{ $calons->status == 'unread' ? 'primary' : 'secondary' }}-light fw-medium min-w-max-content ms-auto">{{ $calons->created_at }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection