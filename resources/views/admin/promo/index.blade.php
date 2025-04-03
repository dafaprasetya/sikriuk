@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Promo</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Promo</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-header border-bottom-0 pb-0 pt-0 px-0">
                <ul class="nav border-gradient-tab nav-pills mb-0 border-top-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">
                        List Promo
                      </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-ui-design-tab" data-bs-toggle="pill" data-bs-target="#pills-ui-design" type="button" role="tab" aria-controls="pills-ui-design" aria-selected="false" tabindex="-1">
                          Tambah Promo
                        </button>
                    </li>
                </ul>
             </div>
            <div class="card-body p-24">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                        <div class="row gy-4" id="promoList">
                            @foreach ($promo as $promos)
                            <div class="col-xxl-3 col-md-4 col-sm-6">
                                <div class="hover-scale-img border radius-16 overflow-hidden">
                                    <div class="max-h-266-px overflow-hidden">
                                        <img src="{{ asset('storage/promo_image/'.$promos->gambar) }}" alt="" class="hover-scale-img__img w-100 h-100 object-fit-cover">
                                    </div>
                                    <div class="py-16 px-24">
                                        <h6 class="mb-4">{{ $promos->nama }}</h6>
                                        <div class="imagePreview d-flex justify-content-center align-items-center">
                                            <form action="{{ route('deletePromo', encrypt($promos->id)) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn rounded-pill btn-danger-100 text-danger-600 radius-8 px-20 py-11">
                                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-ui-design" role="tabpanel" aria-labelledby="pills-ui-design-tab" tabindex="0">
                        <form id="promoForm" data-id="{{ route('createPromo') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                        <input type="text" name="nama" class="form-control radius-8" id="name" placeholder="Masukan nama promo" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-20">
                                        <label for="gambar" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Gambar <span class="text-danger-600">*710x710</span>
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
                                        <textarea name="deskripsi" class="form-control" rows="4" cols="50" placeholder="Masukan Deskripsi promo" id="lokasi"></textarea>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-center gap-3 mt-9">
                                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                        Tambah Promo
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
                                $("#promoForm").submit(function (e) {
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
                                            $("#promoForm")[0].reset();
                                            $("#previewImg").attr("src", "").hide();
                                            $("#promoList").append(`
                                            <div class="col-xxl-3 col-md-4 col-sm-6">
                                                <div class="hover-scale-img border radius-16 overflow-hidden">
                                                    <div class="max-h-266-px overflow-hidden">
                                                        <img src="{{ asset('storage/promo_image/') }}/${response.gambar}" alt="" class="hover-scale-img__img w-100 h-100 object-fit-cover">
                                                    </div>
                                                    <div class="py-16 px-24">
                                                        <h6 class="mb-4">${response.nama}</h6>
                                                        <div class="imagePreview d-flex justify-content-center align-items-center">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            `)
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
</main>
@endsection
