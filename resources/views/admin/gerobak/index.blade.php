@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
<style>
    .grid-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 5px;
      width: 100%;
      max-width: 400px;
      border: 1px solid #ddd;
      padding: 10px;
      background-color: #f9f9f9;
    }
    .grid-header {
      font-weight: bold;
      background-color: #f4f4f4;
      padding: 10px;
      text-align: center;
    }
    .grid-item {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }
  </style>
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Gerobak</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Gerobak</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-header border-bottom-0 pb-0 pt-0 px-0">
                <ul class="nav border-gradient-tab nav-pills mb-0 border-top-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">
                        List Gerobak
                      </button>
                    </li>
                    
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-ui-design-tab" data-bs-toggle="pill" data-bs-target="#pills-ui-design" type="button" role="tab" aria-controls="pills-ui-design" aria-selected="false" tabindex="-1">
                          Tambah Gerobak
                        </button>
                    </li>
                </ul>
             </div>
            <div class="card-body p-24">
                <div class="tab-content" id="pills-tabContent">   
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                        <div class="table-responsive">

                            <table class="table bordered-table" id="dataTable" data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Benefit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gerobak as $gerobaks)
                                        <tr id="tr{{ $gerobaks->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/gerobak_image/'.$gerobaks->gambar) }}" alt="" style="max-width: 100px; height: auto;">
                                            </td>
                                            <td>{{ $gerobaks->nama }}</td>
                                            <td>{{ $gerobaks->harga }}</td>
                                            <td>{{ $gerobaks->deskripsi }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($gerobaks->benefit as $benefit)
                                                        <li>{{ $loop->iteration }}. {{ $benefit->benefit }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#{{ $gerobaks->id }}" class="btn btn-primary-600 btn-sm">Edit</button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#{{ $gerobaks->id }}" class="btn btn-danger-600 btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="{{ $gerobaks->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalLabel">Edit {{ $gerobaks->nama }}</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editGerobak{{ $gerobaks->id }}" enctype="multipart/form-data" action="{{ route('editGerobak',encrypt($gerobaks->id)) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="mb-20">
                                                                    <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                                                    <input type="text" name="nama" class="form-control radius-8" id="name" placeholder="Masukan nama Produk" value="{{ $gerobaks->nama }}">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-sm-6">
                                                                <div class="mb-20">
                                                                    <label for="harga" class="form-label fw-semibold text-primary-light text-sm mb-8">Harga <span class="text-danger-600">*</span></label>
                                                                    <input type="text" name="harga" class="form-control radius-8" id="harga" placeholder="Masukan harga produk" value="{{ $gerobaks->harga }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="gambar" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                                        Gambar <span class="text-danger-600">*</span>
                                                                    </label>
                                                                    <div class="imagePreview d-flex justify-content-center align-items-center">
                                                                        <img id="previewImg{{ $gerobaks->id }}" class="rounded" style="display: block; max-width: 200px; height: auto;">
                                                                    </div>
                                                                    <input type="file" name="gambar" class="form-control radius-8 mt-3" id="gambar{{ $gerobaks->id }}" accept="image/*">
                                                                </div>
                                                            </div>
                                                            <script>
                                                                document.getElementById('gambar{{ $gerobaks->id }}').addEventListener('change', function(event) {
                                                                    let file = event.target.files[0]; // Ambil file
                                                                    let previewImg = document.getElementById('previewImg{{ $gerobaks->id }}');
                            
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
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="deskripsi" class="form-label fw-semibold text-primary-light text-sm mb-8">Deskripsi<span class="text-danger-600">*</span></label>
                                                                    <textarea name="deskripsi" class="form-control" rows="4" cols="50" placeholder="Masukan deskripsi menu" id="deskripsi">{{ $gerobaks->deskripsi }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="mb-20">
                                                                    <label for="deskripsi" class="form-label fw-semibold text-primary-light text-sm mb-8">Benefit<span class="text-danger-600">*</span></label>
                                                                    <div class="d-flex justify-content-center align-items-center bg-light">
                                                                        <div class="container text-center bg-white p-4 rounded" id="benefitContainer{{ $gerobaks->id }}">
                                                                            @foreach ($gerobaks->benefit as $benefit)
                                                                            <div class="row border-bottom pb-2" id="benefit{{ $benefit->id }}">
                                                                                <div class="col">{{ $loop->iteration }}</div>
                                                                                <div class="col">{{ $benefit->benefit }}</div>
                                                                                <div class="col">
                                                                                    <button type="button" id="deletebenefitedit{{ $benefit->id }}" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    $('#deletebenefitedit{{ $benefit->id }}').click(function (e) { 
                                                                                        let formData = new FormData();
                                                                                        formData.append('_token', '{{ csrf_token() }}');
                                                                                        $.ajax({
                                                                                            type: "post",
                                                                                            url: "{{ route('deleteBenefit', $benefit->id) }}",
                                                                                            data: formData,
                                                                                            contentType: false,
                                                                                            processData: false,
                                                                                            success: function (response) {
                                                                                                console.log('great');
                                                                                                
                                                                                                $("#benefit{{ $benefit->id }}").remove();
                                                                                            }
                                                                                        });
                                                                                        
                                                                                    });
                                                                                });
                                                                            </script>
                                                                            @endforeach
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-11">
                                                                            <input type="text" name="benefit" class="form-control" id="benefitedit{{ $gerobaks->id }}" placeholder="Masukan benefit baru" value="">
                                                                        </div>
                                                                        <div class="col-sm-1">
                                                                            <button type="button" id="benefiteditbtn{{ $gerobaks->id }}" class="btn btn-sm btn-primary">+</button>
                                                                        </div>
                                                                    </div>
                                                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                                    <script>
                                                                        $(document).ready(function () {
                                                                            $('#benefiteditbtn{{ $gerobaks->id }}').click(function (e) { 
                                                                                let formData = new FormData();
                                                                                formData.append('_token', '{{ csrf_token() }}');
                                                                                formData.append('benefit', $('#benefitedit{{ $gerobaks->id }}').val());
                                                                                formData.append('kemitraan_id', '{{ $gerobaks->id }}');
                                                                                $.ajax({
                                                                                    type: "post",
                                                                                    url: "{{ route('createBenefitGerobak') }}",
                                                                                    data: formData,
                                                                                    contentType: false,
                                                                                    processData: false,
                                                                                    success: function (response) {
                                                                                        console.log('great');
                                                                                        
                                                                                        $("#benefitContainer{{ $gerobaks->id }}").append(`
                                                                                            <div class="row border-bottom pb-2">
                                                                                                <div class="col">#</div>
                                                                                                <div class="col">${response.benefit}</div>
                                                                                                <div class="col">
                                                                                                    <button type="button" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center" disabled>
                                                                                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        `);
                                                                                    }
                                                                                });
                                                                                
                                                                            });
                                                                        });
                                                                    </script>
                                                                </div>
    
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                  <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('editGerobak{{ $gerobaks->id }}').submit();">Simpan</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-ui-design" role="tabpanel" aria-labelledby="pills-ui-design-tab" tabindex="0">
                        <div class="card-body">
                            {{--  --}}
                            <div class="form-wizard">
                                {{-- <form action="#"> --}}
                                    <div class="form-wizard-header overflow-x-auto scroll-sm pb-8 my-32">
                                        <ul class="list-unstyled form-wizard-list">
                                            <li class="form-wizard-list__item active">
                                                <div class="form-wizard-list__line">
                                                    <span class="count">1</span>
                                                </div>
                                            </li>
                                            <li class="form-wizard-list__item">
                                                <div class="form-wizard-list__line">
                                                    <span class="count">2</span>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <fieldset class="wizard-fieldset show">
                                        <h6 class="text-md text-neutral-500">Detail Gerobak</h6>
                                        <div class="row gy-3">
                                            <div class="col-sm-6">
                                                <label class="form-label">Nama Paket Kemitraan*</label>
                                                <div class="position-relative">
                                                    <input type="text" name="nama" id="nama" class="form-control wizard-required" placeholder="Masukan Nama" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label">Harga*</label>
                                                <div class="position-relative">
                                                    <input type="number" name="harga" id="harga" class="form-control wizard-required" placeholder="Masukan Harga" required>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Gambar*</label>
                                                <div class="position-relative">
                                                    <div class="imagePreview d-flex justify-content-center align-items-center">
                                                        <img id="previewImg" class="rounded" style="display: none; max-width: 200px; height: auto;">
                                                    </div>
                                                    <input type="file" name="gambar" class="form-control radius-8 mt-3" id="gambar" accept="image/*" required>
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
                                            </div>
                                            <div class="col-sm-12">
                                                <label class="form-label">Deskripsi*</label>
                                                <div class="position-relative">
                                                    <textarea name="deskripsi" id="deskripsi" class="form-control wizard-required" rows="5" required></textarea>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group text-end">
                                                <button type="button" class="form-wizard-next-btn1 btn btn-primary-600 px-32">Next</button>
                                            </div>
                                        </div>
                                    </fieldset>	
    
                                    <fieldset class="wizard-fieldset">
                                        <h6 class="text-md text-neutral-500">List Benefit</h6>
                                        <div class="row gy-3">
                                            <div class="col-sm-12">
                                                <table class="table bordered-table mb-8" id="dataTable" data-page-length='10'>
                                                    <tbody id="benefitTableBody">
                                                    </tbody>
                                                </table>
                                                <small>*edit ketika sudah ditambahkan</small>

                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Benefit*</label>
                                                <div class="position-relative">
                                                    <input type="text" id="benefit" class="form-control wizard-required" placeholder="Enter User Name" required>
                                                    <div class="wizard-form-error"></div>
                                                    <div class="form-group d-flex align-items-center justify-content-center gap-8 mt-8">
                                                        <button type="button" class="form-wizard-next-btn2 btn btn-primary-600 px-32">Tambah Benefit</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-end">
                                                <button type="button" class="form-wizard-next-btn3 btn btn-primary-600 px-32">Finish</button>
                                            </div>
                                        </div>
                                    </fieldset>	
                            </div>
                            <!-- Form Wizard End -->
                        </div>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // =============================== Wizard Step Js Start ================================
    $(document).ready(function() {
        // click on next button
        var gerobakId;
        var gerobakGambar;
        var gerobakNama;
        $('.form-wizard-next-btn1').on("click", function() {
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('nama', $('#nama').val());
            formData.append('harga', $('#harga').val());
            formData.append('deskripsi', $('#deskripsi').val());
            formData.append('gambar', $('#gambar')[0].files[0]);
            $.ajax({
                type: "post",
                url: "{{ route('createGerobak') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // alert('ggwpboss');
                    gerobakId = response.id;
                    gerobakGambar = response.gambar;
                    gerobakNama = response.nama;
                    console.log(response);
                    
                }
            });
            var parentFieldset = $(this).parents('.wizard-fieldset');
            var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-list .active');
            var next = $(this);
            var nextWizardStep = true;
            parentFieldset.find('.wizard-required').each(function(){
                var thisValue = $(this).val();

                if( thisValue == "") {
                    $(this).siblings(".wizard-form-error").show();
                    nextWizardStep = false;
                }
                else {
                    $(this).siblings(".wizard-form-error").hide();
                }
            });
            if( nextWizardStep) {
                next.parents('.wizard-fieldset').removeClass("show","400");
                currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
                next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
                $(document).find('.wizard-fieldset').each(function(){
                    if($(this).hasClass('show')){
                        var formAtrr = $(this).attr('data-tab-content');
                        $(document).find('.form-wizard-list .form-wizard-step-item').each(function(){
                            if($(this).attr('data-attr') == formAtrr){
                                $(this).addClass('active');
                                var innerWidth = $(this).innerWidth();
                                var position = $(this).position();
                                $(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                            }else{
                                $(this).removeClass('active');
                            }
                        });
                    }
                });
            }
        });
        $('.form-wizard-next-btn2').on("click", function() {
            console.log(gerobakId);
            var numor = 0;
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('benefit', $('#benefit').val());
            formData.append('kemitraan_id', gerobakId);
            $.ajax({
                type: "post",
                url: "{{ route('createBenefitGerobak') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    numor++;
                    $("#benefitTableBody").append(`
                        <tr>
                            <td>#</td>
                            <td>${response.benefit}</td>
                            <td style="width: 10px">
                            </td>
                         </tr>
                    `);
                }
            });
            
        });
        $('.form-wizard-next-btn3').on("click", function() {
            // Reset wizard ke langkah pertama
            $('.wizard-fieldset').removeClass("show");
            $('.wizard-fieldset').first().addClass("show");

            // Reset step indikator
            $('.form-wizard-step-item').removeClass('active').removeClass('activated');
            $('.form-wizard-step-item').first().addClass('active');
            

            // Reset input field
            $('input, textarea').val('');
            
            // Reset file input
            $('#gambar').val(null);

            // Sembunyikan preview gambar
            $('#previewImg').attr('src', '').hide();

            // Kosongkan tabel benefit
            $("#benefitTableBody").empty();

            // Reset gerobakId
            gerobakId = null;
            gerobakNama = null;
            gerobakGambar = null;

            console.log("Form berhasil direset!");
            window.location.reload();
        });
        
        
        // focus on input field check empty or not
        $(".form-control").on('focus', function(){
            var tmpThis = $(this).val();
            if(tmpThis == '' ) {
                $(this).parent().addClass("focus-input");
            }
            else if(tmpThis !='' ){
                $(this).parent().addClass("focus-input");
            }
        }).on('blur', function(){
            var tmpThis = $(this).val();
            if(tmpThis == '' ) {
                $(this).parent().removeClass("focus-input");
                $(this).siblings(".wizard-form-error").show();
            }
            else if(tmpThis !='' ){
                $(this).parent().addClass("focus-input");
                $(this).siblings(".wizard-form-error").hide();
            }
        });
    });
    // =============================== Wizard Step Js End ================================
</script>
@endsection