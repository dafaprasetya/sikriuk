@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Pencapaian</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Pencapaian</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-header border-bottom-0 pb-0 pt-0 px-0">
                <ul class="nav border-gradient-tab nav-pills mb-0 border-top-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">
                        List Pencapaian
                      </button>
                    </li>
                    
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-ui-design-tab" data-bs-toggle="pill" data-bs-target="#pills-ui-design" type="button" role="tab" aria-controls="pills-ui-design" aria-selected="false" tabindex="-1">
                          Tambah Pencapaian
                        </button>
                    </li>
                </ul>
             </div>
            <div class="card-body p-24">
                <div class="tab-content" id="pills-tabContent">   
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                        <div class="row gy-4" id="pencapaian">
                            @foreach ($pencapaian as $pencapaians)    
                            <div class="col-xxl-3 col-md-4 col-sm-6">
                                <div class="hover-scale-img border radius-16 overflow-hidden">
                                    <div class="max-h-266-px overflow-hidden">
                                        <img src="{{ asset('storage/pencapaian_image/'.$pencapaians->gambar) }}" alt="" class="hover-scale-img__img w-100 h-100 object-fit-cover">
                                    </div>
                                    <div class="py-16 px-24">
                                        <h6 class="mb-4">{{ $pencapaians->nama }}</h6>
                                        <div class="imagePreview d-flex justify-content-center align-items-center m">
                                            <button type="submit" data-bs-toggle="modal" data-bs-target="#{{ $pencapaians->id }}" class="btn rounded-pill btn-warning-100 text-warning-600 radius-8 px-20 py-11 m-2">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </button>
                                            <form action="{{ route('deletePencapaian', encrypt($pencapaians->id)) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn rounded-pill btn-danger-100 text-danger-600 radius-8 px-20 py-11 m-2">
                                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="{{ $pencapaians->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modalLabel">Edit {{ $pencapaians->nama }}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="updatePencapaianForm{{ $pencapaians->id }}" action="{{ route('updatePencapaian', encrypt($pencapaians->id)) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-20">
                                                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                                        <input type="text" name="nama" class="form-control radius-8" id="name" placeholder="Masukan nama pencapaian" value="{{ $pencapaians->nama }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-20">
                                                        <label for="gambar" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                            Gambar <span class="text-danger-600">*418x547</span>
                                                        </label>
                                                        <div class="imagePreview d-flex justify-content-center align-items-center">
                                                            <img id="previewImgold{{ $pencapaians->id }}" src="{{ asset('storage/pencapaian_image/'.$pencapaians->gambar) }}" class="rounded" style="display: block; max-width: 200px; height: auto;">
                                                            <img id="previewImg{{ $pencapaians->id }}" src="{{ asset('storage/pencapaian_image/'.$pencapaians->gambar) }}" class="rounded" style="display: none; max-width: 200px; height: auto;">
                                                        </div>
                                                        <input type="file" name="gambar" class="form-control radius-8 mt-3" id="gambar{{ $pencapaians->id }}" accept="image/*">
                                                    </div>
                                                </div>
                                                <script>
                                                    document.getElementById('gambar{{ $pencapaians->id }}').addEventListener('change', function(event) {
                                                        let file = event.target.files[0]; // Ambil file
                                                        let previewImg = document.getElementById('previewImg{{ $pencapaians->id }}');
                                                        let previewImgold = document.getElementById('previewImgold{{ $pencapaians->id }}');
                                                
                                                        if (file) {
                                                            let reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                previewImg.src = e.target.result; // Update src gambar
                                                                previewImgold.style.display = "none"; // Tampilkan gambar
                                                                previewImg.style.display = "block"; // Tampilkan gambar
                                                            };
                                                            reader.readAsDataURL(file);
                                                        } else {
                                                            previewImg.style.display = "none"; // Sembunyikan jika tidak ada file
                                                        }
                                                    });
                                                </script>
                                                                                
                                                <div class="col-sm-12">
                                                    <div class="mb-20">
                                                        <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Deskripsi</label>
                                                        <textarea name="deskripsi" class="form-control" rows="4" cols="50" placeholder="Masukan Deskripsi pencapaian" id="lokasi">{{ $pencapaians->deskripsi }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                      <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                         document.getElementById('updatePencapaianForm{{ $pencapaians->id }}').submit();">Simpan</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-ui-design" role="tabpanel" aria-labelledby="pills-ui-design-tab" tabindex="0">
                        <form id="PencapaianForm" data-id="{{ route('createPencapaian') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                        <input type="text" name="nama" class="form-control radius-8" id="name" placeholder="Masukan nama pencapaian" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="gambar" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Gambar <span class="text-danger-600">*418x547</span>
                                        </label>
                                        <div class="imagePreview d-flex justify-content-center align-items-center">
                                            <img id="previewImg" class="rounded" style="display: none; max-width: 200px; height: auto;">
                                        </div>
                                        <input type="file" name="gambar" class="form-control radius-8 mt-3" id="gambar" accept="image/*">
                                    </div>
                                </div>
                                <script>
                                    document.getElementById('gambar').addEventListener('change', function(event) {
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
                                </script>
                                                                
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" rows="4" cols="50" placeholder="Masukan Deskripsi pencapaian" id="lokasi"></textarea>
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
                                $("#PencapaianForm").submit(function (e) {
                                    e.preventDefault();
                        
                                    let formData = new FormData(this);
                                    let url = $(this).data("id"); // Ambil URL dari data-id
                                    
                                    $.ajax({
                                        url: url, // Gunakan URL dari data-id
                                        type: "POST",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }, // CSRF Token untuk Laravel
                                        success: function (response) {
                                            console.log("Success:", response);
                                            var toastEl = document.getElementById('successToast');
                                            var toast = new bootstrap.Toast(toastEl);
                                            toast.show();
                                            $("#PencapaianForm")[0].reset();
                                            $("#previewImg").attr("src", "").hide();
                                            $("#pencapaian").append(`
                                            <div class="col-xxl-3 col-md-4 col-sm-6">
                                                <div class="hover-scale-img border radius-16 overflow-hidden">
                                                    <div class="max-h-266-px overflow-hidden">
                                                        <img src="{{ asset('storage/pencapaian_image/') }}/${response.gambar}" alt="" class="hover-scale-img__img w-100 h-100 object-fit-cover">
                                                    </div>
                                                    <div class="py-16 px-24">
                                                        <h6 class="mb-4">${response.nama}</h6>
                                                        <div class="imagePreview d-flex justify-content-center align-items-center">
                                                            <button type="submit" class="btn rounded-pill btn-secondary-100 text-secondary-600 radius-8 px-20 py-11 m-2" disabled>
                                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                                            </button>
                                                            <form action="{{ route('deletePencapaian', encrypt(`+response.id+`)) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn rounded-pill btn-secondary-100 text-secondary-600 radius-8 px-20 py-11 m-2" disabled>
                                                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            `)
                                        },
                                        error: function (xhr) {
                                            console.log("Error:", xhr.responseText);
                                            alert("Terjadi kesalahan saat membuat pencapaian.");
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