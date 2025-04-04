@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
@include('admin.alert.aler')
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Syarat</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Syarat</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-header border-bottom-0 pb-0 pt-0 px-0">
                <ul class="nav border-gradient-tab nav-pills mb-0 border-top-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">
                        List Syarat
                      </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-ui-design-tab" data-bs-toggle="pill" data-bs-target="#pills-ui-design" type="button" role="tab" aria-controls="pills-ui-design" aria-selected="false" tabindex="-1">
                          Tambah Syarat
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
                                            {{-- <th scope="col">
                                                Foto
                                            </th> --}}
                                            <th scope="col">
                                                Nama
                                            </th>
                                            <th scope="col">
                                                Deskripsi
                                            </th>
                                            <th scope="col">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataTable">
                                        @foreach ($syarat as $syarats)
                                        <tr>
                                            <td>
                                                {{ $syarats->nomor }}
                                            </td>
                                            {{-- <td>
                                                <img src="{{ asset('storage/testimoni_image/'.$testimonis->foto) }}" style="width: 90px;" alt="" id="gambarmenu" class="flex-shrink-0 me-12 radius-8">
                                            </td> --}}
                                            <td>
                                                {{ $syarats->nama }}
                                            </td>
                                            <td>
                                                {{ $syarats->deskripsi }}
                                            </td>
                                            <form action="{{ route('deleteSyarat', encrypt($syarats->id)) }}" method="post" id="deleteSyaratForm{{ $syarats->id }}">@csrf</form>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#{{ $syarats->id }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                                </button>
                                                <button class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"  onclick="event.preventDefault();
                                                     document.getElementById('deleteSyaratForm{{ $syarats->id }}').submit();">
                                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="{{ $syarats->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalLabel">Edit {{ $syarats->nama }}</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editSyaratForm{{ $syarats->id }}" enctype="multipart/form-data" action="{{ route('editSyarat',encrypt($syarats->id)) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="nomor" class="form-label fw-semibold text-primary-light text-sm mb-8">Nomor <span class="text-danger-600">*</span></label>
                                                                    <input type="number" name="nomor" class="form-control radius-8" id="nomor" placeholder="Masukan urutan nomor" value="{{ $syarats->nomor }}">
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="foto" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                                        Gambar <span class="text-danger-600">*</span>
                                                                    </label>
                                                                    <div class="imagePreview d-flex justify-content-center align-items-center">
                                                                        <img id="previewImg{{ $syarats->id }}" class="rounded" style="display: none; max-width: 200px; height: auto;">
                                                                    </div>
                                                                    <input type="file" name="foto" class="form-control radius-8 mt-3" id="gambar{{ $syarats->id }}" accept="image/*">
                                                                </div>
                                                            </div> --}}
                                                            {{-- <script>
                                                                document.getElementById('gambar{{ $syarats->id }}').addEventListener('change', function(event) {
                                                                    let file = event.target.files[0]; // Ambil file
                                                                    let previewImg = document.getElementById('previewImg{{ $syarats->id }}');

                                                                    if (file) {
                                                                        let reader = new FileReader();
                                                                        reader.onload = function(e) {
                                                                            previewImg.src = e.target.result; // Update src gambar
                                                                            previewImg.style.display = "block"; // Tampilkan gambar
                                                                        };
                                                                        reader.readAsDataURL(file);
                                                                    } else {
                                                                        previewImg.style.display = "none"; // Sembunyikan jika tidak ada file
                                                                    }
                                                                });
                                                            </script> --}}
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                                                    <input type="text" name="nama" class="form-control radius-8" id="name" placeholder="Masukan nama" value="{{ $syarats->nama }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="deskripsi" class="form-label fw-semibold text-primary-light text-sm mb-8">Deskripsi<span class="text-danger-600">*</span></label>
                                                                    <textarea name="deskripsi" class="form-control" rows="4" cols="50" placeholder="Masukan deskripsi" id="deskripsi">{{ $syarats->deskripsi }}</textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                  <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('editSyaratForm{{ $syarats->id }}').submit();">Simpan</button>
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
                        <form id="kgaddForm" data-id="{{ route('createSyarat') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="nomor" class="form-label fw-semibold text-primary-light text-sm mb-8">Nomor <span class="text-danger-600">*</span></label>
                                        <input type="text" name="nomor" class="form-control radius-8" id="nomor" placeholder="Masukan urutan nomor" value="">
                                    </div>
                                </div>
                                {{-- <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="gambar" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Gambar <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="imagePreview d-flex justify-content-center align-items-center">
                                            <img id="previewImg" class="rounded" style="display: none; max-width: 200px; height: auto;">
                                        </div>
                                        <input type="file" name="foto" class="form-control radius-8 mt-3" id="foto" accept="image/*">
                                    </div>
                                </div>
                                <script>
                                    document.getElementById('foto').addEventListener('change', function(event) {
                                        let file = event.target.files[0]; // Ambil file
                                        let previewImg = document.getElementById('previewImg');

                                        if (file) {
                                            let reader = new FileReader();
                                            reader.onload = function(e) {
                                                previewImg.src = e.target.result; // Update src gambar
                                                previewImg.style.display = "block"; // Tampilkan gambar
                                            };
                                            reader.readAsDataURL(file);
                                        } else {
                                            previewImg.style.display = "none"; // Sembunyikan jika tidak ada file
                                        }
                                    });
                                </script> --}}

                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                        <input type="text" name="nama" class="form-control radius-8" id="nama" placeholder="Masukan Nama" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="deskripsi" class="form-label fw-semibold text-primary-light text-sm mb-8">Deskripsi<span class="text-danger-600">*</span></label>
                                        <textarea name="deskripsi" class="form-control" rows="4" cols="50" placeholder="Masukan deskripsi" id="deskripsi"></textarea>
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
                                $("#kgaddForm").submit(function (e) {
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
                                            $("#kgaddForm")[0].reset();
                                            // $("#previewImg").attr("src", "").hide();
                                            $("#dataTable").append(`
                                                <tr>
                                                    <td>${response.nomor}</td>

                                                    <td>${response.nama}</td>
                                                    <td>${response.deskripsi}</td>
                                                    <td>
                                                        <button href="javascript:void(0)" class="w-32-px h-32-px bg-secondary-focus text-secondary-main rounded-circle d-inline-flex align-items-center justify-content-center" disabled>
                                                            <iconify-icon icon="lucide:edit"></iconify-icon>
                                                        </button>
                                                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-secondary-focus text-secondary-main rounded-circle d-inline-flex align-items-center justify-content-center" disabled>
                                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
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
