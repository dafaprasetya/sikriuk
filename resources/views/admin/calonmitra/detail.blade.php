@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Calon Mitra</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Daftar Calon Mitra</li>
                <li>-</li>
                <li class="fw-medium">{{ $calon->nama }}</li>
            </ul>
        </div>
        <div class="row gy-4">
            
            <div class="col-xxl-9">
                <div class="card h-100 p-0 email-card">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-4">
                            <div class="d-flex align-items-center gap-3">
                                
                                <button type="button" class="delete-button d-none text-secondary-light text-xl d-flex">
                                    <iconify-icon icon="material-symbols:delete-outline" class="icon line-height-1"></iconify-icon>
                                </button>
                                <button type="button" class="reload-button text-secondary-light text-xl d-flex">
                                    <iconify-icon icon="tabler:reload" class="icon"></iconify-icon>
                                </button>
                                
                                <form class="navbar-search d-lg-block d-none">
                                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search">
                                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card h-100 p-0 email-card overflow-x-auto d-block">
                        <div class="min-w-450-px d-flex flex-column justify-content-between h-100">
                            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center gap-3 justify-content-between flex-wrap">
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ url()->previous() }}" class="text-secondary-light d-flex me-8"><iconify-icon icon="mingcute:arrow-left-line" class="icon fs-3 line-height-1"></iconify-icon></a>
                                    <h6 class="mb-0 text-lg">{{ $calon->nama }}</h6>
                                    <span class="text-sm radius-4 px-8 {{ $calon->status == 'unread' ? 'bg-danger-50 text-danger-600' : 'bg-primary-50 text-primary-600' }}">
                                        {{ strtoupper($calon->status) }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    
                                    <form action="{{ route('deleteCalonMitra', encrypt($calon->id)) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-secondary-light d-flex"><iconify-icon icon="material-symbols:delete-outline" class="icon text-xxl line-height-1"></iconify-icon></button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="py-16 px-24 border-bottom">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <h6 class="mb-0 text-lg">{{ $calon->nama }}</h6>
                                                <span class="text-secondary-light text-md">{{ $calon->email }}</span>
                                            </div>
                                            <div class="mt-20">
                                                <table>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <td style="width: 40px; text-align: center">:</td>
                                                        <td>{{ $calon->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>NIK</th>
                                                        <td style="width: 40px; text-align: center">:</td>
                                                        <td>{{ $calon->nik }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Telpon</th>
                                                        <td style="width: 40px; text-align: center">:</td>
                                                        <td>{{ $calon->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kota</th>
                                                        <td style="width: 40px; text-align: center">:</td>
                                                        <td>{{ $calon->kota }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lokasi</th>
                                                        <td style="width: 40px; text-align: center">:</td>
                                                        <td>{{ $calon->lokasi }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" card-footer py-16 px-24 bg-base shadow-top">
                                <div class="row d-flex align-items-center justify-content-center">
                                    <div class="col-sm-10">
                                        <table>
                                            <tr>
                                                <th>Status</th>
                                                <td style="width: 40px; text-align: center">:</td>
                                                <td id="status">{{ $calon->status }}</td>
                                            </tr>
                                            <tr>
                                                <th>Dibaca oleh:</th>
                                                <td style="width: 40px; text-align: center">:</td>
                                                <td id="readby">{{ $calon->readby }}</td>
                                            </tr>
                                        </table>
                                        <p><span class="text-danger-600">*</span>klik "chat calon mitra" untuk menindak lanjuti proses calon mitra</p>
                                    </div>
                                    <div class="col-sm-2">
                                        @if ($calon->status == 'unread')
                                            <button id="tanggapi" class="btn btn-primary text-sm btn-lg px-12 py-12 w-200 radius-8 d-flex align-items-center justify-content-center gap-1">
                                                <iconify-icon icon="ion:paper-plane-outline" class="icon text-lg line-height-1"></iconify-icon>
                                                Chat Calon Mitra
                                            </button>
                                            @else
                                            <a href="{{ $wa }}" target="_blank" class="btn btn-primary text-sm btn-lg px-12 py-12 w-200 radius-8 d-flex align-items-center justify-content-center gap-1">
                                                {{-- <iconify-icon icon="ion:paper-plane-outline" class="icon text-lg line-height-1"></iconify-icon> --}}
                                                telah ditanggapi oleh {{ $calon->readby }}
                                            </a>
                                            
                                        @endif
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $("#tanggapi").on("click", function() {
                                                    // alert("Tombol diklik!");
                                                    $.ajax({
                                                        url: '{{ route('editCalonMitra',$calon->id) }}', // Gunakan URL dari data-id
                                                        type: "POST",
                                                        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }, // CSRF Token untuk Laravel
                                                        success: function (response) {
                                                            $("#status").text(response.status);
                                                            $("#readby").text(response.readby);
                                                            $("#tanggapi").text('telah ditanggapi oleh '+response.readby);
                                                            $("#tanggapi").attr('disabled', true);
                                                            window.open(response.url, "_blank");
                                                            
                                                        },
                                                        error: function (xhr) {
                                                            console.log("Error:", xhr.responseText);
                                                            alert("Terjadi kesalahan saat membuat promo.");
                                                        }
                                                    });
                                                });
                                            });
                                        
                                            
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection