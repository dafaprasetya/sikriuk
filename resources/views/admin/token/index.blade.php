@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Akses Token</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Akses Token
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Akses Token</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-body p-40">
                <form id="edittokenform" data-id="{{ route('editToken') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-20">
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Token <span class="text-danger-600">*</span></label>
                                <input type="text" name="token" class="form-control radius-8" id="token" placeholder="Masukan token" value="{{ $token->token }}">
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
                                Data Berhasil Diubah
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $("#edittokenform").submit(function (e) {
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
</main>
@endsection
