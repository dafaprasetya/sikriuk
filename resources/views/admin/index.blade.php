@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">About</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">About</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-body p-40">
                <form id="aboutForm" data-id="{{ route('editAbout', encrypt($about->id)) }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-20">
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                <input type="text" name="nama" class="form-control radius-8" id="name" placeholder="Enter Full Name" value="{{ $about->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-20">
                                <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Deskripsi Perusahaan <span class="text-danger-600">*</span></label>
                                <textarea name="deskripsi" class="form-control" rows="4" cols="50" placeholder="Masukan deskripsi perusahaan" id="deskripsi">{{ $about->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi</label>
                                <textarea name="alamat" class="form-control" rows="4" cols="50" placeholder="Masukan lokasi perusahaan/head office" id="lokasi">{{ $about->lokasi }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="Website" class="form-label fw-semibold text-primary-light text-sm mb-8">Moto</label>
                                <textarea name="moto" class="form-control" rows="4" cols="50" placeholder="Masukan moto perusahaan" id="moto">{{ $about->moto }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-20">
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Total Mitra Saat Ini</label>
                                <input type="number" name="total_mitra" class="form-control radius-8" id="total_mitra" placeholder="Masukan total mitra" value="{{ $about->total_mitra }}">
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center gap-3 mt-9">
                            <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Toast -->
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                Data Berhasil Diupdate
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#aboutForm').submit(function (e) {
                            e.preventDefault();
                            let aboutId = $(this).data("id");
                            $.ajax({
                                url: aboutId,
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "nama": $("#name").val(),
                                    "deskripsi": $("#deskripsi").val(),
                                    "lokasi": $("#lokasi").val(),
                                    "moto": $("#moto").val(),
                                    "total_mitra": $("#total_mitra").val()
                                },
                                success: function (response) {
                                    console.log('success');
                                    var toastEl = document.getElementById('successToast');
                                    var toast = new bootstrap.Toast(toastEl);
                                    toast.show();

                                },error: function (xhr) {
                                    console.log(xhr.responseText);
                                    console.log("Terjadi kesalahan: " + xhr.responseText);
                                }
                            });
                        });
                    });
                </script>
                <div class="row mt-24">
                    <div class="col-sm-6">
                        <div class="mb-20">
                            <form id="emailForm" data-id="{{ route('editAbout', encrypt($about->id)) }}">
                                @csrf
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Email</label>
                                <table class="table bordered-table mb-8" id="dataTable" data-page-length='10'>
                                    <tbody id="emailTableBody">
                                        @foreach ($email as $emaill)
                                        <tr>
                                            <td>{{ $emaill->email }}</td>
                                            <td style="width: 10px">
                                                <form action="{{ route('delPhonenMail', encrypt($emaill->id)) }}" method="post">
                                                    @csrf
                                                    <input type="text" name="email" value="email" hidden>
                                                    <button type="submit" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <input type="email" name="total_mitra" class="form-control radius-8" id="email" placeholder="Masukan email baru" >
                                <button type="submit" class="btn btn-primary btn-sm mt-8">
                                    Tambah Email
                                </button>
                            </form>
                            <script>
                                $(document).ready(function () {
                                    $('#emailForm').submit(function (e) {
                                        e.preventDefault();
                                        let aboutId = $(this).data("id");
                                        let email = $("#email").val();
                                        $.ajax({
                                            url: aboutId,
                                            type: "POST",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "email": $("#email").val(),
                                            },
                                            success: function (response) {
                                                console.log('success');
                                                $("#emailTableBody").append(`
                                                    <tr>
                                                        <td>${email}</td>
                                                        <td style="width: 10px">

                                                        </td>
                                                    </tr>
                                                `);

                                                // Kosongkan input setelah menambahkan
                                                $("#email").val('');
                                                var toastEl = document.getElementById('successToast');
                                                var toast = new bootstrap.Toast(toastEl);
                                                toast.show();

                                            },error: function (xhr) {
                                                console.log(xhr.responseText);
                                                console.log("Terjadi kesalahan: " + xhr.responseText);
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-20">
                            <form id="phoneForm" data-id="{{ route('editAbout', encrypt($about->id)) }}">
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Nomor Telpon</label>
                                <table class="table bordered-table mb-8" id="dataTable" data-page-length='10'>
                                    <tbody id="phoneTableBody">
                                        @foreach ($phone as $phones)
                                        <tr>
                                            <td>{{ $phones->phone }}</td>
                                            <td style="width: 10px">
                                                <form action="{{ route('delPhonenMail', encrypt($phones->id)) }}" method="post">
                                                    @csrf
                                                    <input type="text" name="phone" value="phone" hidden>
                                                    <button type="submit" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <input type="number" name="total_mitra" class="form-control radius-8" id="phone" placeholder="Masukan nomor telpon baru">
                                <button type="submit" class="btn btn-primary btn-sm mt-8">
                                    Tambah Nomor Telpon
                                </button>
                            </form>
                            <script>
                                $(document).ready(function () {
                                    $('#phoneForm').submit(function (e) {
                                        e.preventDefault();
                                        let aboutId = $(this).data("id");
                                        let phone = $("#phone").val();
                                        $.ajax({
                                            url: aboutId,
                                            type: "POST",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "phone": $("#phone").val(),
                                            },
                                            success: function (response) {
                                                console.log('success');
                                                $("#phoneTableBody").append(`
                                                    <tr>
                                                        <td>${phone}</td>
                                                        <td style="width: 10px">

                                                        </td>
                                                    </tr>
                                                `);

                                                // Kosongkan input setelah menambahkan
                                                $("#phone").val('');
                                                var toastEl = document.getElementById('successToast');
                                                var toast = new bootstrap.Toast(toastEl);
                                                toast.show();

                                            },error: function (xhr) {
                                                console.log(xhr.responseText);
                                                console.log("Terjadi kesalahan: " + xhr.responseText);
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="row mt-24">
                    <div class="col-sm-12">
                        <div class="mb-20">
                            <form id="emailForm" data-id="{{ route('editAbout', encrypt($about->id)) }}">
                                @csrf
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Sosmed</label>
                                <table class="table bordered-table mb-8" id="dataTable" data-page-length='10'>
                                    <tbody id="emailTableBody">
                                        @foreach ($sosmed as $sosmeds)
                                        <tr>
                                            <td style="width: 20px"><img src="{{ asset('storage/sosmed_logo'.$sosmeds->logo) }}"></td>
                                            <td><a href="{{ $sosmeds->link }}">{{ $sosmeds->nama }}</a></td>
                                            <td style="width: 10px">
                                                <form action="{{ route('delPhonenMail', encrypt($sosmeds->id)) }}" method="post">
                                                    @csrf
                                                    <input type="text" name="email" value="email" hidden>
                                                    <button type="submit" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="nama" class="form-control radius-8" id="nama" placeholder="Masukan jenis sosmed" >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" name="logo" class="form-control radius-8" id="logo">
                                    </div>
                                    <div class="col-sm-12 mt-8">
                                        <input type="text" name="link" class="form-control radius-8" id="link" placeholder="Masukan link sosmed" >
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mt-8">
                                    Tambah Sosmed
                                </button>
                            </form>
                            <script>
                                $(document).ready(function () {
                                    $('#emailForm').submit(function (e) {
                                        e.preventDefault();
                                        let aboutId = $(this).data("id");
                                        let email = $("#email").val();
                                        $.ajax({
                                            url: aboutId,
                                            type: "POST",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "email": $("#email").val(),
                                            },
                                            success: function (response) {
                                                console.log('success');
                                                $("#emailTableBody").append(`
                                                    <tr>
                                                        <td>${email}</td>
                                                        <td style="width: 10px">

                                                        </td>
                                                    </tr>
                                                `);

                                                // Kosongkan input setelah menambahkan
                                                $("#email").val('');
                                                var toastEl = document.getElementById('successToast');
                                                var toast = new bootstrap.Toast(toastEl);
                                                toast.show();

                                            },error: function (xhr) {
                                                console.log(xhr.responseText);
                                                console.log("Terjadi kesalahan: " + xhr.responseText);
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
</main>
@endsection