@extends('layouts.wowdash.core')
@section('body')
@include('admin.sidebar')
@include('admin.alert.aler')
<main class="dashboard-main">
    @include('admin.topbar')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Proposal</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="#" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Proposal
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Proposal</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-body p-40">
                @if ($proposal->count() >= 1)
                @foreach ($proposal as $proposals)
                    <iframe src="{{ asset('storage/proposal/'.$proposals->file) }}" width="100%" height="600px"></iframe>
                    <form action="{{ route('deleteProposal', encrypt($proposals->id)) }}" method="post" id="deleteProposal{{ $proposals->id }}">@csrf</form>
                    <button class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"  onclick="event.preventDefault();
                        document.getElementById('deleteProposal{{ $proposals->id }}').submit();">
                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                    </button>

                @endforeach
                @else
                <form id="ProposalddForm" method="POST" action="{{ route('createProposal') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-20">
                                <label for="nama" class="form-label fw-semibold text-primary-light text-sm mb-8">Nama <span class="text-danger-600">*</span></label>
                                <input type="text" name="nama" class="form-control radius-8" id="nama" placeholder="Masukan nama Proposal" value="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-20">
                                <label for="file" class="form-label fw-semibold text-primary-light text-sm mb-8">File <span class="text-danger-600">*</span></label>
                                <input type="file" name="file" class="form-control radius-8" id="file" accept="application/pdf">
                                <script>
                                    document.getElementById("file").addEventListener("change", function() {
                                        var file = this.files[0];
                                        if (file && file.type !== "application/pdf") {
                                            alert("Hanya file PDF yang diperbolehkan!");
                                            this.value = ""; // Reset input
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center gap-3 mt-9">
                            <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                Save Change
                            </button>
                        </div>
                    </div>
                </form>
                @endif
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
</main>
@endsection
