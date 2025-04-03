@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Lokasi</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Lokasi</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-header border-bottom-0 pb-0 pt-0 px-0">
                <ul class="nav border-gradient-tab nav-pills mb-0 border-top-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">
                        List Lokasi
                      </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-ui-design-tab" data-bs-toggle="pill" data-bs-target="#pills-ui-design" type="button" role="tab" aria-controls="pills-ui-design" aria-selected="false" tabindex="-1">
                          Tambah Lokasi
                        </button>
                    </li>
                </ul>
             </div>
            <div class="card-body p-24">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                        <div class="row gy-4" id="pencapaian">
                            <div class="table-responsive">

                                <table class="table bordered-table mb-0" id="dataTableStep" data-page-length='10'>
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                No.
                                            </th>
                                            <th scope="col">
                                                Nama
                                            </th>
                                            <th scope="col">
                                                Kota
                                            </th>
                                            <th scope="col">
                                                Latitude
                                            </th>
                                            <th scope="col">
                                                Longitude
                                            </th>
                                            <th scope="col">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataLokasiTable">
                                        @foreach ($lokasi as $lokasis)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $lokasis->nama }}
                                            </td>
                                            <td>
                                                {{ $lokasis->kota }}
                                            </td>
                                            <td>
                                                {{ $lokasis->latitude }}
                                            </td>
                                            <td>
                                                {{ $lokasis->longitude }}
                                            </td>
                                            <form action="{{ route('deleteLokasi',encrypt($lokasis->id)) }}" method="POST" id="deleteLokasiForm{{ $lokasis->id }}">@csrf</form>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#{{ $lokasis->id }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                                </button>
                                                <button class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center" onclick="event.preventDefault();
                                                     document.getElementById('deleteLokasiForm{{ $lokasis->id }}').submit();">
                                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                </button>
                                                <a href="{{ $lokasis->linkmaps }}" class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                    <iconify-icon icon="tabler:location"></iconify-icon>
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="{{ $lokasis->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalLabel">Edit {{ $lokasis->nama }}</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editLokasiForm{{ $lokasis->id }}" enctype="multipart/form-data" action="{{ route('editLokasi',encrypt($lokasis->id)) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="nama" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                                                    <input type="text" name="nama" class="form-control radius-8" id="nama" placeholder="Masukan nama Mitra" value="{{ $lokasis->nama }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="kota" class="form-label fw-semibold text-primary-light text-sm mb-8">Kota <span class="text-danger-600">*</span></label>
                                                                    <input type="text" name="kota" class="form-control radius-8" id="kota" placeholder="Masukan nama Kota" value="{{ $lokasis->kota }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="latitude" class="form-label fw-semibold text-primary-light text-sm mb-8">Latitude <span class="text-danger-600">*</span></label>
                                                                    <input type="text" name="latitude" class="form-control radius-8" id="latitude" placeholder="Masukan koordinat latitude" value="{{ $lokasis->latitude }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="longitude" class="form-label fw-semibold text-primary-light text-sm mb-8">Longitude <span class="text-danger-600">*</span></label>
                                                                    <input type="text" name="longitude" class="form-control radius-8" id="longitude" placeholder="Masukan koordinat longitude" value="{{ $lokasis->longitude }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="linkmaps" class="form-label fw-semibold text-primary-light text-sm mb-8">Link Google Maps <span class="text-danger-600">*</span></label>
                                                                    <input type="text" name="linkmaps" class="form-control radius-8" id="linkmaps" placeholder="Masukan link google maps" value="{{ $lokasis->linkmaps }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                  <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('editLokasiForm{{ $lokasis->id }}').submit();">Simpan</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-ui-design" role="tabpanel" aria-labelledby="pills-ui-design-tab" tabindex="0">
                        <form id="LokasiddForm" data-id="{{ route('createLokasi') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="nama" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                        <input type="text" name="nama" class="form-control radius-8" id="nama" placeholder="Masukan nama Mitra" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="kota" class="form-label fw-semibold text-primary-light text-sm mb-8">Kota <span class="text-danger-600">*</span></label>
                                        <input type="text" name="kota" class="form-control radius-8" id="kota" placeholder="Masukan nama Kota" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="latitude" class="form-label fw-semibold text-primary-light text-sm mb-8">Latitude <span class="text-danger-600">*</span></label>
                                        <input type="text" name="latitude" class="form-control radius-8" id="latitude" placeholder="Masukan koordinat latitude" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="longitude" class="form-label fw-semibold text-primary-light text-sm mb-8">Longitude <span class="text-danger-600">*</span></label>
                                        <input type="text" name="longitude" class="form-control radius-8" id="longitude" placeholder="Masukan koordinat longitude" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="linkmaps" class="form-label fw-semibold text-primary-light text-sm mb-8">Link Google Maps <span class="text-danger-600">*</span></label>
                                        <input type="text" name="linkmaps" class="form-control radius-8" id="linkmaps" placeholder="Masukan link google maps" value="">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center gap-3 mt-9">
                                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                        Save Change
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Toast -->
                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                            <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        Data Berhasil Dibuat
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $("#LokasiddForm").submit(function (e) {
                                    e.preventDefault();

                                    let formData = new FormData(this);
                                    let url = $(this).data("id");
                                    $.ajax({
                                        url: url, // Gunakan URL dari data-id
                                        type: "POST",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }, // CSRF Token untuk Laravel
                                        success: function (response) {

                                            console.log(response.id);
                                            var toastEl = document.getElementById('successToast');
                                            var toast = new bootstrap.Toast(toastEl);
                                            toast.show();
                                            $("#LokasiddForm")[0].reset();
                                            $("#dataLokasiTable").append(`
                                                <tr>
                                                    <td>${response.id}</td>
                                                    <td>${response.nama}</td>
                                                    <td>${response.kota}</td>
                                                    <td>${response.latitude}</td>
                                                    <td>${response.longitude}</td>
                                                    <td>
                                                        <button href="javascript:void(0)" class="w-32-px h-32-px bg-secondary-focus text-secondary-main rounded-circle d-inline-flex align-items-center justify-content-center" disabled>
                                                            <iconify-icon icon="lucide:edit"></iconify-icon>
                                                        </button>
                                                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-secondary-focus text-secondary-main rounded-circle d-inline-flex align-items-center justify-content-center" disabled>
                                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                        </a>
                                                        <a href="${response.linkmaps}" class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                            <iconify-icon icon="tabler:location"></iconify-icon>
                                                        </a>
                                                    </td>
                                                </tr>

                                            `);
                                        },
                                        error: function (xhr) {
                                            console.log("Error:", xhr.responseText);
                                            var toastEl = document.getElementById('errorToast');
                                            var toast = new bootstrap.Toast(toastEl);
                                            toast.show();
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
</main>

@endsection
